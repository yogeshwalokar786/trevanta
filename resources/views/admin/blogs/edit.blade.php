@extends('admin.layouts.app')

@section('title', 'Edit Blog Article: ' . $blog->title)

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 align-items-center">
      <div class="col-sm-6">
        <h1 class="m-0 font-weight-bold text-dark">Edit Article</h1>
        <p class="text-muted text-sm mb-0">Update article content, metadata, or publication status</p>
      </div>
      <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary btn-sm mr-1">
          <i class="fas fa-arrow-left mr-1"></i> Back to Articles
        </a>
        <a href="{{ route('blog.show', $blog->slug) }}" target="_blank" class="btn btn-outline-info btn-sm">
          <i class="fas fa-external-link-alt mr-1"></i> View on Site
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

    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

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
                <input type="text" name="title" id="title" class="form-control form-control-lg @error('title') is-invalid @enderror" value="{{ old('title', $blog->title) }}" required>
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>

              <div class="form-group">
                <label for="slug" class="font-weight-bold">URL Slug (SEO friendly) <span class="text-danger">*</span></label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-light text-muted text-xs">/blog/</span>
                  </div>
                  <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $blog->slug) }}" required>
                </div>
                @error('slug') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
              </div>

              <div class="form-group">
                <label for="summary" class="font-weight-bold">Summary / Excerpt <span class="text-danger">*</span></label>
                <textarea name="summary" id="summary" rows="3" class="form-control @error('summary') is-invalid @enderror" required>{{ old('summary', $blog->summary) }}</textarea>
                <small class="text-muted">Brief overview shown on cards and search engines.</small>
                @error('summary') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>

              <div class="form-group">
                <label for="content" class="font-weight-bold">Full Article Body (HTML / Formatted Text) <span class="text-danger">*</span></label>
                <textarea name="content" id="content" rows="15" class="form-control font-monospace @error('content') is-invalid @enderror" required>{{ old('content', $blog->content) }}</textarea>
                <small class="text-muted">Supports HTML paragraphs (<code>&lt;p&gt;</code>), subheadings (<code>&lt;h3&gt;</code>), lists (<code>&lt;ul&gt;</code>), and takeaway callouts (<code>&lt;div class="article-takeaway-box"&gt;</code>).</small>
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
                <input type="checkbox" name="is_published" class="custom-control-input" id="is_published" value="1" {{ old('is_published', $blog->is_published ? '1' : '0') == '1' ? 'checked' : '' }}>
                <label class="custom-control-label font-weight-bold" for="is_published">Published</label>
                <small class="text-muted d-block">Uncheck to unpublish and set as draft.</small>
              </div>

              <div class="custom-control custom-switch mb-3">
                <input type="checkbox" name="is_featured" class="custom-control-input" id="is_featured" value="1" {{ old('is_featured', $blog->is_featured ? '1' : '0') == '1' ? 'checked' : '' }}>
                <label class="custom-control-label font-weight-bold text-warning" for="is_featured">
                  <i class="fas fa-star mr-1"></i> Spotlight Featured Article
                </label>
                <small class="text-muted d-block">Highlights this article at the top of the /blog page.</small>
              </div>

              <hr>

              <button type="submit" class="btn btn-primary btn-block shadow-sm" style="background-color: #28a9a1; border-color: #28a9a1;">
                <i class="fas fa-save mr-1"></i> Update Article
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
                <input type="text" name="category" id="category" list="category-options" class="form-control" value="{{ old('category', $blog->category) }}" required>
                <datalist id="category-options">
                  @foreach($categories as $cat)
                    <option value="{{ $cat }}">
                  @endforeach
                </datalist>
              </div>

              <div class="form-group">
                <label for="badge" class="font-weight-bold">Card Badge Text</label>
                <input type="text" name="badge" id="badge" class="form-control" value="{{ old('badge', $blog->badge) }}">
                <small class="text-muted">Defaults to category name if left empty.</small>
              </div>

              <div class="form-group">
                <label for="read_time" class="font-weight-bold">Estimated Read Time</label>
                <input type="text" name="read_time" id="read_time" class="form-control" value="{{ old('read_time', $blog->read_time) }}">
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
                <input type="text" name="author_name" id="author_name" class="form-control" value="{{ old('author_name', $blog->author_name) }}" required>
              </div>

              <div class="form-group">
                <label for="author_title" class="font-weight-bold">Author Professional Title</label>
                <input type="text" name="author_title" id="author_title" class="form-control" value="{{ old('author_title', $blog->author_title) }}">
              </div>

              <div class="form-group">
                <label for="author_avatar" class="font-weight-bold">Initials for Avatar Badge</label>
                <input type="text" name="author_avatar" id="author_avatar" maxlength="4" class="form-control" value="{{ old('author_avatar', $blog->author_avatar) }}">
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
              @if(!empty($blog->image))
                <div class="mb-3 text-center p-2 border rounded bg-light">
                  <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="img-fluid rounded" style="max-height: 120px; object-fit: cover;">
                  <small class="d-block text-muted mt-1 font-monospace text-xs">{{ $blog->image }}</small>
                </div>
              @endif

              <div class="form-group">
                <label for="image" class="font-weight-bold">Replace Image File</label>
                <input type="file" name="image" id="image" class="form-control-file" accept="image/*">
                <small class="text-muted">Leave empty to keep existing image.</small>
              </div>
              <div class="form-group mb-0">
                <label for="image_url" class="font-weight-bold">Or Image Path / URL</label>
                <input type="text" name="image_url" id="image_url" class="form-control" value="{{ old('image_url', $blog->image) }}">
              </div>
            </div>
          </div>

        </div>
      </div>
    </form>

  </div>
</section>
@endsection
