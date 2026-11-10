<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobOpening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of job applications.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $status = $request->query('status');
        $position = $request->query('position');

        $query = JobApplication::with('jobOpening')->latest();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('position_title', 'like', "%{$search}%")
                  ->orWhere('current_location', 'like', "%{$search}%");
            });
        }

        if (!empty($status) && $status !== 'all') {
            $query->where('status', $status);
        }

        if (!empty($position) && $position !== 'all') {
            $query->where('position_title', $position);
        }

        try {
            $applications = $query->paginate(15)->withQueryString();
            $positions = JobApplication::select('position_title')
                ->distinct()
                ->pluck('position_title');
            
            $statusCounts = [
                'all'         => JobApplication::count(),
                'new'         => JobApplication::where('status', 'new')->count(),
                'reviewing'   => JobApplication::where('status', 'reviewing')->count(),
                'shortlisted' => JobApplication::where('status', 'shortlisted')->count(),
                'rejected'    => JobApplication::where('status', 'rejected')->count(),
            ];
        } catch (\Throwable $e) {
            $applications = collect();
            $positions = collect();
            $statusCounts = ['all' => 0, 'new' => 0, 'reviewing' => 0, 'shortlisted' => 0, 'rejected' => 0];
        }

        return view('admin.applications.index', compact('applications', 'positions', 'search', 'status', 'position', 'statusCounts'));
    }

    /**
     * Display candidate details.
     */
    public function show($id)
    {
        $application = JobApplication::with('jobOpening')->findOrFail($id);

        return view('admin.applications.show', compact('application'));
    }

    /**
     * Update application status and internal admin notes.
     */
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,reviewing,shortlisted,rejected',
            'notes'  => 'nullable|string|max:5000',
        ]);

        $application = JobApplication::findOrFail($id);
        $application->update([
            'status' => $validated['status'],
            'notes'  => $validated['notes'] ?? $application->notes,
        ]);

        return redirect()->back()->with('success', "Candidate \"{$application->name}\" status updated to " . strtoupper($application->status) . ".");
    }

    /**
     * Download candidate resume.
     */
    public function downloadResume($id)
    {
        $application = JobApplication::findOrFail($id);

        if (empty($application->resume_path)) {
            return redirect()->back()->with('error', 'No resume file attached to this application.');
        }

        $fullPath = public_path($application->resume_path);
        if (!File::exists($fullPath)) {
            return redirect()->back()->with('error', 'The requested resume file does not exist on the server.');
        }

        return response()->download($fullPath);
    }

    /**
     * Remove the application from storage.
     */
    public function destroy($id)
    {
        $application = JobApplication::findOrFail($id);

        if (!empty($application->resume_path)) {
            $fullPath = public_path($application->resume_path);
            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }
        }

        $application->delete();

        return redirect()->route('admin.applications.index')->with('success', 'Candidate application removed successfully.');
    }
}

