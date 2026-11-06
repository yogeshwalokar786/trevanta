@extends('layouts.app')

@section('title', "Career's | Trevanta International - Join Our Team")
@section('description', "Explore career opportunities at Trevanta International. Join a globally recognized Clinical Research Organization and advance your career in clinical trials, regulatory affairs, and more.")

@section('content')
  <!-- SUBPAGE HERO -->
  <section class="subpage-hero">
    <div class="site-container">
      <span class="eyebrow-jss">CAREER OPPORTUNITIES</span>
      <h1>Build Your Career in Clinical Research</h1>
      <p>
        Join Trevanta International's team of clinical research professionals dedicated to advancing global healthcare through scientific excellence and innovation.
      </p>
      <nav class="breadcrumbs" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        <span class="current">Career's</span>
      </nav>
    </div>
  </section>

  <!-- MAIN CAREERS CONTENT -->
  <main>
    <section class="subpage-content">
      <div class="site-container">

        <div class="content-block" style="margin: 3rem 0;">
          <h2>Why Work With Us?</h2>
          <p>
            At Trevanta International, we believe our people are our greatest asset. We offer a dynamic, collaborative work environment where innovation is encouraged and professional growth is supported. As a global CRO, we provide opportunities to work on diverse clinical trials across multiple therapeutic areas and geographies.
          </p>
        </div>

        <div class="kpi-row" style="margin: 3rem 0;">
          <div class="kpi-card">
            <span class="kpi-number">28+</span>
            <span class="kpi-label">Countries of Operation</span>
          </div>
          <div class="kpi-card">
            <span class="kpi-number">500+</span>
            <span class="kpi-label">Team Members Globally</span>
          </div>
          <div class="kpi-card">
            <span class="kpi-number">25+</span>
            <span class="kpi-label">Years of Excellence</span>
          </div>
        </div>

        <div class="content-block" style="margin: 3rem 0;">
          <h2>Current Openings</h2>
          <p>
            We are always looking for talented professionals in clinical operations, project management, regulatory affairs, medical writing, biostatistics, pharmacovigilance, and quality assurance. Please contact us at <a href="mailto:{{ setting('contact_email', 'info@trevanta.com') }}">{{ setting('contact_email', 'info@trevanta.com') }}</a> to learn more about current opportunities.
          </p>
        </div>

        <div style="margin: 3rem 0; text-align: center;">
          <a href="{{ route('contact') }}" class="btn btn-jss-orange">Contact Us for Opportunities &rarr;</a>
        </div>

      </div>
    </section>
  </main>
@endsection

