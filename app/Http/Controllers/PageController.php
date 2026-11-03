<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the home page.
     */
    public function home()
    {
        return view('pages.home');
    }

    /**
     * Display the about us page.
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Display the services page.
     */
    public function services()
    {
        return view('pages.services');
    }

    /**
     * Display the global presence page.
     */
    public function global()
    {
        return view('pages.global');
    }

    /**
     * Display the insights & blog page.
     */
    public function blog()
    {
        return view('pages.blog');
    }

    /**
     * Display the contact us page.
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Handle contact form submission.
     */
    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:100',
            'email'        => 'required|email|max:150',
            'organization' => 'nullable|string|max:150',
            'phone'        => 'nullable|string|max:50',
            'service'      => 'nullable|string|max:100',
            'message'      => 'required|string|max:3000',
        ]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status'  => 'success',
                'message' => 'Thank you, ' . e($validated['name']) . '. Your clinical inquiry has been received. Our team will contact you within 24 hours.'
            ]);
        }

        return redirect()->route('contact')->with('success', 'Thank you! Your inquiry has been safely received. A Medical Director will follow up within 24 hours.');
    }

    /**
     * Handle study RFP proposal request.
     */
    public function submitRfp(Request $request)
    {
        $validated = $request->validate([
            'name'              => 'required|string|max:100',
            'email'             => 'required|email|max:150',
            'phase'             => 'required|string|max:100',
            'therapeutic_focus' => 'required|string|max:100',
            'description'       => 'nullable|string|max:3000',
        ]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status'  => 'success',
                'message' => 'Study proposal received. Our Medical Review Team will contact you under NDA within 24 hours.'
            ]);
        }

        return back()->with('success', 'Study proposal received. Our Medical Review Team will contact you under NDA within 24 hours.');
    }
}

