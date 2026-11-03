@extends('admin.layouts.app')

@section('title', 'Clinical Trial Executive Dashboard')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 align-items-center">
      <div class="col-sm-6">
        <h1 class="m-0 font-weight-bold text-dark">Clinical Operations Executive Dashboard</h1>
        <p class="text-muted text-sm mb-0">Phase I–IV Trial Inquiries, Site Feasibility &amp; Regulatory Submissions</p>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right bg-transparent p-0 mb-0">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
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
          <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-file-signature"></i></span>
          <div class="info-box-content">
            <span class="info-box-text text-muted font-weight-bold">Study RFPs</span>
            <span class="info-box-number text-dark h4 mb-0 font-weight-bold">{{ $totalRfps }}</span>
            <small class="text-success"><i class="fas fa-arrow-up"></i> Trial Proposals</small>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box bg-white">
          <span class="info-box-icon bg-warning text-white elevation-1"><i class="fas fa-clock"></i></span>
          <div class="info-box-content">
            <span class="info-box-text text-muted font-weight-bold">New &amp; Pending Review</span>
            <span class="info-box-number text-dark h4 mb-0 font-weight-bold">{{ $pendingRfps }}</span>
            <small class="text-warning font-weight-bold">Awaiting Medical Director</small>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box bg-white">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-comments"></i></span>
          <div class="info-box-content">
            <span class="info-box-text text-muted font-weight-bold">General Inquiries</span>
            <span class="info-box-number text-dark h4 mb-0 font-weight-bold">{{ $totalContacts }}</span>
            <small class="text-muted">Direct Sponsor Contacts</small>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box bg-white">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-globe-americas"></i></span>
          <div class="info-box-content">
            <span class="info-box-text text-muted font-weight-bold">Global Footprint</span>
            <span class="info-box-number text-dark h4 mb-0 font-weight-bold">28 Countries</span>
            <small class="text-success">8,500+ Qualified Sites</small>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
      <!-- Left col (Recent Inquiries Table) -->
      <section class="col-lg-8 connectedSortable">
        
        <div class="card card-white">
          <div class="card-header border-bottom d-flex align-items-center justify-content-between py-3">
            <h3 class="card-title font-weight-bold text-dark mb-0">
              <i class="fas fa-inbox mr-2 text-primary"></i> Recent Protocol Proposals &amp; Inquiries
            </h3>
            <div class="card-tools ml-auto">
              <a href="{{ route('admin.inquiries') }}" class="btn btn-sm btn-outline-primary font-weight-bold">
                View All Inquiries <i class="fas fa-arrow-right ml-1"></i>
              </a>
            </div>
          </div>
          <!-- /.card-header -->
          
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-hover table-striped align-middle mb-0">
                <thead class="bg-light">
                  <tr class="text-muted text-xs text-uppercase">
                    <th>Type</th>
                    <th>Investigator / Lead</th>
                    <th>Phase / Service</th>
                    <th>Therapeutic Focus</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th class="text-right">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($recentInquiries as $inquiry)
                    <tr>
                      <td>
                        @if($inquiry->type === 'rfp')
                          <span class="badge badge-warning text-dark font-weight-bold px-2 py-1"><i class="fas fa-dna mr-1"></i> RFP</span>
                        @else
                          <span class="badge badge-info px-2 py-1"><i class="fas fa-envelope mr-1"></i> Contact</span>
                        @endif
                      </td>
                      <td>
                        <div class="font-weight-bold text-dark">{{ $inquiry->name }}</div>
                        <small class="text-muted">{{ $inquiry->email }}</small>
                      </td>
                      <td>
                        <span class="text-sm font-weight-semibold">{{ $inquiry->phase ?? 'Clinical Inquiry' }}</span>
                      </td>
                      <td>
                        <span class="badge badge-light border text-muted px-2 py-1">
                          {{ $inquiry->therapeutic_focus ?? 'General' }}
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
                        {{ $inquiry->created_at ? $inquiry->created_at->format('M d, Y') : 'Recent' }}
                      </td>
                      <td class="text-right">
                        <div class="btn-group btn-group-sm">
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
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="7" class="text-center py-4 text-muted">
                        <i class="fas fa-inbox fa-3x mb-3 text-muted d-block"></i>
                        No protocol inquiries received yet. Submit test inquiries from the <a href="{{ route('home') }}" target="_blank">public website</a>.
                      </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.Left col -->

      <!-- Right col -->
      <section class="col-lg-4 connectedSortable">
        
        <!-- Therapeutic Focus Card -->
        <div class="card card-white">
          <div class="card-header border-bottom py-3">
            <h3 class="card-title font-weight-bold text-dark">
              <i class="fas fa-chart-pie mr-2 text-warning"></i> Therapeutic Pipeline
            </h3>
          </div>
          <div class="card-body">
            
            <div class="progress-group mb-3">
              <span class="font-weight-semibold text-sm">Oncology &amp; Hematology</span>
              <span class="float-right text-xs font-weight-bold text-primary">40%</span>
              <div class="progress progress-sm mt-1">
                <div class="progress-bar bg-primary" style="width: 40%"></div>
              </div>
            </div>

            <div class="progress-group mb-3">
              <span class="font-weight-semibold text-sm">Neurology &amp; CNS</span>
              <span class="float-right text-xs font-weight-bold text-success">25%</span>
              <div class="progress progress-sm mt-1">
                <div class="progress-bar bg-success" style="width: 25%"></div>
              </div>
            </div>

            <div class="progress-group mb-3">
              <span class="font-weight-semibold text-sm">Immunology &amp; Inflammation</span>
              <span class="float-right text-xs font-weight-bold text-warning">20%</span>
              <div class="progress progress-sm mt-1">
                <div class="progress-bar bg-warning" style="width: 20%"></div>
              </div>
            </div>

            <div class="progress-group mb-3">
              <span class="font-weight-semibold text-sm">Rare &amp; Orphan Disease</span>
              <span class="float-right text-xs font-weight-bold text-danger">10%</span>
              <div class="progress progress-sm mt-1">
                <div class="progress-bar bg-danger" style="width: 10%"></div>
              </div>
            </div>

            <div class="progress-group mb-0">
              <span class="font-weight-semibold text-sm">Cardiovascular &amp; Metabolic</span>
              <span class="float-right text-xs font-weight-bold text-info">5%</span>
              <div class="progress progress-sm mt-1">
                <div class="progress-bar bg-info" style="width: 5%"></div>
              </div>
            </div>

          </div>
        </div>
        <!-- /.card -->

        <!-- System Status Card -->
        <div class="card card-white">
          <div class="card-header border-bottom py-3">
            <h3 class="card-title font-weight-bold text-dark">
              <i class="fas fa-server mr-2 text-info"></i> Operations Platform
            </h3>
          </div>
          <div class="card-body p-0">
            <ul class="list-group list-group-flush text-sm">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Theme</span>
                <span class="badge badge-light border font-weight-bold">AdminLTE v3 (Light)</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Framework</span>
                <span class="badge badge-light border">Laravel {{ app()->version() }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Compliance</span>
                <span class="badge badge-success">ICH-GCP &bull; 21 CFR 11</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Session Engine</span>
                <span class="badge badge-info">{{ config('session.driver') }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Database</span>
                <span class="badge badge-primary">{{ config('database.default') }}</span>
              </li>
            </ul>
          </div>
        </div>
        <!-- /.card -->

      </section>
      <!-- /.Right col -->
    </div>
    <!-- /.row (main row) -->

  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

