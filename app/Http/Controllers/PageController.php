<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\Blog;
use App\Models\JobOpening;
use App\Models\JobApplication;
use App\Models\Policy;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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
     * Display a public legal / policy page.
     */
    public function policyDetail($slug)
    {
        try {
            $policy = Policy::where('slug', $slug)->first();
        } catch (\Throwable $e) {
            $policy = null;
        }

        if (!$policy) {
            abort(404, 'Compliance policy or legal statement not found.');
        }

        try {
            $allPolicies = Policy::where('is_active', true)
                ->orderBy('order', 'asc')
                ->orderBy('title', 'asc')
                ->get();
        } catch (\Throwable $e) {
            $allPolicies = collect([$policy]);
        }

        return view('pages.policy-detail', compact('policy', 'allPolicies'));
    }

    /**
     * Sanitize input strings: strip HTML tags and null bytes.
     */
    protected function cleanInput(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }
        $clean = str_replace(chr(0), '', $value);
        $clean = strip_tags($clean);
        return trim($clean);
    }

    /**
     * Handle contact form submission.
     */
    public function submitContact(Request $request)
    {
        // Anti-Spam Honeypot trap
        if ($request->filled('website_hp') || $request->filled('hp_bio')) {
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json(['status' => 'success', 'message' => 'Your inquiry has been received.']);
            }
            return redirect()->route('contact')->with('success', 'Thank you! Your inquiry has been safely received.');
        }

        $validated = $request->validate([
            'name'         => 'required|string|max:100',
            'email'        => 'required|email:rfc,dns|max:150',
            'organization' => 'nullable|string|max:150',
            'phone'        => 'nullable|string|max:50',
            'service'      => 'nullable|string|max:100',
            'message'      => 'required|string|max:3000',
        ]);

        $cleanName         = $this->cleanInput($validated['name']);
        $cleanEmail        = filter_var(trim($validated['email']), FILTER_SANITIZE_EMAIL);
        $cleanPhone        = $this->cleanInput($validated['phone'] ?? null);
        $cleanOrganization = $this->cleanInput($validated['organization'] ?? null);
        $cleanService      = $this->cleanInput($validated['service'] ?? null);
        $cleanMessage      = $this->cleanInput($validated['message']);

        try {
            Inquiry::create([
                'type'              => 'contact',
                'name'              => $cleanName,
                'email'             => $cleanEmail,
                'phone'             => $cleanPhone,
                'organization'      => $cleanOrganization,
                'therapeutic_focus' => $cleanService,
                'message'           => $cleanMessage,
                'status'            => 'new',
            ]);
        } catch (\Throwable $e) {
            Log::warning('Could not record contact submission: ' . $e->getMessage());
        }

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status'  => 'success',
                'message' => 'Thank you, ' . e($cleanName) . '. Your clinical inquiry has been received. Our team will contact you within 24 hours.'
            ]);
        }

        return redirect()->route('contact')->with('success', 'Thank you! Your inquiry has been safely received. A Medical Director will follow up within 24 hours.');
    }

    /**
     * Handle study RFP proposal request.
     */
    public function submitRfp(Request $request)
    {
        // Anti-Spam Honeypot trap
        if ($request->filled('website_hp') || $request->filled('hp_bio')) {
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json(['status' => 'success', 'message' => 'Study proposal received.']);
            }
            return back()->with('success', 'Study proposal received.');
        }

        $validated = $request->validate([
            'name'              => 'required|string|max:100',
            'email'             => 'required|email:rfc,dns|max:150',
            'phase'             => 'required|string|max:100',
            'therapeutic_focus' => 'required|string|max:100',
            'description'       => 'nullable|string|max:3000',
        ]);

        $cleanName   = $this->cleanInput($validated['name']);
        $cleanEmail  = filter_var(trim($validated['email']), FILTER_SANITIZE_EMAIL);
        $cleanPhase  = $this->cleanInput($validated['phase']);
        $cleanFocus  = $this->cleanInput($validated['therapeutic_focus']);
        $cleanDesc   = $this->cleanInput($validated['description'] ?? null);

        try {
            Inquiry::create([
                'type'              => 'rfp',
                'name'              => $cleanName,
                'email'             => $cleanEmail,
                'phase'             => $cleanPhase,
                'therapeutic_focus' => $cleanFocus,
                'message'           => $cleanDesc,
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

    /**
     * Handle job application form submission.
     */
    public function submitApplication(Request $request)
    {
        // Anti-Spam Honeypot trap
        if ($request->filled('website_hp') || $request->filled('hp_bio')) {
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json(['status' => 'success', 'message' => 'Application received.']);
            }
            return redirect()->back()->with('application_success', 'Your application has been submitted successfully.');
        }

        $validated = $request->validate([
            'name'             => 'required|string|max:150',
            'email'            => 'required|email:rfc,dns|max:150',
            'phone'            => 'nullable|string|max:50',
            'job_opening_id'   => 'nullable|integer',
            'position_title'   => 'required|string|max:255',
            'current_location' => 'nullable|string|max:150',
            'experience'       => 'nullable|string|max:100',
            'resume'           => 'required|file|mimes:pdf,doc,docx|max:10240',
            'cover_letter'     => 'nullable|string|max:4000',
        ]);

        $resumePath = null;
        if ($request->hasFile('resume') && $request->file('resume')->isValid()) {
            $file = $request->file('resume');
            $extension = strtolower($file->getClientOriginalExtension());
            $allowedExtensions = ['pdf', 'doc', 'docx'];

            if (!in_array($extension, $allowedExtensions)) {
                return back()->withErrors(['resume' => 'Invalid file extension. Only PDF, DOC, and DOCX documents are permitted.'])->withInput();
            }

            $uploadDir = public_path('uploads/resumes');
            if (!File::isDirectory($uploadDir)) {
                File::makeDirectory($uploadDir, 0755, true, true);
            }

            // Generate cryptographically secure random filename to prevent overwrites & path guessing
            $filename = Str::random(40) . '.' . $extension;
            $file->move($uploadDir, $filename);
            @chmod($uploadDir . '/' . $filename, 0644);
            $resumePath = 'uploads/resumes/' . $filename;
        }

        $cleanName     = $this->cleanInput($validated['name']);
        $cleanEmail    = filter_var(trim($validated['email']), FILTER_SANITIZE_EMAIL);
        $cleanPhone    = $this->cleanInput($validated['phone'] ?? null);
        $cleanPosition = $this->cleanInput($validated['position_title']);
        $cleanLocation = $this->cleanInput($validated['current_location'] ?? null);
        $cleanExp      = $this->cleanInput($validated['experience'] ?? null);
        $cleanCover    = $this->cleanInput($validated['cover_letter'] ?? null);

        try {
            JobApplication::create([
                'job_opening_id'   => $validated['job_opening_id'] ?? null,
                'position_title'   => $cleanPosition,
                'name'             => $cleanName,
                'email'            => $cleanEmail,
                'phone'            => $cleanPhone,
                'current_location' => $cleanLocation,
                'experience'       => $cleanExp,
                'resume_path'      => $resumePath,
                'cover_letter'     => $cleanCover,
                'status'           => 'new',
            ]);
        } catch (\Throwable $e) {
            Log::warning('Could not record job application: ' . $e->getMessage());
        }

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status'  => 'success',
                'message' => 'Thank you, ' . e($cleanName) . '! Your application for "' . e($cleanPosition) . '" has been submitted successfully. Our Talent Acquisition team will review your profile.',
            ]);
        }

        return redirect()->back()->with('application_success', 'Thank you, ' . $cleanName . '! Your application for "' . $cleanPosition . '" has been submitted successfully. Our Talent Acquisition team will review your profile.');
    }
}

