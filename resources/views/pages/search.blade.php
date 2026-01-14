@extends('layouts.app')
<!-- css dùng chung với danhmucsanpham.css -->

@section('content')
    <div class="page-search">
        <div class="page-danhmucsanpham">
            <div class="container-content-common-all">
                 <div class="container" style="width: 100%;">
                    <div class="container-content" style="width: 100%;">
                     
                       
                            <div id="content-center">
                              
                                <div class="region region-content">
                                    <div id="block-system-main" class="block block-system">
                                        <div class="content" style="width: 100%;">
                                            <!-- Search Form -->
                                            <form
                                                class="search-form"
                                                action="{{ route('search', ['locale' => app()->getLocale()]) }}"
                                                method="get"
                                                id="search-form"
                                                accept-charset="UTF-8"
                                            >
                                                <div>
                                                    <div class="container-inline form-wrapper" id="edit-basic">
                                                        <div class="form-item form-type-textfield form-item-keys">
                                                            <input
                                                                class="form-control form-text"
                                                                type="text"
                                                                id="edit-keys"
                                                                name="q"
                                                                value="{{ $keyword }}"
                                                                size="40"
                                                                maxlength="255"
                                                                placeholder="Nhập từ khóa tìm kiếm..."
                                                            />
                                                        </div>
                                                        <input
                                                            type="submit"
                                                            id="edit-submit"
                                                            name="op"
                                                            value="Tìm kiếm"
                                                            class="form-submit"
                                                        />
                                                    </div>
                                                </div>
                                            </form>

                                            @if($keyword === '')
                                                <p style="padding: 20px 0; color: #666;">Vui lòng nhập từ khóa để hiển thị kết quả.</p>
                                            @else
                                                @php
                                                    $hasAny = $products->count() + $services->count() + $posts->count() > 0;
                                                @endphp

                                                @if($hasAny)
                                                    <h2>Kết quả tìm kiếm</h2>
                                                    <ol class="search-results node-results">
                                                        <!-- Products -->
                                                        @foreach($products as $product)
                                                            <li class="search-result">
                                                                <h3 class="title">
                                                                    <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                                                </h3>
                                                                <div class="search-snippet-info">
                                                                    <p class="search-snippet">
                                                                        {{ \Illuminate\Support\Str::limit(strip_tags($product->description ?? ''), 200) }}
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        @endforeach

                                                        <!-- Services -->
                                                        @foreach($services as $service)
                                                            <li class="search-result">
                                                                <h3 class="title">
                                                                    <a href="{{ locale_url($service->slug) }}">{{ $service->title }}</a>
                                                                </h3>
                                                                <div class="search-snippet-info">
                                                                    <p class="search-snippet">
                                                                        {{ \Illuminate\Support\Str::limit(strip_tags($service->description ?? ''), 200) }}
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        @endforeach

                                                        <!-- Posts -->
                                                        @foreach($posts as $post)
                                                            <li class="search-result">
                                                                <h3 class="title">
                                                                    <a href="{{ locale_url('tin-tuc/' . $post->slug) }}">{{ $post->title }}</a>
                                                                </h3>
                                                                <div class="search-snippet-info">
                                                                    <p class="search-snippet">
                                                                        {{ \Illuminate\Support\Str::limit(strip_tags($post->content ?? ''), 200) }}
                                                                    </p>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ol>
                                                @else
                                                    <h2>Không tìm thấy kết quả nào.</h2>
                                                    <ul>
                                                        <li>Bạn hãy kiểm tra lại từ khóa tìm kiếm.</li>
                                                    </ul>
                                                @endif
                                            @endif
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

