<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobOpening;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobOpeningController extends Controller
{
    /**
     * Display a listing of job openings.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $department = $request->query('department');
        $status = $request->query('status');

        $query = JobOpening::query()->orderBy('order')->latest();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('department', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if (!empty($department) && $department !== 'all') {
            $query->where('department', $department);
        }

        if ($status === 'active') {
            $query->where('is_active', true);
        } elseif ($status === 'inactive') {
            $query->where('is_active', false);
        }

        try {
            $jobs = $query->paginate(15)->withQueryString();
            $departments = JobOpening::select('department')
                ->whereNotNull('department')
                ->where('department', '!=', '')
                ->distinct()
                ->pluck('department');
        } catch (\Throwable $e) {
            $jobs = collect();
            $departments = collect();
        }

        return view('admin.jobs.index', compact('jobs', 'departments', 'search', 'department', 'status'));
    }

    /**
     * Show the form for creating a new job opening.
     */
    public function create()
    {
        return view('admin.jobs.create');
    }

    /**
     * Store a newly created job opening in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'department'   => 'nullable|string|max:100',
            'job_type'     => 'required|string|max:50',
            'location'     => 'nullable|string|max:255',
            'experience'   => 'nullable|string|max:100',
            'description'  => 'required|string',
            'requirements' => 'nullable|string',
            'apply_email'  => 'nullable|email|max:255',
            'apply_url'    => 'nullable|url|max:255',
            'is_active'    => 'nullable|boolean',
            'order'        => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        JobOpening::create($validated);

        return redirect()->route('admin.jobs.index')->with('success', 'Job opening posted successfully!');
    }

    /**
     * Show the form for editing the specified job opening.
     */
    public function edit(JobOpening $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    /**
     * Update the specified job opening in storage.
     */
    public function update(Request $request, JobOpening $job)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'department'   => 'nullable|string|max:100',
            'job_type'     => 'required|string|max:50',
            'location'     => 'nullable|string|max:255',
            'experience'   => 'nullable|string|max:100',
            'description'  => 'required|string',
            'requirements' => 'nullable|string',
            'apply_email'  => 'nullable|email|max:255',
            'apply_url'    => 'nullable|url|max:255',
            'is_active'    => 'nullable|boolean',
            'order'        => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        $job->update($validated);

        return redirect()->route('admin.jobs.index')->with('success', 'Job opening updated successfully!');
    }

    /**
     * Remove the specified job opening from storage.
     */
    public function destroy(JobOpening $job)
    {
        $job->delete();

        return redirect()->route('admin.jobs.index')->with('success', 'Job opening removed successfully.');
    }

    /**
     * Toggle the active status of a job opening.
     */
    public function toggleActive($id)
    {
        $job = JobOpening::findOrFail($id);
        $job->is_active = !$job->is_active;
        $job->save();

        $statusText = $job->is_active ? 'activated' : 'deactivated';
        return redirect()->back()->with('success', "Job opening \"{$job->title}\" {$statusText} successfully.");
    }
}
