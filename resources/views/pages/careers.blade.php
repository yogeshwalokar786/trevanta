@extends('layouts.app')

@section('title', "Career's | " . setting('site_name', 'Trevanta International'))
@section('description', setting('careers_heading', 'Join a team committed to improving global health.') . ' - ' . setting('site_name', 'Trevanta International'))

@section('content')
  <!-- SUBPAGE HERO -->
  <section class="subpage-hero">
    <div class="site-container">
      <span class="eyebrow-jss">CAREERS</span>
      <h1>Careers</h1>
      <p>
        {{ setting('careers_heading', 'Join a team committed to improving global health.') }}
      </p>
      <nav class="breadcrumbs" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        <span class="current">Career's</span>
      </nav>
    </div>
  </section>

  <main>
    <!-- SECTION 1: PEOPLE & CULTURE (Two-Column Layout with Motto & Stats) -->
    <section class="subpage-content">
      <div class="site-container">
        <div class="two-col-layout">
          <div>
            <span class="eyebrow-jss">PEOPLE &amp; CULTURE</span>
            <h2 style="font-size: 2.2rem; margin-bottom: 1.25rem;">
              {{ setting('careers_heading', 'Join a team committed to improving global health.') }}
            </h2>
            
            <p style="font-size: 1.05rem; line-height: 1.8; color: var(--text-body); margin-bottom: 1.5rem;">
              {{ setting('careers_description', 'At Trevanta International our people are at the heart of innovation. We foster a culture of collaboration, growth, and scientific excellence.') }}
            </p>

            <div class="slide-bullets" style="margin-bottom: 2rem;">
              <span>&bull; Collaborative cross-functional teams across North America, Europe, and Asia</span>
              <span>&bull; Comprehensive continuing education, GCP certification, and leadership paths</span>
              <span>&bull; Direct involvement in pivotal Phase I–IV trials and life-saving therapies</span>
              <span>&bull; Flexible hybrid work arrangements and modern digital trial infrastructure</span>
            </div>

            <div>
              <a href="{{ setting('careers_btn_url', route('contact')) }}" class="btn btn-jss-orange btn-lg">
                {{ setting('careers_btn_text', 'Explore Opportunities →') }}
              </a>
            </div>
          </div>

          <div>
            <!-- PROJECT SIGNATURE MOTTO CALLOUT -->
            <div class="about-motto-callout">
              <span class="quote-mark">&ldquo;</span>
              <span class="s-phase-tag" style="display: block; margin-bottom: 0.5rem;">OUR COMMITMENT</span>
              <blockquote>
                Our world-class team of highly qualified and experienced workforce enables us to meet client expectations and deliver projects within the timeframe.
              </blockquote>
              <div class="quote-author">
                <strong>Executive Leadership Board</strong>
                <span>Trevanta International</span>
              </div>
            </div>
          </div>
        </div>

        <!-- STATS BANNER -->
        <div style="margin-top: 4rem;">
          <div class="hero-stats-banner">
            <div class="h-stat-item">
              <span class="stat-number">28+</span>
              <span class="stat-desc">Countries of Active Operations</span>
            </div>
            <div class="h-stat-item">
              <span class="stat-number">500+</span>
              <span class="stat-desc">Global Team Members</span>
            </div>
            <div class="h-stat-item">
              <span class="stat-number">25+</span>
              <span class="stat-desc">Years of Scientific Excellence</span>
            </div>
            <div class="h-stat-item">
              <span class="stat-number">100%</span>
              <span class="stat-desc">Audit &amp; Inspection Readiness</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 2: SPONTANEOUS APPLICATION / RESUME SUBMISSION -->
    <section style="background-color: var(--jss-navy-dark); color: #ffffff; padding: 4.5rem 0; text-align: center;">
      <div class="site-container">
        <span class="eyebrow-jss" style="color: #ff9a6b;">SPONTANEOUS APPLICATION</span>
        <h2 style="color: #ffffff; font-size: 2.2rem; margin-bottom: 1rem;">Connect With Our Talent Acquisition Team</h2>
        <p style="color: #cbd5e1; font-size: 1.05rem; max-width: 680px; margin: 0 auto 2rem;">
          We are always eager to connect with passionate clinical research associates, biostatisticians, medical writers, and project managers. Submit your resume to our global talent pool.
        </p>
        <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
          <a href="mailto:{{ setting('careers_email', setting('contact_email', 'info@trevanta.com')) }}?subject=Spontaneous%20Application%20-%20Trevanta%20Careers" class="btn btn-jss-orange btn-lg">
            Email Your Resume to {{ setting('careers_email', setting('contact_email', 'info@trevanta.com')) }} &rarr;
          </a>
          <a href="{{ setting('careers_btn_url', route('contact')) }}" class="btn btn-jss-outline btn-lg" style="color: #ffffff; border-color: rgba(255,255,255,0.4);">
            General Inquiry &rarr;
          </a>
        </div>
      </div>
    </section>
  </main>
@endsection
