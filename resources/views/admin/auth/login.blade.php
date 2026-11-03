<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login | AstraClinical Research</title>

  <!-- Google Font: Source Sans Pro & Plus Jakarta Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
  <!-- Theme style (AdminLTE v3 Light Version) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

  <style>
    body {
      font-family: 'Plus Jakarta Sans', 'Source Sans Pro', sans-serif;
      background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    }
    .login-box {
      width: 420px;
    }
    .card {
      border: 1px solid #e2e8f0;
      border-radius: 14px;
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.08), 0 8px 10px -6px rgba(0, 0, 0, 0.04);
    }
    .card-header {
      background: #ffffff;
      border-bottom: 1px solid #f1f5f9;
      border-top-left-radius: 14px !important;
      border-top-right-radius: 14px !important;
    }
    .logo-primary {
      color: #0d233a;
      font-weight: 800;
    }
    .logo-accent {
      color: #f26224;
      font-weight: 800;
    }
    .btn-login {
      background-color: #28a9a1;
      border-color: #28a9a1;
      color: #ffffff;
      font-weight: 600;
      border-radius: 8px;
      padding: 0.65rem 1rem;
      transition: all 0.2s ease;
    }
    .btn-login:hover {
      background-color: #1f8c85;
      border-color: #1f8c85;
      color: #ffffff;
      box-shadow: 0 4px 12px rgba(40, 169, 161, 0.35);
    }
    .form-control {
      border-radius: 8px 0 0 8px;
      padding: 0.65rem 1rem;
      border-color: #cbd5e1;
    }
    .input-group-text {
      border-radius: 0 8px 8px 0;
      border-color: #cbd5e1;
      background-color: #f8fafc;
      color: #64748b;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  
  <div class="card card-outline card-white">
    <div class="card-header text-center py-4">
      <a href="{{ route('home') }}" class="text-decoration-none d-block mb-2">
        <img src="{{ asset('images/logo.png') }}" alt="Trevanta International" style="height: 48px; width: auto; max-width: 250px;">
      </a>
      <span class="badge badge-light border text-muted px-2 py-1">Secure Management Portal</span>
    </div>
    
    <div class="card-body login-card-body px-4 py-4">
      <p class="login-box-msg text-muted pb-3 mb-2 font-weight-normal">Sign in to manage clinical trials &amp; study RFPs</p>

      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show text-sm mb-3">
          {{ session('success') }}
        </div>
      @endif

      @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show text-sm mb-3">
          <ul class="mb-0 pl-3">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Admin Email" value="{{ old('email', 'admin@trevanta.com') }}" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row align-items-center mb-3">
          <div class="col-8">
            <div class="icheck-primary d-flex align-items-center">
              <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="remember" class="ml-2 mb-0 font-weight-normal text-muted text-sm">
                Remember Me
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-login btn-block">Sign In <i class="fas fa-arrow-right ml-1"></i></button>
          </div>
        </div>
      </form>

      <div class="mt-4 pt-3 border-top text-center text-sm text-muted">
        <a href="{{ route('home') }}" class="text-secondary">
          <i class="fas fa-arrow-left mr-1"></i> Return to Public Website
        </a>
      </div>

    </div>
    <!-- /.login-card-body -->
  </div>
  
  <div class="text-center mt-3 text-muted text-xs">
    &copy; {{ date('Y') }} AstraClinical Research Global Inc. All rights reserved.
  </div>

</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>

