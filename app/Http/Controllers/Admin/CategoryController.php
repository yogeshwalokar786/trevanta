<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories.
     */
    public function index()
    {
        try {
            $categories = Category::withCount('blogs')->orderBy('name')->get();
        } catch (\Throwable $e) {
            $categories = collect();
        }

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Store a newly created category.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:150|unique:categories,name',
            'slug'        => 'nullable|string|max:150|unique:categories,slug',
            'description' => 'nullable|string|max:500',
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);

        Category::create([
            'name'        => $validated['name'],
            'slug'        => $slug,
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('admin.categories.index')->with('success', "Category '{$validated['name']}' created successfully.");
    }

    /**
     * Update the specified category.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name'        => 'required|string|max:150|unique:categories,name,' . $category->id,
            'slug'        => 'required|string|max:150|unique:categories,slug,' . $category->id,
            'description' => 'nullable|string|max:500',
        ]);

        $oldName = $category->name;
        $category->update([
            'name'        => $validated['name'],
            'slug'        => Str::slug($validated['slug']),
            'description' => $validated['description'] ?? null,
        ]);

        // Keep existing blog text category column synced
        Blog::where('category_id', $category->id)->orWhere('category', $oldName)->update([
            'category' => $category->name
        ]);

        return redirect()->route('admin.categories.index')->with('success', "Category '{$category->name}' updated successfully.");
    }

    /**
     * Remove the specified category.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        
        // Remove link from blogs
        Blog::where('category_id', $category->id)->update([
            'category_id' => null
        ]);

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', "Category '{$category->name}' deleted.");
    }
}

