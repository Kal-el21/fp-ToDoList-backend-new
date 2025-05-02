<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ringtone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RingtoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ringtones = Ringtone::all();
        return response()->json([
            'success' => true,
            'data' => $ringtones
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255|unique:ringtones,name',
                'file_path' => 'required|string' // Sesuaikan jika upload file
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal.',
                    'errors'  => $validator->errors()
                ], 422);
            }

            $ringtone = Ringtone::create([
                'name' => $request->name,
                'file_path' => $request->file_path,
                'user_id' => auth()->id()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Ringtone berhasil ditambahkan.',
                'data' => $ringtone
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan ringtone.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ringtone = Ringtone::find($id);

        if (!$ringtone) {
            return response()->json(['success' => false, 'message' => 'Ringtone tidak ditemukan'], 404);
        }

        return response()->json(['success' => true, 'data' => $ringtone]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ringtone = Ringtone::find($id);

        if (!$ringtone) {
            return response()->json(['success' => false, 'message' => 'Ringtone tidak ditemukan'], 404);
        }

        $ringtone->update($request->only('name', 'file_path'));

        return response()->json(['success' => true, 'message' => 'Ringtone berhasil diupdate', 'data' => $ringtone]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ringtone = Ringtone::find($id);

        if (!$ringtone) {
            return response()->json(['success' => false, 'message' => 'Ringtone tidak ditemukan'], 404);
        }

        $ringtone->delete();

        return response()->json(['success' => true, 'message' => 'Ringtone berhasil dihapus']);
    }
}
