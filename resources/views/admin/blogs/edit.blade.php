@extends('admin.layouts.app')

@section('title', 'Edit Article: ' . $blog->title)
@section('page_heading', 'Edit Article')

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid px-3">
    <div class="d-flex justify-content-between align-items-center flex-wrap">
      <div>
        <h1 class="m-0 font-weight-bold">Edit Article</h1>
        <p class="text-muted text-sm mb-0">Update article content, category, or publication status.</p>
      </div>
      <div class="mt-2 mt-sm-0">
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-white btn-sm mr-1">
          <i class="fas fa-arrow-left mr-1"></i> Back to Articles
        </a>
        <a href="{{ route('blog.show', $blog->slug) }}" target="_blank" class="btn btn-view-site">
          <i class="fas fa-external-link-alt"></i> View on Site
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

    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="row">
        <!-- Main Form Column -->
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-edit mr-2 text-muted"></i> Article Content
              </h3>
            </div>
            <div class="card-body p-4">

              <div class="form-group mb-4">
                <label for="title" class="font-weight-bold text-dark">Article Title <span class="text-danger">*</span></label>
                <input type="text" name="title" id="title" class="form-control form-control-lg @error('title') is-invalid @enderror" value="{{ old('title', $blog->title) }}" required>
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>

              <div class="form-group mb-4">
                <label for="slug" class="font-weight-bold text-dark">URL Slug <span class="text-danger">*</span></label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-light text-muted text-xs border-right-0">/blog/</span>
                  </div>
                  <input type="text" name="slug" id="slug" class="form-control border-left-0 @error('slug') is-invalid @enderror" value="{{ old('slug', $blog->slug) }}" required>
                </div>
                @error('slug') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
              </div>

              <div class="form-group mb-4">
                <label for="summary" class="font-weight-bold text-dark">Summary / Excerpt <span class="text-danger">*</span></label>
                <textarea name="summary" id="summary" rows="3" class="form-control @error('summary') is-invalid @enderror" required>{{ old('summary', $blog->summary) }}</textarea>
                @error('summary') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>

              <div class="form-group mb-2">
                <label for="content" class="font-weight-bold text-dark">Full Article Body (HTML / Rich Format) <span class="text-danger">*</span></label>
                <textarea name="content" id="content" rows="15" class="form-control font-monospace @error('content') is-invalid @enderror" required>{{ old('content', $blog->content) }}</textarea>
                @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>

            </div>
          </div>
        </div>

        <!-- Sidebar Options Column -->
        <div class="col-lg-4">

          <!-- Publication Card -->
          <div class="card mb-4">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-globe mr-2 text-muted"></i> Publication Status
              </h3>
            </div>
            <div class="card-body p-4">
              <div class="custom-control custom-switch mb-3">
                <input type="checkbox" name="is_published" class="custom-control-input" id="is_published" value="1" {{ old('is_published', $blog->is_published ? '1' : '0') == '1' ? 'checked' : '' }}>
                <label class="custom-control-label font-weight-bold text-dark" for="is_published">Published</label>
                <small class="text-muted d-block text-xs">Uncheck to set article as draft.</small>
              </div>

              <div class="custom-control custom-switch mb-4">
                <input type="checkbox" name="is_featured" class="custom-control-input" id="is_featured" value="1" {{ old('is_featured', $blog->is_featured ? '1' : '0') == '1' ? 'checked' : '' }}>
                <label class="custom-control-label font-weight-bold text-warning" for="is_featured">
                  <i class="fas fa-star mr-1"></i> Spotlight Article
                </label>
                <small class="text-muted d-block text-xs">Features article prominently at top of /blog.</small>
              </div>

              <button type="submit" class="btn btn-primary btn-block shadow-sm">
                <i class="fas fa-save mr-1"></i> Update Article
              </button>
            </div>
          </div>

          <!-- Metadata Card -->
          <div class="card mb-4">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-tags mr-2 text-muted"></i> Categorization
              </h3>
            </div>
            <div class="card-body p-4">
              <div class="form-group mb-3">
                <label for="category" class="font-weight-bold text-dark text-sm">Category <span class="text-danger">*</span></label>
                <input type="text" name="category" id="category" list="category-options" class="form-control" value="{{ old('category', $blog->category) }}" required>
                <datalist id="category-options">
                  @foreach($categories as $cat)
                    <option value="{{ $cat }}">
                  @endforeach
                </datalist>
              </div>

              <div class="form-group mb-3">
                <label for="badge" class="font-weight-bold text-dark text-sm">Badge Text</label>
                <input type="text" name="badge" id="badge" class="form-control" value="{{ old('badge', $blog->badge) }}">
              </div>

              <div class="form-group mb-0">
                <label for="read_time" class="font-weight-bold text-dark text-sm">Read Time</label>
                <input type="text" name="read_time" id="read_time" class="form-control" value="{{ old('read_time', $blog->read_time) }}">
              </div>
            </div>
          </div>

          <!-- Author Card -->
          <div class="card mb-4">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-user-edit mr-2 text-muted"></i> Author Info
              </h3>
            </div>
            <div class="card-body p-4">
              <div class="form-group mb-3">
                <label for="author_name" class="font-weight-bold text-dark text-sm">Author Name <span class="text-danger">*</span></label>
                <input type="text" name="author_name" id="author_name" class="form-control" value="{{ old('author_name', $blog->author_name) }}" required>
              </div>

              <div class="form-group mb-3">
                <label for="author_title" class="font-weight-bold text-dark text-sm">Professional Title</label>
                <input type="text" name="author_title" id="author_title" class="form-control" value="{{ old('author_title', $blog->author_title) }}">
              </div>

              <div class="form-group mb-0">
                <label for="author_avatar" class="font-weight-bold text-dark text-sm">Avatar Initials</label>
                <input type="text" name="author_avatar" id="author_avatar" maxlength="4" class="form-control" value="{{ old('author_avatar', $blog->author_avatar) }}">
              </div>
            </div>
          </div>

          <!-- Image Card -->
          <div class="card mb-4">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-image mr-2 text-muted"></i> Cover Image
              </h3>
            </div>
            <div class="card-body p-4">
              @if(!empty($blog->image))
                <div class="mb-3 text-center p-2 border rounded bg-light" style="border-radius: 8px;">
                  <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="img-fluid rounded" style="max-height: 110px; object-fit: cover;">
                  <small class="d-block text-muted mt-1 font-monospace text-xs">{{ $blog->image }}</small>
                </div>
              @endif

              <div class="form-group mb-3">
                <label for="image" class="font-weight-bold text-dark text-sm">Replace Image File</label>
                <input type="file" name="image" id="image" class="form-control-file" accept="image/*">
                <small class="text-muted text-xs">Leave empty to keep existing image.</small>
              </div>
              <div class="form-group mb-0">
                <label for="image_url" class="font-weight-bold text-dark text-sm">Or File Path</label>
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
