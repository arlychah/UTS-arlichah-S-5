<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('items')->orderBy('id')->get();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        Category::create($this->validated($request));

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update($this->validated($request));

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diubah.');
    }

    public function destroy(Category $category)
    {
        if ($category->items()->exists()) {
            return redirect()->route('categories.index')
                ->with('error', 'Kategori ' . $category->name . ' tidak dapat dihapus karena masih memiliki ' . $category->items()->count() . ' barang.');
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate(
            ['name' => ['required', 'string', 'max:255']],
            ['name.required' => 'Nama kategori wajib diisi.']
        );
    }
}