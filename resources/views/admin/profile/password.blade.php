@extends('admin.layouts.app')

@section('title', 'Change Admin Password')
@section('page-title', 'Account Security & Password')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
  <li class="breadcrumb-item active">Password Update</li>
@endsection

@section('content')
<div class="row">

  <!-- ================================================================= -->
  <!-- 1. CHANGE PASSWORD FORM -->
  <!-- ================================================================= -->
  <div class="col-lg-7 mb-4">
    <div class="card border-0 shadow-sm" style="border-radius: 12px;">
      <div class="card-header py-3 px-4 bg-white border-bottom d-flex align-items-center justify-content-between">
        <h3 class="card-title text-sm mb-0 font-weight-bold text-dark">
          <i class="fas fa-key mr-2 text-primary"></i> Change Administrator Password
        </h3>
        <span class="badge badge-light border text-muted px-2 py-1 text-xs">
          <i class="fas fa-shield-alt text-success mr-1"></i> SSL Encrypted
        </span>
      </div>

      <div class="card-body p-4">
        @if($errors->has('current_password') || $errors->has('password'))
          <div class="alert alert-danger alert-dismissible fade show text-xs mb-4" role="alert" style="border-radius: 8px;">
            <i class="fas fa-exclamation-triangle mr-1"></i>
            <strong>Password Update Failed:</strong>
            <ul class="mb-0 mt-1 pl-3">
              @foreach($errors->get('current_password') as $err)
                <li>{{ $err }}</li>
              @endforeach
              @foreach($errors->get('password') as $err)
                <li>{{ $err }}</li>
              @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        <form action="{{ route('admin.password.update') }}" method="POST">
          @csrf
          @method('PUT')

          <!-- Current Password -->
          <div class="form-group mb-3">
            <label for="current_password" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
              Current Password <span class="text-danger">*</span>
            </label>
            <div class="input-group">
              <input type="password" name="current_password" id="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Enter current admin password" required autocomplete="current-password">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('current_password', 'icon_current_pw')">
                  <i class="fas fa-eye text-muted" id="icon_current_pw"></i>
                </button>
              </div>
            </div>
            <small class="text-muted text-xs">Required to verify your authorization before saving a new password.</small>
          </div>

          <hr class="my-3">

          <!-- New Password -->
          <div class="form-group mb-3">
            <label for="password" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
              New Password <span class="text-danger">*</span>
            </label>
            <div class="input-group">
              <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="At least 8 characters" required autocomplete="new-password">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('password', 'icon_new_pw')">
                  <i class="fas fa-eye text-muted" id="icon_new_pw"></i>
                </button>
              </div>
            </div>
            <small class="text-muted text-xs">Must contain at least 8 characters. Mix upper/lowercase letters, numbers, and symbols.</small>
          </div>

          <!-- Confirm New Password -->
          <div class="form-group mb-4">
            <label for="password_confirmation" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
              Confirm New Password <span class="text-danger">*</span>
            </label>
            <div class="input-group">
              <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Re-type new password" required autocomplete="new-password">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('password_confirmation', 'icon_confirm_pw')">
                  <i class="fas fa-eye text-muted" id="icon_confirm_pw"></i>
                </button>
              </div>
            </div>
            <small class="text-muted text-xs">Confirm your new password to prevent any typing mistakes.</small>
          </div>

          <div class="p-3 mb-4 rounded bg-light border" style="border-radius: 8px;">
            <div class="d-flex align-items-center mb-1 text-xs font-weight-bold text-dark">
              <i class="fas fa-info-circle text-primary mr-2"></i> Security Best Practices
            </div>
            <ul class="text-muted text-xs mb-0 pl-3">
              <li>Use a unique password that is not reused across other accounts.</li>
              <li>Avoid using common company names, dictionary words, or personal birthdays.</li>
              <li>After updating, you will remain signed in on this browser session.</li>
            </ul>
          </div>

          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary px-4 py-2 font-weight-bold">
              <i class="fas fa-lock mr-2"></i> Update Password
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- ================================================================= -->
  <!-- 2. ADMIN ACCOUNT DETAILS -->
  <!-- ================================================================= -->
  <div class="col-lg-5 mb-4">
    <div class="card border-0 shadow-sm mb-4" style="border-radius: 12px;">
      <div class="card-header py-3 px-4 bg-white border-bottom">
        <h3 class="card-title text-sm mb-0 font-weight-bold text-dark">
          <i class="fas fa-user-circle mr-2 text-primary"></i> Administrator Account
        </h3>
      </div>
      <div class="card-body p-4">
        
        <div class="d-flex align-items-center mb-4 p-3 rounded" style="background-color: #f0fdfa; border: 1px solid #ccfbf1;">
          <div class="rounded-circle d-flex align-items-center justify-content-center font-weight-bold mr-3" style="width: 48px; height: 48px; background-color: var(--admin-primary); color: #ffffff; font-size: 1.25rem;">
            {{ strtoupper(substr($user->name ?? 'A', 0, 1)) }}
          </div>
          <div style="line-height: 1.3;">
            <h5 class="mb-0 font-weight-bold text-dark text-sm">{{ $user->name ?? 'Executive Director' }}</h5>
            <small class="text-muted text-xs d-block">{{ $user->email ?? 'admin@trevanta.com' }}</small>
            <span class="badge badge-success text-xs font-weight-normal px-2 py-0 mt-1" style="font-size: 10px;">Primary Admin</span>
          </div>
        </div>

        <form action="{{ route('admin.profile.update') }}" method="POST">
          @csrf
          @method('PUT')

          <div class="form-group mb-3">
            <label for="name" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Display Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
            @error('name')
              <div class="invalid-feedback text-xs">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group mb-4">
            <label for="email" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Login Email Address</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
            @error('email')
              <div class="invalid-feedback text-xs">{{ $message }}</div>
            @enderror
            <small class="text-muted text-xs">Used as the administrator login identifier on the sign-in page.</small>
          </div>

          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-white px-3 font-weight-bold">
              <i class="fas fa-save mr-1 text-primary"></i> Save Account Details
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Quick Help Card -->
    <div class="card border-0 shadow-sm" style="border-radius: 12px; background: #fafafa;">
      <div class="card-body p-4 text-xs text-muted">
        <h6 class="font-weight-bold text-dark mb-2 text-xs text-uppercase">
          <i class="fas fa-question-circle mr-1 text-primary"></i> Need Access Assistance?
        </h6>
        <p class="mb-2">
          If you ever lose access to this administrator account, credentials can also be reset directly via the server database CLI or via cPanel phpMyAdmin in the <code>users</code> table.
        </p>
        <p class="mb-0">
          Last login verified via session authentication.
        </p>
      </div>
    </div>
  </div>

</div>

@push('scripts')
<script>
  function togglePasswordVisibility(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    if (!input || !icon) return;

    if (input.type === 'password') {
      input.type = 'text';
      icon.classList.remove('fa-eye');
      icon.classList.add('fa-eye-slash');
      icon.classList.add('text-primary');
    } else {
      input.type = 'password';
      icon.classList.remove('fa-eye-slash');
      icon.classList.remove('text-primary');
      icon.classList.add('fa-eye');
    }
  }
</script>
@endpush
@endsection
