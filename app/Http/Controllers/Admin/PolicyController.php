<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PolicyController extends Controller
{
    /**
     * Display a listing of all policy pages.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $status = $request->query('status');

        $query = Policy::query()->orderBy('order', 'asc')->latest('updated_at');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        if ($status === 'active') {
            $query->where('is_active', true);
        } elseif ($status === 'inactive') {
            $query->where('is_active', false);
        }

        try {
            $policies = $query->paginate(15)->withQueryString();
            $totalCount = Policy::count();
            $activeCount = Policy::where('is_active', true)->count();
            $inactiveCount = Policy::where('is_active', false)->count();
        } catch (\Throwable $e) {
            $policies = collect();
            $totalCount = 0;
            $activeCount = 0;
            $inactiveCount = 0;
        }

        return view('admin.policies.index', compact('policies', 'search', 'status', 'totalCount', 'activeCount', 'inactiveCount'));
    }

    /**
     * Show the form for creating a new policy page.
     */
    public function create()
    {
        $nextOrder = (Policy::max('order') ?? 0) + 1;
        return view('admin.policies.create', compact('nextOrder'));
    }

    /**
     * Store a newly created policy page.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => 'nullable|string|max:255|unique:policies,slug',
            'summary'          => 'nullable|string',
            'content'          => 'required|string',
            'effective_date'   => 'nullable|string|max:100',
            'is_active'        => 'nullable|boolean',
            'order'            => 'nullable|integer',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $validated['slug'] = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title']);

        // Check uniqueness if slug generated from title
        $baseSlug = $validated['slug'];
        $counter = 1;
        while (Policy::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $baseSlug . '-' . $counter;
            $counter++;
        }

        $validated['is_active'] = $request->has('is_active') ? (bool) $request->input('is_active') : true;
        $validated['order'] = $validated['order'] ?? ((Policy::max('order') ?? 0) + 1);

        Policy::create($validated);

        return redirect()->route('admin.policies.index')
            ->with('success', 'Policy page "' . $validated['title'] . '" created successfully.');
    }

    /**
     * Show the form for editing an existing policy page.
     */
    public function edit($id)
    {
        $policy = Policy::findOrFail($id);
        return view('admin.policies.edit', compact('policy'));
    }

    /**
     * Update the specified policy page.
     */
    public function update(Request $request, $id)
    {
        $policy = Policy::findOrFail($id);

        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'slug'             => 'required|string|max:255|unique:policies,slug,' . $policy->id,
            'summary'          => 'nullable|string',
            'content'          => 'required|string',
            'effective_date'   => 'nullable|string|max:100',
            'is_active'        => 'nullable|boolean',
            'order'            => 'nullable|integer',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $validated['slug'] = Str::slug($validated['slug']);
        $validated['is_active'] = $request->has('is_active') ? (bool) $request->input('is_active') : false;
        $validated['order'] = $validated['order'] ?? $policy->order;

        $policy->update($validated);

        return redirect()->route('admin.policies.index')
            ->with('success', 'Policy page "' . $policy->title . '" updated successfully.');
    }

    /**
     * Remove the specified policy page.
     */
    public function destroy($id)
    {
        $policy = Policy::findOrFail($id);
        $title = $policy->title;
        $policy->delete();

        return redirect()->route('admin.policies.index')
            ->with('success', 'Policy page "' . $title . '" has been deleted.');
    }

    /**
     * Quick toggle for active status.
     */
    public function toggleActive($id)
    {
        $policy = Policy::findOrFail($id);
        $policy->is_active = !$policy->is_active;
        $policy->save();

        $statusStr = $policy->is_active ? 'published' : 'moved to draft';
        return redirect()->back()
            ->with('success', 'Policy "' . $policy->title . '" ' . $statusStr . ' successfully.');
    }
}

