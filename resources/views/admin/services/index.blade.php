@extends('admin.layout')

@section('title', 'Quản lý dịch vụ')
@section('page-title', 'Quản lý dịch vụ')

@section('content')
<div class="search-filter">
    <form method="GET" action="{{ route('admin.services.index') }}">
        <div class="form-group">
            <label>Tìm kiếm</label>
            <input type="text" 
                   name="search" 
                   class="form-control" 
                   placeholder="Tìm theo tiêu đề hoặc mô tả..."
                   value="{{ request('search') }}">
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
        <h2 style="color: #2c3e50;">Danh sách dịch vụ ({{ $services->total() }})</h2>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Thêm dịch vụ mới
        </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tiêu đề</th>
                <th>Slug</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>
                        @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" 
                                 alt="{{ $service->title }}" 
                                 style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                        @else
                            <div style="width: 60px; height: 60px; background: #ddd; border-radius: 5px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-image" style="color: #999;"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $service->attributes['title'] ?? $service->title }}</strong>
                        @if(isset($service->attributes['title_en']) || isset($service->attributes['title_zh']))
                            <br>
                            <small style="color: #7f8c8d;">
                                @if(isset($service->attributes['title_en']) && $service->attributes['title_en']) EN: {{ $service->attributes['title_en'] }} @endif
                                @if(isset($service->attributes['title_zh']) && $service->attributes['title_zh']) | ZH: {{ $service->attributes['title_zh'] }} @endif
                            </small>
                        @endif
                    </td>
                    <td>
                        <code style="background: #f8f9fa; padding: 3px 6px; border-radius: 3px;">{{ $service->slug }}</code>
                    </td>
                    <td>
                        @if($service->status)
                            <span class="badge badge-success">Hiển thị</span>
                        @else
                            <span class="badge badge-danger">Ẩn</span>
                        @endif
                    </td>
                    <td>{{ $service->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-primary" style="padding: 5px 10px; font-size: 12px;">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.services.destroy', $service) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Bạn có chắc chắn muốn xóa dịch vụ này?');"
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
                    <td colspan="7" style="text-align: center; padding: 40px; color: #999;">
                        Không tìm thấy dịch vụ nào
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if($services->hasPages() || $services->total() > 0)
        <div class="pagination">
            <div class="pagination-info">
                Hiển thị {{ ($services->currentPage() - 1) * $services->perPage() + 1 }} 
                đến {{ min($services->currentPage() * $services->perPage(), $services->total()) }} 
                trong tổng số {{ $services->total() }} dịch vụ
            </div>
            
            @if($services->hasPages())
                <div class="pagination-links">
                    @if ($services->onFirstPage())
                        <span class="disabled" aria-disabled="true">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @else
                        <a href="{{ $services->appends(request()->query())->previousPageUrl() }}" 
                           rel="prev" 
                           class="page-link">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif

                    @php
                        $currentPage = $services->currentPage();
                        $lastPage = $services->lastPage();
                        $startPage = max(1, $currentPage - 2);
                        $endPage = min($lastPage, $currentPage + 2);
                    @endphp

                    @if ($startPage > 1)
                        <a href="{{ $services->appends(request()->query())->url(1) }}" class="page-link">1</a>
                        @if ($startPage > 2)
                            <span class="disabled">...</span>
                        @endif
                    @endif

                    @for ($page = $startPage; $page <= $endPage; $page++)
                        @if ($page == $currentPage)
                            <span class="active" aria-current="page">{{ $page }}</span>
                        @else
                            <a href="{{ $services->appends(request()->query())->url($page) }}" class="page-link">{{ $page }}</a>
                        @endif
                    @endfor

                    @if ($endPage < $lastPage)
                        @if ($endPage < $lastPage - 1)
                            <span class="disabled">...</span>
                        @endif
                        <a href="{{ $services->appends(request()->query())->url($lastPage) }}" class="page-link">{{ $lastPage }}</a>
                    @endif

                    @if ($services->hasMorePages())
                        <a href="{{ $services->appends(request()->query())->nextPageUrl() }}" 
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

