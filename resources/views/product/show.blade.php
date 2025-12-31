@extends('layouts.app')

@section('content')
<div class="page-product-detail">
    <div class="container-content-common-all">
        <div class="container">
            <div class="container-content">
                <div class="content-top"></div>
                <div class="row">
                    <div id="content-center" class="col-md-9 col-sm-12 col-xs-12">
                        <div class="product-detail-wrapper">
                            {{-- Product Header --}}
                            <div class="product-header">
                                <h1 class="product-title">{{ $product->name }}</h1>
                                <div class="product-meta">
                                    <span class="view-count">
                                        <i class="fas fa-eye"></i>
                                        {{ number_format($product->view_count ?? 0) }} lượt xem
                                    </span>
                                </div>
                            </div>

                            {{-- Product Content --}}
                            <div class="product-content">
                                {{-- Product Description --}}
                                <div class="product-description">
                                    @if($product->short_description)
                                        <div class="product-short-description">
                                            {!! nl2br(e($product->short_description)) !!}
                                        </div>
                                    @endif

                                    @if($product->description)
                                        <div class="product-full-description">
                                            {!! nl2br(e($product->description)) !!}
                                        </div>
                                    @endif
                                </div>

                                {{-- Product Image Section --}}
                                @if($product->image)
                                <div class="product-image-section">
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="product-main-image">
                                </div>
                                @endif

                                {{-- Background Image Section --}}
                                @if($product->background_image)
                                <div class="product-background-section">
                                    <img src="{{ asset('storage/' . $product->background_image) }}" 
                                         alt="Background" 
                                         class="product-background-image">
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Sidebar --}}
                    <div id="content-right" class="col-md-3 col-sm-12 col-xs-12">
                        <div class="region region-content-right-sp">
                            {{-- Sản phẩm nổi bật --}}
                            @if(isset($featuredCategories) && $featuredCategories->count() > 0)
                            <div id="block-views-block-san-pham-noi-bat" class="block block-views block-border">
                                <div class="block-title">
                                    <h3>SẢN PHẨM NỔI BẬT</h3>
                                </div>
                                <div class="content">
                                    <div class="view view-block-san-pham view-id-block_san_pham view-display-id-block_featured">
                                        <div class="view-content">
                                            @foreach($featuredCategories as $category)
                                                <div class="views-row views-row-{{ $loop->iteration }} views-row-{{ $loop->odd ? 'odd' : 'even' }} {{ $loop->first ? 'views-row-first' : '' }} {{ $loop->last ? 'views-row-last' : '' }}">
                                                    <div class="views-field views-field-name">
                                                        <span class="field-content">
                                                            <a href="{{ locale_url($category->slug) }}">{{ $category->name }}</a>
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            {{-- Tin tức mới nhất --}}
                            <div id="block-views-block-bai-viet-block-1" class="block block-views">
                                <div class="block-title">
                                    <h3>TIN TỨC MỚI NHẤT</h3>
                                </div>
                                <div class="content">
                                    <div class="view view-block-bai-viet view-id-block_bai_viet view-display-id-block_1">
                                        <div class="view-content">
                                            @forelse($latestPosts as $post)
                                                <div class="views-row views-row-{{ $loop->iteration }} views-row-{{ $loop->odd ? 'odd' : 'even' }} {{ $loop->first ? 'views-row-first' : '' }} {{ $loop->last ? 'views-row-last' : '' }}">
                                                    <div class="views-field views-field-title">
                                                        <span class="field-content">
                                                            <a href="{{ locale_url('tin-tuc/' . $post->slug) }}">{{ $post->title }}</a>
                                                        </span>
                                                    </div>
                                                    <div class="views-field views-field-body">
                                                        <span class="field-content">
                                                            {{ \Illuminate\Support\Str::limit(strip_tags($post->content ?? ''), 80) }}...
                                                        </span>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="views-row">
                                                    <div class="views-field views-field-title">
                                                        <span class="field-content">Chưa có tin tức nào</span>
                                                    </div>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
