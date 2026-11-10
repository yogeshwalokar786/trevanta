@extends('layouts.app')

@section('title', setting('contact_meta_title', 'Contact Us & Request Study RFP | ' . setting('site_name', 'Trevanta International')))
@section('description', setting('contact_meta_description', 'Get in touch with Trevanta International. Request a clinical trial proposal (RFP), study feasibility assessment, or pharmacovigilance consultation.'))

@push('seo')
  <link rel="canonical" href="{{ rtrim(setting('canonical_url_base', url('/')), '/') }}/contact">
  <meta name="robots" content="{{ setting('meta_robots_default', 'index, follow') }}">
  @if(setting('contact_meta_keywords'))
    <meta name="keywords" content="{{ setting('contact_meta_keywords') }}">
  @endif
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="{{ setting('site_name', 'Trevanta International') }}">
  <meta property="og:title" content="{{ setting('contact_meta_title', 'Contact Us & Request Study RFP | ' . setting('site_name', 'Trevanta International')) }}">
  <meta property="og:description" content="{{ setting('contact_meta_description', 'Get in touch with Trevanta International. Request a clinical trial proposal (RFP), study feasibility assessment, or pharmacovigilance consultation.') }}">
  <meta property="og:url" content="{{ rtrim(setting('canonical_url_base', url('/')), '/') }}/contact">
  @php
    $contactOg = setting('contact_og_image', setting('home_og_image', 'images/doctor-consultation.jpg'));
    $contactOgUrl = asset($contactOg);
  @endphp
  <meta property="og:image" content="{{ $contactOgUrl }}">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="{{ setting('contact_meta_title', 'Contact Us & Request Study RFP | ' . setting('site_name', 'Trevanta International')) }}">
  <meta name="twitter:description" content="{{ setting('contact_meta_description', 'Get in touch with Trevanta International. Request a clinical trial proposal (RFP), study feasibility assessment, or pharmacovigilance consultation.') }}">
  <meta name="twitter:image" content="{{ $contactOgUrl }}">
@endpush

@section('content')
  <!-- SUBPAGE HERO -->
  <section class="subpage-hero">
    <div class="site-container">
      <span class="eyebrow-jss">GET IN TOUCH</span>
      <h1>Connect With Our Clinical &amp; Medical Affairs Leadership</h1>
      <p>
        Whether planning an impending IND submission, seeking expert safety oversight, or requesting comprehensive clinical trial proposals, our team responds promptly within 24 hours.
      </p>
      <nav class="breadcrumbs" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        <span class="current">Contact Us</span>
      </nav>
    </div>
  </section>

  <main class="subpage-content">
    <div class="site-container">
      
      <!-- 2-COLUMN CONTACT LAYOUT -->
      <div style="display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 3.5rem; align-items: flex-start;">
        
        <!-- COLUMN 1: COMPREHENSIVE STUDY RFP FORM -->
        <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 2.5rem; box-shadow: var(--shadow-sm);">
          <span class="eyebrow-jss">STUDY INQUIRY &amp; RFP</span>
          <h2 style="font-size: 1.8rem; margin-bottom: 0.5rem;">Request a Clinical Trial Proposal</h2>
          <p style="margin-bottom: 2rem;">Please submit your study outline. All discussions and protocol synopses are protected by strict corporate confidentiality.</p>

          @if(session('success'))
            <div style="background: #ecfdf5; border: 1px solid #a7f3d0; border-radius: 8px; padding: 1rem 1.25rem; color: #065f46; font-size: 0.95rem; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.75rem;">
              <i class="fa-solid fa-circle-check" style="font-size: 1.2rem; color: #10b981;"></i>
              <span>{{ session('success') }}</span>
            </div>
          @endif

          <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            {{-- Anti-Spam Security Honeypot --}}
            <div style="display: none !important; opacity: 0; position: absolute; left: -9999px;" aria-hidden="true">
              <input type="text" name="website_hp" tabindex="-1" autocomplete="off">
            </div>
            <div class="form-row-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
              <div class="j-field">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.4rem; color: var(--jss-navy);">Full Name *</label>
                <input type="text" name="name" required placeholder="Dr. Jane Doe" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-family: inherit;">
              </div>
              <div class="j-field">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.4rem; color: var(--jss-navy);">Corporate Email *</label>
                <input type="email" name="email" required placeholder="j.doe@pharma.com" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-family: inherit;">
              </div>
            </div>

            <div class="form-row-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
              <div class="j-field">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.4rem; color: var(--jss-navy);">Company / Sponsor Name</label>
                <input type="text" name="organization" placeholder="e.g. BioTherapeutics Inc." style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-family: inherit;">
              </div>
              <div class="j-field">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.4rem; color: var(--jss-navy);">Phone Number</label>
                <input type="tel" name="phone" placeholder="+1 (555) 000-0000" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-family: inherit;">
              </div>
            </div>

            <div class="form-row-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
              <div class="j-field">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.4rem; color: var(--jss-navy);">Service Required *</label>
                <select name="service" required style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-family: inherit; background: #fff;">
                  <option value="" disabled selected>Select Core Service</option>
                  <option value="Clinical Development (Phase I–IV)">1. Clinical Development (Phase I–IV)</option>
                  <option value="Regulatory Affairs & Strategy">2. Regulatory Affairs &amp; Strategy</option>
                  <option value="Biometrics & Data Management">3. Biometrics &amp; Data Management</option>
                  <option value="Pharmacovigilance & Drug Safety">4. Pharmacovigilance &amp; Drug Safety</option>
                  <option value="Medical Writing & Scientific Communications">5. Medical Writing &amp; Scientific Communications</option>
                  <option value="Laboratory & Biomarker Services">6. Laboratory &amp; Biomarker Services</option>
                  <option value="Functional Service Provider (FSP) Solutions">7. Functional Service Provider (FSP) Solutions</option>
                </select>
              </div>
              <div class="j-field">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.4rem; color: var(--jss-navy);">Therapeutic Area *</label>
                <select name="therapeutic_area" required style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-family: inherit; background: #fff;">
                  <option value="" disabled selected>Select Therapeutic Focus</option>
                  <option>Oncology &amp; Hematology</option>
                  <option>Infectious Diseases &amp; Vaccines</option>
                  <option>Cardiovascular &amp; Metabolic Disorders</option>
                  <option>Neurology &amp; CNS Disorders</option>
                  <option>Rare Diseases &amp; Orphan Drugs</option>
                  <option>Diabetes, Endocrinology &amp; Obesity</option>
                  <option>Immunology &amp; Autoimmune Disorders</option>
                  <option>Respiratory &amp; Pulmonary Diseases</option>
                  <option>Dermatology &amp; Skin Diseases</option>
                  <option>Women's Health &amp; Reproductive Medicine</option>
                  <option>Pediatrics &amp; Neonatology</option>
                  <option>Other Therapeutic Focus</option>
                </select>
              </div>
            </div>

            <div class="form-row-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
              <div class="j-field">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.4rem; color: var(--jss-navy);">Target Geographic Scope</label>
                <select name="geographic_scope" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-family: inherit; background: #fff;">
                  <option>North America (USA &amp; Canada)</option>
                  <option>Europe &amp; UK</option>
                  <option>Asia Pacific / India</option>
                  <option>Middle East &amp; UAE</option>
                  <option>Latin America (Colombia, Brazil, etc.)</option>
                  <option>Multi-Region Global Trial</option>
                </select>
              </div>
              <div class="j-field">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.4rem; color: var(--jss-navy);">Projected Trial Start</label>
                <select name="projected_start" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-family: inherit; background: #fff;">
                  <option>Immediate (Within 3 months)</option>
                  <option>3 to 6 months</option>
                  <option>6 to 12 months</option>
                  <option>Protocol Planning / Budgeting</option>
                </select>
              </div>
            </div>

            <div class="j-field" style="margin-bottom: 1.25rem;">
              <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.4rem; color: var(--jss-navy);">Study Synopsis / Project Requirements *</label>
              <textarea name="message" required rows="4" placeholder="Briefly describe trial objectives, primary endpoints, estimated patient sample size, or specific service requirements..." style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-family: inherit;"></textarea>
            </div>

            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.5rem; font-size: 0.85rem;">
              <input type="checkbox" id="contact-nda" checked required>
              <label for="contact-nda">Execute Mutual Non-Disclosure Agreement (NDA) prior to confidential protocol review.</label>
            </div>

            <button type="submit" class="btn btn-jss-orange btn-lg" style="width: 100%;">
              Submit Protocol for RFP Analysis &rarr;
            </button>
          </form>
        </div>

        <!-- COLUMN 2: DIRECT INQUIRIES & REGIONAL HOTLINES -->
        <div>
          <!-- QUICK CONTACT CARD -->
          <div style="background: var(--jss-navy); color: #ffffff; border-radius: var(--radius-md); padding: 2rem; margin-bottom: 2rem;">
            <span style="font-size: 0.75rem; font-weight: 700; color: var(--jss-orange); text-transform: uppercase; letter-spacing: 0.8px;">DIRECT ACCESS</span>
            <h3 style="color: #ffffff; margin-top: 0.25rem; font-size: 1.35rem;">General Inquiries</h3>
            <p style="color: #cbd5e1; font-size: 0.95rem; margin-bottom: 1.5rem;">Our business development and medical directorates are available worldwide.</p>

            <div style="display: flex; flex-direction: column; gap: 1rem; font-size: 0.95rem;">
              <div style="display: flex; align-items: center; gap: 0.75rem;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--jss-orange)" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                <a href="mailto:{{ setting('contact_email', 'info@trevanta.com') }}" style="color: #ffffff;">{{ setting('contact_email', 'info@trevanta.com') }}</a>
              </div>
              <div style="display: flex; align-items: center; gap: 0.75rem;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--jss-orange)" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('phone_na', '+1 (514) 934-0805')) }}" style="color: #ffffff;">{{ setting('phone_na', '+1 (514) 934-0805') }} (Montreal HQ)</a>
              </div>
              <div style="display: flex; align-items: center; gap: 0.75rem;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--jss-orange)" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                <span style="color: #cbd5e1;">Hours: {{ setting('operating_hours', 'Mon–Fri, 8:30 AM – 6:00 PM EST') }}</span>
              </div>
            </div>
          </div>

          <!-- PHARMACOVIGILANCE HOTLINE -->
          <div style="background: #ffffff; border: 2px dashed var(--jss-orange); border-radius: var(--radius-md); padding: 1.75rem; margin-bottom: 2rem;">
            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
              <span style="display: inline-block; width: 10px; height: 10px; border-radius: 50%; background: #ef4444; animation: pulse 2s infinite;"></span>
              <strong style="color: var(--jss-navy); font-size: 0.95rem;">24/7 Safety &amp; ICSR Reporting Hotline</strong>
            </div>
            <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 0.75rem;">
              For ongoing trial investigators reporting SUSARs, SAEs, or unexpected adverse drug events:
            </p>
            <p style="font-size: 0.95rem; font-weight: 700; color: var(--jss-orange); margin: 0;">
              Hotline: {{ setting('phone_safety', '+1 (800) 577-7233') }} | {{ setting('safety_email', 'safety@trevanta.com') }}
            </p>
          </div>

          <!-- PHOTO CARD -->
          <div class="split-photo-frame" style="margin-top: 1.5rem;">
            <img src="{{ asset('images/doctor-consultation.jpg') }}" alt="Clinical Investigation Protocol Review" style="height: 220px;">
          </div>

        </div>

      </div>

    </div>
  </main>
@endsection

