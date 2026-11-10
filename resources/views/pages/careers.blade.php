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
    <!-- SHORT DYNAMIC CAREERS SECTION -->
    <section class="subpage-content" style="padding: 4.5rem 0 5.5rem;">
      <div class="site-container">
        <div style="max-width: 860px; margin: 0 auto; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 20px; padding: 3.5rem 3rem; box-shadow: 0 10px 30px rgba(0,0,0,0.05); text-align: center;">
          <span class="eyebrow-jss" style="display: inline-block; margin-bottom: 1rem;">CAREERS AT TREVANTA</span>
          
          <h2 style="font-size: 2.25rem; font-weight: 700; color: var(--navy, #0d233a); line-height: 1.3; margin-bottom: 1.5rem;">
            {{ setting('careers_heading', 'Join a team committed to improving global health.') }}
          </h2>

          <p style="font-size: 1.15rem; line-height: 1.85; color: #475569; margin-bottom: 2.5rem; max-width: 720px; margin-left: auto; margin-right: auto;">
            {{ setting('careers_description', 'At Trevanta International our people are at the heart of innovation. We foster a culture of collaboration, growth, and scientific excellence.') }}
          </p>

          <div style="display: flex; justify-content: center; align-items: center; gap: 1.25rem; flex-wrap: wrap;">
            <a href="{{ setting('careers_btn_url', route('contact')) }}" class="btn btn-jss-orange btn-lg" style="padding: 0.9rem 2rem; font-size: 1.05rem;">
              {{ setting('careers_btn_text', 'Explore Opportunities →') }}
            </a>
            
            <a href="mailto:{{ setting('careers_email', setting('contact_email', 'info@trevanta.com')) }}?subject=Career%20Opportunities%20Inquiry%20-%20Trevanta%20International" class="btn btn-jss-outline btn-lg" style="padding: 0.9rem 2rem; font-size: 1.05rem;">
              <i class="fas fa-paper-plane" style="margin-right: 0.5rem;"></i> Send Your Resume
            </a>
          </div>

          <div style="margin-top: 3.5rem; padding-top: 2.5rem; border-top: 1px solid #f1f5f9; display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; text-align: left;">
            <div style="display: flex; align-items: flex-start; gap: 0.85rem;">
              <div style="width: 42px; height: 42px; border-radius: 10px; background: rgba(40, 169, 161, 0.12); color: #28a9a1; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0;">
                <i class="fas fa-lightbulb"></i>
              </div>
              <div>
                <strong style="display: block; color: var(--navy, #0d233a); font-size: 0.95rem; margin-bottom: 0.25rem;">Culture of Innovation</strong>
                <span style="font-size: 0.85rem; color: #64748b; line-height: 1.5;">Empowering bright minds to solve complex clinical challenges.</span>
              </div>
            </div>

            <div style="display: flex; align-items: flex-start; gap: 0.85rem;">
              <div style="width: 42px; height: 42px; border-radius: 10px; background: rgba(243, 112, 33, 0.12); color: #f37021; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0;">
                <i class="fas fa-chart-line"></i>
              </div>
              <div>
                <strong style="display: block; color: var(--navy, #0d233a); font-size: 0.95rem; margin-bottom: 0.25rem;">Continuous Growth</strong>
                <span style="font-size: 0.85rem; color: #64748b; line-height: 1.5;">Direct mentorship, GCP certifications, and leadership pathways.</span>
              </div>
            </div>

            <div style="display: flex; align-items: flex-start; gap: 0.85rem;">
              <div style="width: 42px; height: 42px; border-radius: 10px; background: rgba(13, 35, 58, 0.08); color: #0d233a; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; flex-shrink: 0;">
                <i class="fas fa-globe-americas"></i>
              </div>
              <div>
                <strong style="display: block; color: var(--navy, #0d233a); font-size: 0.95rem; margin-bottom: 0.25rem;">Global Excellence</strong>
                <span style="font-size: 0.85rem; color: #64748b; line-height: 1.5;">Contributing directly to life-changing healthcare innovations.</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
