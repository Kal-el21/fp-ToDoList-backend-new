<?php

namespace App\Http\Controllers;

use App\Models\Ringtone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RingtoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Ringtone::query();

        // Search Filter
        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sorting
        if ($request->has('sort') && in_array($request->sort, ['latest', 'oldest', 'name_asc', 'name_desc'])) {
            switch ($request->sort) {
                case 'latest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
            }
        } else {
            // Default: latest
            $query->orderBy('created_at', 'desc');
        }

        $ringtones = $query->paginate(6)->withQueryString(); // paginate 6 per page

        return view('dashboard.ringtones.index', compact('ringtones'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.ringtones.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|file|mimes:mp3,wav', // Validasi file upload
        ]);

        // Proses upload file
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName(); // Biar unik
        $path = $file->storeAs('ringtones', $filename, 'public');

        // Simpan data ke tabel ringtones
        Ringtone::create([
            'name' => $request->name,
            'file_path' => $path, // << simpan ke kolom file_path
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('ringtones.index')->with('success', 'Ringtone berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ringtone $ringtone)
    {
        return view('dashboard.ringtones.edit', compact('ringtone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ringtone $ringtone)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:mp3,wav',
        ]);

        // Update nama
        $ringtone->name = $request->name;

        // Kalau upload file baru
        if ($request->hasFile('file')) {
            // Hapus file lama
            Storage::disk('public')->delete($ringtone->file_path);

            // Upload file baru
            $path = $request->file('file')->store('ringtones', 'public');
            $ringtone->file_path = $path;
        }

        $ringtone->save();

        return redirect()->route('ringtones.index')->with('success', 'Ringtone berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ringtone $ringtone)
    {
        // Hapus file dari storage
    Storage::disk('public')->delete($ringtone->file_path);

    // Hapus record dari database
    $ringtone->delete();

    return redirect()->route('ringtones.index')->with('success', 'Ringtone berhasil dihapus.');
    }
}
