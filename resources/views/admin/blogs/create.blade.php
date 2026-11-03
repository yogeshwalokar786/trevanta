@extends('admin.layouts.app')

@section('title', 'Add New Blog Article')

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 align-items-center">
      <div class="col-sm-6">
        <h1 class="m-0 font-weight-bold text-dark">Add New Article</h1>
        <p class="text-muted text-sm mb-0">Compose and publish a clinical insight, regulatory paper, or research brief</p>
      </div>
      <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary btn-sm">
          <i class="fas fa-arrow-left mr-1"></i> Back to Articles
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    @if ($errors->any())
      <div class="alert alert-danger shadow-sm">
        <h6 class="font-weight-bold mb-2"><i class="fas fa-exclamation-triangle mr-1"></i> Please fix the following errors:</h6>
        <ul class="mb-0 pl-3">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="row">
        <!-- Main Form Column -->
        <div class="col-lg-8">
          <div class="card card-white shadow-sm mb-4">
            <div class="card-header border-bottom py-3">
              <h3 class="card-title font-weight-bold text-dark mb-0">
                <i class="fas fa-edit mr-2 text-primary"></i> Article Content
              </h3>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label for="title" class="font-weight-bold">Article Title <span class="text-danger">*</span></label>
                <input type="text" name="title" id="title" class="form-control form-control-lg @error('title') is-invalid @enderror" placeholder="e.g., Accelerating Oncology Trials Through Decentralized Architecture" value="{{ old('title') }}" required autofocus>
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>

              <div class="form-group">
                <label for="slug" class="font-weight-bold">URL Slug (SEO friendly) <small class="text-muted font-weight-normal">(auto-generated if left empty)</small></label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-light text-muted text-xs">/blog/</span>
                  </div>
                  <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="e.g., accelerating-oncology-trials" value="{{ old('slug') }}">
                </div>
                @error('slug') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
              </div>

              <div class="form-group">
                <label for="summary" class="font-weight-bold">Summary / Excerpt <span class="text-danger">*</span></label>
                <textarea name="summary" id="summary" rows="3" class="form-control @error('summary') is-invalid @enderror" placeholder="Brief 1-3 sentence overview shown on blog cards and search engines..." required>{{ old('summary') }}</textarea>
                <small class="text-muted">Recommended: 150 - 250 characters.</small>
                @error('summary') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>

              <div class="form-group">
                <label for="content" class="font-weight-bold">Full Article Body (HTML / Formatted Text) <span class="text-danger">*</span></label>
                <textarea name="content" id="content" rows="14" class="form-control font-monospace @error('content') is-invalid @enderror" placeholder="<p>Write your article paragraphs here...</p>&#10;&#10;<div class='article-takeaway-box'>&#10;  <h4>Key Takeaways</h4>&#10;  <ul>&#10;    <li>Finding 1...</li>&#10;  </ul>&#10;</div>" required>{{ old('content') }}</textarea>
                <small class="text-muted">You can write standard HTML paragraphs (<code>&lt;p&gt;</code>), subheadings (<code>&lt;h3&gt;</code>), lists (<code>&lt;ul&gt;</code>), and takeaway callouts (<code>&lt;div class="article-takeaway-box"&gt;</code>).</small>
                @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>

            </div>
          </div>
        </div>

        <!-- Sidebar Options Column -->
        <div class="col-lg-4">

          <!-- Publishing & Visibility Card -->
          <div class="card card-white shadow-sm mb-4">
            <div class="card-header border-bottom py-3">
              <h3 class="card-title font-weight-bold text-dark mb-0">
                <i class="fas fa-globe mr-2 text-primary"></i> Publication Status
              </h3>
            </div>
            <div class="card-body">
              <div class="custom-control custom-switch mb-3">
                <input type="checkbox" name="is_published" class="custom-control-input" id="is_published" value="1" {{ old('is_published', '1') == '1' ? 'checked' : '' }}>
                <label class="custom-control-label font-weight-bold" for="is_published">Publish Immediately</label>
                <small class="text-muted d-block">If unchecked, this article will be saved as a draft.</small>
              </div>

              <div class="custom-control custom-switch mb-3">
                <input type="checkbox" name="is_featured" class="custom-control-input" id="is_featured" value="1" {{ old('is_featured') == '1' ? 'checked' : '' }}>
                <label class="custom-control-label font-weight-bold text-warning" for="is_featured">
                  <i class="fas fa-star mr-1"></i> Spotlight Featured Article
                </label>
                <small class="text-muted d-block">Highlights this article at the top of the /blog page.</small>
              </div>

              <hr>

              <button type="submit" class="btn btn-primary btn-block shadow-sm" style="background-color: #28a9a1; border-color: #28a9a1;">
                <i class="fas fa-save mr-1"></i> Save &amp; Publish Article
              </button>
            </div>
          </div>

          <!-- Taxonomy & Metadata Card -->
          <div class="card card-white shadow-sm mb-4">
            <div class="card-header border-bottom py-3">
              <h3 class="card-title font-weight-bold text-dark mb-0">
                <i class="fas fa-tags mr-2 text-primary"></i> Categorization &amp; Meta
              </h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="category" class="font-weight-bold">Primary Category <span class="text-danger">*</span></label>
                <input type="text" name="category" id="category" list="category-options" class="form-control" placeholder="Select or type category..." value="{{ old('category', 'Clinical Strategy') }}" required>
                <datalist id="category-options">
                  @foreach($categories as $cat)
                    <option value="{{ $cat }}">
                  @endforeach
                </datalist>
              </div>

              <div class="form-group">
                <label for="badge" class="font-weight-bold">Card Badge Text</label>
                <input type="text" name="badge" id="badge" class="form-control" placeholder="e.g., FEATURED WHITEPAPER or Regulatory Brief" value="{{ old('badge') }}">
                <small class="text-muted">Defaults to category name if left empty.</small>
              </div>

              <div class="form-group">
                <label for="read_time" class="font-weight-bold">Estimated Read Time</label>
                <input type="text" name="read_time" id="read_time" class="form-control" placeholder="e.g., 6 min read" value="{{ old('read_time', '5 min read') }}">
              </div>
            </div>
          </div>

          <!-- Author Details Card -->
          <div class="card card-white shadow-sm mb-4">
            <div class="card-header border-bottom py-3">
              <h3 class="card-title font-weight-bold text-dark mb-0">
                <i class="fas fa-user-edit mr-2 text-primary"></i> Author Profile
              </h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="author_name" class="font-weight-bold">Author Full Name <span class="text-danger">*</span></label>
                <input type="text" name="author_name" id="author_name" class="form-control" placeholder="e.g., Dr. Sarah Jenkins, MD" value="{{ old('author_name', 'Dr. Sarah Jenkins, MD') }}" required>
              </div>

              <div class="form-group">
                <label for="author_title" class="font-weight-bold">Author Professional Title</label>
                <input type="text" name="author_title" id="author_title" class="form-control" placeholder="e.g., VP of Global Clinical Operations" value="{{ old('author_title', 'VP Clinical Operations') }}">
              </div>

              <div class="form-group">
                <label for="author_avatar" class="font-weight-bold">Initials for Avatar Badge</label>
                <input type="text" name="author_avatar" id="author_avatar" maxlength="4" class="form-control" placeholder="e.g., SJ" value="{{ old('author_avatar') }}">
                <small class="text-muted">Auto-computed from name initials if left blank.</small>
              </div>
            </div>
          </div>

          <!-- Featured Image Card -->
          <div class="card card-white shadow-sm mb-4">
            <div class="card-header border-bottom py-3">
              <h3 class="card-title font-weight-bold text-dark mb-0">
                <i class="fas fa-image mr-2 text-primary"></i> Featured Cover Image
              </h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="image" class="font-weight-bold">Upload Image File</label>
                <input type="file" name="image" id="image" class="form-control-file" accept="image/*">
                <small class="text-muted">JPG, PNG, WebP up to 4MB.</small>
              </div>
              <div class="form-group mb-0">
                <label for="image_url" class="font-weight-bold">Or Existing Image Path / URL</label>
                <input type="text" name="image_url" id="image_url" class="form-control" placeholder="e.g., images/clinical-lab.jpg" value="{{ old('image_url') }}">
              </div>
            </div>
          </div>

        </div>
      </div>
    </form>

  </div>
</section>

@push('scripts')
<script>
  // Auto-generate slug from title
  document.getElementById('title').addEventListener('keyup', function() {
    const slugInput = document.getElementById('slug');
    if (!slugInput.dataset.manual) {
      slugInput.value = this.value
        .toLowerCase()
        .replace(/[^a-z0-9\s-]/g, '')
        .trim()
        .replace(/\s+/g, '-');
    }
  });

  document.getElementById('slug').addEventListener('input', function() {
    this.dataset.manual = "true";
  });
</script>
@endpush
@endsection
