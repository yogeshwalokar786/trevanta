@extends('admin.layouts.app')

@section('title', 'Manage Blogs & Insights')

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2 align-items-center">
      <div class="col-sm-6">
        <h1 class="m-0 font-weight-bold text-dark">Blogs &amp; Clinical Insights</h1>
        <p class="text-muted text-sm mb-0">Publish and manage peer-reviewed perspectives, regulatory whitepapers, and scientific articles</p>
      </div>
      <div class="col-sm-6 text-sm-right mt-2 mt-sm-0">
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary shadow-sm" style="background-color: #28a9a1; border-color: #28a9a1;">
          <i class="fas fa-plus-circle mr-1"></i> Add New Article
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <!-- Filter & Search Toolbar -->
    <div class="card card-white mb-4">
      <div class="card-body py-3">
        <form action="{{ route('admin.blogs.index') }}" method="GET" class="row align-items-center">
          <div class="col-md-5 mb-2 mb-md-0">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-white"><i class="fas fa-search text-muted"></i></span>
              </div>
              <input type="text" name="search" class="form-control" placeholder="Search by title, author, or keyword..." value="{{ request('search') }}">
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
            <button type="submit" class="btn btn-dark btn-sm mr-1">
              <i class="fas fa-filter mr-1"></i> Filter
            </button>
            @if(request('search') || (request('category') && request('category') !== 'all'))
              <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-times mr-1"></i> Reset
              </a>
            @endif
          </div>
        </form>
      </div>
    </div>

    <!-- Articles Table Card -->
    <div class="card card-white shadow-sm">
      <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
        <h3 class="card-title font-weight-bold text-dark mb-0">
          <i class="fas fa-newspaper mr-2 text-primary"></i> All Published &amp; Draft Articles
        </h3>
        <span class="badge badge-light border text-muted px-2 py-1">
          Total: {{ $blogs->total() }} Articles
        </span>
      </div>

      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead class="bg-light text-muted text-uppercase text-xs font-weight-bold">
              <tr>
                <th style="width: 50px;" class="text-center">#</th>
                <th>Article Title &amp; Details</th>
                <th>Category</th>
                <th>Author</th>
                <th class="text-center">Status</th>
                <th class="text-center">Featured</th>
                <th>Published Date</th>
                <th class="text-right" style="min-width: 170px;">Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse($blogs as $index => $blog)
                <tr>
                  <td class="text-center text-muted font-weight-bold">
                    {{ $blogs->firstItem() + $index }}
                  </td>
                  <td>
                    <div class="font-weight-bold text-dark" style="font-size: 0.95rem;">
                      {{ $blog->title }}
                    </div>
                    <div class="text-muted text-xs text-truncate mt-1" style="max-width: 480px;">
                      {{ $blog->summary }}
                    </div>
                    <div class="mt-1 text-xs">
                      <span class="text-muted"><i class="fas fa-clock mr-1"></i>{{ $blog->read_time ?: '5 min' }}</span>
                      <span class="mx-1 text-muted">•</span>
                      <a href="{{ route('blog.show', $blog->slug) }}" target="_blank" class="text-primary">
                        <i class="fas fa-link mr-1"></i>/blog/{{ $blog->slug }}
                      </a>
                    </div>
                  </td>
                  <td>
                    <span class="badge badge-info px-2 py-1 font-weight-normal" style="font-size: 0.8rem;">
                      {{ $blog->category }}
                    </span>
                    @if($blog->badge && $blog->badge !== $blog->category)
                      <div class="mt-1">
                        <span class="badge badge-secondary text-xs">{{ $blog->badge }}</span>
                      </div>
                    @endif
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="bg-light border text-dark font-weight-bold rounded-circle d-flex align-items-center justify-content-center mr-2 text-xs" style="width: 30px; height: 30px;">
                        {{ $blog->author_avatar ?: 'AC' }}
                      </div>
                      <div>
                        <div class="font-weight-bold text-sm text-dark">{{ $blog->author_name }}</div>
                        <small class="text-muted d-block text-xs">{{ $blog->author_title ?: 'Clinical Team' }}</small>
                      </div>
                    </div>
                  </td>
                  <td class="text-center">
                    @if($blog->is_published)
                      <span class="badge badge-success px-2 py-1"><i class="fas fa-check-circle mr-1"></i> Published</span>
                    @else
                      <span class="badge badge-secondary px-2 py-1"><i class="fas fa-eye-slash mr-1"></i> Draft</span>
                    @endif
                  </td>
                  <td class="text-center">
                    @if($blog->is_featured)
                      <span class="badge badge-warning text-dark px-2 py-1 font-weight-bold">
                        <i class="fas fa-star mr-1 text-dark"></i> Spotlight
                      </span>
                    @else
                      <span class="text-muted text-xs">&mdash;</span>
                    @endif
                  </td>
                  <td class="text-sm text-muted">
                    {{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}
                  </td>
                  <td class="text-right">
                    <div class="btn-group btn-group-sm">
                      <a href="{{ route('blog.show', $blog->slug) }}" target="_blank" class="btn btn-outline-info" title="View on site">
                        <i class="fas fa-eye"></i>
                      </a>
                      <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-outline-primary" title="Edit Article">
                        <i class="fas fa-edit"></i>
                      </a>
                      <form action="{{ route('admin.blogs.toggle-publish', $blog->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary" title="{{ $blog->is_published ? 'Unpublish' : 'Publish' }}">
                          <i class="fas {{ $blog->is_published ? 'fa-toggle-on text-success' : 'fa-toggle-off text-muted' }}"></i>
                        </button>
                      </form>
                      <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete article: &quot;{{ addslashes($blog->title) }}&quot;?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger" title="Delete Article">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="8" class="text-center py-5 text-muted">
                    <i class="fas fa-newspaper fa-3x mb-3 text-secondary d-block"></i>
                    <p class="font-weight-bold mb-1">No blog articles found matching your criteria.</p>
                    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary btn-sm mt-2" style="background-color: #28a9a1; border-color: #28a9a1;">
                      <i class="fas fa-plus-circle mr-1"></i> Create Your First Article
                    </a>
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      @if($blogs->hasPages())
        <div class="card-footer bg-white border-top py-3 d-flex justify-content-between align-items-center">
          <span class="text-muted text-sm">
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
