@extends('admin.layout')

@section('title', 'Chỉnh sửa sản phẩm')
@section('page-title', 'Chỉnh sửa sản phẩm: ' . $product->name)

@section('content')
<div class="content-box">
    <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div>
                <h3 style="margin-bottom: 20px; color: #2c3e50; border-bottom: 2px solid #8bc34a; padding-bottom: 10px;">
                    Thông tin cơ bản
                </h3>
                
                <div class="form-group">
                    <label for="category_id">Danh mục</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Chọn danh mục</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" 
                                    {{ (old('category_id', $product->category_id) == $cat->id) ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Tên sản phẩm (Tiếng Việt) *</label>
                    <input type="text" 
                           name="name" 
                           id="name" 
                           class="form-control" 
                           value="{{ old('name', $product->name) }}" 
                           required>
                </div>

                <div class="form-group">
                    <label for="name_en">Tên sản phẩm (Tiếng Anh)</label>
                    <input type="text" 
                           name="name_en" 
                           id="name_en" 
                           class="form-control" 
                           value="{{ old('name_en', $product->name_en) }}">
                </div>

                <div class="form-group">
                    <label for="name_zh">Tên sản phẩm (Tiếng Trung)</label>
                    <input type="text" 
                           name="name_zh" 
                           id="name_zh" 
                           class="form-control" 
                           value="{{ old('name_zh', $product->name_zh) }}">
                </div>

                <div class="form-group">
                    <label for="slug">Slug (URL friendly)</label>
                    <input type="text" 
                           name="slug" 
                           id="slug" 
                           class="form-control" 
                           value="{{ old('slug', $product->slug) }}">
                </div>

                <div class="form-group">
                    <label for="price">Giá (VNĐ)</label>
                    <input type="number" 
                           name="price" 
                           id="price" 
                           class="form-control" 
                           value="{{ old('price', $product->price) }}" 
                           min="0">
                </div>

                <div class="form-group">
                    <label for="short_description">Mô tả ngắn</label>
                    <textarea name="short_description" 
                              id="short_description" 
                              class="form-control" 
                              rows="3">{{ old('short_description', $product->short_description) }}</textarea>
                </div>
            </div>

            <div>
                <h3 style="margin-bottom: 20px; color: #2c3e50; border-bottom: 2px solid #8bc34a; padding-bottom: 10px;">
                    Mô tả chi tiết
                </h3>

                <div class="form-group">
                    <label for="description">Mô tả (Tiếng Việt)</label>
                    <textarea name="description" 
                              id="description" 
                              class="form-control" 
                              rows="8">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="description_en">Mô tả (Tiếng Anh)</label>
                    <textarea name="description_en" 
                              id="description_en" 
                              class="form-control" 
                              rows="8">{{ old('description_en', $product->description_en) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="description_zh">Mô tả (Tiếng Trung)</label>
                    <textarea name="description_zh" 
                              id="description_zh" 
                              class="form-control" 
                              rows="8">{{ old('description_zh', $product->description_zh) }}</textarea>
                </div>
            </div>
        </div>

        <div style="margin-top: 30px; border-top: 2px solid #eee; padding-top: 30px;">
            <h3 style="margin-bottom: 20px; color: #2c3e50; border-bottom: 2px solid #8bc34a; padding-bottom: 10px;">
                Hình ảnh
            </h3>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label for="image">Ảnh đại diện</label>
                    @if($product->image)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 alt="Current image" 
                                 class="img-preview" 
                                 style="display: block;">
                            <small style="color: #999; display: block; margin-top: 5px;">
                                Chọn ảnh mới để thay thế
                            </small>
                        </div>
                    @endif
                    <input type="file" 
                           name="image" 
                           id="image" 
                           class="form-control" 
                           accept="image/*"
                           onchange="previewImage(this, 'preview-image')">
                    <img id="preview-image" class="img-preview" style="display: none;">
                </div>

                <div class="form-group">
                    <label for="background_image">Ảnh nền</label>
                    @if($product->background_image)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('storage/' . $product->background_image) }}" 
                                 alt="Current background image" 
                                 class="img-preview" 
                                 style="display: block;">
                            <small style="color: #999; display: block; margin-top: 5px;">
                                Chọn ảnh mới để thay thế
                            </small>
                        </div>
                    @endif
                    <input type="file" 
                           name="background_image" 
                           id="background_image" 
                           class="form-control" 
                           accept="image/*"
                           onchange="previewImage(this, 'preview-bg-image')">
                    <img id="preview-bg-image" class="img-preview" style="display: none;">
                </div>
            </div>
        </div>

        <div style="margin-top: 30px; border-top: 2px solid #eee; padding-top: 30px;">
            <h3 style="margin-bottom: 20px; color: #2c3e50; border-bottom: 2px solid #8bc34a; padding-bottom: 10px;">
                Cài đặt
            </h3>

            <div style="display: flex; gap: 30px;">
                <div class="form-check">
                    <input type="checkbox" 
                           name="is_featured" 
                           id="is_featured" 
                           value="1"
                           {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
                    <label for="is_featured" style="margin: 0; font-weight: normal;">Sản phẩm nổi bật</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" 
                           name="status" 
                           id="status" 
                           value="1"
                           {{ old('status', $product->status) ? 'checked' : '' }}>
                    <label for="status" style="margin: 0; font-weight: normal;">Hiển thị</label>
                </div>
            </div>
        </div>

        <div style="margin-top: 30px; display: flex; gap: 15px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Cập nhật sản phẩm
            </button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
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

