@extends('layouts.app')
<!-- CSS được import trong app.css -->

@section('content')
    <div class="page-news">
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
                                            <!-- Chi tiết bài viết -->
                                            <div class="bao-ngoai-node bao-ngoai-node-bai_viet node-detail">
                                                <div class="node node-bai-viet">
                                                    <h1 class="title-node-common">{{ $post->title }}</h1>
                                                    <div class="post-date-post-view">
                                                        <span><i class="fa fa-eye"></i> {{ number_format($post->view_count ?? 0) }} lượt xem</span>
                                                    </div>
                                                    <div class="node-content-detail content clearfix">
                                                        <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                                                            <div class="field-items">
                                                                <div class="field-item even">
                                                                    {!! $post->content !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Content Bottom: Tin khác + Tin nổi bật -->
                                @include('partials.content-bottom', [
       'item' => $post,
       'relatedItems' => $relatedPosts,
       'featuredItems' => $featuredPosts,
       'detailRoute' => 'tin-tuc/',
       'detailUrl' => request()->url()
   ])
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

                                

                                    <!-- Tin tức mới nhất -->
                                    <div id="block-views-block-bai-viet-block-1" class="block block-views">
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

