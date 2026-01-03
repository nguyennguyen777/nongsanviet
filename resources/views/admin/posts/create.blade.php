@extends('admin.layout')

@section('title', 'Thêm bài viết mới')
@section('page-title', 'Thêm bài viết mới')

@section('content')
<div class="content-box">
    <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div>
                <h3 style="margin-bottom: 20px; color: #2c3e50; border-bottom: 2px solid #8bc34a; padding-bottom: 10px;">
                    Thông tin cơ bản
                </h3>
                
                <div class="form-group">
                    <label for="title">Tiêu đề (Tiếng Việt) *</label>
                    <input type="text" 
                           name="title" 
                           id="title" 
                           class="form-control" 
                           value="{{ old('title') }}" 
                           required>
                </div>

                <div class="form-group">
                    <label for="title_en">Tiêu đề (Tiếng Anh)</label>
                    <input type="text" 
                           name="title_en" 
                           id="title_en" 
                           class="form-control" 
                           value="{{ old('title_en') }}">
                </div>

                <div class="form-group">
                    <label for="title_zh">Tiêu đề (Tiếng Trung)</label>
                    <input type="text" 
                           name="title_zh" 
                           id="title_zh" 
                           class="form-control" 
                           value="{{ old('title_zh') }}">
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
                    Nội dung
                </h3>

                <div class="form-group">
                    <label for="content">Nội dung (Tiếng Việt)</label>
                    <textarea name="content" 
                              id="content" 
                              class="form-control" 
                              rows="12">{{ old('content') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="content_en">Nội dung (Tiếng Anh)</label>
                    <textarea name="content_en" 
                              id="content_en" 
                              class="form-control" 
                              rows="12">{{ old('content_en') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="content_zh">Nội dung (Tiếng Trung)</label>
                    <textarea name="content_zh" 
                              id="content_zh" 
                              class="form-control" 
                              rows="12">{{ old('content_zh') }}</textarea>
                </div>
            </div>
        </div>

        <div style="margin-top: 30px; border-top: 2px solid #eee; padding-top: 30px;">
            <h3 style="margin-bottom: 20px; color: #2c3e50; border-bottom: 2px solid #8bc34a; padding-bottom: 10px;">
                Hình ảnh & Cài đặt
            </h3>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label for="image">Ảnh đại diện</label>
                    <input type="file" 
                           name="image" 
                           id="image" 
                           class="form-control" 
                           accept="image/*"
                           onchange="previewImage(this, 'preview-image')">
                    <img id="preview-image" class="img-preview" style="display: none; margin-top: 10px;">
                </div>

                <div class="form-group">
                    <label style="display: block; margin-bottom: 10px;">Trạng thái</label>
                    <div class="form-check">
                        <input type="checkbox" 
                               name="status" 
                               id="status" 
                               value="1"
                               {{ old('status', true) ? 'checked' : '' }}>
                        <label for="status" style="margin: 0; font-weight: normal;">Hiển thị</label>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-top: 30px; display: flex; gap: 15px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Lưu bài viết
            </button>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">
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

