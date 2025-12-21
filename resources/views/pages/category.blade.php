@extends('layouts.app')
<!-- css dùng chung với danhmucsanpham.css -->

@section('content')
    <div class="page-category">
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
                                    <div id="block-system-main" class="block block-system">

                                        <div class="content">
                                            <div
                                                class="view view-san-pham view-id-san_pham view-display-id-page_1 row list san-pham-list page-san-pham-list view-dom-id-b5d5146fa8df9b318b11b020dd78c4c9 jquery-once-1-processed refresh-processed">
                                                <div class="view-header">
                                                    <div class="page-san-pham-list-title">{{ $category->name }}</div>
                                                </div>

                                                <div class="view-content">
                                                    <div class="group-class-product-wrapper">
                                                        <div class="group-class-product">
                                                            @forelse($products as $product)
                                                                <div
                                                                    class="views-row views-row-{{ $loop->iteration }} views-row-{{ $loop->odd ? 'odd' : 'even' }} {{ $loop->first ? 'views-row-first' : '' }} {{ $loop->last ? 'views-row-last' : '' }} col-md-3 col-sm-6 col-xs-12">

                                                                    <div class="views-field views-field-field-anh-dai-dien">
                                                                        <div class="field-content">
                                                                            <a href="{{ route('product.show', $product->slug) }}">
                                                                                <img class="img-responsive" 
                                                                                    src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/products/default.jpg') }}" 
                                                                                    width="385" 
                                                                                    height="279" 
                                                                                    alt="{{ $product->name }}">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="views-field views-field-title">
                                                                        <span class="field-content">
                                                                            <a href="{{ route('product.show', $product->slug) }}">{{ strtoupper($product->name) }}</a>
                                                                        </span>
                                                                    </div>
                                                                    <div class="views-field views-field-view-node">
                                                                        <span class="field-content">
                                                                            <a href="{{ route('product.show', $product->slug) }}">Xem chi tiết</a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            @empty
                                                                <div class="col-12">
                                                                    <p class="text-center">Chưa có sản phẩm nào trong danh mục này.</p>
                                                                </div>
                                                            @endforelse
                                                        </div><!--end your div-->
                                                    </div>
                                                </div>

                                                @if($products->hasPages())
                                                    <h2 class="element-invisible">Trang</h2>
                                                    <div class="item-list">
                                                        <ul class="pager">
                                                            @if ($products->currentPage() > 1)
                                                                <li class="pager-first first">
                                                                    <a title="Đến trang đầu" href="{{ $products->url(1) }}">«</a>
                                                                </li>
                                                                <li class="pager-previous">
                                                                    <a title="Đến trang trước" href="{{ $products->previousPageUrl() }}">‹</a>
                                                                </li>
                                                                @if ($products->currentPage() > 2)
                                                                    <li class="pager-item">
                                                                        <a title="Đến trang {{ $products->currentPage() - 1 }}" 
                                                                           href="{{ $products->url($products->currentPage() - 1) }}">{{ $products->currentPage() - 1 }}</a>
                                                                    </li>
                                                                @endif
                                                            @endif
                                                            
                                                            <li class="pager-current">{{ $products->currentPage() }}</li>
                                                            
                                                            @if ($products->currentPage() < $products->lastPage())
                                                                @if ($products->currentPage() < $products->lastPage() - 1)
                                                                    <li class="pager-item">
                                                                        <a title="Đến trang {{ $products->currentPage() + 1 }}" 
                                                                           href="{{ $products->nextPageUrl() }}">{{ $products->currentPage() + 1 }}</a>
                                                                    </li>
                                                                @endif

                                                                @if ($products->hasMorePages())
                                                                    <li class="pager-next">
                                                                        <a title="Đến trang sau" href="{{ $products->nextPageUrl() }}">›</a>
                                                                    </li>
                                                                    <li class="pager-last last">
                                                                        <a title="Đến trang cuối" href="{{ $products->url($products->lastPage()) }}">»</a>
                                                                    </li>
                                                                @endif
                                                            @endif
                                                        </ul>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
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
                                                class="view view-block-cate view-id-block_cate view-display-id-block_2 view-dom-id-32ff5f58df41cee45a909a2ecceffc51">

                                                <div class="view-content">
                                                    @forelse($categories as $cat)
                                                        <div class="views-row views-row-{{ $loop->iteration }} views-row-{{ $loop->odd ? 'odd' : 'even' }} {{ $loop->first ? 'views-row-first' : '' }} {{ $loop->last ? 'views-row-last' : '' }}">
                                                            <div class="views-field views-field-name">
                                                                <span class="field-content">
                                                                    <a href="{{ url('/vi/' . $cat->slug) }}" {{ $cat->id == $category->id ? 'class="active"' : '' }}>
                                                                        {{ $cat->name }}
                                                                    </a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <div class="views-row">
                                                            <div class="views-field views-field-name">
                                                                <span class="field-content">Chưa có danh mục khác</span>
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
                                                class="view view-block-bai-viet view-id-block_bai_viet view-display-id-block_1 view-dom-id-701fdc16b2d6447ae6d1c05fe2933cbc">

                                                <div class="view-content">
                                                    @forelse($latestPosts as $post)
                                                        <div class="views-row views-row-{{ $loop->iteration }} views-row-{{ $loop->odd ? 'odd' : 'even' }} {{ $loop->first ? 'views-row-first' : '' }} {{ $loop->last ? 'views-row-last' : '' }}">

                                                            <div class="views-field views-field-title">
                                                                <span class="field-content">
                                                                    <a href="{{ url('/vi/content/' . $post->slug) }}">{{ $post->title }}</a>
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
    </div>
@endsection

