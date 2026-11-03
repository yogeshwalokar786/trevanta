@extends('admin.layouts.app')

@section('title', 'Add New Article')
@section('page_heading', 'New Article')

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
  .featured-image-box {
    border: 2px dashed #cbd5e1;
    border-radius: 12px;
    background: #f8fafc;
    padding: 2rem 1rem;
    text-align: center;
    cursor: pointer;
    transition: all 0.2s ease;
  }
  .featured-image-box:hover {
    border-color: #28a9a1;
    background: #f0fdfa;
  }
</style>
@endpush

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid px-3">
    <div class="d-flex justify-content-between align-items-center flex-wrap">
      <div>
        <h1 class="m-0 font-weight-bold">Create Article</h1>
        <p class="text-muted text-sm mb-0">Write and publish a clinical perspective or regulatory whitepaper.</p>
      </div>
      <div class="mt-2 mt-sm-0">
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-white btn-sm">
          <i class="fas fa-arrow-left mr-1"></i> Back to Articles
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

    <form action="{{ route('admin.blogs.store') }}" method="POST" id="articleForm">
      @csrf

      <div class="row">
        <!-- Main Writing Column (8) -->
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body p-4">

              <!-- Article Title -->
              <div class="form-group mb-2">
                <input type="text" name="title" id="title" class="form-control form-control-lg font-weight-bold text-dark @error('title') is-invalid @enderror" placeholder="Enter article title here..." value="{{ old('title') }}" required autofocus style="font-size: 1.35rem; padding: 0.85rem 1rem;">
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>

              <!-- Permalink / Slug -->
              <div class="d-flex align-items-center mb-4 text-xs text-muted pl-1">
                <span>Permalink: <code>/blog/</code></span>
                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" placeholder="auto-generated-slug" style="border: none; background: transparent; color: #0f766e; font-weight: 600; padding: 2px 4px; font-size: 12px; width: auto; flex-grow: 1;">
              </div>

              <!-- Summary / Excerpt -->
              <div class="form-group mb-4">
                <label for="summary" class="font-weight-bold text-dark text-sm">Summary / Excerpt <span class="text-danger">*</span></label>
                <textarea name="summary" id="summary" rows="2" class="form-control @error('summary') is-invalid @enderror" placeholder="Brief 1-3 sentence summary displayed on cards and search engines..." required>{{ old('summary') }}</textarea>
                @error('summary') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>

              <!-- Rich Text Body -->
              <div class="form-group mb-0">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <label for="editor" class="font-weight-bold text-dark text-sm mb-0">Article Content <span class="text-danger">*</span></label>
                  <button type="button" class="btn btn-white btn-xs px-2 py-1" onclick="openMediaPickerModal('editor')">
                    <i class="fas fa-images mr-1 text-primary"></i> Insert Media Image
                  </button>
                </div>
                <textarea name="content" id="editor" rows="16" class="form-control @error('content') is-invalid @enderror">{{ old('content', '<p>Start writing your clinical article...</p>') }}</textarea>
                @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>

            </div>
          </div>
        </div>

        <!-- Compact Sidebar Column (4) -->
        <div class="col-lg-4">

          <!-- Card 1: Publish & Category -->
          <div class="card mb-4">
            <div class="card-header py-3">
              <h3 class="card-title text-sm mb-0">
                <i class="fas fa-paper-plane mr-2 text-muted"></i> Publish Settings
              </h3>
            </div>
            <div class="card-body p-4">
              
              <!-- Category Selector -->
              <div class="form-group mb-3">
                <div class="d-flex justify-content-between align-items-center mb-1">
                  <label for="category_id" class="font-weight-bold text-dark text-sm mb-0">Category <span class="text-danger">*</span></label>
                  <a href="{{ route('admin.categories.index') }}" target="_blank" class="text-xs text-primary font-weight-bold">+ Manage Categories</a>
                </div>
                <select name="category_id" id="category_id" class="form-control" required>
                  <option value="">-- Choose Category --</option>
                  @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                      {{ $cat->name }}
                    </option>
                  @endforeach
                </select>
              </div>

              <!-- Status Toggle -->
              <div class="form-group mb-3">
                <label class="font-weight-bold text-dark text-sm mb-1">Publication Status</label>
                <select name="is_published" class="form-control">
                  <option value="1" {{ old('is_published', '1') == '1' ? 'selected' : '' }}>Published (Live on Website)</option>
                  <option value="0" {{ old('is_published') === '0' ? 'selected' : '' }}>Draft (Private)</option>
                </select>
              </div>

              <!-- Spotlight Switch -->
              <div class="custom-control custom-switch mb-4">
                <input type="checkbox" name="is_featured" class="custom-control-input" id="is_featured" value="1" {{ old('is_featured') == '1' ? 'checked' : '' }}>
                <label class="custom-control-label font-weight-bold text-warning text-sm" for="is_featured">
                  <i class="fas fa-star mr-1"></i> Spotlight Whitepaper
                </label>
                <small class="text-muted d-block text-xs">Featured at top of the /blog page.</small>
              </div>

              <button type="submit" class="btn btn-primary btn-block shadow-sm py-2">
                <i class="fas fa-save mr-1"></i> Save &amp; Publish Article
              </button>
            </div>
          </div>

          <!-- Card 2: Featured Cover Image (Directly Linked to Media Library) -->
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
              <h3 class="card-title text-sm mb-0">
                <i class="fas fa-image mr-2 text-muted"></i> Featured Cover Image
              </h3>
            </div>
            <div class="card-body p-4 text-center">

              <!-- Hidden input for selected image -->
              <input type="hidden" name="image" id="selectedCoverImagePath" value="{{ old('image') }}">

              <!-- Placeholder when no image is selected -->
              <div id="coverPlaceholderBox" class="featured-image-box {{ old('image') ? 'd-none' : '' }}" onclick="openMediaPickerModal('cover')">
                <i class="fas fa-images fa-2x text-primary mb-2"></i>
                <div class="font-weight-bold text-dark text-sm">Select from Media Library</div>
                <small class="text-muted text-xs">Click to browse or upload</small>
              </div>

              <!-- Preview box when an image is selected -->
              <div id="coverSelectedBox" class="{{ old('image') ? '' : 'd-none' }}">
                <div class="position-relative rounded overflow-hidden border mb-2 bg-light" style="max-height: 180px;">
                  <img id="coverPreviewImg" src="{{ old('image') ? asset(old('image')) : '' }}" alt="Cover Preview" class="img-fluid" style="width: 100%; height: 160px; object-fit: cover;">
                </div>
                <div class="text-truncate text-xs font-monospace text-muted mb-2" id="coverSelectedPathText">
                  {{ old('image') }}
                </div>
                <div class="btn-group btn-group-sm w-100">
                  <button type="button" class="btn btn-white" onclick="openMediaPickerModal('cover')">
                    <i class="fas fa-sync-alt mr-1"></i> Change Image
                  </button>
                  <button type="button" class="btn btn-white text-danger" onclick="removeCoverImage()">
                    <i class="fas fa-trash-alt mr-1"></i> Remove
                  </button>
                </div>
              </div>

            </div>
          </div>

          <!-- Card 3: Author Info -->
          <div class="card mb-4">
            <div class="card-header py-3">
              <h3 class="card-title text-sm mb-0">
                <i class="fas fa-user-edit mr-2 text-muted"></i> Author Information
              </h3>
            </div>
            <div class="card-body p-4">
              <div class="form-group mb-3">
                <label for="author_name" class="font-weight-bold text-dark text-xs text-uppercase">Author Name</label>
                <input type="text" name="author_name" id="author_name" class="form-control" placeholder="e.g. Dr. Sarah Jenkins, MD" value="{{ old('author_name', auth()->user()->name ?? 'Dr. Sarah Jenkins, MD') }}">
              </div>

              <div class="form-group mb-0">
                <label for="author_title" class="font-weight-bold text-dark text-xs text-uppercase">Author Title</label>
                <input type="text" name="author_title" id="author_title" class="form-control" placeholder="e.g. VP Global Clinical Operations" value="{{ old('author_title', 'VP Clinical Operations') }}">
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
          <h5 class="modal-title font-weight-bold text-dark mb-0">Media Library</h5>
          <small class="text-muted">Click any asset to select it, or upload a new asset below.</small>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body p-4">
        <!-- Quick Fast Upload inside Modal -->
        <div class="p-3 mb-4 rounded border text-center" style="background: #f0fdfa; border-style: dashed !important; border-color: #28a9a1 !important; border-radius: 10px;">
          <input type="file" id="modalFastFileInput" class="d-none" accept="image/*" onchange="uploadFileFromModal(this)">
          <span class="text-dark font-weight-bold mr-2 text-sm">Need a new image?</span>
          <label for="modalFastFileInput" class="btn btn-primary btn-sm mb-0 cursor-pointer">
            <i class="fas fa-cloud-upload-alt mr-1"></i> Upload Image
          </label>
          <span id="modalUploadStatus" class="ml-2 text-xs"></span>
        </div>

        <!-- Grid of Media Assets -->
        <div id="modalMediaGridContainer" class="row" style="max-height: 440px; overflow-y: auto;">
          <div class="col-12 text-center py-4">
            <div class="spinner-border text-primary" role="status"></div>
            <p class="text-muted text-xs mt-2">Loading library assets...</p>
          </div>
        </div>
      </div>

      <div class="modal-footer border-top bg-light py-2 px-4 d-flex justify-content-between align-items-center">
        <span class="text-muted text-xs">Target: <strong id="modalTargetLabel" class="text-dark">Cover Image</strong></span>
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
  let activeMediaPickerTarget = 'cover';

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

  // Auto-generate slug from title
  document.getElementById('title')?.addEventListener('keyup', function() {
    const slugInput = document.getElementById('slug');
    if (slugInput && !slugInput.dataset.manual) {
      slugInput.value = this.value
        .toLowerCase()
        .replace(/[^a-z0-9\s-]/g, '')
        .trim()
        .replace(/\s+/g, '-');
    }
  });

  document.getElementById('slug')?.addEventListener('input', function() {
    this.dataset.manual = "true";
  });

  // Cover image UI handlers
  function setCoverImage(path, fullUrl) {
    document.getElementById('selectedCoverImagePath').value = path;
    document.getElementById('coverPreviewImg').src = fullUrl;
    document.getElementById('coverSelectedPathText').textContent = path;
    document.getElementById('coverPlaceholderBox').classList.add('d-none');
    document.getElementById('coverSelectedBox').classList.remove('d-none');
  }

  function removeCoverImage() {
    document.getElementById('selectedCoverImagePath').value = '';
    document.getElementById('coverPreviewImg').src = '';
    document.getElementById('coverSelectedPathText').textContent = '';
    document.getElementById('coverSelectedBox').classList.add('d-none');
    document.getElementById('coverPlaceholderBox').classList.remove('d-none');
  }

  // Media Picker Modal Controller
  function openMediaPickerModal(target) {
    activeMediaPickerTarget = target;
    document.getElementById('modalTargetLabel').textContent = target === 'cover' ? 'Featured Cover Image' : 'Article Rich Body';
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
          const relativePath = item.path.startsWith('/') ? item.path.substring(1) : item.path;
          html += `
            <div class="col-6 col-sm-4 col-md-3 mb-3">
              <div class="border rounded p-2 text-center bg-white shadow-xs cursor-pointer media-picker-card" 
                   onclick="selectMediaItem('${relativePath}', '${fileUrl}', '${escapeHtml(item.filename)}')" 
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

  function selectMediaItem(relativePath, fullUrl, filename) {
    if (activeMediaPickerTarget === 'cover') {
      setCoverImage(relativePath, fullUrl);
      $('#mediaPickerModal').modal('hide');
    } else if (activeMediaPickerTarget === 'editor') {
      if (articleEditorInstance) {
        const viewFragment = articleEditorInstance.data.processor.toView(`<p><img src="${fullUrl}" alt="${filename}" style="max-width: 100%; height: auto; border-radius: 8px; margin: 16px 0;" /></p>`);
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
