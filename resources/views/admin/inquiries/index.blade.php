@extends('admin.layouts.app')

@section('title', 'Clinical Enquiries & Study RFPs')
@section('page-title', 'Clinical Enquiries & Study RFPs')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
  <li class="breadcrumb-item active">Enquiries</li>
@endsection

@section('content')
<div class="row">

  <!-- ========================================================================= -->
  <!-- STAT SUMMARY CARDS -->
  <!-- ========================================================================= -->
  <div class="col-6 col-lg-3 mb-3">
    <div class="stat-card">
      <div class="stat-card-header">
        <span class="stat-card-title">Total Enquiries</span>
        <div class="stat-card-icon icon-teal">
          <i class="fas fa-inbox"></i>
        </div>
      </div>
      <div class="stat-card-number">{{ $totalCount }}</div>
      <p class="stat-card-desc">All inbound client leads</p>
    </div>
  </div>

  <div class="col-6 col-lg-3 mb-3">
    <div class="stat-card">
      <div class="stat-card-header">
        <span class="stat-card-title">Study RFPs</span>
        <div class="stat-card-icon icon-blue">
          <i class="fas fa-file-medical"></i>
        </div>
      </div>
      <div class="stat-card-number">{{ $rfpCount }}</div>
      <p class="stat-card-desc">Protocol &amp; feasibility proposals</p>
    </div>
  </div>

  <div class="col-6 col-lg-3 mb-3">
    <div class="stat-card">
      <div class="stat-card-header">
        <span class="stat-card-title">General Contacts</span>
        <div class="stat-card-icon icon-purple">
          <i class="fas fa-envelope"></i>
        </div>
      </div>
      <div class="stat-card-number">{{ $contactCount }}</div>
      <p class="stat-card-desc">Partner &amp; corporate inquiries</p>
    </div>
  </div>

  <div class="col-6 col-lg-3 mb-3">
    <div class="stat-card">
      <div class="stat-card-header">
        <span class="stat-card-title">Pending Follow-up</span>
        <div class="stat-card-icon icon-amber">
          <i class="fas fa-bell"></i>
        </div>
      </div>
      <div class="stat-card-number">{{ $newCount }}</div>
      <p class="stat-card-desc">Awaiting sponsor triage</p>
    </div>
  </div>

  <!-- ========================================================================= -->
  <!-- MAIN ENQUIRIES TABLE & TOOLBAR -->
  <!-- ========================================================================= -->
  <div class="col-12">
    <div class="card border-0 shadow-sm" style="border-radius: 12px;">
      
      <!-- Card Header & Filters -->
      <div class="card-header bg-white py-3 px-4 border-bottom">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
          <div>
            <h3 class="card-title text-sm mb-1 font-weight-bold text-dark">
              <i class="fas fa-envelope-open-text text-primary mr-2"></i> Inbound Enquiries Archive
            </h3>
            <small class="text-muted text-xs">Review study proposals, update triage statuses, and respond to sponsors.</small>
          </div>

          <!-- Search & Filter Form -->
          <form method="GET" action="{{ route('admin.inquiries.index') }}" class="d-flex flex-wrap align-items-center gap-2">
            
            <!-- Type Filter Dropdown -->
            <select name="type" class="form-control form-control-sm" style="width: auto; min-width: 130px;" onchange="this.form.submit()">
              <option value="">All Types</option>
              <option value="rfp" {{ request('type') === 'rfp' ? 'selected' : '' }}>Study RFPs ({{ $rfpCount }})</option>
              <option value="contact" {{ request('type') === 'contact' ? 'selected' : '' }}>General Contact ({{ $contactCount }})</option>
            </select>

            <!-- Status Filter Dropdown -->
            <select name="status" class="form-control form-control-sm" style="width: auto; min-width: 140px;" onchange="this.form.submit()">
              <option value="">All Statuses</option>
              <option value="new" {{ request('status') === 'new' ? 'selected' : '' }}>New / Pending</option>
              <option value="in_review" {{ request('status') === 'in_review' ? 'selected' : '' }}>In Review</option>
              <option value="contacted" {{ request('status') === 'contacted' ? 'selected' : '' }}>Contacted</option>
              <option value="closed" {{ request('status') === 'closed' ? 'selected' : '' }}>Closed</option>
            </select>

            <!-- Keyword Search Input -->
            <div class="input-group input-group-sm" style="width: 220px;">
              <input type="text" name="search" class="form-control" placeholder="Search enquiry..." value="{{ request('search') }}">
              <div class="input-group-append">
                <button class="btn btn-white" type="submit">
                  <i class="fas fa-search text-muted"></i>
                </button>
              </div>
            </div>

            @if(request('type') || request('status') || request('search'))
              <a href="{{ route('admin.inquiries.index') }}" class="btn btn-outline-secondary btn-sm" title="Clear all filters">
                <i class="fas fa-times"></i>
              </a>
            @endif
          </form>
        </div>
      </div>

      <!-- Table Body -->
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover mb-0">
            <thead>
              <tr>
                <th style="width: 90px;">Type</th>
                <th>Sponsor / Contact</th>
                <th>Focus &amp; Phase</th>
                <th style="max-width: 280px;">Message Summary</th>
                <th style="width: 140px;">Status</th>
                <th style="width: 120px;">Submitted</th>
                <th class="text-right" style="width: 110px;">Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse($inquiries as $inquiry)
                <tr>
                  <!-- Type Badge -->
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
                  </td>

                  <!-- Contact / Organization -->
                  <td>
                    <div class="font-weight-bold text-dark text-sm leading-tight">
                      {{ $inquiry->name }}
                    </div>
                    @if($inquiry->organization)
                      <div class="text-xs text-muted font-weight-500">
                        <i class="fas fa-building mr-1 text-secondary"></i> {{ $inquiry->organization }}
                      </div>
                    @endif
                    <div class="text-xs mt-1">
                      <a href="mailto:{{ $inquiry->email }}" class="text-primary font-weight-500 mr-2" title="Email client">
                        <i class="fas fa-envelope mr-1"></i> {{ $inquiry->email }}
                      </a>
                      @if($inquiry->phone)
                        <span class="text-muted">
                          <i class="fas fa-phone mr-1"></i> {{ $inquiry->phone }}
                        </span>
                      @endif
                    </div>
                  </td>

                  <!-- Focus & Phase -->
                  <td>
                    @if($inquiry->therapeutic_focus)
                      <div class="font-weight-500 text-xs text-dark">
                        {{ $inquiry->therapeutic_focus }}
                      </div>
                    @endif
                    @if($inquiry->phase)
                      <span class="badge badge-light border text-xs text-muted mt-1">
                        {{ $inquiry->phase }}
                      </span>
                    @endif
                    @if(!$inquiry->therapeutic_focus && !$inquiry->phase)
                      <span class="text-muted text-xs">&mdash;</span>
                    @endif
                  </td>

                  <!-- Message Preview -->
                  <td style="max-width: 280px;">
                    <div class="text-xs text-muted text-truncate" title="{{ $inquiry->message }}" style="max-width: 280px;">
                      {{ $inquiry->message ?: 'No message notes provided.' }}
                    </div>
                  </td>

                  <!-- Status Selector Dropdown Form -->
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

                  <!-- Submission Date -->
                  <td class="text-xs text-muted">
                    <span title="{{ $inquiry->created_at->format('M d, Y h:i A') }}">
                      {{ $inquiry->created_at->diffForHumans() }}
                    </span>
                  </td>

                  <!-- Action Buttons -->
                  <td class="text-right">
                    <div class="btn-group btn-group-sm">
                      <button type="button" class="btn btn-white btn-xs" title="View Full Details" 
                              onclick="openEnquiryModal({{ json_encode($inquiry) }}, '{{ $inquiry->created_at->format('M d, Y h:i A') }}', '{{ $inquiry->created_at->diffForHumans() }}')">
                        <i class="fas fa-eye text-primary"></i>
                      </button>

                      <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete enquiry #{{ $inquiry->id }} permanently?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-white btn-xs text-danger" title="Delete Enquiry">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="text-center py-5 text-muted">
                    <div style="font-size: 2.2rem; color: #cbd5e1; margin-bottom: 0.5rem;">
                      <i class="fas fa-envelope-open"></i>
                    </div>
                    <h5 class="text-dark font-weight-bold mb-1">No Enquiries Found</h5>
                    <p class="text-xs mb-0">Inbound requests submitted via public forms will appear here automatically.</p>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      <!-- Card Footer Pagination -->
      @if($inquiries instanceof \Illuminate\Pagination\LengthAwarePaginator && $inquiries->hasPages())
        <div class="card-footer bg-white border-top py-3 px-4 d-flex justify-content-between align-items-center">
          <small class="text-muted text-xs">
            Showing {{ $inquiries->firstItem() }} to {{ $inquiries->lastItem() }} of {{ $inquiries->total() }} enquiries
          </small>
          <div>
            {{ $inquiries->links('pagination::bootstrap-4') }}
          </div>
        </div>
      @endif

    </div>
  </div>

</div>

<!-- ========================================================================= -->
<!-- ENQUIRY DETAILS MODAL -->
<!-- ========================================================================= -->
<div class="modal fade" id="enquiryModal" tabindex="-1" role="dialog" aria-labelledby="enquiryModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content border-0 shadow" style="border-radius: 12px; overflow: hidden;">
      
      <div class="modal-header py-3 px-4 bg-light border-bottom">
        <div>
          <span id="modalTypeBadge" class="pill-badge pill-rfp font-weight-bold mr-2">RFP</span>
          <span class="font-weight-bold text-dark text-sm" id="enquiryModalTitle">Enquiry Details</span>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body p-4">
        
        <!-- Client Profile Strip -->
        <div class="p-3 mb-4 rounded border bg-light d-flex flex-wrap justify-content-between align-items-center" style="border-radius: 8px;">
          <div>
            <h5 class="font-weight-bold text-dark mb-1" id="modalClientName">Client Name</h5>
            <div class="text-xs text-muted" id="modalClientOrg">Company / Sponsor</div>
          </div>
          <div class="text-right mt-2 mt-sm-0">
            <span class="badge badge-light border text-muted px-2 py-1 text-xs" id="modalSubmittedDate">Submitted Date</span>
          </div>
        </div>

        <!-- Contact & Parameters Grid -->
        <div class="row mb-3">
          <div class="col-sm-6 mb-3">
            <label class="text-xs font-weight-bold text-muted text-uppercase mb-1 d-block">Email Address</label>
            <a href="#" id="modalEmailLink" class="font-weight-bold text-primary text-sm">
              <span id="modalClientEmail">email@example.com</span> &rarr;
            </a>
          </div>

          <div class="col-sm-6 mb-3">
            <label class="text-xs font-weight-bold text-muted text-uppercase mb-1 d-block">Telephone / Hotline</label>
            <span id="modalClientPhone" class="font-weight-bold text-dark text-sm">&mdash;</span>
          </div>

          <div class="col-sm-6 mb-3">
            <label class="text-xs font-weight-bold text-muted text-uppercase mb-1 d-block">Therapeutic Focus / Area</label>
            <span id="modalTherapeutic" class="font-weight-bold text-dark text-sm">&mdash;</span>
          </div>

          <div class="col-sm-6 mb-3">
            <label class="text-xs font-weight-bold text-muted text-uppercase mb-1 d-block">Clinical Study Phase</label>
            <span id="modalStudyPhase" class="badge badge-light border text-xs font-weight-bold">&mdash;</span>
          </div>
        </div>

        <hr class="my-3">

        <!-- Protocol Message -->
        <div class="form-group mb-0">
          <label class="text-xs font-weight-bold text-muted text-uppercase mb-2 d-block">Message / Study Protocol Criteria</label>
          <div class="p-3 rounded border bg-white" style="border-radius: 8px; min-height: 100px; max-height: 250px; overflow-y: auto; font-size: 0.875rem; line-height: 1.6; color: #334155; white-space: pre-wrap;" id="modalMessageContent">
            No message content.
          </div>
        </div>

      </div>

      <div class="modal-footer py-3 px-4 bg-light border-top d-flex justify-content-between align-items-center">
        <div>
          <a href="#" id="modalDirectReplyBtn" class="btn btn-primary btn-sm font-weight-bold">
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
  function openEnquiryModal(inquiry, formattedDate, humanDate) {
    document.getElementById('enquiryModalTitle').textContent = 'Enquiry #' + inquiry.id + ' — ' + (inquiry.type === 'rfp' ? 'Study RFP Proposal' : 'General Contact');
    
    const typeBadge = document.getElementById('modalTypeBadge');
    if (inquiry.type === 'rfp') {
      typeBadge.textContent = 'Study RFP';
      typeBadge.className = 'pill-badge pill-rfp font-weight-bold mr-2';
    } else {
      typeBadge.textContent = 'General Contact';
      typeBadge.className = 'pill-badge pill-contact font-weight-bold mr-2';
    }

    document.getElementById('modalClientName').textContent = inquiry.name || 'Unnamed Client';
    document.getElementById('modalClientOrg').textContent = inquiry.organization ? 'Organization: ' + inquiry.organization : 'Individual Sponsor / Investigator';
    document.getElementById('modalSubmittedDate').textContent = formattedDate + ' (' + humanDate + ')';

    document.getElementById('modalClientEmail').textContent = inquiry.email || '—';
    document.getElementById('modalEmailLink').href = 'mailto:' + (inquiry.email || '');

    document.getElementById('modalClientPhone').textContent = inquiry.phone || 'Not provided';
    document.getElementById('modalTherapeutic').textContent = inquiry.therapeutic_focus || 'General / Unspecified';
    document.getElementById('modalStudyPhase').textContent = inquiry.phase || 'N/A';

    document.getElementById('modalMessageContent').textContent = inquiry.message || 'No additional protocol notes provided.';
    document.getElementById('modalDirectReplyBtn').href = 'mailto:' + (inquiry.email || '') + '?subject=' + encodeURIComponent('RE: Trevanta International - Study Inquiry #' + inquiry.id);

    $('#enquiryModal').modal('show');
  }
</script>
@endpush
@endsection

