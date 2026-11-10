@extends('layouts.app')

@section('title', setting('services_meta_title', 'Clinical Research Services & CRO Solutions | ' . setting('site_name', 'Trevanta International')))
@section('description', setting('services_meta_description', 'Explore Trevanta International’s comprehensive suite of 7 CRO services: Clinical Development (Phase I–IV), Regulatory Affairs, Biometrics & Data Management, Pharmacovigilance, Medical Writing, Laboratory Services, and FSP Solutions.'))

@push('seo')
  @if(setting('services_meta_keywords'))
    <meta name="keywords" content="{{ setting('services_meta_keywords') }}">
  @endif
  <meta property="og:title" content="{{ setting('services_meta_title', 'Clinical Research Services & CRO Solutions | ' . setting('site_name', 'Trevanta International')) }}">
  <meta property="og:description" content="{{ setting('services_meta_description', 'Explore Trevanta International’s comprehensive suite of 7 CRO services: Clinical Development (Phase I–IV), Regulatory Affairs, Biometrics & Data Management, Pharmacovigilance, Medical Writing, Laboratory Services, and FSP Solutions.') }}">
  <meta property="og:image" content="{{ asset(setting('services_og_image', setting('home_og_image', 'images/doctor-consultation.jpg'))) }}">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
@endpush

@section('content')
  <!-- SUBPAGE HERO -->
  <section class="subpage-hero">
    <div class="site-container">
      <span class="eyebrow-jss">SERVICE PORTFOLIO</span>
      <h1>Comprehensive Clinical Research &amp; CRO Services</h1>
      <p>
        From early-phase clinical development to global regulatory submissions, we deliver end-to-end clinical research solutions with precision, speed, and uncompromising quality.
      </p>
      <nav class="breadcrumbs" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        <span class="current">Services</span>
      </nav>
    </div>
  </section>

  <!-- QUICK CATEGORY NAVIGATION PILLS -->
  <section style="background-color: var(--bg-subtle, #f8fafc); border-bottom: 1px solid var(--border-light, #e2e8f0); padding: 1.25rem 0; position: sticky; top: 0; z-index: 20; backdrop-filter: blur(8px);">
    <div class="site-container" style="display: flex; gap: 0.65rem; justify-content: center; flex-wrap: wrap;">
      <a href="#clinical-development" class="btn btn-jss-outline" style="font-size: 0.82rem; padding: 0.4rem 0.9rem;">
        01. Clinical Development
      </a>
      <a href="#regulatory-affairs" class="btn btn-jss-outline" style="font-size: 0.82rem; padding: 0.4rem 0.9rem;">
        02. Regulatory Affairs
      </a>
      <a href="#biometrics-data" class="btn btn-jss-outline" style="font-size: 0.82rem; padding: 0.4rem 0.9rem;">
        03. Biometrics &amp; Data
      </a>
      <a href="#pharmacovigilance" class="btn btn-jss-outline" style="font-size: 0.82rem; padding: 0.4rem 0.9rem;">
        04. Pharmacovigilance
      </a>
      <a href="#medical-writing" class="btn btn-jss-outline" style="font-size: 0.82rem; padding: 0.4rem 0.9rem;">
        05. Medical Writing
      </a>
      <a href="#laboratory-services" class="btn btn-jss-outline" style="font-size: 0.82rem; padding: 0.4rem 0.9rem;">
        06. Lab &amp; Biomarkers
      </a>
      <a href="#fsp-solutions" class="btn btn-jss-outline" style="font-size: 0.82rem; padding: 0.4rem 0.9rem;">
        07. FSP Solutions
      </a>
    </div>
  </section>

  <main>
    <!-- COMPREHENSIVE 7 CRO SERVICES SECTION -->
    <section class="subpage-content" style="padding: 5rem 0;">
      <div class="site-container">
        
        <div class="section-title-wrap text-center" style="max-width: 820px; margin: 0 auto 3.5rem;">
          <span class="eyebrow-jss">GLOBAL CRO EXCELLENCE</span>
          <h2 class="main-title" style="font-size: 2.6rem; font-weight: 800; letter-spacing: -0.5px; margin-bottom: 1rem;">
            Our Core <span class="highlight-orange">Services.</span>
          </h2>
          <p class="subtitle-jss" style="max-width: 760px; margin: 0 auto; font-size: 1.1rem; line-height: 1.7; color: #475569;">
            We combine the responsiveness of a boutique CRO with the capabilities of a global organization—delivering excellence across every stage of the product lifecycle.
          </p>
        </div>

        <div class="services-grid-jss">
          
          <!-- 1. CLINICAL DEVELOPMENT (PHASE I–IV) -->
          <div class="service-box-jss" id="clinical-development" style="scroll-margin-top: 120px;">
            <div class="s-icon-jss" style="color: var(--jss-orange);">
              <i class="fa-solid fa-flask-vial"></i>
            </div>
            <span class="s-phase-tag">CORE CLINICAL EXECUTION</span>
            <h3 style="font-size: 1.35rem; font-weight: 700; color: #1e293b; margin-bottom: 0.85rem;">
              1. Clinical Development (Phase I–IV)
            </h3>
            <p style="font-size: 0.925rem; line-height: 1.65; color: #475569; margin-bottom: 1.25rem;">
              We deliver comprehensive clinical trial solutions across all phases:
            </p>
            <ul class="s-checklist">
              <li><strong>Phase I:</strong> First-in-human &amp; early safety studies</li>
              <li><strong>Phase II–III:</strong> Efficacy and large-scale trials</li>
              <li><strong>Phase IV:</strong> Post-marketing surveillance</li>
            </ul>
            <div style="background: #f8fafc; border-left: 3px solid var(--jss-orange); padding: 0.85rem 1rem; border-radius: 0 8px 8px 0; font-size: 0.85rem; color: #334155; line-height: 1.5; margin-bottom: 1.5rem; font-style: italic;">
              Like leading CROs, we ensure protocol optimization, patient recruitment, and regulatory compliance for successful trial outcomes.
            </div>
            <button type="button" class="btn btn-jss-orange" onclick="openRfpModal('Clinical Development (Phase I–IV)')" style="margin-top: auto; border-radius: 8px; font-weight: 700;">
              Inquire Clinical Development &rarr;
            </button>
          </div>

          <!-- 2. REGULATORY AFFAIRS & STRATEGY -->
          <div class="service-box-jss" id="regulatory-affairs" style="scroll-margin-top: 120px;">
            <div class="s-icon-jss" style="color: var(--jss-orange);">
              <i class="fa-solid fa-scale-balanced"></i>
            </div>
            <span class="s-phase-tag">GLOBAL REGULATORY INTELLIGENCE</span>
            <h3 style="font-size: 1.35rem; font-weight: 700; color: #1e293b; margin-bottom: 0.85rem;">
              2. Regulatory Affairs &amp; Strategy
            </h3>
            <p style="font-size: 0.925rem; line-height: 1.65; color: #475569; margin-bottom: 1.25rem;">
              We streamline approval pathways to reduce delays and maximize success across international health authorities:
            </p>
            <ul class="s-checklist">
              <li>Global regulatory submissions</li>
              <li>IND / NDA / BLA support</li>
              <li>Compliance &amp; lifecycle management</li>
              <li>Market access strategy</li>
            </ul>
            <div style="background: #f8fafc; border-left: 3px solid var(--jss-orange); padding: 0.85rem 1rem; border-radius: 0 8px 8px 0; font-size: 0.85rem; color: #334155; line-height: 1.5; margin-bottom: 1.5rem; font-style: italic;">
              We streamline approval pathways to reduce delays and maximize success across US FDA, EMA, Health Canada, and local health authorities.
            </div>
            <button type="button" class="btn btn-jss-orange" onclick="openRfpModal('Regulatory Affairs & Strategy')" style="margin-top: auto; border-radius: 8px; font-weight: 700;">
              Inquire Regulatory Strategy &rarr;
            </button>
          </div>

          <!-- 3. BIOMETRICS & DATA MANAGEMENT -->
          <div class="service-box-jss" id="biometrics-data" style="scroll-margin-top: 120px;">
            <div class="s-icon-jss" style="color: var(--jss-orange);">
              <i class="fa-solid fa-chart-line"></i>
            </div>
            <span class="s-phase-tag">DATA INTEGRITY &amp; INSIGHTS</span>
            <h3 style="font-size: 1.35rem; font-weight: 700; color: #1e293b; margin-bottom: 0.85rem;">
              3. Biometrics &amp; Data Management
            </h3>
            <p style="font-size: 0.925rem; line-height: 1.65; color: #475569; margin-bottom: 1.25rem;">
              Leveraging advanced digital tools, we ensure data integrity and actionable insights—similar to modern CRO digital ecosystems:
            </p>
            <ul class="s-checklist">
              <li>Clinical data management (CDM)</li>
              <li>Biostatistics &amp; statistical programming</li>
              <li>Real-world evidence (RWE)</li>
              <li>Data analytics &amp; visualization</li>
            </ul>
            <div style="background: #f8fafc; border-left: 3px solid var(--jss-orange); padding: 0.85rem 1rem; border-radius: 0 8px 8px 0; font-size: 0.85rem; color: #334155; line-height: 1.5; margin-bottom: 1.5rem; font-style: italic;">
              Validated EDC architectures, 21 CFR Part 11 compliant audit trails, and CDISC SDTM / ADaM dataset standards.
            </div>
            <button type="button" class="btn btn-jss-orange" onclick="openRfpModal('Biometrics & Data Management')" style="margin-top: auto; border-radius: 8px; font-weight: 700;">
              Inquire Biometrics &rarr;
            </button>
          </div>

          <!-- 4. PHARMACOVIGILANCE & DRUG SAFETY -->
          <div class="service-box-jss" id="pharmacovigilance" style="scroll-margin-top: 120px;">
            <div class="s-icon-jss" style="color: var(--jss-orange);">
              <i class="fa-solid fa-shield-halved"></i>
            </div>
            <span class="s-phase-tag">PATIENT SAFETY &amp; LIFECYCLE VIGILANCE</span>
            <h3 style="font-size: 1.35rem; font-weight: 700; color: #1e293b; margin-bottom: 0.85rem;">
              4. Pharmacovigilance &amp; Drug Safety
            </h3>
            <p style="font-size: 0.925rem; line-height: 1.65; color: #475569; margin-bottom: 1.25rem;">
              Ensuring patient safety throughout the product lifecycle with comprehensive vigilance solutions:
            </p>
            <ul class="s-checklist">
              <li>Safety monitoring &amp; reporting</li>
              <li>Risk management plans (RMP)</li>
              <li>Signal detection &amp; evaluation</li>
              <li>24/7 ICSR triage &amp; expedited SUSAR reporting</li>
            </ul>
            <div style="background: #f8fafc; border-left: 3px solid var(--jss-orange); padding: 0.85rem 1rem; border-radius: 0 8px 8px 0; font-size: 0.85rem; color: #334155; line-height: 1.5; margin-bottom: 1.5rem; font-style: italic;">
              Ensuring patient safety throughout the product lifecycle with 24/7 dedicated medical director oversight.
            </div>
            <button type="button" class="btn btn-jss-orange" onclick="openRfpModal('Pharmacovigilance & Drug Safety')" style="margin-top: auto; border-radius: 8px; font-weight: 700;">
              Inquire Drug Safety &rarr;
            </button>
          </div>

          <!-- 5. MEDICAL WRITING & SCIENTIFIC COMMUNICATIONS -->
          <div class="service-box-jss" id="medical-writing" style="scroll-margin-top: 120px;">
            <div class="s-icon-jss" style="color: var(--jss-orange);">
              <i class="fa-solid fa-file-signature"></i>
            </div>
            <span class="s-phase-tag">REGULATORY &amp; SCIENTIFIC DOCUMENTATION</span>
            <h3 style="font-size: 1.35rem; font-weight: 700; color: #1e293b; margin-bottom: 0.85rem;">
              5. Medical Writing &amp; Scientific Communications
            </h3>
            <p style="font-size: 0.925rem; line-height: 1.65; color: #475569; margin-bottom: 1.25rem;">
              Delivering scientifically rigorous documentation across all phases of global drug and device development:
            </p>
            <ul class="s-checklist">
              <li>Clinical study reports (CSRs)</li>
              <li>Protocol development &amp; amendments</li>
              <li>Regulatory documentation &amp; briefing books</li>
              <li>Publications &amp; peer-reviewed manuscripts</li>
            </ul>
            <div style="background: #f8fafc; border-left: 3px solid var(--jss-orange); padding: 0.85rem 1rem; border-radius: 0 8px 8px 0; font-size: 0.85rem; color: #334155; line-height: 1.5; margin-bottom: 1.5rem; font-style: italic;">
              ICH E3 compliant reporting and publication support adhering to ICMJE and GPP guidelines.
            </div>
            <button type="button" class="btn btn-jss-orange" onclick="openRfpModal('Medical Writing & Scientific Communications')" style="margin-top: auto; border-radius: 8px; font-weight: 700;">
              Inquire Medical Writing &rarr;
            </button>
          </div>

          <!-- 6. LABORATORY & BIOMARKER SERVICES -->
          <div class="service-box-jss" id="laboratory-services" style="scroll-margin-top: 120px;">
            <div class="s-icon-jss" style="color: var(--jss-orange);">
              <i class="fa-solid fa-dna"></i>
            </div>
            <span class="s-phase-tag">PRECISION MEDICINE &amp; TESTING</span>
            <h3 style="font-size: 1.35rem; font-weight: 700; color: #1e293b; margin-bottom: 0.85rem;">
              6. Laboratory &amp; Biomarker Services
            </h3>
            <p style="font-size: 0.925rem; line-height: 1.65; color: #475569; margin-bottom: 1.25rem;">
              Supporting precision medicine and advanced therapeutic development with verified analytical testing:
            </p>
            <ul class="s-checklist">
              <li>Central lab services</li>
              <li>Bioanalytical testing &amp; assay validation</li>
              <li>Biomarker profiling &amp; PK/PD bioanalysis</li>
              <li>Sample cold-chain logistics &amp; tracking</li>
            </ul>
            <div style="background: #f8fafc; border-left: 3px solid var(--jss-orange); padding: 0.85rem 1rem; border-radius: 0 8px 8px 0; font-size: 0.85rem; color: #334155; line-height: 1.5; margin-bottom: 1.5rem; font-style: italic;">
              Supporting precision medicine and advanced therapeutic development with GLP-compliant analytical workflows.
            </div>
            <button type="button" class="btn btn-jss-orange" onclick="openRfpModal('Laboratory & Biomarker Services')" style="margin-top: auto; border-radius: 8px; font-weight: 700;">
              Inquire Lab Services &rarr;
            </button>
          </div>

        </div>

        <!-- 7. FUNCTIONAL SERVICE PROVIDER (FSP) SOLUTIONS (FEATURED FULL-WIDTH CARD) -->
        <div id="fsp-solutions" style="margin-top: 2.5rem; background: #ffffff; border: 2px solid var(--border-light, #e2e8f0); border-radius: 16px; padding: 3rem 2.5rem; box-shadow: 0 8px 30px rgba(0,0,0,0.04); scroll-margin-top: 120px; position: relative; overflow: hidden;">
          <div style="position: absolute; top: 0; left: 0; height: 100%; width: 6px; background: var(--jss-orange);"></div>
          
          <div class="fsp-feature-grid">
            <div>
              <div style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.35rem 0.85rem; border-radius: 999px; background: rgba(242, 98, 36, 0.1); border: 1px solid rgba(242, 98, 36, 0.25); color: var(--jss-orange); font-size: 0.75rem; font-weight: 800; letter-spacing: 0.8px; text-transform: uppercase; margin-bottom: 1rem;">
                <span class="orange-beacon"></span>
                <span>FLEXIBLE RESOURCING MODEL</span>
              </div>
              
              <h3 style="font-size: 2rem; font-weight: 800; color: #1e293b; margin-bottom: 1rem; letter-spacing: -0.3px;">
                7. Functional Service Provider (FSP) Solutions
              </h3>
              
              <p style="font-size: 1.05rem; line-height: 1.7; color: #475569; margin-bottom: 1.5rem;">
                Flexible resourcing models tailored to your operational needs across clinical research programs. We embed high-caliber clinical and scientific talent seamlessly into your development pipeline:
              </p>

              <div style="background: #f8fafc; border-left: 3px solid var(--jss-orange); padding: 1rem 1.25rem; border-radius: 0 10px 10px 0; font-size: 0.95rem; color: #334155; line-height: 1.6; font-style: italic; margin-bottom: 1.75rem;">
                Empowering biopharma innovators with elite clinical talent on-demand while maintaining complete sponsor governance and protocol agility.
              </div>

              <button type="button" class="btn btn-jss-orange btn-lg" onclick="openRfpModal('Functional Service Provider (FSP) Solutions')" style="border-radius: 8px; font-weight: 700; padding: 0.95rem 2.25rem;">
                Discuss FSP Partnership &rarr;
              </button>
            </div>

            <!-- FSP ADVANTAGES LIST -->
            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 14px; padding: 2rem;">
              <h4 style="font-size: 1.15rem; font-weight: 700; color: #1e293b; margin-bottom: 1.25rem; display: flex; align-items: center; gap: 0.6rem;">
                <i class="fa-solid fa-users-gear" style="color: var(--jss-orange);"></i>
                <span>FSP Core Advantages</span>
              </h4>
              <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1rem;">
                <li style="display: flex; align-items: flex-start; gap: 0.75rem; font-size: 0.95rem; color: #334155;">
                  <i class="fa-solid fa-circle-check" style="color: var(--jss-orange); margin-top: 0.25rem; font-size: 1.05rem; flex-shrink: 0;"></i>
                  <div>
                    <strong style="color: #1e293b; display: block;">Dedicated Teams:</strong>
                    Directly integrated scientific specialists working as an extension of your internal team.
                  </div>
                </li>
                <li style="display: flex; align-items: flex-start; gap: 0.75rem; font-size: 0.95rem; color: #334155;">
                  <i class="fa-solid fa-circle-check" style="color: var(--jss-orange); margin-top: 0.25rem; font-size: 1.05rem; flex-shrink: 0;"></i>
                  <div>
                    <strong style="color: #1e293b; display: block;">Scalable Operations:</strong>
                    Rapidly ramp study staffing up or down aligned with patient enrollment and trial milestones.
                  </div>
                </li>
                <li style="display: flex; align-items: flex-start; gap: 0.75rem; font-size: 0.95rem; color: #334155;">
                  <i class="fa-solid fa-circle-check" style="color: var(--jss-orange); margin-top: 0.25rem; font-size: 1.05rem; flex-shrink: 0;"></i>
                  <div>
                    <strong style="color: #1e293b; display: block;">Cost-Efficient Delivery:</strong>
                    Eliminate long-term sponsor overhead with predictable, transparent FTE / unit-based pricing models.
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- CALL TO ACTION BANNER -->
    <section style="background-color: var(--jss-navy-dark, #0a1120); color: #ffffff; padding: 5rem 0; text-align: center;">
      <div class="site-container">
        <div style="max-width: 760px; margin: 0 auto;">
          <div class="hero-top-announcement" style="margin-bottom: 1.25rem; display: inline-flex;">
            <span class="orange-beacon"></span>
            <span>LET’S ACCELERATE YOUR PIPELINE</span>
          </div>
          <h2 style="color: #ffffff; font-size: 2.5rem; font-weight: 800; line-height: 1.25; margin-bottom: 1rem; letter-spacing: -0.5px;">
            Ready to Advance Your Clinical Programs?
          </h2>
          <p style="color: #cbd5e1; font-size: 1.1rem; line-height: 1.7; margin: 0 auto 2.5rem;">
            Connect directly with our clinical research directors, biostatisticians, and regulatory strategists to discuss study feasibility and tailored proposals.
          </p>
          <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
            <button type="button" class="btn btn-jss-orange btn-lg" onclick="openRfpModal()" style="border-radius: 8px; font-weight: 700; padding: 1rem 2.5rem; font-size: 1.05rem;">
              Request Study RFP &rarr;
            </button>
            <a href="{{ route('contact') }}" class="btn btn-jss-outline btn-lg" style="border-radius: 8px; font-weight: 700; padding: 1rem 2.5rem; font-size: 1.05rem; color: #ffffff; border-color: rgba(255,255,255,0.4);">
              Contact Us &rarr;
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
