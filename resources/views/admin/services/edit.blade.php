@extends('admin.layout')

@section('title', 'Chỉnh sửa dịch vụ')
@section('page-title', 'Chỉnh sửa dịch vụ: ' . ($service->attributes['title'] ?? $service->title))

@section('styles')
<style>
    .section-block {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
        background: #f8f9fa;
    }
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        cursor: pointer;
        padding: 10px;
        background: white;
        border-radius: 5px;
    }
    .section-header h4 {
        margin: 0;
        color: #2c3e50;
    }
    .section-content {
        display: block;
    }
    .section-content.collapsed {
        display: none;
    }
</style>
@endsection

@section('content')
<div class="content-box">
    <form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- Thông tin cơ bản -->
        <div class="section-block" style="background: white; border: 2px solid #8bc34a;">
            <h3 style="margin-bottom: 20px; color: #2c3e50; border-bottom: 2px solid #8bc34a; padding-bottom: 10px;">
                Thông tin cơ bản
            </h3>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <div class="form-group">
                        <label for="title">Tiêu đề dịch vụ (Tiếng Việt) *</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $service->attributes['title'] ?? $service->title) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="title_en">Tiêu đề (Tiếng Anh)</label>
                        <input type="text" name="title_en" id="title_en" class="form-control" value="{{ old('title_en', $service->attributes['title_en'] ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for="title_zh">Tiêu đề (Tiếng Trung)</label>
                        <input type="text" name="title_zh" id="title_zh" class="form-control" value="{{ old('title_zh', $service->attributes['title_zh'] ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label for="slug">Slug (URL friendly)</label>
                        <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $service->slug) }}">
                    </div>
                </div>

                <div>
                    <div class="form-group">
                        <label for="description">Mô tả chính (Tiếng Việt)</label>
                        <textarea name="description" id="description" class="form-control" rows="8">{{ old('description', $service->attributes['description'] ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="description_en">Mô tả chính (Tiếng Anh)</label>
                        <textarea name="description_en" id="description_en" class="form-control" rows="8">{{ old('description_en', $service->attributes['description_en'] ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="description_zh">Mô tả chính (Tiếng Trung)</label>
                        <textarea name="description_zh" id="description_zh" class="form-control" rows="8">{{ old('description_zh', $service->attributes['description_zh'] ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Ảnh chính</label>
                        @if($service->image)
                            <div style="margin-bottom: 10px;">
                                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="img-preview" style="max-width: 200px; max-height: 200px;">
                            </div>
                            <small style="color: #7f8c8d;">Ảnh hiện tại (chọn ảnh mới để thay thế)</small>
                        @endif
                        <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(this, 'preview-image')" style="margin-top: 10px;">
                        <img id="preview-image" class="img-preview" style="display: none; margin-top: 10px;">
                    </div>

                    <div class="form-check">
                        <input type="checkbox" name="status" id="status" value="1" {{ old('status', $service->status) ? 'checked' : '' }}>
                        <label for="status" style="margin: 0; font-weight: normal;">Hiển thị</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 1 (title1, description, image) -->
        <div class="section-block">
            <div class="section-header" onclick="toggleSection('section1')">
                <h4>Section 1 (Tiêu đề phụ đầu tiên)</h4>
                <i class="fas fa-chevron-down" id="icon-section1"></i>
            </div>
            <div class="section-content" id="section1">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <div class="form-group">
                            <label for="title1">Tiêu đề Section 1 (Tiếng Việt)</label>
                            <input type="text" name="title1" id="title1" class="form-control" value="{{ old('title1', $service->attributes['title1'] ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="title1_en">Tiêu đề Section 1 (Tiếng Anh)</label>
                            <input type="text" name="title1_en" id="title1_en" class="form-control" value="{{ old('title1_en', $service->attributes['title1_en'] ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="title1_zh">Tiêu đề Section 1 (Tiếng Trung)</label>
                            <input type="text" name="title1_zh" id="title1_zh" class="form-control" value="{{ old('title1_zh', $service->attributes['title1_zh'] ?? '') }}">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Lưu ý: Section 1 sử dụng mô tả chính (description) và ảnh chính (image) ở trên</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @for($i = 2; $i <= 8; $i++)
        <!-- Section {{ $i }} -->
        <div class="section-block">
            <div class="section-header" onclick="toggleSection('section{{ $i }}')">
                <h4>Section {{ $i }} (Điểm/Hạng mục {{ $i - 1 }})</h4>
                <i class="fas fa-chevron-down" id="icon-section{{ $i }}"></i>
            </div>
            <div class="section-content collapsed" id="section{{ $i }}">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <div class="form-group">
                            <label for="title{{ $i }}">Tiêu đề (Tiếng Việt)</label>
                            <input type="text" name="title{{ $i }}" id="title{{ $i }}" class="form-control" value="{{ old("title{$i}", $service->attributes["title{$i}"] ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="title{{ $i }}_en">Tiêu đề (Tiếng Anh)</label>
                            <input type="text" name="title{{ $i }}_en" id="title{{ $i }}_en" class="form-control" value="{{ old("title{$i}_en", $service->attributes["title{$i}_en"] ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="title{{ $i }}_zh">Tiêu đề (Tiếng Trung)</label>
                            <input type="text" name="title{{ $i }}_zh" id="title{{ $i }}_zh" class="form-control" value="{{ old("title{$i}_zh", $service->attributes["title{$i}_zh"] ?? '') }}">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="description{{ $i }}">Mô tả (Tiếng Việt)</label>
                            <textarea name="description{{ $i }}" id="description{{ $i }}" class="form-control" rows="6">{{ old("description{$i}", $service->attributes["description{$i}"] ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description{{ $i }}_en">Mô tả (Tiếng Anh)</label>
                            <textarea name="description{{ $i }}_en" id="description{{ $i }}_en" class="form-control" rows="6">{{ old("description{$i}_en", $service->attributes["description{$i}_en"] ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="description{{ $i }}_zh">Mô tả (Tiếng Trung)</label>
                            <textarea name="description{{ $i }}_zh" id="description{{ $i }}_zh" class="form-control" rows="6">{{ old("description{$i}_zh", $service->attributes["description{$i}_zh"] ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image{{ $i }}">Ảnh</label>
                            @php
                                $imageField = "image{$i}";
                                $currentImage = $service->$imageField ?? null;
                            @endphp
                            @if($currentImage)
                                <div style="margin-bottom: 10px;">
                                    <img src="{{ asset('storage/' . $currentImage) }}" alt="Section {{ $i }}" class="img-preview" style="max-width: 200px; max-height: 200px;">
                                </div>
                                <small style="color: #7f8c8d;">Ảnh hiện tại (chọn ảnh mới để thay thế)</small>
                            @endif
                            <input type="file" name="image{{ $i }}" id="image{{ $i }}" class="form-control" accept="image/*" onchange="previewImage(this, 'preview-image{{ $i }}')" style="margin-top: 10px;">
                            <img id="preview-image{{ $i }}" class="img-preview" style="display: none; margin-top: 10px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endfor

        <div style="margin-top: 30px; display: flex; gap: 15px;">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Cập nhật dịch vụ
            </button>
            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">
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

function toggleSection(sectionId) {
    const section = document.getElementById(sectionId);
    const icon = document.getElementById('icon-' + sectionId);
    section.classList.toggle('collapsed');
    if (section.classList.contains('collapsed')) {
        icon.classList.remove('fa-chevron-up');
        icon.classList.add('fa-chevron-down');
    } else {
        icon.classList.remove('fa-chevron-down');
        icon.classList.add('fa-chevron-up');
    }
}

// Tự động mở section nào có dữ liệu
document.addEventListener('DOMContentLoaded', function() {
    @for($i = 1; $i <= 8; $i++)
        @if($i == 1)
            @php
                $hasData = isset($service->attributes['title1']) && $service->attributes['title1'];
            @endphp
        @else
            @php
                $imageField = "image{$i}";
                $titleField = "title{$i}";
                $descField = "description{$i}";
                $hasData = (isset($service->$imageField) && $service->$imageField) || 
                           (isset($service->attributes[$titleField]) && $service->attributes[$titleField]) ||
                           (isset($service->attributes[$descField]) && $service->attributes[$descField]);
            @endphp
        @endif
        @if($hasData)
            toggleSection('section{{ $i }}');
        @endif
    @endfor
});
</script>
@endpush
@endsection
