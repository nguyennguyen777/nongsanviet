@extends('layouts.app')

@section('title', __('Trang chủ'))

@section('content')

  <div class="container-content-common-all">
    <div class="content-common content-front-wrapper">
      <div class="container-home">
        <div class="container-content1">
          <div class="front-content-wrapper-page">
            <div class="region region-content">

              <!-- Slide Sản phẩm dịch vụ ---------------------------------------------->
              <div id="block-alla-tech-block-slide-san-pham" class="block block-alla-tech">
                <div class="content">

                  <div class="block-slide-san-pham-dich-vu owl-carousel owl-theme">
                    @if($categorySlides->count())
                      @foreach($categorySlides as $slide)
                        <div class="item">
                          <div class="item-wrapper">
                            <div class="image">
                              <a href="{{ $slide->link ?: ($slide->category ? locale_url($slide->category->slug) : '#') }}">
                                <img class="img-responsive"
                                  src="{{ $slide->image ? asset('storage/' . $slide->image) : asset('storage/categories/default.jpg') }}"
                                  alt="{{ $slide->title ?: ($slide->category ? $slide->category->name : '') }}">
                              </a>
                            </div>
                            <div class="term-name">
                              <a href="{{ $slide->link ?: ($slide->category ? locale_url($slide->category->slug) : '#') }}">
                                {{ $slide->title ?: ($slide->category ? $slide->category->name : '') }}
                              </a>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    @elseif(!empty($productSlideImages) && count($productSlideImages))
                      @foreach($productSlideImages as $image)
                        <div class="item">
                          <div class="item-wrapper">
                            <div class="image">
                              <a href="#">
                                <img class="img-responsive"
                                  src="{{ asset('storage/' . $image) }}"
                                  alt="{{ pathinfo($image, PATHINFO_FILENAME) }}">
                              </a>
                            </div>
                            <div class="term-name">
                              <a href="#">
                                {{ ucfirst(str_replace('-', ' ', pathinfo($image, PATHINFO_FILENAME))) }}
                              </a>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    @else
                      {{-- Fallback nếu chưa có dữ liệu --}}
                      <div class="item">
                        <div class="item-wrapper">
                          <div class="image">
                            <a href="#">
                              <img class="img-responsive" src="{{ asset('storage/categories/default.jpg') }}" alt="">
                            </a>
                          </div>
                          <div class="term-name">
                            <a href="#">{{ __('Danh mục') }}</a>
                          </div>
                        </div>
                      </div>
                    @endif
                  </div>

                </div>
              </div>

              <!-- 4 lý do chọn Nông sản Việt Nam -------------------------------------->
              <div id="block-views-block-page-block" class="block block-views">

                <div class="content">
                  <div
                    class="view view-block-page view-id-block_page view-display-id-block row list view-dom-id-543363f5092977aa6adc3df7ac113da5">

                    <div class="view-content">
                      <div class="item-list">
                        <ul>
                          <li class="views-row views-row-1 views-row-odd views-row-first col-md-3 col-sm-6 col-xs-12">
                            <div class="views-field views-field-field-anh-dai-dien">
                              <div class="field-content"><a href="/vi/toan-suc-khoe"><img class="" typeof="foaf:Image"
                                    src="https://www.nongsanviet.net.vn/sites/default/files/ico1.png" width="47"
                                    height="54" alt="An toàn sức khỏe" title="An toàn sức khỏe"></a></div>
                            </div>
                            <div class="views-field views-field-title"> <span class="field-content"><a
                                  href="{{ locale_url('toan-suc-khoe') }}">{{ __('An toàn sức khỏe') }}</a></span> </div>
                            <div class="views-field views-field-body"> <span class="field-content">{{ __('An toàn sức khỏe là yếu tố hàng đầu') }}</span> </div>
                          </li>
                          <li class="views-row views-row-2 views-row-even col-md-3 col-sm-6 col-xs-12">
                            <div class="views-field views-field-field-anh-dai-dien">
                              <div class="field-content"><a href="/vi/khong-pham-mau-hay-chat-bao-quan"><img class=""
                                    typeof="foaf:Image" src="https://www.nongsanviet.net.vn/sites/default/files/ico2.png"
                                    width="54" height="55" alt="Không phẩm màu hay chất bảo quản"
                                    title="Không phẩm màu hay chất bảo quản"></a></div>
                            </div>
                            <div class="views-field views-field-title"> <span class="field-content"><a
                                  href="{{ locale_url('khong-pham-mau-hay-chat-bao-quan') }}">{{ __('Không phẩm màu hay chất bảo quản') }}</a></span>
                            </div>
                          </li>
                          <li class="views-row views-row-3 views-row-odd col-md-3 col-sm-6 col-xs-12">
                            <div class="views-field views-field-field-anh-dai-dien">
                              <div class="field-content"><a href="/vi/giao-hang-toan-quoc"><img class=""
                                    typeof="foaf:Image" src="https://www.nongsanviet.net.vn/sites/default/files/ico3.png"
                                    width="70" height="44" alt="Giao hàng toàn quốc" title="Giao hàng toàn quốc"></a>
                              </div>
                            </div>
                            <div class="views-field views-field-title"> <span class="field-content"><a
                                  href="{{ locale_url('giao-hang-toan-quoc') }}">{{ __('Giao hàng toàn quốc') }}</a></span> </div>
                            <div class="views-field views-field-body"> <span class="field-content">{{ __('Nhanh chóng - tiện lợi') }}</span> </div>
                          </li>
                          <li class="views-row views-row-4 views-row-even views-row-last col-md-3 col-sm-6 col-xs-12">
                            <div class="views-field views-field-field-anh-dai-dien">
                              <div class="field-content"><a href="/vi/ho-tro-tu-van"><img class="" typeof="foaf:Image"
                                    src="https://www.nongsanviet.net.vn/sites/default/files/ico4.png" width="44"
                                    height="49" alt="Hỗ trợ tự vấn" title="Hỗ trợ tự vấn"></a></div>
                            </div>
                            <div class="views-field views-field-title"> <span class="field-content"><a
                                  href="{{ locale_url('ho-tro-tu-van') }}">{{ __('Hỗ trợ tư vấn') }}</a></span> </div>
                            <div class="views-field views-field-body"> <span class="field-content">{{ __('Tư vấn 24/24') }}</span>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <!-- Giới thiệu ---------------------------------------------------->
              <div id="block-views-block-gioi-thieu-block-1" class="block block-views">

                <div class="content">
                  <div
                    class="view view-block-gioi-thieu view-id-block_gioi_thieu view-display-id-block_1 view-dom-id-81ba23fad0f5f15d40d1384b2f6772a8">

                    <div class="view-content">
                      <div class="views-row views-row-1 views-row-odd views-row-first views-row-last">

                        <div class="views-field views-field-field-noi-dung-tam-nhin"> <span
                            class="views-label views-label-field-noi-dung-tam-nhin">{{ __('Tầm nhìn') }}</span>
                          <div class="field-content">
                            <p><span style="font-size:14px;">{{ __('Ước muốn góp phần phát triển một cộng đồng sống khỏe mạnh, phát triển lành mạnh và văn minh là nền tảng ý tưởng thành lập nên thương hiệu Nông sản Việt Nam. Nông sản Việt Nam cam kết luôn nỗ lực để mang đến cho khách hàng những sản phẩm chất lượng nhất - dịch vụ hoàn hảo nhất.') }}</span></p>
                          </div>
                        </div>
                        <div class="views-field views-field-field-anh-dai-dien">
                          <div class="field-content"><a href="{{ locale_url('ve-nong-san-viet-nam') }}"><img class="" typeof="foaf:Image"
                                src="https://www.nongsanviet.net.vn/sites/default/files/gt_1.png" width="579" height="374"
                                alt="{{ __('Chúng tôi là ai?') }}"></a></div>
                        </div>
                        <div class="views-field views-field-field-noi-dung-su-menh"> <span
                            class="views-label views-label-field-noi-dung-su-menh">{{ __('Sứ mệnh') }}</span>
                          <div class="field-content">
                            <p><span style="font-size:14px;">{{ __('Bằng khát vọng tiên phong cùng chiến lược đầu tư phát triển, không ngừng cải thiện nâng cao chất lượng sản phẩm, thương hiệu Nông sản Việt Nam của Công ty Cổ phần Đầu tư Hoàng Anh mong muốn trở thành công ty cung cấp thực phẩm sạch cao cấp hàng đầu Việt Nam, có uy tín và vị thế trong ngành thực phẩm, góp phần nâng cao chất lượng cuộc sống, sức khỏe người tiêu dùng.') }}</span></p>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <!-- Sản phẩm nổi bật ---------------------------------------------->
              <div id="block-views-block-san-pham-block" class="block block-views title-icon">

                <div class="block-title">
                  <h3>{{ __('Sản phẩm nổi bật') }}</h3>
                </div>

                <div class="content">
                  <div
                    class="view view-block-san-pham view-id-block_san_pham view-display-id-block row list san-pham-list view-dom-id-213739d6424e3c946404288d33d31998 jquery-once-1-processed refresh-processed">

                    <div class="view-content">
                      @forelse($featuredProducts as $product)
                        <div class="views-row views-row-{{ $loop->iteration }} views-row-{{ $loop->odd ? 'odd' : 'even' }} {{ $loop->first ? 'views-row-first' : '' }} {{ $loop->last ? 'views-row-last' : '' }} col-md-3 col-sm-6 col-xs-12">
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
                              <a href="{{ route('product.show', $product->slug) }}">{{ strtoupper($product->name) }}</a>
                            </span>
                          </div>
                          <div class="views-field views-field-view-node">
                            <span class="field-content">
                              <a href="{{ route('product.show', $product->slug) }}">{{ __('Xem chi tiết') }}</a>
                            </span>
                          </div>
                        </div>
                      @empty
                        <div class="col-12">
                          <p class="text-center">{{ __('Chưa có sản phẩm nổi bật.') }}</p>
                        </div>
                      @endforelse
                    </div>

                  </div>
                </div>
              </div>

              <!-- Dịch vụ nổi bật -------------------------------------------->
              <div id="block-views-block-san-pham-block-6" class="block block-views title-icon">

                <div class="block-title">
                  <h3>{{ __('Dịch vụ nổi bật') }}</h3>
                </div>

                <div class="content">
                  <div
                    class="view view-block-san-pham view-id-block_san_pham view-display-id-block_6 row list san-pham-list view-dom-id-ff5ed477fccf8f9232b19b4b157382ea jquery-once-1-processed refresh-processed">

                    <div class="view-content d-flex flex-wrap">
                      @forelse($featuredServices as $service)
                        <div class="views-row views-row-{{ $loop->iteration }} views-row-{{ $loop->odd ? 'odd' : 'even' }} {{ $loop->first ? 'views-row-first' : '' }} {{ $loop->last ? 'views-row-last' : '' }} col-md-3 col-sm-6 col-xs-12">
                          <div class="views-field views-field-field-anh-dai-dien">
                            <div class="field-content">
                              <a href="{{ locale_url($service->slug) }}">
                                <img class="img-responsive" typeof="foaf:Image"
                                  src="{{ $service->image ? asset('storage/' . $service->image) : asset('storage/services/default.jpg') }}"
                                  width="385" height="279" alt="{{ $service->title }}" title="{{ $service->title }}">
                              </a>
                            </div>
                          </div>
                          <div class="views-field views-field-title">
                            <span class="field-content">
                              <a href="{{ locale_url($service->slug) }}">{{ $service->title }}</a>
                            </span>
                          </div>
                          <div class="views-field views-field-view-node">
                            <span class="field-content">
                              <a href="{{ locale_url($service->slug) }}">Xem chi tiết</a>
                            </span>
                          </div>
                        </div>
                      @empty
                        <div class="col-12">
                          <p class="text-center">{{ __('Chưa có dịch vụ nào.') }}</p>
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

    <!-- Banner sản phẩm nổi bật -->
    <div class="region region-content-bottom">
      <div id="block-alla-tech-block-banner-san-pham-noi-bat" class="block block-alla-tech">

        <div class="content">
          <div class="banner-attachment text-center">
            <div class="container-home">
              <div class="content-banner">
                <p><strong>{{ __('CHÚNG TÔI TỰ HÀO ĐEM SỨC KHỎE VÀ CHẤT LƯỢNG') }}<br>
                    {{ __('ĐẾN 50000 KHÁCH HÀNG TIN DÙNG TRÊN CẢ NƯỚC') }} </strong><br>
                  {{ __('Cám ơn quý khách hàng đã và đang đồng hành cùng chúng tôi!') }}</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="content-common content-front-wrapper">
      <div class="container">
        <div class="container-content1">
          <div class="front-content-wrapper-page">
            <div class="region region-content-bottom2">

              <!-- Đánh giá của khách hàng --------------------------------------------->
              <div id="block-alla-tech-block-slide-doi-tac"
                class="block block-alla-tech block-alla-tech-block-slide-doi-tac title-icon">

                <div class="block-title">
                  <h3>{{ __('Đánh giá của khách hàng') }}</h3>
                </div>

                <div class="content">
                  <div class="block-slide-doi-tac owl-carousel owl-theme">
                    @forelse($testimonials as $testimonial)
                      <div class="item">
                        <div class="body-summary">
                          {{ $testimonial->text }}
                        </div>
                        <div class="partner-bottom">
                          @if($testimonial->image)
                            <div class="image">
                              <img class="img-responsive"
                                src="{{ asset('storage/' . $testimonial->image) }}"
                                alt="{{ $testimonial->name }}">
                            </div>
                          @endif
                          <div class="star"></div>
                          <div class="name">{{ $testimonial->name }}</div>
                          @if($testimonial->role)
                            <div class="noi-cong-tac">{{ $testimonial->role }}</div>
                          @endif
                        </div>
                      </div>
                    @empty
                      {{-- Fallback nếu chưa có dữ liệu --}}
                      <div class="item">
                        <div class="body-summary">
                          {{ __('Chưa có đánh giá nào.') }}
                        </div>
                      </div>
                    @endforelse
                  </div>
                </div>
              </div>


              <!-- Đối tác -------------------------------------------->
              <div id="block-alla-tech-block-slide-partner" class="block block-alla-tech title-icon">

                <div class="block-title">
                  <h3>{{ __('Đối tác') }}</h3>
                </div>

                <div class="content">
                  <div class="block-slide-doi-tac-logo owl-carousel owl-theme owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                      <div class="owl-stage">
                        @forelse($partners as $partner)
                          @php
                            // Chuẩn hóa đường dẫn ảnh và kiểm tra tồn tại
                            $partnerImagePath = $partner->image ?? '';
                            $partnerImagePath = str_replace('\\', '/', $partnerImagePath);
                            $partnerImagePath = preg_replace('/^storage\//', '', $partnerImagePath);
                            $partnerImagePath = trim($partnerImagePath, " /");
                            $partnerImageExists = $partnerImagePath && \Illuminate\Support\Facades\Storage::disk('public')->exists($partnerImagePath);
                            $partnerImageUrl = $partnerImageExists
                                ? asset('storage/' . $partnerImagePath)
                                : asset('storage/products/logo-footer.png');
                          @endphp
                          <div class="owl-item">
                            <div class="item">
                              <div class="image">
                                <a href="{{ $partner->link ?: '#' }}">
                                  <img class="img-responsive"
                                    src="{{ $partnerImageUrl }}"
                                    onerror="this.onerror=null;this.src='{{ asset('storage/products/logo-footer.png') }}';"
                                    alt="{{ $partner->name ?: 'Đối tác' }}" title="{{ $partner->name ?: 'Đối tác' }}">
                                </a>
                              </div>
                            </div>
                          </div>
                        @empty
                          {{-- Fallback nếu chưa có dữ liệu --}}
                          <div class="owl-item">
                            <div class="item">
                          <div class="image">
                            <img class="img-responsive" src="{{ asset('storage/products/logo-footer.png') }}" alt="{{ __('Đối tác') }}">
                          </div>
                            </div>
                          </div>
                        @endforelse
                      </div>
                    </div>
                    <div class="owl-nav disabled">
                      <div class="owl-prev">‹‹</div>
                      <div class="owl-next">››</div>
                    </div>
                    <div class="owl-dots disabled"></div>
                  </div>
                </div>
              </div>

              <!-- Tin nổi bật ---------------------------------------------------------->
              <div id="block-views-block-bai-viet-block-12" class="block block-views title-icon">

                <div class="block-title">
                  <h3>{{ __('Tin nổi bật') }}</h3>
                </div>

                <div class="content">
                  <div
                    class="view view-block-bai-viet view-id-block_bai_viet view-display-id-block_12 list row view-dom-id-11922787229a305dc7c54b853ad08756">



                    <div class="view-content">
                      @forelse($featuredPosts as $post)
                        <div class="views-row views-row-{{ $loop->iteration }} views-row-{{ $loop->odd ? 'odd' : 'even' }} {{ $loop->first ? 'views-row-first' : '' }} {{ $loop->last ? 'views-row-last' : '' }} col-md-4 col-sm-6 col-xs-12">
                          <div class="views-field views-field-nothing">
                            <div class="field-content">
                              <div class="views-field views-field-field-anh-dai-dien">
                                <a href="{{ locale_url('content/' . $post->slug) }}">
                                  <img class="img-responsive" typeof="foaf:Image"
                                    src="{{ $post->image ? asset('storage/' . $post->image) : asset('storage/posts/default.jpg') }}"
                                    width="385" height="250"
                                    alt="{{ $post->title }}" title="{{ $post->title }}">
                                  </a>
                              </div>
                              <div class="content-preview">
                                <div class="views-field views-field-title">
                                  <a href="{{ locale_url('content/' . $post->slug) }}">{{ $post->title }}</a>
                                </div>
                                <div class="views-field views-field-body">
                                  {{ \Illuminate\Support\Str::limit(strip_tags($post->content ?? ''), 100) }}...
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      @empty
                        <div class="col-12">
                          <p class="text-center">{{ __('Chưa có tin tức nào.') }}</p>
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


@endsection