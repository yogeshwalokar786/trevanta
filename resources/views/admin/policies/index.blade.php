@extends('admin.layouts.app')

@section('title', 'Policy & Compliance Pages')
@section('page_heading', 'Policy Pages')

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid px-3">
    <div class="d-flex justify-content-between align-items-center flex-wrap">
      <div>
        <h1 class="m-0 font-weight-bold">Policy &amp; Compliance Pages</h1>
        <p class="text-muted text-sm mb-0">Manage legal policies, GCP compliance declarations, terms, and regulatory disclosures.</p>
      </div>
      <div class="mt-2 mt-sm-0">
        <a href="{{ route('admin.policies.create') }}" class="btn btn-primary btn-sm">
          <i class="fas fa-plus mr-1"></i> Add Policy Page
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid px-3">

    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert" style="border-radius: 10px; background: #ecfdf5; color: #065f46; border-left: 4px solid #10b981 !important;">
        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
        <button type="button" class="close text-success" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <!-- Metric Stat Cards -->
    <div class="row mb-4">
      <div class="col-md-4 col-sm-6 mb-3 mb-md-0">
        <div class="card shadow-xs border-0 h-100" style="border-radius: 12px; background: #ffffff;">
          <div class="card-body p-3 d-flex align-items-center">
            <div class="rounded-circle d-flex align-items-center justify-content-center mr-3" style="width: 48px; height: 48px; background: #f0fdfa; color: var(--admin-primary); font-size: 1.25rem;">
              <i class="fas fa-file-contract"></i>
            </div>
            <div>
              <div class="text-xs text-uppercase font-weight-bold text-muted">Total Policies</div>
              <div class="h4 font-weight-bold text-dark mb-0">{{ $totalCount }}</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 mb-3 mb-md-0">
        <div class="card shadow-xs border-0 h-100" style="border-radius: 12px; background: #ffffff;">
          <div class="card-body p-3 d-flex align-items-center">
            <div class="rounded-circle d-flex align-items-center justify-content-center mr-3" style="width: 48px; height: 48px; background: #ecfdf5; color: #10b981; font-size: 1.25rem;">
              <i class="fas fa-check-circle"></i>
            </div>
            <div>
              <div class="text-xs text-uppercase font-weight-bold text-muted">Published / Active</div>
              <div class="h4 font-weight-bold text-success mb-0">{{ $activeCount }}</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 mb-3 mb-md-0">
        <div class="card shadow-xs border-0 h-100" style="border-radius: 12px; background: #ffffff;">
          <div class="card-body p-3 d-flex align-items-center">
            <div class="rounded-circle d-flex align-items-center justify-content-center mr-3" style="width: 48px; height: 48px; background: #f8fafc; color: #64748b; font-size: 1.25rem;">
              <i class="fas fa-eye-slash"></i>
            </div>
            <div>
              <div class="text-xs text-uppercase font-weight-bold text-muted">Draft / Inactive</div>
              <div class="h4 font-weight-bold text-muted mb-0">{{ $inactiveCount }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Search & Filter Card -->
    <div class="card shadow-xs border-0 mb-4" style="border-radius: 12px;">
      <div class="card-body p-3">
        <form action="{{ route('admin.policies.index') }}" method="GET" class="row align-items-center">
          <div class="col-md-6 mb-2 mb-md-0">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-white border-right-0" style="border-radius: 8px 0 0 8px;"><i class="fas fa-search text-muted"></i></span>
              </div>
              <input type="text" name="search" class="form-control border-left-0" placeholder="Search by title, slug, or content..." value="{{ request('search') }}" style="border-radius: 0 8px 8px 0;">
            </div>
          </div>

          <div class="col-md-3 mb-2 mb-md-0">
            <select name="status" class="form-control" onchange="this.form.submit()">
              <option value="">All Statuses</option>
              <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Published (Active)</option>
              <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Draft (Inactive)</option>
            </select>
          </div>

          <div class="col-md-3 d-flex gap-2">
            <button type="submit" class="btn btn-primary btn-sm flex-grow-1">Filter</button>
            @if(request('search') || request('status'))
              <a href="{{ route('admin.policies.index') }}" class="btn btn-white btn-sm ml-2" title="Reset Filters"><i class="fas fa-times"></i></a>
            @endif
          </div>
        </form>
      </div>
    </div>

    <!-- Policy Pages Table -->
    <div class="card shadow-xs border-0" style="border-radius: 12px; overflow: hidden;">
      <div class="card-header bg-white border-bottom py-3 px-4 d-flex justify-content-between align-items-center">
        <h6 class="font-weight-bold text-dark m-0"><i class="fas fa-list-alt mr-2 text-primary"></i> All Policy &amp; Compliance Documents</h6>
        <span class="badge badge-light border text-xs px-2 py-1 font-weight-normal text-muted">Sorted by Order</span>
      </div>

      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead style="background: #f8fafc; color: #475569; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em;">
            <tr>
              <th style="width: 50px;" class="text-center">#</th>
              <th>Policy Title</th>
              <th>Public Slug &amp; Link</th>
              <th>Effective Date</th>
              <th style="width: 80px;" class="text-center">Order</th>
              <th style="width: 120px;" class="text-center">Status</th>
              <th style="width: 170px;" class="text-right pr-4">Actions</th>
            </tr>
          </thead>
          <tbody style="font-size: 0.875rem;">
            @forelse($policies as $policy)
              <tr>
                <td class="text-center text-muted font-weight-bold">{{ $loop->iteration }}</td>
                <td>
                  <a href="{{ route('admin.policies.edit', $policy->id) }}" class="font-weight-bold text-dark d-block text-truncate" style="max-width: 280px; text-decoration: none;">
                    {{ $policy->title }}
                  </a>
                  @if($policy->summary)
                    <small class="text-muted d-block text-truncate" style="max-width: 320px;">{{ $policy->summary }}</small>
                  @endif
                </td>
                <td>
                  <a href="{{ route('policy.show', $policy->slug) }}" target="_blank" class="badge badge-light border text-primary" style="font-family: monospace; font-size: 0.78rem; text-decoration: none; padding: 0.4rem 0.6rem;">
                    /policy/{{ $policy->slug }} <i class="fas fa-external-link-alt ml-1" style="font-size: 0.65rem;"></i>
                  </a>
                </td>
                <td class="text-muted text-sm">
                  {{ $policy->effective_date ?: 'Not Specified' }}
                </td>
                <td class="text-center">
                  <span class="badge badge-light border font-weight-bold px-2 py-1">{{ $policy->order }}</span>
                </td>
                <td class="text-center">
                  @if($policy->is_active)
                    <span class="pill-badge pill-contacted"><i class="fas fa-check-circle"></i> Published</span>
                  @else
                    <span class="pill-badge pill-closed"><i class="fas fa-eye-slash"></i> Draft</span>
                  @endif
                </td>
                <td class="text-right pr-4">
                  <div class="d-inline-flex align-items-center" style="gap: 6px;">
                    <!-- Quick Toggle Active Status -->
                    <form action="{{ route('admin.policies.toggle-active', $policy->id) }}" method="POST" class="d-inline">
                      @csrf
                      <button type="submit" class="btn btn-sm {{ $policy->is_active ? 'btn-white text-muted' : 'btn-white text-success' }} p-1 px-2" title="{{ $policy->is_active ? 'Switch to Draft' : 'Publish Page' }}" style="border-radius: 6px;">
                        <i class="fas {{ $policy->is_active ? 'fa-toggle-on text-success' : 'fa-toggle-off text-muted' }}"></i>
                      </button>
                    </form>

                    <!-- Edit Button -->
                    <a href="{{ route('admin.policies.edit', $policy->id) }}" class="btn btn-white btn-sm p-1 px-2 text-primary" title="Edit Policy" style="border-radius: 6px;">
                      <i class="fas fa-edit"></i>
                    </a>

                    <!-- Delete Button -->
                    <form action="{{ route('admin.policies.destroy', $policy->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete policy: &quot;{{ addslashes($policy->title) }}&quot;? This action cannot be undone.');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-white btn-sm p-1 px-2 text-danger" title="Delete Policy" style="border-radius: 6px;">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="text-center py-5">
                  <div class="py-4">
                    <i class="fas fa-file-contract text-muted fa-3x mb-3" style="opacity: 0.35;"></i>
                    <h6 class="font-weight-bold text-dark">No Policy Pages Found</h6>
                    <p class="text-muted text-sm mb-3">You haven't created any legal or compliance policy pages yet.</p>
                    <a href="{{ route('admin.policies.create') }}" class="btn btn-primary btn-sm">
                      <i class="fas fa-plus mr-1"></i> Create First Policy Page
                    </a>
                  </div>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      @if(method_exists($policies, 'hasPages') && $policies->hasPages())
        <div class="card-footer bg-white border-top py-3 px-4 d-flex justify-content-between align-items-center">
          <span class="text-muted text-xs">Showing {{ $policies->firstItem() }} to {{ $policies->lastItem() }} of {{ $policies->total() }} policies</span>
          <div>{{ $policies->links('pagination::bootstrap-4') }}</div>
        </div>
      @endif

    </div>

  </div>
</section>
@endsection
