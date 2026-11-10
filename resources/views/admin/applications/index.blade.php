@extends('admin.layouts.app')

@section('title', 'Candidate Job Applications')
@section('page_heading', 'Job Applications')

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid px-3">
    <div class="d-flex justify-content-between align-items-center flex-wrap">
      <div>
        <h1 class="m-0 font-weight-bold">Candidate Applications</h1>
        <p class="text-muted text-sm mb-0">Review submitted resumes, applicant credentials, and candidate hiring statuses.</p>
      </div>
      <div class="mt-2 mt-sm-0">
        <a href="{{ route('admin.jobs.index') }}" class="btn btn-light shadow-sm">
          <i class="fas fa-briefcase mr-1"></i> Manage Job Openings
        </a>
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

    @if (session('error'))
      <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 mb-4" style="border-radius: 12px;">
        <i class="fas fa-exclamation-triangle mr-2"></i> {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>
    @endif

    <!-- Stat Summary Cards Row -->
    <div class="row mb-4">
      <div class="col-6 col-md-3 mb-3 mb-md-0">
        <a href="{{ route('admin.applications.index') }}" class="text-decoration-none">
          <div class="card stat-card shadow-sm border-0 h-100" style="border-radius: 12px;">
            <div class="card-body p-3 d-flex align-items-center">
              <div class="stat-card-icon icon-blue mr-3">
                <i class="fas fa-users"></i>
              </div>
              <div>
                <div class="stat-card-number">{{ $statusCounts['all'] ?? 0 }}</div>
                <p class="stat-card-desc">Total Applications</p>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-6 col-md-3 mb-3 mb-md-0">
        <a href="{{ route('admin.applications.index', ['status' => 'new']) }}" class="text-decoration-none">
          <div class="card stat-card shadow-sm border-0 h-100" style="border-radius: 12px;">
            <div class="card-body p-3 d-flex align-items-center">
              <div class="stat-card-icon icon-amber mr-3">
                <i class="fas fa-inbox"></i>
              </div>
              <div>
                <div class="stat-card-number text-warning">{{ $statusCounts['new'] ?? 0 }}</div>
                <p class="stat-card-desc">New / Unreviewed</p>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-6 col-md-3 mb-3 mb-md-0">
        <a href="{{ route('admin.applications.index', ['status' => 'shortlisted']) }}" class="text-decoration-none">
          <div class="card stat-card shadow-sm border-0 h-100" style="border-radius: 12px;">
            <div class="card-body p-3 d-flex align-items-center">
              <div class="stat-card-icon icon-teal mr-3">
                <i class="fas fa-user-check"></i>
              </div>
              <div>
                <div class="stat-card-number text-success">{{ $statusCounts['shortlisted'] ?? 0 }}</div>
                <p class="stat-card-desc">Shortlisted</p>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-6 col-md-3 mb-3 mb-md-0">
        <a href="{{ route('admin.applications.index', ['status' => 'reviewing']) }}" class="text-decoration-none">
          <div class="card stat-card shadow-sm border-0 h-100" style="border-radius: 12px;">
            <div class="card-body p-3 d-flex align-items-center">
              <div class="stat-card-icon icon-purple mr-3">
                <i class="fas fa-spinner"></i>
              </div>
              <div>
                <div class="stat-card-number" style="color: #7c3aed;">{{ $statusCounts['reviewing'] ?? 0 }}</div>
                <p class="stat-card-desc">Under Review</p>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>

    <!-- Filter & Search Toolbar Card -->
    <div class="card mb-4 border-0 shadow-sm" style="border-radius: 12px;">
      <div class="card-body py-3">
        <form action="{{ route('admin.applications.index') }}" method="GET" class="row align-items-center">
          <div class="col-md-5 mb-2 mb-md-0">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-white border-right-0"><i class="fas fa-search text-muted"></i></span>
              </div>
              <input type="text" name="search" class="form-control border-left-0" placeholder="Search by candidate name, email, phone, city..." value="{{ request('search') }}">
            </div>
          </div>

          <div class="col-md-3 mb-2 mb-md-0">
            <select name="position" class="form-control" onchange="this.form.submit()">
              <option value="all">All Positions</option>
              @foreach($positions as $pos)
                <option value="{{ $pos }}" {{ request('position') === $pos ? 'selected' : '' }}>{{ $pos }}</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-2 mb-2 mb-md-0">
            <select name="status" class="form-control" onchange="this.form.submit()">
              <option value="all">All Statuses</option>
              <option value="new" {{ request('status') === 'new' ? 'selected' : '' }}>New</option>
              <option value="reviewing" {{ request('status') === 'reviewing' ? 'selected' : '' }}>Under Review</option>
              <option value="shortlisted" {{ request('status') === 'shortlisted' ? 'selected' : '' }}>Shortlisted</option>
              <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
          </div>

          <div class="col-md-2 text-md-right">
            <button type="submit" class="btn btn-primary btn-sm mr-1">
              <i class="fas fa-filter mr-1"></i> Filter
            </button>
            @if(request('search') || (request('position') && request('position') !== 'all') || (request('status') && request('status') !== 'all'))
              <a href="{{ route('admin.applications.index') }}" class="btn btn-light btn-sm">
                <i class="fas fa-times mr-1"></i> Reset
              </a>
            @endif
          </div>
        </form>
      </div>
    </div>

    <!-- Applications Table Card -->
    <div class="card border-0 shadow-sm" style="border-radius: 12px;">
      <div class="card-header bg-white border-bottom py-3 px-4 d-flex justify-content-between align-items-center">
        <div>
          <h3 class="card-title text-sm mb-0 font-weight-bold text-dark">
            <i class="fas fa-file-alt text-primary mr-2"></i> Received Applications
          </h3>
        </div>
        @if(method_exists($applications, 'total'))
          <span class="badge badge-light border text-muted px-3 py-2 font-weight-bold">
            Total: {{ $applications->total() }} Candidates
          </span>
        @endif
      </div>

      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead>
              <tr>
                <th style="width: 50px;">#</th>
                <th>Candidate Name &amp; Contact</th>
                <th>Applied Position</th>
                <th>Location &amp; Experience</th>
                <th>Resume / CV</th>
                <th class="text-center">Status</th>
                <th>Date Applied</th>
                <th class="text-right" style="min-width: 140px;">Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse($applications as $index => $app)
                <tr>
                  <td class="text-muted font-weight-bold">
                    {{ (method_exists($applications, 'firstItem') ? $applications->firstItem() + $index : $index + 1) }}
                  </td>
                  <td>
                    <div class="font-weight-bold text-dark" style="font-size: 0.95rem;">
                      <a href="{{ route('admin.applications.show', $app->id) }}" class="text-dark">
                        {{ $app->name }}
                      </a>
                    </div>
                    <div class="text-xs text-muted">
                      <a href="mailto:{{ $app->email }}" class="text-muted mr-2">
                        <i class="fas fa-envelope mr-1 text-primary"></i> {{ $app->email }}
                      </a>
                      @if($app->phone)
                        <span class="text-muted">
                          <i class="fas fa-phone mr-1 text-success"></i> {{ $app->phone }}
                        </span>
                      @endif
                    </div>
                  </td>
                  <td>
                    <span class="badge badge-light border px-2 py-1 font-weight-bold text-dark" style="font-size: 0.8rem;">
                      {{ $app->position_title }}
                    </span>
                  </td>
                  <td>
                    <div class="text-xs text-dark font-weight-bold">
                      <i class="fas fa-map-marker-alt text-danger mr-1"></i> {{ $app->current_location ?: 'Not specified' }}
                    </div>
                    @if($app->experience)
                      <small class="text-muted d-block mt-1">
                        <i class="fas fa-history mr-1"></i> {{ $app->experience }}
                      </small>
                    @endif
                  </td>
                  <td>
                    @if($app->resume_path)
                      <a href="{{ route('admin.applications.download', $app->id) }}" class="btn btn-xs btn-outline-primary font-weight-bold" title="Download Candidate Resume">
                        <i class="fas fa-download mr-1"></i> Download CV
                      </a>
                    @else
                      <span class="text-xs text-muted">No CV file</span>
                    @endif
                  </td>
                  <td class="text-center">
                    @if($app->status === 'new')
                      <span class="pill-badge pill-pending">
                        <i class="fas fa-clock"></i> New
                      </span>
                    @elseif($app->status === 'reviewing')
                      <span class="pill-badge pill-review">
                        <i class="fas fa-spinner"></i> In Review
                      </span>
                    @elseif($app->status === 'shortlisted')
                      <span class="pill-badge pill-contacted">
                        <i class="fas fa-check"></i> Shortlisted
                      </span>
                    @elseif($app->status === 'rejected')
                      <span class="pill-badge pill-closed">
                        <i class="fas fa-times"></i> Rejected
                      </span>
                    @endif
                  </td>
                  <td class="text-xs text-muted">
                    {{ $app->created_at ? $app->created_at->format('M d, Y h:i A') : 'N/A' }}
                  </td>
                  <td class="text-right">
                    <a href="{{ route('admin.applications.show', $app->id) }}" class="btn btn-light btn-xs mr-1 text-dark" title="View Candidate Profile">
                      <i class="fas fa-eye text-primary mr-1"></i> View
                    </a>
                    <form action="{{ route('admin.applications.destroy', $app->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this candidate application?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-light btn-xs text-danger" title="Delete Application">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="8" class="text-center py-5">
                    <div style="max-width: 400px; margin: 0 auto;">
                      <div class="mb-3">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px; background: #eff6ff; color: #2563eb; font-size: 1.5rem;">
                          <i class="fas fa-user-tie"></i>
                        </span>
                      </div>
                      <h5 class="font-weight-bold text-dark">No Job Applications Found</h5>
                      <p class="text-muted text-sm mb-3">
                        @if(request('search') || request('position') || request('status'))
                          No applications match your active filters. Try resetting the filter toolbar above.
                        @else
                          Candidates who submit their application through the website will appear here with their contact details and downloadable resume.
                        @endif
                      </p>
                      @if(request('search') || request('position') || request('status'))
                        <a href="{{ route('admin.applications.index') }}" class="btn btn-light btn-sm">
                          <i class="fas fa-redo mr-1"></i> Reset Filters
                        </a>
                      @endif
                    </div>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      @if(method_exists($applications, 'hasPages') && $applications->hasPages())
        <div class="card-footer bg-white border-top py-3 px-4 d-flex justify-content-between align-items-center">
          <small class="text-muted">
            Showing {{ $applications->firstItem() }} to {{ $applications->lastItem() }} of {{ $applications->total() }} candidates
          </small>
          <div>
            {{ $applications->links('pagination::bootstrap-4') }}
          </div>
        </div>
      @endif

    </div>

  </div>
</section>
@endsection
