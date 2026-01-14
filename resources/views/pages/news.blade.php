@extends('layouts.app')
<!-- CSS được import trong app.css -->

@section('content')
    <div class="page-news">
        <div class="page-danhmucsanpham">
            <div class="container-content-common-all">
                <div class="container">
                    <div class="container-content">
                        <div class="content-top">
                            <div class="region region-content-top">
                                <!-- Tin nổi bật -->
                                @if($featuredPosts->count() > 0)
                                    <div id="block-views-block-bai-viet-block-2" class="block block-views">
                                        <div class="block-title"><h3>Tin nổi bật</h3></div>
                                        <div class="content">
                                            <div class="view view-block-bai-viet view-id-block_bai_viet view-display-id-block_2">
                                                <div class="view-content">
                                                    @foreach($featuredPosts as $post)
                                                        <div class="views-row views-row-{{ $loop->iteration }} views-row-{{ $loop->odd ? 'odd' : 'even' }} {{ $loop->first ? 'views-row-first' : '' }} {{ $loop->last ? 'views-row-last' : '' }}">
                                                            <div class="views-field views-field-nothing">
                                                                <div class="field-content">
                                                                    <div class="views-field views-field-field-anh-dai-dien">
                                                                        <a href="{{ locale_url('tin-tuc/' . $post->slug) }}">
                                                                            <img class="img-responsive" 
                                                                                src="{{ $post->image ? asset('storage/' . $post->image) : asset('storage/posts/default.jpg') }}" 
                                                                                alt="{{ $post->title }}">
                                                                        </a>
                                                                    </div>
                                                                    <div class="views-field views-field-title">
                                                                        <a href="{{ locale_url('tin-tuc/' . $post->slug) }}">{{ $post->title }}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
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

                                            <!-- Danh sách tin tức -->
                                            <div class="view view-bai-viet view-id-bai_viet view-display-id-page_1 tin-tuc-list row">
                                                <div class="view-content">
                                                    @forelse($posts as $post)
                                                        <div class="views-row views-row-{{ $loop->iteration }} views-row-{{ $loop->odd ? 'odd' : 'even' }} {{ $loop->first ? 'views-row-first' : '' }} {{ $loop->last ? 'views-row-last' : '' }} col-md-12 col-sm-12 col-xs-12">
                                                            <div class="views-field views-field-field-anh-dai-dien">
                                                                <div class="field-content">
                                                                    <a href="{{ locale_url('tin-tuc/' . $post->slug) }}">
                                                                        <img class="img-responsive" 
                                                                            src="{{ $post->image ? asset('storage/' . $post->image) : asset('storage/posts/default.jpg') }}" 
                                                                            alt="{{ $post->title }}">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="views-field views-field-nothing">
                                                                <div class="field-content">
                                                                    <div class="views-field views-field-title">
                                                                        <a href="{{ locale_url('tin-tuc/' . $post->slug) }}">{{ $post->title }}</a>
                                                                    </div>
                                                                    <div class="views-field views-field-body">
                                                                        {{ \Illuminate\Support\Str::limit(strip_tags($post->content ?? ''), 200) }}...
                                                                    </div>
                                                                    <div class="views-field views-field-view-node">
                                                                        <a href="{{ locale_url('tin-tuc/' . $post->slug) }}">Đọc tiếp</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <div class="col-12">
                                                            <p class="text-center" style="padding: 40px; color: #999;">Chưa có tin tức nào.</p>
                                                        </div>
                                                    @endforelse
                                                </div>

                                                <!-- Pagination -->
                                                @if($posts->hasPages())
                                                    <h2 class="element-invisible">Trang</h2>
                                                    <div class="item-list">
                                                        <ul class="pager">
                                                            @if ($posts->currentPage() > 1)
                                                                <li class="pager-first first">
                                                                    <a title="Đến trang đầu" href="{{ $posts->url(1) }}">«</a>
                                                                </li>
                                                                <li class="pager-previous">
                                                                    <a title="Đến trang trước" href="{{ $posts->previousPageUrl() }}">‹</a>
                                                                </li>
                                                                @if ($posts->currentPage() > 2)
                                                                    <li class="pager-item">
                                                                        <a title="Đến trang {{ $posts->currentPage() - 1 }}" 
                                                                           href="{{ $posts->url($posts->currentPage() - 1) }}">{{ $posts->currentPage() - 1 }}</a>
                                                                    </li>
                                                                @endif
                                                            @endif
                                                            
                                                            <li class="pager-current">{{ $posts->currentPage() }}</li>
                                                            
                                                            @if ($posts->currentPage() < $posts->lastPage())
                                                                @if ($posts->currentPage() < $posts->lastPage() - 1)
                                                                    <li class="pager-item">
                                                                        <a title="Đến trang {{ $posts->currentPage() + 1 }}" 
                                                                           href="{{ $posts->url($posts->currentPage() + 1) }}">{{ $posts->currentPage() + 1 }}</a>
                                                                    </li>
                                                                @endif

                                                                @if ($posts->hasMorePages())
                                                                    <li class="pager-next">
                                                                        <a title="Đến trang sau" href="{{ $posts->nextPageUrl() }}">›</a>
                                                                    </li>
                                                                    <li class="pager-last last">
                                                                        <a title="Đến trang cuối" href="{{ $posts->url($posts->lastPage()) }}">»</a>
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

                            <!-- Sidebar -->
                            <div id="content-right" class="col-md-3 col-sm-12 col-xs-12">
                                <div class="region region-content-right-sp">
                                    <!-- Sản phẩm nổi bật -->
                                    <div id="block-views-block-san-pham-noi-bat" class="block block-views block-border">
                                        <div class="block-title">
                                            <h3>SẢN PHẨM NỔI BẬT</h3>
                                        </div>
                                        <div class="content">
                                            <div class="view view-block-san-pham view-id-block_san_pham view-display-id-block_featured">
                                                <div class="view-content">
                                                    @forelse($featuredCategories as $category)
                                                        <div class="views-row views-row-{{ $loop->iteration }} views-row-{{ $loop->odd ? 'odd' : 'even' }} {{ $loop->first ? 'views-row-first' : '' }} {{ $loop->last ? 'views-row-last' : '' }}">
                                                            <div class="views-field views-field-name">
                                                                <span class="field-content">
                                                                    <a href="{{ locale_url($category->slug) }}">{{ $category->name }}</a>
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

                                    <!-- Sản phẩm mới -->
                                    <div id="block-views-block-san-pham-moi" class="block block-views block-border">
                                        <div class="block-title">
                                            <h3>SẢN PHẨM MỚI</h3>
                                        </div>
                                        <div class="content">
                                            <div class="view view-block-san-pham view-id-block_san_pham view-display-id-block_new">
                                                <div class="view-content">
                                                    @forelse($newProducts as $product)
                                                        <div class="views-row views-row-{{ $loop->iteration }} views-row-{{ $loop->odd ? 'odd' : 'even' }} {{ $loop->first ? 'views-row-first' : '' }} {{ $loop->last ? 'views-row-last' : '' }}">
                                                            <div class="views-field views-field-field-anh-dai-dien">
                                                                <div class="field-content">
                                                                    <a href="{{ route('product.show', $product->slug) }}">
                                                                        <img class="img-responsive" 
                                                                            src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/products/default.jpg') }}" 
                                                                            alt="{{ $product->name }}">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="views-field views-field-title">
                                                                <span class="field-content">
                                                                    <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <div class="views-row">
                                                            <div class="views-field views-field-title">
                                                                <span class="field-content">Chưa có sản phẩm mới</span>
                                                            </div>
                                                        </div>
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tin tức mới nhất -->
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
    </div>
@endsection

