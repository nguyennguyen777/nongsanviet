@extends('admin.layout')

@section('title', 'Quản lý danh mục')
@section('page-title', 'Quản lý danh mục')

@section('content')
<div class="search-filter">
    <form method="GET" action="{{ route('admin.categories.index') }}">
        <div class="form-group">
            <label>Tìm kiếm</label>
            <input type="text" 
                   name="search" 
                   class="form-control" 
                   placeholder="Tìm theo tên hoặc mô tả..."
                   value="{{ request('search') }}">
        </div>
        <div class="form-group">
            <label>&nbsp;</label>
            <button type="submit" class="btn btn-primary" style="width: 100%;">
                <i class="fas fa-search"></i> Tìm kiếm
            </button>
        </div>
    </form>
</div>

<div class="content-box">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="color: #2c3e50;">Danh sách danh mục ({{ $categories->total() }})</h2>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm danh mục mới
        </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tên danh mục</th>
                <th>Số sản phẩm</th>
                <th>Slug</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>
                        @if($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" 
                                 alt="{{ $category->name }}" 
                                 style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                        @else
                            <div style="width: 60px; height: 60px; background: #ddd; border-radius: 5px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-image" style="color: #999;"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $category->name }}</strong>
                        @if($category->name_en || $category->name_zh)
                            <br>
                            <small style="color: #7f8c8d;">
                                @if($category->name_en) EN: {{ $category->name_en }} @endif
                                @if($category->name_zh) | ZH: {{ $category->name_zh }} @endif
                            </small>
                        @endif
                    </td>
                    <td>
                        <span class="badge badge-info">{{ $category->products_count }}</span>
                    </td>
                    <td>
                        <code style="background: #f8f9fa; padding: 3px 6px; border-radius: 3px;">{{ $category->slug }}</code>
                    </td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary" style="padding: 5px 10px; font-size: 12px;">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này? Nếu có sản phẩm thuộc danh mục này sẽ không thể xóa.');"
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 5px 10px; font-size: 12px;">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 40px; color: #999;">
                        Không tìm thấy danh mục nào
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if($categories->hasPages() || $categories->total() > 0)
        <div class="pagination">
            <div class="pagination-info">
                Hiển thị {{ ($categories->currentPage() - 1) * $categories->perPage() + 1 }} 
                đến {{ min($categories->currentPage() * $categories->perPage(), $categories->total()) }} 
                trong tổng số {{ $categories->total() }} danh mục
            </div>
            
            @if($categories->hasPages())
                <div class="pagination-links">
                    @if ($categories->onFirstPage())
                        <span class="disabled" aria-disabled="true">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @else
                        <a href="{{ $categories->appends(request()->query())->previousPageUrl() }}" 
                           rel="prev" 
                           class="page-link">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif

                    @php
                        $currentPage = $categories->currentPage();
                        $lastPage = $categories->lastPage();
                        $startPage = max(1, $currentPage - 2);
                        $endPage = min($lastPage, $currentPage + 2);
                    @endphp

                    @if ($startPage > 1)
                        <a href="{{ $categories->appends(request()->query())->url(1) }}" class="page-link">1</a>
                        @if ($startPage > 2)
                            <span class="disabled">...</span>
                        @endif
                    @endif

                    @for ($page = $startPage; $page <= $endPage; $page++)
                        @if ($page == $currentPage)
                            <span class="active" aria-current="page">{{ $page }}</span>
                        @else
                            <a href="{{ $categories->appends(request()->query())->url($page) }}" class="page-link">{{ $page }}</a>
                        @endif
                    @endfor

                    @if ($endPage < $lastPage)
                        @if ($endPage < $lastPage - 1)
                            <span class="disabled">...</span>
                        @endif
                        <a href="{{ $categories->appends(request()->query())->url($lastPage) }}" class="page-link">{{ $lastPage }}</a>
                    @endif

                    @if ($categories->hasMorePages())
                        <a href="{{ $categories->appends(request()->query())->nextPageUrl() }}" 
                           rel="next" 
                           class="page-link">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    @else
                        <span class="disabled" aria-disabled="true">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    @endif
                </div>
            @endif
        </div>
    @endif
</div>
@endsection

