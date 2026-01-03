@extends('admin.layout')

@section('title', 'Thêm danh mục mới')
@section('page-title', 'Thêm danh mục mới')

@section('content')
<div class="content-box">
    <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div>
                <h3 style="margin-bottom: 20px; color: #2c3e50; border-bottom: 2px solid #8bc34a; padding-bottom: 10px;">
                    Thông tin cơ bản
                </h3>
                
                <div class="form-group">
                    <label for="name">Tên danh mục (Tiếng Việt) *</label>
                    <input type="text" 
                           name="name" 
                           id="name" 
                           class="form-control" 
                           value="{{ old('name') }}" 
                           required>
                </div>

                <div class="form-group">
                    <label for="name_en">Tên danh mục (Tiếng Anh)</label>
                    <input type="text" 
                           name="name_en" 
                           id="name_en" 
                           class="form-control" 
                           value="{{ old('name_en') }}">
                </div>

                <div class="form-group">
                    <label for="name_zh">Tên danh mục (Tiếng Trung)</label>
                    <input type="text" 
                           name="name_zh" 
                           id="name_zh" 
                           class="form-control" 
                           value="{{ old('name_zh') }}">
                </div>

                <div class="form-group">
                    <label for="slug">Slug (URL friendly - để trống sẽ tự động tạo)</label>
                    <input type="text" 
                           name="slug" 
                           id="slug" 
                           class="form-control" 
                           value="{{ old('slug') }}">
                </div>
            </div>

            <div>
                <h3 style="margin-bottom: 20px; color: #2c3e50; border-bottom: 2px solid #8bc34a; padding-bottom: 10px;">
                    Mô tả
                </h3>

                <div class="form-group">
                    <label for="description">Mô tả (Tiếng Việt)</label>
                    <textarea name="description" 
                              id="description" 
                              class="form-control" 
                              rows="6">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="description_en">Mô tả (Tiếng Anh)</label>
                    <textarea name="description_en" 
                              id="description_en" 
                              class="form-control" 
                              rows="6">{{ old('description_en') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="description_zh">Mô tả (Tiếng Trung)</label>
                    <textarea name="description_zh" 
                              id="description_zh" 
                              class="form-control" 
                              rows="6">{{ old('description_zh') }}</textarea>
                </div>
            </div>
        </div>

        <div style="margin-top: 30px; border-top: 2px solid #eee; padding-top: 30px;">
            <h3 style="margin-bottom: 20px; color: #2c3e50; border-bottom: 2px solid #8bc34a; padding-bottom: 10px;">
                Hình ảnh
            </h3>

            <div class="form-group" style="max-width: 400px;">
                <label for="image">Ảnh đại diện</label>
                <input type="file" 
                       name="image" 
                       id="image" 
                       class="form-control" 
                       accept="image/*"
                       onchange="previewImage(this, 'preview-image')">
                <img id="preview-image" class="img-preview" style="display: none;">
            </div>
        </div>

        <div style="margin-top: 30px; display: flex; gap: 15px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Lưu danh mục
            </button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Hủy
            </a>
        </div>
    </form>
</div>

@push('scripts')
<script>
function previewImage(input, previewId) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById(previewId);
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
@endsection

