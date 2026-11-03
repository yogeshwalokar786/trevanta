@extends('admin.layouts.app')

@section('title', 'Manage Blogs & Insights')
@section('page_heading', 'Blogs & Insights')

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid px-3">
    <div class="d-flex justify-content-between align-items-center flex-wrap">
      <div>
        <h1 class="m-0 font-weight-bold">Clinical Insights &amp; Blogs</h1>
        <p class="text-muted text-sm mb-0">Manage published perspectives, regulatory whitepapers, and study briefs.</p>
      </div>
      <div class="mt-2 mt-sm-0">
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary shadow-sm">
          <i class="fas fa-plus mr-1"></i> Add New Article
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid px-3">

    <!-- Filter & Search Toolbar Card -->
    <div class="card mb-4">
      <div class="card-body py-3">
        <form action="{{ route('admin.blogs.index') }}" method="GET" class="row align-items-center">
          <div class="col-md-5 mb-2 mb-md-0">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-white border-right-0"><i class="fas fa-search text-muted"></i></span>
              </div>
              <input type="text" name="search" class="form-control border-left-0" placeholder="Search by title, author, or keyword..." value="{{ request('search') }}">
            </div>
          </div>

          <div class="col-md-4 mb-2 mb-md-0">
            <select name="category" class="form-control" onchange="this.form.submit()">
              <option value="all">All Categories</option>
              @foreach($categories as $cat)
                <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
              @endforeach
            </select>
          </div>

          <div class="col-md-3 text-md-right">
            <button type="submit" class="btn btn-primary btn-sm mr-1">
              <i class="fas fa-filter mr-1"></i> Filter
            </button>
            @if(request('search') || (request('category') && request('category') !== 'all'))
              <a href="{{ route('admin.blogs.index') }}" class="btn btn-white btn-sm">
                <i class="fas fa-times mr-1"></i> Reset
              </a>
            @endif
          </div>
        </form>
      </div>
    </div>

    <!-- Articles Table Card -->
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <div>
          <h3 class="card-title mb-0">
            <i class="fas fa-newspaper text-muted mr-2"></i> Published Articles &amp; Whitepapers
          </h3>
        </div>
        <span class="pill-badge pill-review">
          Total: {{ $blogs->total() }} Articles
        </span>
      </div>

      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead>
              <tr>
                <th style="width: 50px;">#</th>
                <th>Article Title &amp; Excerpt</th>
                <th>Category</th>
                <th>Author</th>
                <th class="text-center">Status</th>
                <th class="text-center">Spotlight</th>
                <th>Published Date</th>
                <th class="text-right" style="min-width: 150px;">Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse($blogs as $index => $blog)
                <tr>
                  <td class="font-weight-bold text-muted text-xs">
                    {{ $blogs->firstItem() + $index }}
                  </td>
                  <td>
                    <div class="font-weight-bold text-dark" style="font-size: 0.95rem;">
                      {{ $blog->title }}
                    </div>
                    <div class="text-muted text-xs text-truncate mt-1" style="max-width: 440px;">
                      {{ $blog->summary }}
                    </div>
                    <div class="mt-1 text-xs text-muted">
                      <span><i class="fas fa-clock mr-1"></i>{{ $blog->read_time ?: '5 min' }}</span>
                      <span class="mx-1">&bull;</span>
                      <a href="{{ route('blog.show', $blog->slug) }}" target="_blank" class="text-primary font-weight-medium">
                        /blog/{{ $blog->slug }} <i class="fas fa-external-link-alt text-xs"></i>
                      </a>
                    </div>
                  </td>
                  <td>
                    <span class="pill-badge pill-review">
                      {{ $blog->category }}
                    </span>
                    @if($blog->badge && $blog->badge !== $blog->category)
                      <div class="mt-1">
                        <span class="pill-badge pill-closed text-xs">{{ $blog->badge }}</span>
                      </div>
                    @endif
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="rounded-circle mr-2 d-flex align-items-center justify-content-center text-xs font-weight-bold" style="width: 32px; height: 32px; background: #f0fdfa; color: #0d9488; border: 1px solid #ccfbf1;">
                        {{ $blog->author_avatar ?: 'AC' }}
                      </div>
                      <div>
                        <div class="font-weight-bold text-sm text-dark">{{ $blog->author_name }}</div>
                        <small class="text-muted text-xs">{{ $blog->author_title ?: 'Clinical Team' }}</small>
                      </div>
                    </div>
                  </td>
                  <td class="text-center">
                    @if($blog->is_published)
                      <span class="pill-badge pill-contacted"><i class="fas fa-check-circle text-xs"></i> Published</span>
                    @else
                      <span class="pill-badge pill-closed"><i class="fas fa-eye-slash text-xs"></i> Draft</span>
                    @endif
                  </td>
                  <td class="text-center">
                    @if($blog->is_featured)
                      <span class="pill-badge pill-pending font-weight-bold">
                        <i class="fas fa-star text-warning"></i> Spotlight
                      </span>
                    @else
                      <span class="text-muted text-xs">&mdash;</span>
                    @endif
                  </td>
                  <td class="text-xs text-muted">
                    {{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}
                  </td>
                  <td class="text-right">
                    <div class="btn-group btn-group-sm">
                      <a href="{{ route('blog.show', $blog->slug) }}" target="_blank" class="btn btn-white" title="View live article">
                        <i class="fas fa-eye text-primary"></i>
                      </a>
                      <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-white" title="Edit Article">
                        <i class="fas fa-edit text-dark"></i>
                      </a>
                      <form action="{{ route('admin.blogs.toggle-publish', $blog->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-white" title="{{ $blog->is_published ? 'Unpublish (Set to Draft)' : 'Publish Article' }}">
                          <i class="fas {{ $blog->is_published ? 'fa-toggle-on text-success' : 'fa-toggle-off text-muted' }}"></i>
                        </button>
                      </form>
                      <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete article: &quot;{{ addslashes($blog->title) }}&quot;?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-white text-danger" title="Delete Article">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="8" class="text-center py-5 text-muted">
                    <div class="py-4">
                      <i class="fas fa-newspaper fa-3x text-muted mb-3 opacity-50"></i>
                      <p class="font-weight-bold text-dark mb-1">No articles found</p>
                      <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary btn-sm mt-2">
                        <i class="fas fa-plus mr-1"></i> Create Your First Article
                      </a>
                    </div>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      @if($blogs->hasPages())
        <div class="card-footer bg-white border-top py-3 d-flex justify-content-between align-items-center">
          <span class="text-muted text-xs">
            Showing {{ $blogs->firstItem() }} to {{ $blogs->lastItem() }} of {{ $blogs->total() }} articles
          </span>
          <div>
            {{ $blogs->links() }}
          </div>
        </div>
      @endif

    </div>

  </div>
</section>
@endsection
