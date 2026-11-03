@extends('admin.layouts.app')

@section('title', 'Manage Blog Categories')
@section('page_heading', 'Blog Categories')

@section('content')
<!-- Content Header -->
<div class="content-header">
  <div class="container-fluid px-3">
    <div class="d-flex justify-content-between align-items-center flex-wrap">
      <div>
        <h1 class="m-0 font-weight-bold">Blog Categories</h1>
        <p class="text-muted text-sm mb-0">Manage publication categories and scientific therapeutic taxonomy.</p>
      </div>
      <div class="mt-2 mt-sm-0">
        <button type="button" class="btn btn-primary shadow-sm" data-toggle="modal" data-target="#modal-add-category">
          <i class="fas fa-plus mr-1"></i> New Category
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid px-3">

    <div class="row">
      <!-- Categories List Card (Col 8) -->
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">
              <i class="fas fa-tags text-muted mr-2"></i> All Categories
            </h3>
            <span class="pill-badge pill-review">Total: {{ $categories->count() }} Categories</span>
          </div>

          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-hover align-middle mb-0">
                <thead>
                  <tr>
                    <th style="width: 50px;">#</th>
                    <th>Category Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th class="text-center">Articles</th>
                    <th class="text-right" style="min-width: 120px;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($categories as $index => $category)
                    <tr>
                      <td class="font-weight-bold text-muted text-xs">{{ $index + 1 }}</td>
                      <td>
                        <span class="font-weight-bold text-dark" style="font-size: 0.95rem;">
                          {{ $category->name }}
                        </span>
                      </td>
                      <td>
                        <code class="text-xs bg-light px-2 py-1 rounded text-primary">{{ $category->slug }}</code>
                      </td>
                      <td>
                        <span class="text-xs text-muted text-truncate d-block" style="max-width: 250px;" title="{{ $category->description }}">
                          {{ $category->description ?: '&mdash;' }}
                        </span>
                      </td>
                      <td class="text-center">
                        <span class="pill-badge {{ ($category->blogs_count ?? 0) > 0 ? 'pill-contacted' : 'pill-closed' }}">
                          {{ $category->blogs_count ?? 0 }}
                        </span>
                      </td>
                      <td class="text-right">
                        <div class="btn-group btn-group-sm">
                          <button type="button" class="btn btn-white" data-toggle="modal" data-target="#modal-edit-category-{{ $category->id }}" title="Edit Category">
                            <i class="fas fa-edit text-dark"></i>
                          </button>

                          <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Delete category &quot;{{ addslashes($category->name) }}&quot;?');" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-white text-danger" title="Delete Category">
                              <i class="fas fa-trash-alt"></i>
                            </button>
                          </form>
                        </div>

                        <!-- Edit Modal for this Category -->
                        <div class="modal fade text-left" id="modal-edit-category-{{ $category->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
                              <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header border-bottom py-3 px-4 bg-light">
                                  <h5 class="modal-title font-weight-bold text-dark mb-0">Edit Category: {{ $category->name }}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body p-4">
                                  <div class="form-group mb-3">
                                    <label class="font-weight-bold text-dark text-sm">Category Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                                  </div>
                                  <div class="form-group mb-3">
                                    <label class="font-weight-bold text-dark text-sm">Slug <span class="text-danger">*</span></label>
                                    <input type="text" name="slug" class="form-control" value="{{ $category->slug }}" required>
                                  </div>
                                  <div class="form-group mb-0">
                                    <label class="font-weight-bold text-dark text-sm">Description</label>
                                    <textarea name="description" rows="3" class="form-control" placeholder="Brief scope...">{{ $category->description }}</textarea>
                                  </div>
                                </div>
                                <div class="modal-footer border-top bg-light py-2 px-4 d-flex justify-content-between">
                                  <button type="button" class="btn btn-white btn-sm" data-dismiss="modal">Cancel</button>
                                  <button type="submit" class="btn btn-primary btn-sm">Update Category</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>

                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="6" class="text-center py-5 text-muted">
                        <div class="py-3">
                          <i class="fas fa-tags fa-3x text-muted mb-3 opacity-50"></i>
                          <p class="font-weight-bold text-dark mb-1">No categories defined yet</p>
                          <small class="text-muted">Create your first blog category using the form on the right.</small>
                        </div>
                      </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Quick Add Category Form (Col 4) -->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-plus-circle text-muted mr-2"></i> Add New Category
            </h3>
          </div>
          <div class="card-body p-4">
            <form action="{{ route('admin.categories.store') }}" method="POST">
              @csrf
              <div class="form-group mb-3">
                <label for="cat-name" class="font-weight-bold text-dark text-sm">Category Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="cat-name" class="form-control" placeholder="e.g. Immuno-Oncology" required>
              </div>

              <div class="form-group mb-3">
                <label for="cat-slug" class="font-weight-bold text-dark text-sm">Slug <small class="text-muted font-weight-normal">(auto-generated)</small></label>
                <input type="text" name="slug" id="cat-slug" class="form-control" placeholder="e.g. immuno-oncology">
              </div>

              <div class="form-group mb-4">
                <label for="cat-desc" class="font-weight-bold text-dark text-sm">Description</label>
                <textarea name="description" id="cat-desc" rows="3" class="form-control" placeholder="Optional brief description of this therapeutic discipline..."></textarea>
              </div>

              <button type="submit" class="btn btn-primary btn-block shadow-sm">
                <i class="fas fa-save mr-1"></i> Save Category
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- Add Category Modal (Alternative) -->
<div class="modal fade" id="modal-add-category" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
      <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="modal-header border-bottom py-3 px-4 bg-light">
          <h5 class="modal-title font-weight-bold text-dark mb-0">Create Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-4">
          <div class="form-group mb-3">
            <label class="font-weight-bold text-dark text-sm">Category Name <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" placeholder="e.g. Precision Medicine" required>
          </div>
          <div class="form-group mb-3">
            <label class="font-weight-bold text-dark text-sm">Slug</label>
            <input type="text" name="slug" class="form-control" placeholder="Leave blank to auto-generate">
          </div>
          <div class="form-group mb-0">
            <label class="font-weight-bold text-dark text-sm">Description</label>
            <textarea name="description" rows="3" class="form-control" placeholder="Brief description..."></textarea>
          </div>
        </div>
        <div class="modal-footer border-top bg-light py-2 px-4 d-flex justify-content-between">
          <button type="button" class="btn btn-white btn-sm" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary btn-sm">Create Category</button>
        </div>
      </form>
    </div>
  </div>
</div>

@push('scripts')
<script>
  document.getElementById('cat-name')?.addEventListener('keyup', function() {
    const slug = document.getElementById('cat-slug');
    if (slug && !slug.dataset.manual) {
      slug.value = this.value
        .toLowerCase()
        .replace(/[^a-z0-9\s-]/g, '')
        .trim()
        .replace(/\s+/g, '-');
    }
  });
  document.getElementById('cat-slug')?.addEventListener('input', function() {
    this.dataset.manual = "true";
  });
</script>
@endpush
@endsection

