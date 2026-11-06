@extends('layouts.app')

@section('title', 'About Us | ' . setting('site_name', 'Trevanta International'))
@section('description', 'Trevanta is established by a team of highly-qualified clinical research industry professionals with diverse experience in pharmaceutical industry.')

@section('content')
  <!-- SUBPAGE HERO -->
  <section class="subpage-hero">
    <div class="site-container">
      <span class="eyebrow-jss">ABOUT US</span>
      <h1>About Us</h1>
      <nav class="breadcrumbs" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        <span class="current">About Us</span>
      </nav>
    </div>
  </section>

  <!-- MAIN ABOUT CONTENT (NON-TABBED, EXACT CONTENT) -->
  <main>
    <section class="subpage-content">
      <div class="site-container" style="max-width: 900px; margin: 0 auto;">

        <!-- ABOUT US OVERVIEW -->
        <div style="margin-bottom: 3.5rem;">
          <h2 style="font-size: 2rem; color: var(--jss-navy, #0f172a); margin-bottom: 1.5rem;">About Us</h2>
          <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body, #374151); margin-bottom: 1.25rem;">
            Trevanta is established by a team of highly-qualified clinical research industry professionals with diverse experience in pharmaceutical industry.
          </p>
          <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body, #374151); margin-bottom: 1.25rem;">
            Our motto is to provide quality and cost-effective clinical , regulatory and medical monitoring &amp; medico-marketing services to clients from Pharmaceutical, Biotechnology and Medical device space across the globe.
          </p>
          <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body, #374151); margin-bottom: 1.25rem;">
            Trevanta is a perfect blend of technology, innovation, and expertise, which enables to provide reliable, cost-effective and technology-driven services, solutions to our clients across the globe. Our commitment to quality and customer-focused approach bundled with outstanding expertise distinguishes us from others.
          </p>
          <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body, #374151); margin-bottom: 1.25rem;">
            Our world-class team of highly qualified and experienced workforce enables us to meet the client expectations and deliver projects within the timeframe. Our service portfolio enables us to provide an integrated solution for the management of clinical data right from its inception to completion.
          </p>
        </div>

        <hr style="border: none; border-top: 1px solid var(--border-light, #e2e8f0); margin: 3rem 0;">

        <!-- OUR MISSION -->
        <div style="margin-bottom: 3rem;">
          <h2 style="font-size: 1.75rem; color: var(--jss-navy, #0f172a); margin-bottom: 1rem;">Our Mission</h2>
          <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body, #374151);">
            Our Mission is to be the preferred and trusted consulting partner for global pharmaceuticals and health care industry and to create benchmark by ensuring quality, reliability, integrity and ethical values.
          </p>
        </div>

        <hr style="border: none; border-top: 1px solid var(--border-light, #e2e8f0); margin: 3rem 0;">

        <!-- OUR VISION -->
        <div style="margin-bottom: 3rem;">
          <h2 style="font-size: 1.75rem; color: var(--jss-navy, #0f172a); margin-bottom: 1rem;">Our Vision</h2>
          <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body, #374151);">
            To be recognized as one of the best service providers for Pharmaceuticals, Medical Device and Health Care Industry across the globe.
          </p>
        </div>

        <hr style="border: none; border-top: 1px solid var(--border-light, #e2e8f0); margin: 3rem 0;">

        <!-- OUR VALUES -->
        <div style="margin-bottom: 3.5rem;">
          <h2 style="font-size: 1.75rem; color: var(--jss-navy, #0f172a); margin-bottom: 1.75rem;">Our Values</h2>

          <!-- Quality -->
          <div style="margin-bottom: 2rem;">
            <h3 style="font-size: 1.35rem; color: var(--jss-orange, #f26224); margin-bottom: 0.65rem;">Quality</h3>
            <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body, #374151); margin: 0;">
              Quality is the foundation of our success and remains the core of all our processes. The quality principles and practices are integrated into our activities right from generating reliable and accurate data to customer service. The aim of strengthening compliance and innovating solutions for our clients and partners is an ongoing priority for us always.
            </p>
          </div>

          <!-- Reliability -->
          <div style="margin-bottom: 2rem;">
            <h3 style="font-size: 1.35rem; color: var(--jss-orange, #f26224); margin-bottom: 0.65rem;">Reliability</h3>
            <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body, #374151); margin: 0;">
              We here at Trevanta aim to ensure that all transactions, events, and business activities presented in the financial statements are reliable. We thrive to provide the best and safest practices with respect to adhering to the standards of the pharmaceutical and healthcare industry.
            </p>
          </div>

          <!-- Integrity -->
          <div style="margin-bottom: 2rem;">
            <h3 style="font-size: 1.35rem; color: var(--jss-orange, #f26224); margin-bottom: 0.65rem;">Integrity</h3>
            <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body, #374151); margin: 0;">
              Integrity is vital to our sustainability and we are committed to upholding the highest standards of integrity even in the face of challenges.
            </p>
          </div>
        </div>

      </div>
    </section>
  </main>
@endsection
