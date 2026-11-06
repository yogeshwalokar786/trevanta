@extends('layouts.app')

@section('title', "Career's | " . setting('site_name', 'Trevanta International'))
@section('description', 'Build your career in global clinical research with Trevanta International. Explore open opportunities across Clinical Operations, Project Management, Regulatory, Medical Affairs, and Biostatistics.')

@section('content')
  <!-- SUBPAGE HERO -->
  <section class="subpage-hero">
    <div class="site-container">
      <span class="eyebrow-jss">CAREER OPPORTUNITIES</span>
      <h1>Build Your Career in Clinical Research</h1>
      <p>
        Join Trevanta International's team of clinical research professionals dedicated to advancing global healthcare through scientific excellence, regulatory integrity, and technology innovation.
      </p>
      <nav class="breadcrumbs" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        <span class="current">Career's</span>
      </nav>
    </div>
  </section>

  <main>
    <!-- SECTION 1: WHY WORK WITH US (Two-Column Layout) -->
    <section class="subpage-content">
      <div class="site-container">
        <div class="two-col-layout">
          <div>
            <span class="eyebrow-jss">PEOPLE &amp; CULTURE</span>
            <h2 style="font-size: 2.2rem; margin-bottom: 1.25rem;">Why Work With Us?</h2>
            
            <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body); margin-bottom: 1.25rem;">
              At Trevanta International, we believe our people are our greatest asset. We offer a dynamic, collaborative work environment where innovation is encouraged and professional growth is supported.
            </p>

            <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body); margin-bottom: 1.5rem;">
              As a global CRO, we provide opportunities to work on diverse clinical trials across multiple therapeutic areas and geographies. Our commitment to quality, patient safety, and operational excellence makes Trevanta an exceptional place to grow your career.
            </p>

            <div class="slide-bullets">
              <span>&bull; Collaborative cross-functional teams across North America, Europe, and Asia</span>
              <span>&bull; Comprehensive continuing education, GCP certification, and leadership paths</span>
              <span>&bull; Direct involvement in pivotal Phase I–IV trials and life-saving therapies</span>
              <span>&bull; Flexible hybrid work arrangements and modern digital trial infrastructure</span>
            </div>
          </div>

          <div>
            <!-- PROJECT SIGNATURE MOTTO CALLOUT -->
            <div class="about-motto-callout">
              <span class="quote-mark">&ldquo;</span>
              <span class="s-phase-tag" style="display: block; margin-bottom: 0.5rem;">OUR COMMITMENT</span>
              <blockquote>
                Our world-class team of highly qualified and experienced workforce enables us to meet client expectations and deliver projects within the timeframe.
              </blockquote>
              <div class="quote-author">
                <strong>Executive Leadership Board</strong>
                <span>Trevanta International</span>
              </div>
            </div>
          </div>
        </div>

        <!-- STATS BANNER -->
        <div style="margin-top: 4rem;">
          <div class="hero-stats-banner">
            <div class="h-stat-item">
              <span class="stat-number">28+</span>
              <span class="stat-desc">Countries of Active Operations</span>
            </div>
            <div class="h-stat-item">
              <span class="stat-number">500+</span>
              <span class="stat-desc">Global Team Members</span>
            </div>
            <div class="h-stat-item">
              <span class="stat-number">25+</span>
              <span class="stat-desc">Years of Scientific Excellence</span>
            </div>
            <div class="h-stat-item">
              <span class="stat-number">100%</span>
              <span class="stat-desc">Audit &amp; Inspection Readiness</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 2: OPEN POSITIONS -->
    <section class="subpage-content alt-bg" id="openings">
      <div class="site-container">
        <div class="section-title-wrap text-center" style="margin-bottom: 2.5rem;">
          <span class="eyebrow-jss">CURRENT OPPORTUNITIES</span>
          <h2 class="main-title">Explore Open Roles</h2>
          <p class="subtitle-jss">
            Find the next milestone in your professional journey with our expanding global teams.
          </p>
        </div>

        <!-- JOB CARDS GRID -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 1.75rem;">
          
          <!-- JOB 1 -->
          <article class="job-card">
            <div class="job-card-header">
              <div class="job-badges">
                <span class="job-badge dept">Clinical Operations</span>
                <span class="job-badge">Full-Time</span>
              </div>
            </div>
            <h3>Senior Clinical Research Associate (Senior CRA)</h3>
            <p>
              Conduct on-site and remote monitoring, verify source documentation, ensure ICH-GCP protocol adherence, and manage relationships with top-tier investigator sites across North America and Europe.
            </p>
            <div class="job-card-footer">
              <span class="job-meta-item">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                Montreal, QC / Boston, MA (Hybrid)
              </span>
              <a href="mailto:{{ setting('contact_email', 'info@trevanta.com') }}?subject=Application:%20Senior%20CRA" class="btn btn-jss-orange" style="font-size: 0.85rem; padding: 0.45rem 1rem;">
                Apply Now &rarr;
              </a>
            </div>
          </article>

          <!-- JOB 2 -->
          <article class="job-card">
            <div class="job-card-header">
              <div class="job-badges">
                <span class="job-badge dept">Project Management</span>
                <span class="job-badge">Full-Time</span>
              </div>
            </div>
            <h3>Global Clinical Project Manager (Phase II/III)</h3>
            <p>
              Lead cross-functional multinational study teams from start-up through database lock. Manage timelines, budgets, vendor governance, and sponsor communications for high-impact oncology and immunology trials.
            </p>
            <div class="job-card-footer">
              <span class="job-meta-item">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                Remote / Global Hubs
              </span>
              <a href="mailto:{{ setting('contact_email', 'info@trevanta.com') }}?subject=Application:%20Clinical%20Project%20Manager" class="btn btn-jss-orange" style="font-size: 0.85rem; padding: 0.45rem 1rem;">
                Apply Now &rarr;
              </a>
            </div>
          </article>

          <!-- JOB 3 -->
          <article class="job-card">
            <div class="job-card-header">
              <div class="job-badges">
                <span class="job-badge dept">Medical Affairs</span>
                <span class="job-badge">Full-Time</span>
              </div>
            </div>
            <h3>Medical Monitor &amp; Safety Physician</h3>
            <p>
              Provide 24/7 medical oversight, protocol eligibility reviews, and adverse event safety adjudication. Collaborate with clinical investigators and study directors to ensure subject safety and trial integrity.
            </p>
            <div class="job-card-footer">
              <span class="job-meta-item">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                Mumbai / Montreal (Remote Option)
              </span>
              <a href="mailto:{{ setting('contact_email', 'info@trevanta.com') }}?subject=Application:%20Medical%20Monitor" class="btn btn-jss-orange" style="font-size: 0.85rem; padding: 0.45rem 1rem;">
                Apply Now &rarr;
              </a>
            </div>
          </article>

          <!-- JOB 4 -->
          <article class="job-card">
            <div class="job-card-header">
              <div class="job-badges">
                <span class="job-badge dept">Regulatory Affairs</span>
                <span class="job-badge">Full-Time</span>
              </div>
            </div>
            <h3>Regulatory Affairs Manager (IND / CTA / eCTD)</h3>
            <p>
              Author and publish regulatory briefing packages, IND submissions, and Clinical Trial Authorizations (CTA) across FDA, EMA, Health Canada, and Asian health authorities.
            </p>
            <div class="job-card-footer">
              <span class="job-meta-item">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                London, UK / Remote
              </span>
              <a href="mailto:{{ setting('contact_email', 'info@trevanta.com') }}?subject=Application:%20Regulatory%20Affairs%20Manager" class="btn btn-jss-orange" style="font-size: 0.85rem; padding: 0.45rem 1rem;">
                Apply Now &rarr;
              </a>
            </div>
          </article>

          <!-- JOB 5 -->
          <article class="job-card">
            <div class="job-card-header">
              <div class="job-badges">
                <span class="job-badge dept">Biostatistics</span>
                <span class="job-badge">Full-Time</span>
              </div>
            </div>
            <h3>Principal Biostatistician (SAS &amp; R Lead)</h3>
            <p>
              Develop Statistical Analysis Plans (SAP), conduct sample size re-estimations, design adaptive Bayesian trials, and oversee CDISC SDTM/ADaM package generation for global regulatory filings.
            </p>
            <div class="job-card-footer">
              <span class="job-meta-item">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                Remote / Global
              </span>
              <a href="mailto:{{ setting('contact_email', 'info@trevanta.com') }}?subject=Application:%20Principal%20Biostatistician" class="btn btn-jss-orange" style="font-size: 0.85rem; padding: 0.45rem 1rem;">
                Apply Now &rarr;
              </a>
            </div>
          </article>

          <!-- JOB 6 -->
          <article class="job-card">
            <div class="job-card-header">
              <div class="job-badges">
                <span class="job-badge dept">Quality Assurance</span>
                <span class="job-badge">Full-Time</span>
              </div>
            </div>
            <h3>GCP &amp; GLP Quality Assurance Auditor</h3>
            <p>
              Plan and execute investigator site audits, vendor qualification audits, and mock inspections to maintain 100% inspection readiness across all international regulatory frameworks.
            </p>
            <div class="job-card-footer">
              <span class="job-meta-item">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                Faridabad / Mumbai / Remote
              </span>
              <a href="mailto:{{ setting('contact_email', 'info@trevanta.com') }}?subject=Application:%20QA%20Auditor" class="btn btn-jss-orange" style="font-size: 0.85rem; padding: 0.45rem 1rem;">
                Apply Now &rarr;
              </a>
            </div>
          </article>

        </div>
      </div>
    </section>

    <!-- SECTION 3: HIRING PROCESS -->
    <section class="subpage-content">
      <div class="site-container">
        <div class="section-title-wrap text-center" style="margin-bottom: 3rem;">
          <span class="eyebrow-jss">SEAMLESS ONBOARDING</span>
          <h2 class="main-title">Our Hiring Process</h2>
          <p class="subtitle-jss">
            A transparent, collaborative candidate journey designed to understand your expertise and career goals.
          </p>
        </div>

        <div class="hiring-process-grid">
          <!-- STEP 1 -->
          <div class="process-step-box">
            <span class="process-step-num">01</span>
            <h4>Application &amp; Review</h4>
            <p>Submit your resume and credentials. Our Talent Acquisition team evaluates your experience against open study requirements.</p>
          </div>

          <!-- STEP 2 -->
          <div class="process-step-box">
            <span class="process-step-num">02</span>
            <h4>Initial Screening</h4>
            <p>A 30-minute discovery conversation to discuss your background, values, career aspirations, and Trevanta's global mission.</p>
          </div>

          <!-- STEP 3 -->
          <div class="process-step-box">
            <span class="process-step-num">03</span>
            <h4>Technical Discussion</h4>
            <p>Deep-dive interview with Department Leads, Medical Directors, and peers to evaluate technical competencies and trial experience.</p>
          </div>

          <!-- STEP 4 -->
          <div class="process-step-box">
            <span class="process-step-num">04</span>
            <h4>Offer &amp; Onboarding</h4>
            <p>Formal competitive offer followed by comprehensive global onboarding, SOP training, and dedicated mentorship support.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 4: SPONTANEOUS APPLICATION / RESUME SUBMISSION -->
    <section style="background-color: var(--jss-navy-dark); color: #ffffff; padding: 4.5rem 0; text-align: center;">
      <div class="site-container">
        <span class="eyebrow-jss" style="color: #ff9a6b;">SPONTANEOUS APPLICATION</span>
        <h2 style="color: #ffffff; font-size: 2.2rem; margin-bottom: 1rem;">Don't See Your Specific Role?</h2>
        <p style="color: #cbd5e1; font-size: 1.05rem; max-width: 680px; margin: 0 auto 2rem;">
          We are always eager to connect with passionate clinical research associates, biostatisticians, medical writers, and project managers. Submit your resume to our global talent pool.
        </p>
        <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
          <a href="mailto:{{ setting('contact_email', 'info@trevanta.com') }}?subject=Spontaneous%20Application%20-%20General%20Talent%20Pool" class="btn btn-jss-orange btn-lg">
            Email Your Resume to {{ setting('contact_email', 'info@trevanta.com') }} &rarr;
          </a>
          <a href="{{ route('contact') }}" class="btn btn-jss-outline btn-lg" style="color: #ffffff; border-color: rgba(255,255,255,0.4);">
            General Inquiry &rarr;
          </a>
        </div>
      </div>
    </section>
  </main>
@endsection
