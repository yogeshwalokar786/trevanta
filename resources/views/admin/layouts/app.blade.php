<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Admin Dashboard') | Trevanta Admin</title>

  <!-- Google Font: Source Sans Pro & Plus Jakarta Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700&display=swap" rel="stylesheet">
  
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
  <!-- Theme style (AdminLTE v3 Light Version) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

  <style>
    body {
      font-family: 'Plus Jakarta Sans', 'Source Sans Pro', sans-serif;
    }
    .brand-link {
      font-weight: 700 !important;
      letter-spacing: -0.02em;
    }
    .brand-link .logo-primary {
      color: #0d233a;
    }
    .brand-link .logo-accent {
      color: #f26224;
    }
    .main-sidebar.sidebar-light-primary {
      background-color: #ffffff !important;
      border-right: 1px solid #e9ecef !important;
    }
    .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
      background-color: #f26224 !important;
      color: #ffffff !important;
      box-shadow: 0 4px 10px rgba(242, 98, 36, 0.3) !important;
    }
    .nav-sidebar .nav-link {
      border-radius: 8px;
      margin-bottom: 4px;
      font-weight: 500;
    }
    .content-wrapper {
      background-color: #f8fafc !important;
    }
    .card {
      border-radius: 10px !important;
      border: 1px solid #edf2f7;
      box-shadow: 0 1px 3px rgba(0,0,0,0.04);
    }
    .info-box {
      border-radius: 10px !important;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      border: 1px solid #edf2f7;
    }
  </style>

  @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar (Light Theme) -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom shadow-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" target="_blank" class="nav-link text-primary"><i class="fas fa-external-link-alt mr-1"></i> View Website</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Admin User Dropdown Menu -->
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <i class="far fa-user-circle fa-lg mr-1 text-muted"></i>
          <span class="d-none d-md-inline font-weight-bold">{{ Auth::user()->name ?? 'Administrator' }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right shadow-sm border-0">
          <!-- User image -->
          <div class="dropdown-header text-center bg-light py-3">
            <i class="fas fa-user-shield fa-2x text-primary mb-2"></i>
            <h6 class="mb-0 font-weight-bold">{{ Auth::user()->name ?? 'Admin' }}</h6>
            <small class="text-muted">{{ Auth::user()->email ?? 'admin@trevanta.com' }}</small>
          </div>
          <div class="dropdown-divider"></div>
          <a href="{{ route('admin.inquiries') }}" class="dropdown-item">
            <i class="fas fa-clipboard-list mr-2 text-info"></i> All Inquiries &amp; RFPs
          </a>
          <a href="{{ route('home') }}" target="_blank" class="dropdown-item">
            <i class="fas fa-globe mr-2 text-success"></i> Public Live Website
          </a>
          <div class="dropdown-divider"></div>
          <form action="{{ route('admin.logout') }}" method="POST" class="p-2">
            @csrf
            <button type="submit" class="btn btn-danger btn-block btn-sm">
              <i class="fas fa-sign-out-alt mr-1"></i> Sign Out
            </button>
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container (Light Theme) -->
  <aside class="main-sidebar sidebar-light-primary elevation-1">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link border-bottom px-3 py-3 d-flex align-items-center">
      <div class="brand-image img-circle elevation-1 d-flex align-items-center justify-content-center bg-primary text-white" style="width: 33px; height: 33px; border-radius: 50%;">
        <i class="fas fa-dna fa-sm"></i>
      </div>
      <span class="brand-text font-weight-bold ml-2">
        <span class="logo-primary">Astra</span><span class="logo-accent">Clinical</span>
        <span class="badge badge-light border ml-1 text-xs">Admin</span>
      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center px-2">
        <div class="image">
          <div class="bg-light border text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
            <i class="fas fa-user"></i>
          </div>
        </div>
        <div class="info">
          <a href="{{ route('admin.dashboard') }}" class="d-block font-weight-bold text-dark">{{ Auth::user()->name ?? 'Administrator' }}</a>
          <span class="text-xs text-success"><i class="fas fa-circle text-xs mr-1"></i> Online (Active)</span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-header text-uppercase text-xs font-weight-bold text-muted">Core Management</li>
          
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Executive Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.inquiries') }}" class="nav-link {{ request()->routeIs('admin.inquiries') && !request()->has('type') ? 'active' : '' }}">
              <i class="nav-icon fas fa-inbox"></i>
              <p>All Inquiries</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.inquiries', ['type' => 'rfp']) }}" class="nav-link {{ request()->get('type') === 'rfp' ? 'active' : '' }}">
              <i class="nav-icon fas fa-file-signature text-warning"></i>
              <p>Study RFPs &amp; Trials</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.inquiries', ['type' => 'contact']) }}" class="nav-link {{ request()->get('type') === 'contact' ? 'active' : '' }}">
              <i class="nav-icon fas fa-comments text-info"></i>
              <p>General Inquiries</p>
            </a>
          </li>

          <li class="nav-header text-uppercase text-xs font-weight-bold text-muted mt-3">Live Website</li>

          <li class="nav-item">
            <a href="{{ route('home') }}" target="_blank" class="nav-link">
              <i class="nav-icon fas fa-home text-muted"></i>
              <p>Home Page</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('services') }}" target="_blank" class="nav-link">
              <i class="nav-icon fas fa-stethoscope text-muted"></i>
              <p>Clinical Services</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('global') }}" target="_blank" class="nav-link">
              <i class="nav-icon fas fa-globe-americas text-muted"></i>
              <p>Global Hubs</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('blog') }}" target="_blank" class="nav-link">
              <i class="nav-icon fas fa-newspaper text-muted"></i>
              <p>Scientific Blog</p>
            </a>
          </li>

          <li class="nav-header text-uppercase text-xs font-weight-bold text-muted mt-3">Account</li>

          <li class="nav-item">
            <form action="{{ route('admin.logout') }}" method="POST" id="sidebar-logout-form">
              @csrf
              <a href="#" onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();" class="nav-link text-danger">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Sign Out</p>
              </a>
            </form>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Flash Messages -->
    @if(session('success'))
      <div class="pt-3 px-3">
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
          <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    @endif

    @if(session('error'))
      <div class="pt-3 px-3">
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
          <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    @endif

    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer bg-white border-top text-sm">
    <div class="float-right d-none d-sm-inline">
      AstraClinical Clinical Trial Operations &bull; <strong>AdminLTE 3 Light</strong>
    </div>
    <strong>&copy; {{ date('Y') }} <a href="{{ route('home') }}" class="text-primary font-weight-bold">AstraClinical Research</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

@stack('scripts')
</body>
</html>
