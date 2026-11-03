@extends('admin.layouts.app')

@section('title', 'Media Manager')
@section('page_heading', 'Media Library')

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid px-3">
    <div class="d-flex justify-content-between align-items-center flex-wrap">
      <div>
        <h1 class="m-0 font-weight-bold">Media Library</h1>
        <p class="text-muted text-sm mb-0">Upload, organize, and copy assets for blog articles and scientific whitepapers.</p>
      </div>
      <div class="mt-2 mt-sm-0">
        <button type="button" class="btn btn-primary shadow-sm" data-toggle="collapse" data-target="#uploadCollapseArea" aria-expanded="false">
          <i class="fas fa-cloud-upload-alt mr-1"></i> Upload Assets
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid px-3">

    <!-- Upload Collapse Card -->
    <div class="collapse mb-4" id="uploadCollapseArea">
      <div class="card border-primary" style="border: 2px dashed #28a9a1 !important; background: #f0fdfa;">
        <div class="card-body p-4 text-center">
          <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data" id="mediaUploadForm">
            @csrf
            <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>
            <h5 class="font-weight-bold text-dark mb-1">Select Images or Documents to Upload</h5>
            <p class="text-muted text-xs mb-3">Supported formats: JPG, PNG, WebP, SVG, PDF up to 10MB each.</p>
            <div class="d-flex justify-content-center align-items-center gap-2">
              <input type="file" name="files[]" id="filePickerInput" class="d-none" multiple onchange="document.getElementById('mediaUploadForm').submit()">
              <label for="filePickerInput" class="btn btn-primary px-4 py-2 cursor-pointer mb-0">
                <i class="fas fa-folder-open mr-1"></i> Browse Files from Device
              </label>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="card mb-4">
      <div class="card-body py-3">
        <form action="{{ route('admin.media.index') }}" method="GET" class="row align-items-center">
          <div class="col-md-6 mb-2 mb-md-0">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-white border-right-0"><i class="fas fa-search text-muted"></i></span>
              </div>
              <input type="text" name="search" class="form-control border-left-0" placeholder="Search assets by filename..." value="{{ request('search') }}">
            </div>
          </div>

          <div class="col-md-3 mb-2 mb-md-0">
            <select name="type" class="form-control" onchange="this.form.submit()">
              <option value="all">All File Types</option>
              <option value="image" {{ request('type') === 'image' ? 'selected' : '' }}>Images Only</option>
            </select>
          </div>

          <div class="col-md-3 text-md-right">
            <button type="submit" class="btn btn-primary btn-sm mr-1">
              <i class="fas fa-search mr-1"></i> Filter
            </button>
            @if(request('search') || request('type'))
              <a href="{{ route('admin.media.index') }}" class="btn btn-white btn-sm">
                <i class="fas fa-times mr-1"></i> Reset
              </a>
            @endif
          </div>
        </form>
      </div>
    </div>

    <!-- Media Grid Card -->
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">
          <i class="fas fa-images text-muted mr-2"></i> Stored Assets Library
        </h3>
        <span class="pill-badge pill-review">Total: {{ $media->total() }} Files</span>
      </div>

      <div class="card-body p-4">
        @if($media->count() > 0)
          <div class="row">
            @foreach($media as $item)
              <div class="col-6 col-sm-4 col-md-3 col-xl-2 mb-4">
                <div class="border rounded p-2 text-center h-100 d-flex flex-column justify-content-between bg-white shadow-xs position-relative media-item-card" style="border-radius: 12px; transition: transform 0.2s, box-shadow 0.2s;">
                  
                  <!-- Thumbnail area -->
                  <div class="bg-light rounded d-flex align-items-center justify-content-center overflow-hidden mb-2" style="height: 120px; border-radius: 8px;">
                    @if($item->is_image)
                      <img src="{{ asset($item->path) }}" alt="{{ $item->filename }}" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
                    @else
                      <i class="fas fa-file-alt fa-3x text-muted"></i>
                    @endif
                  </div>

                  <!-- Name & metadata -->
                  <div class="px-1 text-left">
                    <div class="text-xs font-weight-bold text-dark text-truncate" title="{{ $item->filename }}">
                      {{ $item->filename }}
                    </div>
                    <div class="text-muted text-xs mt-1">
                      <span>{{ $item->formatted_size }}</span>
                      <span class="mx-1">&bull;</span>
                      <span>{{ $item->created_at ? $item->created_at->format('M d') : '-' }}</span>
                    </div>
                  </div>

                  <!-- Quick Action Buttons -->
                  <div class="mt-2 pt-2 border-top d-flex justify-content-between align-items-center">
                    <button type="button" class="btn btn-xs btn-white px-2 py-1" onclick="copyAssetUrl('{{ asset($item->path) }}', this)" title="Copy Image URL to Clipboard">
                      <i class="fas fa-copy mr-1"></i> Copy URL
                    </button>

                    <form action="{{ route('admin.media.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete this file?');" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-xs btn-white text-danger px-2 py-1" title="Delete Asset">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                    </form>
                  </div>

                </div>
              </div>
            @endforeach
          </div>

          @if($media->hasPages())
            <div class="pt-3 border-top d-flex justify-content-center">
              {{ $media->links() }}
            </div>
          @endif
        @else
          <div class="text-center py-5">
            <i class="fas fa-photo-video fa-3x text-muted mb-3 opacity-50"></i>
            <p class="font-weight-bold text-dark mb-1">No media files found</p>
            <p class="text-muted text-xs mb-3">Upload your first image, clinical figure, or logo to the library.</p>
            <label for="filePickerInput" class="btn btn-primary btn-sm cursor-pointer mb-0">
              <i class="fas fa-upload mr-1"></i> Upload Assets Now
            </label>
          </div>
        @endif
      </div>
    </div>

  </div>
</section>

@push('scripts')
<script>
  function copyAssetUrl(url, btn) {
    if (navigator.clipboard) {
      navigator.clipboard.writeText(url).then(() => {
        const origText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-check text-success mr-1"></i> Copied!';
        setTimeout(() => { btn.innerHTML = origText; }, 2000);
      });
    } else {
      const temp = document.createElement('input');
      temp.value = url;
      document.body.appendChild(temp);
      temp.select();
      document.execCommand('copy');
      document.body.removeChild(temp);
      btn.innerHTML = '<i class="fas fa-check text-success mr-1"></i> Copied!';
      setTimeout(() => { btn.innerHTML = '<i class="fas fa-copy mr-1"></i> Copy URL'; }, 2000);
    }
  }
</script>
@endpush
@endsection
