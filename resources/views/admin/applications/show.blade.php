@extends('admin.layouts.app')

@section('title', 'Candidate Profile - ' . $application->name)
@section('page_heading', 'Candidate Details')

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid px-3">
    <div class="d-flex justify-content-between align-items-center flex-wrap">
      <div>
        <h1 class="m-0 font-weight-bold">{{ $application->name }}</h1>
        <p class="text-muted text-sm mb-0">Applied for: <strong class="text-dark">{{ $application->position_title }}</strong> &bull; Submitted on {{ $application->created_at ? $application->created_at->format('M d, Y h:i A') : 'N/A' }}</p>
      </div>
      <div class="mt-2 mt-sm-0">
        <a href="{{ route('admin.applications.index') }}" class="btn btn-light shadow-sm">
          <i class="fas fa-arrow-left mr-1"></i> Back to Applications
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

    <div class="row">
      <!-- Left Column: Candidate Profile & Cover Letter -->
      <div class="col-lg-8">
        
        <!-- Candidate Overview Card -->
        <div class="card mb-4 border-0 shadow-sm" style="border-radius: 12px;">
          <div class="card-header bg-white border-bottom py-3 px-4">
            <h3 class="card-title text-sm mb-0 font-weight-bold text-dark">
              <i class="fas fa-user text-primary mr-2"></i> Candidate Contact &amp; Background
            </h3>
          </div>
          <div class="card-body p-4">
            <div class="row mb-3">
              <div class="col-sm-6 mb-3">
                <span class="text-xs font-weight-bold text-muted text-uppercase d-block mb-1">Full Name</span>
                <span class="font-weight-bold text-dark" style="font-size: 1.05rem;">{{ $application->name }}</span>
              </div>
              <div class="col-sm-6 mb-3">
                <span class="text-xs font-weight-bold text-muted text-uppercase d-block mb-1">Target Position</span>
                <span class="badge badge-light border px-2 py-1 font-weight-bold text-dark" style="font-size: 0.9rem;">
                  {{ $application->position_title }}
                </span>
                @if($application->jobOpening)
                  <a href="{{ route('admin.jobs.edit', $application->jobOpening->id) }}" class="text-xs text-primary ml-1 font-weight-bold" target="_blank">
                    <i class="fas fa-external-link-alt"></i> View Job Post
                  </a>
                @endif
              </div>

              <div class="col-sm-6 mb-3">
                <span class="text-xs font-weight-bold text-muted text-uppercase d-block mb-1">Email Address</span>
                <a href="mailto:{{ $application->email }}" class="text-dark font-weight-bold">
                  <i class="fas fa-envelope mr-1 text-primary"></i> {{ $application->email }}
                </a>
              </div>
              <div class="col-sm-6 mb-3">
                <span class="text-xs font-weight-bold text-muted text-uppercase d-block mb-1">Phone Number</span>
                @if($application->phone)
                  <a href="tel:{{ $application->phone }}" class="text-dark font-weight-bold">
                    <i class="fas fa-phone mr-1 text-success"></i> {{ $application->phone }}
                  </a>
                @else
                  <span class="text-muted">Not provided</span>
                @endif
              </div>

              <div class="col-sm-6 mb-3">
                <span class="text-xs font-weight-bold text-muted text-uppercase d-block mb-1">Current Location</span>
                <span class="text-dark">
                  <i class="fas fa-map-marker-alt mr-1 text-danger"></i> {{ $application->current_location ?: 'Not specified' }}
                </span>
              </div>
              <div class="col-sm-6 mb-3">
                <span class="text-xs font-weight-bold text-muted text-uppercase d-block mb-1">Total Experience</span>
                <span class="text-dark">
                  <i class="fas fa-briefcase mr-1 text-info"></i> {{ $application->experience ?: 'Not specified' }}
                </span>
              </div>
            </div>

            <!-- Resume Download Box -->
            <div class="p-3 rounded border d-flex align-items-center justify-content-between flex-wrap" style="background: #f8fafc; border-color: #e2e8f0 !important; border-radius: 10px;">
              <div class="d-flex align-items-center mr-3 my-1">
                <div class="mr-3 text-danger" style="font-size: 1.8rem;">
                  <i class="fas fa-file-pdf"></i>
                </div>
                <div>
                  <div class="font-weight-bold text-dark text-sm">Candidate Resume / CV File</div>
                  <small class="text-muted">Original document uploaded by the candidate.</small>
                </div>
              </div>
              <div class="my-1">
                @if($application->resume_path)
                  <a href="{{ route('admin.applications.download', $application->id) }}" class="btn btn-primary btn-sm px-3 shadow-sm font-weight-bold">
                    <i class="fas fa-download mr-1"></i> Download Resume
                  </a>
                @else
                  <span class="text-xs text-muted">No file uploaded</span>
                @endif
              </div>
            </div>

          </div>
        </div>

        <!-- Cover Letter Card -->
        <div class="card mb-4 border-0 shadow-sm" style="border-radius: 12px;">
          <div class="card-header bg-white border-bottom py-3 px-4">
            <h3 class="card-title text-sm mb-0 font-weight-bold text-dark">
              <i class="fas fa-comment-alt text-primary mr-2"></i> Cover Letter / Candidate Message
            </h3>
          </div>
          <div class="card-body p-4">
            @if(!empty($application->cover_letter))
              <div class="p-3 bg-light rounded text-dark" style="font-size: 0.95rem; line-height: 1.7; white-space: pre-line; border-radius: 8px;">
                {{ $application->cover_letter }}
              </div>
            @else
              <p class="text-muted mb-0 italic">No additional cover message provided by the candidate.</p>
            @endif
          </div>
        </div>

      </div>

      <!-- Right Column: Status & Internal HR Notes -->
      <div class="col-lg-4">
        
        <div class="card mb-4 border-0 shadow-sm" style="border-radius: 12px;">
          <div class="card-header bg-white border-bottom py-3 px-4">
            <h3 class="card-title text-sm mb-0 font-weight-bold text-dark">
              <i class="fas fa-tasks text-primary mr-2"></i> Application Status &amp; Notes
            </h3>
          </div>
          <div class="card-body p-4">

            <form action="{{ route('admin.applications.status', $application->id) }}" method="POST">
              @csrf
              @method('PATCH')

              <div class="form-group mb-3">
                <label for="status" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Candidate Hiring Status</label>
                <select name="status" id="status" class="form-control font-weight-bold">
                  <option value="new" {{ $application->status === 'new' ? 'selected' : '' }}>⏳ New / Unreviewed</option>
                  <option value="reviewing" {{ $application->status === 'reviewing' ? 'selected' : '' }}>🔍 Under Review</option>
                  <option value="shortlisted" {{ $application->status === 'shortlisted' ? 'selected' : '' }}>✅ Shortlisted for Interview</option>
                  <option value="rejected" {{ $application->status === 'rejected' ? 'selected' : '' }}>❌ Rejected / Not Selected</option>
                </select>
              </div>

              <div class="form-group mb-3">
                <label for="notes" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Internal HR Notes</label>
                <textarea name="notes" id="notes" rows="5" class="form-control text-sm" placeholder="Add confidential recruiter notes, interview scheduling feedback, or salary expectations...">{{ $application->notes }}</textarea>
                <small class="text-muted text-xs">Only visible to administrators.</small>
              </div>

              <button type="submit" class="btn btn-primary btn-block font-weight-bold py-2 shadow-sm">
                <i class="fas fa-save mr-1"></i> Update Status &amp; Notes
              </button>
            </form>

            <hr class="my-4">

            <div class="d-flex justify-content-between align-items-center">
              <a href="mailto:{{ $application->email }}?subject=Regarding%20Your%20Application%20at%20Trevanta%20International%20-%20{{ urlencode($application->position_title) }}" class="btn btn-light btn-sm text-dark font-weight-bold">
                <i class="fas fa-reply mr-1 text-primary"></i> Email Candidate
              </a>

              <form action="{{ route('admin.applications.destroy', $application->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this candidate application and resume?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-sm">
                  <i class="fas fa-trash-alt mr-1"></i> Delete
                </button>
              </form>
            </div>

          </div>
        </div>

      </div>
    </div>

  </div>
</section>
@endsection

