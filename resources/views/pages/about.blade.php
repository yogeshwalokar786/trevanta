@extends('layouts.app')

@section('title', setting('about_meta_title', 'About Us | ' . setting('site_name', 'Trevanta International')))
@section('description', setting('about_meta_description', 'Trevanta is established by a team of highly-qualified clinical research industry professionals with diverse experience in pharmaceutical industry.'))

@push('seo')
  @if(setting('about_meta_keywords'))
    <meta name="keywords" content="{{ setting('about_meta_keywords') }}">
  @endif
  <meta property="og:title" content="{{ setting('about_meta_title', 'About Us | ' . setting('site_name', 'Trevanta International')) }}">
  <meta property="og:description" content="{{ setting('about_meta_description', 'Trevanta is established by a team of highly-qualified clinical research industry professionals with diverse experience in pharmaceutical industry.') }}">
  <meta property="og:image" content="{{ asset(setting('about_og_image', setting('home_og_image', 'images/doctor-consultation.jpg'))) }}">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
@endpush

@section('content')
  <!-- SUBPAGE HERO (Project Design Standard) -->
  <section class="subpage-hero">
    <div class="site-container">
      <span class="eyebrow-jss">ABOUT US</span>
      <h1>About Us</h1>
      <p>
        Trevanta is established by a team of highly-qualified clinical research industry professionals with diverse experience in pharmaceutical industry.
      </p>
      <nav class="breadcrumbs" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        <span class="current">About Us</span>
      </nav>
    </div>
  </section>

  <main>
    <!-- SECTION 1: OVERVIEW & MOTTO (Two-Column Layout) -->
    <section class="subpage-content">
      <div class="site-container">
        <div class="two-col-layout">
          <div>
            <span class="eyebrow-jss">WHO WE ARE</span>
            <h2 style="font-size: 2.2rem; margin-bottom: 1.25rem;">About Us</h2>
            
            <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body); margin-bottom: 1.25rem;">
              Trevanta is established by a team of highly-qualified clinical research industry professionals with diverse experience in pharmaceutical industry.
            </p>

            <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body); margin-bottom: 1.25rem;">
              Trevanta is a perfect blend of technology, innovation, and expertise, which enables to provide reliable, cost-effective and technology-driven services, solutions to our clients across the globe. Our commitment to quality and customer-focused approach bundled with outstanding expertise distinguishes us from others.
            </p>

            <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body); margin-bottom: 0;">
              Our world-class team of highly qualified and experienced workforce enables us to meet the client expectations and deliver projects within the timeframe. Our service portfolio enables us to provide an integrated solution for the management of clinical data right from its inception to completion.
            </p>
          </div>

          <div>
            <!-- PROJECT SIGNATURE MOTTO CALLOUT -->
            <div class="about-motto-callout">
              <span class="quote-mark">&ldquo;</span>
              <span class="s-phase-tag" style="display: block; margin-bottom: 0.5rem;">OUR MOTTO</span>
              <blockquote>
                Our motto is to provide quality and cost-effective clinical , regulatory and medical monitoring &amp; medico-marketing services to clients from Pharmaceutical, Biotechnology and Medical device space across the globe.
              </blockquote>
              <div class="quote-author">
                <strong>Trevanta International</strong>
                <span>Clinical Research Organization</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 2: OUR MISSION & OUR VISION (Alternating Background Grid) -->
    <section class="subpage-content alt-bg">
      <div class="site-container">
        <div class="section-title-wrap text-center" style="margin-bottom: 3rem;">
          <span class="eyebrow-jss">PURPOSE &amp; ASPIRATION</span>
          <h2 class="main-title">Our Mission &amp; Vision</h2>
        </div>

        <div class="mv-grid">
          <!-- MISSION CARD -->
          <div class="mv-card">
            <div class="mv-icon-box">
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><polygon points="12 6 12 12 16 14"/></svg>
            </div>
            <span class="s-phase-tag">OUR PURPOSE</span>
            <h3>Our Mission</h3>
            <p>
              Our Mission is to be the preferred and trusted consulting partner for global pharmaceuticals and health care industry and to create benchmark by ensuring quality, reliability, integrity and ethical values.
            </p>
          </div>

          <!-- VISION CARD -->
          <div class="mv-card">
            <div class="mv-icon-box">
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </div>
            <span class="s-phase-tag">OUR HORIZON</span>
            <h3>Our Vision</h3>
            <p>
              To be recognized as one of the best service providers for Pharmaceuticals, Medical Device and Health Care Industry across the globe.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 3: OUR VALUES (3-Column Principles Grid) -->
    <section class="subpage-content">
      <div class="site-container">
        <div class="section-title-wrap text-center" style="margin-bottom: 3rem;">
          <span class="eyebrow-jss">GUIDING PRINCIPLES</span>
          <h2 class="main-title">Our Values</h2>
        </div>

        <div class="values-grid-3">
          <!-- VALUE 1: QUALITY -->
          <div class="value-box">
            <div class="value-icon-box">
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
            <span class="s-phase-tag">CORE PRINCIPLE 01</span>
            <h3>Quality</h3>
            <p>
              Quality is the foundation of our success and remains the core of all our processes. The quality principles and practices are integrated into our activities right from generating reliable and accurate data to customer service. The aim of strengthening compliance and innovating solutions for our clients and partners is an ongoing priority for us always.
            </p>
          </div>

          <!-- VALUE 2: RELIABILITY -->
          <div class="value-box">
            <div class="value-icon-box">
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
            <span class="s-phase-tag">CORE PRINCIPLE 02</span>
            <h3>Reliability</h3>
            <p>
              We here at Trevanta aim to ensure that all transactions, events, and business activities presented in the financial statements are reliable. We thrive to provide the best and safest practices with respect to adhering to the standards of the pharmaceutical and healthcare industry.
            </p>
          </div>

          <!-- VALUE 3: INTEGRITY -->
          <div class="value-box">
            <div class="value-icon-box">
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="3" x2="12" y2="21"></line>
                <line x1="3" y1="7" x2="21" y2="7"></line>
                <polyline points="5 7 2 15 8 15 5 7"></polyline>
                <polyline points="19 7 16 15 22 15 19 7"></polyline>
                <line x1="9" y1="21" x2="15" y2="21"></line>
              </svg>
            </div>
            <span class="s-phase-tag">CORE PRINCIPLE 03</span>
            <h3>Integrity</h3>
            <p>
              Integrity is vital to our sustainability and we are committed to upholding the highest standards of integrity even in the face of challenges.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 4: CALL TO ACTION (Project Signature Dark Bar) -->
    <section style="background-color: var(--jss-navy-dark); color: #ffffff; padding: 4.5rem 0; text-align: center;">
      <div class="site-container">
        <span class="eyebrow-jss" style="color: #ff9a6b;">PARTNER WITH TREVANTA</span>
        <h2 style="color: #ffffff; font-size: 2.2rem; margin-bottom: 1rem;">Advancing Healthcare Through Quality &amp; Innovation</h2>
        <p style="color: #cbd5e1; font-size: 1.05rem; max-width: 650px; margin: 0 auto 2rem;">
          Connect with our team to explore cost-effective, technology-driven clinical, regulatory, and monitoring solutions.
        </p>
        <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
          <a href="{{ route('contact') }}" class="btn btn-jss-orange btn-lg">
            Contact Us &rarr;
          </a>
          <button class="btn btn-jss-outline btn-lg" onclick="openRfpModal()" style="color: #ffffff; border-color: rgba(255,255,255,0.4);">
            Request Study RFP &rarr;
          </button>
        </div>
      </div>
    </section>
  </main>
@endsection
