@extends('layouts.app')
<!-- css dùng chung với danhmucsanpham.css -->

@section('content')
    <div class="page-service">
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
                                                class="view view-service view-id-service view-display-id-page_1 row list service-list page-service-list view-dom-id-b5d5146fa8df9b318b11b020dd78c4c9 jquery-once-1-processed refresh-processed">
                                                <div class="view-header">
                                                    <div class="page-service-list-title">{{ $service->title }}</div>
                                                </div>

                                                <div class="view-content">
                                                    @if($service->image)
                                                        <div class="service-image mb-4">
                                                            <img class="img-responsive" 
                                                                src="{{ asset('storage/' . $service->image) }}" 
                                                                alt="{{ $service->title }}">
                                                        </div>
                                                    @endif

                                                    @if($service->description)
                                                        <div class="service-description">
                                                            {!! nl2br(e($service->description)) !!}
                                                        </div>
                                                    @else
                                                        <div class="service-description">
                                                            <p>Nội dung đang được cập nhật...</p>
                                                        </div>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-bottom">
                                </div>
                            </div>

                            <div id="content-right" class="col-md-3 col-sm-12 col-xs-12">
                                <div class="region region-content-right-sp">
                                    <div id="block-views-block-service-block-2" class="block block-views block-border">

                                        <div class="block-title">
                                            <h3>Dịch vụ khác</h3>
                                        </div>

                                        <div class="content">
                                            <div
                                                class="view view-block-service view-id-block_service view-display-id-block_2 view-dom-id-32ff5f58df41cee45a909a2ecceffc51">

                                                <div class="view-content">
                                                    @forelse($services as $svc)
                                                        <div class="views-row views-row-{{ $loop->iteration }} views-row-{{ $loop->odd ? 'odd' : 'even' }} {{ $loop->first ? 'views-row-first' : '' }} {{ $loop->last ? 'views-row-last' : '' }}">
                                                            <div class="views-field views-field-name">
                                                                <span class="field-content">
                                                                    <a href="{{ url('/vi/' . $svc->slug) }}" {{ $svc->id == $service->id ? 'class="active"' : '' }}>
                                                                        {{ $svc->title }}
                                                                    </a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <div class="views-row">
                                                            <div class="views-field views-field-name">
                                                                <span class="field-content">Chưa có dịch vụ khác</span>
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

