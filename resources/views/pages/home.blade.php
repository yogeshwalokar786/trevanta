@extends('layouts.app')

@section('title', setting('home_meta_title', 'Trevanta International | Global Clinical Research Organization (CRO)'))
@section('description', setting('home_meta_description', 'Trevanta International is an international full-service Clinical Research Organization providing Phase I-IV trials, Pharmacovigilance, Regulatory Affairs, and Biostatistics across North America, Europe, Latin America, and Asia.'))

@push('seo')
  <link rel="canonical" href="{{ setting('canonical_url_base', url('/')) }}">
  <meta name="robots" content="{{ setting('meta_robots_default', 'index, follow') }}">
  @if(setting('home_meta_keywords'))
    <meta name="keywords" content="{{ setting('home_meta_keywords') }}">
  @endif

  <!-- Open Graph -->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="{{ setting('site_name', 'Trevanta International') }}">
  <meta property="og:title" content="{{ setting('home_meta_title', 'Trevanta International | Global Clinical Research Organization (CRO)') }}">
  <meta property="og:description" content="{{ setting('home_meta_description', 'Trevanta International is an international full-service Clinical Research Organization providing Phase I-IV trials, Pharmacovigilance, Regulatory Affairs, and Biostatistics across North America, Europe, Latin America, and Asia.') }}">
  <meta property="og:url" content="{{ url('/') }}">
  @php
    $homeOg = setting('home_og_image', 'images/doctor-consultation.jpg');
    $homeOgUrl = $homeOg ? asset($homeOg) : asset('images/logo.png');
  @endphp
  <meta property="og:image" content="{{ $homeOgUrl }}">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="{{ setting('home_meta_title', 'Trevanta International | Global Clinical Research Organization (CRO)') }}">
  <meta name="twitter:description" content="{{ setting('home_meta_description', 'Trevanta International is an international full-service Clinical Research Organization providing Phase I-IV trials, Pharmacovigilance, Regulatory Affairs, and Biostatistics across North America, Europe, Latin America, and Asia.') }}">
  <meta name="twitter:image" content="{{ $homeOgUrl }}">

  <!-- JSON-LD Organization Schema -->
  <script type="application/ld+json">
  {!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => setting('site_name', 'Trevanta International'),
    'url' => url('/'),
    'logo' => asset(setting('site_logo', 'images/logo.png')),
    'description' => setting('home_meta_description', 'A globally recognized Clinical Research Organization delivering multi-national trial management.'),
    'address' => [
      '@type' => 'PostalAddress',
      'streetAddress' => setting('address_hq', '4492 Sainte-Catherine St W, Westmount, QC H3Z 1R7, Canada')
    ],
    'contactPoint' => [
      [
        '@type' => 'ContactPoint',
        'telephone' => setting('phone_na', '+1-514-934-0805'),
        'contactType' => 'customer service',
        'email' => setting('contact_email', 'info@trevanta.com'),
        'areaServed' => ['CA', 'US']
      ],
      [
        '@type' => 'ContactPoint',
        'telephone' => setting('phone_in', '+91-7738804988'),
        'contactType' => 'operations',
        'areaServed' => 'IN'
      ]
    ],
    'sameAs' => array_values(array_filter([
      setting('social_linkedin', 'https://www.linkedin.com/company/trevanta-international'),
      setting('social_twitter')
    ]))
  ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
  </script>
@endpush

@section('content')
  <main id="home">

    <!-- HERO SECTION WITH SIGNATURE JSS 4-TAB CAROUSEL -->
    <section class="jss-hero">
      <div class="hero-backdrop"></div>
      <div class="site-container hero-container">
        
        <div class="hero-top-announcement">
          <span class="orange-beacon"></span>
          <span>Over 500,000+ Patients Navigated Across 8,500+ Sites in 28 Countries</span>
        </div>

        <h1 class="hero-headline">
          Transforming Scientific Discoveries Into <br>
          <span class="highlight-orange">Life-Changing Therapies.</span>
        </h1>

        <p class="hero-intro" style="max-width: 860px; margin-bottom: 1.25rem; font-size: 1.15rem; line-height: 1.75; color: #334155;">
          At Trevanta International we partner with biopharmaceutical innovators to transform scientific discoveries into life-changing therapies. As a global Contract Research Organization (CRO), we deliver end-to-end clinical development solutions with precision, speed, and uncompromising quality.
        </p>

        <p class="hero-subintro" style="font-size: 1.15rem; line-height: 1.75; color: #0f172a; max-width: 780px; margin-bottom: 2.25rem; font-weight: 600;">
          From early development to post-marketing support, we help bring therapies to patients—faster, safer, and smarter.
        </p>

        <!-- HERO CTAS -->
        <div class="hero-cta-group" style="display: flex; align-items: center; gap: 1.25rem; flex-wrap: wrap; margin-bottom: 3.5rem;">
          <a href="{{ route('services') }}" class="btn btn-jss-orange btn-lg" style="padding: 0.95rem 2.25rem; font-size: 1.05rem; font-weight: 700; border-radius: 8px;">
            Start Your Clinical Journey &rarr;
          </a>
          <button type="button" class="btn btn-jss-navy-outline btn-lg" onclick="openRfpModal()" style="padding: 0.95rem 2.25rem; font-size: 1.05rem; font-weight: 700; border-radius: 8px; border: 2px solid #121e2d; color: #121e2d; background: transparent;">
            Partner With Us &rarr;
          </button>
        </div>

        <!-- SIGNATURE 4-TAB SLIDER SYSTEM -->
        <div class="jss-tab-slider">
          <div class="slider-tabs" role="tablist">
            <button class="slider-tab active" data-slide="who-we-are" onclick="switchSlide('who-we-are', this)">
              <span class="tab-no">01</span>
              <span class="tab-title">Who We Are</span>
            </button>
            <button class="slider-tab" data-slide="mission" onclick="switchSlide('mission', this)">
              <span class="tab-no">02</span>
              <span class="tab-title">Our Mission</span>
            </button>
            <button class="slider-tab" data-slide="vision" onclick="switchSlide('vision', this)">
              <span class="tab-no">03</span>
              <span class="tab-title">Our Vision</span>
            </button>
            <button class="slider-tab" data-slide="values" onclick="switchSlide('values', this)">
              <span class="tab-no">04</span>
              <span class="tab-title">Core Values</span>
            </button>
          </div>

          <!-- SLIDER CONTENT BOX -->
          <div class="slider-content-box" id="slider-content-box">
            <!-- TAB 1: WHO WE ARE -->
            <div class="slide-pane active" id="slide-who-we-are">
              <div class="slide-badge">ABOUT TREVANTA INTERNATIONAL</div>
              <h3>Full-Service Integrated CRO &amp; Consulting</h3>
              <p>
                Trevanta International is a full-service CRO providing integrated clinical research, regulatory, and consulting services to pharmaceutical, biotechnology, and medical device companies.
              </p>
              <p style="margin-top: -0.5rem; margin-bottom: 1.5rem; color: #475569;">
                Inspired by global leading CRO’s, we combine deep scientific expertise with agile delivery models to support innovation across every stage of drug development.
              </p>
              <div class="slide-bullets">
                <span>&bull; Integrated clinical research, regulatory, and consulting coverage</span>
                <span>&bull; Tailored solutions for pharmaceutical, biotechnology, and medical device innovators</span>
                <span>&bull; Agile, responsive delivery models built to global CRO benchmarks</span>
              </div>
              <div class="slide-action">
                <a href="{{ route('about') }}" class="btn btn-jss-outline">Explore Our Story &rarr;</a>
              </div>
            </div>

            <!-- TAB 2: OUR MISSION -->
            <div class="slide-pane" id="slide-mission" style="display: none;">
              <div class="slide-badge">OUR MISSION</div>
              <h3>Accelerating Safe, Effective Therapies Worldwide</h3>
              <p>
                To accelerate the delivery of safe, effective therapies to patients worldwide through innovative, ethical, and data-driven clinical research.
              </p>
              <div class="slide-bullets">
                <span>&bull; Patient-centric study designs and high-velocity recruitment models</span>
                <span>&bull; Strict compliance with international ethical and GCP/GLP regulations</span>
                <span>&bull; Robust data-driven methodologies ensuring trial precision and integrity</span>
              </div>
              <div class="slide-action">
                <a href="{{ route('services') }}" class="btn btn-jss-outline">View Our Capabilities &rarr;</a>
              </div>
            </div>

            <!-- TAB 3: OUR VISION -->
            <div class="slide-pane" id="slide-vision" style="display: none;">
              <div class="slide-badge">OUR VISION</div>
              <h3>A Trusted Global Partner in Healthcare Advancement</h3>
              <p>
                To become a trusted global partner in advancing healthcare through excellence in clinical research and patient-centric innovation.
              </p>
              <div class="slide-bullets">
                <span>&bull; Global execution agility combined with local clinical expertise</span>
                <span>&bull; Patient-centric innovation driving higher retention and clinical outcomes</span>
                <span>&bull; Trusted by top biotechnology and pharmaceutical innovators</span>
              </div>
              <div class="slide-action">
                <button type="button" class="btn btn-jss-outline" onclick="openRfpModal()">Partner With Us &rarr;</button>
              </div>
            </div>

            <!-- TAB 4: CORE VALUES -->
            <div class="slide-pane" id="slide-values" style="display: none;">
              <div class="slide-badge">CORE VALUES</div>
              <h3>Principles Guiding Our Scientific &amp; Operational Excellence</h3>
              <p>
                Our culture, clinical governance, and daily execution are anchored in five core principles that define Trevanta International:
              </p>
              <div class="slide-bullets" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 0.75rem; border-left: none; padding-left: 0; margin-bottom: 2rem;">
                <div style="display: flex; align-items: center; gap: 0.65rem; background: #f8fafc; padding: 0.75rem 1rem; border-radius: 8px; border: 1px solid #e2e8f0;">
                  <span style="color: var(--jss-orange); font-size: 1.1rem; font-weight: 800;">✓</span>
                  <strong style="color: var(--jss-navy); font-size: 0.95rem;">Patient First</strong>
                </div>
                <div style="display: flex; align-items: center; gap: 0.65rem; background: #f8fafc; padding: 0.75rem 1rem; border-radius: 8px; border: 1px solid #e2e8f0;">
                  <span style="color: var(--jss-orange); font-size: 1.1rem; font-weight: 800;">✓</span>
                  <strong style="color: var(--jss-navy); font-size: 0.95rem;">Scientific Integrity</strong>
                </div>
                <div style="display: flex; align-items: center; gap: 0.65rem; background: #f8fafc; padding: 0.75rem 1rem; border-radius: 8px; border: 1px solid #e2e8f0;">
                  <span style="color: var(--jss-orange); font-size: 1.1rem; font-weight: 800;">✓</span>
                  <strong style="color: var(--jss-navy); font-size: 0.95rem;">Operational Excellence</strong>
                </div>
                <div style="display: flex; align-items: center; gap: 0.65rem; background: #f8fafc; padding: 0.75rem 1rem; border-radius: 8px; border: 1px solid #e2e8f0;">
                  <span style="color: var(--jss-orange); font-size: 1.1rem; font-weight: 800;">✓</span>
                  <strong style="color: var(--jss-navy); font-size: 0.95rem;">Innovation &amp; Agility</strong>
                </div>
                <div style="display: flex; align-items: center; gap: 0.65rem; background: #f8fafc; padding: 0.75rem 1rem; border-radius: 8px; border: 1px solid #e2e8f0;">
                  <span style="color: var(--jss-orange); font-size: 1.1rem; font-weight: 800;">✓</span>
                  <strong style="color: var(--jss-navy); font-size: 0.95rem;">Global Collaboration</strong>
                </div>
              </div>
              <div class="slide-action">
                <button type="button" class="btn btn-jss-orange" onclick="openRfpModal()">Partner With Us Today &rarr;</button>
              </div>
            </div>
          </div>
        </div>

        <!-- STATS COUNTER BAR (Direct from JSS / Clinexel benchmarks) -->
        <div class="hero-stats-banner">
          <div class="h-stat-item">
            <span class="stat-number">500,000+</span>
            <span class="stat-desc">Patients Enrolled Worldwide</span>
          </div>
          <div class="h-stat-item">
            <span class="stat-number">8,500+</span>
            <span class="stat-desc">Investigator Hospital Sites</span>
          </div>
          <div class="h-stat-item">
            <span class="stat-number">28+</span>
            <span class="stat-desc">Countries with Active Trials</span>
          </div>
          <div class="h-stat-item">
            <span class="stat-number">100%</span>
            <span class="stat-desc">Inspection Success (Zero 483s)</span>
          </div>
        </div>

        <!-- REAL CLINICAL LAB PHOTOGRAPHY SHOWCASE -->
        <div class="photo-banner-card">
          <img src="{{ asset('images/clinical-lab.jpg') }}" alt="Trevanta International Central Clinical Research Laboratory" class="photo-banner-img">
          <div class="photo-badge-overlay">
            <h4>Audited GLP &amp; GCP Clinical Research Facilities</h4>
            <p>State-of-the-art bioanalytical laboratories and automated clinical trial monitoring across 28 international territories.</p>
          </div>
        </div>

      </div>
    </section>

    <!-- FULL SERVICES SECTION (JSS & Clinexel Synthesis) -->
    <section class="jss-services-section" id="services">
      <div class="site-container">
        <div class="section-title-wrap text-center">
          <span class="eyebrow-jss">COMPREHENSIVE CRO SERVICES</span>
          <h2 class="main-title">End-to-End Clinical Development Solutions</h2>
          <p class="subtitle-jss">
            From early-phase protocol design to post-marketing safety, we cover all scientific and operational aspects of clinical research.
          </p>
        </div>

        <div class="services-grid-jss">
          <!-- SERVICE 1 -->
          <article class="service-box-jss">
            <div class="s-icon-jss"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg></div>
            <span class="s-phase-tag">PHASE I TO IV</span>
            <h3>Clinical Development (Phase I–IV)</h3>
            <p>
              We deliver comprehensive clinical trial solutions across all phases. Like leading CROs, we ensure protocol optimization, patient recruitment, and regulatory compliance for successful trial outcomes.
            </p>
            <ul class="s-checklist">
              <li>Phase I: First-in-human &amp; early safety studies</li>
              <li>Phase II–III: Efficacy and large-scale trials</li>
              <li>Phase IV: Post-marketing surveillance</li>
            </ul>
            <a href="{{ route('services') }}" class="s-more-link">Explore Clinical Trials &rarr;</a>
          </article>

          <!-- SERVICE 2 -->
          <article class="service-box-jss">
            <div class="s-icon-jss"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg></div>
            <span class="s-phase-tag">GLOBAL REGULATORY</span>
            <h3>Regulatory Affairs &amp; Strategy</h3>
            <p>
              We streamline approval pathways to reduce delays and maximize success across global health authorities.
            </p>
            <ul class="s-checklist">
              <li>Global regulatory submissions</li>
              <li>IND / NDA / BLA support</li>
              <li>Compliance &amp; lifecycle management</li>
              <li>Market access strategy</li>
            </ul>
            <a href="{{ route('services') }}" class="s-more-link">Review Regulatory Pathways &rarr;</a>
          </article>

          <!-- SERVICE 3 -->
          <article class="service-box-jss">
            <div class="s-icon-jss"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
            <span class="s-phase-tag">DIGITAL ECOSYSTEMS</span>
            <h3>Biometrics &amp; Data Management</h3>
            <p>
              Leveraging advanced digital tools, we ensure data integrity and actionable insights—similar to modern CRO digital ecosystems.
            </p>
            <ul class="s-checklist">
              <li>Clinical data management (CDM)</li>
              <li>Biostatistics &amp; statistical programming</li>
              <li>Real-world evidence (RWE)</li>
              <li>Data analytics &amp; visualization</li>
            </ul>
            <a href="{{ route('services') }}" class="s-more-link">Explore Data Solutions &rarr;</a>
          </article>

          <!-- SERVICE 4 -->
          <article class="service-box-jss">
            <div class="s-icon-jss"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
            <span class="s-phase-tag">LIFECYCLE SAFETY</span>
            <h3>Pharmacovigilance &amp; Drug Safety</h3>
            <p>
              Ensuring patient safety throughout the product lifecycle with comprehensive safety oversight, monitoring, and compliant reporting.
            </p>
            <ul class="s-checklist">
              <li>Safety monitoring &amp; reporting</li>
              <li>Risk management plans</li>
              <li>Signal detection &amp; evaluation</li>
            </ul>
            <a href="{{ route('services') }}" class="s-more-link">Inspect PV Systems &rarr;</a>
          </article>

          <!-- SERVICE 5 -->
          <article class="service-box-jss">
            <div class="s-icon-jss"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg></div>
            <span class="s-phase-tag">SCIENTIFIC WRITING</span>
            <h3>Medical Writing &amp; Scientific Communications</h3>
            <p>
              Clear, scientifically robust, and audit-ready documentation compliant with global regulatory guidelines.
            </p>
            <ul class="s-checklist">
              <li>Clinical study reports (CSRs)</li>
              <li>Protocol development</li>
              <li>Regulatory documentation</li>
              <li>Publications &amp; manuscripts</li>
            </ul>
            <a href="{{ route('services') }}" class="s-more-link">Request Medical Writing &rarr;</a>
          </article>

          <!-- SERVICE 6 -->
          <article class="service-box-jss">
            <div class="s-icon-jss"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 2v7.31L4.12 20.27A1 1 0 0 0 5 22h14a1 1 0 0 0 .88-1.73L14 9.31V2"/><line x1="8.5" y1="2" x2="15.5" y2="2"/><line x1="6.5" y1="16" x2="17.5" y2="16"/></svg></div>
            <span class="s-phase-tag">PRECISION MEDICINE</span>
            <h3>Laboratory &amp; Biomarker Services</h3>
            <p>
              Supporting precision medicine and advanced therapeutic development with certified lab capabilities and bioanalytical testing.
            </p>
            <ul class="s-checklist">
              <li>Central lab services</li>
              <li>Bioanalytical testing</li>
              <li>Biomarker assay support</li>
            </ul>
            <a href="{{ route('services') }}" class="s-more-link">Inquire Lab Services &rarr;</a>
          </article>
        </div>
      </div>
    </section>

    <!-- GLOBAL NETWORK & INTERACTIVE MAP SECTION (Directly from JSS & Clinexel) -->
    <section class="jss-global-section" id="global">
      <div class="site-container">
        <div class="section-title-wrap text-center">
          <span class="eyebrow-jss">INTERNATIONAL REACH</span>
          <h2 class="main-title">Strategic Regional Hubs &amp; Clinical Operations</h2>
          <p class="subtitle-jss">
            Coordinated global trials with seamless local execution across the Americas, Europe, and Asia.
          </p>
        </div>

        <div class="global-hubs-grid">
          <!-- HUB 1: MONTREAL HQ -->
          <div class="hub-card">
            <div class="hub-header">
              <span class="reg-pill orange">CA HQ</span>
              <div>
                <h4>Montreal, Canada</h4>
                <span class="hub-role">Corporate Global Headquarters</span>
              </div>
            </div>
            <p>Clinical study oversight, medical writing, international biostatistics center, and North American sponsor relations.</p>
            <div class="hub-specs">
              <span><strong>Phone:</strong> +1 (514) 934-0805</span>
              <span><strong>Sites Managed:</strong> 3,200+ Hospitals</span>
            </div>
          </div>

          <!-- HUB 2: BOSTON USA -->
          <div class="hub-card">
            <div class="hub-header">
              <span class="reg-pill orange">USA</span>
              <div>
                <h4>Boston &amp; California, USA</h4>
                <span class="hub-role">FDA Regulatory &amp; Biotech Center</span>
              </div>
            </div>
            <p>Pre-IND submissions, FDA agency liaison, and US academic oncology &amp; rare disease clinical site networks.</p>
            <div class="hub-specs">
              <span><strong>Phone:</strong> +1 (617) 849-9319</span>
              <span><strong>FDA Track Record:</strong> 100% First-Pass</span>
            </div>
          </div>

          <!-- HUB 3: INDIA HUBS -->
          <div class="hub-card">
            <div class="hub-header">
              <span class="reg-pill orange">INDIA</span>
              <div>
                <h4>Mumbai &amp; Faridabad, India</h4>
                <span class="hub-role">High-Volume Operational Hub</span>
              </div>
            </div>
            <p>Rapid clinical trial execution, centralized pharmacovigilance safety triage, and CDISC statistical programming.</p>
            <div class="hub-specs">
              <span><strong>Phone:</strong> +91 7738804988</span>
              <span><strong>Recruitment Velocity:</strong> 2.4x Industry Benchmark</span>
            </div>
          </div>

          <!-- HUB 4: BOGOTA & LATAM -->
          <div class="hub-card">
            <div class="hub-header">
              <span class="reg-pill orange">LATAM</span>
              <div>
                <h4>Bogotá, Colombia</h4>
                <span class="hub-role">Latin America Regional Center</span>
              </div>
            </div>
            <p>Access to major hospital institutions across Colombia, Mexico, Argentina, and Brazil with high patient retention.</p>
            <div class="hub-specs">
              <span><strong>Coverage:</strong> INVIMA &amp; ANVISA Regulatory</span>
              <span><strong>Retention Rate:</strong> 96.8% Average</span>
            </div>
          </div>
        </div>
      
        <div class="photo-banner-card" style="margin-top: 3rem;">
          <img src="{{ asset('images/clinical-team.jpg') }}" alt="Global Clinical Monitoring Directorate" class="photo-banner-img" style="height: 320px;">
          <div class="photo-badge-overlay">
            <h4>Global Clinical Operations &amp; Medical Affairs Directorate</h4>
            <p>Over 1,200+ clinical scientists, MD investigators, and regulatory liaisons collaborating across 6 corporate hubs.</p>
          </div>
        </div>
</div>
    </section>

    <!-- THERAPEUTIC EXPERTISE SECTION -->
    <section class="jss-therapeutic-section" id="therapeutic">
      <div class="site-container">
        <div class="section-title-wrap text-center">
          <span class="eyebrow-jss">DISEASE FOCUS</span>
          <h2 class="main-title">Therapeutic Areas of Distinction</h2>
          <p class="subtitle-jss">
            Experienced medical directors and specialized investigative sites dedicated to your indication.
          </p>
        </div>

        <div class="ta-badge-grid">
          <div class="ta-item">
            <span class="ta-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="22" y1="12" x2="18" y2="12"/><line x1="6" y1="12" x2="2" y2="12"/><line x1="12" y1="6" x2="12" y2="2"/><line x1="12" y1="22" x2="12" y2="18"/></svg></span>
            <h4>Oncology &amp; Hematology</h4>
            <p>Solid tumors, CAR-T, immuno-oncology, and biomarker-driven clinical protocols.</p>
          </div>
          <div class="ta-item">
            <span class="ta-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.5 2A2.5 2.5 0 0 1 12 4.5v15a2.5 2.5 0 0 1-4.96.44 2.5 2.5 0 0 1-2.96-3.08 3 3 0 0 1-.34-5.58 2.5 2.5 0 0 1 1.32-4.24 2.5 2.5 0 0 1 4.44-5.04z"/><path d="M14.5 2A2.5 2.5 0 0 0 12 4.5v15a2.5 2.5 0 0 0 4.96.44 2.5 2.5 0 0 0 2.96-3.08 3 3 0 0 0 .34-5.58 2.5 2.5 0 0 0-1.32-4.24 2.5 2.5 0 0 0-4.44-5.04z"/></svg></span>
            <h4>CNS &amp; Neurology</h4>
            <p>Alzheimer's, Parkinson's, ALS, Epilepsy, and Neuro-psychiatric trials.</p>
          </div>
          <div class="ta-item">
            <span class="ta-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></span>
            <h4>Immunology &amp; Inflammation</h4>
            <p>Rheumatoid arthritis, Lupus, IBD (Crohn's/Colitis), and Psoriasis studies.</p>
          </div>
          <div class="ta-item">
            <span class="ta-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3h12l4 6-10 13L2 9z"/></svg></span>
            <h4>Rare &amp; Orphan Indications</h4>
            <p>Pediatric and adult orphan designations with specialized decentralized logistics.</p>
          </div>
          <div class="ta-item">
            <span class="ta-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/><polyline points="12 5 9 14 15 14 12 21"/></svg></span>
            <h4>Orthopedics &amp; Surgery</h4>
            <p>Surgical implants, regenerative orthobiologics, and musculoskeletal devices.</p>
          </div>
          <div class="ta-item">
            <span class="ta-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><circle cx="19" cy="5" r="2"/><circle cx="5" cy="19" r="2"/><circle cx="5" cy="5" r="2"/><circle cx="19" cy="19" r="2"/><line x1="12" y1="9" x2="12" y2="3"/><line x1="12" y1="15" x2="12" y2="21"/><line x1="9" y1="12" x2="3" y2="12"/><line x1="15" y1="12" x2="21" y2="12"/></svg></span>
            <h4>Infectious Diseases &amp; Vaccines</h4>
            <p>Rapid surge enrollment, respiratory vaccines, and antimicrobial therapeutics.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- OUR CLIENTS & PARTNERSHIP SECTION -->
    <section class="jss-clients-section" id="clients">
      <div class="site-container">
        <div class="clients-card-jss">
          <div class="clients-left">
            <span class="eyebrow-jss">WHO WE SERVE</span>
            <h2>Tailored Clinical Partnerships for Every Sponsor Scale</h2>
            <p>
              Whether you are an emerging biotechnology firm conducting a critical First-in-Human trial, or a global pharmaceutical enterprise requiring turnkey pharmacovigilance across 20 markets, our agile structure adapts directly to your operating rhythm.
            </p>
            <div class="sponsor-types">
              <div class="st-box">
                <strong>Biotechnology Innovators</strong>
                <p>Knowledgeable project teams, flexible approaches, and dedicated C-suite attention.</p>
              </div>
              <div class="st-box">
                <strong>Global Pharmaceutical</strong>
                <p>Niche post-marketing services, multi-country site networks, and inspection readiness.</p>
              </div>
              <div class="st-box">
                <strong>Medical Device Companies</strong>
                <p>EU MDR and FDA 510(k)/PMA clinical investigations with full ISO 14155 adherence.</p>
              </div>
            </div>
          </div>
          <div class="clients-right">
            <div class="quote-callout">
              <span class="quote-mark">&ldquo;</span>
              <blockquote>
                Trevanta International delivered our Phase II oncology trial 4 months ahead of schedule with 99.4% data completeness. Their responsiveness and regulatory insights made all the difference.
              </blockquote>
              <div class="quote-author">
                <strong>Chief Medical Officer</strong>
                <span>Clinical-Stage US Oncology Sponsor</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ABOUT US & COMPLIANCE BADGES -->
    <section class="jss-about-section" id="about">
      <div class="site-container">
        <div class="section-title-wrap text-center">
          <span class="eyebrow-jss">QUALITY &amp; COMPLIANCE</span>
          <h2 class="main-title">Rigorous Standards, Certified Quality</h2>
          <p class="subtitle-jss">
            Fully audited and compliant with worldwide healthcare agency mandates.
          </p>
        </div>

        <div class="compliance-row">
          <div class="c-badge-jss">
            <strong>US FDA</strong>
            <span>21 CFR Part 11 Validated</span>
          </div>
          <div class="c-badge-jss">
            <strong>ICH-GCP</strong>
            <span>E6(R2/R3) Standard of Care</span>
          </div>
          <div class="c-badge-jss">
            <strong>EMA &amp; MHRA</strong>
            <span>European Directives</span>
          </div>
          <div class="c-badge-jss">
            <strong>CDISC</strong>
            <span>SDTM &amp; ADaM Platinum</span>
          </div>
          <div class="c-badge-jss">
            <strong>ISO 9001:2015</strong>
            <span>Quality Management</span>
          </div>
          <div class="c-badge-jss">
            <strong>HIPAA &amp; GDPR</strong>
            <span>Data Privacy Guard</span>
          </div>
        </div>
      </div>
    </section>

    <!-- 3. STUDY FEASIBILITY & TIMELINE ESTIMATOR -->
    <section class="estimator-section" id="feasibility-calculator">
      <div class="site-container">
        <div class="section-header-centered">
          <span class="eyebrow-accent" style="background: rgba(242, 98, 36, 0.2); color: #ffa07a;">INSTANT PROTOCOL ESTIMATOR</span>
          <h2 class="section-title" style="color: #ffffff;">Calculate Your Study Feasibility &amp; Timelines</h2>
          <p class="section-subtitle" style="color: #cbd5e1;">
            Select your trial phase and therapeutic focus to generate preliminary site startup intervals, site network projections, and database lock targets.
          </p>
        </div>

        <div class="estimator-card">
          <div class="estimator-grid">
            <div class="calc-controls">
              <div class="calc-field-group">
                <label for="calc-phase">Clinical Trial Phase</label>
                <select id="calc-phase">
                  <option value="Phase I">Phase I (First-in-Human / PK-PD)</option>
                  <option value="Phase II" selected>Phase II (Proof-of-Concept / Dose Finding)</option>
                  <option value="Phase III">Phase III (Pivotal Global Confirmatory)</option>
                  <option value="Phase IV">Phase IV / Post-Marketing / RWE</option>
                </select>
              </div>

              <div class="calc-field-group">
                <label for="calc-ta">Primary Therapeutic Area</label>
                <select id="calc-ta">
                  <option value="Oncology" selected>Oncology &amp; Hematology</option>
                  <option value="Rare Disease">Rare &amp; Orphan Disease</option>
                  <option value="Neurology">Neurology &amp; CNS</option>
                  <option value="Immunology">Immunology &amp; Inflammation</option>
                  <option value="Cardiovascular">Cardiovascular &amp; Metabolic</option>
                </select>
              </div>

              <div class="calc-field-group">
                <label for="calc-patients">Projected Patient Target Cohort</label>
                <input type="number" id="calc-patients" value="150" min="10" max="10000" step="10">
              </div>
            </div>

            <div class="calc-results-panel">
              <h4>
                <span>Feasibility Projection</span>
                <span style="font-size: 0.75rem; color: var(--jss-orange); font-weight: 800;">ALIGNED WITH ICH-GCP</span>
              </h4>

              <div class="calc-metric-row">
                <span>Site Initiation &amp; Startup:</span>
                <span class="calc-val-highlight" id="est-startup">12 - 14 Weeks</span>
              </div>

              <div class="calc-metric-row">
                <span>Recommended Hospital Sites:</span>
                <span class="calc-val-highlight" id="est-sites">15 - 19 Sites (Multi-Region)</span>
              </div>

              <div class="calc-metric-row">
                <span>Clean Database Lock Speed:</span>
                <span class="calc-val-highlight" id="est-datalock">4 Weeks Post LPO</span>
              </div>

              <div class="calc-metric-row">
                <span>Trevanta International Feasibility Index:</span>
                <span class="calc-val-highlight" id="est-confidence">98.4%</span>
              </div>

              <div style="margin-top: 0.5rem; text-align: center;">
                <button class="btn btn-jss-orange" style="width: 100%;" onclick="openRfpModal()">
                  Request Full Feasibility Dossier &rarr;
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- 4. BLOGS & CLINICAL RESEARCH INSIGHTS SECTION -->
    @if(isset($blogs) && count($blogs))
    <section class="blogs-section" id="blogs">
      <div class="site-container">
        <div class="section-header-centered">
          <span class="eyebrow-accent">CLINICAL INSIGHTS &amp; WHITEPAPERS</span>
          <h2 class="section-title">Latest Perspectives in Clinical Research</h2>
          <p class="section-subtitle">
            Expert analyses on decentralized trials, global regulatory harmonization, AI in pharmacovigilance, and advanced biostatistics.
          </p>
        </div>

        <!-- CATEGORY FILTER PILLS -->
        <div class="blog-filter-bar">
          <button class="blog-filter-btn active" onclick="filterBlogs('all', this)">All Perspectives</button>
          @php
            $homeCats = isset($blogs) ? $blogs->pluck('category')->unique()->filter() : collect();
          @endphp
          @foreach($homeCats as $cat)
            <button class="blog-filter-btn" onclick="filterBlogs('{{ $cat }}', this)">{{ $cat }}</button>
          @endforeach
        </div>

        <!-- BLOG CARDS GRID (DYNAMIC) -->
        <div class="blogs-grid">
          @foreach($blogs as $blog)
            <article class="blog-card" data-category="{{ $blog->category }}" onclick="openArticleModal('{{ $blog->slug }}')">
              <div class="blog-card-media">
                <div class="blog-media-pattern"></div>
                @if(!empty($blog->image))
                  <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" style="width: 100%; height: 100%; object-fit: cover; position: absolute; top:0; left:0; opacity: 0.35;">
                @endif
                <span class="blog-card-badge">{{ $blog->badge ?: $blog->category }}</span>
                <span class="blog-read-time">
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                  {{ $blog->read_time ?: '5 min read' }}
                </span>
                <div style="color: #ffffff; font-size: 3rem; opacity: 0.25;">
                  @if(stripos($blog->category, 'regulat') !== false)
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                  @elseif(stripos($blog->category, 'pharma') !== false || stripos($blog->category, 'safe') !== false)
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                  @elseif(stripos($blog->category, 'stat') !== false || stripos($blog->category, 'data') !== false)
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                  @else
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M10 2v7.31L4.12 20.27A1 1 0 0 0 5 22h14a1 1 0 0 0 .88-1.73L14 9.31V2"/></svg>
                  @endif
                </div>
              </div>
              <div class="blog-card-body">
                <span class="blog-meta-date">
                  {{ $blog->published_at ? $blog->published_at->format('F d, Y') : 'Recent' }}
                </span>
                <h3 class="blog-card-title">{{ $blog->title }}</h3>
                <p class="blog-card-excerpt">
                  {{ $blog->summary }}
                </p>
                <div class="blog-author-bar">
                  <div class="blog-author-info">
                    <div class="blog-author-avatar">{{ $blog->author_avatar ?: 'AC' }}</div>
                    <div>
                      <div class="blog-author-name">{{ $blog->author_name }}</div>
                      <div class="blog-author-title">{{ $blog->author_title ?: 'Clinical Research Team' }}</div>
                    </div>
                  </div>
                  <a href="{{ route('blog.show', $blog->slug) }}" class="blog-read-btn" onclick="event.stopPropagation();">
                    Read Article &rarr;
                  </a>
                </div>
              </div>
            </article>
          @endforeach
        </div>

        <div class="text-center" style="margin-top: 3rem;">
          <a href="{{ route('blog') }}" class="btn btn-jss-outline btn-lg">View All Clinical Whitepapers &amp; Articles &rarr;</a>
        </div>
      </div>
    </section>
    @endif

    @if(isset($blogs) && count($blogs))
      <script>
        window.blogArticlesDatabase = Object.assign(window.blogArticlesDatabase || {}, {
          @foreach($blogs as $b)
            @php
              $bDate = $b->published_at ? $b->published_at->format('F d, Y') : 'September 2026';
            @endphp
            "{!! addslashes($b->slug) !!}": {
              category: {!! json_encode($b->category) !!},
              readTime: {!! json_encode($b->read_time ?: '5 min read') !!},
              date: {!! json_encode($bDate) !!},
              author: {
                name: {!! json_encode($b->author_name) !!},
                title: {!! json_encode($b->author_title ?: 'Clinical Research Team') !!},
                avatar: {!! json_encode($b->author_avatar ?: 'AC') !!}
              },
              title: {!! json_encode($b->title) !!},
              summary: {!! json_encode($b->summary) !!},
              content: {!! json_encode($b->content) !!}
            }@if(!$loop->last),@endif
          @endforeach
        });
      </script>
    @endif

    <!-- 5. CRO FREQUENTLY ASKED QUESTIONS (FAQ ACCORDION) -->
    <section class="faq-section" id="faq">
      <div class="site-container">
        <div class="section-header-centered">
          <span class="eyebrow-accent">SPONSOR INQUIRIES</span>
          <h2 class="section-title">Frequently Asked Questions</h2>
          <p class="section-subtitle">
            Essential answers on study start-up speed, investigator site oversight, electronic systems, and rescue trial management.
          </p>
        </div>

        <div class="faq-container">
          <!-- FAQ ITEM 1 -->
          <div class="faq-item active">
            <button class="faq-question-btn" onclick="toggleFaq(this)">
              <span>How rapidly can Trevanta International activate clinical investigator sites globally?</span>
              <div class="faq-chevron">&#9660;</div>
            </button>
            <div class="faq-answer">
              Our average site startup velocity across North America and Western Europe is 10 to 12 weeks from finalized protocol synopsis to First Patient In (FPI). In high-recruiting regional hubs such as Eastern Europe and India, we frequently achieve regulatory approval and site initiation within 7 to 9 weeks due to pre-negotiated Master Clinical Trial Agreements (MCTAs) with over 8,500 qualified hospital institutions.
            </div>
          </div>

          <!-- FAQ ITEM 2 -->
          <div class="faq-item">
            <button class="faq-question-btn" onclick="toggleFaq(this)">
              <span>What Electronic Data Capture (EDC) and eClinical platforms do you support?</span>
              <div class="faq-chevron">&#9660;</div>
            </button>
            <div class="faq-answer">
              We operate fully validated 21 CFR Part 11 compliant environments supporting industry-standard platforms including Medidata Rave, Oracle InForm, Castor, and Veeva Vault CDMS. Our data management team standardizes all eCRF builds directly onto CDISC SDTM structures, accelerating clean database locks to within 15 business days post Last Patient Out (LPO).
            </div>
          </div>

          <!-- FAQ ITEM 3 -->
          <div class="faq-item">
            <button class="faq-question-btn" onclick="toggleFaq(this)">
              <span>Can Trevanta International rescue an underperforming or stalled trial from another CRO?</span>
              <div class="faq-chevron">&#9660;</div>
            </button>
            <div class="faq-answer">
              Yes. Over 25% of our historical Phase II and III workload consists of study rescue transitions. Our rapid-response Transition Task Force performs comprehensive regulatory gap analyses, reconciles investigator trial master files (eTMF), stabilizes site relationships, and activates backup patient recruitment sites within 30 days of sponsor handover.
            </div>
          </div>

          <!-- FAQ ITEM 4 -->
          <div class="faq-item">
            <button class="faq-question-btn" onclick="toggleFaq(this)">
              <span>How do your pharmacovigilance teams manage expedited regulatory safety reporting?</span>
              <div class="faq-chevron">&#9660;</div>
            </button>
            <div class="faq-answer">
              Our safety directorate operates 24/7/365 multi-lingual medical triage handling ICSR intake, medical coding (MedDRA), and serious adverse event (SAE) narratives. We maintain direct electronic gateways (E2B-R3) to US FDA FAERS, EMA EudraVigilance, and MHRA, consistently maintaining a 99.8% on-time submission rate for 7-day and 15-day expedited alerts.
            </div>
          </div>

          <!-- FAQ ITEM 5 -->
          <div class="faq-item">
            <button class="faq-question-btn" onclick="toggleFaq(this)">
              <span>What is your audit track record with the US FDA and European health authorities?</span>
              <div class="faq-chevron">&#9660;</div>
            </button>
            <div class="faq-answer">
              Trevanta International maintains an unblemished regulatory inspection track record, with zero FDA Form 483 critical observations and zero European inspection findings across all corporate headquarters and audited investigator sites. We are ISO 9001:2015 certified and offer sponsors unrestricted audit access to our Quality Management System (QMS).
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CONTACT & STUDY INQUIRY SECTION -->
    <section class="jss-contact-section" id="contact">
      <div class="site-container">
        <div class="contact-box-jss">
          <div class="contact-header text-center">
            <span class="eyebrow-jss">CONFIDENTIAL STUDY CONSULTATION</span>
            <h2>Initiate Your Clinical Study RFP</h2>
            <p>Connect with our Medical Directors and Biostatistical leads for a preliminary feasibility review.</p>
          </div>

          <form class="jss-form" id="jss-contact-form" onsubmit="handleJssSubmit(event)">
            <div class="form-row-2">
              <div class="j-field">
                <label for="j-name">Full Name *</label>
                <input type="text" id="j-name" required placeholder="Dr. Sarah Jenkins">
              </div>
              <div class="j-field">
                <label for="j-email">Corporate Work Email *</label>
                <input type="email" id="j-email" required placeholder="sjenkins@biopharma.com">
              </div>
            </div>

            <div class="form-row-2">
              <div class="j-field">
                <label for="j-company">Company / Organization *</label>
                <input type="text" id="j-company" required placeholder="Apex Therapeutics Inc.">
              </div>
              <div class="j-field">
                <label for="j-phone">Direct Phone *</label>
                <input type="tel" id="j-phone" required placeholder="+1 (555) 234-5678">
              </div>
            </div>

            <div class="form-row-2">
              <div class="j-field">
                <label for="j-phase">Clinical Trial Phase *</label>
                <select id="j-phase" required>
                  <option value="Phase I">Phase I (First-in-Human / PK/PD)</option>
                  <option value="Phase II" selected>Phase II (Proof-of-Concept / Dose Finding)</option>
                  <option value="Phase III">Phase III (Pivotal Global Confirmatory)</option>
                  <option value="Phase IV">Phase IV / Post-Marketing Surveillance / RWE</option>
                  <option value="Medical Device">Medical Device Clinical Evaluation</option>
                  <option value="PV Outsourcing">Pharmacovigilance Dedicated Outsourcing</option>
                </select>
              </div>
              <div class="j-field">
                <label for="j-ta">Therapeutic Area *</label>
                <select id="j-ta" required>
                  <option value="Oncology">Oncology &amp; Hematology</option>
                  <option value="Neurology">Neurology &amp; CNS</option>
                  <option value="Immunology">Immunology &amp; Inflammation</option>
                  <option value="Rare Disease">Rare &amp; Orphan Indications</option>
                  <option value="Cardiovascular">Cardiovascular &amp; Metabolic</option>
                  <option value="Other">Other Indication</option>
                </select>
              </div>
            </div>

            <div class="j-field">
              <label for="j-synopsis">Study Objectives &amp; Synopsis (Confidential)</label>
              <textarea id="j-synopsis" rows="3" placeholder="Provide target enrollment size, projected start date, countries of interest, and required services (Clinical Ops, Pharmacovigilance, Biostatistics)..."></textarea>
            </div>

            <div class="j-checkbox">
              <input type="checkbox" id="j-nda" checked required>
              <label for="j-nda">Request mutual non-disclosure agreement (CDA/NDA) executed prior to protocol exchange.</label>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-jss-orange btn-lg" id="j-submit-btn">
                Submit Formal Study Proposal (RFP) &rarr;
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>

  </main>
@endsection

