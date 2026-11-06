@extends('layouts.app')

@section('title', 'Clinical & BA/BE Services | Clineva')
@section('description', 'Comprehensive Clinical Trial, BA/BE, and Medical Affairs services delivered by Clineva for global Pharmaceutical, Biotechnology, and Medical Device sponsors.')

@section('content')
  <!-- SUBPAGE HERO -->
  <section class="subpage-hero">
    <div class="site-container">
      <span class="eyebrow-jss">SERVICE PORTFOLIO</span>
      <h1>Comprehensive Clinical &amp; BA/BE Services</h1>
      <p>
        Reliable, cost-effective, and technology-driven clinical research, regulatory, and monitoring solutions from inception to completion.
      </p>
      <nav class="breadcrumbs" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        <span class="current">Services</span>
      </nav>
    </div>
  </section>

  <!-- QUICK CATEGORY NAVIGATION PILLS -->
  <section style="background-color: var(--bg-subtle, #f8fafc); border-bottom: 1px solid var(--border-light, #e2e8f0); padding: 1.25rem 0;">
    <div class="site-container" style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
      <a href="#clinical-trial" class="btn btn-jss-outline" style="font-size: 0.85rem; padding: 0.5rem 1.25rem;">
        Clinical Trial Services (9) &darr;
      </a>
      <a href="#babe-services" class="btn btn-jss-outline" style="font-size: 0.85rem; padding: 0.5rem 1.25rem;">
        BA/BE Services (5) &darr;
      </a>
      <a href="#medical-affairs" class="btn btn-jss-outline" style="font-size: 0.85rem; padding: 0.5rem 1.25rem;">
        Medical Affairs &amp; Medico Marketing &darr;
      </a>
    </div>
  </section>

  <main>
    <!-- SECTION 1: CLINICAL TRIAL -->
    <section class="subpage-content" id="clinical-trial" style="scroll-margin-top: 100px;">
      <div class="site-container">
        <div class="section-title-wrap text-center" style="margin-bottom: 2.5rem;">
          <span class="eyebrow-jss">DIVISION 01</span>
          <h2 class="main-title">Clinical Trial Services</h2>
          <p class="subtitle-jss">
            End-to-end execution, monitoring, and quality oversight for multi-phase clinical investigations.
          </p>
        </div>

        <div class="services-grid-jss">
          <!-- 1. Clinical Operations -->
          <div class="service-box-jss" id="clinical-operations" style="scroll-margin-top: 120px;">
            <div class="s-icon-jss">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M10 2v7.31L4.12 20.27A1 1 0 0 0 5 22h14a1 1 0 0 0 .88-1.73L14 9.31V2"/><line x1="8.5" y1="2" x2="15.5" y2="2"/><line x1="6.5" y1="16" x2="17.5" y2="16"/></svg>
            </div>
            <span class="s-phase-tag">CORE EXECUTION</span>
            <h3>Clinical Operations</h3>
            <p>
              Comprehensive trial management ensuring protocol compliance, efficient site start-up, patient recruitment acceleration, and seamless milestone delivery.
            </p>
            <ul class="s-checklist">
              <li>Site feasibility &amp; selection</li>
              <li>Patient recruitment strategies</li>
              <li>Investigator &amp; site coordination</li>
            </ul>
            <button class="btn btn-jss-orange" onclick="openRfpModal()">Inquire &rarr;</button>
          </div>

          <!-- 2. Project Management -->
          <div class="service-box-jss" id="project-management" style="scroll-margin-top: 120px;">
            <div class="s-icon-jss">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            </div>
            <span class="s-phase-tag">LEADERSHIP &amp; TIMELINE</span>
            <h3>Project Management</h3>
            <p>
              Dedicated Project Managers orchestrating trial deliverables, risk management, vendor governance, and timeline adherence to meet sponsor milestones.
            </p>
            <ul class="s-checklist">
              <li>Timeline &amp; milestone governance</li>
              <li>Budget &amp; resource management</li>
              <li>Stakeholder communication &amp; reporting</li>
            </ul>
            <button class="btn btn-jss-orange" onclick="openRfpModal()">Inquire &rarr;</button>
          </div>

          <!-- 3. Clinical Trial Monitoring -->
          <div class="service-box-jss" id="clinical-trial-monitoring" style="scroll-margin-top: 120px;">
            <div class="s-icon-jss">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 14 14"/></svg>
            </div>
            <span class="s-phase-tag">ICH-GCP MONITORING</span>
            <h3>Clinical Trial Monitoring</h3>
            <p>
              Experienced Clinical Research Associates (CRAs) conducting on-site, remote, and centralized risk-based monitoring (RBM) aligned with ICH-GCP.
            </p>
            <ul class="s-checklist">
              <li>On-site &amp; remote site monitoring</li>
              <li>Source Data Verification (SDV)</li>
              <li>Protocol compliance oversight</li>
            </ul>
            <button class="btn btn-jss-orange" onclick="openRfpModal()">Inquire &rarr;</button>
          </div>

          <!-- 4. Medical Monitoring -->
          <div class="service-box-jss" id="medical-monitoring" style="scroll-margin-top: 120px;">
            <div class="s-icon-jss">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
            </div>
            <span class="s-phase-tag">PHYSICIAN OVERSIGHT</span>
            <h3>Medical Monitoring</h3>
            <p>
              24/7 physician oversight providing protocol medical interpretations, patient eligibility reviews, safety evaluation, and adverse event adjudication.
            </p>
            <ul class="s-checklist">
              <li>Safety event review &amp; evaluation</li>
              <li>Subject eligibility queries</li>
              <li>Medical advice for study sites</li>
            </ul>
            <button class="btn btn-jss-orange" onclick="openRfpModal()">Inquire &rarr;</button>
          </div>

          <!-- 5. Quality Assurance -->
          <div class="service-box-jss" id="quality-assurance" style="scroll-margin-top: 120px;">
            <div class="s-icon-jss">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
            <span class="s-phase-tag">COMPLIANCE &amp; AUDITS</span>
            <h3>Quality Assurance</h3>
            <p>
              Independent quality auditing, inspection readiness evaluations, standard operating procedure (SOP) harmonizations, and regulatory defense.
            </p>
            <ul class="s-checklist">
              <li>Investigator site audits</li>
              <li>Vendor qualification audits</li>
              <li>CAPA system management</li>
            </ul>
            <button class="btn btn-jss-orange" onclick="openRfpModal()">Inquire &rarr;</button>
          </div>

          <!-- 6. Medical Writing -->
          <div class="service-box-jss" id="medical-writing" style="scroll-margin-top: 120px;">
            <div class="s-icon-jss">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
            </div>
            <span class="s-phase-tag">SCIENTIFIC DOCUMENTATION</span>
            <h3>Medical Writing</h3>
            <p>
              Expert preparation of ICH E3 compliant Clinical Study Reports (CSRs), protocols, Investigator Brochures (IB), and patient-centric documents.
            </p>
            <ul class="s-checklist">
              <li>Protocol &amp; amendment drafting</li>
              <li>Clinical Study Reports (CSR)</li>
              <li>Informed Consent Documents (ICD)</li>
            </ul>
            <button class="btn btn-jss-orange" onclick="openRfpModal()">Inquire &rarr;</button>
          </div>

          <!-- 7. eTMF Management -->
          <div class="service-box-jss" id="etmf-management" style="scroll-margin-top: 120px;">
            <div class="s-icon-jss">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
            </div>
            <span class="s-phase-tag">INSPECTION READINESS</span>
            <h3>eTMF Management</h3>
            <p>
              Electronic Trial Master File management conforming to DIA reference models, ensuring complete document tracking, quality QC, and audit readiness.
            </p>
            <ul class="s-checklist">
              <li>DIA reference model indexing</li>
              <li>Continuous completeness tracking</li>
              <li>Inspection-ready archives</li>
            </ul>
            <button class="btn btn-jss-orange" onclick="openRfpModal()">Inquire &rarr;</button>
          </div>

          <!-- 8. Regulatory Affairs -->
          <div class="service-box-jss" id="regulatory-affairs" style="scroll-margin-top: 120px;">
            <div class="s-icon-jss">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
            </div>
            <span class="s-phase-tag">HEALTH AUTHORITY LIAISON</span>
            <h3>Regulatory Affairs</h3>
            <p>
              Strategic consulting and submissions for IND, CTA, and ethics committee approvals, ensuring smooth pathways with international regulatory authorities.
            </p>
            <ul class="s-checklist">
              <li>CTA &amp; IND dossier preparation</li>
              <li>IRB/IEC submissions &amp; responses</li>
              <li>Regulatory meeting representation</li>
            </ul>
            <button class="btn btn-jss-orange" onclick="openRfpModal()">Inquire &rarr;</button>
          </div>

          <!-- 9. Statistical Services -->
          <div class="service-box-jss" id="statistical-services" style="scroll-margin-top: 120px;">
            <div class="s-icon-jss">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
            </div>
            <span class="s-phase-tag">DATA &amp; BIOSTATISTICS</span>
            <h3>Statistical Services</h3>
            <p>
              Statistical design, sample size estimation, Statistical Analysis Plans (SAP), CDISC SDTM/ADaM programming, and comprehensive statistical reporting.
            </p>
            <ul class="s-checklist">
              <li>Statistical Analysis Plans (SAP)</li>
              <li>Sample size calculation &amp; modeling</li>
              <li>CDISC SDTM / ADaM dataset creation</li>
            </ul>
            <button class="btn btn-jss-orange" onclick="openRfpModal()">Inquire &rarr;</button>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 2: BA/BE SERVICES -->
    <section class="subpage-content alt-bg" id="babe-services" style="scroll-margin-top: 100px;">
      <div class="site-container">
        <div class="section-title-wrap text-center" style="margin-bottom: 2.5rem;">
          <span class="eyebrow-jss">DIVISION 02</span>
          <h2 class="main-title">BA/BE Services</h2>
          <p class="subtitle-jss">
            Bioavailability and Bioequivalence study management tailored to generic, biosimilar, and pharmaceutical development programs.
          </p>
        </div>

        <div class="services-grid-jss">
          <!-- 1. CRO Selection -->
          <div class="service-box-jss" id="cro-selection" style="scroll-margin-top: 120px;">
            <div class="s-icon-jss">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
            <span class="s-phase-tag">QUALIFICATION &amp; VETTING</span>
            <h3>CRO Selection</h3>
            <p>
              Identification, technical evaluation, and selection of specialized BA/BE clinical facilities, bioanalytical labs, and clinical trial units.
            </p>
            <ul class="s-checklist">
              <li>Facility capability assessment</li>
              <li>Bioanalytical lab audits</li>
              <li>Competitive pricing negotiation</li>
            </ul>
            <button class="btn btn-jss-orange" onclick="openRfpModal()">Inquire &rarr;</button>
          </div>

          <!-- 2. Medical Writing (BA/BE) -->
          <div class="service-box-jss" id="ba-medical-writing" style="scroll-margin-top: 120px;">
            <div class="s-icon-jss">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
            </div>
            <span class="s-phase-tag">BA/BE PROTOCOLS &amp; REPORTS</span>
            <h3>Medical Writing (BA/BE)</h3>
            <p>
              Drafting BA/BE protocols, bioanalytical method development summaries, and integrated clinical study reports compliant with global regulatory standards.
            </p>
            <ul class="s-checklist">
              <li>Fasting &amp; fed BA/BE protocols</li>
              <li>Integrated bioanalytical reports</li>
              <li>Regulatory deficiency responses</li>
            </ul>
            <button class="btn btn-jss-orange" onclick="openRfpModal()">Inquire &rarr;</button>
          </div>

          <!-- 3. Study Monitoring -->
          <div class="service-box-jss" id="study-monitoring" style="scroll-margin-top: 120px;">
            <div class="s-icon-jss">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </div>
            <span class="s-phase-tag">CLINICAL &amp; BIOANALYTICAL</span>
            <h3>Study Monitoring</h3>
            <p>
              Rigorous monitoring of clinical dosing, pharmacokinetic (PK) blood sample collection, cold-chain handling, and bioanalytical run validation.
            </p>
            <ul class="s-checklist">
              <li>Dosing &amp; PK sample surveillance</li>
              <li>Centrifuge &amp; deep-freeze logs check</li>
              <li>Bioanalytical LC-MS/MS batch audit</li>
            </ul>
            <button class="btn btn-jss-orange" onclick="openRfpModal()">Inquire &rarr;</button>
          </div>

          <!-- 4. Regulatory Affairs (BA/BE) -->
          <div class="service-box-jss" id="ba-regulatory-affairs" style="scroll-margin-top: 120px;">
            <div class="s-icon-jss">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
            </div>
            <span class="s-phase-tag">ANDA / GENERIC SUBMISSIONS</span>
            <h3>Regulatory Affairs (BA/BE)</h3>
            <p>
              Guidance on regulatory requirements across FDA, EMA, and international agencies for bioequivalence waivers, sample sizing, and ANDA filings.
            </p>
            <ul class="s-checklist">
              <li>Biowaiver application dossiers</li>
              <li>ANDA / generic eCTD module filing</li>
              <li>Regulatory query resolution</li>
            </ul>
            <button class="btn btn-jss-orange" onclick="openRfpModal()">Inquire &rarr;</button>
          </div>

          <!-- 5. GCP and GLP Audit -->
          <div class="service-box-jss" id="gcp-glp-audit" style="scroll-margin-top: 120px;">
            <div class="s-icon-jss">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            </div>
            <span class="s-phase-tag">INSPECTION READINESS</span>
            <h3>GCP and GLP Audit</h3>
            <p>
              Specialized independent audits of BA/BE clinical units and bioanalytical testing laboratories to ensure full compliance with GCP and GLP norms.
            </p>
            <ul class="s-checklist">
              <li>Clinical facility GCP inspection</li>
              <li>Bioanalytical lab GLP compliance</li>
              <li>Audit report &amp; CAPA tracking</li>
            </ul>
            <button class="btn btn-jss-orange" onclick="openRfpModal()">Inquire &rarr;</button>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 3: MEDICAL AFFAIRS AND MEDICO MARKETING -->
    <section class="subpage-content" id="medical-affairs" style="scroll-margin-top: 100px;">
      <div class="site-container">
        <div class="statement-card" style="border-left: 6px solid var(--jss-orange);">
          <span class="statement-badge">DIVISION 03 &bull; STRATEGIC VALUE</span>
          <h2>Medical Affairs and Medico Marketing</h2>
          <p class="statement-lead">
            Bridging science, clinical evidence, and commercialization to establish strong scientific brand equity for pharmaceutical, biotech, and medical device products.
          </p>

          <div class="statement-grid-2">
            <div class="overview-highlight-card" style="box-shadow: none;">
              <h3>Medical Affairs Capabilities</h3>
              <ul class="dropdown-list" style="line-height: 2;">
                <li><strong>&bull; Key Opinion Leader (KOL) Engagement:</strong> Advisory boards, scientific advisory meetings, and KOL mapping.</li>
                <li><strong>&bull; Medical Information &amp; Scientific Review:</strong> Accurate responses to unsolicited medical queries and promotional material validation.</li>
                <li><strong>&bull; Scientific Publication Planning:</strong> Peer-reviewed journal manuscripts, symposium presentations, and scientific abstracts.</li>
                <li><strong>&bull; Medical Education:</strong> Continuous medical education (CME) content and healthcare professional training modules.</li>
              </ul>
            </div>

            <div class="overview-highlight-card" style="box-shadow: none;">
              <h3>Medico Marketing &amp; Brand Strategy</h3>
              <ul class="dropdown-list" style="line-height: 2;">
                <li><strong>&bull; Evidence-Based Brand Positioning:</strong> Translating clinical trial endpoints into meaningful clinical differentiators.</li>
                <li><strong>&bull; Scientific Promotional Literature:</strong> LBLs, product monographs, visual aids, and whitepapers.</li>
                <li><strong>&bull; Compliance &amp; Regulatory Review:</strong> Ensuring promotional materials adhere to local code of pharmaceutical marketing practices.</li>
                <li><strong>&bull; Launch Strategy Support:</strong> Pre-launch scientific awareness campaigns and post-launch clinical value communication.</li>
              </ul>
              <div style="margin-top: 1.5rem;">
                <button class="btn btn-jss-orange" onclick="openRfpModal()">
                  Discuss Medical Affairs Partnership &rarr;
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA BANNER -->
    <section style="background-color: var(--jss-navy-dark, #0a1120); color: #ffffff; padding: 4.5rem 0; text-align: center;">
      <div class="site-container">
        <h2 style="color: #ffffff; font-size: 2.3rem; margin-bottom: 1rem;">Ready to Advance Your Clinical Programs?</h2>
        <p style="color: #cbd5e1; font-size: 1.1rem; max-width: 650px; margin: 0 auto 2rem;">
          Connect directly with our team of clinical research, BA/BE, and medical monitoring specialists to discuss your study requirements.
        </p>
        <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
          <button class="btn btn-jss-orange btn-lg" onclick="openRfpModal()">
            Request Study RFP &rarr;
          </button>
          <a href="{{ route('contact') }}" class="btn btn-jss-outline btn-lg" style="color: #fff; border-color: rgba(255,255,255,0.4);">
            Contact Us &rarr;
          </a>
        </div>
      </div>
    </section>
  </main>
@endsection
