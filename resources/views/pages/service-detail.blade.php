@extends('layouts.app')

@section('title', $service->title . ' - ' . config('app.name'))

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
                                            <!-- Chi tiết bài viết -->
                                            <div class="bao-ngoai-node bao-ngoai-node-bai_viet node-detail">
                                                <div class="node node-bai-viet">
                                                    <h1 class="title-node-common">{{ $service->title }}</h1>
                                                    <div class="post-date-post-view">
                                                        <span><i class="fa fa-eye"></i> {{ number_format($service->view_count ?? 0) }} lượt xem</span>
                                                    </div>
                                                    <div class="node-content-detail content clearfix">
                                                        <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                                                            <div class="field-items">
                                                                <div class="field-item even">
                                                                    {!! $service->description ?? '' !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Content Bottom: Social Sharing + Tin khác + Tin nổi bật -->
                                @include('partials.content-bottom', [
                                    'item' => $service,
                                    'relatedItems' => $relatedPosts ?? collect(),
                                    'featuredItems' => $featuredPosts ?? collect(),
                                    'detailRoute' => 'tin-tuc/',
                                    'detailUrl' => request()->url()
                                ])
                            </div>

                            <!-- <div id="content-right" class="col-md-3 col-sm-12 col-xs-12">
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
                                                                    <a href="{{ locale_url($post->slug) }}">{{ $post->title }}</a>
                                                                </span>
                                                            </div>
                                                            <div class="views-field views-field-body">
                                                                <span class="field-content">
                                                                    {{ \Illuminate\Support\Str::limit(strip_tags($post->content ?? ''), 80) }}
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
                            </div> -->
                            {{-- Sidebar --}}
                    <div id="content-right" class="col-md-3 col-sm-12 col-xs-12">
                        <div class="region region-content-right-sp">
                            <div id="block-views-block-san-pham-noi-bat" class="block block-views block-border">
                                <div class="block-title">
                                    <h3>Du lịch miền Bắc</h3>
                                </div>
                                <div class="content">
                                    <div class="view view-block-san-pham view-id-block_san_pham view-display-id-block_featured">
                                        <div class="view-content">
                                            {{-- Danh sách tỉnh giống menu trong header --}}
                                            <div class="du-lich-sidebar">
                                                {{-- Miền Bắc --}}
                                                <div class="du-lich-group">
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-bac-kan') }}">{{ __('Du lịch Bắc Kạn') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-bac-ninh') }}">{{ __('Du lịch Bắc Ninh') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-ha-giang') }}">{{ __('Du lịch Hà Giang') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-ha-noi') }}">{{ __('Du lịch Hà Nội') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-lang-son') }}">{{ __('Du lịch Lạng Sơn') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-mai-chau') }}">{{ __('Du lịch Mai Châu') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-moc-chau') }}">{{ __('Du lịch Mộc Châu') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-ninh-binh') }}">{{ __('Du lịch Ninh Bình') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-quang-ninh') }}">{{ __('Du lịch Quảng Ninh') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-lao-cai') }}">{{ __('Du lịch Lào Cai') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-son-la') }}">{{ __('Du lịch Sơn La') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row views-row-last">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-tay-bac') }}">{{ __('Du lịch Tây Bắc') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            <div id="block-views-block-san-pham-noi-bat" style="margin-top: -50px;" class="block block-views block-border">
                                <div class="block-title" >
                                    <h3>Du lịch miền trung</h3>
                                </div>
                                <div class="content">
                                    <div class="view view-block-san-pham view-id-block_san_pham view-display-id-block_featured">
                                        <div class="view-content">
                                            {{-- Danh sách tỉnh giống menu trong header --}}
                                            <div class="du-lich-sidebar">
                                                <div class="du-lich-group">
                                                  
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-buon-ma-thuot') }}">{{ __('Du lịch Buôn Ma Thuột') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-binh-thuan') }}">{{ __('Du lịch Bình Thuận') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-binh-dinh') }}">{{ __('Du lịch Bình Định') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-hue') }}">{{ __('Du lịch Huế') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-quang-nam') }}">{{ __('Du lịch Quảng Nam') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-khanh-hoa') }}">{{ __('Du lịch Khánh Hòa') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-nghe-an') }}">{{ __('Du lịch Nghệ An') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-ninh-thuan') }}">{{ __('Du lịch Ninh Thuận') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-phan-thiet') }}">{{ __('Du lịch Phan Thiết') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-phu-yen') }}">{{ __('Du lịch Phú Yên') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-quang-binh') }}">{{ __('Du lịch Quảng Bình') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-tay-nguyen') }}">{{ __('Du lịch Tây Nguyên') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-da-lat') }}">{{ __('Du lịch Đà Lạt') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-da-nang') }}">{{ __('Du lịch Đà Nẵng') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-dao-binh-ba') }}">{{ __('Du lịch Đảo Bình Ba') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row views-row-last">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-dao-binh-hung') }}">{{ __('Du lịch Đảo Bình Hưng') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- Miền nam -->
                            <div id="block-views-block-san-pham-noi-bat" style="margin-top: -50px;" class="block block-views block-border">
                                <div class="block-title">
                                    <h3>Du lịch miền nam</h3>
                                </div>
                                <div class="content">
                                    <div class="view view-block-san-pham view-id-block_san_pham view-display-id-block_featured">
                                        <div class="view-content">
                                            {{-- Danh sách tỉnh giống menu trong header --}}
                                            <div class="du-lich-sidebar">
                                            {{-- Miền Nam --}}
                                                <div class="du-lich-group">
                                                   
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-an-giang') }}">{{ __('Du lịch An Giang') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-bac-lieu') }}">{{ __('Du lịch Bạc Liêu') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-ben-tre') }}">{{ __('Du lịch Bến Tre') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-chau-doc') }}">{{ __('Du lịch Châu Đốc') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-ca-mau') }}">{{ __('Du lịch Cà Mau') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-con-dao') }}">{{ __('Du lịch Côn Đảo') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-can-tho') }}">{{ __('Du lịch Cần Thơ') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-ha-tien') }}">{{ __('Du lịch Hà Tiên') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-kien-giang') }}">{{ __('Du lịch Kiên Giang') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-long-an') }}">{{ __('Du lịch Long An') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-mien-tay') }}">{{ __('Du lịch Miền Tây') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-nam-du') }}">{{ __('Du lịch Nam Du') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-phu-quoc') }}">{{ __('Du lịch Phú Quốc') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-soc-trang') }}">{{ __('Du lịch Sóc Trăng') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-tien-giang') }}">{{ __('Du lịch Tiền Giang') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row">
                                                        <div class="views-field views-field-name">
                                                            <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-vung-tau') }}">{{ __('Du lịch Vũng Tàu') }}</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="views-row views-row-last">
                                                    <div class="views-field views-field-name">
                                                        <span class="field-content">
                                                                <a href="{{ locale_url('du-lich-tp-ho-chi-minh') }}">{{ __('Du lịch TP Hồ Chí Minh') }}</a>
                                                        </span>
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
                </div>
            </div>
        </div>
    </div>
@endsection
