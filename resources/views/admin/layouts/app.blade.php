<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Admin Dashboard') | Trevanta International</title>

  <!-- Google Font: Plus Jakarta Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
  <!-- Theme style (AdminLTE v3 Base) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

  <style>
    :root {
      --admin-primary: #28a9a1;
      --admin-primary-dark: #1f8a84;
      --admin-primary-subtle: #f0fdfa;
      --admin-navy: #0d233a;
      --admin-text-dark: #0f172a;
      --admin-text-muted: #64748b;
      --admin-border: #e2e8f0;
      --admin-bg-light: #f8fafc;
      --admin-card-bg: #ffffff;
      --admin-radius: 12px;
      --admin-radius-lg: 16px;
    }

    body {
      font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif !important;
      background-color: var(--admin-bg-light) !important;
      color: var(--admin-text-dark);
      font-size: 0.925rem;
      letter-spacing: -0.01em;
    }

    /* Modern Simple Navbar */
    .main-header.navbar {
      background-color: #ffffff !important;
      border-bottom: 1px solid var(--admin-border) !important;
      box-shadow: 0 1px 2px rgba(0,0,0,0.02) !important;
      padding: 0.75rem 1.75rem;
      min-height: 64px;
    }

    .main-header .nav-link {
      color: var(--admin-text-muted) !important;
      font-weight: 500;
      padding: 0.5rem 0.75rem;
      border-radius: 8px;
      transition: all 0.15s ease;
    }

    .main-header .nav-link:hover {
      color: var(--admin-navy) !important;
      background-color: var(--admin-bg-light);
    }

    /* View Site Pill Button */
    .btn-view-site {
      background-color: var(--admin-primary-subtle);
      color: var(--admin-primary) !important;
      border: 1px solid #ccfbf1;
      border-radius: 20px;
      font-size: 0.825rem;
      font-weight: 600;
      padding: 0.4rem 0.95rem;
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      transition: all 0.2s ease;
      text-decoration: none !important;
    }
    .btn-view-site:hover {
      background-color: var(--admin-primary);
      color: #ffffff !important;
      border-color: var(--admin-primary);
    }

    /* Modern Minimalist Sidebar */
    .main-sidebar {
      background-color: #ffffff !important;
      border-right: 1px solid var(--admin-border) !important;
      box-shadow: none !important;
      width: 255px !important;
    }

    .sidebar-brand {
      padding: 1.25rem 1.5rem;
      border-bottom: 1px solid var(--admin-border);
      display: flex;
      align-items: center;
      text-decoration: none !important;
    }

    .sidebar-nav-heading {
      font-size: 0.7rem;
      font-weight: 700;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: #94a3b8;
      padding: 1.25rem 1rem 0.4rem;
    }

    .nav-sidebar .nav-item {
      margin-bottom: 3px;
    }

    .nav-sidebar .nav-link {
      color: #475569 !important;
      font-weight: 500;
      font-size: 0.9rem;
      border-radius: 10px;
      padding: 0.65rem 0.95rem;
      display: flex;
      align-items: center;
      transition: all 0.15s ease;
    }

    .nav-sidebar .nav-link .nav-icon {
      font-size: 1rem;
      width: 24px;
      margin-right: 0.75rem;
      color: #64748b;
      transition: color 0.15s ease;
    }

    .nav-sidebar .nav-link:hover {
      background-color: #f1f5f9 !important;
      color: var(--admin-navy) !important;
    }

    .nav-sidebar .nav-link:hover .nav-icon {
      color: var(--admin-primary);
    }

    .nav-sidebar .nav-link.active {
      background-color: var(--admin-primary) !important;
      color: #ffffff !important;
      font-weight: 600;
      box-shadow: 0 4px 12px rgba(40, 169, 161, 0.28) !important;
    }

    .nav-sidebar .nav-link.active .nav-icon {
      color: #ffffff !important;
    }

    /* Content Area */
    .content-wrapper {
      background-color: var(--admin-bg-light) !important;
      padding-bottom: 3rem;
    }

    .content-header {
      padding: 1.75rem 1.75rem 1rem;
    }

    .content-header h1 {
      font-size: 1.65rem;
      font-weight: 800;
      color: var(--admin-navy);
      letter-spacing: -0.025em;
    }

    /* Modern Cards */
    .card {
      background-color: var(--admin-card-bg) !important;
      border: 1px solid var(--admin-border) !important;
      border-radius: var(--admin-radius) !important;
      box-shadow: 0 1px 3px rgba(0,0,0,0.03) !important;
      overflow: hidden;
      margin-bottom: 1.75rem;
    }

    .card-header {
      background-color: transparent !important;
      border-bottom: 1px solid var(--admin-border) !important;
      padding: 1.15rem 1.5rem !important;
    }

    .card-title {
      font-size: 1.05rem !important;
      font-weight: 700 !important;
      color: var(--admin-navy) !important;
      letter-spacing: -0.01em;
    }

    /* Modern Metric Stat Cards */
    .stat-card {
      background: #ffffff;
      border: 1px solid var(--admin-border);
      border-radius: var(--admin-radius);
      padding: 1.35rem 1.5rem;
      box-shadow: 0 1px 3px rgba(0,0,0,0.03);
      position: relative;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .stat-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 16px rgba(0,0,0,0.05);
    }

    .stat-card-top {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 0.75rem;
    }

    .stat-card-title {
      font-size: 0.8rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      color: var(--admin-text-muted);
    }

    .stat-card-icon {
      width: 42px;
      height: 42px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.15rem;
    }

    .icon-teal { background-color: #f0fdfa; color: #0d9488; }
    .icon-blue { background-color: #eff6ff; color: #2563eb; }
    .icon-amber { background-color: #fffbeb; color: #d97706; }
    .icon-purple { background-color: #f5f3ff; color: #7c3aed; }

    .stat-card-number {
      font-size: 2.1rem;
      font-weight: 800;
      color: var(--admin-navy);
      line-height: 1.1;
      margin-bottom: 0.35rem;
    }

    .stat-card-desc {
      font-size: 0.8rem;
      color: var(--admin-text-muted);
      margin: 0;
    }

    /* Modern Tables */
    .table thead th {
      background-color: #f8fafc !important;
      color: #64748b !important;
      font-size: 0.725rem !important;
      font-weight: 700 !important;
      text-transform: uppercase !important;
      letter-spacing: 0.05em !important;
      border-top: none !important;
      border-bottom: 1px solid var(--admin-border) !important;
      padding: 0.85rem 1.25rem !important;
      white-space: nowrap;
    }

    .table tbody td {
      padding: 0.95rem 1.25rem !important;
      vertical-align: middle !important;
      border-top: 1px solid #f1f5f9 !important;
      color: #334155;
    }

    .table-hover tbody tr:hover {
      background-color: #f8fafc !important;
    }

    /* Soft Status Pill Badges */
    .pill-badge {
      font-size: 0.75rem;
      font-weight: 600;
      padding: 0.35rem 0.75rem;
      border-radius: 20px;
      display: inline-flex;
      align-items: center;
      gap: 0.35rem;
      line-height: 1;
    }

    .pill-rfp { background-color: #f0fdfa; color: #0f766e; border: 1px solid #ccfbf1; }
    .pill-contact { background-color: #eff6ff; color: #1d4ed8; border: 1px solid #dbeafe; }
    .pill-pending { background-color: #fffbeb; color: #b45309; border: 1px solid #fef3c7; }
    .pill-review { background-color: #f0f9ff; color: #0284c7; border: 1px solid #e0f2fe; }
    .pill-contacted { background-color: #f0fdf4; color: #15803d; border: 1px solid #dcfce7; }
    .pill-closed { background-color: #f1f5f9; color: #475569; border: 1px solid #e2e8f0; }

    /* Modern Form Controls */
    .form-control {
      border: 1px solid var(--admin-border) !important;
      border-radius: 8px !important;
      font-size: 0.925rem;
      padding: 0.55rem 0.85rem;
      color: #1e293b;
      transition: border-color 0.15s ease, box-shadow 0.15s ease;
    }

    .form-control:focus {
      border-color: var(--admin-primary) !important;
      box-shadow: 0 0 0 3px rgba(40, 169, 161, 0.15) !important;
    }

    /* Modern Buttons */
    .btn {
      font-weight: 600;
      border-radius: 8px;
      padding: 0.5rem 1rem;
      font-size: 0.875rem;
      transition: all 0.15s ease;
    }

    .btn-primary {
      background-color: var(--admin-primary) !important;
      border-color: var(--admin-primary) !important;
      color: #ffffff !important;
    }

    .btn-primary:hover {
      background-color: var(--admin-primary-dark) !important;
      border-color: var(--admin-primary-dark) !important;
      box-shadow: 0 4px 10px rgba(40, 169, 161, 0.25);
    }

    .btn-white {
      background-color: #ffffff;
      border: 1px solid var(--admin-border);
      color: #334155;
    }

    .btn-white:hover {
      background-color: #f8fafc;
      border-color: #cbd5e1;
      color: var(--admin-navy);
    }

    /* Sidebar Footer Profile */
    .sidebar-user-footer {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 1rem 1.25rem;
      border-top: 1px solid var(--admin-border);
      background-color: #ffffff;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
  </style>

  @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Clean Top Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left: Sidebar toggle & breadcrumbs -->
    <ul class="navbar-nav align-items-center">
      <li class="nav-item">
        <a class="nav-link px-2" data-widget="pushmenu" href="#" role="button" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block ml-2">
        <span class="text-sm font-weight-bold text-dark">
          @yield('page_heading', 'Dashboard Overview')
        </span>
      </li>
    </ul>

    <!-- Right: View Site & Admin Profile -->
    <ul class="navbar-nav ml-auto align-items-center">
      <li class="nav-item mr-3">
        <a href="{{ route('home') }}" target="_blank" class="btn-view-site">
          <i class="fas fa-external-link-alt"></i> View Website
        </a>
      </li>
      <li class="nav-item d-none d-md-flex align-items-center mr-3">
        <div class="d-flex align-items-center">
          <div class="bg-light border text-primary rounded-circle d-flex align-items-center justify-content-center mr-2 font-weight-bold text-xs" style="width: 32px; height: 32px; background-color: #f0fdfa !important; color: #0d9488 !important;">
            {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
          </div>
          <div>
            <span class="font-weight-bold text-sm text-dark d-block leading-tight">{{ Auth::user()->name ?? 'Administrator' }}</span>
            <small class="text-muted text-xs">Admin</small>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
          @csrf
          <button type="submit" class="btn btn-outline-danger btn-sm px-3" title="Sign out of administrative portal">
            <i class="fas fa-sign-out-alt mr-1"></i> Sign Out
          </button>
        </form>
      </li>
    </ul>
  </nav>

  <!-- Clean Modern Sidebar -->
  <aside class="main-sidebar">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
      <img src="{{ asset('images/logo.png') }}" alt="Trevanta International" style="height: 38px; width: auto; max-width: 100%; object-fit: contain;">
    </a>

    <!-- Sidebar Navigation -->
    <div class="sidebar p-0">
      <nav class="mt-2 px-3">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="sidebar-nav-heading">Main Overview</li>

          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="sidebar-nav-heading">Clinical Management</li>

          <li class="nav-item">
            <a href="{{ route('admin.blogs.index') }}" class="nav-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Blogs &amp; Insights</p>
            </a>
          </li>

          <li class="sidebar-nav-heading">Quick Links</li>

          <li class="nav-item">
            <a href="{{ route('home') }}" target="_blank" class="nav-link">
              <i class="nav-icon fas fa-globe"></i>
              <p>Public Website</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('blog') }}" target="_blank" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>Live Blog Page</p>
            </a>
          </li>

        </ul>
      </nav>
    </div>

    <!-- Sidebar Bottom User Footnote -->
    <div class="sidebar-user-footer">
      <div class="d-flex align-items-center">
        <div class="rounded-circle mr-2 d-flex align-items-center justify-content-center text-xs font-weight-bold" style="width: 32px; height: 32px; background: #f0fdfa; color: #0d9488; border: 1px solid #ccfbf1;">
          {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
        </div>
        <div style="line-height: 1.2;">
          <small class="font-weight-bold text-dark d-block text-truncate" style="max-width: 120px;">{{ Auth::user()->name ?? 'Admin' }}</small>
          <small class="text-muted" style="font-size: 11px;">Signed In</small>
        </div>
      </div>
      <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-link text-danger p-0" title="Sign Out">
          <i class="fas fa-power-off"></i>
        </button>
      </form>
    </div>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Flash Messages -->
    @if(session('success'))
      <div class="pt-3 px-4">
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert" style="background-color: #ecfdf5; color: #065f46; border-left: 4px solid #10b981 !important;">
          <div class="d-flex align-items-center">
            <i class="fas fa-check-circle mr-2 font-weight-bold text-success"></i>
            <div>{{ session('success') }}</div>
          </div>
          <button type="button" class="close text-success" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    @endif

    @if(session('error'))
      <div class="pt-3 px-4">
        <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0" role="alert" style="background-color: #fef2f2; color: #991b1b; border-left: 4px solid #ef4444 !important;">
          <div class="d-flex align-items-center">
            <i class="fas fa-exclamation-circle mr-2 font-weight-bold text-danger"></i>
            <div>{{ session('error') }}</div>
          </div>
          <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    @endif

    @yield('content')
  </div>

  <!-- Minimalist Clean Footer -->
  <footer class="main-footer bg-white border-top text-xs text-muted py-3 px-4 d-flex justify-content-between align-items-center">
    <div>
      &copy; {{ date('Y') }} <strong class="text-dark">Trevanta International</strong>. Clinical Trial Operational Portal.
    </div>
    <div class="text-muted">
      Admin Console &bull; Confidential
    </div>
  </footer>

</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

@stack('scripts')
</body>
</html>
