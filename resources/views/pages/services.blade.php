@extends('layouts.app')

@section('title', 'Clinical Services | AstraClinical Research - Global CRO')
@section('description', 'Explore full-spectrum clinical research organization services by AstraClinical Research: Phase I-IV trials, Pharmacovigilance, Regulatory Affairs, Medical Writing & Biostatistics.')

@section('content')
  <!-- SUBPAGE HERO -->
  <section class="subpage-hero">
    <div class="site-container">
      <span class="eyebrow-jss">CAPABILITIES &amp; OFFERINGS</span>
      <h1>Comprehensive Clinical Development Services</h1>
      <p>
        Accelerating your pipeline from First-in-Human through Post-Marketing Surveillance with deep scientific expertise, global site reach, and regulatory confidence.
      </p>
      <nav class="breadcrumbs" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        <span class="current">Services</span>
      </nav>
    </div>
  </section>

  <!-- MAIN SERVICES CONTENT -->
  <main>
    <!-- SERVICE 1: CLINICAL OPERATIONS -->
    <section class="service-deepdive">
      <div class="site-container">
        <div class="two-col-layout">
          <div>
            <span class="eyebrow-jss">SERVICE 01</span>
            <h2>Clinical Operations &amp; Site Management (Phase I–IV)</h2>
            <p>
              We provide end-to-end trial management backed by over 8,500 investigator hospital sites across 28 countries. We combine risk-based monitoring (RBM) and decentralized clinical trial (DCT) methodologies to ensure exceptional patient retention and flawless protocol adherence.
            </p>
            <div class="slide-bullets">
              <span>&bull; Site Feasibility &amp; Startup: Rapid IRB/EC submission packages with median 18-day clearance</span>
              <span>&bull; Patient Recruitment Acceleration: Multilingual patient engagement and decentralized home healthcare</span>
              <span>&bull; Risk-Based Remote Monitoring: Continuous data surveillance aligned with ICH E6(R2)</span>
            </div>
            <button class="btn btn-jss-orange" onclick="openRfpModal()" style="margin-top: 1.5rem;">
              Consult Operations Team &rarr;
            </button>
          </div>
          <div>
            <div class="service-box-jss" style="box-shadow: var(--shadow-md);">
              <div class="s-icon-jss"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 2v7.31L4.12 20.27A1 1 0 0 0 5 22h14a1 1 0 0 0 .88-1.73L14 9.31V2"/><line x1="8.5" y1="2" x2="15.5" y2="2"/><line x1="6.5" y1="16" x2="17.5" y2="16"/></svg></div>
              <span class="s-phase-tag">CORE DELIVERABLES</span>
              <h3>Clinical Operations Package</h3>
              <ul class="s-checklist">
                <li>Investigator contract &amp; budget negotiation</li>
                <li>Investigational Product (IP) cold-chain distribution</li>
                <li>Trial Master File (eTMF) inspection readiness</li>
                <li>Clinical Study Report (CSR) authoring under ICH E3</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SERVICE 2: PHARMACOVIGILANCE -->
    <section class="service-deepdive" style="background-color: var(--bg-page);">
      <div class="site-container">
        <div class="two-col-layout reverse">
          <div>
            <div class="service-box-jss" style="box-shadow: var(--shadow-md);">
              <div class="s-icon-jss"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
              <span class="s-phase-tag">24/7/365 SURVEILLANCE</span>
              <h3>Drug Safety &amp; Vigilance</h3>
              <ul class="s-checklist">
                <li>Individual Case Safety Reports (ICSR) intake &amp; triage</li>
                <li>E2B(R3) expedited regulatory submissions</li>
                <li>Periodic Benefit-Risk Evaluation Reports (PBRER)</li>
                <li>Local &amp; EU QPPV 24/7 coverage</li>
              </ul>
            </div>
          </div>
          <div>
            <span class="eyebrow-jss">SERVICE 02</span>
            <h2>Pharmacovigilance &amp; Drug Safety Oversight</h2>
            <p>
              Maintain complete patient safety and vigilance compliance across pre-marketing clinical trials and commercial product lifecycles. Our 24/7 medical review officers and hosted safety database infrastructure guarantee zero late-submission penalties.
            </p>
            <div class="slide-bullets">
              <span>&bull; Medical Triage: Board-certified physicians handling serious adverse events (SAEs)</span>
              <span>&bull; Signal Detection: Quantitative disproportionality scoring and literature screening</span>
              <span>&bull; Risk Management Plans: RMP and REMS authoring for US FDA, EMA, and global agencies</span>
            </div>
            <button class="btn btn-jss-orange" onclick="openRfpModal()" style="margin-top: 1.5rem;">
              Request PV System Consultation &rarr;
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- SERVICE 3: REGULATORY AFFAIRS -->
    <section class="service-deepdive">
      <div class="site-container">
        <div class="two-col-layout">
          <div>
            <span class="eyebrow-jss">SERVICE 03</span>
            <h2>Regulatory Affairs &amp; Global Submissions</h2>
            <p>
              From initial scientific advice meetings to formal market authorization filings, our regulatory strategists guide complex therapeutics through US FDA, EMA, Health Canada, and Asian agency pathways.
            </p>
            <div class="slide-bullets">
              <span>&bull; Investigational Submissions: IND, CTA, IMPD, and Pre-IND briefing document preparation</span>
              <span>&bull; Marketing Authorizations: NDA, BLA, MAA, and 510(k)/PMA electronic eCTD compilation</span>
              <span>&bull; Authorized Representation: US Agent and in-country regulatory sponsorship</span>
            </div>
            <button class="btn btn-jss-orange" onclick="openRfpModal()" style="margin-top: 1.5rem;">
              Review Regulatory Strategy &rarr;
            </button>
          </div>
          <div>
            <div class="service-box-jss" style="box-shadow: var(--shadow-md);">
              <div class="s-icon-jss"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg></div>
              <span class="s-phase-tag">GLOBAL REGULATORY SHIELD</span>
              <h3>Regulatory Dossier Services</h3>
              <ul class="s-checklist">
                <li>Pre-IND &amp; scientific advice briefing dossiers</li>
                <li>eCTD Module 1–5 compilation and validation</li>
                <li>Health Authority inspection audit defense</li>
                <li>Labeling &amp; package insert localization</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SERVICE 4: BIOSTATISTICS & DATA MANAGEMENT -->
    <section class="service-deepdive" style="background-color: var(--bg-page);">
      <div class="site-container">
        <div class="two-col-layout reverse">
          <div>
            <div class="service-box-jss" style="box-shadow: var(--shadow-md);">
              <div class="s-icon-jss"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></div>
              <span class="s-phase-tag">CDISC PLATINUM</span>
              <h3>Data &amp; Statistical Solutions</h3>
              <ul class="s-checklist">
                <li>21 CFR Part 11 compliant Electronic Data Capture</li>
                <li>CDISC SDTM, ADaM &amp; Define.xml 2.1 datasets</li>
                <li>Statistical Analysis Plan (SAP) &amp; sample size models</li>
                <li>Independent SAS&reg; &amp; R double-programming</li>
              </ul>
            </div>
          </div>
          <div>
            <span class="eyebrow-jss">SERVICE 04</span>
            <h2>Biostatistics &amp; Clinical Data Management</h2>
            <p>
              Extract conclusive clinical proof with statistical precision. From sample size simulations to CDISC SDTM/ADaM package generation, our data management ensures clean, rapid database locks under 15 business days.
            </p>
            <div class="slide-bullets">
              <span>&bull; Flawless Data Cleanliness: Automated edit checks, query management, and medical coding</span>
              <span>&bull; Interim Analyses: Blinded DSMB and IDMC statistical analysis and reporting</span>
              <span>&bull; Regulatory Package: Ready for US FDA and EMA electronic submission validation</span>
            </div>
            <button class="btn btn-jss-orange" onclick="openRfpModal()" style="margin-top: 1.5rem;">
              Consult Biostatistical Leads &rarr;
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- SERVICE 5: MEDICAL WRITING -->
    <section class="service-deepdive">
      <div class="site-container">
        <div class="two-col-layout">
          <div>
            <span class="eyebrow-jss">SERVICE 05</span>
            <h2>Medical Writing &amp; Scientific Communication</h2>
            <p>
              Authored by PhD and MD medical communicators with deep therapeutic specialization. We craft clear, scientifically robust, and audit-ready documentation in full compliance with ICH E3 and E6 guidelines.
            </p>
            <div class="slide-bullets">
              <span>&bull; Clinical Study Protocols &amp; Amendments: Scientifically sound, operationally feasible designs</span>
              <span>&bull; Clinical Study Reports (CSR): Rigorous CSRs structured to withstand health authority scrutiny</span>
              <span>&bull; Medical Device CERs: MEDDEV 2.7/1 Rev 4 and EU MDR compliant Clinical Evaluation Reports</span>
            </div>
            <button class="btn btn-jss-orange" onclick="openRfpModal()" style="margin-top: 1.5rem;">
              Request Medical Writing Quote &rarr;
            </button>
          </div>
          <div>
            <div class="service-box-jss" style="box-shadow: var(--shadow-md);">
              <div class="s-icon-jss"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg></div>
              <span class="s-phase-tag">ICH E3 COMPLIANT</span>
              <h3>Medical Writing Portfolio</h3>
              <ul class="s-checklist">
                <li>Investigator's Brochures (IB) &amp; Informed Consents</li>
                <li>Clinical Study Reports (Phase I–IV CSRs)</li>
                <li>Clinical Evaluation Reports (CER) for Devices</li>
                <li>Peer-reviewed journal manuscripts &amp; abstracts</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA BANNER -->
    <section style="background-color: var(--jss-navy-dark); color: #ffffff; padding: 4.5rem 0; text-align: center;">
      <div class="site-container">
        <h2 style="color: #ffffff; font-size: 2.3rem; margin-bottom: 1rem;">Ready to Advance Your Clinical Protocol?</h2>
        <p style="color: #cbd5e1; font-size: 1.1rem; max-width: 650px; margin: 0 auto 2rem;">
          Connect directly with our Medical Directors and Biostatisticians for a confidential feasibility assessment.
        </p>
        <button class="btn btn-jss-orange btn-lg" onclick="openRfpModal()">
          Request Formal Study Proposal (RFP) &rarr;
        </button>
      </div>
    </section>
  </main>
@endsection
