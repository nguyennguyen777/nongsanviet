@extends('layouts.app') {{-- hoặc layouts.master tùy bạn --}}

@section('content')
    <div class="page-danhmucsanpham">
        <div class="container-content-common-all">
            <div class="container">
                <div class="container-content">
                    <div class="content-top">
                    </div>
                    <div class="row">
                        <div id="content-center" class="col-md-9 col-sm-12 col-xs-12">
                            <div class="alla-action-link">
                                <div class="tabs">
                                </div>
                            </div>
                            <div class="region region-content">
                                @foreach($categories as $category)
                                    @if(isset($categoryProducts[$category->id]) && $categoryProducts[$category->id]->count() > 0)
                                        <div id="block-views-block-san-pham-block-{{ $category->id }}"
                                            class="block block-views block-san-pham-danh-muc">
                                            <div class="block-title">
                                                <h3>{{ $category->name }}</h3>
                                            </div>
                                            <div class="content">
                                                <div class="view view-block-san-pham view-id-block_san_pham view-display-id-block_{{ $category->id }} row list san-pham-list">
                                                    <div class="view-header">
                                                        <a href="{{ locale_url($category->slug) }}" class="view-more">Xem thêm&gt;&gt;</a>
                                                    </div>
                                                    <div class="view-content" style="display: flex !important; flex-wrap: wrap !important; justify-content: flex-start !important; align-items: stretch !important;">
                                                        @foreach($categoryProducts[$category->id] as $product)
                                                            <div class="views-row views-row-{{ $loop->iteration }} views-row-{{ $loop->odd ? 'odd' : 'even' }} {{ $loop->first ? 'views-row-first' : '' }} {{ $loop->last ? 'views-row-last' : '' }} col-md-3 col-sm-6 col-xs-12" style="display: flex !important; flex-direction: column !important; height: 100% !important; float: none !important;">
                                                                <div class="views-field views-field-field-anh-dai-dien">
                                                                    <div class="field-content">
                                                                        <a href="{{ route('product.show', $product->slug) }}">
                                                                            <img class="img-responsive" typeof="foaf:Image"
                                                                                src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/products/default.jpg') }}"
                                                                                width="385" height="279" alt="{{ $product->name }}">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="views-field views-field-title">
                                                                    <span class="field-content">
                                                                        <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                                                    </span>
                                                                </div>
                                                                <div class="views-field views-field-view-node" style="margin-top: auto !important; padding-top: 10px !important;">
                                                                    <span class="field-content">
                                                                        <a href="{{ route('product.show', $product->slug) }}">Xem chi tiết</a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="content-bottom">
                            </div>
                        </div>
                        <div id="content-right" class="col-md-3 col-sm-12 col-xs-12">
                            <div class="region region-content-right-sp">
                                <div id="block-views-block-cate-block-2" class="block block-views block-border">

                                    <div class="block-title">
                                        <h3>Sản phẩm nổi bật</h3>
                                    </div>

                                    <div class="content">
                                        <div
                                            class="view view-block-cate view-id-block_cate view-display-id-block_2 view-dom-id-58eb84ddc28a26f01b0e26f15094a22b">

                                            <div class="view-content">
                                                @forelse($allCategories as $cat)
                                                    <div class="views-row views-row-{{ $loop->iteration }} views-row-{{ $loop->odd ? 'odd' : 'even' }} {{ $loop->first ? 'views-row-first' : '' }} {{ $loop->last ? 'views-row-last' : '' }}">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url($cat->slug) }}">{{ $cat->name }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">Chưa có danh mục nào</span>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div id="block-views-block-bai-viet-block-1" class="block block-views">

                                    <div class="block-title">
                                        <h3>Tin tức mới nhất</h3>
                                    </div>

                                    <div class="content">
                                        <div
                                            class="view view-block-bai-viet view-id-block_bai_viet view-display-id-block_1 view-dom-id-d9a995a8bf3334ef7d37565e56b79ac5">

                                            <div class="view-content">
                                                @forelse($latestPosts as $post)
                                                    <div class="views-row views-row-{{ $loop->iteration }} views-row-{{ $loop->odd ? 'odd' : 'even' }} {{ $loop->first ? 'views-row-first' : '' }} {{ $loop->last ? 'views-row-last' : '' }}">
                                                        <div class="views-field views-field-title">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('content/' . $post->slug) }}">{{ $post->title }}</a>
                                                            </span>
                                                        </div>
                                                        <div class="views-field views-field-body">
                                                            <span class="field-content">
                                                                {{ \Illuminate\Support\Str::limit(strip_tags($post->content ?? ''), 100) }}...
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