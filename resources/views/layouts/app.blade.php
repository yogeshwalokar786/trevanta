<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'AstraClinical Research | Global Clinical Research Organization (CRO)')</title>
  <meta name="description" content="@yield('description', 'AstraClinical Research is an international full-service Clinical Research Organization providing Phase I-IV trials, Pharmacovigilance, Regulatory Affairs, and Biostatistics across North America, Europe, Latin America, and Asia.')">
  @yield('meta')
  @stack('seo')
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  @stack('styles')
</head>
<body class="jss-theme">

  <!-- MOBILE NAV BACKDROP OVERLAY -->
  <div class="nav-backdrop" id="nav-backdrop" onclick="closeNav()"></div>

  <!-- MOBILE NAVIGATION DRAWER (LEFT-TO-RIGHT SLIDE-IN) -->
  <nav class="jss-nav" id="jss-nav" aria-label="Mobile Navigation">
    <div class="drawer-head">
      <div class="logo-graphic">
        <img src="{{ asset('images/logo.png') }}" alt="Trevanta International" class="logo-img drawer-logo">
      </div>
      <button class="drawer-close" onclick="closeNav()" aria-label="Close navigation">&times;</button>
    </div>

    <ul class="nav-menu">
      <li class="menu-item"><a href="{{ route('home') }}" class="menu-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
      <li class="menu-item"><a href="{{ route('about') }}" class="menu-link {{ request()->routeIs('about') ? 'active' : '' }}">About Us</a></li>
      <li class="menu-item"><a href="{{ route('services') }}" class="menu-link {{ request()->routeIs('services') ? 'active' : '' }}">Services</a></li>
      <li class="menu-item"><a href="{{ route('global') }}" class="menu-link {{ request()->routeIs('global') ? 'active' : '' }}">Global Presence</a></li>
      <li class="menu-item"><a href="{{ route('blog') }}" class="menu-link {{ request()->routeIs('blog*') ? 'active' : '' }}">Insights &amp; Blog</a></li>
      <li class="menu-item"><a href="{{ route('contact') }}" class="menu-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a></li>
    </ul>

    <div class="drawer-foot">
      <span class="drawer-hotlines-title">Regional Direct Hotlines</span>
      <div class="drawer-hotlines-list">
        <a href="tel:+15149340805"><span class="reg-pill orange">NA</span> +1 (514) 934-0805</a>
        <a href="tel:+917738804988"><span class="reg-pill">IN</span> +91 7738804988</a>
        <a href="tel:+971523822824"><span class="reg-pill">UAE</span> +971 52 382 2824</a>
      </div>
      <a href="mailto:info@astraclinical.com" style="font-size: 0.8rem; color: var(--text-muted); display: flex; align-items: center; gap: 0.4rem; margin-top: 0.25rem;">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        info@astraclinical.com
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
        <a href="{{ route('home') }}" class="jss-logo" aria-label="Trevanta International">
          <img src="{{ asset('images/logo.png') }}" alt="Trevanta International" class="logo-img">
        </a>

        <!-- TOP ACTIONS: CONTACT HOTLINES + EMAIL + LANG + RFP BUTTON + HAMBURGER -->
        <div class="header-top-actions">
          <div class="header-contact-items">
            <a href="tel:+15149340805" class="top-contact-pill" title="Montreal Global HQ Hotline">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
              <span>+1 (514) 934-0805</span>
            </a>
            <a href="mailto:info@astraclinical.com" class="top-contact-pill" title="Inquire via Corporate Email">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
              <span>info@astraclinical.com</span>
            </a>
          </div>

          <div class="header-lang">
            <button class="lang-btn active">EN</button>
            <span class="lang-divider">|</span>
            <button class="lang-btn" onclick="alert('Version française disponible sur demande.')">FR</button>
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
            <li class="menu-item"><a href="{{ route('global') }}" class="menu-link {{ request()->routeIs('global') ? 'active' : '' }}">Global Presence</a></li>
            <li class="menu-item"><a href="{{ route('blog') }}" class="menu-link {{ request()->routeIs('blog*') ? 'active' : '' }}">Insights &amp; Blog</a></li>
            <li class="menu-item"><a href="{{ route('contact') }}" class="menu-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a></li>
          </ul>
        </nav>

        <div class="nav-tier-extra">
          <span class="compliance-mini-tag">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            ICH-GCP &bull; 21 CFR Part 11
          </span>
          <button class="nav-search-btn" onclick="openRfpModal()" title="Fast Feasibility Assessment">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <span>Fast Feasibility</span>
          </button>
        </div>
      </div>
    </div>

  </header>

  <!-- DYNAMIC PAGE CONTENT -->
  @yield('content')

  <!-- ASTRACLINICAL FOOTER -->
  <footer class="jss-footer">
    <div class="site-container footer-grid">
      <div class="f-brand">
        <a href="{{ route('home') }}" class="jss-logo" aria-label="Trevanta International" style="margin-bottom: 1.25rem;">
          <img src="{{ asset('images/logo-white.png') }}" alt="Trevanta International" class="logo-img footer-logo">
        </a>
        <p class="f-about">
          A globally recognized Clinical Research Organization delivering multi-national trial management, high-volume patient recruitment, and comprehensive pharmacovigilance across international regulatory authorities.
        </p>
        <p class="f-contact-info">
          <strong>Corporate HQ:</strong> 4492 Sainte-Catherine St W, Westmount, QC H3Z 1R7, Canada<br>
          <strong>Email:</strong> <a href="mailto:info@trevanta.com">info@trevanta.com</a>
        </p>
      </div>

      <div class="f-links-col">
        <h4>Services</h4>
        <ul>
          <li><a href="{{ route('services') }}">Clinical Trial Operations</a></li>
          <li><a href="{{ route('services') }}">Pharmacovigilance &amp; Safety</a></li>
          <li><a href="{{ route('services') }}">Regulatory Submissions</a></li>
          <li><a href="{{ route('services') }}">Medical Writing &amp; CSR</a></li>
          <li><a href="{{ route('services') }}">Biostatistics &amp; Data Science</a></li>
          <li><a href="{{ route('services') }}">Medical Devices &amp; CER</a></li>
        </ul>
      </div>

      <div class="f-links-col">
        <h4>Regional Offices</h4>
        <ul>
          <li><a href="{{ route('global') }}">Montreal, Canada (HQ)</a></li>
          <li><a href="{{ route('global') }}">Boston &amp; California, USA</a></li>
          <li><a href="{{ route('global') }}">London, United Kingdom</a></li>
          <li><a href="{{ route('global') }}">Mumbai &amp; Faridabad, India</a></li>
          <li><a href="{{ route('global') }}">Bogotá, Colombia</a></li>
          <li><a href="{{ route('global') }}">Warsaw, Poland</a></li>
        </ul>
      </div>

      <div class="f-links-col">
        <h4>Quick Access</h4>
        <ul>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('about') }}">About Us</a></li>
          <li><a href="{{ route('services') }}">Services</a></li>
          <li><a href="{{ route('global') }}">Global Presence</a></li>
          <li><a href="{{ route('blog') }}">Insights &amp; Blog</a></li>
          <li><a href="{{ route('contact') }}">Contact Us</a></li>
        </ul>
      </div>
    </div>

    <div class="footer-legal">
      <div class="site-container legal-flex">
        <p>&copy; {{ date('Y') }} Trevanta International Inc. All rights reserved. Compliant with 21 CFR Part 11, ICH-GCP, and GDPR.</p>
        <div class="legal-menu">
          <a href="#">Privacy Statement</a>
          <a href="#">Terms of Use</a>
          <a href="#">GCP Statement</a>
          <a href="#">Whistleblower Notice</a>
          <a href="{{ route('admin.login') }}"><i class="fas fa-lock" style="font-size: 0.75rem;"></i> Admin Portal</a>
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
            <label>Trial Phase *</label>
            <select name="phase" required>
              <option value="Phase I (FIH / PK-PD)">Phase I (FIH / PK-PD)</option>
              <option value="Phase II (Proof-of-Concept)" selected>Phase II (Proof-of-Concept)</option>
              <option value="Phase III (Pivotal Global)">Phase III (Pivotal Global)</option>
              <option value="Phase IV / RWE / PASS">Phase IV / RWE / PASS</option>
            </select>
          </div>
          <div class="j-field">
            <label>Therapeutic Focus *</label>
            <select name="therapeutic_focus" required>
              <option value="Oncology">Oncology</option>
              <option value="Immunology">Immunology</option>
              <option value="Neurology">Neurology</option>
              <option value="Rare Disease">Rare Disease</option>
              <option value="Cardiovascular">Cardiovascular</option>
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
        <span style="font-size: 0.85rem; color: var(--text-muted);">Published by AstraClinical Research Scientific Intelligence Unit</span>
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

  <script src="{{ asset('script.js') }}"></script>
  @stack('scripts')
</body>
</html>

