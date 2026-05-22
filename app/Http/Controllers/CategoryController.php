<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // halaman kategori
    public function index(Request $request)
    {
        $query = Category::query();

        // search
        if ($request->search) {
            $query->where(
                'nama_kategori',
                'like',
                '%' . $request->search . '%'
            );
        }

        $categories = $query
            ->latest()
            ->get();

        return view(
            'categories.index',
            compact('categories')
        );
    }

    // create (opsional)
    public function create()
    {
        return view('categories.create');
    }

    // simpan kategori
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        Category::create([
            'nama_kategori' =>
                $request->nama_kategori
        ]);

        return redirect()
            ->route('categories.index')
            ->with(
                'success',
                'Kategori berhasil ditambahkan'
            );
    }

    // edit
    public function edit(Category $category)
    {
        return view(
            'categories.edit',
            compact('category')
        );
    }

    // update
    public function update(
        Request $request,
        Category $category
    ) {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        $category->update([
            'nama_kategori' =>
                $request->nama_kategori
        ]);

        return redirect()
            ->route('categories.index')
            ->with(
                'success',
                'Kategori berhasil diupdate'
            );
    }

    // hapus
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with(
                'success',
                'Kategori berhasil dihapus'
            );
    }
}