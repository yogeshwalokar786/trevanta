@extends('admin.layouts.app')

@section('title', 'Create Policy Page')
@section('page_heading', 'New Policy Page')

@push('styles')
<style>
  .ck-editor__editable_inline {
    min-height: 420px;
    max-height: 750px;
    font-family: inherit;
    font-size: 0.95rem;
    line-height: 1.75;
  }
  .ck.ck-editor {
    border-radius: 8px !important;
    overflow: hidden;
  }
  .ck.ck-toolbar {
    border-top-left-radius: 8px !important;
    border-top-right-radius: 8px !important;
    border-color: var(--admin-border) !important;
    background: #f8fafc !important;
  }
  .ck.ck-content {
    border-bottom-left-radius: 8px !important;
    border-bottom-right-radius: 8px !important;
    border-color: var(--admin-border) !important;
  }
</style>
@endpush

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid px-3">
    <div class="d-flex justify-content-between align-items-center flex-wrap">
      <div>
        <h1 class="m-0 font-weight-bold">Create Policy Page</h1>
        <p class="text-muted text-sm mb-0">Publish a new legal disclosure, GCP compliance statement, or privacy policy.</p>
      </div>
      <div class="mt-2 mt-sm-0">
        <a href="{{ route('admin.policies.index') }}" class="btn btn-white btn-sm">
          <i class="fas fa-arrow-left mr-1"></i> Back to Policies
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid px-3">

    @if ($errors->any())
      <div class="alert alert-danger shadow-sm border-0 mb-4" style="border-radius: 12px; background: #fef2f2; color: #991b1b; border-left: 4px solid #ef4444 !important;">
        <h6 class="font-weight-bold mb-2"><i class="fas fa-exclamation-triangle mr-1"></i> Please fix the following errors:</h6>
        <ul class="mb-0 pl-3">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.policies.store') }}" method="POST" id="policyForm">
      @csrf

      <div class="row">
        <!-- Main Form Column (Left) -->
        <div class="col-lg-8">
          
          <!-- Document Content Card -->
          <div class="card shadow-xs border-0 mb-4" style="border-radius: 12px;">
            <div class="card-header bg-white border-bottom py-3 px-4">
              <h6 class="font-weight-bold text-dark m-0"><i class="fas fa-file-alt mr-2 text-primary"></i> Policy Information &amp; Body</h6>
            </div>
            <div class="card-body p-4">

              <!-- Title -->
              <div class="form-group mb-3">
                <label for="title" class="font-weight-bold text-dark text-sm">Policy Title <span class="text-danger">*</span></label>
                <input type="text" name="title" id="title" class="form-control" placeholder="e.g., Privacy Statement, GCP Statement, Terms of Use" value="{{ old('title') }}" required autofocus onkeyup="autoGenerateSlug(this.value)">
                <small class="text-muted text-xs">Descriptive public headline for this policy document.</small>
              </div>

              <!-- URL Slug -->
              <div class="form-group mb-3">
                <label for="slug" class="font-weight-bold text-dark text-sm">URL Slug <span class="text-danger">*</span></label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-light text-xs font-weight-bold text-muted" style="font-family: monospace;">{{ url('/policy') }}/</span>
                  </div>
                  <input type="text" name="slug" id="slug" class="form-control" placeholder="privacy-statement" value="{{ old('slug') }}">
                </div>
                <small class="text-muted text-xs">Direct browser URL path. Auto-generated from title, must be unique.</small>
              </div>

              <!-- Short Summary / Excerpt -->
              <div class="form-group mb-3">
                <label for="summary" class="font-weight-bold text-dark text-sm">Executive Summary / Overview</label>
                <textarea name="summary" id="summary" rows="3" class="form-control" placeholder="Brief 1-2 sentence overview displayed at the top of the policy page and in previews...">{{ old('summary') }}</textarea>
                <small class="text-muted text-xs">Optional high-level overview explaining the purpose of this policy.</small>
              </div>

              <!-- Rich Text Content -->
              <div class="form-group mb-0">
                <label for="editor" class="font-weight-bold text-dark text-sm">Policy Clauses &amp; Full Content <span class="text-danger">*</span></label>
                <textarea name="content" id="editor" class="form-control">{{ old('content') }}</textarea>
                <small class="text-muted text-xs mt-1 d-block">Use headings (H2, H3), bold text, bullet points, and tables to organize legal and compliance clauses.</small>
              </div>

            </div>
          </div>

          <!-- Search Engine Optimization (SEO) -->
          <div class="card shadow-xs border-0 mb-4" style="border-radius: 12px;">
            <div class="card-header bg-white border-bottom py-3 px-4 d-flex justify-content-between align-items-center">
              <h6 class="font-weight-bold text-dark m-0"><i class="fas fa-search mr-2 text-primary"></i> Search Engine Optimization (SEO)</h6>
              <span class="badge badge-light border text-xs text-muted">Optional Metadata</span>
            </div>
            <div class="card-body p-4">
              
              <!-- Meta Title -->
              <div class="form-group mb-3">
                <div class="d-flex justify-content-between align-items-center">
                  <label for="meta_title" class="font-weight-bold text-dark text-sm mb-1">SEO Meta Title</label>
                  <span id="metaTitleCount" class="badge badge-light border text-xs text-muted">0 / 60</span>
                </div>
                <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Defaults to: Policy Title | Trevanta International" value="{{ old('meta_title') }}" maxlength="70">
              </div>

              <!-- Meta Description -->
              <div class="form-group mb-3">
                <div class="d-flex justify-content-between align-items-center">
                  <label for="meta_description" class="font-weight-bold text-dark text-sm mb-1">SEO Meta Description</label>
                  <span id="metaDescCount" class="badge badge-light border text-xs text-muted">0 / 160</span>
                </div>
                <textarea name="meta_description" id="meta_description" rows="2" class="form-control" placeholder="Search engine snippet describing this compliance policy..." maxlength="200">{{ old('meta_description') }}</textarea>
              </div>

              <!-- Google SERP Live Preview -->
              <div class="p-3 rounded border" style="background: #f8fafc; border-radius: 10px;">
                <span class="text-xs text-uppercase font-weight-bold text-muted d-block mb-2"><i class="fab fa-google mr-1 text-primary"></i> Search Result Snippet Preview</span>
                <div style="font-family: Arial, sans-serif; max-width: 600px;">
                  <div id="serpUrl" style="color: #202124; font-size: 12px; margin-bottom: 2px;">{{ url('/policy') }}/<span id="serpSlugPreview">policy-slug</span></div>
                  <div id="serpTitle" style="color: #1a0dab; font-size: 17px; line-height: 1.3; font-weight: 500; cursor: pointer; text-decoration: underline;" class="text-truncate">
                    Policy Title | Trevanta International
                  </div>
                  <div id="serpDesc" style="color: #4d5156; font-size: 13px; line-height: 1.4; margin-top: 3px;" class="text-truncate-2">
                    Review Trevanta International corporate compliance guidelines, quality standards, and participant protection frameworks.
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

        <!-- Right Sidebar Controls -->
        <div class="col-lg-4">
          
          <!-- Publication Settings Card -->
          <div class="card shadow-xs border-0 mb-4" style="border-radius: 12px;">
            <div class="card-header bg-white border-bottom py-3 px-4">
              <h6 class="font-weight-bold text-dark m-0"><i class="fas fa-cog mr-2 text-primary"></i> Publication Settings</h6>
            </div>
            <div class="card-body p-4">

              <!-- Active Status Switch -->
              <div class="form-group mb-3">
                <div class="custom-control custom-switch custom-switch-lg">
                  <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                  <label class="custom-control-label font-weight-bold text-dark" for="is_active">Publish Live</label>
                </div>
                <small class="text-muted text-xs d-block mt-1">When turned on, this policy is publicly accessible and displayed in the site footer.</small>
              </div>

              <hr class="my-3">

              <!-- Effective / Last Revised Date -->
              <div class="form-group mb-3">
                <label for="effective_date" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Effective / Revised Date</label>
                <input type="text" name="effective_date" id="effective_date" class="form-control" placeholder="e.g., January 1, 2026" value="{{ old('effective_date', date('F d, Y')) }}">
                <small class="text-muted text-xs">Displayed at the top of the policy as the revision date.</small>
              </div>

              <!-- Display Sort Order -->
              <div class="form-group mb-4">
                <label for="order" class="font-weight-bold text-dark text-xs text-uppercase mb-1">Footer / List Order</label>
                <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $nextOrder) }}" min="0">
                <small class="text-muted text-xs">Determines sorting order in the footer legal navigation (lower numbers appear first).</small>
              </div>

              <!-- Submit Buttons -->
              <button type="submit" class="btn btn-primary btn-block py-2 font-weight-bold shadow-xs">
                <i class="fas fa-save mr-1"></i> Save &amp; Publish Policy
              </button>
              <a href="{{ route('admin.policies.index') }}" class="btn btn-white btn-block mt-2">
                Cancel
              </a>

            </div>
          </div>

          <!-- Guidance Card -->
          <div class="card shadow-xs border-0" style="border-radius: 12px; background: #f0fdfa; border: 1px solid #ccfbf1 !important;">
            <div class="card-body p-3">
              <h6 class="font-weight-bold text-primary mb-2 text-sm"><i class="fas fa-shield-alt mr-1"></i> Regulatory Best Practices</h6>
              <ul class="text-xs text-muted mb-0 pl-3" style="line-height: 1.7;">
                <li>Ensure GDPR, HIPAA, and local regional health authority references are up to date.</li>
                <li>Cite ICH-GCP E6(R2/R3) guidelines for clinical operations.</li>
                <li>Provide dedicated compliance contact channels (email and physical postal address).</li>
              </ul>
            </div>
          </div>

        </div>
      </div>

    </form>

  </div>
</section>

@push('scripts')
<!-- CKEditor 5 Classic WYSIWYG CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
  let policyEditorInstance = null;

  ClassicEditor
    .create(document.querySelector('#editor'), {
      toolbar: [
        'heading', '|',
        'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|',
        'outdent', 'indent', '|',
        'blockQuote', 'insertTable', 'undo', 'redo'
      ]
    })
    .then(editor => {
      policyEditorInstance = editor;
    })
    .catch(error => {
      console.error('CKEditor init error:', error);
    });

  function autoGenerateSlug(text) {
    const slugInput = document.getElementById('slug');
    if (!slugInput.dataset.manualEdited) {
      const slugVal = text.toLowerCase()
        .replace(/[^\w\s-]/g, '')
        .trim()
        .replace(/\s+/g, '-');
      slugInput.value = slugVal;
      updateSerpPreview();
    }
  }

  document.getElementById('slug').addEventListener('input', function() {
    this.dataset.manualEdited = 'true';
    updateSerpPreview();
  });

  function updateSerpPreview() {
    const titleVal = document.getElementById('title')?.value || 'Policy Title';
    const slugVal = document.getElementById('slug')?.value || 'policy-slug';
    const metaTitleVal = document.getElementById('meta_title')?.value || titleVal + ' | Trevanta International';
    const metaDescVal = document.getElementById('meta_description')?.value || (document.getElementById('summary')?.value || 'Review Trevanta International corporate compliance guidelines and policies.');

    document.getElementById('serpTitle').textContent = metaTitleVal;
    document.getElementById('serpSlugPreview').textContent = slugVal;
    document.getElementById('serpDesc').textContent = metaDescVal;

    // Counters
    const titleCount = document.getElementById('metaTitleCount');
    if (titleCount) {
      const len = (document.getElementById('meta_title')?.value || '').length;
      titleCount.textContent = len + ' / 60';
    }

    const descCount = document.getElementById('metaDescCount');
    if (descCount) {
      const len = (document.getElementById('meta_description')?.value || '').length;
      descCount.textContent = len + ' / 160';
    }
  }

  ['title', 'slug', 'summary', 'meta_title', 'meta_description'].forEach(id => {
    document.getElementById(id)?.addEventListener('input', updateSerpPreview);
  });

  updateSerpPreview();
</script>
@endpush
@endsection
