{{--
Partial: Content Bottom
Bao gồm: Social Sharing Buttons, Tin khác, Tin nổi bật
Sử dụng cho các trang chi tiết (news, services, products, etc.)

Biến cần truyền vào:
- $item: Object chứa thông tin bài viết/sản phẩm (có title, slug)
- $relatedItems: Collection các item liên quan (cho "Tin khác")
- $featuredItems: Collection các item nổi bật (cho "Tin nổi bật")
- $detailRoute: Route name hoặc URL pattern để tạo link (ví dụ: 'tin-tuc/' hoặc 'san-pham/')
- $detailUrl: URL đầy đủ của trang hiện tại (dùng cho social sharing)
- $showSocialOnly: Chỉ hiển thị social sharing (không có wrapper content-bottom)
- $showRelatedOnly: Chỉ hiển thị Tin khác và Tin nổi bật (có wrapper content-bottom)
--}}
@if(!isset($showSocialOnly) || !$showSocialOnly)
    <div class="content-bottom">
@endif
    <div class="region region-content-bottom">
        <!-- Social Sharing Buttons -->
        @if(!isset($showRelatedOnly) || !$showRelatedOnly)
            <div class="bao-ngoai-node-social">
                <ul class="links inline">
                    <li class="addtoany first last">
                        <span>
                            <span class="a2a_kit a2a_kit_size_22 a2a_target addtoany_list" style="line-height: 22px">
                                <!-- Facebook Share -->
                                <a class="a2a_button_facebook" target="_blank" rel="nofollow noopener"
                                    href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($detailUrl ?? request()->url()) }}&amp;quote={{ urlencode($item->title ?? $item->name ?? '') }}">
                                    <span class="a2a_svg a2a_s__default a2a_s_facebook"
                                        style="background-color: rgb(8, 102, 255); width: 22px; line-height: 22px; height: 22px; background-size: 22px; border-radius: 3px; display: inline-block; text-align: center;">
                                        <svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 32 32" style="width: 22px; height: 22px; fill: #fff;">
                                            <path
                                                d="M28 16c0-6.627-5.373-12-12-12S4 9.373 4 16c0 5.628 3.875 10.35 9.101 11.647v-7.98h-2.474V16H13.1v-1.58c0-4.085 1.849-5.978 5.859-5.978.76 0 2.072.15 2.608.298v3.325c-.283-.03-.775-.045-1.386-.045-1.967 0-2.728.745-2.728 2.683V16h3.92l-.673 3.667h-3.247v8.245C23.395 27.195 28 22.135 28 16">
                                            </path>
                                        </svg>
                                    </span>

                                </a>
                                <!-- Twitter -->
                                <a class="a2a_button_twitter" target="_blank" rel="nofollow noopener"
                                    href="https://twitter.com/intent/tweet?url={{ urlencode($detailUrl ?? request()->url()) }}&amp;text={{ urlencode($item->title ?? $item->name ?? '') }}">
                                    <span class="a2a_svg a2a_s__default a2a_s_twitter"
                                        style="background-color: rgb(29, 155, 240); width: 22px; line-height: 22px; height: 22px; background-size: 22px; border-radius: 3px; display: inline-block; text-align: center;">
                                        <svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 32 32" style="width: 22px; height: 22px; fill: #FFF;">
                                            <path
                                                d="M28 8.557a10 10 0 0 1-2.828.775 4.93 4.93 0 0 0 2.166-2.725 9.7 9.7 0 0 1-3.13 1.194 4.92 4.92 0 0 0-3.593-1.55 4.924 4.924 0 0 0-4.794 6.049c-4.09-.21-7.72-2.17-10.15-5.15a4.94 4.94 0 0 0-.665 2.477c0 1.71.87 3.214 2.19 4.1a5 5 0 0 1-2.23-.616v.06c0 2.39 1.7 4.38 3.952 4.83-.414.115-.85.174-1.297.174q-.476-.001-.928-.086a4.935 4.935 0 0 0 4.6 3.42 9.9 9.9 0 0 1-6.114 2.107q-.597 0-1.175-.068a13.95 13.95 0 0 0 7.55 2.213c9.056 0 14.01-7.507 14.01-14.013q0-.32-.015-.637c.96-.695 1.795-1.56 2.455-2.55z">
                                            </path>
                                        </svg>
                                    </span>

                                </a>
                                <!-- Pinterest -->
                                <a class="a2a_button_pinterest" target="_blank" rel="nofollow noopener"
                                    href="https://pinterest.com/pin/create/button/?url={{ urlencode($detailUrl ?? request()->url()) }}&amp;description={{ urlencode($item->title ?? $item->name ?? '') }}">
                                    <span class="a2a_svg a2a_s__default a2a_s_pinterest"
                                        style="background-color: rgb(230, 0, 35); width: 22px; line-height: 22px; height: 22px; background-size: 22px; border-radius: 3px; display: inline-block; text-align: center;">
                                        <svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 32 32" style="width: 22px; height: 22px; fill: #fff;">
                                            <path
                                                d="M15.995 4C9.361 4 4 9.37 4 15.995c0 5.084 3.16 9.428 7.622 11.176-.109-.948-.198-2.41.039-3.446.217-.938 1.402-5.963 1.402-5.963s-.356-.72-.356-1.777c0-1.668.968-2.912 2.172-2.912 1.027 0 1.52.77 1.52 1.688 0 1.027-.65 2.567-.996 3.998-.287 1.195.602 2.172 1.777 2.172 2.132 0 3.771-2.25 3.771-5.489 0-2.873-2.063-4.877-5.015-4.877-3.416 0-5.42 2.557-5.42 5.203 0 1.027.395 2.132.888 2.735a.36.36 0 0 1 .08.345c-.09.375-.297 1.195-.336 1.363-.05.217-.178.266-.405.158-1.481-.711-2.409-2.903-2.409-4.66 0-3.781 2.745-7.257 7.928-7.257 4.156 0 7.394 2.962 7.394 6.931 0 4.137-2.606 7.464-6.22 7.464-1.214 0-2.36-.632-2.744-1.383l-.75 2.854c-.267 1.046-.998 2.35-1.491 3.149a12 12 0 0 0 3.554.533C22.629 28 28 22.63 28 16.005 27.99 9.37 22.62 4 15.995 4">
                                            </path>
                                        </svg>
                                    </span>

                                </a>
                                <!-- LinkedIn -->
                                <a class="a2a_button_linkedin" target="_blank" rel="nofollow noopener"
                                    href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ urlencode($detailUrl ?? request()->url()) }}&amp;title={{ urlencode($item->title ?? $item->name ?? '') }}">
                                    <span class="a2a_svg a2a_s__default a2a_s_linkedin"
                                        style="background-color: rgb(0, 123, 181); width: 22px; line-height: 22px; height: 22px; background-size: 22px; border-radius: 3px; display: inline-block; text-align: center;">
                                        <svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 32 32" style="width: 22px; height: 22px; fill: #FFF;">
                                            <path
                                                d="M6.227 12.61h4.19v13.48h-4.19zm2.095-6.7a2.43 2.43 0 0 1 0 4.86c-1.344 0-2.428-1.09-2.428-2.43s1.084-2.43 2.428-2.43m4.72 6.7h4.02v1.84h.058c.56-1.058 1.927-2.176 3.965-2.176 4.238 0 5.02 2.792 5.02 6.42v7.395h-4.183v-6.56c0-1.564-.03-3.574-2.178-3.574-2.18 0-2.514 1.7-2.514 3.46v6.668h-4.187z">
                                            </path>
                                        </svg>
                                    </span>

                                </a>
                                <!-- Share More -->
                                <a class="a2a_dd addtoany_share_save"
                                    href="https://www.addtoany.com/share#url={{ urlencode($detailUrl ?? request()->url()) }}&amp;title={{ urlencode($item->title ?? $item->name ?? '') }}">
                                    <span class="a2a_svg a2a_s__default a2a_s_a2a"
                                        style="background-color: rgb(1, 102, 255); width: 22px; line-height: 22px; height: 22px; background-size: 22px; border-radius: 3px; display: inline-block; text-align: center;">
                                        <svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 32 32" style="width: 22px; height: 22px; fill: #FFF;">
                                            <g>
                                                <path d="M14 7h4v18h-4z"></path>
                                                <path d="M7 14h18v4H7z"></path>
                                            </g>
                                        </svg>
                                    </span>

                                </a>
                            </span>
                        </span>
                    </li>
                </ul>
            </div>
        @endif

        <!-- Tin khác -->
        @if(isset($relatedItems) && $relatedItems->count() > 0)
            <div id="block-views-block-bai-viet-block-10" class="block block-views block-tin-khac">
                <div class="block-title">
                    <h3>Tin khác</h3>
                </div>
                <div class="content">
                    <div class="view view-block-bai-viet view-id-block_bai_viet view-display-id-block_10">
                        <div class="view-content">
                            @foreach($relatedItems as $relatedItem)
                                <div
                                    class="views-row views-row-{{ $loop->iteration }} views-row-{{ $loop->odd ? 'odd' : 'even' }} {{ $loop->first ? 'views-row-first' : '' }} {{ $loop->last ? 'views-row-last' : '' }}">
                                    <div class="views-field views-field-title">
                                        <span class="field-content">
                                            <a
                                                href="{{ isset($detailRoute) ? locale_url($detailRoute . $relatedItem->slug) : locale_url('tin-tuc/' . $relatedItem->slug) }}">{{ $relatedItem->title ?? $relatedItem->name }}</a>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Tin nổi bật -->
        @if(isset($featuredItems) && $featuredItems->count() > 0)
            <div id="block-views-block-bai-viet-block-11" class="block block-views block-tin-khac">
                <div class="block-title">
                    <h3>Tin nổi bật</h3>
                </div>
                <div class="content">
                    <div class="view view-block-bai-viet view-id-block_bai_viet view-display-id-block_11">

                        @foreach($featuredItems as $featuredItem)
                            <div
                                class="views-row views-row-{{ $loop->iteration }} views-row-{{ $loop->odd ? 'odd' : 'even' }} {{ $loop->first ? 'views-row-first' : '' }} {{ $loop->last ? 'views-row-last' : '' }}">
                                <div class="views-field views-field-title">
                                    <span class="field-content">
                                        <a
                                            href="{{ isset($detailRoute) ? locale_url($detailRoute . $featuredItem->slug) : locale_url('tin-tuc/' . $featuredItem->slug) }}">{{ $featuredItem->title ?? $featuredItem->name }}</a>
                                    </span>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        @endif
    </div>
    @if(!isset($showSocialOnly) || !$showSocialOnly)
        </div>
    @endif