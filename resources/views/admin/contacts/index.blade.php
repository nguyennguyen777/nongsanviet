@extends('admin.layout')

@section('title', 'Quản lý liên hệ')
@section('page-title', 'Quản lý liên hệ')

@section('content')
<div class="search-filter">
    <form method="GET" action="{{ route('admin.contacts.index') }}">
        <div class="form-group">
            <label>Tìm kiếm</label>
            <input type="text" 
                   name="search" 
                   class="form-control" 
                   placeholder="Tìm theo tên, email, điện thoại hoặc nội dung..."
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
    <h2 style="color: #2c3e50; margin-bottom: 20px;">Danh sách liên hệ ({{ $contacts->total() }})</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Điện thoại</th>
                <th>Địa chỉ</th>
                <th>Dịch vụ quan tâm</th>
                <th>Ngày gửi</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td><strong>{{ $contact->name }}</strong></td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone ?? '-' }}</td>
                    <td>{{ $contact->address ?? '-' }}</td>
                    <td>{{ $contact->services ?? '-' }}</td>
                    <td>{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-primary" style="padding: 5px 10px; font-size: 12px;">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('admin.contacts.destroy', $contact) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Bạn có chắc chắn muốn xóa liên hệ này?');"
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
                        Không tìm thấy liên hệ nào
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if($contacts->hasPages() || $contacts->total() > 0)
        <div class="pagination">
            <div class="pagination-info">
                Hiển thị {{ ($contacts->currentPage() - 1) * $contacts->perPage() + 1 }} 
                đến {{ min($contacts->currentPage() * $contacts->perPage(), $contacts->total()) }} 
                trong tổng số {{ $contacts->total() }} liên hệ
            </div>
            
            @if($contacts->hasPages())
                <div class="pagination-links">
                    @if ($contacts->onFirstPage())
                        <span class="disabled" aria-disabled="true">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @else
                        <a href="{{ $contacts->appends(request()->query())->previousPageUrl() }}" 
                           rel="prev" 
                           class="page-link">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif

                    @php
                        $currentPage = $contacts->currentPage();
                        $lastPage = $contacts->lastPage();
                        $startPage = max(1, $currentPage - 2);
                        $endPage = min($lastPage, $currentPage + 2);
                    @endphp

                    @if ($startPage > 1)
                        <a href="{{ $contacts->appends(request()->query())->url(1) }}" class="page-link">1</a>
                        @if ($startPage > 2)
                            <span class="disabled">...</span>
                        @endif
                    @endif

                    @for ($page = $startPage; $page <= $endPage; $page++)
                        @if ($page == $currentPage)
                            <span class="active" aria-current="page">{{ $page }}</span>
                        @else
                            <a href="{{ $contacts->appends(request()->query())->url($page) }}" class="page-link">{{ $page }}</a>
                        @endif
                    @endfor

                    @if ($endPage < $lastPage)
                        @if ($endPage < $lastPage - 1)
                            <span class="disabled">...</span>
                        @endif
                        <a href="{{ $contacts->appends(request()->query())->url($lastPage) }}" class="page-link">{{ $lastPage }}</a>
                    @endif

                    @if ($contacts->hasMorePages())
                        <a href="{{ $contacts->appends(request()->query())->nextPageUrl() }}" 
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

