@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')

{{-- HERO SECTION --}}
<section class="bg-green-600 text-white py-20">
    <div class="container mx-auto text-center">
        <h1 class="text-4xl font-bold mb-4">Nông sản sạch - Chất lượng từ Việt Nam</h1>
        <p class="text-lg mb-6">
            Cung cấp sản phẩm nông nghiệp tươi ngon, an toàn, rõ nguồn gốc.
        </p>
        <a href="{{ url('/products') }}"
           class="bg-white text-green-700 px-6 py-3 rounded-lg font-semibold shadow hover:bg-gray-100">
            Xem sản phẩm
        </a>
    </div>
</section>

{{-- FEATURE BOXES --}}
<section class="py-16 bg-gray-50">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-6">

        <div class="bg-white p-6 rounded-xl shadow text-center">
            <h3 class="font-bold mb-2">Sản phẩm sạch</h3>
            <p class="text-sm text-gray-600">Chọn lọc từ các trang trại uy tín.</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow text-center">
            <h3 class="font-bold mb-2">Vận chuyển nhanh</h3>
            <p class="text-sm text-gray-600">Đặt hôm nay – giao trong ngày.</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow text-center">
            <h3 class="font-bold mb-2">Nguồn gốc rõ ràng</h3>
            <p class="text-sm text-gray-600">Minh bạch farm → khách hàng.</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow text-center">
            <h3 class="font-bold mb-2">Giá hợp lý</h3>
            <p class="text-sm text-gray-600">Luôn tối ưu cho người tiêu dùng.</p>
        </div>

    </div>
</section>

{{-- FEATURED PRODUCTS (Dữ liệu từ DB) --}}
@if(isset($featuredProducts) && count($featuredProducts) > 0)
<section class="py-16">
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-6">Sản phẩm nổi bật</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">

            @foreach ($featuredProducts as $product)
                <div class="bg-white p-4 rounded-xl shadow text-center">
                    <img src="{{ asset($product->image) }}" class="h-40 w-full object-cover rounded-lg mb-3" alt="">

                    <h3 class="font-bold">{{ $product->name }}</h3>
                    <p class="text-green-600 font-semibold mt-1">
                        {{ number_format($product->price) }} đ
                    </p>

                    <a href="{{ url('/product/' . $product->slug) }}"
                       class="mt-3 inline-block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                        Xem chi tiết
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</section>
@endif


@endsection
