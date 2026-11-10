@extends('admin.layouts.app')

@section('title', 'Edit Job Opening - ' . $job->title)
@section('page_heading', 'Edit Job Opening')

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid px-3">
    <div class="d-flex justify-content-between align-items-center flex-wrap">
      <div>
        <h1 class="m-0 font-weight-bold">Edit Job Opening</h1>
        <p class="text-muted text-sm mb-0">Update position details for "{{ $job->title }}".</p>
      </div>
      <div class="mt-2 mt-sm-0">
        <a href="{{ route('admin.jobs.index') }}" class="btn btn-light shadow-sm">
          <i class="fas fa-arrow-left mr-1"></i> Back to Jobs List
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid px-3">

    @if ($errors->any())
      <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0 mb-4" style="border-radius: 12px;">
        <h6 class="font-weight-bold mb-2"><i class="fas fa-exclamation-triangle mr-1"></i> Please correct the following errors:</h6>
        <ul class="mb-0 pl-3">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>
    @endif

    <form action="{{ route('admin.jobs.update', $job->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="row">
        <!-- Main Details Column -->
        <div class="col-lg-8">
          <div class="card mb-4 border-0 shadow-sm" style="border-radius: 12px;">
            <div class="card-header bg-white border-bottom py-3 px-4">
              <h3 class="card-title text-sm mb-0 font-weight-bold text-dark">
                <i class="fas fa-info-circle text-primary mr-2"></i> Position Overview
              </h3>
            </div>
            <div class="card-body p-4">
              
              <div class="form-group mb-3">
                <label for="title" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
                  Position Title <span class="text-danger">*</span>
                </label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="e.g. Clinical Research Associate II" value="{{ old('title', $job->title) }}" required>
                <small class="text-muted text-xs">Clear job title as recognized in clinical research.</small>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="department" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
                    Department
                  </label>
                  <input type="text" name="department" id="department" class="form-control" placeholder="e.g. Clinical Operations, Biostatistics, QA" value="{{ old('department', $job->department) }}">
                  <small class="text-muted text-xs">Functional team or therapeutic area.</small>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="job_type" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
                    Employment Type <span class="text-danger">*</span>
                  </label>
                  <select name="job_type" id="job_type" class="form-control" required>
                    <option value="Full-Time" {{ old('job_type', $job->job_type) == 'Full-Time' ? 'selected' : '' }}>Full-Time</option>
                    <option value="Part-Time" {{ old('job_type', $job->job_type) == 'Part-Time' ? 'selected' : '' }}>Part-Time</option>
                    <option value="Contract" {{ old('job_type', $job->job_type) == 'Contract' ? 'selected' : '' }}>Contract / Consultant</option>
                    <option value="Hybrid" {{ old('job_type', $job->job_type) == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                    <option value="Remote" {{ old('job_type', $job->job_type) == 'Remote' ? 'selected' : '' }}>Remote / Global</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="location" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
                    Location / Office Hub
                  </label>
                  <input type="text" name="location" id="location" class="form-control" placeholder="e.g. Faridabad / Mumbai / Remote" value="{{ old('location', $job->location) }}">
                  <small class="text-muted text-xs">Office city, region, or 'Remote / Global'.</small>
                </div>

                <div class="col-md-6 mb-3">
                  <label for="experience" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
                    Required Experience
                  </label>
                  <input type="text" name="experience" id="experience" class="form-control" placeholder="e.g. 2-5 Years, Senior Level" value="{{ old('experience', $job->experience) }}">
                  <small class="text-muted text-xs">Recommended industry trial experience.</small>
                </div>
              </div>

              <div class="form-group mb-3">
                <label for="description" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
                  Short Overview / Summary <span class="text-danger">*</span>
                </label>
                <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror" placeholder="Brief summary of duties, trial phase focus, and role mission..." required>{{ old('description', $job->description) }}</textarea>
                <small class="text-muted text-xs">Displayed on the job card on the public Careers page.</small>
              </div>

              <div class="form-group mb-0">
                <label for="requirements" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
                  Key Qualifications &amp; Responsibilities (Optional)
                </label>
                <textarea name="requirements" id="requirements" rows="5" class="form-control" placeholder="Detailed bullet points, required certifications (GCP, SOCRA), degree requirements...">{{ old('requirements', $job->requirements) }}</textarea>
              </div>

            </div>
          </div>
        </div>

        <!-- Sidebar / Publishing Details Column -->
        <div class="col-lg-4">
          <div class="card mb-4 border-0 shadow-sm" style="border-radius: 12px;">
            <div class="card-header bg-white border-bottom py-3 px-4">
              <h3 class="card-title text-sm mb-0 font-weight-bold text-dark">
                <i class="fas fa-paper-plane text-primary mr-2"></i> Application Settings
              </h3>
            </div>
            <div class="card-body p-4">

              <div class="form-group mb-3">
                <label for="apply_email" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
                  Apply Email
                </label>
                <input type="email" name="apply_email" id="apply_email" class="form-control" placeholder="Defaults to {{ setting('careers_email', setting('contact_email', 'info@trevanta.com')) }}" value="{{ old('apply_email', $job->apply_email) }}">
                <small class="text-muted text-xs">Leave blank to use global HR inquiry email.</small>
              </div>

              <div class="form-group mb-3">
                <label for="apply_url" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
                  External Application Link (Optional)
                </label>
                <input type="url" name="apply_url" id="apply_url" class="form-control" placeholder="https://..." value="{{ old('apply_url', $job->apply_url) }}">
                <small class="text-muted text-xs">If applicants should apply through LinkedIn, Workday, etc.</small>
              </div>

              <div class="form-group mb-3">
                <label for="order" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
                  Sort Order
                </label>
                <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $job->order) }}">
                <small class="text-muted text-xs">Lower numbers appear first (e.g. 0, 1, 2).</small>
              </div>

              <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ old('is_active', $job->is_active) ? 'checked' : '' }}>
                <label class="custom-control-label font-weight-bold text-dark" for="is_active">
                  Active (Visible on Website)
                </label>
                <small class="text-muted d-block text-xs">Uncheck to save as draft or temporarily hide position.</small>
              </div>

              <hr class="my-3">

              <button type="submit" class="btn btn-primary btn-block font-weight-bold py-2 shadow-sm">
                <i class="fas fa-save mr-1"></i> Update Job Opening
              </button>

              <a href="{{ route('admin.jobs.index') }}" class="btn btn-light btn-block text-muted mt-2">
                Cancel
              </a>

            </div>
          </div>
        </div>
      </div>

    </form>

  </div>
</section>
@endsection
