@extends('layouts.app')

@section('title', 'About Us | AstraClinical Research - Global Clinical CRO')
@section('description', 'Learn about AstraClinical Research: our 25-year history, executive leadership, scientific governance, and global mission to advance life-saving therapies.')

@section('content')
  <!-- SUBPAGE HERO -->
  <section class="subpage-hero">
    <div class="site-container">
      <span class="eyebrow-jss">ABOUT ASTRACLINICAL</span>
      <h1>Over 25 Years of Scientific Rigor &amp; Clinical Excellence</h1>
      <p>
        From our origins as an academic clinical epidemiology group in Montreal to an international full-service CRO managing trials across 28 countries, our mission is to accelerate life-saving cures to market.
      </p>
      <nav class="breadcrumbs" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        <span class="current">About Us</span>
      </nav>
    </div>
  </section>

  <!-- MAIN ABOUT CONTENT -->
  <main>
    <section class="subpage-content">
      <div class="site-container">
        
        <div class="photo-banner-card" style="margin: 3rem 0;">
          <img src="../assets/images/clinical-team.jpg" alt="Executive Clinical Leadership" class="photo-banner-img" style="height: 340px;">
          <div class="photo-badge-overlay">
            <h4>25+ Years of Scientific Integrity &amp; Global Compliance</h4>
            <p>Our multidisciplinary investigators and study directors maintain 100% inspection success across US FDA, Health Canada, and EMA.</p>
          </div>
        </div>
    <div class="two-col-layout">
          <div>
            <span class="eyebrow-jss">OUR STORY &amp; EVOLUTION</span>
            <h2>A Globally Recognized Canadian-Based Mid-Tier Powerhouse</h2>
            <p>
              Over the past decade, AstraClinical has navigated high-volume studies involving over <strong>500,000 patients across 8,500 investigator hospital sites worldwide</strong>. We bridge the gap between large multinational biopharma sponsors and specialized academic medical centers.
            </p>
            <p>
              Unlike massive bureaucratic CROs where mid-sized sponsors are deprioritized, our mid-tier niche positioning ensures direct C-suite oversight, agile protocol amendments, and committed project leadership from Phase I First-in-Human through Phase IV Real-World Evidence.
            </p>
            <div class="slide-bullets" style="margin-top: 1.5rem;">
              <span>&bull; Established agreements with top-tier hospitals and research centers worldwide</span>
              <span>&bull; Pioneers in remote and risk-based monitoring (RBM) methodologies</span>
              <span>&bull; 100% inspection pass rate across US FDA, EMA, Health Canada, and DCGI</span>
            </div>
          </div>
          <div>
            <div class="quote-callout">
              <span class="quote-mark">&ldquo;</span>
              <blockquote>
                Our success depends on the caliber and scientific integrity of our people. We combine rigorous academic epidemiology with agile operational execution.
              </blockquote>
              <div class="quote-author">
                <strong>Executive Leadership Board</strong>
                <span>AstraClinical Research</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- LEADERSHIP TEAM SECTION -->
    <section class="subpage-content alt-bg">
      <div class="site-container">
        <div class="section-title-wrap text-center">
          <span class="eyebrow-jss">SCIENTIFIC GOVERNANCE</span>
          <h2 class="main-title">Executive Leadership &amp; Medical Direction</h2>
          <p class="subtitle-jss">
            Led by internationally recognized epidemiologists, physicians, and regulatory scholars.
          </p>
        </div>

        <div class="leadership-grid">
          <div class="leader-card">
            <div class="leader-avatar"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
            <h3>Dr. John Sampalis, PhD</h3>
            <span class="leader-role">President &amp; Chief Scientific Officer</span>
            <p>Internationally recognized clinical epidemiologist, professor of surgery and epidemiology with over 300 peer-reviewed medical publications.</p>
          </div>

          <div class="leader-card">
            <div class="leader-avatar"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
            <h3>Dr. Anshu Patel, MD</h3>
            <span class="leader-role">Global Medical Director &amp; Head of PV</span>
            <p>Board-certified physician with 20+ years steering pharmacovigilance, medical monitoring, and drug safety signaling across US, EU, and Asia.</p>
          </div>

          <div class="leader-card">
            <div class="leader-avatar"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
            <h3>Dr. Robert Marcil, PhD</h3>
            <span class="leader-role">VP of Biostatistics &amp; Data Science</span>
            <p>Former health authority statistical reviewer, CDISC Platinum contributor, and expert in adaptive Bayesian trial design and SAS modeling.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- QUALITY STANDARDS -->
    <section class="subpage-content">
      <div class="site-container">
        <div class="section-title-wrap text-center">
          <span class="eyebrow-jss">QUALITY ASSURANCE</span>
          <h2 class="main-title">Certified Global Compliance Standard</h2>
          <p class="subtitle-jss">
            Rigorous quality oversight guaranteed through independent quality assurance (QA) audits.
          </p>
        </div>

        <div class="compliance-row">
          <div class="c-badge-jss">
            <strong>US FDA</strong>
            <span>21 CFR Part 11 Validated</span>
          </div>
          <div class="c-badge-jss">
            <strong>ICH-GCP</strong>
            <span>E6(R2) Standard of Care</span>
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

        <div style="text-align: center; margin-top: 3.5rem;">
          <button class="btn btn-jss-orange btn-lg" onclick="openRfpModal()">
            Schedule a Confidential Quality Audit Review &rarr;
          </button>
        </div>
      </div>
    </section>
  </main>
@endsection
