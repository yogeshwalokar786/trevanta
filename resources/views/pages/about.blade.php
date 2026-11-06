@extends('layouts.app')

@section('title', 'About Us | Clineva - Clinical Research, Regulatory & Medical Services')
@section('description', 'Learn about Clineva: established by a team of highly-qualified clinical research professionals with diverse experience in the pharmaceutical industry.')

@section('content')
  <!-- SUBPAGE HERO -->
  <section class="subpage-hero">
    <div class="site-container">
      <span class="eyebrow-jss">ABOUT CLINEVA</span>
      <h1>Quality, Reliability &amp; Technology-Driven Clinical Solutions</h1>
      <p>
        Established by a team of highly-qualified clinical research industry professionals with diverse experience in the pharmaceutical industry across the globe.
      </p>
      <nav class="breadcrumbs" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        <span class="current">About Us</span>
      </nav>
    </div>
  </section>

  <!-- MAIN ABOUT CONTENT WITH TABS -->
  <main>
    <section class="subpage-content">
      <div class="site-container">

        <!-- INTERACTIVE ABOUT TABS -->
        <div class="about-tabs-wrap" role="tablist">
          <button class="about-tab-btn active" role="tab" aria-selected="true" onclick="switchAboutTab('overview', this)">
            <div class="tab-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            </div>
            <div>
              <strong>About Us</strong>
              <small>Overview &amp; Motto</small>
            </div>
          </button>

          <button class="about-tab-btn" role="tab" aria-selected="false" onclick="switchAboutTab('mission', this)">
            <div class="tab-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polygon points="12 6 12 12 16 14"/></svg>
            </div>
            <div>
              <strong>Our Mission</strong>
              <small>Purpose &amp; Benchmark</small>
            </div>
          </button>

          <button class="about-tab-btn" role="tab" aria-selected="false" onclick="switchAboutTab('vision', this)">
            <div class="tab-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </div>
            <div>
              <strong>Our Vision</strong>
              <small>Global Leadership</small>
            </div>
          </button>

          <button class="about-tab-btn" role="tab" aria-selected="false" onclick="switchAboutTab('values', this)">
            <div class="tab-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
            <div>
              <strong>Our Values</strong>
              <small>Quality, Reliability, Integrity</small>
            </div>
          </button>
        </div>

        <!-- TAB PANE 1: ABOUT US (OVERVIEW) -->
        <div class="about-tab-pane active" id="about-pane-overview">
          <div class="two-col-layout">
            <div>
              <span class="eyebrow-jss">WHO WE ARE</span>
              <h2>A Perfect Blend of Technology, Innovation &amp; Expertise</h2>

              <p>
                <strong>Clineva</strong> is established by a team of highly-qualified clinical research industry professionals with diverse experience in pharmaceutical industry.
              </p>

              <div class="motto-banner-box">
                <strong>Our Motto</strong>
                <p>
                  &ldquo;To provide quality and cost-effective clinical, regulatory and medical monitoring &amp; medico-marketing services to clients from Pharmaceutical, Biotechnology and Medical device space across the globe.&rdquo;
                </p>
              </div>

              <p>
                Clineva is a perfect blend of technology, innovation, and expertise, which enables to provide reliable, cost-effective and technology-driven services, solutions to our clients across the globe. Our commitment to quality and customer-focused approach bundled with outstanding expertise distinguishes us from others.
              </p>

              <p>
                Our world-class team of highly qualified and experienced workforce enables us to meet the client expectations and deliver projects within the timeframe. Our service portfolio enables us to provide an integrated solution for the management of clinical data right from its inception to completion.
              </p>

              <div style="margin-top: 2rem; display: flex; gap: 1rem; flex-wrap: wrap;">
                <button class="btn btn-jss-orange" onclick="switchAboutTab('values', document.querySelectorAll('.about-tab-btn')[3])">
                  Explore Our Values &rarr;
                </button>
                <a href="{{ route('services') }}" class="btn btn-jss-outline">
                  View Our Services &rarr;
                </a>
              </div>
            </div>

            <div>
              <div class="overview-highlight-card">
                <h3>Key Differentiators</h3>

                <div class="pillar-item">
                  <div class="pillar-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
                  </div>
                  <div class="pillar-content">
                    <strong>Global Reach &amp; Scope</strong>
                    <p>Serving Pharmaceutical, Biotechnology, and Medical Device clients across the world.</p>
                  </div>
                </div>

                <div class="pillar-item">
                  <div class="pillar-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                  </div>
                  <div class="pillar-content">
                    <strong>End-to-End Solutions</strong>
                    <p>Management of clinical data right from its inception through to project completion.</p>
                  </div>
                </div>

                <div class="pillar-item">
                  <div class="pillar-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                  </div>
                  <div class="pillar-content">
                    <strong>Technology &amp; Innovation</strong>
                    <p>Cost-effective, reliable, and technology-driven clinical and regulatory services.</p>
                  </div>
                </div>

                <div class="pillar-item">
                  <div class="pillar-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 14 14"/></svg>
                  </div>
                  <div class="pillar-content">
                    <strong>On-Time Delivery</strong>
                    <p>A highly qualified workforce dedicated to delivering complex projects within timeframe.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- TAB PANE 2: OUR MISSION -->
        <div class="about-tab-pane" id="about-pane-mission">
          <div class="statement-card">
            <span class="statement-badge">PURPOSE &amp; COMMITMENT</span>
            <h2>Our Mission</h2>
            <p class="statement-lead">
              &ldquo;Our Mission is to be the preferred and trusted consulting partner for global pharmaceuticals and health care industry and to create benchmak by ensuring quality, reliability, integrity and ethical values.&rdquo;
            </p>

            <div class="statement-grid-2">
              <div class="overview-highlight-card" style="box-shadow: none;">
                <h3>Core Mission Pillars</h3>
                <ul class="dropdown-list" style="line-height: 2;">
                  <li><strong>&bull; Preferred &amp; Trusted Partner:</strong> Building long-standing consulting relationships across global healthcare.</li>
                  <li><strong>&bull; Industry Benchmark:</strong> Setting rigorous operational and compliance standards in every study.</li>
                  <li><strong>&bull; Unwavering Ethics:</strong> Rooted in transparency, scientific honesty, and ethical trial conduct.</li>
                </ul>
              </div>

              <div class="overview-highlight-card" style="box-shadow: none;">
                <h3>How We Fulfill Our Mission</h3>
                <p style="font-size: 0.95rem; line-height: 1.7; color: var(--text-body);">
                  Through our world-class workforce, multidisciplinary industry experience, and modern technology frameworks, we ensure each project meets international regulatory scrutiny while remaining cost-effective and on schedule.
                </p>
                <div style="margin-top: 1.25rem;">
                  <button class="btn btn-jss-orange" onclick="switchAboutTab('vision', document.querySelectorAll('.about-tab-btn')[2])">
                    Read Our Vision &rarr;
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- TAB PANE 3: OUR VISION -->
        <div class="about-tab-pane" id="about-pane-vision">
          <div class="statement-card">
            <span class="statement-badge">GLOBAL AMBITION</span>
            <h2>Our Vision</h2>
            <p class="statement-lead">
              &ldquo;To be recognized as one of the best service providers for Pharmaceuticals, Medical Device and Health Care Industry across the globe.&rdquo;
            </p>

            <div class="statement-grid-2">
              <div class="overview-highlight-card" style="box-shadow: none;">
                <h3>Vision In Action</h3>
                <div class="pillar-item">
                  <div class="pillar-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
                  </div>
                  <div class="pillar-content">
                    <strong>Service Excellence</strong>
                    <p>Recognized globally for high-standard execution in clinical trials, regulatory affairs, and medical monitoring.</p>
                  </div>
                </div>

                <div class="pillar-item">
                  <div class="pillar-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                  </div>
                  <div class="pillar-content">
                    <strong>Client-Focused Collaboration</strong>
                    <p>Fostering agile partnerships with pharma, biotech, and medical device innovators worldwide.</p>
                  </div>
                </div>
              </div>

              <div class="overview-highlight-card" style="box-shadow: none;">
                <h3>Next Steps</h3>
                <p style="font-size: 0.95rem; line-height: 1.7; color: var(--text-body);">
                  Our vision guides our daily investments in talent, technology, and robust quality management systems.
                </p>
                <div style="margin-top: 1.5rem; display: flex; gap: 0.75rem; flex-wrap: wrap;">
                  <button class="btn btn-jss-orange" onclick="switchAboutTab('values', document.querySelectorAll('.about-tab-btn')[3])">
                    Explore Our Core Values &rarr;
                  </button>
                  <a href="{{ route('contact') }}" class="btn btn-jss-outline">
                    Contact Us &rarr;
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- TAB PANE 4: OUR VALUES -->
        <div class="about-tab-pane" id="about-pane-values">
          <div class="section-title-wrap text-center" style="margin-bottom: 2rem;">
            <span class="eyebrow-jss">GUIDING PRINCIPLES</span>
            <h2 class="main-title">Our Values</h2>
            <p class="subtitle-jss">
              The fundamental standards shaping our culture, operations, and client partnerships.
            </p>
          </div>

          <div class="values-grid">
            <!-- VALUE 1: QUALITY -->
            <div class="value-card">
              <div class="value-card-icon">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
              </div>
              <h3>Quality</h3>
              <p>
                Quality is the foundation of our success and remains the core of all our processes. The quality principles and practices are integrated into our activities right from generating reliable and accurate data to customer service. The aim of strengthening compliance and innovating solutions for our clients and partners is an ongoing priority for us always.
              </p>
            </div>

            <!-- VALUE 2: RELIABILITY -->
            <div class="value-card">
              <div class="value-card-icon">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              </div>
              <h3>Reliability</h3>
              <p>
                We here at Clineva aim to ensure that all transactions, events, and business activities presented in the financial statements are reliable. We thrive to provide the best and safest practices with respect to adhering to the standards of the pharmaceutical and healthcare industry.
              </p>
            </div>

            <!-- VALUE 3: INTEGRITY -->
            <div class="value-card">
              <div class="value-card-icon">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
              </div>
              <h3>Integrity</h3>
              <p>
                Integrity is vital to our sustainability and we are committed to upholding the highest standards of integrity even in the face of challenges.
              </p>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- CALL TO ACTION SECTION -->
    <section class="subpage-content alt-bg" style="padding: 4rem 0;">
      <div class="site-container text-center">
        <span class="eyebrow-jss">PARTNER WITH US</span>
        <h2 style="font-size: 2rem; margin-bottom: 1rem; color: var(--jss-navy);">
          Accelerate Your Clinical Programs with Clineva
        </h2>
        <p style="max-width: 680px; margin: 0 auto 2rem; color: var(--text-body); font-size: 1.05rem;">
          Connect with our team of clinical research, regulatory, and medical monitoring specialists to discuss your upcoming studies.
        </p>
        <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
          <a href="{{ route('contact') }}" class="btn btn-jss-orange btn-lg">
            Contact Our Team &rarr;
          </a>
          <button class="btn btn-jss-outline btn-lg" onclick="openRfpModal()">
            Request a Proposal &rarr;
          </button>
        </div>
      </div>
    </section>
  </main>
@endsection
