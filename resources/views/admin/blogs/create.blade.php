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
  .nav-pills .nav-link {
    color: #475569;
    border-radius: 6px;
    background: #f1f5f9;
    transition: all 0.15s ease;
  }
  .nav-pills .nav-link.active {
    background: #28a9a1 !important;
    color: #ffffff !important;
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

          <!-- SEO & Social Sharing Suite -->
          <div class="card mb-4 border-0 shadow-sm" style="border-radius: 12px; overflow: hidden;">
            <div class="card-header py-3 px-4 bg-white border-bottom d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center">
                <span class="rounded-circle d-inline-flex align-items-center justify-content-center mr-2" style="width: 28px; height: 28px; background: #e0f2fe; color: #0284c7;">
                  <i class="fas fa-search text-xs"></i>
                </span>
                <h3 class="card-title text-sm mb-0 font-weight-bold text-dark">Search Engine Optimization (SEO) &amp; Social Meta</h3>
              </div>
              <span class="badge badge-light border text-muted px-2 py-1" style="font-size: 11px;">
                <i class="fab fa-google text-primary mr-1"></i> SERP Preview
              </span>
            </div>

            <div class="card-body p-4">

              <!-- Google SERP Snippet Preview Box -->
              <div class="p-3 mb-4 rounded border" style="background: #ffffff; border-color: #e2e8f0; border-radius: 10px;">
                <div class="d-flex align-items-center mb-1 text-xs text-muted">
                  <i class="fas fa-globe mr-1 text-secondary"></i>
                  <span style="color: #202124;">https://trevanta.bluebasetechnologies.com</span>
                  <span class="mx-1 text-muted">›</span>
                  <span style="color: #5f6368;">blog</span>
                  <span class="mx-1 text-muted">›</span>
                  <span style="color: #5f6368;" id="serpSlugPreview">{{ old('slug', 'article-slug') }}</span>
                </div>
                <div class="font-weight-bold mb-1" id="serpTitlePreview" style="font-size: 1.15rem; color: #1a0dab; line-height: 1.3; cursor: pointer;">
                  {{ old('meta_title', old('title', 'Article Headline')) }} | Trevanta International
                </div>
                <div class="text-sm" id="serpDescPreview" style="color: #4d5156; line-height: 1.5; font-size: 0.875rem;">
                  {{ Str::limit(old('meta_description', old('summary', 'Enter a concise summary or meta description to preview how your article appears in Google search engine rankings...')), 160) }}
                </div>
              </div>

              <!-- SEO Tabs: Search Meta, Social Sharing, Advanced Indexing -->
              <ul class="nav nav-pills mb-3" id="seoTabs" role="tablist" style="gap: 6px;">
                <li class="nav-item">
                  <a class="nav-link active py-1 px-3 text-xs font-weight-bold" id="seo-search-tab" data-toggle="pill" href="#seo-search" role="tab">
                    <i class="fas fa-search mr-1"></i> Search Meta
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link py-1 px-3 text-xs font-weight-bold" id="seo-social-tab" data-toggle="pill" href="#seo-social" role="tab">
                    <i class="fas fa-share-alt mr-1"></i> Social Sharing (OG / Twitter)
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link py-1 px-3 text-xs font-weight-bold" id="seo-advanced-tab" data-toggle="pill" href="#seo-advanced" role="tab">
                    <i class="fas fa-cog mr-1"></i> Indexing &amp; Canonical
                  </a>
                </li>
              </ul>

              <div class="tab-content border-top pt-3" id="seoTabsContent">

                <!-- Tab 1: Search Meta -->
                <div class="tab-pane fade show active" id="seo-search" role="tabpanel">

                  <!-- Meta Title -->
                  <div class="form-group mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <label for="meta_title" class="font-weight-bold text-dark text-xs text-uppercase mb-0">
                        SEO Meta Title
                      </label>
                      <div class="d-flex align-items-center">
                        <span id="metaTitleCount" class="badge badge-light border text-xs mr-2">0 / 60</span>
                        <button type="button" class="btn btn-link btn-xs p-0 text-primary" onclick="syncMetaTitleFromArticle()">
                          <i class="fas fa-sync-alt mr-1"></i> Use Article Title
                        </button>
                      </div>
                    </div>
                    <input type="text" name="meta_title" id="meta_title" class="form-control form-control-sm @error('meta_title') is-invalid @enderror" placeholder="e.g. Navigating ICH E6(R3) Modernization | Trevanta International" value="{{ old('meta_title') }}">
                    <small class="text-muted text-xs d-block mt-1">Optimal length: 50–60 characters. Leave empty to automatically use the article title.</small>
                    @error('meta_title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>

                  <!-- Meta Description -->
                  <div class="form-group mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                      <label for="meta_description" class="font-weight-bold text-dark text-xs text-uppercase mb-0">
                        SEO Meta Description
                      </label>
                      <div class="d-flex align-items-center">
                        <span id="metaDescCount" class="badge badge-light border text-xs mr-2">0 / 160</span>
                        <button type="button" class="btn btn-link btn-xs p-0 text-primary" onclick="syncMetaDescFromSummary()">
                          <i class="fas fa-sync-alt mr-1"></i> Use Summary
                        </button>
                      </div>
                    </div>
                    <textarea name="meta_description" id="meta_description" rows="3" class="form-control form-control-sm @error('meta_description') is-invalid @enderror" placeholder="Concise summary for search engines (e.g. In-depth analysis of finalized ICH E6(R3) guidelines for clinical trial sponsors...)">{{ old('meta_description') }}</textarea>
                    <small class="text-muted text-xs d-block mt-1">Optimal length: 150–160 characters. Summarize key takeaways to maximize click-through rate.</small>
                    @error('meta_description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>

                  <!-- Meta Keywords -->
                  <div class="form-group mb-0">
                    <label for="meta_keywords" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
                      Focus Keywords
                    </label>
                    <input type="text" name="meta_keywords" id="meta_keywords" class="form-control form-control-sm @error('meta_keywords') is-invalid @enderror" placeholder="e.g. clinical trials, oncology, pharmacovigilance, Phase III, ICH E6(R3)" value="{{ old('meta_keywords') }}">
                    <small class="text-muted text-xs d-block mt-1">Comma-separated keywords for search indexing and categorization.</small>
                    @error('meta_keywords') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>

                </div>

                <!-- Tab 2: Social Sharing -->
                <div class="tab-pane fade" id="seo-social" role="tabpanel">

                  <!-- OG Title -->
                  <div class="form-group mb-3">
                    <label for="og_title" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
                      Social Share Title (Open Graph &amp; Twitter)
                    </label>
                    <input type="text" name="og_title" id="og_title" class="form-control form-control-sm @error('og_title') is-invalid @enderror" placeholder="Leave empty to use SEO Meta Title" value="{{ old('og_title') }}">
                    <small class="text-muted text-xs d-block mt-1">Overrides the headline shown on LinkedIn, Twitter/X, Facebook, and WhatsApp previews.</small>
                    @error('og_title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>

                  <!-- OG Description -->
                  <div class="form-group mb-3">
                    <label for="og_description" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
                      Social Share Description
                    </label>
                    <textarea name="og_description" id="og_description" rows="2" class="form-control form-control-sm @error('og_description') is-invalid @enderror" placeholder="Leave empty to use SEO Meta Description">{{ old('og_description') }}</textarea>
                    <small class="text-muted text-xs d-block mt-1">Short engaging tease designed for social media feeds.</small>
                    @error('og_description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>

                  <!-- OG Image (Media Picker) -->
                  <div class="form-group mb-0">
                    <label class="font-weight-bold text-dark text-xs text-uppercase mb-1">
                      Custom Social Share Image (1200 &times; 630 recommended)
                    </label>
                    <input type="hidden" name="og_image" id="selectedOgImagePath" value="{{ old('og_image') }}">
                    
                    <div class="d-flex align-items-center p-3 border rounded bg-light" style="border-radius: 8px; gap: 1rem;">
                      <div id="ogImagePreviewContainer" class="rounded overflow-hidden border bg-white d-flex align-items-center justify-content-center" style="width: 80px; height: 50px; flex-shrink: 0;">
                        <img id="ogPreviewImg" src="{{ old('og_image') ? asset(old('og_image')) : '' }}" alt="Social Share Preview" style="width: 100%; height: 100%; object-fit: cover;" class="{{ old('og_image') ? '' : 'd-none' }}">
                        <i id="ogPreviewIcon" class="fas fa-image text-muted {{ old('og_image') ? 'd-none' : '' }}"></i>
                      </div>
                      <div class="flex-grow-1" style="min-width: 0;">
                        <div class="text-xs font-weight-bold text-dark text-truncate" id="ogImageLabel">
                          {{ old('og_image') ?: 'Using Featured Cover Image by default' }}
                        </div>
                        <small class="text-muted text-xs d-block">Shown when the article link is shared on LinkedIn, Twitter, or WhatsApp.</small>
                      </div>
                      <div class="d-flex align-items-center" style="gap: 0.5rem;">
                        <button type="button" class="btn btn-white btn-xs px-2 py-1" onclick="openMediaPickerModal('og_image')">
                          <i class="fas fa-images mr-1 text-primary"></i> Choose Image
                        </button>
                        <button type="button" class="btn btn-white btn-xs px-2 py-1 text-danger {{ old('og_image') ? '' : 'd-none' }}" id="removeOgImageBtn" onclick="removeOgImage()">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                  </div>

                </div>

                <!-- Tab 3: Advanced Indexing & Canonical -->
                <div class="tab-pane fade" id="seo-advanced" role="tabpanel">
                  <div class="row">

                    <!-- Robots Directive -->
                    <div class="col-md-6 mb-3">
                      <label for="meta_robots" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
                        Robots Directives
                      </label>
                      <select name="meta_robots" id="meta_robots" class="form-control form-control-sm">
                        <option value="index, follow" {{ old('meta_robots', 'index, follow') == 'index, follow' ? 'selected' : '' }}>
                          index, follow (Default - Allow search indexing &amp; link crawl)
                        </option>
                        <option value="noindex, follow" {{ old('meta_robots') == 'noindex, follow' ? 'selected' : '' }}>
                          noindex, follow (Hide from search, follow internal links)
                        </option>
                        <option value="index, nofollow" {{ old('meta_robots') == 'index, nofollow' ? 'selected' : '' }}>
                          index, nofollow (Index page, do not pass link equity)
                        </option>
                        <option value="noindex, nofollow" {{ old('meta_robots') == 'noindex, nofollow' ? 'selected' : '' }}>
                          noindex, nofollow (Completely block search engines)
                        </option>
                      </select>
                      <small class="text-muted text-xs d-block mt-1">Controls how Googlebot and Bingbot index this specific article.</small>
                    </div>

                    <!-- Schema.org Type -->
                    <div class="col-md-6 mb-3">
                      <label for="schema_type" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
                        Schema.org Structured Data
                      </label>
                      <select name="schema_type" id="schema_type" class="form-control form-control-sm">
                        <option value="BlogPosting" {{ old('schema_type', 'BlogPosting') == 'BlogPosting' ? 'selected' : '' }}>
                          BlogPosting (Recommended for articles &amp; insights)
                        </option>
                        <option value="Article" {{ old('schema_type') == 'Article' ? 'selected' : '' }}>
                          Article (General informational article)
                        </option>
                        <option value="NewsArticle" {{ old('schema_type') == 'NewsArticle' ? 'selected' : '' }}>
                          NewsArticle (Company updates &amp; announcements)
                        </option>
                        <option value="TechArticle" {{ old('schema_type') == 'TechArticle' ? 'selected' : '' }}>
                          TechArticle (Technical or methodology whitepapers)
                        </option>
                      </select>
                      <small class="text-muted text-xs d-block mt-1">Outputs JSON-LD structured data for rich snippets in Google search.</small>
                    </div>

                    <!-- Canonical URL -->
                    <div class="col-12 mb-0">
                      <label for="canonical_url" class="font-weight-bold text-dark text-xs text-uppercase mb-1">
                        Custom Canonical URL (Optional)
                      </label>
                      <input type="text" name="canonical_url" id="canonical_url" class="form-control form-control-sm @error('canonical_url') is-invalid @enderror" placeholder="https://trevanta.bluebasetechnologies.com/blog/..." value="{{ old('canonical_url') }}">
                      <small class="text-muted text-xs d-block mt-1">Leave blank to automatically use this article's primary URL. Use only if syndicate-hosting or cross-posting.</small>
                      @error('canonical_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                  </div>
                </div>

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

  // Social (OG) image UI handlers
  function setOgImage(path, fullUrl) {
    document.getElementById('selectedOgImagePath').value = path;
    const img = document.getElementById('ogPreviewImg');
    const icon = document.getElementById('ogPreviewIcon');
    img.src = fullUrl;
    img.classList.remove('d-none');
    icon.classList.add('d-none');
    document.getElementById('ogImageLabel').textContent = path;
    document.getElementById('removeOgImageBtn').classList.remove('d-none');
  }

  function removeOgImage() {
    document.getElementById('selectedOgImagePath').value = '';
    const img = document.getElementById('ogPreviewImg');
    const icon = document.getElementById('ogPreviewIcon');
    img.src = '';
    img.classList.add('d-none');
    icon.classList.remove('d-none');
    document.getElementById('ogImageLabel').textContent = 'Using Featured Cover Image by default';
    document.getElementById('removeOgImageBtn').classList.add('d-none');
  }

  // SEO Preview & Character Counter Handlers
  function updateSeoPreview() {
    const titleVal = document.getElementById('title')?.value || '';
    const slugVal = document.getElementById('slug')?.value || 'article-slug';
    const summaryVal = document.getElementById('summary')?.value || '';
    const metaTitleVal = document.getElementById('meta_title')?.value || '';
    const metaDescVal = document.getElementById('meta_description')?.value || '';

    // Title preview
    const effectiveTitle = metaTitleVal.trim() ? metaTitleVal.trim() : (titleVal.trim() ? titleVal.trim() : 'Article Headline');
    const serpTitleElem = document.getElementById('serpTitlePreview');
    if (serpTitleElem) {
      serpTitleElem.textContent = effectiveTitle + ' | Trevanta International';
    }

    // Slug preview
    const serpSlugElem = document.getElementById('serpSlugPreview');
    if (serpSlugElem) {
      serpSlugElem.textContent = slugVal.trim() || 'article-slug';
    }

    // Description preview
    const effectiveDesc = metaDescVal.trim() ? metaDescVal.trim() : (summaryVal.trim() ? summaryVal.trim() : 'Enter a concise summary or meta description to preview how your article appears in Google search engine rankings...');
    const serpDescElem = document.getElementById('serpDescPreview');
    if (serpDescElem) {
      serpDescElem.textContent = effectiveDesc.length > 160 ? effectiveDesc.substring(0, 157) + '...' : effectiveDesc;
    }

    // Title Counter (50-60 optimal)
    const titleLen = metaTitleVal.length;
    const titleBadge = document.getElementById('metaTitleCount');
    if (titleBadge) {
      titleBadge.textContent = titleLen + ' / 60';
      titleBadge.className = 'badge border text-xs mr-2 ' + (titleLen > 60 ? 'badge-warning text-dark' : (titleLen >= 30 ? 'badge-success text-white' : 'badge-light text-muted'));
    }

    // Desc Counter (150-160 optimal)
    const descLen = metaDescVal.length;
    const descBadge = document.getElementById('metaDescCount');
    if (descBadge) {
      descBadge.textContent = descLen + ' / 160';
      descBadge.className = 'badge border text-xs mr-2 ' + (descLen > 160 ? 'badge-warning text-dark' : (descLen >= 90 ? 'badge-success text-white' : 'badge-light text-muted'));
    }
  }

  function syncMetaTitleFromArticle() {
    const titleVal = document.getElementById('title')?.value || '';
    const metaTitleInput = document.getElementById('meta_title');
    if (metaTitleInput) {
      metaTitleInput.value = titleVal;
      updateSeoPreview();
    }
  }

  function syncMetaDescFromSummary() {
    const summaryVal = document.getElementById('summary')?.value || '';
    const metaDescInput = document.getElementById('meta_description');
    if (metaDescInput) {
      metaDescInput.value = summaryVal.substring(0, 160);
      updateSeoPreview();
    }
  }

  // Bind input listeners for live preview
  ['title', 'slug', 'summary', 'meta_title', 'meta_description'].forEach(id => {
    document.getElementById(id)?.addEventListener('input', updateSeoPreview);
  });

  document.addEventListener('DOMContentLoaded', updateSeoPreview);

  // Media Picker Modal Controller
  function openMediaPickerModal(target) {
    activeMediaPickerTarget = target;
    let targetLabel = 'Featured Cover Image';
    if (target === 'og_image') targetLabel = 'Social Share Image (OG)';
    else if (target === 'editor') targetLabel = 'Article Rich Body';
    document.getElementById('modalTargetLabel').textContent = targetLabel;
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
    } else if (activeMediaPickerTarget === 'og_image') {
      setOgImage(relativePath, fullUrl);
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
