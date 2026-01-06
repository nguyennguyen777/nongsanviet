@extends('layouts.app')
<!-- css dùng chung với danhmucsanpham.css -->

@section('content')
    <div class="page-services">
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
                                            <div class="view view-service view-id-service view-display-id-page_1 row list service-list page-service-list">
                                                <div class="view-header">
                                                    <div class="page-service-list-title">{{ __('dịch vụ') }}</div>
                                                </div>

                                                <div class="view-content">
                                                    <div class="group-class-post-wrapper">
                                                        <div class="group-class-post row">
                                                            @forelse($services as $service)
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
                                                                    <div class="views-field views-field-title" style="margin-top: 12px;">
                                                                        <span class="field-content">
                                                                            <a href="{{ locale_url($service->slug) }}">{{ $service->title }}</a>
                                                                        </span>
                                                                    </div>
                                                                    <div class="views-field views-field-body" style="margin-top: 8px;">
                                                                        <span class="field-content">
                                                                            {{ \Illuminate\Support\Str::limit(strip_tags($service->description ?? ''), 180) }}...
                                                                        </span>
                                                                    </div>
                                                                    <div class="views-field views-field-view-node" style="margin-top: 10px;">
                                                                        <span class="field-content">
                                                                            <a href="{{ locale_url($service->slug) }}">{{ __('Xem chi tiết') }}</a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            @empty
                                                                <div class="col-12">
                                                                    <p class="text-center" style="padding: 30px 0; color: #999;">{{ __('Chưa có dịch vụ nào.') }}</p>
                                                                </div>
                                                            @endforelse
                                                        </div>
                                                    </div>
                                                </div>

                                                @if($services->hasPages())
                                                    <h2 class="element-invisible">Trang</h2>
                                                    <div class="item-list">
                                                        <ul class="pager">
                                                            @if ($services->currentPage() > 1)
                                                                <li class="pager-first first">
                                                                    <a title="Đến trang đầu" href="{{ $services->url(1) }}">«</a>
                                                                </li>
                                                                <li class="pager-previous">
                                                                    <a title="Đến trang trước" href="{{ $services->previousPageUrl() }}">‹</a>
                                                                </li>
                                                                @if ($services->currentPage() > 2)
                                                                    <li class="pager-item">
                                                                        <a title="Đến trang {{ $services->currentPage() - 1 }}" href="{{ $services->url($services->currentPage() - 1) }}">{{ $services->currentPage() - 1 }}</a>
                                                                    </li>
                                                                @endif
                                                            @endif

                                                            <li class="pager-current">{{ $services->currentPage() }}</li>

                                                            @if ($services->currentPage() < $services->lastPage())
                                                                @if ($services->currentPage() < $services->lastPage() - 1)
                                                                    <li class="pager-item">
                                                                        <a title="Đến trang {{ $services->currentPage() + 1 }}" href="{{ $services->url($services->currentPage() + 1) }}">{{ $services->currentPage() + 1 }}</a>
                                                                    </li>
                                                                @endif
                                                                @if ($services->hasMorePages())
                                                                    <li class="pager-next">
                                                                        <a title="Đến trang sau" href="{{ $services->nextPageUrl() }}">›</a>
                                                                    </li>
                                                                    <li class="pager-last last">
                                                                        <a title="Đến trang cuối" href="{{ $services->url($services->lastPage()) }}">»</a>
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
                                <div class="content-bottom"></div>
                            </div>

                            <div id="content-right" class="col-md-3 col-sm-12 col-xs-12">
                                <div class="region region-content-right-sp">
                                    <div id="block-views-block-bai-viet-block-1" class="block block-views">
                                        <div class="block-title">
                                            <h3>{{ __('Tin tức mới nhất') }}</h3>
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
                                                                <span class="field-content">{{ __('Chưa có tin tức nào.') }}</span>
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

