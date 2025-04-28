<?php

namespace App\Http\Controllers;

use App\Models\Ringtone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RingtoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ringtones = Ringtone::where('user_id', Auth::id())->orWhereNull('user_id')->get();
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
            'file_path' => 'required|file|mimes:mp3,wav',
        ]);

        // Menyimpan file ke dalam folder public/ringtones
        $path = $request->file('file_path')->storeAs('ringtones', $request->file('file_path')->getClientOriginalName(), 'public');

        Ringtone::create([
            'name' => $request->name,
            'file_path' => $path,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('ringtones.index')->with('success', 'Ringtone added.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ringtone $ringtone)
    {
        if ($ringtone->user_id !== Auth::id()) {
            abort(403);
        }

        $ringtone->delete();
        return redirect()->route('ringtones.index')->with('success', 'Ringtone deleted.');
    }
}
