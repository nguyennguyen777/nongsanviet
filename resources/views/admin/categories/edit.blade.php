@extends('admin.layout')

@section('title', 'Chỉnh sửa danh mục')
@section('page-title', 'Chỉnh sửa danh mục: ' . $category->name)

@section('content')
<div class="content-box">
    <form method="POST" action="{{ route('admin.categories.update', $category) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
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
                           value="{{ old('name', $category->attributes['name'] ?? $category->name) }}" 
                           required>
                </div>

                <div class="form-group">
                    <label for="name_en">Tên danh mục (Tiếng Anh)</label>
                    <input type="text" 
                           name="name_en" 
                           id="name_en" 
                           class="form-control" 
                           value="{{ old('name_en', $category->attributes['name_en'] ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="name_zh">Tên danh mục (Tiếng Trung)</label>
                    <input type="text" 
                           name="name_zh" 
                           id="name_zh" 
                           class="form-control" 
                           value="{{ old('name_zh', $category->attributes['name_zh'] ?? '') }}">
                </div>

                <div class="form-group">
                    <label for="slug">Slug (URL friendly)</label>
                    <input type="text" 
                           name="slug" 
                           id="slug" 
                           class="form-control" 
                           value="{{ old('slug', $category->slug) }}">
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
                              rows="6">{{ old('description', $category->attributes['description'] ?? '') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="description_en">Mô tả (Tiếng Anh)</label>
                    <textarea name="description_en" 
                              id="description_en" 
                              class="form-control" 
                              rows="6">{{ old('description_en', $category->attributes['description_en'] ?? '') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="description_zh">Mô tả (Tiếng Trung)</label>
                    <textarea name="description_zh" 
                              id="description_zh" 
                              class="form-control" 
                              rows="6">{{ old('description_zh', $category->attributes['description_zh'] ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <div style="margin-top: 30px; border-top: 2px solid #eee; padding-top: 30px;">
            <h3 style="margin-bottom: 20px; color: #2c3e50; border-bottom: 2px solid #8bc34a; padding-bottom: 10px;">
                Hình ảnh
            </h3>

            <div class="form-group" style="max-width: 400px;">
                <label for="image">Ảnh đại diện</label>
                @if($category->image)
                    <div style="margin-bottom: 10px;">
                        <img src="{{ asset('storage/' . $category->image) }}" 
                             alt="{{ $category->name }}" 
                             class="img-preview"
                             style="max-width: 200px; max-height: 200px;">
                    </div>
                    <small style="color: #7f8c8d;">Ảnh hiện tại (chọn ảnh mới để thay thế)</small>
                @endif
                <input type="file" 
                       name="image" 
                       id="image" 
                       class="form-control" 
                       accept="image/*"
                       onchange="previewImage(this, 'preview-image')"
                       style="margin-top: 10px;">
                <img id="preview-image" class="img-preview" style="display: none; margin-top: 10px;">
            </div>
        </div>

        <div style="margin-top: 30px; display: flex; gap: 15px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Cập nhật danh mục
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

