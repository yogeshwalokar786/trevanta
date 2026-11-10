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

    <!-- THERAPEUTIC EXPERTISE SECTION -->
    <section class="jss-therapeutic-section" id="therapeutic">
      <div class="site-container">
        
        <!-- SECTION TITLE WRAP -->
        <div class="section-title-wrap text-center" style="max-width: 820px; margin: 0 auto 3rem;">
          <div class="hero-top-announcement" style="margin-bottom: 0.85rem;">
            <span class="orange-beacon"></span>
            <span>Comprehensive Scientific &amp; Operational Spectrum</span>
          </div>
          <h2 class="main-title" style="font-size: 2.6rem; font-weight: 800; letter-spacing: -0.5px; margin-bottom: 1rem;">
            Therapeutic <span class="highlight-orange">Expertise.</span>
          </h2>
          <p class="subtitle-jss" style="max-width: 780px; margin: 0 auto; font-size: 1.1rem; line-height: 1.7; color: #475569;">
            Trevanta International supports a wide range of therapeutic areas and clinical development disciplines. Our multidisciplinary teams bring deep expertise to complex clinical programs, mirroring global CRO capabilities in diverse therapeutic areas.
          </p>
        </div>

        <!-- CATEGORY TABS -->
        <div style="display: flex; justify-content: center; margin-bottom: 2.5rem;">
          <div class="te-tabs-bar" role="tablist">
            <button type="button" class="te-tab-btn active" data-tab="areas" onclick="switchTherapeuticTab('areas', this)">
              <i class="fa-solid fa-stethoscope"></i>
              <span>Therapeutic Areas</span>
              <span class="te-counter">21</span>
            </button>
            <button type="button" class="te-tab-btn" data-tab="cro" onclick="switchTherapeuticTab('cro', this)">
              <i class="fa-solid fa-flask-vial"></i>
              <span>CRO &amp; Clinical Research Services</span>
              <span class="te-counter">12</span>
            </button>
            <button type="button" class="te-tab-btn" data-tab="writing" onclick="switchTherapeuticTab('writing', this)">
              <i class="fa-solid fa-book-medical"></i>
              <span>Medical Writing &amp; Publications</span>
              <span class="te-counter">14</span>
            </button>
          </div>
        </div>

        <!-- PANE 1: THERAPEUTIC AREAS -->
        <div class="te-tab-pane" id="te-pane-areas" style="display: block;">
          <div class="te-grid">
            @php
              $therapeuticAreas = [
                ['name' => 'Oncology & Hematology', 'icon' => 'fa-dna'],
                ['name' => 'Infectious Diseases & Vaccines', 'icon' => 'fa-syringe'],
                ['name' => 'Cardiovascular & Metabolic Disorders', 'icon' => 'fa-heart-pulse'],
                ['name' => 'Neurology & Central Nervous System (CNS)', 'icon' => 'fa-brain'],
                ['name' => 'Rare Diseases & Orphan Drugs', 'icon' => 'fa-ribbon'],
                ['name' => 'Diabetes, Endocrinology & Obesity', 'icon' => 'fa-droplet'],
                ['name' => 'Nephrology & Urology', 'icon' => 'fa-filter'],
                ['name' => 'Gastroenterology & Hepatology', 'icon' => 'fa-capsules'],
                ['name' => 'Respiratory & Pulmonary Diseases', 'icon' => 'fa-lungs'],
                ['name' => 'Immunology & Autoimmune Disorders', 'icon' => 'fa-shield-virus'],
                ['name' => 'Dermatology & Skin Diseases', 'icon' => 'fa-hand-dots'],
                ['name' => "Women's Health & Reproductive Medicine", 'icon' => 'fa-person-breastfeeding'],
                ['name' => 'Pediatrics & Neonatology', 'icon' => 'fa-baby'],
                ['name' => 'Orthopedics & Musculoskeletal Disorders', 'icon' => 'fa-bone'],
                ['name' => 'Ophthalmology & Vision Disorders', 'icon' => 'fa-eye'],
                ['name' => 'Psychiatry & Mental Health', 'icon' => 'fa-head-side-virus'],
                ['name' => 'Genetic & Hereditary Disorders', 'icon' => 'fa-code-branch'],
                ['name' => 'Nutrition & Nutritional Deficiency Disorders', 'icon' => 'fa-apple-whole'],
                ['name' => 'Geriatrics & Age-Related Disorders', 'icon' => 'fa-person-walking-with-cane'],
                ['name' => 'Preventive Healthcare & Lifestyle Diseases', 'icon' => 'fa-heart-circle-check'],
                ['name' => 'Public Health & Epidemiological Research', 'icon' => 'fa-earth-americas']
              ];
            @endphp
            @foreach($therapeuticAreas as $area)
              <div class="te-card">
                <div class="te-card-icon">
                  <i class="fa-solid {{ $area['icon'] }}"></i>
                </div>
                <div class="te-card-title">{{ $area['name'] }}</div>
                <span class="te-card-arrow">&rarr;</span>
              </div>
            @endforeach
          </div>
        </div>

        <!-- PANE 2: CRO & CLINICAL RESEARCH SERVICES -->
        <div class="te-tab-pane" id="te-pane-cro" style="display: none;">
          <div class="te-grid">
            @php
              $croServices = [
                ['name' => 'Clinical Trial Management & Coordination', 'icon' => 'fa-list-check'],
                ['name' => 'Clinical Operations & Site Management', 'icon' => 'fa-hospital-user'],
                ['name' => 'Clinical Monitoring & Quality Assurance', 'icon' => 'fa-clipboard-check'],
                ['name' => 'Clinical Data Management', 'icon' => 'fa-database'],
                ['name' => 'Biostatistics & Statistical Analysis', 'icon' => 'fa-chart-line'],
                ['name' => 'Patient Recruitment & Retention', 'icon' => 'fa-users'],
                ['name' => 'Regulatory Affairs & Regulatory Documentation', 'icon' => 'fa-scale-balanced'],
                ['name' => 'Ethics Committee (EC/IEC) Submissions & Approvals Support', 'icon' => 'fa-file-shield'],
                ['name' => 'Clinical Study Design & Protocol Development', 'icon' => 'fa-compass-drafting'],
                ['name' => 'Pharmacovigilance & Drug Safety Support', 'icon' => 'fa-shield-halved'],
                ['name' => 'Real-World Evidence (RWE) & Observational Studies', 'icon' => 'fa-chart-pie'],
                ['name' => 'Post-Marketing Surveillance & Phase IV Studies', 'icon' => 'fa-bullseye']
              ];
            @endphp
            @foreach($croServices as $service)
              <div class="te-card">
                <div class="te-card-icon">
                  <i class="fa-solid {{ $service['icon'] }}"></i>
                </div>
                <div class="te-card-title">{{ $service['name'] }}</div>
                <span class="te-card-arrow">&rarr;</span>
              </div>
            @endforeach
          </div>
        </div>

        <!-- PANE 3: MEDICAL WRITING & PUBLICATIONS -->
        <div class="te-tab-pane" id="te-pane-writing" style="display: none;">
          <div class="te-grid">
            @php
              $writingServices = [
                ['name' => 'Clinical Study Protocol Writing', 'icon' => 'fa-file-lines'],
                ['name' => 'Clinical Study Reports (CSR)', 'icon' => 'fa-file-contract'],
                ['name' => 'Scientific Manuscript Writing', 'icon' => 'fa-feather-pointed'],
                ['name' => 'Research Article & Review Article Preparation', 'icon' => 'fa-newspaper'],
                ['name' => 'Systematic Reviews & Meta-Analysis', 'icon' => 'fa-magnifying-glass-chart'],
                ['name' => 'Case Reports & Case Series', 'icon' => 'fa-folder-open'],
                ['name' => 'Abstract, Poster & Conference Presentation Preparation', 'icon' => 'fa-chalkboard-user'],
                ['name' => 'Investigator Brochures (IB)', 'icon' => 'fa-book-medical'],
                ['name' => 'Informed Consent Documents (ICF)', 'icon' => 'fa-signature'],
                ['name' => 'Patient Information Sheets', 'icon' => 'fa-circle-info'],
                ['name' => 'Statistical Analysis Reports', 'icon' => 'fa-square-poll-vertical'],
                ['name' => 'Regulatory & Scientific Documentation', 'icon' => 'fa-certificate'],
                ['name' => 'Journal Selection, Submission & Publication Support', 'icon' => 'fa-upload'],
                ['name' => 'Medical Literature Review & Scientific Editing', 'icon' => 'fa-pen-fancy']
              ];
            @endphp
            @foreach($writingServices as $writing)
              <div class="te-card">
                <div class="te-card-icon">
                  <i class="fa-solid {{ $writing['icon'] }}"></i>
                </div>
                <div class="te-card-title">{{ $writing['name'] }}</div>
                <span class="te-card-arrow">&rarr;</span>
              </div>
            @endforeach
          </div>
        </div>

        <!-- SUMMARY CALLOUT CARD -->
        <div style="margin-top: 3.5rem; background: linear-gradient(135deg, #101a27 0%, #17263b 60%, #1e324d 100%); border: 1px solid rgba(255,255,255,0.08); border-radius: 16px; padding: 2.5rem 3rem; color: #ffffff; display: flex; align-items: center; justify-content: space-between; gap: 2rem; flex-wrap: wrap; box-shadow: 0 15px 35px rgba(18, 30, 45, 0.25);">
          <div style="max-width: 680px;">
            <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.3rem 0.85rem; border-radius: 999px; background: rgba(242, 98, 36, 0.15); border: 1px solid rgba(242, 98, 36, 0.3); color: #ff8a50; font-size: 0.75rem; font-weight: 800; letter-spacing: 0.8px; text-transform: uppercase; margin-bottom: 0.85rem;">
              <span class="orange-beacon"></span>
              <span>GLOBAL CRO CAPABILITIES</span>
            </div>
            <h3 style="font-size: 1.55rem; font-weight: 700; color: #ffffff; margin-bottom: 0.65rem; letter-spacing: -0.3px;">
              Customized Scientific Expertise For Your Clinical Program
            </h3>
            <p style="font-size: 1rem; color: #cbd5e1; line-height: 1.65; margin: 0;">
              Our multidisciplinary teams bring deep expertise to complex clinical programs, mirroring global CRO capabilities in diverse therapeutic areas.
            </p>
          </div>
          <div style="display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;">
            <button type="button" class="btn btn-jss-orange btn-lg" onclick="openRfpModal()" style="border-radius: 8px; font-weight: 700; padding: 0.95rem 2rem;">
              Discuss Your Protocol &rarr;
            </button>
            <a href="{{ route('services') }}" class="btn btn-jss-outline btn-lg" style="border-radius: 8px; font-weight: 700; padding: 0.95rem 2rem; color: #ffffff; border-color: rgba(255,255,255,0.4);">
              Explore All Services
            </a>
          </div>
        </div>

      </div>
    </section>

    <!-- OUR APPROACH SECTION -->
    <section class="approach-section" id="approach">
      <div class="site-container">
        
        <div class="section-title-wrap text-center" style="max-width: 820px; margin: 0 auto 3.5rem;">
          <div class="hero-top-announcement" style="margin-bottom: 0.85rem;">
            <span class="orange-beacon"></span>
            <span>Strategic Delivery Framework</span>
          </div>
          <h2 class="main-title" style="font-size: 2.6rem; font-weight: 800; letter-spacing: -0.5px; margin-bottom: 1rem;">
            Our <span class="highlight-orange">Approach.</span>
          </h2>
          <p class="subtitle-jss" style="max-width: 760px; margin: 0 auto; font-size: 1.1rem; line-height: 1.7; color: #475569;">
            We combine patient focus, advanced digital infrastructure, international agility, and rigorous compliance to accelerate clinical milestones.
          </p>
        </div>

        <div class="approach-grid">
          <!-- CARD 1: PATIENT-CENTRIC INNOVATION -->
          <article class="approach-card">
            <div class="approach-card-header">
              <span class="approach-num">01</span>
              <div class="approach-icon-wrap">
                <i class="fa-solid fa-heart-pulse"></i>
              </div>
            </div>
            <h3>Patient-Centric Innovation</h3>
            <p>
              We design trials that prioritize patient accessibility, diversity, and engagement—improving recruitment and retention.
            </p>
            <ul class="approach-list">
              <li><i class="fa-solid fa-circle-check"></i> Patient accessibility focus</li>
              <li><i class="fa-solid fa-circle-check"></i> Diverse cohort enrollment</li>
              <li><i class="fa-solid fa-circle-check"></i> Optimized retention rates</li>
            </ul>
          </article>

          <!-- CARD 2: TECHNOLOGY-DRIVEN EXECUTION -->
          <article class="approach-card">
            <div class="approach-card-header">
              <span class="approach-num">02</span>
              <div class="approach-icon-wrap">
                <i class="fa-solid fa-microchip"></i>
              </div>
            </div>
            <h3>Technology-Driven Execution</h3>
            <p>
              Harnessing modern digital tools and predictive insights to optimize clinical execution and streamline timelines.
            </p>
            <ul class="approach-list">
              <li><i class="fa-solid fa-circle-check"></i> AI-enabled trial optimization</li>
              <li><i class="fa-solid fa-circle-check"></i> Real-time data monitoring</li>
              <li><i class="fa-solid fa-circle-check"></i> Predictive analytics</li>
            </ul>
          </article>

          <!-- CARD 3: GLOBAL REACH, LOCAL EXPERTISE -->
          <article class="approach-card">
            <div class="approach-card-header">
              <span class="approach-num">03</span>
              <div class="approach-icon-wrap">
                <i class="fa-solid fa-earth-americas"></i>
              </div>
            </div>
            <h3>Global Reach, Local Expertise</h3>
            <p>
              Our global network ensures efficient study execution while maintaining local regulatory compliance.
            </p>
            <ul class="approach-list">
              <li><i class="fa-solid fa-circle-check"></i> International clinical footprint</li>
              <li><i class="fa-solid fa-circle-check"></i> Local regulatory alignment</li>
              <li><i class="fa-solid fa-circle-check"></i> Seamless multi-region startup</li>
            </ul>
          </article>

          <!-- CARD 4: QUALITY & COMPLIANCE -->
          <article class="approach-card">
            <div class="approach-card-header">
              <span class="approach-num">04</span>
              <div class="approach-icon-wrap">
                <i class="fa-solid fa-shield-halved"></i>
              </div>
            </div>
            <h3>Quality &amp; Compliance</h3>
            <p>
              We adhere to rigorous international standards across every stage of the trial lifecycle:
            </p>
            <ul class="approach-list">
              <li><i class="fa-solid fa-circle-check"></i> ICH-GCP</li>
              <li><i class="fa-solid fa-circle-check"></i> FDA / EMA guidelines</li>
              <li><i class="fa-solid fa-circle-check"></i> ISO standards</li>
            </ul>
          </article>
        </div>

      </div>
    </section>

    <!-- WHY CHOOSE TREVANTA INTERNATIONAL SECTION -->
    <section class="why-choose-section" id="why-choose">
      <div class="site-container">
        
        <div class="why-choose-grid">
          
          <!-- LEFT COLUMN: PROPOSITION & STATEMENT -->
          <div class="why-choose-left">
            <div class="hero-top-announcement" style="margin-bottom: 1rem;">
              <span class="orange-beacon"></span>
              <span>THE TREVANTA ADVANTAGE</span>
            </div>
            
            <h2 class="main-title" style="font-size: 2.75rem; font-weight: 800; letter-spacing: -0.5px; line-height: 1.2; margin-bottom: 1.5rem; color: #1e293b;">
              Why Choose <br>
              <span class="highlight-orange">Trevanta International.</span>
            </h2>

            <div style="background: #ffffff; border-left: 4px solid var(--jss-orange); border-radius: 0 14px 14px 0; padding: 1.75rem 2rem; box-shadow: 0 4px 20px rgba(0,0,0,0.04); margin-bottom: 2rem;">
              <p style="font-size: 1.15rem; line-height: 1.75; color: #1e293b; font-weight: 600; margin: 0;">
                &ldquo;We combine the responsiveness of a boutique CRO with the capabilities of a global organization—delivering excellence at every stage.&rdquo;
              </p>
            </div>

            <p style="font-size: 1rem; line-height: 1.7; color: #475569; margin-bottom: 2rem;">
              Whether navigating early proof-of-concept trials or orchestrating multi-region pivotal studies, biopharma innovators rely on our agility, data integrity, and dedicated clinical leadership.
            </p>

            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
              <button type="button" class="btn btn-jss-orange btn-lg" onclick="openRfpModal()" style="border-radius: 8px; font-weight: 700; padding: 0.95rem 2rem;">
                Partner With Us &rarr;
              </button>
              <a href="{{ route('services') }}" class="btn btn-jss-navy-outline btn-lg" style="border-radius: 8px; font-weight: 700; padding: 0.95rem 2rem; border: 2px solid #121e2d; color: #121e2d; background: transparent;">
                Our Solutions
              </a>
            </div>
          </div>

          <!-- RIGHT COLUMN: 5 ADVANTAGE CARDS -->
          <div class="why-choose-list" style="display: flex; flex-direction: column; gap: 1rem;">
            
            <!-- ITEM 1 -->
            <div class="why-card">
              <div class="why-card-icon">
                <i class="fa-solid fa-check"></i>
              </div>
              <div style="flex: 1;">
                <h4 style="font-size: 1.05rem; font-weight: 700; color: #1e293b; margin: 0 0 0.25rem 0;">End-to-End CRO Solutions</h4>
                <p style="font-size: 0.88rem; color: #64748b; margin: 0; line-height: 1.5;">Comprehensive coverage from Phase I first-in-human trials to post-marketing safety.</p>
              </div>
            </div>

            <!-- ITEM 2 -->
            <div class="why-card">
              <div class="why-card-icon">
                <i class="fa-solid fa-check"></i>
              </div>
              <div style="flex: 1;">
                <h4 style="font-size: 1.05rem; font-weight: 700; color: #1e293b; margin: 0 0 0.25rem 0;">Global Network of Investigative Sites</h4>
                <p style="font-size: 0.88rem; color: #64748b; margin: 0; line-height: 1.5;">Access to verified investigator hospital networks across North America, Europe, and Asia.</p>
              </div>
            </div>

            <!-- ITEM 3 -->
            <div class="why-card">
              <div class="why-card-icon">
                <i class="fa-solid fa-check"></i>
              </div>
              <div style="flex: 1;">
                <h4 style="font-size: 1.05rem; font-weight: 700; color: #1e293b; margin: 0 0 0.25rem 0;">Advanced Digital &amp; Data Capabilities</h4>
                <p style="font-size: 0.88rem; color: #64748b; margin: 0; line-height: 1.5;">Modern eClinical systems, real-time data monitoring, and CDISC-validated biometrics.</p>
              </div>
            </div>

            <!-- ITEM 4 -->
            <div class="why-card">
              <div class="why-card-icon">
                <i class="fa-solid fa-check"></i>
              </div>
              <div style="flex: 1;">
                <h4 style="font-size: 1.05rem; font-weight: 700; color: #1e293b; margin: 0 0 0.25rem 0;">Strong Regulatory Expertise</h4>
                <p style="font-size: 0.88rem; color: #64748b; margin: 0; line-height: 1.5;">Proven track record navigating US FDA, EMA, Health Canada, and local health authorities.</p>
              </div>
            </div>

            <!-- ITEM 5 -->
            <div class="why-card">
              <div class="why-card-icon">
                <i class="fa-solid fa-check"></i>
              </div>
              <div style="flex: 1;">
                <h4 style="font-size: 1.05rem; font-weight: 700; color: #1e293b; margin: 0 0 0.25rem 0;">Patient-Centric Trial Design</h4>
                <p style="font-size: 0.88rem; color: #64748b; margin: 0; line-height: 1.5;">Decentralized methodologies, diverse recruitment models, and high volunteer retention.</p>
              </div>
            </div>

          </div>

        </div>

      </div>
    </section>

    <!-- CAREERS SPOTLIGHT SECTION -->
    <section class="careers-spotlight-section" id="careers-spotlight">
      <div class="site-container">
        
        <div class="careers-spotlight-card">
          
          <div class="careers-spotlight-content">
            <div class="hero-top-announcement" style="margin-bottom: 1rem;">
              <span class="orange-beacon"></span>
              <span>PEOPLE &amp; CULTURE</span>
            </div>

            <h2>
              Join a Team Committed to <br>
              <span class="highlight-orange">Improving Global Health.</span>
            </h2>

            <p>
              At Trevanta International our people are at the heart of innovation. We foster a culture of collaboration, growth, and scientific excellence.
            </p>

            <ul class="careers-perks-list">
              <li>
                <i class="fa-solid fa-check"></i>
                <span>Global cross-functional collaboration across multi-national clinical hubs</span>
              </li>
              <li>
                <i class="fa-solid fa-check"></i>
                <span>Continuous GCP certification, leadership pathways &amp; mentorship</span>
              </li>
              <li>
                <i class="fa-solid fa-check"></i>
                <span>Direct involvement in pivotal Phase I–IV clinical trials saving lives</span>
              </li>
            </ul>

            <a href="{{ route('careers') }}" class="btn btn-jss-orange btn-lg" style="border-radius: 8px; font-weight: 700; padding: 0.95rem 2.25rem; font-size: 1.05rem;">
              Explore Opportunities &rarr;
            </a>
          </div>

          <div class="careers-photo-wrap">
            <img src="{{ asset('images/clinical-team.jpg') }}" alt="Trevanta International Global Clinical Team" loading="lazy">
            <div class="careers-photo-badge">
              <div class="careers-badge-icon">
                <i class="fa-solid fa-users"></i>
              </div>
              <div class="careers-badge-text">
                <strong>Empowering Scientific Minds</strong>
                <span>Join physicians, biostatisticians, CRAs &amp; regulatory experts worldwide</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- FINAL SECTION: CONTACT US (PROPER CARD STRUCTURE) -->
    <section class="home-contact-cards" id="contact">
      <div class="site-container">
        
        <!-- SECTION TITLE -->
        <div style="max-width: 780px; margin: 0 auto 3.5rem;">
          <div class="hero-top-announcement" style="margin-bottom: 1rem;">
            <span class="orange-beacon"></span>
            <span>Contact Us</span>
          </div>
          <h2 style="font-size: 2.75rem; font-weight: 800; color: #1e293b; letter-spacing: -0.5px; line-height: 1.25; margin-bottom: 1rem;">
            Let’s accelerate your <span class="highlight-orange">next breakthrough.</span>
          </h2>
          <p style="font-size: 1.05rem; color: #64748b; line-height: 1.6; margin: 0;">
            Partner with our global clinical research teams to advance your therapeutics with scientific precision.
          </p>
        </div>

        <!-- 2 PROPER CONTACT CARDS -->
        <div style="max-width: 900px; margin: 0 auto 3rem; display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 2rem; text-align: left;">
          
          <!-- CARD 1: EMAIL -->
          <div class="contact-info-card">
            <div>
              <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem;">
                <div style="width: 52px; height: 52px; border-radius: 12px; background: rgba(242, 98, 36, 0.1); color: var(--jss-orange); display: flex; align-items: center; justify-content: center; font-size: 1.35rem; border: 1px solid rgba(242, 98, 36, 0.2);">
                  <i class="fa-solid fa-envelope"></i>
                </div>
                <span style="font-size: 0.75rem; font-weight: 800; letter-spacing: 0.8px; text-transform: uppercase; color: var(--jss-orange); background: rgba(242, 98, 36, 0.1); padding: 0.3rem 0.75rem; border-radius: 999px;">
                  Direct Inquiry
                </span>
              </div>
              <h3 style="font-size: 1.35rem; font-weight: 700; color: #1e293b; margin: 0 0 0.5rem 0;">Email</h3>
              <p style="font-size: 0.92rem; color: #64748b; margin: 0 0 1.5rem 0; line-height: 1.55;">
                For protocol submissions, clinical trial feasibility, and commercial proposals:
              </p>
            </div>
            <div style="padding-top: 1.25rem; border-top: 1px dashed #e2e8f0;">
              <a href="mailto:{{ setting('contact_email', 'info@trevanta.com') }}" style="font-size: 1.1rem; font-weight: 700; color: var(--jss-orange); text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; word-break: break-all;">
                <span>{{ setting('contact_email', 'info@trevanta.com') }}</span>
                <span class="contact-card-arrow" style="transition: transform 0.2s ease;">&rarr;</span>
              </a>
            </div>
          </div>

          <!-- CARD 2: GLOBAL OFFICES -->
          <div class="contact-info-card">
            <div>
              <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem;">
                <div style="width: 52px; height: 52px; border-radius: 12px; background: rgba(242, 98, 36, 0.1); color: var(--jss-orange); display: flex; align-items: center; justify-content: center; font-size: 1.35rem; border: 1px solid rgba(242, 98, 36, 0.2);">
                  <i class="fa-solid fa-location-dot"></i>
                </div>
                <span style="font-size: 0.75rem; font-weight: 800; letter-spacing: 0.8px; text-transform: uppercase; color: #1e293b; background: #f1f5f9; padding: 0.3rem 0.75rem; border-radius: 999px;">
                  Global HQ
                </span>
              </div>
              <h3 style="font-size: 1.35rem; font-weight: 700; color: #1e293b; margin: 0 0 0.5rem 0;">Global Offices</h3>
              <p style="font-size: 0.92rem; color: #64748b; margin: 0 0 1.5rem 0; line-height: 1.55;">
                Corporate Headquarters &amp; Global Executive Clinical Operations:
              </p>
            </div>
            <div style="padding-top: 1.25rem; border-top: 1px dashed #e2e8f0;">
              <span style="font-size: 0.98rem; font-weight: 600; color: #334155; line-height: 1.5; display: block;">
                {{ setting('address_hq', '4492 Sainte-Catherine St W, Westmount, QC H3Z 1R7, Canada') }}
              </span>
            </div>
          </div>

        </div>

        <!-- CTA BUTTON -->
        <div>
          <button type="button" class="btn btn-jss-orange btn-lg" onclick="openRfpModal()" style="border-radius: 8px; font-weight: 700; padding: 1rem 2.75rem; font-size: 1.1rem; box-shadow: 0 6px 22px rgba(242, 98, 36, 0.35);">
            Get in Touch &rarr;
          </button>
        </div>

      </div>
    </section>

  </main>
@endsection

@push('scripts')
<script>
window.switchTherapeuticTab = function(tabKey, btn) {
  var allBtns = document.querySelectorAll('.te-tab-btn');
  allBtns.forEach(function(b) { b.classList.remove('active'); });

  if (btn) {
    btn.classList.add('active');
  } else {
    var matchingBtn = document.querySelector('.te-tab-btn[data-tab="' + tabKey + '"]');
    if (matchingBtn) matchingBtn.classList.add('active');
  }

  var allPanes = document.querySelectorAll('.te-tab-pane');
  allPanes.forEach(function(p) { p.style.display = 'none'; });

  var targetPane = document.getElementById('te-pane-' + tabKey);
  if (targetPane) {
    targetPane.style.display = 'block';
  }
};
</script>
@endpush

