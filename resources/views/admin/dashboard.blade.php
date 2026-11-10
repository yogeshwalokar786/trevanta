@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')
@section('page_heading', 'Dashboard Overview')

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid px-3">
    <div class="d-flex justify-content-between align-items-center flex-wrap">
      <div>
        <h1 class="m-0 font-weight-bold">Clinical Operations Dashboard</h1>
        <p class="text-muted text-sm mb-0">Live incoming study RFP proposals, sponsor communications, and article metrics.</p>
      </div>
      <div class="mt-2 mt-sm-0">
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary shadow-sm">
          <i class="fas fa-plus mr-1"></i> New Blog Article
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid px-3">
    
    <!-- 4 System Pillar Stat Cards -->
    <div class="row mb-4">
      
      <!-- 1. Enquiries & Leads -->
      <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
        <a href="{{ route('admin.inquiries.index') }}" class="text-decoration-none">
          <div class="stat-card" style="transition: transform 0.15s ease, box-shadow 0.15s ease;">
            <div class="stat-card-top">
              <span class="stat-card-title">Client Enquiries</span>
              <div class="stat-card-icon icon-teal">
                <i class="fas fa-envelope-open-text"></i>
              </div>
            </div>
            <div>
              <div class="stat-card-number">{{ $totalInquiries }}</div>
              <p class="stat-card-desc">
                @if($pendingInquiries > 0)
                  <span class="text-warning font-weight-bold">{{ $pendingInquiries }} new pending</span>
                @else
                  <span class="text-success font-weight-500"><i class="fas fa-check-circle"></i> All responded</span>
                @endif
                &bull; Manage all &rarr;
              </p>
            </div>
          </div>
        </a>
      </div>

      <!-- 2. Publications & Insights -->
      <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
        <a href="{{ route('admin.blogs.index') }}" class="text-decoration-none">
          <div class="stat-card" style="transition: transform 0.15s ease, box-shadow 0.15s ease;">
            <div class="stat-card-top">
              <span class="stat-card-title">Blogs &amp; Insights</span>
              <div class="stat-card-icon icon-blue">
                <i class="fas fa-newspaper"></i>
              </div>
            </div>
            <div>
              <div class="stat-card-number">{{ $totalBlogs ?? 0 }}</div>
              <p class="stat-card-desc">
                {{ $publishedBlogs ?? 0 }} published on live site &rarr;
              </p>
            </div>
          </div>
        </a>
      </div>

      <!-- 3. Candidate Applications -->
      <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
        <a href="{{ route('admin.applications.index') }}" class="text-decoration-none">
          <div class="stat-card" style="transition: transform 0.15s ease, box-shadow 0.15s ease;">
            <div class="stat-card-top">
              <span class="stat-card-title">Job Applications</span>
              <div class="stat-card-icon icon-amber">
                <i class="fas fa-user-tie"></i>
              </div>
            </div>
            <div>
              <div class="stat-card-number">{{ $totalApplications ?? 0 }}</div>
              <p class="stat-card-desc">
                @if(($newApplications ?? 0) > 0)
                  <span class="text-warning font-weight-bold">{{ $newApplications }} new candidates</span>
                @else
                  <span class="text-muted">{{ $activeJobs ?? 0 }} active job roles</span>
                @endif
                &bull; Review &rarr;
              </p>
            </div>
          </div>
        </a>
      </div>

      <!-- 4. Compliance & Policy Pages -->
      <div class="col-12 col-sm-6 col-lg-3 mb-3 mb-lg-0">
        <a href="{{ route('admin.policies.index') }}" class="text-decoration-none">
          <div class="stat-card" style="transition: transform 0.15s ease, box-shadow 0.15s ease;">
            <div class="stat-card-top">
              <span class="stat-card-title">Compliance Policies</span>
              <div class="stat-card-icon icon-purple">
                <i class="fas fa-file-contract"></i>
              </div>
            </div>
            <div>
              <div class="stat-card-number">{{ $totalPolicies ?? 0 }}</div>
              <p class="stat-card-desc">
                {{ $activePolicies ?? 0 }} active legal statements &rarr;
              </p>
            </div>
          </div>
        </a>
      </div>

    </div>

    <!-- ========================================================================= -->
    <!-- CLINICAL ENQUIRIES & RECENT SUBMISSIONS TABLE -->
    <!-- ========================================================================= -->
    <div class="card border-0 shadow-sm" style="border-radius: 12px;">
      
      <!-- Card Header & Filter Toolbar -->
      <div class="card-header bg-white py-3 px-4 border-bottom">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
          <div>
            <h3 class="card-title text-sm mb-1 font-weight-bold text-dark">
              <i class="fas fa-list-alt text-primary mr-2"></i> Recent Inbound Enquiries &amp; Feasibility RFPs
            </h3>
            <small class="text-muted text-xs">Review clinical study proposals, update review statuses, and contact sponsors.</small>
          </div>
          
          <!-- Filter Buttons & Full Archive Link -->
          <div class="d-flex flex-wrap align-items-center gap-2">
            <div class="btn-group btn-group-sm">
              <a href="{{ route('admin.dashboard') }}" class="btn {{ !request()->has('filter') ? 'btn-primary' : 'btn-white' }}">
                All ({{ $totalInquiries }})
              </a>
              <a href="{{ route('admin.dashboard', ['filter' => 'rfp']) }}" class="btn {{ request('filter') === 'rfp' ? 'btn-primary' : 'btn-white' }}">
                RFPs ({{ $totalRfps }})
              </a>
              <a href="{{ route('admin.dashboard', ['filter' => 'contact']) }}" class="btn {{ request('filter') === 'contact' ? 'btn-primary' : 'btn-white' }}">
                Contacts ({{ $totalContacts }})
              </a>
              <a href="{{ route('admin.dashboard', ['filter' => 'pending']) }}" class="btn {{ request('filter') === 'pending' ? 'btn-danger' : 'btn-white' }}">
                Pending ({{ $pendingInquiries ?? $pendingRfps ?? 0 }})
              </a>
            </div>

            <a href="{{ route('admin.inquiries.index') }}" class="btn btn-white btn-sm text-primary font-weight-bold" title="Open full dedicated Enquiries manager">
              <i class="fas fa-external-link-alt mr-1"></i> Full Archive &rarr;
            </a>
          </div>
        </div>
      </div>

      <!-- Table Body -->
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead>
              <tr>
                <th style="width: 100px;">Type</th>
                <th>Sponsor / Contact</th>
                <th class="d-none d-md-table-cell">Focus &amp; Study Scope</th>
                <th style="width: 150px;">Status</th>
                <th class="d-none d-sm-table-cell" style="width: 110px;">Submitted</th>
                <th class="text-right" style="width: 120px;">Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse($inquiries as $inquiry)
                <tr>
                  <!-- 1. Type & ID -->
                  <td>
                    @if($inquiry->type === 'rfp')
                      <span class="pill-badge pill-rfp font-weight-bold">
                        <i class="fas fa-file-contract"></i> RFP
                      </span>
                    @else
                      <span class="pill-badge pill-contact font-weight-bold">
                        <i class="fas fa-envelope"></i> Contact
                      </span>
                    @endif
                    <small class="text-muted d-block mt-1 font-weight-bold" style="font-size: 11px;">#{{ $inquiry->id }}</small>
                  </td>

                  <!-- 2. Sponsor / Contact Person -->
                  <td>
                    <div class="font-weight-bold text-dark text-sm leading-tight">
                      {{ $inquiry->name }}
                    </div>
                    @if($inquiry->organization)
                      <div class="text-xs text-muted font-weight-500 mt-1">
                        <i class="fas fa-building mr-1 text-secondary"></i> {{ $inquiry->organization }}
                      </div>
                    @endif
                    <div class="text-xs mt-1 d-flex flex-wrap align-items-center gap-2">
                      <a href="mailto:{{ $inquiry->email }}" class="text-primary font-weight-500" title="Email client">
                        <i class="fas fa-envelope mr-1"></i> {{ $inquiry->email }}
                      </a>
                      @if($inquiry->phone)
                        <span class="text-muted">
                          <i class="fas fa-phone mr-1"></i> {{ $inquiry->phone }}
                        </span>
                      @endif
                    </div>
                  </td>

                  <!-- 3. Focus & Study Scope (Hidden on extra small screens) -->
                  <td class="d-none d-md-table-cell">
                    @if($inquiry->therapeutic_focus)
                      <div class="font-weight-bold text-dark text-xs mb-1">
                        {{ $inquiry->therapeutic_focus }}
                      </div>
                    @endif
                    @if($inquiry->phase)
                      <span class="badge badge-light border text-xs text-muted mb-1">
                        {{ $inquiry->phase }}
                      </span>
                    @endif
                    @if($inquiry->message)
                      <div class="text-xs text-muted text-truncate" style="max-width: 250px;" title="{{ $inquiry->message }}">
                        {{ $inquiry->message }}
                      </div>
                    @endif
                    @if(!$inquiry->therapeutic_focus && !$inquiry->phase && !$inquiry->message)
                      <span class="text-muted text-xs">&mdash;</span>
                    @endif
                  </td>

                  <!-- 4. Status Dropdown Form -->
                  <td>
                    <form action="{{ route('admin.inquiries.status', $inquiry->id) }}" method="POST">
                      @csrf
                      @method('PATCH')
                      <select name="status" class="form-control form-control-sm font-weight-bold" 
                              onchange="this.form.submit()" 
                              style="font-size: 0.775rem; height: 28px; padding: 2px 8px; border-radius: 6px;
                                {{ $inquiry->status === 'new' ? 'background-color: #fef3c7; color: #92400e; border-color: #fde68a !important;' : '' }}
                                {{ $inquiry->status === 'in_review' ? 'background-color: #e0f2fe; color: #0369a1; border-color: #bae6fd !important;' : '' }}
                                {{ $inquiry->status === 'contacted' ? 'background-color: #dcfce7; color: #15803d; border-color: #bbf7d0 !important;' : '' }}
                                {{ $inquiry->status === 'closed' ? 'background-color: #f1f5f9; color: #475569; border-color: #e2e8f0 !important;' : '' }}">
                        <option value="new" {{ $inquiry->status === 'new' ? 'selected' : '' }}>• New</option>
                        <option value="in_review" {{ $inquiry->status === 'in_review' ? 'selected' : '' }}>• In Review</option>
                        <option value="contacted" {{ $inquiry->status === 'contacted' ? 'selected' : '' }}>• Contacted</option>
                        <option value="closed" {{ $inquiry->status === 'closed' ? 'selected' : '' }}>• Closed</option>
                      </select>
                    </form>
                  </td>

                  <!-- 5. Submission Date -->
                  <td class="d-none d-sm-table-cell text-xs text-muted">
                    <span title="{{ $inquiry->created_at ? $inquiry->created_at->format('M d, Y h:i A') : '' }}">
                      {{ $inquiry->created_at ? $inquiry->created_at->diffForHumans() : '&mdash;' }}
                    </span>
                  </td>

                  <!-- 6. Actions -->
                  <td class="text-right">
                    <div class="btn-group btn-group-sm">
                      <button type="button" class="btn btn-white btn-xs" title="View Full Details" 
                              onclick="openDashboardEnquiryModal({{ json_encode($inquiry) }}, '{{ $inquiry->created_at ? $inquiry->created_at->format('M d, Y h:i A') : '' }}', '{{ $inquiry->created_at ? $inquiry->created_at->diffForHumans() : '' }}')">
                        <i class="fas fa-eye text-primary"></i>
                      </button>

                      <a href="mailto:{{ $inquiry->email }}?subject=Re:%20Trevanta%20International%20Inquiry%20#{{ $inquiry->id }}" class="btn btn-white btn-xs" title="Reply via Email">
                        <i class="fas fa-reply text-secondary"></i>
                      </a>

                      <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete enquiry #{{ $inquiry->id }} permanently?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-white btn-xs text-danger" title="Delete">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="6" class="text-center py-5 text-muted">
                    <div class="py-4">
                      <i class="fas fa-inbox fa-3x text-muted mb-3" style="opacity: 0.4;"></i>
                      <h5 class="font-weight-bold text-dark mb-1">No enquiries found</h5>
                      <small class="text-muted">Inbound requests through the public website will appear here in real time.</small>
                    </div>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      <!-- Card Footer Pagination -->
      @if(method_exists($inquiries, 'hasPages') && $inquiries->hasPages())
        <div class="card-footer bg-white border-top py-3 px-4 d-flex flex-wrap justify-content-between align-items-center">
          <small class="text-muted text-xs">
            Showing {{ $inquiries->firstItem() }} to {{ $inquiries->lastItem() }} of {{ $inquiries->total() }} enquiries
          </small>
          <div>
            {{ $inquiries->withQueryString()->links('pagination::bootstrap-4') }}
          </div>
        </div>
      @endif

    </div>

  </div>
</section>

<!-- ========================================================================= -->
<!-- SINGLE REUSABLE ENQUIRY DETAILS MODAL -->
<!-- ========================================================================= -->
<div class="modal fade" id="dashboardEnquiryModal" tabindex="-1" role="dialog" aria-labelledby="dashModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content border-0 shadow" style="border-radius: 12px; overflow: hidden;">
      
      <div class="modal-header py-3 px-4 bg-light border-bottom">
        <div>
          <span id="dashModalTypeBadge" class="pill-badge pill-rfp font-weight-bold mr-2">RFP</span>
          <span class="font-weight-bold text-dark text-sm" id="dashModalTitle">Enquiry Details</span>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body p-4">
        
        <!-- Client Profile Strip -->
        <div class="p-3 mb-4 rounded border bg-light d-flex flex-wrap justify-content-between align-items-center" style="border-radius: 8px;">
          <div>
            <h5 class="font-weight-bold text-dark mb-1" id="dashModalClientName">Client Name</h5>
            <div class="text-xs text-muted" id="dashModalClientOrg">Company / Organization</div>
          </div>
          <div class="text-right mt-2 mt-sm-0">
            <span class="badge badge-light border text-muted px-2 py-1 text-xs" id="dashModalDate">Submitted Date</span>
          </div>
        </div>

        <!-- Contact & Parameters Grid -->
        <div class="row mb-3">
          <div class="col-sm-6 mb-3">
            <label class="text-xs font-weight-bold text-muted text-uppercase mb-1 d-block">Email Address</label>
            <a href="#" id="dashModalEmailLink" class="font-weight-bold text-primary text-sm">
              <span id="dashModalClientEmail">email@example.com</span> &rarr;
            </a>
          </div>

          <div class="col-sm-6 mb-3">
            <label class="text-xs font-weight-bold text-muted text-uppercase mb-1 d-block">Telephone / Hotline</label>
            <span id="dashModalClientPhone" class="font-weight-bold text-dark text-sm">&mdash;</span>
          </div>

          <div class="col-sm-6 mb-3">
            <label class="text-xs font-weight-bold text-muted text-uppercase mb-1 d-block">Therapeutic Focus / Area</label>
            <span id="dashModalTherapeutic" class="font-weight-bold text-dark text-sm">&mdash;</span>
          </div>

          <div class="col-sm-6 mb-3">
            <label class="text-xs font-weight-bold text-muted text-uppercase mb-1 d-block">Clinical Study Phase</label>
            <span id="dashModalPhase" class="badge badge-light border text-xs font-weight-bold">&mdash;</span>
          </div>
        </div>

        <hr class="my-3">

        <!-- Protocol Message -->
        <div class="form-group mb-0">
          <label class="text-xs font-weight-bold text-muted text-uppercase mb-2 d-block">Protocol Outline / Inquiry Message</label>
          <div class="p-3 rounded border bg-white" style="border-radius: 8px; min-height: 100px; max-height: 250px; overflow-y: auto; font-size: 0.875rem; line-height: 1.6; color: #334155; white-space: pre-wrap;" id="dashModalMessage">
            No message notes provided.
          </div>
        </div>

      </div>

      <div class="modal-footer py-3 px-4 bg-light border-top d-flex justify-content-between align-items-center">
        <div>
          <a href="#" id="dashModalReplyBtn" class="btn btn-primary btn-sm font-weight-bold">
            <i class="fas fa-reply mr-1"></i> Send Reply Email
          </a>
        </div>
        <button type="button" class="btn btn-white btn-sm px-3" data-dismiss="modal">
          Close
        </button>
      </div>

    </div>
  </div>
</div>

@push('scripts')
<script>
  function openDashboardEnquiryModal(inquiry, formattedDate, humanDate) {
    document.getElementById('dashModalTitle').textContent = 'Enquiry #' + inquiry.id + ' — ' + (inquiry.type === 'rfp' ? 'Study RFP Proposal' : 'General Contact');
    
    const typeBadge = document.getElementById('dashModalTypeBadge');
    if (inquiry.type === 'rfp') {
      typeBadge.textContent = 'Study RFP';
      typeBadge.className = 'pill-badge pill-rfp font-weight-bold mr-2';
    } else {
      typeBadge.textContent = 'General Contact';
      typeBadge.className = 'pill-badge pill-contact font-weight-bold mr-2';
    }

    document.getElementById('dashModalClientName').textContent = inquiry.name || 'Unnamed Client';
    document.getElementById('dashModalClientOrg').textContent = inquiry.organization ? 'Organization: ' + inquiry.organization : 'Individual Sponsor / Investigator';
    document.getElementById('dashModalDate').textContent = formattedDate ? formattedDate + ' (' + humanDate + ')' : humanDate;

    document.getElementById('dashModalClientEmail').textContent = inquiry.email || '—';
    document.getElementById('dashModalEmailLink').href = 'mailto:' + (inquiry.email || '');

    document.getElementById('dashModalClientPhone').textContent = inquiry.phone || 'Not provided';
    document.getElementById('dashModalTherapeutic').textContent = inquiry.therapeutic_focus || 'General / Unspecified';
    document.getElementById('dashModalPhase').textContent = inquiry.phase || 'N/A';

    document.getElementById('dashModalMessage').textContent = inquiry.message || 'No additional protocol notes provided.';
    document.getElementById('dashModalReplyBtn').href = 'mailto:' + (inquiry.email || '') + '?subject=' + encodeURIComponent('RE: Trevanta International - Study Inquiry #' + inquiry.id);

    $('#dashboardEnquiryModal').modal('show');
  }
</script>
@endpush
@endsection
