<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of blogs/insights.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $category = $request->query('category');

        $query = Blog::latest('published_at');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('author_name', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%");
            });
        }

        if (!empty($category) && $category !== 'all') {
            $query->where(function ($q) use ($category) {
                $q->where('category', $category)
                  ->orWhere('category_id', $category);
            });
        }

        try {
            $blogs = $query->paginate(12)->withQueryString();
            $categories = Category::orderBy('name')->get();
            if ($categories->isEmpty()) {
                $categories = Blog::select('category')->distinct()->pluck('category')->filter()->map(function($c) {
                    return (object) ['id' => $c, 'name' => $c];
                });
            }
        } catch (\Throwable $e) {
            $blogs = collect();
            $categories = collect();
        }

        return view('admin.blogs.index', compact('blogs', 'categories', 'search', 'category'));
    }

    /**
     * Show the form for creating a new blog.
     */
    public function create()
    {
        try {
            $categories = Category::orderBy('name')->get();
            if ($categories->isEmpty()) {
                $defaultNames = [
                    'Clinical Strategy',
                    'Regulatory Affairs',
                    'Pharmacovigilance',
                    'Biostatistics',
                    'Decentralized Trials',
                    'Medical Devices',
                ];
                foreach ($defaultNames as $name) {
                    Category::firstOrCreate(['name' => $name], ['slug' => Str::slug($name)]);
                }
                $categories = Category::orderBy('name')->get();
            }
        } catch (\Throwable $e) {
            $categories = collect();
        }

        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Display the specified blog or redirect to edit.
     */
    public function show($id)
    {
        return redirect()->route('admin.blogs.edit', $id);
    }

    /**
     * Store a newly created blog in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'slug'          => 'nullable|string|max:255|unique:blogs,slug',
            'category_id'   => 'nullable|integer',
            'category'      => 'nullable|string|max:100',
            'badge'         => 'nullable|string|max:100',
            'summary'       => 'required|string|max:1000',
            'content'       => 'required|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'image_url'     => 'nullable|string|max:255',
            'read_time'     => 'nullable|string|max:50',
            'author_name'   => 'required|string|max:150',
            'author_title'  => 'nullable|string|max:200',
            'author_avatar' => 'nullable|string|max:50',
            'is_featured'   => 'nullable|boolean',
            'is_published'  => 'nullable|boolean',
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        
        // Ensure slug uniqueness
        $originalSlug = $slug;
        $counter = 1;
        while (Blog::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }

        // Resolve Category
        $categoryId = $request->input('category_id');
        $categoryName = $request->input('category');
        if (!empty($categoryId)) {
            $cat = Category::find($categoryId);
            if ($cat) {
                $categoryName = $cat->name;
            }
        } elseif (!empty($categoryName)) {
            $cat = Category::firstOrCreate(
                ['name' => $categoryName],
                ['slug' => Str::slug($categoryName)]
            );
            $categoryId = $cat->id;
        } else {
            $categoryName = 'Clinical Strategy';
        }

        $imagePath = $validated['image_url'] ?? null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $fileName);
            $imagePath = 'uploads/' . $fileName;
        }

        // If this blog is marked as featured, unfeature others
        $isFeatured = $request->boolean('is_featured');
        if ($isFeatured) {
            Blog::where('is_featured', true)->update(['is_featured' => false]);
        }

        Blog::create([
            'title'         => $validated['title'],
            'slug'          => $slug,
            'category_id'   => $categoryId,
            'category'      => $categoryName,
            'badge'         => $validated['badge'] ?? $categoryName,
            'summary'       => $validated['summary'],
            'content'       => $validated['content'],
            'image'         => $imagePath,
            'read_time'     => $validated['read_time'] ?: '5 min read',
            'author_name'   => $validated['author_name'],
            'author_title'  => $validated['author_title'] ?? 'Clinical Research Team',
            'author_avatar' => $validated['author_avatar'] ?: null,
            'is_featured'   => $isFeatured,
            'is_published'  => $request->boolean('is_published', true),
            'published_at'  => now(),
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog article created successfully!');
    }

    /**
     * Show the form for editing the specified blog.
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        try {
            $categories = Category::orderBy('name')->get();
        } catch (\Throwable $e) {
            $categories = collect();
        }

        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified blog in storage.
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'slug'          => 'required|string|max:255|unique:blogs,slug,' . $blog->id,
            'category_id'   => 'nullable|integer',
            'category'      => 'nullable|string|max:100',
            'badge'         => 'nullable|string|max:100',
            'summary'       => 'required|string|max:1000',
            'content'       => 'required|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:4096',
            'image_url'     => 'nullable|string|max:255',
            'read_time'     => 'nullable|string|max:50',
            'author_name'   => 'required|string|max:150',
            'author_title'  => 'nullable|string|max:200',
            'author_avatar' => 'nullable|string|max:50',
            'is_featured'   => 'nullable|boolean',
            'is_published'  => 'nullable|boolean',
        ]);

        // Resolve Category
        $categoryId = $request->input('category_id', $blog->category_id);
        $categoryName = $request->input('category', $blog->category);
        if (!empty($categoryId)) {
            $cat = Category::find($categoryId);
            if ($cat) {
                $categoryName = $cat->name;
            }
        } elseif (!empty($categoryName)) {
            $cat = Category::firstOrCreate(
                ['name' => $categoryName],
                ['slug' => Str::slug($categoryName)]
            );
            $categoryId = $cat->id;
        }

        $imagePath = $blog->image;
        if ($request->filled('image_url')) {
            $imagePath = $request->input('image_url');
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $fileName);
            $imagePath = 'uploads/' . $fileName;
        }

        $isFeatured = $request->boolean('is_featured');
        if ($isFeatured && !$blog->is_featured) {
            Blog::where('is_featured', true)->update(['is_featured' => false]);
        }

        $blog->update([
            'title'         => $validated['title'],
            'slug'          => Str::slug($validated['slug']),
            'category_id'   => $categoryId,
            'category'      => $categoryName,
            'badge'         => $validated['badge'] ?? $categoryName,
            'summary'       => $validated['summary'],
            'content'       => $validated['content'],
            'image'         => $imagePath,
            'read_time'     => $validated['read_time'] ?: '5 min read',
            'author_name'   => $validated['author_name'],
            'author_title'  => $validated['author_title'] ?? 'Clinical Research Team',
            'author_avatar' => $validated['author_avatar'] ?: null,
            'is_featured'   => $isFeatured,
            'is_published'  => $request->boolean('is_published'),
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog article updated successfully!');
    }

    /**
     * Remove the specified blog from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog article deleted successfully.');
    }

    /**
     * Toggle the published status of the blog.
     */
    public function togglePublish($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->is_published = !$blog->is_published;
        if ($blog->is_published && empty($blog->published_at)) {
            $blog->published_at = now();
        }
        $blog->save();

        $status = $blog->is_published ? 'Published' : 'Moved to Draft';
        return redirect()->back()->with('success', "Article '{$blog->title}' is now {$status}.");
    }
}
