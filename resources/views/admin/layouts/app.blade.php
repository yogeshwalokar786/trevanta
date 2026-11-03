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
      background-color: #28a9a1 !important;
      color: #ffffff !important;
      box-shadow: 0 4px 10px rgba(40, 169, 161, 0.3) !important;
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
        <a href="{{ route('admin.dashboard') }}" class="nav-link font-weight-bold">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" target="_blank" class="nav-link text-primary"><i class="fas fa-external-link-alt mr-1"></i> View Website</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto align-items-center">
      <li class="nav-item mr-3 text-muted text-sm d-none d-md-inline">
        <i class="far fa-user-circle mr-1"></i> {{ Auth::user()->name ?? 'Administrator' }}
      </li>
      <li class="nav-item">
        <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
          @csrf
          <button type="submit" class="btn btn-outline-danger btn-sm">
            <i class="fas fa-sign-out-alt mr-1"></i> Sign Out
          </button>
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container (Light Theme) -->
  <aside class="main-sidebar sidebar-light-primary elevation-1">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link border-bottom px-3 py-3 d-flex align-items-center">
      <img src="{{ asset('images/logo.png') }}" alt="Trevanta International" style="height: 38px; width: auto; max-width: 100%; object-fit: contain;">
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
          <span class="d-block font-weight-bold text-dark">{{ Auth::user()->name ?? 'Administrator' }}</span>
          <small class="text-muted">{{ Auth::user()->email ?? 'admin@trevanta.com' }}</small>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('home') }}" target="_blank" class="nav-link">
              <i class="nav-icon fas fa-globe"></i>
              <p>View Website</p>
            </a>
          </li>

          <li class="nav-item mt-3">
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
      <strong>AdminLTE 3 Light</strong>
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
