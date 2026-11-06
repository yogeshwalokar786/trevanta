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

  <!-- MAIN ABOUT CONTENT -->
  <main>
    <!-- SECTION 1: ABOUT US OVERVIEW & MOTTO -->
    <section class="subpage-content" style="padding: 4rem 0 3rem;">
      <div class="site-container" style="max-width: 1040px; margin: 0 auto;">
        
        <div style="background: #ffffff; border: 1px solid var(--border-light, #e2e8f0); border-radius: 14px; padding: 3rem 2.5rem; box-shadow: 0 4px 20px rgba(0,0,0,0.04);">
          <span class="eyebrow-jss" style="display: inline-block; margin-bottom: 0.5rem;">WHO WE ARE</span>
          <h2 style="font-size: 2.2rem; color: var(--jss-navy, #0f172a); margin-bottom: 1.5rem; line-height: 1.25;">
            About Us
          </h2>

          <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-body, #334155); margin-bottom: 1.5rem;">
            Trevanta is established by a team of highly-qualified clinical research industry professionals with diverse experience in pharmaceutical industry.
          </p>

          <!-- MOTTO CALLOUT -->
          <div class="motto-banner-box" style="margin: 2rem 0; padding: 1.75rem 2rem; background: #fff8f4; border-left: 4px solid var(--jss-orange, #f26224); border-radius: 0 10px 10px 0;">
            <strong style="color: var(--jss-orange, #f26224); font-size: 0.85rem; letter-spacing: 0.8px; text-transform: uppercase; display: block; margin-bottom: 0.5rem;">
              OUR MOTTO
            </strong>
            <p style="font-size: 1.15rem; line-height: 1.7; color: var(--jss-navy, #0f172a); font-style: italic; margin: 0; font-weight: 500;">
              &ldquo;Our motto is to provide quality and cost-effective clinical , regulatory and medical monitoring &amp; medico-marketing services to clients from Pharmaceutical, Biotechnology and Medical device space across the globe.&rdquo;
            </p>
          </div>

          <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body, #334155); margin-bottom: 1.5rem;">
            Trevanta is a perfect blend of technology, innovation, and expertise, which enables to provide reliable, cost-effective and technology-driven services, solutions to our clients across the globe. Our commitment to quality and customer-focused approach bundled with outstanding expertise distinguishes us from others.
          </p>

          <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body, #334155); margin: 0;">
            Our world-class team of highly qualified and experienced workforce enables us to meet the client expectations and deliver projects within the timeframe. Our service portfolio enables us to provide an integrated solution for the management of clinical data right from its inception to completion.
          </p>
        </div>

      </div>
    </section>

    <!-- SECTION 2: OUR MISSION & VISION -->
    <section class="subpage-content alt-bg" style="padding: 3.5rem 0; background-color: var(--bg-subtle, #f8fafc);">
      <div class="site-container" style="max-width: 1040px; margin: 0 auto;">
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem;">
          
          <!-- OUR MISSION CARD -->
          <div style="background: #ffffff; border: 1px solid var(--border-light, #e2e8f0); border-radius: 14px; padding: 2.75rem 2.25rem; box-shadow: 0 4px 18px rgba(0,0,0,0.04); position: relative; display: flex; flex-direction: column;">
            <div style="width: 52px; height: 52px; border-radius: 12px; background: var(--jss-orange-light, #fff5f0); color: var(--jss-orange, #f26224); display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><polygon points="12 6 12 12 16 14"/></svg>
            </div>
            <span class="eyebrow-jss" style="margin-bottom: 0.35rem;">PURPOSE</span>
            <h2 style="font-size: 1.75rem; color: var(--jss-navy, #0f172a); margin-bottom: 1rem;">Our Mission</h2>
            <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body, #334155); margin: 0; flex-grow: 1;">
              Our Mission is to be the preferred and trusted consulting partner for global pharmaceuticals and health care industry and to create benchmark by ensuring quality, reliability, integrity and ethical values.
            </p>
          </div>

          <!-- OUR VISION CARD -->
          <div style="background: #ffffff; border: 1px solid var(--border-light, #e2e8f0); border-radius: 14px; padding: 2.75rem 2.25rem; box-shadow: 0 4px 18px rgba(0,0,0,0.04); position: relative; display: flex; flex-direction: column;">
            <div style="width: 52px; height: 52px; border-radius: 12px; background: var(--jss-orange-light, #fff5f0); color: var(--jss-orange, #f26224); display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
              <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </div>
            <span class="eyebrow-jss" style="margin-bottom: 0.35rem;">ASPIRATION</span>
            <h2 style="font-size: 1.75rem; color: var(--jss-navy, #0f172a); margin-bottom: 1rem;">Our Vision</h2>
            <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body, #334155); margin: 0; flex-grow: 1;">
              To be recognized as one of the best service providers for Pharmaceuticals, Medical Device and Health Care Industry across the globe.
            </p>
          </div>

        </div>

      </div>
    </section>

    <!-- SECTION 3: OUR VALUES -->
    <section class="subpage-content" style="padding: 4rem 0;">
      <div class="site-container" style="max-width: 1040px; margin: 0 auto;">
        
        <div class="section-title-wrap text-center" style="margin-bottom: 2.75rem;">
          <span class="eyebrow-jss">CORE PRINCIPLES</span>
          <h2 class="main-title" style="font-size: 2.2rem; color: var(--jss-navy, #0f172a);">Our Values</h2>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(290px, 1fr)); gap: 2rem;">
          
          <!-- VALUE 1: QUALITY -->
          <div style="background: #ffffff; border: 1px solid var(--border-light, #e2e8f0); border-radius: 14px; padding: 2.25rem 2rem; box-shadow: 0 4px 18px rgba(0,0,0,0.04); transition: transform 0.25s ease, border-color 0.25s ease; display: flex; flex-direction: column;">
            <div style="width: 50px; height: 50px; border-radius: 12px; background: var(--jss-orange-light, #fff5f0); color: var(--jss-orange, #f26224); display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem;">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
            <h3 style="font-size: 1.4rem; color: var(--jss-navy, #0f172a); margin-bottom: 0.85rem;">Quality</h3>
            <p style="font-size: 0.98rem; line-height: 1.75; color: var(--text-body, #475569); margin: 0;">
              Quality is the foundation of our success and remains the core of all our processes. The quality principles and practices are integrated into our activities right from generating reliable and accurate data to customer service. The aim of strengthening compliance and innovating solutions for our clients and partners is an ongoing priority for us always.
            </p>
          </div>

          <!-- VALUE 2: RELIABILITY -->
          <div style="background: #ffffff; border: 1px solid var(--border-light, #e2e8f0); border-radius: 14px; padding: 2.25rem 2rem; box-shadow: 0 4px 18px rgba(0,0,0,0.04); transition: transform 0.25s ease, border-color 0.25s ease; display: flex; flex-direction: column;">
            <div style="width: 50px; height: 50px; border-radius: 12px; background: var(--jss-orange-light, #fff5f0); color: var(--jss-orange, #f26224); display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem;">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
            <h3 style="font-size: 1.4rem; color: var(--jss-navy, #0f172a); margin-bottom: 0.85rem;">Reliability</h3>
            <p style="font-size: 0.98rem; line-height: 1.75; color: var(--text-body, #475569); margin: 0;">
              We here at Trevanta aim to ensure that all transactions, events, and business activities presented in the financial statements are reliable. We thrive to provide the best and safest practices with respect to adhering to the standards of the pharmaceutical and healthcare industry.
            </p>
          </div>

          <!-- VALUE 3: INTEGRITY -->
          <div style="background: #ffffff; border: 1px solid var(--border-light, #e2e8f0); border-radius: 14px; padding: 2.25rem 2rem; box-shadow: 0 4px 18px rgba(0,0,0,0.04); transition: transform 0.25s ease, border-color 0.25s ease; display: flex; flex-direction: column;">
            <div style="width: 50px; height: 50px; border-radius: 12px; background: var(--jss-orange-light, #fff5f0); color: var(--jss-orange, #f26224); display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem;">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
            </div>
            <h3 style="font-size: 1.4rem; color: var(--jss-navy, #0f172a); margin-bottom: 0.85rem;">Integrity</h3>
            <p style="font-size: 0.98rem; line-height: 1.75; color: var(--text-body, #475569); margin: 0;">
              Integrity is vital to our sustainability and we are committed to upholding the highest standards of integrity even in the face of challenges.
            </p>
          </div>

        </div>

      </div>
    </section>
  </main>
@endsection
