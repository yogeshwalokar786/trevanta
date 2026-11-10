@extends('admin.layouts.app')

@section('title', 'Site Settings & Dynamic Configuration')
@section('page_heading', 'Site Settings')

@push('styles')
<style>
  .settings-nav .nav-link {
    color: #475569;
    font-weight: 600;
    font-size: 0.85rem;
    padding: 0.75rem 1.25rem;
    border-radius: 8px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    margin-right: 0.5rem;
    margin-bottom: 0.5rem;
    transition: all 0.2s ease;
  }
  .settings-nav .nav-link.active {
    background: #28a9a1 !important;
    color: #ffffff !important;
    border-color: #28a9a1 !important;
    box-shadow: 0 4px 12px rgba(40, 169, 161, 0.25);
  }
  .settings-nav .nav-link:hover:not(.active) {
    background: #f1f5f9;
    border-color: #cbd5e1;
  }
  .logo-upload-card {
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    background: #ffffff;
    padding: 1.25rem;
    transition: all 0.2s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
  }
  .logo-upload-card:hover {
    border-color: #28a9a1;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.04);
  }
  .logo-preview-box {
    height: 110px;
    background: #f8fafc;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    margin-bottom: 1rem;
    border: 1px dashed #cbd5e1;
    position: relative;
  }
  .logo-preview-box.dark-bg {
    background: #0d233a;
  }
  .logo-preview-box img {
    max-height: 80px;
    max-width: 90%;
    object-fit: contain;
  }
</style>
@endpush

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid px-3">
    <div class="d-flex justify-content-between align-items-center flex-wrap">
      <div>
        <h1 class="m-0 font-weight-bold">Site Settings</h1>
        <p class="text-muted text-sm mb-0">Manage global branding, logos, contact hotlines, addresses, and homepage SEO dynamically.</p>
      </div>
      <div class="mt-2 mt-sm-0">
        <button type="button" class="btn btn-primary shadow-sm" onclick="document.getElementById('settingsForm').submit()">
          <i class="fas fa-save mr-1"></i> Save All Settings
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid px-3">

    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" style="border-radius: 12px; background: #ecfdf5; color: #065f46; border-left: 4px solid #10b981 !important;">
        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" id="settingsForm">
      @csrf

      <!-- Settings Navigation Tabs -->
      <ul class="nav nav-pills settings-nav mb-4" id="settingsTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="tab-branding-nav" data-toggle="pill" href="#tab-branding" role="tab">
            <i class="fas fa-palette mr-2"></i> Logos &amp; Branding
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="tab-contact-nav" data-toggle="pill" href="#tab-contact" role="tab">
            <i class="fas fa-headset mr-2"></i> Contact &amp; HQ Address
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="tab-seo-nav" data-toggle="pill" href="#tab-seo" role="tab">
            <i class="fas fa-search-location mr-2"></i> Pages SEO &amp; Meta
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="tab-social-nav" data-toggle="pill" href="#tab-social" role="tab">
            <i class="fas fa-share-alt mr-2"></i> Social &amp; Legal
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="tab-careers-nav" data-toggle="pill" href="#tab-careers" role="tab">
            <i class="fas fa-briefcase mr-2"></i> Careers Page
          </a>
        </li>
      </ul>

      <div class="tab-content" id="settingsTabContent">

        <!-- ================================================================= -->
        <!-- TAB 1: LOGOS & BRANDING -->
        <!-- ================================================================= -->
        <div class="tab-pane fade show active" id="tab-branding" role="tabpanel">
          <div class="card mb-4 border-0 shadow-sm" style="border-radius: 12px;">
            <div class="card-header py-3 px-4 bg-white border-bottom">
              <h3 class="card-title text-sm mb-0 font-weight-bold text-dark">
                <i class="fas fa-image mr-2 text-primary"></i> Logos &amp; Visual Identity
              </h3>
            </div>
            <div class="card-body p-4">
              <div class="row">

                <!-- Header Logo (Light Backgrounds) -->
                <div class="col-md-6 col-lg-3 mb-4">
                  <div class="logo-upload-card">
                    <div class="font-weight-bold text-dark text-xs text-uppercase mb-1">Header Primary Logo</div>
                    <small class="text-muted text-xs mb-3">Used on public website navbar.</small>
                    
                    <input type="hidden" name="site_logo" id="input_site_logo" value="{{ $settings['site_logo'] ?? 'images/logo.png' }}">
                    <div class="logo-preview-box" id="box_site_logo">
                      <img id="img_site_logo" src="{{ asset($settings['site_logo'] ?? 'images/logo.png') }}" alt="Header Logo">
                    </div>
                    
                    <div class="mt-auto d-flex gap-2">
                      <button type="button" class="btn btn-white btn-xs flex-grow-1" onclick="openMediaPickerForSettings('site_logo', 'box_site_logo', 'img_site_logo')">
                        <i class="fas fa-images mr-1 text-primary"></i> Change Logo
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Footer Logo (Dark Backgrounds) -->
                <div class="col-md-6 col-lg-3 mb-4">
                  <div class="logo-upload-card">
                    <div class="font-weight-bold text-dark text-xs text-uppercase mb-1">Footer White Logo</div>
                    <small class="text-muted text-xs mb-3">Used on dark navy footer.</small>
                    
                    <input type="hidden" name="site_logo_white" id="input_site_logo_white" value="{{ $settings['site_logo_white'] ?? 'images/logo-white.png' }}">
                    <div class="logo-preview-box dark-bg" id="box_site_logo_white">
                      <img id="img_site_logo_white" src="{{ asset($settings['site_logo_white'] ?? 'images/logo-white.png') }}" alt="Footer Logo">
                    </div>
                    
                    <div class="mt-auto d-flex gap-2">
                      <button type="button" class="btn btn-white btn-xs flex-grow-1" onclick="openMediaPickerForSettings('site_logo_white', 'box_site_logo_white', 'img_site_logo_white')">
                        <i class="fas fa-images mr-1 text-primary"></i> Change Logo
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Admin Sidebar Logo -->
                <div class="col-md-6 col-lg-3 mb-4">
                  <div class="logo-upload-card">
                    <div class="font-weight-bold text-dark text-xs text-uppercase mb-1">Admin Portal Logo</div>
                    <small class="text-muted text-xs mb-3">Shown on admin panel sidebar.</small>
                    
                    <input type="hidden" name="admin_logo" id="input_admin_logo" value="{{ $settings['admin_logo'] ?? 'images/logo.png' }}">
                    <div class="logo-preview-box" id="box_admin_logo">
                      <img id="img_admin_logo" src="{{ asset($settings['admin_logo'] ?? 'images/logo.png') }}" alt="Admin Logo">
                    </div>
                    
                    <div class="mt-auto d-flex gap-2">
                      <button type="button" class="btn btn-white btn-xs flex-grow-1" onclick="openMediaPickerForSettings('admin_logo', 'box_admin_logo', 'img_admin_logo')">
                        <i class="fas fa-images mr-1 text-primary"></i> Change Logo
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Favicon Icon -->
                <div class="col-md-6 col-lg-3 mb-4">
                  <div class="logo-upload-card">
                    <div class="font-weight-bold text-dark text-xs text-uppercase mb-1">Favicon / App Icon</div>
                    <small class="text-muted text-xs mb-3">Browser tab icon (32 &times; 32).</small>
                    
                    <input type="hidden" name="site_favicon" id="input_site_favicon" value="{{ $settings['site_favicon'] ?? 'images/logo.png' }}">
                    <div class="logo-preview-box" id="box_site_favicon">
                      <img id="img_site_favicon" src="{{ asset($settings['site_favicon'] ?? 'images/logo.png') }}" alt="Favicon" style="max-height: 48px;">
                    </div>
                    
                    <div class="mt-auto d-flex gap-2">
                      <button type="button" class="btn btn-white btn-xs flex-grow-1" onclick="openMediaPickerForSettings('site_favicon', 'box_site_favicon', 'img_site_favicon')">
                        <i class="fas fa-images mr-1 text-primary"></i> Change Icon
                      </button>
                    </div>
                  </div>
                </div>

              </div>

              <hr class="my-3">

              <!-- General Brand Text -->
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="site_name" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Brand / Company Name</label>
                  <input type="text" name="site_name" id="site_name" class="form-control" value="{{ $settings['site_name'] ?? 'Trevanta International' }}" required>
                  <small class="text-muted text-xs">Used across titles, legal notices, and email communications.</small>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="site_tagline" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Tagline</label>
                  <input type="text" name="site_tagline" id="site_tagline" class="form-control" value="{{ $settings['site_tagline'] ?? 'Global Reach, Regional Agility, Patient-Centric Clinical Research' }}">
                  <small class="text-muted text-xs">Shown in header and announcement bars.</small>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- ================================================================= -->
        <!-- TAB 2: CONTACT & HEADQUARTERS ADDRESS -->
        <!-- ================================================================= -->
        <div class="tab-pane fade" id="tab-contact" role="tabpanel">
          <div class="card mb-4 border-0 shadow-sm" style="border-radius: 12px;">
            <div class="card-header py-3 px-4 bg-white border-bottom">
              <h3 class="card-title text-sm mb-0 font-weight-bold text-dark">
                <i class="fas fa-phone-alt mr-2 text-primary"></i> Communications, Hotlines &amp; Corporate Address
              </h3>
            </div>
            <div class="card-body p-4">

              <h6 class="font-weight-bold text-primary mb-3 text-sm"><i class="fas fa-envelope mr-1"></i> Corporate Email Addresses</h6>
              <div class="row mb-4">
                <div class="col-md-4 mb-3">
                  <label for="contact_email" class="font-weight-bold text-dark text-xs text-uppercase mb-1">General Inquiries Email</label>
                  <input type="email" name="contact_email" id="contact_email" class="form-control" value="{{ $settings['contact_email'] ?? 'info@trevanta.com' }}" required>
                  <small class="text-muted text-xs">Main public contact address.</small>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="rfp_email" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Study RFP / Proposals Email</label>
                  <input type="email" name="rfp_email" id="rfp_email" class="form-control" value="{{ $settings['rfp_email'] ?? 'info@trevanta.com' }}" required>
                  <small class="text-muted text-xs">Receives study RFP submissions.</small>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="safety_email" class="font-weight-bold text-dark text-xs text-uppercase mb-1">24/7 Safety &amp; ICSR Email</label>
                  <input type="email" name="safety_email" id="safety_email" class="form-control" value="{{ $settings['safety_email'] ?? 'safety@trevanta.com' }}" required>
                  <small class="text-muted text-xs">Pharmacovigilance adverse event triage.</small>
                </div>
              </div>

              <h6 class="font-weight-bold text-primary mb-3 text-sm"><i class="fas fa-headset mr-1"></i> Corporate Hotlines &amp; Operating Hours</h6>
              <div class="row mb-4">
                <div class="col-md-4 mb-3">
                  <label for="phone_na" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Corporate Hotline / Phone (HQ)</label>
                  <input type="text" name="phone_na" id="phone_na" class="form-control" value="{{ $settings['phone_na'] ?? '+1 (514) 934-0805' }}">
                  <small class="text-muted text-xs">Primary corporate contact hotline.</small>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="phone_safety" class="font-weight-bold text-dark text-xs text-uppercase mb-1">24/7 Safety Emergency Hotline</label>
                  <input type="text" name="phone_safety" id="phone_safety" class="form-control" value="{{ $settings['phone_safety'] ?? '+1 (800) 577-7233' }}">
                  <small class="text-muted text-xs">Displayed on contact page safety reporting banner.</small>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="operating_hours" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Corporate Operating Hours</label>
                  <input type="text" name="operating_hours" id="operating_hours" class="form-control" value="{{ $settings['operating_hours'] ?? 'Mon–Fri, 8:30 AM – 6:00 PM EST' }}">
                  <small class="text-muted text-xs">Displayed on contact page.</small>
                </div>
              </div>

              <h6 class="font-weight-bold text-primary mb-3 text-sm"><i class="fas fa-map-marker-alt mr-1"></i> Corporate Headquarters Address</h6>
              <div class="row">
                <div class="col-md-12 mb-0">
                  <label for="address_hq" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
                    Corporate Global HQ (Montreal, Canada)
                  </label>
                  <textarea name="address_hq" id="address_hq" rows="2" class="form-control">{{ $settings['address_hq'] ?? '4492 Sainte-Catherine St W, Westmount, QC H3Z 1R7, Canada' }}</textarea>
                  <small class="text-muted text-xs">Primary legal address displayed across website, contact page, and footer.</small>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- ================================================================= -->
        <!-- TAB 3: PAGES SEO & OPEN GRAPH -->
        <!-- ================================================================= -->
        <div class="tab-pane fade" id="tab-seo" role="tabpanel">

          <div class="card mb-4 border-0 shadow-sm" style="border-radius: 12px;">
            <div class="card-header py-3 px-4 bg-white border-bottom d-flex flex-wrap justify-content-between align-items-center">
              <div>
                <h3 class="card-title text-sm mb-0 font-weight-bold text-dark">
                  <i class="fas fa-search-location mr-2 text-primary"></i> Search Engine Optimization (SEO) &amp; Social Meta
                </h3>
                <small class="text-muted text-xs">Configure Meta Titles, Descriptions, Keywords and Social Share Images per page.</small>
              </div>
              <span class="badge badge-light border text-muted px-2 py-1 mt-2 mt-sm-0" style="font-size: 11px;">
                <i class="fab fa-google text-primary mr-1"></i> Live Google SERP Previews
              </span>
            </div>
            <div class="card-body p-4">

              <!-- Inner Sub-Tabs Navigation for Pages -->
              <ul class="nav nav-pills mb-4 p-1 bg-light rounded" id="seoPagesTab" role="tablist" style="border: 1px solid #e2e8f0; gap: 4px;">
                <li class="nav-item">
                  <a class="nav-link active py-2 px-3 text-xs font-weight-bold" id="seo-home-tab" data-toggle="pill" href="#seo-home" role="tab">
                    <i class="fas fa-home mr-1"></i> Homepage
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link py-2 px-3 text-xs font-weight-bold" id="seo-about-tab" data-toggle="pill" href="#seo-about" role="tab">
                    <i class="fas fa-info-circle mr-1"></i> About Us
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link py-2 px-3 text-xs font-weight-bold" id="seo-services-tab" data-toggle="pill" href="#seo-services" role="tab">
                    <i class="fas fa-microscope mr-1"></i> Services
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link py-2 px-3 text-xs font-weight-bold" id="seo-careers-tab" data-toggle="pill" href="#seo-careers" role="tab">
                    <i class="fas fa-user-tie mr-1"></i> Careers
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link py-2 px-3 text-xs font-weight-bold" id="seo-contact-tab" data-toggle="pill" href="#seo-contact" role="tab">
                    <i class="fas fa-envelope-open-text mr-1"></i> Contact Us
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link py-2 px-3 text-xs font-weight-bold" id="seo-global-tab" data-toggle="pill" href="#seo-global" role="tab">
                    <i class="fas fa-globe mr-1"></i> Global &amp; Robots
                  </a>
                </li>
              </ul>

              <!-- Sub-Tab Content -->
              <div class="tab-content" id="seoPagesTabContent">

                <!-- 1. HOMEPAGE SEO -->
                <div class="tab-pane fade show active" id="seo-home" role="tabpanel">
                  <div class="p-3 mb-4 rounded border" style="background: #ffffff; border-color: #e2e8f0; border-radius: 10px;">
                    <div class="d-flex align-items-center mb-1 text-xs text-muted">
                      <i class="fas fa-globe mr-1 text-secondary"></i>
                      <span style="color: #202124;" id="serp_home_url">{{ ($settings['canonical_url_base'] ?? 'https://trevanta.bluebasetechnologies.com') }}</span>
                    </div>
                    <div class="font-weight-bold mb-1" id="serp_home_title" style="font-size: 1.15rem; color: #1a0dab; line-height: 1.3;">
                      {{ $settings['home_meta_title'] ?? 'Trevanta International | Global Clinical Research Organization (CRO)' }}
                    </div>
                    <div class="text-sm" id="serp_home_desc" style="color: #4d5156; line-height: 1.5; font-size: 0.875rem;">
                      {{ $settings['home_meta_description'] ?? 'Trevanta International is an international full-service Clinical Research Organization providing Phase I-IV trials, Pharmacovigilance, Regulatory Affairs, and Biostatistics across North America, Europe, Latin America, and Asia.' }}
                    </div>
                  </div>

                  <div class="form-group mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <label for="home_meta_title" class="font-weight-bold text-dark text-xs text-uppercase mb-0">Homepage Meta Title</label>
                      <span id="home_meta_title_count" class="badge badge-light border text-xs">0 / 60</span>
                    </div>
                    <input type="text" name="home_meta_title" id="home_meta_title" class="form-control" value="{{ $settings['home_meta_title'] ?? 'Trevanta International | Global Clinical Research Organization (CRO)' }}" required>
                    <small class="text-muted text-xs">Recommended 50–60 characters. Displayed on search results and browser tab.</small>
                  </div>

                  <div class="form-group mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <label for="home_meta_description" class="font-weight-bold text-dark text-xs text-uppercase mb-0">Homepage Meta Description</label>
                      <span id="home_meta_description_count" class="badge badge-light border text-xs">0 / 160</span>
                    </div>
                    <textarea name="home_meta_description" id="home_meta_description" rows="3" class="form-control" required>{{ $settings['home_meta_description'] ?? 'Trevanta International is an international full-service Clinical Research Organization providing Phase I-IV trials, Pharmacovigilance, Regulatory Affairs, and Biostatistics across North America, Europe, Latin America, and Asia.' }}</textarea>
                    <small class="text-muted text-xs">Recommended 150–160 characters. Primary snippet shown on search engine listings.</small>
                  </div>

                  <div class="form-group mb-3">
                    <label for="home_meta_keywords" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Homepage Focus Keywords</label>
                    <textarea name="home_meta_keywords" id="home_meta_keywords" rows="2" class="form-control">{{ $settings['home_meta_keywords'] ?? 'clinical research organization, CRO, Phase I-IV trials, pharmacovigilance, regulatory affairs, biostatistics, ICH GCP, clinical trials, Trevanta International' }}</textarea>
                    <small class="text-muted text-xs">Comma-separated key phrases relevant to clinical research operations.</small>
                  </div>

                  <div class="form-group mb-0">
                    <label class="font-weight-bold text-dark text-xs text-uppercase mb-1">Homepage Social Share Banner (1200 &times; 630 recommended)</label>
                    <input type="hidden" name="home_og_image" id="input_home_og_image" value="{{ $settings['home_og_image'] ?? 'images/doctor-consultation.jpg' }}">
                    <div class="d-flex align-items-center p-3 border rounded bg-light" style="border-radius: 8px; gap: 1rem;">
                      <div class="rounded overflow-hidden border bg-white d-flex align-items-center justify-content-center" style="width: 100px; height: 60px; flex-shrink: 0;" id="box_home_og_image">
                        <img id="img_home_og_image" src="{{ asset($settings['home_og_image'] ?? 'images/doctor-consultation.jpg') }}" alt="OG Preview" style="width: 100%; height: 100%; object-fit: cover;">
                      </div>
                      <div class="flex-grow-1" style="min-width: 0;">
                        <div class="text-xs font-weight-bold text-dark text-truncate" id="label_home_og_image">{{ $settings['home_og_image'] ?? 'images/doctor-consultation.jpg' }}</div>
                        <small class="text-muted text-xs d-block">Shown when homepage link is shared on LinkedIn, WhatsApp, or Twitter.</small>
                      </div>
                      <div>
                        <button type="button" class="btn btn-white btn-xs px-2 py-1" onclick="openMediaPickerForSettings('home_og_image', 'box_home_og_image', 'img_home_og_image')">
                          <i class="fas fa-images mr-1 text-primary"></i> Change Banner
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- 2. ABOUT US SEO -->
                <div class="tab-pane fade" id="seo-about" role="tabpanel">
                  <div class="p-3 mb-4 rounded border" style="background: #ffffff; border-color: #e2e8f0; border-radius: 10px;">
                    <div class="d-flex align-items-center mb-1 text-xs text-muted">
                      <i class="fas fa-globe mr-1 text-secondary"></i>
                      <span style="color: #202124;" id="serp_about_url">{{ rtrim($settings['canonical_url_base'] ?? 'https://trevanta.bluebasetechnologies.com', '/') }}/about</span>
                    </div>
                    <div class="font-weight-bold mb-1" id="serp_about_title" style="font-size: 1.15rem; color: #1a0dab; line-height: 1.3;">
                      {{ $settings['about_meta_title'] ?? 'About Trevanta | Global CRO & Clinical Research Excellence' }}
                    </div>
                    <div class="text-sm" id="serp_about_desc" style="color: #4d5156; line-height: 1.5; font-size: 0.875rem;">
                      {{ $settings['about_meta_description'] ?? 'Learn about Trevanta International, a premier full-service Clinical Research Organization delivering agile, patient-centric Phase I-IV trials and regulatory solutions.' }}
                    </div>
                  </div>

                  <div class="form-group mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <label for="about_meta_title" class="font-weight-bold text-dark text-xs text-uppercase mb-0">About Us Meta Title</label>
                      <span id="about_meta_title_count" class="badge badge-light border text-xs">0 / 60</span>
                    </div>
                    <input type="text" name="about_meta_title" id="about_meta_title" class="form-control" value="{{ $settings['about_meta_title'] ?? 'About Trevanta | Global CRO & Clinical Research Excellence' }}" required>
                    <small class="text-muted text-xs">Recommended 50–60 characters. Appears on Google and browser tab on /about.</small>
                  </div>

                  <div class="form-group mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <label for="about_meta_description" class="font-weight-bold text-dark text-xs text-uppercase mb-0">About Us Meta Description</label>
                      <span id="about_meta_description_count" class="badge badge-light border text-xs">0 / 160</span>
                    </div>
                    <textarea name="about_meta_description" id="about_meta_description" rows="3" class="form-control" required>{{ $settings['about_meta_description'] ?? 'Learn about Trevanta International, a premier full-service Clinical Research Organization delivering agile, patient-centric Phase I-IV trials and regulatory solutions.' }}</textarea>
                    <small class="text-muted text-xs">Recommended 150–160 characters. Summary snippet for search rankings.</small>
                  </div>

                  <div class="form-group mb-3">
                    <label for="about_meta_keywords" class="font-weight-bold text-dark text-xs text-uppercase mb-1">About Us Focus Keywords</label>
                    <textarea name="about_meta_keywords" id="about_meta_keywords" rows="2" class="form-control">{{ $settings['about_meta_keywords'] ?? 'about Trevanta, clinical research organization, global CRO, CRO leadership, clinical trial quality, ICH GCP compliance' }}</textarea>
                    <small class="text-muted text-xs">Comma-separated keywords highlighting company history, mission, and clinical expertise.</small>
                  </div>

                  <div class="form-group mb-0">
                    <label class="font-weight-bold text-dark text-xs text-uppercase mb-1">About Us Social Share Banner</label>
                    <input type="hidden" name="about_og_image" id="input_about_og_image" value="{{ $settings['about_og_image'] ?? 'images/doctor-consultation.jpg' }}">
                    <div class="d-flex align-items-center p-3 border rounded bg-light" style="border-radius: 8px; gap: 1rem;">
                      <div class="rounded overflow-hidden border bg-white d-flex align-items-center justify-content-center" style="width: 100px; height: 60px; flex-shrink: 0;" id="box_about_og_image">
                        <img id="img_about_og_image" src="{{ asset($settings['about_og_image'] ?? 'images/doctor-consultation.jpg') }}" alt="OG Preview" style="width: 100%; height: 100%; object-fit: cover;">
                      </div>
                      <div class="flex-grow-1" style="min-width: 0;">
                        <div class="text-xs font-weight-bold text-dark text-truncate" id="label_about_og_image">{{ $settings['about_og_image'] ?? 'images/doctor-consultation.jpg' }}</div>
                        <small class="text-muted text-xs d-block">Shown when /about is shared on LinkedIn, WhatsApp, or Twitter.</small>
                      </div>
                      <div>
                        <button type="button" class="btn btn-white btn-xs px-2 py-1" onclick="openMediaPickerForSettings('about_og_image', 'box_about_og_image', 'img_about_og_image')">
                          <i class="fas fa-images mr-1 text-primary"></i> Change Banner
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- 3. SERVICES SEO -->
                <div class="tab-pane fade" id="seo-services" role="tabpanel">
                  <div class="p-3 mb-4 rounded border" style="background: #ffffff; border-color: #e2e8f0; border-radius: 10px;">
                    <div class="d-flex align-items-center mb-1 text-xs text-muted">
                      <i class="fas fa-globe mr-1 text-secondary"></i>
                      <span style="color: #202124;" id="serp_services_url">{{ rtrim($settings['canonical_url_base'] ?? 'https://trevanta.bluebasetechnologies.com', '/') }}/services</span>
                    </div>
                    <div class="font-weight-bold mb-1" id="serp_services_title" style="font-size: 1.15rem; color: #1a0dab; line-height: 1.3;">
                      {{ $settings['services_meta_title'] ?? 'Clinical Research Services & Trial Solutions | Trevanta' }}
                    </div>
                    <div class="text-sm" id="serp_services_desc" style="color: #4d5156; line-height: 1.5; font-size: 0.875rem;">
                      {{ $settings['services_meta_description'] ?? 'Explore full-service clinical trial solutions from Phase I-IV clinical operations, pharmacovigilance, biometrics, regulatory affairs, to medical writing.' }}
                    </div>
                  </div>

                  <div class="form-group mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <label for="services_meta_title" class="font-weight-bold text-dark text-xs text-uppercase mb-0">Services Meta Title</label>
                      <span id="services_meta_title_count" class="badge badge-light border text-xs">0 / 60</span>
                    </div>
                    <input type="text" name="services_meta_title" id="services_meta_title" class="form-control" value="{{ $settings['services_meta_title'] ?? 'Clinical Research Services & Trial Solutions | Trevanta' }}" required>
                    <small class="text-muted text-xs">Recommended 50–60 characters. Displayed on search engines for /services.</small>
                  </div>

                  <div class="form-group mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <label for="services_meta_description" class="font-weight-bold text-dark text-xs text-uppercase mb-0">Services Meta Description</label>
                      <span id="services_meta_description_count" class="badge badge-light border text-xs">0 / 160</span>
                    </div>
                    <textarea name="services_meta_description" id="services_meta_description" rows="3" class="form-control" required>{{ $settings['services_meta_description'] ?? 'Explore full-service clinical trial solutions from Phase I-IV clinical operations, pharmacovigilance, biometrics, regulatory affairs, to medical writing.' }}</textarea>
                    <small class="text-muted text-xs">Recommended 150–160 characters. Highlights trial management services and therapeutic expertise.</small>
                  </div>

                  <div class="form-group mb-3">
                    <label for="services_meta_keywords" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Services Focus Keywords</label>
                    <textarea name="services_meta_keywords" id="services_meta_keywords" rows="2" class="form-control">{{ $settings['services_meta_keywords'] ?? 'clinical research services, Phase I-IV trials, CRO services, pharmacovigilance services, regulatory submissions, clinical data management, biostatistics CRO' }}</textarea>
                    <small class="text-muted text-xs">Comma-separated keywords targeting sponsors looking for trial execution services.</small>
                  </div>

                  <div class="form-group mb-0">
                    <label class="font-weight-bold text-dark text-xs text-uppercase mb-1">Services Social Share Banner</label>
                    <input type="hidden" name="services_og_image" id="input_services_og_image" value="{{ $settings['services_og_image'] ?? 'images/doctor-consultation.jpg' }}">
                    <div class="d-flex align-items-center p-3 border rounded bg-light" style="border-radius: 8px; gap: 1rem;">
                      <div class="rounded overflow-hidden border bg-white d-flex align-items-center justify-content-center" style="width: 100px; height: 60px; flex-shrink: 0;" id="box_services_og_image">
                        <img id="img_services_og_image" src="{{ asset($settings['services_og_image'] ?? 'images/doctor-consultation.jpg') }}" alt="OG Preview" style="width: 100%; height: 100%; object-fit: cover;">
                      </div>
                      <div class="flex-grow-1" style="min-width: 0;">
                        <div class="text-xs font-weight-bold text-dark text-truncate" id="label_services_og_image">{{ $settings['services_og_image'] ?? 'images/doctor-consultation.jpg' }}</div>
                        <small class="text-muted text-xs d-block">Shown when /services link is shared on social media platforms.</small>
                      </div>
                      <div>
                        <button type="button" class="btn btn-white btn-xs px-2 py-1" onclick="openMediaPickerForSettings('services_og_image', 'box_services_og_image', 'img_services_og_image')">
                          <i class="fas fa-images mr-1 text-primary"></i> Change Banner
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- 4. CAREERS SEO -->
                <div class="tab-pane fade" id="seo-careers" role="tabpanel">
                  <div class="p-3 mb-4 rounded border" style="background: #ffffff; border-color: #e2e8f0; border-radius: 10px;">
                    <div class="d-flex align-items-center mb-1 text-xs text-muted">
                      <i class="fas fa-globe mr-1 text-secondary"></i>
                      <span style="color: #202124;" id="serp_careers_url">{{ rtrim($settings['canonical_url_base'] ?? 'https://trevanta.bluebasetechnologies.com', '/') }}/careers</span>
                    </div>
                    <div class="font-weight-bold mb-1" id="serp_careers_title" style="font-size: 1.15rem; color: #1a0dab; line-height: 1.3;">
                      {{ $settings['careers_meta_title'] ?? 'Careers at Trevanta | Join Our Global Clinical Research Team' }}
                    </div>
                    <div class="text-sm" id="serp_careers_desc" style="color: #4d5156; line-height: 1.5; font-size: 0.875rem;">
                      {{ $settings['careers_meta_description'] ?? 'Discover career opportunities at Trevanta International. Join a team dedicated to advancing clinical research, medical innovation, and human health.' }}
                    </div>
                  </div>

                  <div class="form-group mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <label for="careers_meta_title" class="font-weight-bold text-dark text-xs text-uppercase mb-0">Careers Meta Title</label>
                      <span id="careers_meta_title_count" class="badge badge-light border text-xs">0 / 60</span>
                    </div>
                    <input type="text" name="careers_meta_title" id="careers_meta_title" class="form-control" value="{{ $settings['careers_meta_title'] ?? 'Careers at Trevanta | Join Our Global Clinical Research Team' }}" required>
                    <small class="text-muted text-xs">Recommended 50–60 characters. Appears when clinical researchers search for job openings.</small>
                  </div>

                  <div class="form-group mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <label for="careers_meta_description" class="font-weight-bold text-dark text-xs text-uppercase mb-0">Careers Meta Description</label>
                      <span id="careers_meta_description_count" class="badge badge-light border text-xs">0 / 160</span>
                    </div>
                    <textarea name="careers_meta_description" id="careers_meta_description" rows="3" class="form-control" required>{{ $settings['careers_meta_description'] ?? 'Discover career opportunities at Trevanta International. Join a team dedicated to advancing clinical research, medical innovation, and human health.' }}</textarea>
                    <small class="text-muted text-xs">Recommended 150–160 characters. Highlights workplace culture, benefits, and open positions.</small>
                  </div>

                  <div class="form-group mb-3">
                    <label for="careers_meta_keywords" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Careers Focus Keywords</label>
                    <textarea name="careers_meta_keywords" id="careers_meta_keywords" rows="2" class="form-control">{{ $settings['careers_meta_keywords'] ?? 'clinical research jobs, CRA careers, clinical project manager jobs, biostatistician careers, CRO jobs, Trevanta careers' }}</textarea>
                    <small class="text-muted text-xs">Comma-separated keywords for talent acquisition and recruitment indexing.</small>
                  </div>

                  <div class="form-group mb-0">
                    <label class="font-weight-bold text-dark text-xs text-uppercase mb-1">Careers Social Share Banner</label>
                    <input type="hidden" name="careers_og_image" id="input_careers_og_image" value="{{ $settings['careers_og_image'] ?? 'images/doctor-consultation.jpg' }}">
                    <div class="d-flex align-items-center p-3 border rounded bg-light" style="border-radius: 8px; gap: 1rem;">
                      <div class="rounded overflow-hidden border bg-white d-flex align-items-center justify-content-center" style="width: 100px; height: 60px; flex-shrink: 0;" id="box_careers_og_image">
                        <img id="img_careers_og_image" src="{{ asset($settings['careers_og_image'] ?? 'images/doctor-consultation.jpg') }}" alt="OG Preview" style="width: 100%; height: 100%; object-fit: cover;">
                      </div>
                      <div class="flex-grow-1" style="min-width: 0;">
                        <div class="text-xs font-weight-bold text-dark text-truncate" id="label_careers_og_image">{{ $settings['careers_og_image'] ?? 'images/doctor-consultation.jpg' }}</div>
                        <small class="text-muted text-xs d-block">Shown when /careers link is shared on LinkedIn or career forums.</small>
                      </div>
                      <div>
                        <button type="button" class="btn btn-white btn-xs px-2 py-1" onclick="openMediaPickerForSettings('careers_og_image', 'box_careers_og_image', 'img_careers_og_image')">
                          <i class="fas fa-images mr-1 text-primary"></i> Change Banner
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- 5. CONTACT US SEO -->
                <div class="tab-pane fade" id="seo-contact" role="tabpanel">
                  <div class="p-3 mb-4 rounded border" style="background: #ffffff; border-color: #e2e8f0; border-radius: 10px;">
                    <div class="d-flex align-items-center mb-1 text-xs text-muted">
                      <i class="fas fa-globe mr-1 text-secondary"></i>
                      <span style="color: #202124;" id="serp_contact_url">{{ rtrim($settings['canonical_url_base'] ?? 'https://trevanta.bluebasetechnologies.com', '/') }}/contact</span>
                    </div>
                    <div class="font-weight-bold mb-1" id="serp_contact_title" style="font-size: 1.15rem; color: #1a0dab; line-height: 1.3;">
                      {{ $settings['contact_meta_title'] ?? 'Contact Trevanta | Global Clinical Trial Inquiries & RFPs' }}
                    </div>
                    <div class="text-sm" id="serp_contact_desc" style="color: #4d5156; line-height: 1.5; font-size: 0.875rem;">
                      {{ $settings['contact_meta_description'] ?? 'Contact Trevanta International headquarters or our regional clinical operations teams across North America, Europe, APAC, and Latin America.' }}
                    </div>
                  </div>

                  <div class="form-group mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <label for="contact_meta_title" class="font-weight-bold text-dark text-xs text-uppercase mb-0">Contact Us Meta Title</label>
                      <span id="contact_meta_title_count" class="badge badge-light border text-xs">0 / 60</span>
                    </div>
                    <input type="text" name="contact_meta_title" id="contact_meta_title" class="form-control" value="{{ $settings['contact_meta_title'] ?? 'Contact Trevanta | Global Clinical Trial Inquiries & RFPs' }}" required>
                    <small class="text-muted text-xs">Recommended 50–60 characters. Appears on search results for sponsor inquiries.</small>
                  </div>

                  <div class="form-group mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <label for="contact_meta_description" class="font-weight-bold text-dark text-xs text-uppercase mb-0">Contact Us Meta Description</label>
                      <span id="contact_meta_description_count" class="badge badge-light border text-xs">0 / 160</span>
                    </div>
                    <textarea name="contact_meta_description" id="contact_meta_description" rows="3" class="form-control" required>{{ $settings['contact_meta_description'] ?? 'Contact Trevanta International headquarters or our regional clinical operations teams across North America, Europe, APAC, and Latin America.' }}</textarea>
                    <small class="text-muted text-xs">Recommended 150–160 characters. Clear call-to-action for study inquiries and RFP submission.</small>
                  </div>

                  <div class="form-group mb-3">
                    <label for="contact_meta_keywords" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Contact Us Focus Keywords</label>
                    <textarea name="contact_meta_keywords" id="contact_meta_keywords" rows="2" class="form-control">{{ $settings['contact_meta_keywords'] ?? 'contact Trevanta, clinical trial RFP, CRO proposal, clinical operations inquiry, pharmacovigilance contact' }}</textarea>
                    <small class="text-muted text-xs">Comma-separated keywords for sponsor contact discovery.</small>
                  </div>

                  <div class="form-group mb-0">
                    <label class="font-weight-bold text-dark text-xs text-uppercase mb-1">Contact Us Social Share Banner</label>
                    <input type="hidden" name="contact_og_image" id="input_contact_og_image" value="{{ $settings['contact_og_image'] ?? 'images/doctor-consultation.jpg' }}">
                    <div class="d-flex align-items-center p-3 border rounded bg-light" style="border-radius: 8px; gap: 1rem;">
                      <div class="rounded overflow-hidden border bg-white d-flex align-items-center justify-content-center" style="width: 100px; height: 60px; flex-shrink: 0;" id="box_contact_og_image">
                        <img id="img_contact_og_image" src="{{ asset($settings['contact_og_image'] ?? 'images/doctor-consultation.jpg') }}" alt="OG Preview" style="width: 100%; height: 100%; object-fit: cover;">
                      </div>
                      <div class="flex-grow-1" style="min-width: 0;">
                        <div class="text-xs font-weight-bold text-dark text-truncate" id="label_contact_og_image">{{ $settings['contact_og_image'] ?? 'images/doctor-consultation.jpg' }}</div>
                        <small class="text-muted text-xs d-block">Shown when /contact link is shared on communication apps.</small>
                      </div>
                      <div>
                        <button type="button" class="btn btn-white btn-xs px-2 py-1" onclick="openMediaPickerForSettings('contact_og_image', 'box_contact_og_image', 'img_contact_og_image')">
                          <i class="fas fa-images mr-1 text-primary"></i> Change Banner
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- 6. GLOBAL & ROBOTS -->
                <div class="tab-pane fade" id="seo-global" role="tabpanel">
                  <div class="alert alert-light border mb-4 text-xs text-muted">
                    <i class="fas fa-info-circle mr-1 text-primary"></i>
                    These global directives govern search indexing behavior across all pages and define the authoritative domain for canonical link tags.
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="meta_robots_default" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Default Robots Directives</label>
                      <select name="meta_robots_default" id="meta_robots_default" class="form-control">
                        <option value="index, follow" {{ ($settings['meta_robots_default'] ?? 'index, follow') == 'index, follow' ? 'selected' : '' }}>index, follow (Default - Allow search engine indexing)</option>
                        <option value="noindex, follow" {{ ($settings['meta_robots_default'] ?? '') == 'noindex, follow' ? 'selected' : '' }}>noindex, follow (Hide entire site from search results)</option>
                      </select>
                      <small class="text-muted text-xs">Sets the master <code>&lt;meta name="robots"&gt;</code> directive tag.</small>
                    </div>

                    <div class="col-md-6 mb-3">
                      <label for="canonical_url_base" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Canonical Base URL</label>
                      <input type="text" name="canonical_url_base" id="canonical_url_base" class="form-control" value="{{ $settings['canonical_url_base'] ?? 'https://trevanta.bluebasetechnologies.com' }}" required>
                      <small class="text-muted text-xs">The primary production domain without trailing slash (e.g. <code>https://trevanta.bluebasetechnologies.com</code>).</small>
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div>
        </div>

        <!-- ================================================================= -->
        <!-- TAB 5: SOCIAL MEDIA & LEGAL -->
        <!-- ================================================================= -->
        <div class="tab-pane fade" id="tab-social" role="tabpanel">
          <div class="card mb-4 border-0 shadow-sm" style="border-radius: 12px;">
            <div class="card-header py-3 px-4 bg-white border-bottom">
              <h3 class="card-title text-sm mb-0 font-weight-bold text-dark">
                <i class="fas fa-share-alt mr-2 text-primary"></i> Social Channels, Footer Notice &amp; Legal
              </h3>
            </div>
            <div class="card-body p-4">
              <div class="row mb-3">
                <div class="col-md-6 mb-3">
                  <label for="social_linkedin" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
                    <i class="fab fa-linkedin text-primary mr-1"></i> LinkedIn Profile URL
                  </label>
                  <input type="url" name="social_linkedin" id="social_linkedin" class="form-control" value="{{ $settings['social_linkedin'] ?? 'https://www.linkedin.com/company/trevanta-international' }}">
                </div>
                <div class="col-md-6 mb-3">
                  <label for="social_twitter" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
                    <i class="fab fa-twitter text-info mr-1"></i> Twitter / X Profile URL
                  </label>
                  <input type="url" name="social_twitter" id="social_twitter" class="form-control" value="{{ $settings['social_twitter'] ?? 'https://twitter.com/trevantacro' }}">
                </div>
              </div>

              <div class="form-group mb-3">
                <label for="footer_about" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Footer About Description</label>
                <textarea name="footer_about" id="footer_about" rows="3" class="form-control">{{ $settings['footer_about'] ?? 'A globally recognized Clinical Research Organization delivering multi-national trial management, high-volume patient recruitment, and comprehensive pharmacovigilance across international regulatory authorities.' }}</textarea>
                <small class="text-muted text-xs">Short overview displayed directly under the footer logo.</small>
              </div>

              <div class="form-group mb-0">
                <label for="footer_copyright" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Footer Copyright Notice</label>
                <input type="text" name="footer_copyright" id="footer_copyright" class="form-control" value="{{ $settings['footer_copyright'] ?? '© 2026 Trevanta International Inc. All rights reserved. Compliant with 21 CFR Part 11, ICH-GCP, and GDPR.' }}">
                <small class="text-muted text-xs">Shown at the bottom copyright bar of every page.</small>
              </div>

            </div>
          </div>
        </div>

        <!-- ================================================================= -->
        <!-- TAB 6: CAREERS PAGE -->
        <!-- ================================================================= -->
        <div class="tab-pane fade" id="tab-careers" role="tabpanel">
          
          <!-- 1. Header & Main Overview -->
          <div class="card mb-4 border-0 shadow-sm" style="border-radius: 12px;">
            <div class="card-header py-3 px-4 bg-white border-bottom">
              <h3 class="card-title text-sm mb-0 font-weight-bold text-dark">
                <i class="fas fa-heading mr-2 text-primary"></i> Main Headline &amp; Overview
              </h3>
            </div>
            <div class="card-body p-4">
              <div class="row">
                <div class="col-md-4 mb-3">
                  <label for="careers_eyebrow" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Eyebrow Tag</label>
                  <input type="text" name="careers_eyebrow" id="careers_eyebrow" class="form-control" value="{{ $settings['careers_eyebrow'] ?? 'PEOPLE & CULTURE' }}">
                  <small class="text-muted text-xs">Small top badge above the headline.</small>
                </div>

                <div class="col-md-8 mb-3">
                  <label for="careers_heading" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Main Heading</label>
                  <input type="text" name="careers_heading" id="careers_heading" class="form-control" value="{{ $settings['careers_heading'] ?? 'Join a team committed to improving global health.' }}">
                  <small class="text-muted text-xs">Primary headline displayed on the Careers page.</small>
                </div>

                <div class="col-md-12 mb-3">
                  <label for="careers_description" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Body Description</label>
                  <textarea name="careers_description" id="careers_description" rows="3" class="form-control">{{ $settings['careers_description'] ?? 'At Trevanta International our people are at the heart of innovation. We foster a culture of collaboration, growth, and scientific excellence.' }}</textarea>
                  <small class="text-muted text-xs">Introductory paragraph displayed directly below the heading.</small>
                </div>

                <div class="col-md-12 mb-0">
                  <label for="careers_email" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Careers / HR Email</label>
                  <input type="email" name="careers_email" id="careers_email" class="form-control" value="{{ $settings['careers_email'] ?? ($settings['contact_email'] ?? 'info@trevanta.com') }}">
                  <small class="text-muted text-xs">Direct email for applicants to submit resumes or inquiries.</small>
                </div>
              </div>
            </div>
          </div>

          <!-- 2. Culture & Career Highlights (4 Points) -->
          <div class="card mb-4 border-0 shadow-sm" style="border-radius: 12px;">
            <div class="card-header py-3 px-4 bg-white border-bottom">
              <h3 class="card-title text-sm mb-0 font-weight-bold text-dark">
                <i class="fas fa-list-ul mr-2 text-primary"></i> Culture &amp; Career Highlights (4 Points)
              </h3>
            </div>
            <div class="card-body p-4">
              <div class="row">
                
                <!-- Point 1 -->
                <div class="col-md-6 mb-4">
                  <div class="p-3 border rounded bg-light" style="border-radius: 10px;">
                    <div class="d-flex align-items-center mb-2">
                      <span class="badge badge-primary mr-2">Point 1</span>
                      <strong class="text-xs text-uppercase text-dark">Global Collaboration</strong>
                    </div>
                    <div class="form-group mb-2">
                      <label for="careers_feat1_title" class="font-weight-bold text-dark text-xs mb-1">Title</label>
                      <input type="text" name="careers_feat1_title" id="careers_feat1_title" class="form-control" value="{{ $settings['careers_feat1_title'] ?? 'Global Cross-Functional Collaboration' }}">
                    </div>
                    <div class="form-group mb-0">
                      <label for="careers_feat1_desc" class="font-weight-bold text-dark text-xs mb-1">Description</label>
                      <textarea name="careers_feat1_desc" id="careers_feat1_desc" rows="2" class="form-control">{{ $settings['careers_feat1_desc'] ?? 'Multi-national clinical teams operating across North America, Europe, and Asia.' }}</textarea>
                    </div>
                  </div>
                </div>

                <!-- Point 2 -->
                <div class="col-md-6 mb-4">
                  <div class="p-3 border rounded bg-light" style="border-radius: 10px;">
                    <div class="d-flex align-items-center mb-2">
                      <span class="badge badge-primary mr-2">Point 2</span>
                      <strong class="text-xs text-uppercase text-dark">Continuous Growth</strong>
                    </div>
                    <div class="form-group mb-2">
                      <label for="careers_feat2_title" class="font-weight-bold text-dark text-xs mb-1">Title</label>
                      <input type="text" name="careers_feat2_title" id="careers_feat2_title" class="form-control" value="{{ $settings['careers_feat2_title'] ?? 'Continuous Growth & GCP Certification' }}">
                    </div>
                    <div class="form-group mb-0">
                      <label for="careers_feat2_desc" class="font-weight-bold text-dark text-xs mb-1">Description</label>
                      <textarea name="careers_feat2_desc" id="careers_feat2_desc" rows="2" class="form-control">{{ $settings['careers_feat2_desc'] ?? 'Comprehensive continuing education, international GCP credentials, and leadership tracks.' }}</textarea>
                    </div>
                  </div>
                </div>

                <!-- Point 3 -->
                <div class="col-md-6 mb-4">
                  <div class="p-3 border rounded bg-light" style="border-radius: 10px;">
                    <div class="d-flex align-items-center mb-2">
                      <span class="badge badge-primary mr-2">Point 3</span>
                      <strong class="text-xs text-uppercase text-dark">High-Impact Research</strong>
                    </div>
                    <div class="form-group mb-2">
                      <label for="careers_feat3_title" class="font-weight-bold text-dark text-xs mb-1">Title</label>
                      <input type="text" name="careers_feat3_title" id="careers_feat3_title" class="form-control" value="{{ $settings['careers_feat3_title'] ?? 'High-Impact Clinical Research' }}">
                    </div>
                    <div class="form-group mb-0">
                      <label for="careers_feat3_desc" class="font-weight-bold text-dark text-xs mb-1">Description</label>
                      <textarea name="careers_feat3_desc" id="careers_feat3_desc" rows="2" class="form-control">{{ $settings['careers_feat3_desc'] ?? 'Direct involvement in pivotal Phase I–IV trials delivering life-saving medical innovations.' }}</textarea>
                    </div>
                  </div>
                </div>

                <!-- Point 4 -->
                <div class="col-md-6 mb-4">
                  <div class="p-3 border rounded bg-light" style="border-radius: 10px;">
                    <div class="d-flex align-items-center mb-2">
                      <span class="badge badge-primary mr-2">Point 4</span>
                      <strong class="text-xs text-uppercase text-dark">Modern Systems</strong>
                    </div>
                    <div class="form-group mb-2">
                      <label for="careers_feat4_title" class="font-weight-bold text-dark text-xs mb-1">Title</label>
                      <input type="text" name="careers_feat4_title" id="careers_feat4_title" class="form-control" value="{{ $settings['careers_feat4_title'] ?? 'Flexible Infrastructure & Modern Systems' }}">
                    </div>
                    <div class="form-group mb-0">
                      <label for="careers_feat4_desc" class="font-weight-bold text-dark text-xs mb-1">Description</label>
                      <textarea name="careers_feat4_desc" id="careers_feat4_desc" rows="2" class="form-control">{{ $settings['careers_feat4_desc'] ?? 'Modern digital clinical systems, flexible work models, and collaborative support.' }}</textarea>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <!-- 3. Our Commitment Motto Callout Card -->
          <div class="card mb-4 border-0 shadow-sm" style="border-radius: 12px;">
            <div class="card-header py-3 px-4 bg-white border-bottom">
              <h3 class="card-title text-sm mb-0 font-weight-bold text-dark">
                <i class="fas fa-quote-left mr-2 text-primary"></i> Commitment Motto Callout
              </h3>
            </div>
            <div class="card-body p-4">
              <div class="row">
                <div class="col-md-4 mb-3">
                  <label for="careers_motto_tag" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Callout Badge / Tag</label>
                  <input type="text" name="careers_motto_tag" id="careers_motto_tag" class="form-control" value="{{ $settings['careers_motto_tag'] ?? 'OUR COMMITMENT' }}">
                  <small class="text-muted text-xs">Top badge on the quote box.</small>
                </div>

                <div class="col-md-4 mb-3">
                  <label for="careers_motto_author" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Author Title</label>
                  <input type="text" name="careers_motto_author" id="careers_motto_author" class="form-control" value="{{ $settings['careers_motto_author'] ?? 'Executive Leadership Board' }}">
                  <small class="text-muted text-xs">Author title displayed under quote.</small>
                </div>

                <div class="col-md-4 mb-3">
                  <label for="careers_motto_org" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Organization Subtitle</label>
                  <input type="text" name="careers_motto_org" id="careers_motto_org" class="form-control" value="{{ $settings['careers_motto_org'] ?? 'Trevanta International' }}">
                  <small class="text-muted text-xs">Company or board subtitle.</small>
                </div>

                <div class="col-md-12 mb-0">
                  <label for="careers_motto_quote" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Commitment Statement / Quote</label>
                  <textarea name="careers_motto_quote" id="careers_motto_quote" rows="3" class="form-control">{{ $settings['careers_motto_quote'] ?? 'Our world-class team of highly qualified and experienced workforce enables us to meet client expectations and deliver projects within the timeframe.' }}</textarea>
                  <small class="text-muted text-xs">Exact quote displayed inside the motto callout box.</small>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

      <!-- Save Button Bar -->
      <div class="d-flex justify-content-end mb-5">
        <button type="submit" class="btn btn-primary px-4 py-2 shadow-sm font-weight-bold">
          <i class="fas fa-save mr-1"></i> Save All Settings
        </button>
      </div>

    </form>

  </div>
</section>

<!-- ========================================================================= -->
<!-- REUSABLE MEDIA PICKER MODAL FOR SETTINGS -->
<!-- ========================================================================= -->
<div class="modal fade" id="mediaPickerModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
      <div class="modal-header border-bottom py-3 px-4 bg-light d-flex justify-content-between align-items-center">
        <div>
          <h5 class="modal-title font-weight-bold text-dark mb-0">Select Asset from Media Library</h5>
          <small class="text-muted">Click any asset or upload a new logo/image below.</small>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body p-4">
        <!-- Quick Fast Upload inside Modal -->
        <div class="p-3 mb-4 rounded border text-center" style="background: #f0fdfa; border-style: dashed !important; border-color: #28a9a1 !important; border-radius: 10px;">
          <input type="file" id="modalFastFileInput" class="d-none" accept="image/*" onchange="uploadFileFromModal(this)">
          <span class="text-dark font-weight-bold mr-2 text-sm">Need to upload a new asset?</span>
          <label for="modalFastFileInput" class="btn btn-primary btn-sm mb-0 cursor-pointer">
            <i class="fas fa-cloud-upload-alt mr-1"></i> Upload Image
          </label>
          <span id="modalUploadStatus" class="ml-2 text-xs"></span>
        </div>

        <!-- Grid of Media Assets -->
        <div id="modalMediaGridContainer" class="row" style="max-height: 440px; overflow-y: auto;">
          <div class="col-12 text-center py-4">
            <div class="spinner-border text-primary" role="status"></div>
            <p class="text-muted text-xs mt-2">Loading library assets...</p>
          </div>
        </div>
      </div>

      <div class="modal-footer border-top bg-light py-2 px-4 d-flex justify-content-between align-items-center">
        <span class="text-muted text-xs">Targeting: <strong id="modalTargetLabel" class="text-dark">Logo</strong></span>
        <button type="button" class="btn btn-white btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
  let currentTargetInputId = '';
  let currentTargetBoxId = '';
  let currentTargetImgId = '';

  function openMediaPickerForSettings(inputId, boxId, imgId) {
    currentTargetInputId = inputId;
    currentTargetBoxId = boxId;
    currentTargetImgId = imgId;
    document.getElementById('modalTargetLabel').textContent = inputId.replace('site_', '').replace('_', ' ').toUpperCase();
    $('#mediaPickerModal').modal('show');
    loadMediaPickerItems();
  }

  function selectMediaItem(relativePath, fullUrl, filename) {
    if (currentTargetInputId) {
      const input = document.getElementById('input_' + currentTargetInputId);
      if (input) input.value = relativePath;

      const img = document.getElementById(currentTargetImgId);
      if (img) img.src = fullUrl;

      const label = document.getElementById('label_' + currentTargetInputId);
      if (label) label.textContent = relativePath;
    }
    $('#mediaPickerModal').modal('hide');
  }

  function loadMediaPickerItems() {
    const container = document.getElementById('modalMediaGridContainer');
    container.innerHTML = '<div class="col-12 text-center py-4"><div class="spinner-border text-primary" role="status"></div><p class="text-muted text-xs mt-2">Loading library assets...</p></div>';

    fetch("{{ route('admin.media.index') }}", {
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json'
      }
    })
    .then(res => res.json())
    .then(data => {
      if (data.media && data.media.length > 0) {
        let html = '';
        data.media.forEach(item => {
          const fileUrl = item.path.startsWith('http') || item.path.startsWith('/') ? item.path : '/' + item.path;
          const relativePath = item.path.startsWith('/') ? item.path.substring(1) : item.path;
          html += `
            <div class="col-6 col-sm-4 col-md-3 mb-3">
              <div class="border rounded p-2 text-center bg-white shadow-xs cursor-pointer media-picker-card" 
                   onclick="selectMediaItem('${relativePath}', '${fileUrl}', '${escapeHtml(item.filename)}')" 
                   style="border-radius: 10px; cursor: pointer; transition: all 0.15s ease;">
                <div class="bg-light rounded overflow-hidden d-flex align-items-center justify-content-center mb-2" style="height: 100px;">
                  <img src="${fileUrl}" alt="${escapeHtml(item.filename)}" style="width: 100%; height: 100%; object-fit: contain;" onerror="this.onerror=null; this.src='/images/logo.png';">
                </div>
                <div class="text-xs font-weight-bold text-dark text-truncate" title="${escapeHtml(item.filename)}">
                  ${escapeHtml(item.filename)}
                </div>
                <small class="text-primary font-weight-bold text-xs d-block mt-1">Select Asset &rarr;</small>
              </div>
            </div>
          `;
        });
        container.innerHTML = html;
      } else {
        container.innerHTML = '<div class="col-12 text-center py-4 text-muted"><p>No assets in library yet. Upload one above!</p></div>';
      }
    })
    .catch(err => {
      container.innerHTML = '<div class="col-12 text-center py-4 text-danger"><p>Failed to load media assets.</p></div>';
    });
  }

  function uploadFileFromModal(input) {
    if (!input.files || !input.files[0]) return;
    const status = document.getElementById('modalUploadStatus');
    status.innerHTML = '<i class="fas fa-spinner fa-spin text-primary"></i> Uploading...';

    const formData = new FormData();
    formData.append('file', input.files[0]);
    formData.append('_token', '{{ csrf_token() }}');

    fetch("{{ route('admin.media.store') }}", {
      method: 'POST',
      body: formData,
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json'
      }
    })
    .then(res => res.json())
    .then(data => {
      status.innerHTML = '<span class="text-success font-weight-bold"><i class="fas fa-check"></i> Uploaded!</span>';
      setTimeout(() => { status.innerHTML = ''; }, 3000);
      loadMediaPickerItems();
      input.value = '';
    })
    .catch(err => {
      status.innerHTML = '<span class="text-danger">Upload failed.</span>';
    });
  }

  function escapeHtml(text) {
    if (!text) return '';
    return text.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
  }

  // Live SEO Simulator for all pages
  const seoPagesConfig = [
    { prefix: 'home', slug: '', defaultTitle: 'Trevanta International | Global Clinical Research Organization (CRO)', defaultDesc: 'Trevanta International is an international full-service Clinical Research Organization providing Phase I-IV trials, Pharmacovigilance, Regulatory Affairs, and Biostatistics across North America, Europe, Latin America, and Asia.' },
    { prefix: 'about', slug: '/about', defaultTitle: 'About Trevanta | Global CRO & Clinical Research Excellence', defaultDesc: 'Learn about Trevanta International, a premier full-service Clinical Research Organization delivering agile, patient-centric Phase I-IV trials and regulatory solutions.' },
    { prefix: 'services', slug: '/services', defaultTitle: 'Clinical Research Services & Trial Solutions | Trevanta', defaultDesc: 'Explore full-service clinical trial solutions from Phase I-IV clinical operations, pharmacovigilance, biometrics, regulatory affairs, to medical writing.' },
    { prefix: 'careers', slug: '/careers', defaultTitle: 'Careers at Trevanta | Join Our Global Clinical Research Team', defaultDesc: 'Discover career opportunities at Trevanta International. Join a team dedicated to advancing clinical research, medical innovation, and human health.' },
    { prefix: 'contact', slug: '/contact', defaultTitle: 'Contact Trevanta | Global Clinical Trial Inquiries & RFPs', defaultDesc: 'Contact Trevanta International headquarters or our regional clinical operations teams across North America, Europe, APAC, and Latin America.' }
  ];

  function updateAllSeoPreviews() {
    const rawBase = document.getElementById('canonical_url_base')?.value || 'https://trevanta.bluebasetechnologies.com';
    const baseUrl = rawBase.replace(/\/+$/, '');

    seoPagesConfig.forEach(page => {
      const titleInput = document.getElementById(page.prefix + '_meta_title');
      const descInput = document.getElementById(page.prefix + '_meta_description');
      const titleVal = titleInput ? titleInput.value : '';
      const descVal = descInput ? descInput.value : '';

      const serpTitle = document.getElementById('serp_' + page.prefix + '_title');
      if (serpTitle) {
        serpTitle.textContent = titleVal.trim() || page.defaultTitle;
      }

      const serpDesc = document.getElementById('serp_' + page.prefix + '_desc');
      if (serpDesc) {
        serpDesc.textContent = descVal.trim() || page.defaultDesc;
      }

      const serpUrl = document.getElementById('serp_' + page.prefix + '_url');
      if (serpUrl) {
        serpUrl.textContent = baseUrl + page.slug;
      }

      // Title character counter
      const titleLen = titleVal.length;
      const titleBadge = document.getElementById(page.prefix + '_meta_title_count');
      if (titleBadge) {
        titleBadge.textContent = titleLen + ' / 60';
        titleBadge.className = 'badge border text-xs ' + (titleLen > 60 ? 'badge-warning text-dark' : (titleLen >= 35 ? 'badge-success text-white' : 'badge-light text-muted'));
      }

      // Description character counter
      const descLen = descVal.length;
      const descBadge = document.getElementById(page.prefix + '_meta_description_count');
      if (descBadge) {
        descBadge.textContent = descLen + ' / 160';
        descBadge.className = 'badge border text-xs ' + (descLen > 160 ? 'badge-warning text-dark' : (descLen >= 100 ? 'badge-success text-white' : 'badge-light text-muted'));
      }
    });
  }

  // Bind live listeners
  seoPagesConfig.forEach(page => {
    document.getElementById(page.prefix + '_meta_title')?.addEventListener('input', updateAllSeoPreviews);
    document.getElementById(page.prefix + '_meta_description')?.addEventListener('input', updateAllSeoPreviews);
  });
  document.getElementById('canonical_url_base')?.addEventListener('input', updateAllSeoPreviews);

  document.addEventListener('DOMContentLoaded', updateAllSeoPreviews);
</script>
@endpush
@endsection

