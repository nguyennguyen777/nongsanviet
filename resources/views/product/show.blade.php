@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10">

    {{-- Title --}}
    <h1 class="text-3xl font-bold mb-6">{{ $product->name }}</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        {{-- ===== Left: Gallery ===== --}}
        <div>
            @php
                // Ảnh chính
                $main = $product->image;

                // giả lập thumbnails (nếu chưa có relation images)
                $thumbs = [$product->image];
            @endphp

            {{-- Ảnh lớn --}}
            <img id="mainImage"
                 src="{{ asset('storage/' . $main) }}"
                 class="w-full object-contain rounded-lg border mb-4">

            {{-- Thumbnails --}}
            <div class="flex gap-2">
                @foreach($thumbs as $img)
                    <button type="button"
                            class="thumb-btn border rounded p-1 hover:opacity-80"
                            data-full="{{ asset('storage/' . $img) }}">
                        <img src="{{ asset('storage/' . $img) }}"
                             class="w-20 h-20 object-cover rounded">
                    </button>
                @endforeach
            </div>
        </div>


        {{-- ===== Right: Info ===== --}}
        <div>

            <p class="text-3xl font-bold text-green-600 mb-4">
                {{ number_format($product->price, 0, ',', '.') }} đ
            </p>

            {{-- Short description nếu có --}}
            <div class="text-gray-700 text-lg leading-relaxed mb-6">
                {!! nl2br(e($product->short_description ?? '')) !!}
            </div>

            {{-- Button add to cart (placeholder) --}}
            <button class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
                Thêm vào giỏ
            </button>

            {{-- Full description --}}
            <hr class="my-6">

            <h2 class="text-xl font-semibold mb-4">Mô tả sản phẩm</h2>
            <div class="prose max-w-none">
                {!! nl2br(e($product->description)) !!}
            </div>
        </div>
    </div>


    {{-- ===== Related products ===== --}}
    @if(isset($related) && $related->count())
    <div class="mt-16">
        <h2 class="text-2xl font-bold mb-6">Sản phẩm liên quan</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($related as $r)
            <a href="{{ route('product.show', $r->slug) }}"
               class="block border rounded-lg overflow-hidden hover:shadow-lg">

                <img src="{{ asset('storage/' . $r->image) }}"
                     class="w-full h-40 object-cover">

                <div class="p-3">
                    <p class="font-semibold mb-1">
                        {{ Str::limit($r->name, 45) }}
                    </p>
                    <p class="text-green-600 font-bold">
                        {{ number_format($r->price, 0, ',', '.') }} đ
                    </p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif

</div>

{{-- ===== JS for gallery ===== --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const main = document.getElementById('mainImage');
    const thumbs = document.querySelectorAll('.thumb-btn');

    thumbs.forEach(btn => {
        btn.addEventListener('click', function () {
            const full = this.getAttribute('data-full');
            if (full) main.src = full;
        });
    });
});
</script>
@endsection
