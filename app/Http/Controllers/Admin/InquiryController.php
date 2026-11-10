<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    /**
     * Display a listing of enquiries (Study RFPs & General Contact).
     */
    public function index(Request $request)
    {
        $type = $request->query('type');
        $status = $request->query('status');
        $search = $request->query('search');

        try {
            $totalCount   = Inquiry::count();
            $rfpCount     = Inquiry::where('type', 'rfp')->count();
            $contactCount = Inquiry::where('type', 'contact')->count();
            $newCount     = Inquiry::where('status', 'new')->count();

            $query = Inquiry::latest();

            if ($type && in_array($type, ['rfp', 'contact'])) {
                $query->where('type', $type);
            }

            if ($status && in_array($status, ['new', 'in_review', 'contacted', 'closed'])) {
                $query->where('status', $status);
            }

            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('phone', 'like', "%{$search}%")
                      ->orWhere('organization', 'like', "%{$search}%")
                      ->orWhere('therapeutic_focus', 'like', "%{$search}%")
                      ->orWhere('message', 'like', "%{$search}%");
                });
            }

            $inquiries = $query->paginate(15)->withQueryString();
        } catch (\Throwable $e) {
            $totalCount   = 0;
            $rfpCount     = 0;
            $contactCount = 0;
            $newCount     = 0;
            $inquiries    = collect();
        }

        return view('admin.inquiries.index', compact(
            'inquiries',
            'totalCount',
            'rfpCount',
            'contactCount',
            'newCount',
            'type',
            'status',
            'search'
        ));
    }

    /**
     * Display single enquiry details as JSON or for modal viewing.
     */
    public function show($id)
    {
        $inquiry = Inquiry::findOrFail($id);

        if (request()->wantsJson() || request()->ajax()) {
            return response()->json([
                'success' => true,
                'inquiry' => $inquiry,
                'formatted_date' => $inquiry->created_at->format('M d, Y h:i A'),
                'human_date' => $inquiry->created_at->diffForHumans(),
            ]);
        }

        return view('admin.inquiries.show', compact('inquiry'));
    }

    /**
     * Update enquiry review status.
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

            return back()->with('success', 'Enquiry #' . $id . ' status updated to ' . ucfirst(str_replace('_', ' ', $validated['status'])) . '.');
        } catch (\Throwable $e) {
            return back()->with('error', 'Could not update status: ' . $e->getMessage());
        }
    }

    /**
     * Delete an enquiry permanently.
     */
    public function destroy($id)
    {
        try {
            $inquiry = Inquiry::findOrFail($id);
            $inquiry->delete();

            return back()->with('success', 'Enquiry #' . $id . ' was permanently deleted.');
        } catch (\Throwable $e) {
            return back()->with('error', 'Could not delete enquiry: ' . $e->getMessage());
        }
    }
}

