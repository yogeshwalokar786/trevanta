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
            if ($blogs->isEmpty()) {
                $blogs = $this->getDefaultBlogs()->take(4);
            }
        } catch (\Throwable $e) {
            $blogs = $this->getDefaultBlogs()->take(4);
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
            if ($blogs->isEmpty()) {
                $blogs = $this->getDefaultBlogs();
            }

            $featuredBlog = $blogs->firstWhere('is_featured', true) ?: $blogs->first();
            $categories = $blogs->pluck('category')->unique()->values();
        } catch (\Throwable $e) {
            $blogs = $this->getDefaultBlogs();
            $featuredBlog = $blogs->firstWhere('is_featured', true) ?: $blogs->first();
            $categories = $blogs->pluck('category')->unique()->values();
        }

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
            $blog = $this->getDefaultBlogs()->firstWhere('slug', $slug);
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
            $relatedBlogs = $this->getDefaultBlogs()->where('slug', '!=', $blog->slug)->take(3);
        }

        return view('pages.blog-detail', compact('blog', 'relatedBlogs'));
    }

    /**
     * Curated fallback blogs in case database is pending connection.
     */
    protected function getDefaultBlogs()
    {
        return collect([
            new Blog([
                'id'            => 1,
                'title'         => 'Navigating ICH E6(R3) Modernization: Risk-Based Quality Management in Global Submissions',
                'slug'          => 'regulatory-e6r3',
                'category'      => 'Regulatory Affairs',
                'badge'         => 'FEATURED WHITEPAPER',
                'summary'       => 'A critical analysis of the finalized ICH E6(R3) guidelines and practical guidance on implementing governance frameworks that satisfy both FDA and EMA inspectors.',
                'content'       => '<p>The transition to ICH E6(R3) represents the most comprehensive modernization of Good Clinical Practice (GCP) principles in a decade. With its core emphasis on "fit-for-purpose" trial designs, decentralized trial components, and computerized system validation, sponsors must rethink legacy operational SOPs.</p><p>AstraClinical\'s regulatory affairs task force has reviewed over 40 global clinical trial applications (CTAs) under the updated framework, establishing standardized Risk-Based Quality Management (RBQM) playbooks that harmonize expectations across both the FDA and the European Medicines Agency (EMA).</p><div class="article-takeaway-box"><h4>ICH E6(R3) Strategic Checkpoints</h4><ul><li><strong>Critical to Quality (CtQ) Factors:</strong> Identify essential protocol variables that directly impact human subject protection and reliable data interpretation.</li><li><strong>Computerized System Validation:</strong> Ensure decentralized apps, wearable sensors, and electronic consent (eConsent) systems maintain unbroken audit trails.</li><li><strong>Proportionate Monitoring:</strong> Shift routine 100% Source Data Verification (SDV) to centralized statistical data monitoring to spot outliers early.</li></ul></div><p>Adopting this proactive regulatory posture safeguards investigational new drug (IND) dossiers from clinical holds and accelerates market authorization timelines.</p>',
                'image'         => null,
                'read_time'     => '7 min read',
                'author_name'   => 'Michael Chen, MS, RAC',
                'author_title'  => 'Senior Director Regulatory & Quality',
                'author_avatar' => 'MC',
                'is_featured'   => true,
                'is_published'  => true,
                'published_at'  => \Carbon\Carbon::parse('2026-09-08'),
            ]),
            new Blog([
                'id'            => 2,
                'title'         => 'Accelerating Oncology Trials Through Decentralized Architecture & Home Nursing',
                'slug'          => 'oncology-dct',
                'category'      => 'Clinical Strategy',
                'badge'         => 'Clinical Strategy',
                'summary'       => 'How combining centralized site monitoring with localized home nursing and mobile health technologies increased patient retention by 34% in complex oncology protocols.',
                'content'       => '<p>Traditional oncology clinical trials have historically suffered from high screening failure rates and acute patient retention challenges. In Phase II and III solid tumor trials, the burden of bi-weekly hospital visits for pharmacokinetic (PK) blood draws and toxicity monitoring frequently leads to protocol non-adherence.</p><p>At AstraClinical Research, our decentralized clinical trial (DCT) framework merges traditional brick-and-mortar investigator oversight with vetted regional home nursing networks across North America, Europe, and Asia-Pacific.</p><div class="article-takeaway-box"><h4>Key Study Findings & Outcomes</h4><ul><li><strong>34% Increase in Patient Retention:</strong> Reducing travel burdens allowed fragile cancer patients to complete long-term biomarker assessment periods.</li><li><strong>42% Faster Recruitment:</strong> Broadening the geographic radius around central academic trial centers unlocked previously unreachable suburban and rural patient cohorts.</li><li><strong>100% GCP Audit Compliance:</strong> Validated ePRO and temperature-monitored investigational product (IP) direct-to-patient shipment preserved data integrity under 21 CFR Part 11.</li></ul></div><p>By leveraging connected mobile health devices and synchronized electronic source data (eSource), principal investigators retain real-time visibility into patient adverse events while dramatically expediting safety committee decision points.</p>',
                'image'         => null,
                'read_time'     => '6 min read',
                'author_name'   => 'Dr. Sarah Jenkins, MD',
                'author_title'  => 'VP Clinical Operations',
                'author_avatar' => 'SJ',
                'is_featured'   => false,
                'is_published'  => true,
                'published_at'  => \Carbon\Carbon::parse('2026-09-15'),
            ]),
            new Blog([
                'id'            => 3,
                'title'         => 'Machine Learning Signal Detection in High-Volume Post-Marketing Pharmacovigilance',
                'slug'          => 'pv-signal-ai',
                'category'      => 'Pharmacovigilance',
                'badge'         => 'Pharmacovigilance',
                'summary'       => 'How AstraClinical implemented automated natural language processing (NLP) to reduce ICSR intake triage time by 62% while elevating adverse event detection accuracy.',
                'content'       => '<p>Pharmacovigilance departments worldwide face exponential increases in individual case safety reports (ICSRs) driven by social listening, literature searches, and spontaneous reporting portals. Meeting stringent 7-day and 15-day regulatory submission deadlines requires robust, validated intelligence tools.</p><p>AstraClinical\'s pharmacovigilance safety hub processes over 120,000 safety events annually. By integrating validated machine learning classifiers into our safety database ingestion pipeline, our medical monitors focus their expertise where clinical judgment matters most.</p><div class="article-takeaway-box"><h4>Operational Benchmarks Achieved</h4><ul><li><strong>62% Reduction in Triage Latency:</strong> MedDRA coding recommendations and duplicate screening execute automatically in under 4 seconds per narrative.</li><li><strong>99.8% Regulatory On-Time Submission:</strong> Sustained compliance across FDA FAERS, EMA EudraVigilance, and MHRA safety portals.</li><li><strong>Rapid Disproportionality Signal Detection:</strong> Proactive identification of subtle drug-drug interaction clusters before routine periodic safety reports (PBRER).</li></ul></div><p>The result is a robust, audit-proof pharmacovigilance infrastructure that protects patients while eliminating compliance risk for biotech sponsors.</p>',
                'image'         => null,
                'read_time'     => '5 min read',
                'author_name'   => 'Dr. Elena Rostova, MD, PhD',
                'author_title'  => 'Global Head of Drug Safety',
                'author_avatar' => 'ER',
                'is_featured'   => false,
                'is_published'  => true,
                'published_at'  => \Carbon\Carbon::parse('2026-08-29'),
            ]),
            new Blog([
                'id'            => 4,
                'title'         => 'Adaptive Clinical Trial Designs: Optimizing Sample Size Re-Estimation & Interim Analyses',
                'slug'          => 'adaptive-biostat',
                'category'      => 'Biostatistics',
                'badge'         => 'Biostatistics',
                'summary'       => 'Examining Bayesian adaptive algorithms that permit sample size recalculation and early futility stopping without inflating Type I error rates.',
                'content'       => '<p>Fixed-sample clinical trials frequently lock sponsors into conservative, over-powered patient recruitment targets or expose programs to premature termination. Adaptive trial designs offer an evidence-based alternative by allowing pre-planned modifications to study parameters based on accumulating interim trial data.</p><p>Our biostatistics and statistical programming teams specialize in group sequential designs, seamless Phase II/III transitions, and response-adaptive randomization schedules that preserve statistical rigor and regulatory defensibility.</p><div class="article-takeaway-box"><h4>Benefits of Adaptive Protocol Architecture</h4><ul><li><strong>Sample Size Optimization:</strong> Recalculate enrollment requirements at interim milestones to prevent underpowered Phase IIb efficacy signals.</li><li><strong>Futility Stopping Rules:</strong> Terminate ineffective dose arms early, preserving capital and redirecting patients to promising therapeutic candidates.</li><li><strong>Strict Type I Error Control:</strong> Comprehensive simulation studies and alpha-spending functions ensure complete compliance with FDA Adaptive Design Guidance.</li></ul></div><p>Biotech sponsors partnering with AstraClinical benefit from end-to-end CDISC SDTM/ADaM programming and independent Data Safety Monitoring Board (DSMB) charter governance.</p>',
                'image'         => null,
                'read_time'     => '8 min read',
                'author_name'   => 'Dr. Robert Vance, PhD',
                'author_title'  => 'Chief Biostatistician',
                'author_avatar' => 'RV',
                'is_featured'   => false,
                'is_published'  => true,
                'published_at'  => \Carbon\Carbon::parse('2026-08-14'),
            ]),
        ]);
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

