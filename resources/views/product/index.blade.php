@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">

    <h1 class="text-2xl font-bold mb-4">Danh sách sản phẩm</h1>

    {{-- FILTER CATEGORY --}}
    <form method="GET" action="{{ route('products.index') }}" class="mb-6">
        <select name="category"
                onchange="this.form.submit()"
                class="border px-3 py-2 rounded">

            <option value="">-- Tất cả danh mục --</option>

            @foreach($categories as $cat)
                <option value="{{ $cat->slug }}"
                    {{ $categorySlug === $cat->slug ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </form>

    {{-- PRODUCT LIST --}}
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($products as $product)
            <div class="border rounded p-4">
                <a href="{{ route('product.show', $product->slug) }}">
                    @if($product->image)
                        <img src="{{ asset('storage/'.$product->image) }}"
                             class="mb-3 w-full h-40 object-cover">
                    @endif

                    <h3 class="font-semibold text-lg">{{ $product->name }}</h3>
                    <p class="text-sm text-gray-600">
                        {{ optional($product->category)->name }}
                    </p>
                    <p class="mt-2 font-bold text-green-600">
                        {{ number_format($product->price) }}đ
                    </p>
                </a>
            </div>
        @empty
            <p>Không có sản phẩm.</p>
        @endforelse
    </div>

    {{-- PAGINATION --}}
    <div class="mt-6">
        {{ $products->links() }}
    </div>
</div>
@endsection
