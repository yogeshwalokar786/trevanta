<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\Blog;
use App\Models\JobApplication;
use App\Models\JobOpening;
use App\Models\Policy;

class DashboardController extends Controller
{
    /**
     * Display the AdminLTE Light Dashboard.
     */
    public function index(Request $request)
    {
        $filter = $request->query('filter');

        try {
            $totalInquiries     = Inquiry::count();
            $pendingInquiries   = Inquiry::where('status', 'new')->count();
            $totalRfps          = Inquiry::where('type', 'rfp')->count();
            $totalContacts      = Inquiry::where('type', 'contact')->count();

            $totalBlogs         = Blog::count();
            $publishedBlogs     = Blog::published()->count();

            $totalApplications  = JobApplication::count();
            $newApplications    = JobApplication::where('status', 'new')->count();
            $activeJobs         = JobOpening::active()->count();

            $totalPolicies      = Policy::count();
            $activePolicies     = Policy::where('is_active', true)->count();

            $query = Inquiry::latest();

            if ($filter === 'rfp') {
                $query->where('type', 'rfp');
            } elseif ($filter === 'contact') {
                $query->where('type', 'contact');
            } elseif ($filter === 'pending') {
                $query->where('status', 'new');
            }

            $inquiries = $query->paginate(15);
        } catch (\Throwable $e) {
            $totalInquiries     = 0;
            $pendingInquiries   = 0;
            $totalRfps          = 0;
            $totalContacts      = 0;
            $totalBlogs         = 0;
            $publishedBlogs     = 0;
            $totalApplications  = 0;
            $newApplications    = 0;
            $activeJobs         = 0;
            $totalPolicies      = 0;
            $activePolicies     = 0;
            $inquiries          = collect();
        }

        $pendingRfps = $pendingInquiries;

        return view('admin.dashboard', compact(
            'totalInquiries',
            'pendingInquiries',
            'pendingRfps',
            'totalRfps',
            'totalContacts',
            'totalBlogs',
            'publishedBlogs',
            'totalApplications',
            'newApplications',
            'activeJobs',
            'totalPolicies',
            'activePolicies',
            'inquiries'
        ));
    }

    /**
     * Update inquiry review status.
     */
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,in_review,contacted,closed',
        ]);

        try {
            $inquiry = Inquiry::findOrFail($id);
            $inquiry->update(['status' => $validated['status']]);

            if ($request->wantsJson()) {
                return response()->json(['success' => true, 'status' => $inquiry->status]);
            }

            return back()->with('success', 'Inquiry #' . $id . ' status updated to ' . ucfirst(str_replace('_', ' ', $validated['status'])) . '.');
        } catch (\Throwable $e) {
            return back()->with('error', 'Could not update status: ' . $e->getMessage());
        }
    }

    /**
     * Delete an inquiry.
     */
    public function destroy($id)
    {
        try {
            $inquiry = Inquiry::findOrFail($id);
            $inquiry->delete();

            return back()->with('success', 'Inquiry #' . $id . ' was permanently deleted.');
        } catch (\Throwable $e) {
            return back()->with('error', 'Could not delete inquiry.');
        }
    }
}
