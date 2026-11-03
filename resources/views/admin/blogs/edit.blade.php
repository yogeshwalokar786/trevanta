@extends('admin.layouts.app')

@section('title', 'Edit Article: ' . $blog->title)
@section('page_heading', 'Edit Article')

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
        <h1 class="m-0 font-weight-bold">Edit Article</h1>
        <p class="text-muted text-sm mb-0">Update publication content, therapeutic category, or cover photography.</p>
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

    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" id="articleForm">
      @csrf
      @method('PUT')

      <div class="row">
        <!-- Main Form Column (8) -->
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h3 class="card-title mb-0">
                <i class="fas fa-edit mr-2 text-muted"></i> Article Content
              </h3>
              <button type="button" class="btn btn-white btn-sm" onclick="openMediaPickerModal('editor')">
                <i class="fas fa-images mr-1 text-primary"></i> Insert Media Image
              </button>
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
                <small class="text-muted">Brief overview shown on cards and search engines.</small>
                @error('summary') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>

              <div class="form-group mb-2">
                <div class="d-flex justify-content-between align-items-center mb-1">
                  <label for="editor" class="font-weight-bold text-dark mb-0">Full Article Body (Rich Text Editor) <span class="text-danger">*</span></label>
                  <small class="text-muted">Use headings, formatting, and tables</small>
                </div>
                <textarea name="content" id="editor" rows="15" class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $blog->content) }}</textarea>
                @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>

            </div>
          </div>
        </div>

        <!-- Sidebar Options Column (4) -->
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
                <small class="text-muted d-block text-xs">Uncheck to set as draft.</small>
              </div>

              <div class="custom-control custom-switch mb-4">
                <input type="checkbox" name="is_featured" class="custom-control-input" id="is_featured" value="1" {{ old('is_featured', $blog->is_featured ? '1' : '0') == '1' ? 'checked' : '' }}>
                <label class="custom-control-label font-weight-bold text-warning" for="is_featured">
                  <i class="fas fa-star mr-1"></i> Spotlight Article
                </label>
                <small class="text-muted d-block text-xs">Pin to top of /blog perspectives.</small>
              </div>

              <button type="submit" class="btn btn-primary btn-block shadow-sm">
                <i class="fas fa-save mr-1"></i> Update Article
              </button>
            </div>
          </div>

          <!-- Category Card -->
          <div class="card mb-4">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-tags mr-2 text-muted"></i> Category &amp; Badges
              </h3>
            </div>
            <div class="card-body p-4">
              <div class="form-group mb-3">
                <div class="d-flex justify-content-between align-items-center mb-1">
                  <label for="category_id" class="font-weight-bold text-dark text-sm mb-0">Select Category <span class="text-danger">*</span></label>
                  <a href="{{ route('admin.categories.index') }}" target="_blank" class="text-xs text-primary font-weight-bold">+ Add Category</a>
                </div>
                <select name="category_id" id="category_id" class="form-control" required>
                  <option value="">-- Choose Category --</option>
                  @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ (old('category_id', $blog->category_id) == $cat->id || old('category', $blog->category) == $cat->name) ? 'selected' : '' }}>
                      {{ $cat->name }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group mb-3">
                <label for="badge" class="font-weight-bold text-dark text-sm">Badge Text</label>
                <input type="text" name="badge" id="badge" class="form-control" value="{{ old('badge', $blog->badge) }}">
                <small class="text-muted text-xs">Defaults to category name if left blank.</small>
              </div>

              <div class="form-group mb-0">
                <label for="read_time" class="font-weight-bold text-dark text-sm">Read Time</label>
                <input type="text" name="read_time" id="read_time" class="form-control" value="{{ old('read_time', $blog->read_time) }}">
              </div>
            </div>
          </div>

          <!-- Author Info Card -->
          <div class="card mb-4">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-user-edit mr-2 text-muted"></i> Author Profile
              </h3>
            </div>
            <div class="card-body p-4">
              <div class="form-group mb-3">
                <label for="author_name" class="font-weight-bold text-dark text-sm">Author Full Name <span class="text-danger">*</span></label>
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

          <!-- Featured Cover Image Card (With Media Picker) -->
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h3 class="card-title mb-0">
                <i class="fas fa-image mr-2 text-muted"></i> Cover Image
              </h3>
              <button type="button" class="btn btn-white btn-xs" onclick="openMediaPickerModal('cover')">
                <i class="fas fa-images text-primary mr-1"></i> Media Library
              </button>
            </div>
            <div class="card-body p-4">
              
              <!-- Preview thumbnail -->
              <div id="coverImagePreviewContainer" class="mb-3 text-center p-2 border rounded bg-light {{ empty($blog->image) ? 'd-none' : '' }}" style="border-radius: 8px;">
                <img id="coverImagePreview" src="{{ !empty($blog->image) ? asset($blog->image) : '' }}" alt="Preview" class="img-fluid rounded" style="max-height: 120px; object-fit: cover;">
                <small id="coverImagePreviewText" class="d-block text-muted mt-1 font-monospace text-xs">{{ $blog->image }}</small>
              </div>

              <div class="form-group mb-3">
                <label for="image_url" class="font-weight-bold text-dark text-sm">Image Asset Path / URL</label>
                <div class="input-group">
                  <input type="text" name="image_url" id="image_url" class="form-control" value="{{ old('image_url', $blog->image) }}">
                  <div class="input-group-append">
                    <button type="button" class="btn btn-white" onclick="openMediaPickerModal('cover')" title="Choose from library">
                      <i class="fas fa-photo-video text-primary"></i>
                    </button>
                  </div>
                </div>
              </div>

              <div class="form-group mb-0">
                <label for="image" class="font-weight-bold text-dark text-sm">Replace Image File</label>
                <input type="file" name="image" id="image" class="form-control-file" accept="image/*" onchange="previewUploadFile(this)">
                <small class="text-muted text-xs">Leave blank to keep existing photo.</small>
              </div>
            </div>
          </div>

        </div>
      </div>
    </form>

  </div>
</section>

<!-- ========================================================================= -->
<!-- REUSABLE MEDIA PICKER MODAL -->
<!-- ========================================================================= -->
<div class="modal fade" id="mediaPickerModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
      <div class="modal-header border-bottom py-3 px-4 bg-light d-flex justify-content-between align-items-center">
        <div>
          <h5 class="modal-title font-weight-bold text-dark mb-0">Select Asset from Media Library</h5>
          <small class="text-muted">Click any asset to insert into your article</small>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body p-4">
        <!-- Quick Upload Dropzone inside Modal -->
        <div class="p-3 mb-4 rounded border text-center" style="background: #f0fdfa; border-style: dashed !important; border-color: #28a9a1 !important;">
          <input type="file" id="modalFastFileInput" class="d-none" accept="image/*" onchange="uploadFileFromModal(this)">
          <span class="text-dark font-weight-bold mr-2">Need a new image?</span>
          <label for="modalFastFileInput" class="btn btn-primary btn-sm mb-0 cursor-pointer">
            <i class="fas fa-upload mr-1"></i> Upload Image Now
          </label>
          <span id="modalUploadStatus" class="ml-2 text-xs text-muted"></span>
        </div>

        <!-- Media Grid inside Modal -->
        <div id="modalMediaGridContainer" class="row" style="max-height: 440px; overflow-y: auto;">
          <div class="col-12 text-center py-4">
            <div class="spinner-border text-primary" role="status"></div>
            <p class="text-muted text-xs mt-2">Loading library assets...</p>
          </div>
        </div>
      </div>

      <div class="modal-footer border-top bg-light py-2 px-4 d-flex justify-content-between">
        <span class="text-muted text-xs">Target: <strong id="modalTargetLabel">Editor Content</strong></span>
        <button type="button" class="btn btn-white btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<!-- CKEditor 5 Classic WYSIWYG CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
  let articleEditorInstance = null;
  let activeMediaPickerTarget = 'editor'; // 'editor' or 'cover'

  // Initialize CKEditor 5
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
      articleEditorInstance = editor;
    })
    .catch(error => {
      console.error('CKEditor init error:', error);
    });

  // Cover image preview helper
  document.getElementById('image_url')?.addEventListener('input', function() {
    updateCoverPreview(this.value);
  });

  function updateCoverPreview(url) {
    const container = document.getElementById('coverImagePreviewContainer');
    const img = document.getElementById('coverImagePreview');
    const text = document.getElementById('coverImagePreviewText');
    if (url && url.trim() !== '') {
      const src = url.startsWith('http') || url.startsWith('/') ? url : '/' + url;
      img.src = src;
      text.textContent = url;
      container.classList.remove('d-none');
    } else {
      container.classList.add('d-none');
    }
  }

  function previewUploadFile(input) {
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const container = document.getElementById('coverImagePreviewContainer');
        const img = document.getElementById('coverImagePreview');
        const text = document.getElementById('coverImagePreviewText');
        img.src = e.target.result;
        text.textContent = input.files[0].name;
        container.classList.remove('d-none');
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  // Media Picker Modal Controller
  function openMediaPickerModal(target) {
    activeMediaPickerTarget = target;
    document.getElementById('modalTargetLabel').textContent = target === 'cover' ? 'Featured Cover Image' : 'Rich Text Editor Body';
    $('#mediaPickerModal').modal('show');
    loadMediaPickerItems();
  }

  function loadMediaPickerItems() {
    const container = document.getElementById('modalMediaGridContainer');
    container.innerHTML = '<div class="col-12 text-center py-4"><div class="spinner-border text-primary" role="status"></div><p class="text-muted text-xs mt-2">Loading library assets...</p></div>';

    fetch("{{ route('admin.media.index') }}", {
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json'
      }
    })
    .then(res => res.json())
    .then(data => {
      if (data.media && data.media.length > 0) {
        let html = '';
        data.media.forEach(item => {
          const fileUrl = item.path.startsWith('http') || item.path.startsWith('/') ? item.path : '/' + item.path;
          html += `
            <div class="col-6 col-sm-4 col-md-3 mb-3">
              <div class="border rounded p-2 text-center bg-white shadow-xs cursor-pointer media-picker-card" 
                   onclick="selectMediaItem('${fileUrl}', '${escapeHtml(item.filename)}')" 
                   style="border-radius: 10px; cursor: pointer; transition: all 0.15s ease;">
                <div class="bg-light rounded overflow-hidden d-flex align-items-center justify-content-center mb-2" style="height: 100px;">
                  <img src="${fileUrl}" alt="${escapeHtml(item.filename)}" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.onerror=null; this.src='/images/logo.png';">
                </div>
                <div class="text-xs font-weight-bold text-dark text-truncate" title="${escapeHtml(item.filename)}">
                  ${escapeHtml(item.filename)}
                </div>
                <small class="text-primary font-weight-bold text-xs d-block mt-1">Select Asset &rarr;</small>
              </div>
            </div>
          `;
        });
        container.innerHTML = html;
      } else {
        container.innerHTML = '<div class="col-12 text-center py-4 text-muted"><p>No assets in library yet. Upload one above!</p></div>';
      }
    })
    .catch(err => {
      container.innerHTML = '<div class="col-12 text-center py-4 text-danger"><p>Failed to load media assets.</p></div>';
    });
  }

  function uploadFileFromModal(input) {
    if (!input.files || !input.files[0]) return;
    const status = document.getElementById('modalUploadStatus');
    status.innerHTML = '<i class="fas fa-spinner fa-spin text-primary"></i> Uploading...';

    const formData = new FormData();
    formData.append('file', input.files[0]);
    formData.append('_token', '{{ csrf_token() }}');

    fetch("{{ route('admin.media.store') }}", {
      method: 'POST',
      body: formData,
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json'
      }
    })
    .then(res => res.json())
    .then(data => {
      status.innerHTML = '<span class="text-success font-weight-bold"><i class="fas fa-check"></i> Uploaded!</span>';
      setTimeout(() => { status.innerHTML = ''; }, 3000);
      loadMediaPickerItems();
      input.value = '';
    })
    .catch(err => {
      status.innerHTML = '<span class="text-danger">Upload failed.</span>';
    });
  }

  function selectMediaItem(url, filename) {
    if (activeMediaPickerTarget === 'cover') {
      const cleanPath = url.startsWith('/') ? url.substring(1) : url;
      document.getElementById('image_url').value = cleanPath;
      updateCoverPreview(url);
      $('#mediaPickerModal').modal('hide');
    } else if (activeMediaPickerTarget === 'editor') {
      if (articleEditorInstance) {
        const viewFragment = articleEditorInstance.data.processor.toView(`<p><img src="${url}" alt="${filename}" style="max-width: 100%; height: auto; border-radius: 8px; margin: 16px 0;" /></p>`);
        const modelFragment = articleEditorInstance.data.toModel(viewFragment);
        articleEditorInstance.model.insertContent(modelFragment);
      }
      $('#mediaPickerModal').modal('hide');
    }
  }

  function escapeHtml(text) {
    if (!text) return '';
    return text.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
  }
</script>
@endpush
@endsection
