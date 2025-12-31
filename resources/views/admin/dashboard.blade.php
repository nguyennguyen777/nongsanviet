@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="content-box">
    <h2 style="margin-bottom: 30px; color: #2c3e50;">Tổng quan hệ thống</h2>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
        <div style="background: linear-gradient(135deg, #8bc34a 0%, #7cb342 100%); padding: 30px; border-radius: 10px; color: white;">
            <div style="font-size: 48px; margin-bottom: 10px;">
                <i class="fas fa-box"></i>
            </div>
            <div style="font-size: 36px; font-weight: bold; margin-bottom: 5px;">{{ $productCount }}</div>
            <div style="font-size: 16px; opacity: 0.9;">Tổng sản phẩm</div>
        </div>
        
        <div style="background: linear-gradient(135deg, #3498db 0%, #2980b9 100%); padding: 30px; border-radius: 10px; color: white;">
            <div style="font-size: 48px; margin-bottom: 10px;">
                <i class="fas fa-folder"></i>
            </div>
            <div style="font-size: 36px; font-weight: bold; margin-bottom: 5px;">{{ $categoryCount }}</div>
            <div style="font-size: 16px; opacity: 0.9;">Danh mục</div>
        </div>
        
        <div style="background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%); padding: 30px; border-radius: 10px; color: white;">
            <div style="font-size: 48px; margin-bottom: 10px;">
                <i class="fas fa-newspaper"></i>
            </div>
            <div style="font-size: 36px; font-weight: bold; margin-bottom: 5px;">{{ $postCount }}</div>
            <div style="font-size: 16px; opacity: 0.9;">Bài viết</div>
        </div>
    </div>
    
    <div style="margin-top: 40px;">
        <h3 style="margin-bottom: 20px; color: #2c3e50;">Quick Actions</h3>
        <div style="display: flex; gap: 15px; flex-wrap: wrap;">
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Thêm sản phẩm mới
            </a>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                <i class="fas fa-list"></i> Xem tất cả sản phẩm
            </a>
        </div>
    </div>
</div>
@endsection

