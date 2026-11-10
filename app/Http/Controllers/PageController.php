<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\Blog;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    /**
     * Display the home page.
     */
    public function home()
    {
        try {
            $blogs = Blog::published()->orderBy('published_at', 'desc')->take(4)->get();
        } catch (\Throwable $e) {
            $blogs = collect();
        }

        return view('pages.home', compact('blogs'));
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
        try {
            $blogs = Blog::published()->orderBy('published_at', 'desc')->get();
        } catch (\Throwable $e) {
            $blogs = collect();
        }

        $featuredBlog = $blogs->firstWhere('is_featured', true) ?: $blogs->first();
        $categories = $blogs->pluck('category')->unique()->filter()->values();

        return view('pages.blog', compact('blogs', 'featuredBlog', 'categories'));
    }

    /**
     * Display single blog / clinical insight detail page.
     */
    public function blogDetail($slug)
    {
        $blog = null;
        try {
            $blog = Blog::published()->where('slug', $slug)->first();
        } catch (\Throwable $e) {
            // DB fallback
        }

        if (!$blog) {
            abort(404, 'Clinical insight or blog article not found.');
        }

        try {
            $relatedBlogs = Blog::published()
                ->where('slug', '!=', $blog->slug)
                ->where('category', $blog->category)
                ->take(3)
                ->get();

            if ($relatedBlogs->isEmpty()) {
                $relatedBlogs = Blog::published()->where('slug', '!=', $blog->slug)->take(3)->get();
            }
        } catch (\Throwable $e) {
            $relatedBlogs = collect();
        }

        return view('pages.blog-detail', compact('blog', 'relatedBlogs'));
    }

    /**
     * Curated fallback blogs in case database is pending connection.
     */
    protected function getDefaultBlogs()
    {
        return collect([]);
    }

    /**
     * Display the careers page.
     */
    public function careers()
    {
        try {
            $jobs = \App\Models\JobOpening::active()->orderBy('order')->latest()->get();
        } catch (\Throwable $e) {
            $jobs = collect([]);
        }

        return view('pages.careers', compact('jobs'));
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

        try {
            Inquiry::create([
                'type'              => 'contact',
                'name'              => $validated['name'],
                'email'             => $validated['email'],
                'phone'             => $validated['phone'] ?? null,
                'organization'      => $validated['organization'] ?? null,
                'therapeutic_focus' => $validated['service'] ?? null,
                'message'           => $validated['message'],
                'status'            => 'new',
            ]);
        } catch (\Throwable $e) {
            Log::warning('Could not record contact submission: ' . $e->getMessage());
        }

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

        try {
            Inquiry::create([
                'type'              => 'rfp',
                'name'              => $validated['name'],
                'email'             => $validated['email'],
                'phase'             => $validated['phase'],
                'therapeutic_focus' => $validated['therapeutic_focus'],
                'message'           => $validated['description'] ?? null,
                'status'            => 'new',
            ]);
        } catch (\Throwable $e) {
            Log::warning('Could not record RFP submission: ' . $e->getMessage());
        }

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status'  => 'success',
                'message' => 'Study proposal received. Our Medical Review Team will contact you under NDA within 24 hours.'
            ]);
        }

        return back()->with('success', 'Study proposal received. Our Medical Review Team will contact you under NDA within 24 hours.');
    }
}

