<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the AdminLTE Light Dashboard.
     */
    public function index()
    {
        try {
            $totalInquiries = Inquiry::count();
            $totalRfps = Inquiry::where('type', 'rfp')->count();
            $totalContacts = Inquiry::where('type', 'contact')->count();
            $pendingRfps = Inquiry::where('status', 'new')->count();
            $reviewedRfps = Inquiry::whereIn('status', ['in_review', 'contacted', 'closed'])->count();

            $recentInquiries = Inquiry::latest()->take(8)->get();

            $therapeuticStats = Inquiry::whereNotNull('therapeutic_focus')
                ->select('therapeutic_focus', DB::raw('count(*) as total'))
                ->groupBy('therapeutic_focus')
                ->pluck('total', 'therapeutic_focus')
                ->toArray();
        } catch (\Throwable $e) {
            // Graceful fallback if database table not yet migrated
            $totalInquiries = 0;
            $totalRfps = 0;
            $totalContacts = 0;
            $pendingRfps = 0;
            $reviewedRfps = 0;
            $recentInquiries = collect();
            $therapeuticStats = [];
        }

        return view('admin.dashboard', compact(
            'totalInquiries',
            'totalRfps',
            'totalContacts',
            'pendingRfps',
            'reviewedRfps',
            'recentInquiries',
            'therapeuticStats'
        ));
    }

    /**
     * Display all inquiries and RFPs table view.
     */
    public function inquiries(Request $request)
    {
        $type = $request->query('type');
        $status = $request->query('status');

        try {
            $query = Inquiry::latest();

            if ($type) {
                $query->where('type', $type);
            }

            if ($status) {
                $query->where('status', $status);
            }

            $inquiries = $query->paginate(15);
        } catch (\Throwable $e) {
            $inquiries = collect();
        }

        return view('admin.inquiries', compact('inquiries', 'type', 'status'));
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

