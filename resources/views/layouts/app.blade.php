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

    <!-- Quick Actions in Drawer: Language Switcher -->
    <div class="drawer-lang-row">
      <span class="drawer-lang-lbl">Language</span>
      <div class="drawer-lang-pills">
        <button class="lang-btn active">EN</button>
        <button class="lang-btn" onclick="alert('Version française disponible sur demande.')">FR</button>
      </div>
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
        <p>{{ setting('footer_copyright', '© ' . date('Y') . ' Trevanta International Inc. All rights reserved. Compliant with 21 CFR Part 11, ICH-GCP, and GDPR.') }}</p>
        <div class="legal-menu">
          <a href="{{ route('policy.show', 'privacy-statement') }}">Privacy Statement</a>
          <a href="{{ route('policy.show', 'terms-of-use') }}">Terms of Use</a>
          <a href="{{ route('policy.show', 'cookie-policy') }}">Cookie Policy</a>
          <a href="{{ route('policy.show', 'gcp-statement') }}">GCP Statement</a>
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

