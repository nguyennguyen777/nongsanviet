@extends('layouts.app')
<!-- css dùng chung với danhmucsanpham.css -->

@section('content')
    <div class="page-search">
        <div class="page-danhmucsanpham">
            <div class="container-content-common-all">
                <div class="container">
                    <div class="container-content">
                        <div class="content-top"></div>
                        <div class="row">
                            <div id="content-center" class="col-md-9 col-sm-12 col-xs-12">
                                <div class="alla-action-link">
                                    <div class="tabs"></div>
                                </div>
                                <div class="region region-content">
                                    <div id="block-system-main" class="block block-system">
                                        <div class="content">
                                            <div class="view view-search view-id-search view-display-id-page_1 row list search-list page-search-list">
                                                <div class="view-header">
                                                    <div class="page-tin-tuc-list-title">
                                                        {{ $keyword !== '' ? "Kết quả cho: \"{$keyword}\"" : 'Nhập từ khóa để tìm kiếm' }}
                                                    </div>
                                                </div>

                                                @if($keyword === '')
                                                    <p style="padding: 20px 0; color: #666;">Vui lòng nhập từ khóa để hiển thị kết quả.</p>
                                                @else
                                                    @php
                                                        $hasAny = $products->count() + $services->count() + $posts->count() > 0;
                                                    @endphp

                                                    @unless($hasAny)
                                                        <p style="padding: 20px 0; color: #666;">Không tìm thấy kết quả phù hợp.</p>
                                                    @endunless

                                                    <!-- Products -->
                                                    @if($products->count() > 0)
                                                        <div class="view-header" style="margin-top: 10px;">
                                                            <div class="page-tin-tuc-list-title">SẢN PHẨM</div>
                                                        </div>
                                                        <div class="view-content">
                                                            <div class="group-class-post-wrapper">
                                                                <div class="group-class-post row">
                                                                    @foreach($products as $product)
                                                                        <div class="views-row views-row-{{ $loop->iteration }} col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="views-field views-field-field-anh-dai-dien">
                                                                                <div class="field-content">
                                                                                    <a href="{{ route('product.show', $product->slug) }}">
                                                                                        <img class="img-responsive"
                                                                                            src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/products/default.jpg') }}"
                                                                                            alt="{{ $product->name }}">
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="views-field views-field-title" style="margin-top: 10px;">
                                                                                <span class="field-content">
                                                                                    <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                                                                </span>
                                                                            </div>
                                                                            <div class="views-field views-field-body" style="margin-top: 6px;">
                                                                                <span class="field-content">
                                                                                    {{ \Illuminate\Support\Str::limit(strip_tags($product->description ?? ''), 150) }}...
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <!-- Services -->
                                                    @if($services->count() > 0)
                                                        <div class="view-header" style="margin-top: 20px;">
                                                            <div class="page-tin-tuc-list-title">DỊCH VỤ</div>
                                                        </div>
                                                        <div class="view-content">
                                                            <div class="group-class-post-wrapper">
                                                                <div class="group-class-post row">
                                                                    @foreach($services as $service)
                                                                        <div class="views-row views-row-{{ $loop->iteration }} col-md-6 col-sm-6 col-xs-12">
                                                                            <div class="views-field views-field-field-anh-dai-dien">
                                                                                <div class="field-content">
                                                                                    <a href="{{ locale_url($service->slug) }}">
                                                                                        <img class="img-responsive"
                                                                                            src="{{ $service->image ? asset('storage/' . $service->image) : asset('storage/services/default.jpg') }}"
                                                                                            alt="{{ $service->title }}">
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="views-field views-field-title" style="margin-top: 10px;">
                                                                                <span class="field-content">
                                                                                    <a href="{{ locale_url($service->slug) }}">{{ $service->title }}</a>
                                                                                </span>
                                                                            </div>
                                                                            <div class="views-field views-field-body" style="margin-top: 6px;">
                                                                                <span class="field-content">
                                                                                    {{ \Illuminate\Support\Str::limit(strip_tags($service->description ?? ''), 150) }}...
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <!-- Posts -->
                                                    @if($posts->count() > 0)
                                                        <div class="view-header" style="margin-top: 20px;">
                                                            <div class="page-tin-tuc-list-title">TIN TỨC</div>
                                                        </div>
                                                        <div class="view-content">
                                                            <div class="group-class-post-wrapper">
                                                                <div class="group-class-post">
                                                                    @foreach($posts as $post)
                                                                        <div class="views-row views-row-{{ $loop->iteration }} views-row-{{ $loop->odd ? 'odd' : 'even' }} {{ $loop->first ? 'views-row-first' : '' }} {{ $loop->last ? 'views-row-last' : '' }}">
                                                                            <div class="views-field views-field-title">
                                                                                <span class="field-content">
                                                                                    <a href="{{ locale_url('tin-tuc/' . $post->slug) }}">{{ $post->title }}</a>
                                                                                </span>
                                                                            </div>
                                                                            <div class="views-field views-field-body">
                                                                                <span class="field-content">
                                                                                    {{ \Illuminate\Support\Str::limit(strip_tags($post->content ?? ''), 180) }}...
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-bottom"></div>
                            </div>

                            <div id="content-right" class="col-md-3 col-sm-12 col-xs-12">
                                <div class="region region-content-right-sp">
                                    <div class="block block-views block-border">
                                        <div class="block-title">
                                            <h3>{{ __('Hệ thống phân phối') }}</h3>
                                        </div>
                                        <div class="content">
                                            <p style="padding: 12px; color: #444;">
                                                {{ __('Tìm kiếm sản phẩm, dịch vụ, tin tức và hệ thống phân phối của Nông Sản Việt Nam.') }}
                                            </p>
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

