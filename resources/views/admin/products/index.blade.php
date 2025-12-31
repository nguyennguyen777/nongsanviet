@extends('admin.layout')

@section('title', 'Quản lý sản phẩm')
@section('page-title', 'Quản lý sản phẩm')

@section('content')
<div class="search-filter">
    <form method="GET" action="{{ route('admin.products.index') }}">
        <div class="form-group">
            <label>Tìm kiếm</label>
            <input type="text" 
                   name="search" 
                   class="form-control" 
                   placeholder="Tìm theo tên hoặc mô tả..."
                   value="{{ request('search') }}">
        </div>
        <div class="form-group">
            <label>Danh mục</label>
            <select name="category_id" class="form-control">
                <option value="">Tất cả danh mục</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Trạng thái</label>
            <select name="status" class="form-control">
                <option value="">Tất cả</option>
                <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Hiển thị</option>
                <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Ẩn</option>
            </select>
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
        <h2 style="color: #2c3e50;">Danh sách sản phẩm ({{ $products->total() }})</h2>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm sản phẩm mới
        </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Trạng thái</th>
                <th>Nổi bật</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                        @else
                            <div style="width: 60px; height: 60px; background: #ddd; border-radius: 5px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-image" style="color: #999;"></i>
                            </div>
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name ?? '-' }}</td>
                    <td>{{ $product->price ? number_format($product->price) . ' đ' : '-' }}</td>
                    <td>
                        @if($product->status)
                            <span class="badge badge-success">Hiển thị</span>
                        @else
                            <span class="badge badge-danger">Ẩn</span>
                        @endif
                    </td>
                    <td>
                        @if($product->is_featured)
                            <span class="badge badge-warning">Nổi bật</span>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary" style="padding: 5px 10px; font-size: 12px;">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.products.destroy', $product) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');"
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
                    <td colspan="8" style="text-align: center; padding: 40px; color: #999;">
                        Không tìm thấy sản phẩm nào
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if($products->hasPages() || $products->total() > 0)
        <div class="pagination">
            <div class="pagination-info">
                Hiển thị {{ ($products->currentPage() - 1) * $products->perPage() + 1 }} 
                đến {{ min($products->currentPage() * $products->perPage(), $products->total()) }} 
                trong tổng số {{ $products->total() }} sản phẩm
            </div>
            
            @if($products->hasPages())
                <div class="pagination-links">
                    {{-- Previous Page Link --}}
                    @if ($products->onFirstPage())
                        <span class="disabled" aria-disabled="true">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @else
                        <a href="{{ $products->appends(request()->query())->previousPageUrl() }}" 
                           rel="prev" 
                           class="page-link">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @php
                        $currentPage = $products->currentPage();
                        $lastPage = $products->lastPage();
                        $startPage = max(1, $currentPage - 2);
                        $endPage = min($lastPage, $currentPage + 2);
                    @endphp

                    {{-- First page --}}
                    @if ($startPage > 1)
                        <a href="{{ $products->appends(request()->query())->url(1) }}" class="page-link">1</a>
                        @if ($startPage > 2)
                            <span class="disabled">...</span>
                        @endif
                    @endif

                    {{-- Page numbers around current page --}}
                    @for ($page = $startPage; $page <= $endPage; $page++)
                        @if ($page == $currentPage)
                            <span class="active" aria-current="page">{{ $page }}</span>
                        @else
                            <a href="{{ $products->appends(request()->query())->url($page) }}" class="page-link">{{ $page }}</a>
                        @endif
                    @endfor

                    {{-- Last page --}}
                    @if ($endPage < $lastPage)
                        @if ($endPage < $lastPage - 1)
                            <span class="disabled">...</span>
                        @endif
                        <a href="{{ $products->appends(request()->query())->url($lastPage) }}" class="page-link">{{ $lastPage }}</a>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($products->hasMorePages())
                        <a href="{{ $products->appends(request()->query())->nextPageUrl() }}" 
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

