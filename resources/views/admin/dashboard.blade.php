@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 align-items-center">
      <div class="col-sm-6">
        <h1 class="m-0 font-weight-bold text-dark">Dashboard</h1>
        <p class="text-muted text-sm mb-0">Overview of website study proposals &amp; contact inquiries</p>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right bg-transparent p-0 mb-0">
          <li class="breadcrumb-item active"><i class="fas fa-home mr-1"></i> Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    
    <!-- Info boxes (Light Theme) -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box bg-white">
          <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-inbox"></i></span>
          <div class="info-box-content">
            <span class="info-box-text text-muted font-weight-bold">Total Inquiries</span>
            <span class="info-box-number text-dark h4 mb-0 font-weight-bold">{{ $totalInquiries }}</span>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box bg-white">
          <span class="info-box-icon bg-warning text-white elevation-1"><i class="fas fa-file-medical"></i></span>
          <div class="info-box-content">
            <span class="info-box-text text-muted font-weight-bold">Study RFPs</span>
            <span class="info-box-number text-dark h4 mb-0 font-weight-bold">{{ $totalRfps }}</span>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box bg-white">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-envelope"></i></span>
          <div class="info-box-content">
            <span class="info-box-text text-muted font-weight-bold">Contact Messages</span>
            <span class="info-box-number text-dark h4 mb-0 font-weight-bold">{{ $totalContacts }}</span>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box bg-white">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-clock"></i></span>
          <div class="info-box-content">
            <span class="info-box-text text-muted font-weight-bold">Pending Review</span>
            <span class="info-box-number text-dark h4 mb-0 font-weight-bold">{{ $pendingRfps }}</span>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <!-- Inquiries & RFPs Table Card (Full Width) -->
    <div class="row">
      <div class="col-12">
        <div class="card card-white">
          <div class="card-header border-bottom d-flex flex-wrap align-items-center justify-content-between py-3">
            <h3 class="card-title font-weight-bold text-dark mb-0">
              <i class="fas fa-list-alt mr-2 text-primary"></i> Inquiries &amp; Study RFPs
            </h3>
            
            <div class="card-tools ml-auto">
              <div class="btn-group btn-group-sm">
                <a href="{{ route('admin.dashboard') }}" class="btn {{ !request()->has('filter') ? 'btn-primary' : 'btn-outline-secondary' }}">
                  All
                </a>
                <a href="{{ route('admin.dashboard', ['filter' => 'rfp']) }}" class="btn {{ request('filter') === 'rfp' ? 'btn-warning text-dark font-weight-bold' : 'btn-outline-secondary' }}">
                  RFPs
                </a>
                <a href="{{ route('admin.dashboard', ['filter' => 'contact']) }}" class="btn {{ request('filter') === 'contact' ? 'btn-info' : 'btn-outline-secondary' }}">
                  Contacts
                </a>
                <a href="{{ route('admin.dashboard', ['filter' => 'pending']) }}" class="btn {{ request('filter') === 'pending' ? 'btn-danger' : 'btn-outline-secondary' }}">
                  Pending
                </a>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-hover table-striped align-middle mb-0">
                <thead class="bg-light text-muted text-xs text-uppercase">
                  <tr>
                    <th>#</th>
                    <th>Type</th>
                    <th>Name &amp; Contact</th>
                    <th>Company</th>
                    <th>Phase / Area</th>
                    <th>Message / Synopsis</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($inquiries as $inquiry)
                    <tr>
                      <td class="font-weight-bold text-muted text-xs">#{{ $inquiry->id }}</td>
                      <td>
                        @if($inquiry->type === 'rfp')
                          <span class="badge badge-warning text-dark font-weight-bold px-2 py-1">RFP</span>
                        @else
                          <span class="badge badge-info px-2 py-1">Contact</span>
                        @endif
                      </td>
                      <td>
                        <div class="font-weight-bold text-dark">{{ $inquiry->name }}</div>
                        <small class="text-muted d-block">{{ $inquiry->email }}</small>
                        @if($inquiry->phone)
                          <small class="text-muted">{{ $inquiry->phone }}</small>
                        @endif
                      </td>
                      <td>
                        <span class="text-sm">{{ $inquiry->organization ?? '-' }}</span>
                      </td>
                      <td>
                        @if($inquiry->phase)
                          <div class="text-xs font-weight-bold text-dark">{{ $inquiry->phase }}</div>
                        @endif
                        @if($inquiry->therapeutic_focus)
                          <small class="text-muted">{{ $inquiry->therapeutic_focus }}</small>
                        @endif
                        @if(!$inquiry->phase && !$inquiry->therapeutic_focus)
                          <span class="text-muted">-</span>
                        @endif
                      </td>
                      <td style="max-width: 250px;">
                        <span class="text-truncate d-block text-sm" style="max-width: 240px;" title="{{ $inquiry->message }}">
                          {{ $inquiry->message ?? '-' }}
                        </span>
                      </td>
                      <td>
                        @if($inquiry->status === 'new')
                          <span class="badge badge-warning text-dark font-weight-bold">Pending</span>
                        @elseif($inquiry->status === 'in_review')
                          <span class="badge badge-primary font-weight-bold">In Review</span>
                        @elseif($inquiry->status === 'contacted')
                          <span class="badge badge-info font-weight-bold">Contacted</span>
                        @else
                          <span class="badge badge-success font-weight-bold">Closed</span>
                        @endif
                      </td>
                      <td class="text-muted text-xs">
                        {{ $inquiry->created_at ? $inquiry->created_at->format('M d, Y') : '-' }}
                      </td>
                      <td class="text-right">
                        <div class="btn-group btn-group-sm">
                          <!-- Status changer dropdown -->
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
                          <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#modal-view-{{ $inquiry->id }}" title="View details">
                            <i class="fas fa-eye"></i>
                          </button>

                          <!-- Delete Action -->
                          <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Delete this inquiry?');" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" title="Delete">
                              <i class="fas fa-trash"></i>
                            </button>
                          </form>
                        </div>

                        <!-- Modal for View Details -->
                        <div class="modal fade text-left" id="modal-view-{{ $inquiry->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content shadow">
                              <div class="modal-header bg-light">
                                <h5 class="modal-title font-weight-bold">
                                  {{ $inquiry->type === 'rfp' ? 'Study RFP Proposal' : 'Contact Inquiry' }} #{{ $inquiry->id }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <dl class="row mb-0">
                                  <dt class="col-sm-4 text-muted">Name:</dt>
                                  <dd class="col-sm-8 font-weight-bold">{{ $inquiry->name }}</dd>

                                  <dt class="col-sm-4 text-muted">Email:</dt>
                                  <dd class="col-sm-8"><a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a></dd>

                                  @if($inquiry->phone)
                                    <dt class="col-sm-4 text-muted">Phone:</dt>
                                    <dd class="col-sm-8">{{ $inquiry->phone }}</dd>
                                  @endif

                                  @if($inquiry->organization)
                                    <dt class="col-sm-4 text-muted">Company:</dt>
                                    <dd class="col-sm-8">{{ $inquiry->organization }}</dd>
                                  @endif

                                  @if($inquiry->phase)
                                    <dt class="col-sm-4 text-muted">Trial Phase:</dt>
                                    <dd class="col-sm-8">{{ $inquiry->phase }}</dd>
                                  @endif

                                  @if($inquiry->therapeutic_focus)
                                    <dt class="col-sm-4 text-muted">Therapeutic Focus:</dt>
                                    <dd class="col-sm-8">{{ $inquiry->therapeutic_focus }}</dd>
                                  @endif

                                  <dt class="col-sm-4 text-muted">Message:</dt>
                                  <dd class="col-sm-8 bg-light p-2 rounded text-dark">
                                    {{ $inquiry->message ?? 'No additional message provided.' }}
                                  </dd>

                                  <dt class="col-sm-4 text-muted">Date:</dt>
                                  <dd class="col-sm-8 text-muted">{{ $inquiry->created_at ? $inquiry->created_at->format('M d, Y H:i') : '-' }}</dd>
                                </dl>
                              </div>
                              <div class="modal-footer bg-light py-2">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                <a href="mailto:{{ $inquiry->email }}" class="btn btn-primary btn-sm">
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
                        <i class="fas fa-inbox fa-3x mb-3 text-muted d-block"></i>
                        No inquiries found.
                      </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card-body -->

          @if(method_exists($inquiries, 'hasPages') && $inquiries->hasPages())
            <div class="card-footer bg-white border-top d-flex justify-content-center py-3">
              {{ $inquiries->withQueryString()->links() }}
            </div>
          @endif
        </div>
      </div>
    </div>
    <!-- /.row -->

  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
