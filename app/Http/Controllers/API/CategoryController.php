<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ! Nanti filter by user yg login atau shared categories
        $categories = Category::all();
        return response()->json(['success' => true, 'data' => $categories]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255|unique:categories,name',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validasi gagal.',
                    'errors'  => $validator->errors()
                ], 422);
            }

            // Simpan kategori dengan user_id
            $category = Category::create([
                'name' => $request->name,
                // 'user_id' => auth()->id(), // isi dari user yang login
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Kategori berhasil ditambahkan.',
                'data'    => $category
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan kategori.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // $this->authorize('update', $category); // jika ada policy
        $request->validate(['name' => 'required']);
        $category->update(['name' => $request->name]);

        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Category $category)
    {
        $this->authorize('delete', $category); // jika ada policy
        $category->delete();

        return response()->json(['message' => 'Category deleted.']);
    }
}
