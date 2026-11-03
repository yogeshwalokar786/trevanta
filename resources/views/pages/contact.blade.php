@extends('layouts.app')

@section('title', 'Contact Us & Request Study RFP | AstraClinical Research')
@section('description', 'Get in touch with AstraClinical Research. Request a clinical trial proposal (RFP), study feasibility assessment, or pharmacovigilance consultation.')

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

          <form onsubmit="handleContactSubmit(event)">
            <div class="form-row-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
              <div class="j-field">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.4rem; color: var(--jss-navy);">Full Name *</label>
                <input type="text" required placeholder="Dr. Jane Doe" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-family: inherit;">
              </div>
              <div class="j-field">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.4rem; color: var(--jss-navy);">Corporate Email *</label>
                <input type="email" required placeholder="j.doe@pharma.com" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-family: inherit;">
              </div>
            </div>

            <div class="form-row-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
              <div class="j-field">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.4rem; color: var(--jss-navy);">Company / Sponsor Name *</label>
                <input type="text" required placeholder="e.g. BioTherapeutics Inc." style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-family: inherit;">
              </div>
              <div class="j-field">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.4rem; color: var(--jss-navy);">Phone Number *</label>
                <input type="tel" required placeholder="+1 (555) 000-0000" style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-family: inherit;">
              </div>
            </div>

            <div class="form-row-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
              <div class="j-field">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.4rem; color: var(--jss-navy);">Clinical Phase *</label>
                <select required style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-family: inherit; background: #fff;">
                  <option value="">Select Study Phase</option>
                  <option>Phase I (First-in-Human / PK / PD)</option>
                  <option>Phase II (Proof-of-Concept / Dose Finding)</option>
                  <option>Phase III (Pivotal Global Registration)</option>
                  <option>Phase IV (Post-Marketing / PASS / Registry)</option>
                  <option>Medical Device Feasibility / Pivotal</option>
                  <option>Standalone Pharmacovigilance Support</option>
                  <option>Standalone Biostatistics &amp; CDISC</option>
                </select>
              </div>
              <div class="j-field">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.4rem; color: var(--jss-navy);">Therapeutic Area *</label>
                <select required style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-family: inherit; background: #fff;">
                  <option value="">Select Therapeutic Focus</option>
                  <option>Oncology / Hematology</option>
                  <option>Immunology &amp; Inflammation</option>
                  <option>Neurology &amp; CNS Disorders</option>
                  <option>Cardiovascular &amp; Metabolic</option>
                  <option>Infectious Diseases &amp; Vaccines</option>
                  <option>Rare Diseases &amp; Orphan Drugs</option>
                  <option>Dermatology &amp; Aesthetics</option>
                  <option>Other Therapeutic Focus</option>
                </select>
              </div>
            </div>

            <div class="form-row-2" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
              <div class="j-field">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.4rem; color: var(--jss-navy);">Target Geographic Scope</label>
                <select style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-family: inherit; background: #fff;">
                  <option>North America (USA &amp; Canada)</option>
                  <option>Europe &amp; UK</option>
                  <option>Asia Pacific / India</option>
                  <option>Latin America (Colombia, Brazil, etc.)</option>
                  <option>Multi-Region Global Trial</option>
                </select>
              </div>
              <div class="j-field">
                <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.4rem; color: var(--jss-navy);">Projected Trial Start</label>
                <select style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-family: inherit; background: #fff;">
                  <option>Immediate (Within 3 months)</option>
                  <option>3 to 6 months</option>
                  <option>6 to 12 months</option>
                  <option>Protocol Planning / Budgeting</option>
                </select>
              </div>
            </div>

            <div class="j-field" style="margin-bottom: 1.25rem;">
              <label style="display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 0.4rem; color: var(--jss-navy);">Study Synopsis / Protocol Overview</label>
              <textarea rows="4" placeholder="Briefly describe trial objectives, primary endpoints, estimated patient sample size, or specific vendor requirements..." style="width: 100%; padding: 0.75rem 1rem; border: 1px solid var(--border-light); border-radius: var(--radius-sm); font-family: inherit;"></textarea>
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
                <a href="mailto:info@astraclinical.com" style="color: #ffffff;">info@astraclinical.com</a>
              </div>
              <div style="display: flex; align-items: center; gap: 0.75rem;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--jss-orange)" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                <a href="tel:+15149340805" style="color: #ffffff;">+1 (514) 934-0805 (Montreal HQ)</a>
              </div>
              <div style="display: flex; align-items: center; gap: 0.75rem;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--jss-orange)" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                <span style="color: #cbd5e1;">Hours: Mon–Fri, 8:30 AM – 6:00 PM EST</span>
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
              Hotline: +1 (800) 577-7233 | safety@astraclinical.com
            </p>
          </div>

          <!-- REGIONAL CONTACTS SUMMARY -->
          <div style="background: #ffffff; border: 1px solid var(--border-light); border-radius: var(--radius-md); padding: 1.75rem;">
            <h4 style="margin-bottom: 1rem; font-size: 1.1rem;">Corporate Regional Contacts</h4>
            <div style="display: flex; flex-direction: column; gap: 0.85rem; font-size: 0.85rem;">
              <div>
                <strong>North America (Montreal &amp; Boston):</strong><br>
                <a href="tel:+15149340805" style="color: var(--jss-orange);">+1 (514) 934-0805</a> &bull; na-trials@astraclinical.com
              </div>
              <div>
                <strong>India &amp; APAC (Mumbai &amp; Faridabad):</strong><br>
                <a href="tel:+917738804988" style="color: var(--jss-orange);">+91 7738804988</a> &bull; apac-trials@astraclinical.com
              </div>
              <div>
                <strong>Europe &amp; UK (London &amp; Warsaw):</strong><br>
                <a href="tel:+442079460912" style="color: var(--jss-orange);">+44 20 7946 0912</a> &bull; eu-trials@astraclinical.com
              </div>
              <div>
                <strong>Latin America (Bogotá):</strong><br>
                <a href="tel:+5717443820" style="color: var(--jss-orange);">+57 1 744 3820</a> &bull; latam-trials@astraclinical.com
              </div>
            </div>
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

