<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', setting('home_meta_title', 'Trevanta International | Global Clinical Research Organization (CRO)'))</title>
  <meta name="description" content="@yield('description', setting('home_meta_description', 'Trevanta International is an international full-service Clinical Research Organization providing Phase I-IV trials, Pharmacovigilance, Regulatory Affairs, and Biostatistics across North America, Europe, Latin America, and Asia.'))">
  <link rel="icon" type="image/png" href="{{ asset(setting('site_favicon', 'images/logo.png')) }}">
  @yield('meta')
  @stack('seo')
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <link rel="stylesheet" href="{{ asset('style.css') }}?v={{ time() }}">
  @stack('styles')
</head>
<body class="jss-theme">

  <!-- MOBILE NAV BACKDROP OVERLAY -->
  <div class="nav-backdrop" id="nav-backdrop" onclick="closeNav()"></div>

  <!-- MOBILE NAVIGATION DRAWER (LEFT-TO-RIGHT SLIDE-IN) -->
  <nav class="jss-nav" id="jss-nav" aria-label="Mobile Navigation">
    <div class="drawer-head">
      <a href="{{ route('home') }}" class="drawer-logo-wrap" onclick="closeNav()" aria-label="{{ setting('site_name', 'Trevanta International') }}">
        <img src="{{ asset(setting('site_logo', 'images/logo.png')) }}" alt="{{ setting('site_name', 'Trevanta International') }}" class="logo-img drawer-logo">
      </a>
      <button class="drawer-close" onclick="closeNav()" aria-label="Close navigation">&times;</button>
    </div>

    <ul class="nav-menu">
      <li class="menu-item">
        <a href="{{ route('home') }}" class="menu-link {{ request()->routeIs('home') ? 'active' : '' }}">
          <span>Home</span>
          <svg class="menu-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"/></svg>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{ route('about') }}" class="menu-link {{ request()->routeIs('about') ? 'active' : '' }}">
          <span>About Us</span>
          <svg class="menu-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"/></svg>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{ route('services') }}" class="menu-link {{ request()->routeIs('services') ? 'active' : '' }}">
          <span>Services</span>
          <svg class="menu-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"/></svg>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{ route('careers') }}" class="menu-link {{ request()->routeIs('careers') ? 'active' : '' }}">
          <span>Careers</span>
          <svg class="menu-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"/></svg>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{ route('blog') }}" class="menu-link {{ request()->routeIs('blog*') ? 'active' : '' }}">
          <span>Blog</span>
          <svg class="menu-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"/></svg>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{ route('contact') }}" class="menu-link {{ request()->routeIs('contact') ? 'active' : '' }}">
          <span>Contact Us</span>
          <svg class="menu-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 18 15 12 9 6"/></svg>
        </a>
      </li>
    </ul>

    <div class="drawer-foot">
      <span class="drawer-hotlines-title">Corporate Hotline</span>
      <div class="drawer-hotlines-list">
        <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('phone_na', '+1 (514) 934-0805')) }}"><span class="reg-pill orange">HQ</span> {{ setting('phone_na', '+1 (514) 934-0805') }}</a>
      </div>
      <a href="mailto:{{ setting('contact_email', 'info@trevanta.com') }}" class="drawer-email-link">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        {{ setting('contact_email', 'info@trevanta.com') }}
      </a>
      <button class="btn btn-jss-orange drawer-foot-cta" onclick="closeNav(); openRfpModal();">
        Request Study RFP &rarr;
      </button>
    </div>
  </nav>

  <!-- UNIFIED 2-TIER CORPORATE HEADER -->
  <header class="jss-header" id="jss-header">
    
    <!-- TIER 1: BRAND IDENTITY & CORPORATE ACTIONS -->
    <div class="header-top-tier">
      <div class="site-container header-top-inner">
        
        <!-- BRAND LOGO -->
        <a href="{{ route('home') }}" class="jss-logo" aria-label="{{ setting('site_name', 'Trevanta International') }}">
          <img src="{{ asset(setting('site_logo', 'images/logo.png')) }}" alt="{{ setting('site_name', 'Trevanta International') }}" class="logo-img">
        </a>

        <!-- TOP ACTIONS: CONTACT HOTLINES + EMAIL + LANG + RFP BUTTON + HAMBURGER -->
        <div class="header-top-actions">
          <div class="header-contact-items">
            <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('phone_na', '+1 (514) 934-0805')) }}" class="top-contact-pill" title="Montreal Global HQ Hotline">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
              <span>{{ setting('phone_na', '+1 (514) 934-0805') }}</span>
            </a>
            <a href="mailto:{{ setting('contact_email', 'info@trevanta.com') }}" class="top-contact-pill" title="Inquire via Corporate Email">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
              <span>{{ setting('contact_email', 'info@trevanta.com') }}</span>
            </a>
          </div>

          <button class="btn btn-jss-orange header-rfp-btn" onclick="openRfpModal()">
            <span class="rfp-full-txt">Request Study RFP &rarr;</span>
            <span class="rfp-short-txt">Study RFP &rarr;</span>
          </button>

          <button class="mobile-menu-btn" id="mobile-menu-btn" aria-label="Toggle navigation" onclick="toggleNav()">
            <span></span>
            <span></span>
            <span></span>
          </button>
        </div>

      </div>
    </div>

    <!-- TIER 2: DEDICATED NAVIGATION MENU BAR -->
    <div class="header-nav-tier">
      <div class="site-container header-nav-inner">
        <nav class="desktop-nav" aria-label="Main Navigation">
          <ul class="nav-menu">
            <li class="menu-item"><a href="{{ route('home') }}" class="menu-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li class="menu-item"><a href="{{ route('about') }}" class="menu-link {{ request()->routeIs('about') ? 'active' : '' }}">About Us</a></li>
            <li class="menu-item"><a href="{{ route('services') }}" class="menu-link {{ request()->routeIs('services') ? 'active' : '' }}">Services</a></li>
            <li class="menu-item"><a href="{{ route('careers') }}" class="menu-link {{ request()->routeIs('careers') ? 'active' : '' }}">Careers</a></li>
            <li class="menu-item"><a href="{{ route('blog') }}" class="menu-link {{ request()->routeIs('blog*') ? 'active' : '' }}">Blog</a></li>
            <li class="menu-item"><a href="{{ route('contact') }}" class="menu-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a></li>
          </ul>
        </nav>


      </div>
    </div>

  </header>

  <!-- DYNAMIC PAGE CONTENT -->
  @yield('content')

  <!-- TREVANTA INTERNATIONAL FOOTER -->
  <footer class="jss-footer">
    <div class="site-container footer-grid">
      <div class="f-brand">
        <a href="{{ route('home') }}" class="jss-logo" aria-label="{{ setting('site_name', 'Trevanta International') }}" style="margin-bottom: 1.25rem;">
          <img src="{{ asset(setting('site_logo_white', 'images/logo-white.png')) }}" alt="{{ setting('site_name', 'Trevanta International') }}" class="logo-img footer-logo">
        </a>
        <p class="f-about">
          {{ setting('footer_about', 'A globally recognized Clinical Research Organization delivering multi-national trial management, high-volume patient recruitment, and comprehensive pharmacovigilance across international regulatory authorities.') }}
        </p>
        <p class="f-contact-info">
          <strong>Corporate HQ:</strong> {{ setting('address_hq', '4492 Sainte-Catherine St W, Westmount, QC H3Z 1R7, Canada') }}<br>
          <strong>Hotline:</strong> <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('phone_na', '+1 (514) 934-0805')) }}">{{ setting('phone_na', '+1 (514) 934-0805') }}</a><br>
          <strong>Email:</strong> <a href="mailto:{{ setting('contact_email', 'info@trevanta.com') }}">{{ setting('contact_email', 'info@trevanta.com') }}</a>
        </p>

        @php
          $socialLinkedin  = trim(setting('social_linkedin', ''));
          $socialTwitter   = trim(setting('social_twitter', ''));
          $socialFacebook  = trim(setting('social_facebook', ''));
          $socialYoutube   = trim(setting('social_youtube', ''));
          $socialInstagram = trim(setting('social_instagram', ''));
          $hasAnySocial    = $socialLinkedin || $socialTwitter || $socialFacebook || $socialYoutube || $socialInstagram;
        @endphp

        @if($hasAnySocial)
          <div class="footer-social-section">
            <span class="footer-social-label">Follow Us:</span>
            <div class="footer-social-links">
              @if($socialLinkedin)
                <a href="{{ $socialLinkedin }}" target="_blank" rel="noopener noreferrer" class="footer-social-btn" title="Follow Trevanta on LinkedIn" aria-label="LinkedIn">
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 10.9v8.37H9.2V10.9H6.46M7.83 6.6a1.6 1.6 0 0 0-1.6 1.6 1.6 1.6 0 0 0 1.6 1.6 1.6 1.6 0 0 0 1.6-1.6 1.6 1.6 0 0 0-1.6-1.6z"/></svg>
                </a>
              @endif
              @if($socialTwitter)
                <a href="{{ $socialTwitter }}" target="_blank" rel="noopener noreferrer" class="footer-social-btn" title="Follow Trevanta on X (Twitter)" aria-label="Twitter / X">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                </a>
              @endif
              @if($socialFacebook)
                <a href="{{ $socialFacebook }}" target="_blank" rel="noopener noreferrer" class="footer-social-btn" title="Follow Trevanta on Facebook" aria-label="Facebook">
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.891h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                </a>
              @endif
              @if($socialYoutube)
                <a href="{{ $socialYoutube }}" target="_blank" rel="noopener noreferrer" class="footer-social-btn" title="Subscribe to Trevanta on YouTube" aria-label="YouTube">
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                </a>
              @endif
              @if($socialInstagram)
                <a href="{{ $socialInstagram }}" target="_blank" rel="noopener noreferrer" class="footer-social-btn" title="Follow Trevanta on Instagram" aria-label="Instagram">
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>
              @endif
            </div>
          </div>
        @endif
      </div>

      <div class="f-links-col">
        <h4>Services</h4>
        <ul>
          <li><a href="{{ route('services') }}#clinical-development">Clinical Development (Phase I–IV)</a></li>
          <li><a href="{{ route('services') }}#regulatory-affairs">Regulatory Affairs &amp; Strategy</a></li>
          <li><a href="{{ route('services') }}#biometrics-data">Biometrics &amp; Data Management</a></li>
          <li><a href="{{ route('services') }}#pharmacovigilance">Pharmacovigilance &amp; Drug Safety</a></li>
          <li><a href="{{ route('services') }}#medical-writing">Medical Writing &amp; Communications</a></li>
          <li><a href="{{ route('services') }}#laboratory-services">Laboratory &amp; Biomarker Services</a></li>
          <li><a href="{{ route('services') }}#fsp-solutions">Functional Service Provider (FSP)</a></li>
        </ul>
      </div>

      <div class="f-links-col">
        <h4>Compliance &amp; Legal</h4>
        <ul>
          @php
            $footerPoliciesList = collect();
            try {
              $footerPoliciesList = \App\Models\Policy::where('is_active', true)->orderBy('order')->orderBy('title')->take(7)->get();
            } catch (\Throwable $e) {}
          @endphp
          @if($footerPoliciesList->isNotEmpty())
            @foreach($footerPoliciesList as $fp)
              <li><a href="{{ route('policy.show', $fp->slug) }}">{{ $fp->title }}</a></li>
            @endforeach
          @else
            <li><a href="{{ route('policy.show', 'privacy-statement') }}">Privacy Statement</a></li>
            <li><a href="{{ route('policy.show', 'terms-of-use') }}">Terms of Use</a></li>
            <li><a href="{{ route('policy.show', 'gcp-statement') }}">GCP Statement</a></li>
            <li><a href="{{ route('policy.show', 'whistleblower-notice') }}">Whistleblower Notice</a></li>
            <li><a href="{{ route('policy.show', 'cookie-policy') }}">Cookie Policy</a></li>
            <li><a href="{{ route('policy.show', 'electronic-records-policy') }}">21 CFR Part 11 Policy</a></li>
            <li><a href="{{ route('policy.show', 'anti-bribery-policy') }}">Anti-Bribery Policy</a></li>
          @endif
        </ul>
      </div>

      <div class="f-links-col">
        <h4>Quick Access</h4>
        <ul>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('about') }}">About Us</a></li>
          <li><a href="{{ route('services') }}">Services</a></li>
          <li><a href="{{ route('careers') }}">Careers</a></li>
          <li><a href="{{ route('blog') }}">Insights &amp; Blog</a></li>
          <li><a href="{{ route('contact') }}">Contact Us</a></li>
        </ul>
      </div>
    </div>

    <div class="footer-legal">
      <div class="site-container legal-flex">
        <p>{{ setting('footer_copyright', '© ' . date('Y') . ' Trevanta International Inc. All rights reserved.') }}</p>
        <div class="legal-menu">
          <a href="{{ route('policy.show', 'privacy-statement') }}">Privacy Statement</a>
          <a href="{{ route('policy.show', 'terms-of-use') }}">Terms of Use</a>
          <a href="{{ route('policy.show', 'cookie-policy') }}">Cookie Policy</a>
          <a href="{{ route('policy.show', 'gcp-statement') }}">GCP Statement</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- MODAL RFP POPUP -->
  <div class="modal-backdrop" id="rfp-modal" aria-hidden="true">
    <div class="modal-box">
      <button class="modal-close" onclick="closeRfpModal()">&times;</button>
      <span class="eyebrow-jss">STUDY INQUIRY</span>
      <h3>Request Clinical Trial Proposal</h3>
      <p>Submit your protocol criteria. Our Medical Directors will reply within 24 business hours.</p>
      
      <form action="{{ route('rfp.submit') }}" method="POST" onsubmit="handleModalSubmit(event)">
        @csrf
        {{-- Anti-Spam Security Honeypot --}}
        <div style="display: none !important; opacity: 0; position: absolute; left: -9999px;" aria-hidden="true">
          <input type="text" name="website_hp" tabindex="-1" autocomplete="off">
        </div>
        <div class="form-row-2">
          <div class="j-field">
            <label>Name *</label>
            <input type="text" name="name" required placeholder="Dr. Jane Doe">
          </div>
          <div class="j-field">
            <label>Corporate Email *</label>
            <input type="email" name="email" required placeholder="jdoe@sponsor.com">
          </div>
        </div>
        <div class="form-row-2">
          <div class="j-field">
            <label>Service Required *</label>
            <select name="phase" required>
              <option value="" disabled selected>Select Core Service</option>
              <option value="Clinical Development (Phase I–IV)">1. Clinical Development (Phase I–IV)</option>
              <option value="Regulatory Affairs & Strategy">2. Regulatory Affairs &amp; Strategy</option>
              <option value="Biometrics & Data Management">3. Biometrics &amp; Data Management</option>
              <option value="Pharmacovigilance & Drug Safety">4. Pharmacovigilance &amp; Drug Safety</option>
              <option value="Medical Writing & Scientific Communications">5. Medical Writing &amp; Scientific Communications</option>
              <option value="Laboratory & Biomarker Services">6. Laboratory &amp; Biomarker Services</option>
              <option value="Functional Service Provider (FSP) Solutions">7. Functional Service Provider (FSP) Solutions</option>
            </select>
          </div>
          <div class="j-field">
            <label>Therapeutic Focus *</label>
            <select name="therapeutic_focus" required>
              <option value="" disabled selected>Select Therapeutic Focus</option>
              <option value="Oncology & Hematology">Oncology &amp; Hematology</option>
              <option value="Infectious Diseases & Vaccines">Infectious Diseases &amp; Vaccines</option>
              <option value="Cardiovascular & Metabolic Disorders">Cardiovascular &amp; Metabolic Disorders</option>
              <option value="Neurology & CNS Disorders">Neurology &amp; CNS Disorders</option>
              <option value="Rare Diseases & Orphan Drugs">Rare Diseases &amp; Orphan Drugs</option>
              <option value="Diabetes, Endocrinology & Obesity">Diabetes, Endocrinology &amp; Obesity</option>
              <option value="Immunology & Autoimmune Disorders">Immunology &amp; Autoimmune Disorders</option>
              <option value="Respiratory & Pulmonary Diseases">Respiratory &amp; Pulmonary Diseases</option>
              <option value="Dermatology & Skin Diseases">Dermatology &amp; Skin Diseases</option>
              <option value="Other Therapeutic Focus">Other Therapeutic Focus</option>
            </select>
          </div>
        </div>
        <div class="j-field">
          <label>Brief Protocol Description</label>
          <textarea name="description" rows="3" placeholder="Target sample size, timeline, and countries..."></textarea>
        </div>
        <div style="margin-top: 1.25rem; text-align: right;">
          <button type="button" class="btn btn-jss-outline" onclick="closeRfpModal()" style="margin-right: 0.5rem;">Cancel</button>
          <button type="submit" class="btn btn-jss-orange">Transmit RFP &rarr;</button>
        </div>
      </form>
    </div>
  </div>

  <!-- ARTICLE READER MODAL (FULL WHITEPAPERS) -->
  <div class="article-modal-backdrop" id="article-modal" aria-hidden="true">
    <div class="article-modal-container">
      <button class="article-modal-close" onclick="closeArticleModal()" aria-label="Close article">&times;</button>
      <div class="article-meta-header">
        <span class="blog-card-badge" id="modal-art-badge">Clinical Strategy</span>
        <span style="font-size: 0.85rem; color: var(--text-light);" id="modal-art-date">September 15, 2026 • 6 min read</span>
      </div>
      <h2 class="article-headline" id="modal-art-title">Article Headline</h2>
      <div class="article-author-callout">
        <div class="blog-author-avatar" id="modal-art-avatar">SJ</div>
        <div>
          <div class="blog-author-name" id="modal-art-author-name">Dr. Sarah Jenkins</div>
          <div class="blog-author-title" id="modal-art-author-title">VP Clinical Operations</div>
        </div>
      </div>
      <div class="article-content-body" id="modal-art-body">
        <!-- Injected dynamically by script.js -->
      </div>
      <div style="margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid var(--border-light); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
        <span style="font-size: 0.85rem; color: var(--text-muted);">Published by Trevanta International Scientific Intelligence Unit</span>
        <button class="btn btn-jss-orange" onclick="closeArticleModal(); openRfpModal();">Discuss Study Application &rarr;</button>
      </div>
    </div>
  </div>

  <!-- TOAST NOTIFICATION -->
  <div class="jss-toast" id="jss-toast" role="status">
    <div class="toast-check"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></div>
    <div>
      <strong id="toast-title">{{ session('toast_title', 'Study Proposal Received') }}</strong>
      <p id="toast-msg">{{ session('success', 'Our Medical Review Team will contact you under NDA within 24 hours.') }}</p>
    </div>
  </div>

  @if(session('success'))
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        if (typeof showToast === 'function') {
          showToast('Inquiry Received', "{{ session('success') }}");
        }
      });
    </script>
  @endif

  <script src="{{ asset('script.js') }}?v={{ time() }}"></script>
  @stack('scripts')
</body>
</html>

