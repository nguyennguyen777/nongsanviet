@extends('layouts.app')
<!-- css dùng chung với danhmucsanpham.css -->

@section('content')
    <div class="page-post">
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
                                            <!-- Chi tiết bài viết -->
                                            <article class="post-detail">
                                                <div class="post-header">
                                                    <h1 class="post-title">{{ $post->title }}</h1>
                                                    <div class="post-meta">
                                                        <span class="post-date">{{ $post->created_at->format('d/m/Y') }}</span>
                                                    </div>
                                                </div>

                                                @if($post->image)
                                                    <div class="post-image">
                                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-responsive">
                                                    </div>
                                                @endif

                                                <div class="post-content">
                                                    {!! $post->content !!}
                                                </div>
                                            </article>

                                            <!-- Tin tức liên quan -->
                                            @if($relatedPosts->count() > 0)
                                                <div class="related-posts" style="margin-top: 40px;">
                                                    <h2 class="related-title" style="background: #8bc34a; color: #fff; padding: 12px 15px; font-family: 'UTM-AvoBold'; font-size: 18px; text-transform: uppercase; margin-bottom: 20px;">
                                                        TIN TỨC LIÊN QUAN
                                                    </h2>
                                                    <div class="related-posts-list row">
                                                        @foreach($relatedPosts->take(3) as $relatedPost)
                                                            <div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                                                <div class="related-post-item">
                                                                    @if($relatedPost->image)
                                                                        <div class="related-post-image">
                                                                            <a href="{{ locale_url('tin-tuc/' . $relatedPost->slug) }}">
                                                                                <img src="{{ asset('storage/' . $relatedPost->image) }}" alt="{{ $relatedPost->title }}" style="width: 100%; height: 150px; object-fit: cover;">
                                                                            </a>
                                                                        </div>
                                                                    @endif
                                                                    <div class="related-post-title" style="margin-top: 10px;">
                                                                        <a href="{{ locale_url('tin-tuc/' . $relatedPost->slug) }}" style="color: #333; font-size: 14px; font-weight: bold; text-decoration: none; font-family: 'UTM-AvoBold';">
                                                                            {{ $relatedPost->title }}
                                                                        </a>
                                                                    </div>
                                                                    <div class="related-post-date" style="color: #999; font-size: 12px; margin-top: 5px;">
                                                                        {{ $relatedPost->created_at->format('d/m/Y') }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
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
                                    @if($featuredProducts->count() > 0)
                                        <div id="block-views-block-san-pham-noi-bat" class="block block-views block-border">
                                            <div class="block-title">
                                                <h3>SẢN PHẨM NỔI BẬT</h3>
                                            </div>
                                            <div class="content">
                                                <div class="view view-block-san-pham view-id-block_san_pham view-display-id-block_featured">
                                                    <div class="view-content">
                                                        @foreach($featuredProducts as $product)
                                                            <div class="views-row views-row-{{ $loop->iteration }}" style="margin-bottom: 15px;">
                                                                <div class="views-field views-field-field-anh-dai-dien">
                                                                    <div class="field-content">
                                                                        <a href="{{ route('product.show', $product->slug) }}">
                                                                            <img class="img-responsive" 
                                                                                src="{{ $product->image ? asset('storage/' . $product->image) : asset('storage/products/default.jpg') }}" 
                                                                                alt="{{ $product->name }}"
                                                                                style="width: 100%; height: 120px; object-fit: cover;">
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="views-field views-field-title" style="margin-top: 8px;">
                                                                    <span class="field-content">
                                                                        <a href="{{ route('product.show', $product->slug) }}" style="font-size: 13px; color: #333; text-decoration: none; font-family: 'UTM-Avo';">
                                                                            {{ $product->name }}
                                                                        </a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Tin tức mới nhất -->
                                    <div id="block-views-block-bai-viet-block-1" class="block block-views" style="margin-top: 30px;">
                                        <div class="block-title">
                                            <h3>TIN TỨC MỚI NHẤT</h3>
                                        </div>
                                        <div class="content">
                                            <div class="view view-block-bai-viet view-id-block_bai_viet view-display-id-block_1">
                                                <div class="view-content">
                                                    @forelse($latestPosts as $latestPost)
                                                        <div class="views-row views-row-{{ $loop->iteration }} views-row-{{ $loop->odd ? 'odd' : 'even' }} {{ $loop->first ? 'views-row-first' : '' }} {{ $loop->last ? 'views-row-last' : '' }}">
                                                            <div class="views-field views-field-title">
                                                                <span class="field-content">
                                                                    <a href="{{ locale_url('tin-tuc/' . $latestPost->slug) }}">{{ $latestPost->title }}</a>
                                                                </span>
                                                            </div>
                                                            <div class="views-field views-field-body">
                                                                <span class="field-content">
                                                                    {{ \Illuminate\Support\Str::limit(strip_tags($latestPost->content ?? ''), 80) }}...
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

