@extends('layouts.app')

@section('title', 'Insights & Clinical Research Blogs | AstraClinical Research')
@section('description', 'Explore peer-reviewed perspectives, regulatory briefings, decentralized trial methodologies, and biostatistical breakthroughs from AstraClinical Research Medical Directors.')

@section('content')
  <!-- SUBPAGE HERO -->
  <section class="subpage-hero" style="background: linear-gradient(135deg, var(--jss-navy-dark) 0%, var(--jss-navy) 100%); color: #ffffff; padding: 4.5rem 0 3.5rem 0;">
    <div class="site-container">
      <span class="eyebrow-accent" style="background: rgba(242, 98, 36, 0.2); color: #ffa07a;">SCIENTIFIC INTELLIGENCE UNIT</span>
      <h1 style="color: #ffffff; font-size: 2.8rem; margin-top: 0.5rem; margin-bottom: 1rem;">Clinical Insights, Regulatory Briefs &amp; Whitepapers</h1>
      <p style="color: #cbd5e1; max-width: 760px; font-size: 1.1rem; line-height: 1.7;">
        Authoritative guidance from AstraClinical's medical monitors, biostatisticians, and regulatory specialists on accelerating drug approvals while upholding GCP integrity.
      </p>
      <nav class="breadcrumbs" aria-label="Breadcrumb" style="display: flex; gap: 0.5rem; margin-top: 1.5rem; font-size: 0.875rem; color: #94a3b8;">
        <a href="{{ route('home') }}" style="color: #cbd5e1;">Home</a>
        <span>/</span>
        <span class="current" style="color: var(--jss-orange);">Insights &amp; Blog</span>
      </nav>
    </div>
  </section>

  <!-- MAIN BLOG CONTENT -->
  <main class="blogs-section" style="padding-top: 4rem;">
    <div class="site-container">

      <!-- FEATURED SPOTLIGHT ARTICLE -->
      <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-md); margin-bottom: 4rem; display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 0;" class="featured-spotlight-card">
        <div style="padding: 3rem; display: flex; flex-direction: column; justify-content: center;">
          <div style="display: flex; gap: 0.75rem; align-items: center; margin-bottom: 1rem;">
            <span class="blog-card-badge" style="position: static;">FEATURED WHITEPAPER</span>
            <span style="font-size: 0.8rem; color: var(--text-light);">September 08, 2026 • 7 min read</span>
          </div>
          <h2 style="font-size: 2rem; line-height: 1.3; margin-bottom: 1rem; color: var(--jss-navy);">
            Navigating ICH E6(R3) Modernization: Risk-Based Quality Management in Global Submissions
          </h2>
          <p style="color: var(--text-body); font-size: 1rem; line-height: 1.7; margin-bottom: 2rem;">
            The transition to ICH E6(R3) marks the most significant GCP update in a decade. Our regulatory team examines critical-to-quality factors, computer system validation for decentralized apps, and proportional monitoring frameworks harmonized between the US FDA and European EMA.
          </p>
          <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid var(--border-light); padding-top: 1.5rem;">
            <div style="display: flex; align-items: center; gap: 0.75rem;">
              <div class="blog-author-avatar">MC</div>
              <div>
                <div class="blog-author-name">Michael Chen, RAC</div>
                <div class="blog-author-title">Senior Director Regulatory &amp; Quality</div>
              </div>
            </div>
            <button class="btn btn-jss-orange" onclick="openArticleModal('regulatory-e6r3')">
              Read Whitepaper &rarr;
            </button>
          </div>
        </div>
        <div style="background: linear-gradient(135deg, var(--jss-navy) 0%, var(--jss-navy-light) 100%); display: flex; align-items: center; justify-content: center; position: relative; min-height: 320px;">
          <div class="blog-media-pattern"></div>
          <div style="text-align: center; color: #ffffff; padding: 2rem; z-index: 2;">
            <div style="width: 72px; height: 72px; border-radius: 50%; background: rgba(242, 98, 36, 0.2); border: 2px solid var(--jss-orange); display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
              <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
            </div>
            <h4 style="color: #ffffff; font-size: 1.3rem; margin-bottom: 0.5rem;">ICH E6(R3) Regulatory Playbook</h4>
            <p style="color: #cbd5e1; font-size: 0.9rem; max-width: 320px; margin: 0 auto;">Full Sponsor Implementation Guide &amp; SOP Audit Checklist</p>
          </div>
        </div>
      </div>

      <!-- FILTER TABS BAR -->
      <div class="blog-filter-bar">
        <button class="blog-filter-btn active" onclick="filterBlogs('all', this)">All Perspectives</button>
        <button class="blog-filter-btn" onclick="filterBlogs('Clinical Strategy', this)">Clinical Strategy</button>
        <button class="blog-filter-btn" onclick="filterBlogs('Regulatory Affairs', this)">Regulatory Affairs</button>
        <button class="blog-filter-btn" onclick="filterBlogs('Pharmacovigilance', this)">Pharmacovigilance</button>
        <button class="blog-filter-btn" onclick="filterBlogs('Biostatistics', this)">Biostatistics</button>
      </div>

      <!-- BLOGS ARTICLES GRID -->
      <div class="blogs-grid">
        
        <!-- ARTICLE 1 -->
        <article class="blog-card" data-category="Clinical Strategy" onclick="openArticleModal('oncology-dct')">
          <div class="blog-card-media">
            <div class="blog-media-pattern"></div>
            <span class="blog-card-badge">Clinical Strategy</span>
            <span class="blog-read-time">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              6 min read
            </span>
            <div style="color: #ffffff; font-size: 3rem; opacity: 0.25;">
              <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M10 2v7.31L4.12 20.27A1 1 0 0 0 5 22h14a1 1 0 0 0 .88-1.73L14 9.31V2"/></svg>
            </div>
          </div>
          <div class="blog-card-body">
            <span class="blog-meta-date">September 15, 2026</span>
            <h3 class="blog-card-title">Accelerating Oncology Trials Through Decentralized Architecture &amp; Home Nursing</h3>
            <p class="blog-card-excerpt">
              How combining centralized academic hospital monitoring with localized home nursing and mobile health technologies increased patient retention by 34% in complex Phase II/III solid tumor protocols.
            </p>
            <div class="blog-author-bar">
              <div class="blog-author-info">
                <div class="blog-author-avatar">SJ</div>
                <div>
                  <div class="blog-author-name">Dr. Sarah Jenkins</div>
                  <div class="blog-author-title">VP Clinical Operations</div>
                </div>
              </div>
              <span class="blog-read-btn">Read Article &rarr;</span>
            </div>
          </div>
        </article>

        <!-- ARTICLE 2 -->
        <article class="blog-card" data-category="Regulatory Affairs" onclick="openArticleModal('regulatory-e6r3')">
          <div class="blog-card-media">
            <div class="blog-media-pattern"></div>
            <span class="blog-card-badge">Regulatory Affairs</span>
            <span class="blog-read-time">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              7 min read
            </span>
            <div style="color: #ffffff; font-size: 3rem; opacity: 0.25;">
              <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
            </div>
          </div>
          <div class="blog-card-body">
            <span class="blog-meta-date">September 08, 2026</span>
            <h3 class="blog-card-title">Navigating ICH E6(R3) Modernization: Risk-Based Quality Management in Global Submissions</h3>
            <p class="blog-card-excerpt">
              A critical analysis of the finalized ICH E6(R3) guidelines and practical guidance on implementing governance frameworks that satisfy both US FDA and European EMA inspectors.
            </p>
            <div class="blog-author-bar">
              <div class="blog-author-info">
                <div class="blog-author-avatar">MC</div>
                <div>
                  <div class="blog-author-name">Michael Chen, RAC</div>
                  <div class="blog-author-title">Senior Director Regulatory</div>
                </div>
              </div>
              <span class="blog-read-btn">Read Article &rarr;</span>
            </div>
          </div>
        </article>

        <!-- ARTICLE 3 -->
        <article class="blog-card" data-category="Pharmacovigilance" onclick="openArticleModal('pv-signal-ai')">
          <div class="blog-card-media">
            <div class="blog-media-pattern"></div>
            <span class="blog-card-badge">Pharmacovigilance</span>
            <span class="blog-read-time">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              5 min read
            </span>
            <div style="color: #ffffff; font-size: 3rem; opacity: 0.25;">
              <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
          </div>
          <div class="blog-card-body">
            <span class="blog-meta-date">August 29, 2026</span>
            <h3 class="blog-card-title">Machine Learning Signal Detection in High-Volume Post-Marketing Pharmacovigilance</h3>
            <p class="blog-card-excerpt">
              How AstraClinical implemented automated natural language processing (NLP) to reduce ICSR intake triage latency by 62% while maintaining a 99.8% regulatory on-time filing benchmark.
            </p>
            <div class="blog-author-bar">
              <div class="blog-author-info">
                <div class="blog-author-avatar">ER</div>
                <div>
                  <div class="blog-author-name">Dr. Elena Rostova</div>
                  <div class="blog-author-title">Global Head of Drug Safety</div>
                </div>
              </div>
              <span class="blog-read-btn">Read Article &rarr;</span>
            </div>
          </div>
        </article>

        <!-- ARTICLE 4 -->
        <article class="blog-card" data-category="Biostatistics" onclick="openArticleModal('adaptive-biostat')">
          <div class="blog-card-media">
            <div class="blog-media-pattern"></div>
            <span class="blog-card-badge">Biostatistics</span>
            <span class="blog-read-time">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              8 min read
            </span>
            <div style="color: #ffffff; font-size: 3rem; opacity: 0.25;">
              <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
            </div>
          </div>
          <div class="blog-card-body">
            <span class="blog-meta-date">August 14, 2026</span>
            <h3 class="blog-card-title">Adaptive Clinical Trial Designs: Optimizing Sample Size Re-Estimation &amp; Interim Analyses</h3>
            <p class="blog-card-excerpt">
              Examining Bayesian adaptive algorithms and group sequential designs that permit sample size recalculation and early futility stopping without inflating Type I error rates.
            </p>
            <div class="blog-author-bar">
              <div class="blog-author-info">
                <div class="blog-author-avatar">RV</div>
                <div>
                  <div class="blog-author-name">Dr. Robert Vance</div>
                  <div class="blog-author-title">Chief Biostatistician</div>
                </div>
              </div>
              <span class="blog-read-btn">Read Article &rarr;</span>
            </div>
          </div>
        </article>

      </div>

      <!-- SPONSOR SCIENTIFIC BRIEFING SUBSCRIPTION -->
      <div style="background: linear-gradient(135deg, var(--jss-navy) 0%, var(--jss-navy-dark) 100%); border-radius: var(--radius-lg); padding: 3.5rem; color: #ffffff; margin-top: 5rem; text-align: center;">
        <span class="eyebrow-accent" style="background: rgba(242, 98, 36, 0.25); color: #ffa07a;">REGULATORY &amp; CLINICAL UPDATES</span>
        <h3 style="color: #ffffff; font-size: 2.2rem; margin-top: 0.75rem; margin-bottom: 1rem;">Receive Monthly Clinical Trial Intelligence</h3>
        <p style="color: #cbd5e1; max-width: 600px; margin: 0 auto 2rem; font-size: 1rem; line-height: 1.6;">
          Join over 4,500 biotech executives, clinical operations directors, and regulatory affairs professionals who rely on AstraClinical briefings.
        </p>
        <form onsubmit="event.preventDefault(); showJssToast('Subscription Confirmed', 'You have been registered for our Monthly Clinical Intelligence Briefings.'); this.reset();" style="max-width: 520px; margin: 0 auto; display: flex; gap: 0.75rem; flex-wrap: wrap; justify-content: center;">
          <input type="email" required placeholder="Enter corporate work email..." style="flex-grow: 1; padding: 0.85rem 1.25rem; border-radius: var(--radius-sm); border: 1px solid rgba(255,255,255,0.3); background: rgba(255,255,255,0.08); color: #ffffff; outline: none; font-size: 0.95rem;">
          <button type="submit" class="btn btn-jss-orange" style="padding: 0.85rem 1.75rem;">Subscribe &rarr;</button>
        </form>
      </div>

    </div>
  </main>
@endsection
