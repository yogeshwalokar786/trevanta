@extends('admin.layouts.app')

@section('title', 'Study RFPs & Inquiries Management')

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 align-items-center">
      <div class="col-sm-6">
        <h1 class="m-0 font-weight-bold text-dark">Study RFPs &amp; Sponsor Inquiries</h1>
        <p class="text-muted text-sm mb-0">Review clinical study protocol requests, sponsor inquiries, and status tracking.</p>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right bg-transparent p-0 mb-0">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Inquiries</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <!-- Filters Bar -->
    <div class="card card-white mb-3">
      <div class="card-body py-3 d-flex flex-wrap align-items-center justify-content-between">
        <div class="btn-group btn-group-sm mb-2 mb-md-0" role="group">
          <a href="{{ route('admin.inquiries') }}" class="btn {{ empty($type) ? 'btn-primary' : 'btn-outline-secondary' }}">
            All Types
          </a>
          <a href="{{ route('admin.inquiries', ['type' => 'rfp']) }}" class="btn {{ $type === 'rfp' ? 'btn-warning text-dark font-weight-bold' : 'btn-outline-secondary' }}">
            <i class="fas fa-file-signature mr-1"></i> Study RFPs
          </a>
          <a href="{{ route('admin.inquiries', ['type' => 'contact']) }}" class="btn {{ $type === 'contact' ? 'btn-info' : 'btn-outline-secondary' }}">
            <i class="fas fa-comments mr-1"></i> General Contacts
          </a>
        </div>

        <div class="btn-group btn-group-sm" role="group">
          <a href="{{ route('admin.inquiries', array_merge(request()->query(), ['status' => 'new'])) }}" class="btn {{ $status === 'new' ? 'btn-warning text-dark font-weight-bold' : 'btn-outline-secondary' }}">
            Pending Review
          </a>
          <a href="{{ route('admin.inquiries', array_merge(request()->query(), ['status' => 'in_review'])) }}" class="btn {{ $status === 'in_review' ? 'btn-primary' : 'btn-outline-secondary' }}">
            In Review
          </a>
          <a href="{{ route('admin.inquiries', array_merge(request()->query(), ['status' => 'contacted'])) }}" class="btn {{ $status === 'contacted' ? 'btn-info' : 'btn-outline-secondary' }}">
            Contacted
          </a>
          <a href="{{ route('admin.inquiries', array_merge(request()->query(), ['status' => 'closed'])) }}" class="btn {{ $status === 'closed' ? 'btn-success' : 'btn-outline-secondary' }}">
            Closed
          </a>
        </div>
      </div>
    </div>

    <!-- Inquiries Table Card -->
    <div class="card card-white">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover table-striped align-middle mb-0">
            <thead class="bg-light text-muted text-xs text-uppercase">
              <tr>
                <th>#</th>
                <th>Type</th>
                <th>Investigator / Contact</th>
                <th>Organization</th>
                <th>Trial Phase / Service</th>
                <th>Therapeutic Area</th>
                <th>Status</th>
                <th>Received</th>
                <th class="text-right">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse($inquiries as $inquiry)
                <tr>
                  <td class="font-weight-bold text-muted text-xs">#{{ $inquiry->id }}</td>
                  <td>
                    @if($inquiry->type === 'rfp')
                      <span class="badge badge-warning text-dark font-weight-bold px-2 py-1"><i class="fas fa-dna mr-1"></i> RFP</span>
                    @else
                      <span class="badge badge-info px-2 py-1"><i class="fas fa-envelope mr-1"></i> Contact</span>
                    @endif
                  </td>
                  <td>
                    <div class="font-weight-bold text-dark">{{ $inquiry->name }}</div>
                    <small class="text-muted d-block">{{ $inquiry->email }}</small>
                    @if($inquiry->phone)
                      <small class="text-muted"><i class="fas fa-phone fa-xs mr-1"></i> {{ $inquiry->phone }}</small>
                    @endif
                  </td>
                  <td>
                    <span class="text-sm font-weight-semibold">{{ $inquiry->organization ?? 'Sponsor Confidential' }}</span>
                  </td>
                  <td>
                    <span class="badge badge-light border text-sm font-weight-bold">
                      {{ $inquiry->phase ?? 'Clinical Service' }}
                    </span>
                  </td>
                  <td>
                    <span class="text-sm font-weight-semibold text-primary">
                      {{ $inquiry->therapeutic_focus ?? 'Not Specified' }}
                    </span>
                  </td>
                  <td>
                    @if($inquiry->status === 'new')
                      <span class="badge badge-warning text-dark font-weight-bold">Pending Review</span>
                    @elseif($inquiry->status === 'in_review')
                      <span class="badge badge-primary font-weight-bold">In Review</span>
                    @elseif($inquiry->status === 'contacted')
                      <span class="badge badge-info font-weight-bold">Contacted</span>
                    @else
                      <span class="badge badge-success font-weight-bold">Closed</span>
                    @endif
                  </td>
                  <td class="text-muted text-xs">
                    {{ $inquiry->created_at ? $inquiry->created_at->format('M d, Y H:i') : 'Recent' }}
                  </td>
                  <td class="text-right">
                    <div class="btn-group btn-group-sm">
                      <!-- Status Dropdown -->
                      <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                        Status
                      </button>
                      <div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
                        <form action="{{ route('admin.inquiries.status', $inquiry->id) }}" method="POST">
                          @csrf
                          @method('PATCH')
                          <button type="submit" name="status" value="new" class="dropdown-item text-xs font-weight-bold text-warning"><i class="fas fa-clock mr-2"></i> Pending</button>
                          <button type="submit" name="status" value="in_review" class="dropdown-item text-xs font-weight-bold text-primary"><i class="fas fa-spinner mr-2"></i> In Review</button>
                          <button type="submit" name="status" value="contacted" class="dropdown-item text-xs font-weight-bold text-info"><i class="fas fa-phone mr-2"></i> Contacted</button>
                          <button type="submit" name="status" value="closed" class="dropdown-item text-xs font-weight-bold text-success"><i class="fas fa-check-circle mr-2"></i> Closed</button>
                        </form>
                      </div>

                      <!-- View Details Modal Trigger -->
                      <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-inquiry-{{ $inquiry->id }}" title="View protocol details">
                        <i class="fas fa-eye"></i>
                      </button>

                      <!-- Delete Action -->
                      <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this submission?');" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger" title="Delete">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                    </div>

                    <!-- Modal for Full Details -->
                    <div class="modal fade text-left" id="modal-inquiry-{{ $inquiry->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content shadow">
                          <div class="modal-header bg-light">
                            <h5 class="modal-title font-weight-bold">
                              {{ $inquiry->type === 'rfp' ? 'Study RFP Proposal Details' : 'Contact Inquiry Details' }} #{{ $inquiry->id }}
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <dl class="row mb-0">
                              <dt class="col-sm-4 text-muted">Sponsor / Lead:</dt>
                              <dd class="col-sm-8 font-weight-bold">{{ $inquiry->name }}</dd>

                              <dt class="col-sm-4 text-muted">Email:</dt>
                              <dd class="col-sm-8"><a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a></dd>

                              @if($inquiry->phone)
                                <dt class="col-sm-4 text-muted">Phone:</dt>
                                <dd class="col-sm-8">{{ $inquiry->phone }}</dd>
                              @endif

                              @if($inquiry->organization)
                                <dt class="col-sm-4 text-muted">Company / Org:</dt>
                                <dd class="col-sm-8">{{ $inquiry->organization }}</dd>
                              @endif

                              @if($inquiry->phase)
                                <dt class="col-sm-4 text-muted">Trial Phase:</dt>
                                <dd class="col-sm-8"><span class="badge badge-warning text-dark font-weight-bold">{{ $inquiry->phase }}</span></dd>
                              @endif

                              @if($inquiry->therapeutic_focus)
                                <dt class="col-sm-4 text-muted">Therapeutic Focus:</dt>
                                <dd class="col-sm-8"><span class="badge badge-primary">{{ $inquiry->therapeutic_focus }}</span></dd>
                              @endif

                              <dt class="col-sm-4 text-muted">Protocol Details:</dt>
                              <dd class="col-sm-8 bg-light p-2 rounded text-dark">
                                {{ $inquiry->message ?? 'No additional protocol synopsis provided.' }}
                              </dd>

                              <dt class="col-sm-4 text-muted">Received At:</dt>
                              <dd class="col-sm-8 text-muted">{{ $inquiry->created_at ? $inquiry->created_at->toDayDateTimeString() : 'Recent' }}</dd>
                            </dl>
                          </div>
                          <div class="modal-footer bg-light py-2">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <a href="mailto:{{ $inquiry->email }}?subject=RE: AstraClinical Proposal Inquiry" class="btn btn-primary btn-sm">
                              <i class="fas fa-reply mr-1"></i> Reply via Email
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>

                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="9" class="text-center py-5 text-muted">
                    <i class="fas fa-clipboard-list fa-3x mb-3 text-muted d-block"></i>
                    No submissions found matching the criteria.
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      @if(method_exists($inquiries, 'hasPages') && $inquiries->hasPages())
        <div class="card-footer bg-white border-top d-flex justify-content-center py-3">
          {{ $inquiries->withQueryString()->links() }}
        </div>
      @endif

    </div>

  </div>
</section>
@endsection

