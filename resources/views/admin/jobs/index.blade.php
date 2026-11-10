@extends('admin.layouts.app')

@section('title', 'Manage Job Openings & Careers')
@section('page_heading', 'Job Openings')

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid px-3">
    <div class="d-flex justify-content-between align-items-center flex-wrap">
      <div>
        <h1 class="m-0 font-weight-bold">Job Openings &amp; Recruitment</h1>
        <p class="text-muted text-sm mb-0">Post and manage clinical research positions, requirements, and job listings.</p>
      </div>
      <div class="mt-2 mt-sm-0">
        <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary shadow-sm">
          <i class="fas fa-plus mr-1"></i> Post New Job
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

    <!-- Filter & Search Toolbar Card -->
    <div class="card mb-4 border-0 shadow-sm" style="border-radius: 12px;">
      <div class="card-body py-3">
        <form action="{{ route('admin.jobs.index') }}" method="GET" class="row align-items-center">
          <div class="col-md-5 mb-2 mb-md-0">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-white border-right-0"><i class="fas fa-search text-muted"></i></span>
              </div>
              <input type="text" name="search" class="form-control border-left-0" placeholder="Search by title, location, department..." value="{{ request('search') }}">
            </div>
          </div>

          <div class="col-md-3 mb-2 mb-md-0">
            <select name="department" class="form-control" onchange="this.form.submit()">
              <option value="all">All Departments</option>
              @foreach($departments as $dept)
                <option value="{{ $dept }}" {{ request('department') === $dept ? 'selected' : '' }}>{{ $dept }}</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-2 mb-2 mb-md-0">
            <select name="status" class="form-control" onchange="this.form.submit()">
              <option value="">All Statuses</option>
              <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active Only</option>
              <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive / Closed</option>
            </select>
          </div>

          <div class="col-md-2 text-md-right">
            <button type="submit" class="btn btn-primary btn-sm mr-1">
              <i class="fas fa-filter mr-1"></i> Filter
            </button>
            @if(request('search') || (request('department') && request('department') !== 'all') || request('status'))
              <a href="{{ route('admin.jobs.index') }}" class="btn btn-light btn-sm">
                <i class="fas fa-times mr-1"></i> Reset
              </a>
            @endif
          </div>
        </form>
      </div>
    </div>

    <!-- Jobs Table Card -->
    <div class="card border-0 shadow-sm" style="border-radius: 12px;">
      <div class="card-header bg-white border-bottom py-3 px-4 d-flex justify-content-between align-items-center">
        <div>
          <h3 class="card-title text-sm mb-0 font-weight-bold text-dark">
            <i class="fas fa-briefcase text-primary mr-2"></i> Current Positions
          </h3>
        </div>
        @if(method_exists($jobs, 'total'))
          <span class="badge badge-light border text-muted px-3 py-2 font-weight-bold">
            Total: {{ $jobs->total() }} Openings
          </span>
        @endif
      </div>

      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead>
              <tr>
                <th style="width: 50px;">#</th>
                <th>Position Title &amp; Details</th>
                <th>Department</th>
                <th>Location &amp; Type</th>
                <th>Apply Target</th>
                <th class="text-center">Status</th>
                <th class="text-right" style="min-width: 140px;">Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse($jobs as $index => $job)
                <tr>
                  <td class="text-muted font-weight-bold">
                    {{ (method_exists($jobs, 'firstItem') ? $jobs->firstItem() + $index : $index + 1) }}
                  </td>
                  <td>
                    <div class="font-weight-bold text-dark" style="font-size: 0.95rem;">
                      {{ $job->title }}
                    </div>
                    <small class="text-muted d-block text-truncate" style="max-width: 320px;">
                      {{ Str::limit($job->description, 85) }}
                    </small>
                  </td>
                  <td>
                    <span class="badge badge-light border px-2 py-1 font-weight-normal text-dark">
                      {{ $job->department ?: 'General' }}
                    </span>
                  </td>
                  <td>
                    <div class="text-sm font-weight-bold text-dark">
                      <i class="fas fa-map-marker-alt text-danger mr-1 text-xs"></i> {{ $job->location ?: 'Global / Remote' }}
                    </div>
                    <span class="badge badge-info font-weight-normal text-xs mt-1">
                      {{ $job->job_type ?: 'Full-Time' }}
                    </span>
                    @if($job->experience)
                      <span class="badge badge-secondary font-weight-normal text-xs mt-1">
                        {{ $job->experience }}
                      </span>
                    @endif
                  </td>
                  <td>
                    @if($job->apply_url)
                      <a href="{{ $job->apply_url }}" target="_blank" class="text-xs text-primary font-weight-bold">
                        <i class="fas fa-external-link-alt mr-1"></i> External Link
                      </a>
                    @else
                      <span class="text-xs text-muted">
                        <i class="fas fa-envelope mr-1"></i> {{ $job->apply_email ?: setting('careers_email', setting('contact_email', 'info@trevanta.com')) }}
                      </span>
                    @endif
                  </td>
                  <td class="text-center">
                    <form action="{{ route('admin.jobs.toggle-active', $job->id) }}" method="POST" class="d-inline">
                      @csrf
                      @if($job->is_active)
                        <button type="submit" class="btn btn-xs btn-success px-2 py-1 shadow-none" title="Click to Deactivate">
                          <i class="fas fa-check-circle mr-1"></i> Active
                        </button>
                      @else
                        <button type="submit" class="btn btn-xs btn-secondary px-2 py-1 shadow-none" title="Click to Activate">
                          <i class="fas fa-pause-circle mr-1"></i> Inactive
                        </button>
                      @endif
                    </form>
                  </td>
                  <td class="text-right">
                    <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-light btn-xs mr-1 text-dark" title="Edit Position">
                      <i class="fas fa-edit text-primary mr-1"></i> Edit
                    </a>
                    <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this job posting? This action cannot be undone.');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-light btn-xs text-danger" title="Delete Position">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="text-center py-5">
                    <div style="max-width: 380px; margin: 0 auto;">
                      <div class="mb-3">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px; background: #f0fdfa; color: #0d9488; font-size: 1.5rem;">
                          <i class="fas fa-briefcase"></i>
                        </span>
                      </div>
                      <h5 class="font-weight-bold text-dark">No Job Openings Found</h5>
                      <p class="text-muted text-sm mb-3">
                        @if(request('search') || request('department') || request('status'))
                          No positions match your active filters. Try resetting the filter toolbar above.
                        @else
                          You haven't posted any positions yet. Post your first job opening to display on the Careers page.
                        @endif
                      </p>
                      <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus mr-1"></i> Post First Job
                      </a>
                    </div>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      @if(method_exists($jobs, 'hasPages') && $jobs->hasPages())
        <div class="card-footer bg-white border-top py-3 px-4 d-flex justify-content-between align-items-center">
          <small class="text-muted">
            Showing {{ $jobs->firstItem() }} to {{ $jobs->lastItem() }} of {{ $jobs->total() }} positions
          </small>
          <div>
            {{ $jobs->links('pagination::bootstrap-4') }}
          </div>
        </div>
      @endif

    </div>

  </div>
</section>
@endsection
