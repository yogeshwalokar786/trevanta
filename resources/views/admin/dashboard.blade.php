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

    <!-- Main Inquiries Table Card -->
    <div class="card">
      <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
        <div>
          <h3 class="card-title mb-1">
            <i class="fas fa-list-alt text-muted mr-2"></i> Clinical Inquiries &amp; Feasibility RFPs
          </h3>
          <p class="text-muted text-xs mb-0">Review clinical sponsor submissions and update review statuses.</p>
        </div>
        
        <!-- Filter Pills & Enquiries Page Link -->
        <div class="mt-2 mt-md-0 d-flex align-items-center">
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
              Pending ({{ $pendingRfps }})
            </a>
          </div>
          <a href="{{ route('admin.inquiries.index') }}" class="btn btn-white btn-sm ml-2 text-primary font-weight-bold" title="Open dedicated Enquiries manager">
            <i class="fas fa-envelope-open-text mr-1"></i> All Enquiries &rarr;
          </a>
        </div>
      </div>

      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead>
              <tr>
                <th style="width: 50px;">#</th>
                <th>Type</th>
                <th>Contact Person</th>
                <th>Organization</th>
                <th>Phase &amp; Therapeutic Area</th>
                <th>Message Synopsis</th>
                <th>Status</th>
                <th>Date</th>
                <th class="text-right" style="min-width: 140px;">Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse($inquiries as $inquiry)
                <tr>
                  <td class="font-weight-bold text-muted text-xs">
                    #{{ $inquiry->id }}
                  </td>
                  <td>
                    @if($inquiry->type === 'rfp')
                      <span class="pill-badge pill-rfp">
                        <i class="fas fa-file-medical text-xs"></i> RFP
                      </span>
                    @else
                      <span class="pill-badge pill-contact">
                        <i class="fas fa-envelope text-xs"></i> Contact
                      </span>
                    @endif
                  </td>
                  <td>
                    <div class="font-weight-bold text-dark" style="font-size: 0.925rem;">
                      {{ $inquiry->name }}
                    </div>
                    <div class="text-muted text-xs mt-0">
                      <a href="mailto:{{ $inquiry->email }}" class="text-muted">{{ $inquiry->email }}</a>
                      @if($inquiry->phone)
                        <span class="mx-1">&bull;</span> {{ $inquiry->phone }}
                      @endif
                    </div>
                  </td>
                  <td>
                    <span class="font-weight-medium text-dark text-sm">
                      {{ $inquiry->organization ?: 'Confidential Sponsor' }}
                    </span>
                  </td>
                  <td>
                    @if($inquiry->phase)
                      <div class="font-weight-bold text-dark text-xs">{{ $inquiry->phase }}</div>
                    @endif
                    @if($inquiry->therapeutic_focus)
                      <div class="text-muted text-xs">{{ $inquiry->therapeutic_focus }}</div>
                    @endif
                    @if(!$inquiry->phase && !$inquiry->therapeutic_focus)
                      <span class="text-muted text-xs">&mdash;</span>
                    @endif
                  </td>
                  <td>
                    <span class="text-truncate d-block text-xs text-muted" style="max-width: 260px;" title="{{ $inquiry->message }}">
                      {{ $inquiry->message ?: 'No message provided' }}
                    </span>
                  </td>
                  <td>
                    @if($inquiry->status === 'new')
                      <span class="pill-badge pill-pending">Pending</span>
                    @elseif($inquiry->status === 'in_review')
                      <span class="pill-badge pill-review">In Review</span>
                    @elseif($inquiry->status === 'contacted')
                      <span class="pill-badge pill-contacted">Contacted</span>
                    @else
                      <span class="pill-badge pill-closed">Closed</span>
                    @endif
                  </td>
                  <td class="text-xs text-muted">
                    {{ $inquiry->created_at ? $inquiry->created_at->format('M d, Y') : '&mdash;' }}
                  </td>
                  <td class="text-right">
                    <div class="btn-group btn-group-sm">
                      
                      <!-- Quick View Modal Trigger -->
                      <button type="button" class="btn btn-white" data-toggle="modal" data-target="#modal-view-{{ $inquiry->id }}" title="View details">
                        <i class="fas fa-eye text-primary"></i>
                      </button>

                      <!-- Status Changer Dropdown -->
                      <button type="button" class="btn btn-white dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false" title="Change Review Status">
                        <i class="fas fa-tasks text-muted"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right shadow-sm border py-2" style="border-radius: 10px; font-size: 0.85rem;">
                        <span class="dropdown-header text-uppercase text-xs font-weight-bold text-muted px-3">Set Status</span>
                        <form action="{{ route('admin.inquiries.status', $inquiry->id) }}" method="POST">
                          @csrf
                          @method('PATCH')
                          <button type="submit" name="status" value="new" class="dropdown-item py-2 px-3 {{ $inquiry->status === 'new' ? 'font-weight-bold text-warning' : '' }}">
                            <i class="fas fa-clock mr-2 text-warning"></i> Mark Pending
                          </button>
                          <button type="submit" name="status" value="in_review" class="dropdown-item py-2 px-3 {{ $inquiry->status === 'in_review' ? 'font-weight-bold text-primary' : '' }}">
                            <i class="fas fa-spinner mr-2 text-primary"></i> Mark In Review
                          </button>
                          <button type="submit" name="status" value="contacted" class="dropdown-item py-2 px-3 {{ $inquiry->status === 'contacted' ? 'font-weight-bold text-success' : '' }}">
                            <i class="fas fa-phone mr-2 text-success"></i> Mark Contacted
                          </button>
                          <button type="submit" name="status" value="closed" class="dropdown-item py-2 px-3 {{ $inquiry->status === 'closed' ? 'font-weight-bold text-muted' : '' }}">
                            <i class="fas fa-check mr-2 text-muted"></i> Mark Closed
                          </button>
                        </form>
                      </div>

                      <!-- Delete Action -->
                      <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete inquiry #{{ $inquiry->id }}?');" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-white text-danger" title="Delete">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </form>

                    </div>

                    <!-- Clean View Modal -->
                    <div class="modal fade text-left" id="modal-view-{{ $inquiry->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
                          <div class="modal-header border-bottom py-3 px-4 bg-light">
                            <div>
                              <h5 class="modal-title font-weight-bold text-dark mb-0">
                                {{ $inquiry->type === 'rfp' ? 'Clinical Study RFP' : 'Contact Message' }} #{{ $inquiry->id }}
                              </h5>
                              <small class="text-muted">Received on {{ $inquiry->created_at ? $inquiry->created_at->format('F d, Y \a\t H:i') : '-' }}</small>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body p-4">
                            <div class="row mb-3">
                              <div class="col-sm-4 text-muted font-weight-bold text-xs text-uppercase">Full Name</div>
                              <div class="col-sm-8 text-dark font-weight-bold">{{ $inquiry->name }}</div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-sm-4 text-muted font-weight-bold text-xs text-uppercase">Email Address</div>
                              <div class="col-sm-8"><a href="mailto:{{ $inquiry->email }}" class="text-primary">{{ $inquiry->email }}</a></div>
                            </div>
                            @if($inquiry->phone)
                              <div class="row mb-3">
                                <div class="col-sm-4 text-muted font-weight-bold text-xs text-uppercase">Phone</div>
                                <div class="col-sm-8 text-dark">{{ $inquiry->phone }}</div>
                              </div>
                            @endif
                            @if($inquiry->organization)
                              <div class="row mb-3">
                                <div class="col-sm-4 text-muted font-weight-bold text-xs text-uppercase">Organization</div>
                                <div class="col-sm-8 text-dark font-weight-bold">{{ $inquiry->organization }}</div>
                              </div>
                            @endif
                            @if($inquiry->phase)
                              <div class="row mb-3">
                                <div class="col-sm-4 text-muted font-weight-bold text-xs text-uppercase">Study Phase</div>
                                <div class="col-sm-8 text-dark">{{ $inquiry->phase }}</div>
                              </div>
                            @endif
                            @if($inquiry->therapeutic_focus)
                              <div class="row mb-3">
                                <div class="col-sm-4 text-muted font-weight-bold text-xs text-uppercase">Therapeutic Focus</div>
                                <div class="col-sm-8 text-dark">{{ $inquiry->therapeutic_focus }}</div>
                              </div>
                            @endif
                            <div class="row mb-0">
                              <div class="col-sm-4 text-muted font-weight-bold text-xs text-uppercase">Inquiry / Protocol Message</div>
                              <div class="col-sm-8">
                                <div class="p-3 rounded bg-light border text-sm text-dark" style="white-space: pre-wrap; line-height: 1.6;">
                                  {{ $inquiry->message ?: 'No message provided.' }}
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer border-top bg-light py-2 px-4 d-flex justify-content-between">
                            <button type="button" class="btn btn-white btn-sm" data-dismiss="modal">Close</button>
                            <a href="mailto:{{ $inquiry->email }}?subject=Re:%20Trevanta%20International%20Inquiry%20#{{ $inquiry->id }}" class="btn btn-primary btn-sm">
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
                    <div class="py-4">
                      <i class="fas fa-inbox fa-3x text-muted mb-3 opacity-50"></i>
                      <p class="font-weight-bold text-dark mb-1">No inquiries found</p>
                      <small class="text-muted">Inbound requests through the public website will appear here in real time.</small>
                    </div>
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
