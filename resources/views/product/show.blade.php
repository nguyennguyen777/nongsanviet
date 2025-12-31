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
                                {{-- Product Image Section --}}
                                @if($product->image)
                                <div class="product-image-section">
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="product-main-image">
                                </div>
                                @endif

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
                            {{-- Related Products --}}
                            @if(isset($related) && $related->count() > 0)
                            <div id="block-views-block-san-pham-lien-quan" class="block block-views block-border">
                                <div class="block-title">
                                    <h3>Sản phẩm liên quan</h3>
                                </div>
                                <div class="content">
                                    <div class="view-content">
                                        @foreach($related as $r)
                                        <div class="views-row">
                                            <div class="views-field views-field-field-anh-dai-dien">
                                                <div class="field-content">
                                                    <a href="{{ route('product.show', $r->slug) }}">
                                                        <img src="{{ $r->image ? asset('storage/' . $r->image) : asset('storage/products/default.jpg') }}" 
                                                             alt="{{ $r->name }}"
                                                             class="related-product-image">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="views-field views-field-title">
                                                <span class="field-content">
                                                    <a href="{{ route('product.show', $r->slug) }}">{{ $r->name }}</a>
                                                </span>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
