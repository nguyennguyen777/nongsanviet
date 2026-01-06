@extends('layouts.app')

@section('content')
    <div class="page-contact">

        <div class="content-top content-top-lien-he">
            <div class="container">
                <div class="region region-content-top">
                    <div id="block-views-block-page-block-1" class="block block-views">

                        <div class="content">
                            <div
                                class="view view-block-page view-id-block_page view-display-id-block_1 row list view-dom-id-d00b01c0d617be0de135d4935e0825a8">

                                <div class="view-content">
                                    <div class="item-list">
                                        <ul>
                                            <li
                                                class="views-row views-row-1 views-row-odd views-row-first col-md-3 col-sm-6 col-xs-12">
                                                <div class="views-field views-field-field-anh-dai-dien">
                                                    <div class="field-content"><a href="/vi/toan-suc-khoe"><img class=""
                                                                typeof="foaf:Image"
                                                                src="https://www.nongsanviet.net.vn/sites/default/files/ico1.png"
                                                                width="47" height="54" alt="An toàn sức khỏe"
                                                                title="An toàn sức khỏe"></a></div>
                                                </div>
                                                <div class="views-field views-field-title"> <span class="field-content"><a
                                                            href="/vi/toan-suc-khoe">An toàn sức khỏe</a></span> </div>
                                                <div class="views-field views-field-body"> <span class="field-content">An
                                                        toàn
                                                        sức khỏe&nbsp;là yếu tố hàng đầu</span> </div>
                                            </li>
                                            <li class="views-row views-row-2 views-row-even col-md-3 col-sm-6 col-xs-12">
                                                <div class="views-field views-field-field-anh-dai-dien">
                                                    <div class="field-content"><a
                                                            href="/vi/khong-pham-mau-hay-chat-bao-quan"><img class=""
                                                                typeof="foaf:Image"
                                                                src="https://www.nongsanviet.net.vn/sites/default/files/ico2.png"
                                                                width="54" height="55"
                                                                alt="Không phẩm màu hay chất bảo quản"
                                                                title="Không phẩm màu hay chất bảo quản"></a></div>
                                                </div>
                                                <div class="views-field views-field-title"> <span class="field-content"><a
                                                            href="/vi/khong-pham-mau-hay-chat-bao-quan">Không phẩm màu hay
                                                            chất
                                                            bảo quản</a></span> </div>
                                            </li>
                                            <li class="views-row views-row-3 views-row-odd col-md-3 col-sm-6 col-xs-12">
                                                <div class="views-field views-field-field-anh-dai-dien">
                                                    <div class="field-content"><a href="/vi/giao-hang-toan-quoc"><img
                                                                class="" typeof="foaf:Image"
                                                                src="https://www.nongsanviet.net.vn/sites/default/files/ico3.png"
                                                                width="70" height="44" alt="Giao hàng toàn quốc"
                                                                title="Giao hàng toàn quốc"></a></div>
                                                </div>
                                                <div class="views-field views-field-title"> <span class="field-content"><a
                                                            href="/vi/giao-hang-toan-quoc">Giao hàng toàn quốc</a></span>
                                                </div>
                                                <div class="views-field views-field-body"> <span class="field-content">Nhanh
                                                        chóng - tiện lợi</span> </div>
                                            </li>
                                            <li
                                                class="views-row views-row-4 views-row-even views-row-last col-md-3 col-sm-6 col-xs-12">
                                                <div class="views-field views-field-field-anh-dai-dien">
                                                    <div class="field-content"><a href="/vi/ho-tro-tu-van"><img class=""
                                                                typeof="foaf:Image"
                                                                src="https://www.nongsanviet.net.vn/sites/default/files/ico4.png"
                                                                width="44" height="49" alt="Hỗ trợ tự vấn"
                                                                title="Hỗ trợ tự vấn"></a></div>
                                                </div>
                                                <div class="views-field views-field-title"> <span class="field-content"><a
                                                            href="/vi/ho-tro-tu-van">Hỗ trợ tự vấn</a></span> </div>
                                                <div class="views-field views-field-body"> <span class="field-content">Tư
                                                        vấn
                                                        24/24</span> </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-front-wrapper container-content-common-all">
            <div class="container">
                <div class="container-content">
                    <div class="common-content-wrapper-page">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 contact-center">
                                <h1 style="color: #333; text-transform: uppercase;font-size: 20px;">Để lại liên hệ để chúng
                                    tôi tư vấn</h1>
                                    
                                @if(session('success'))
                                    <div class="alert alert-success" style="margin-bottom: 20px;">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                
                                @if(session('error'))
                                    <div class="alert alert-danger" style="margin-bottom: 20px;">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                
                                @if($errors->any())
                                    <div class="alert alert-danger" style="margin-bottom: 20px;">
                                        <ul style="margin: 0; padding-left: 20px;">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
                                <div class="region region-content">
                                    <div id="block-system-main" class="block block-system">


                                        <div class="content">
                                            <form action="{{ locale_route('contact') }}" method="post" id="alla-tech-lien-he"
                                                accept-charset="UTF-8">
                                                @csrf
                                                <input type="hidden" name="form_id" value="alla_tech_lien_he">
                                                <div>
                                                    <div class="form-item form-type-textfield form-item-name">
                                                        <label for="edit-name">Fullname <span class="form-required"
                                                                title="Trường dữ liệu này là bắt buộc.">*</span></label>
                                                        <input required="required" placeholder="Họ tên"
                                                            class="form-control form-text required" type="text"
                                                            id="edit-name" name="name" value="" size="60" maxlength="255"
                                                            fdprocessedid="tjovfa">
                                                    </div>
                                                    <div class="form-item form-type-emailfield form-item-email">
                                                        <label for="edit-email">Email </label>
                                                        <input placeholder="Email" class="form-control form-text form-email"
                                                            type="email" id="edit-email" name="email" value="" size="60"
                                                            maxlength="255" fdprocessedid="j1ewn9">
                                                    </div>
                                                    <div class="form-item form-type-textfield form-item-phone">
                                                        <label for="edit-phone">Số điện thoại <span class="form-required"
                                                                title="Trường dữ liệu này là bắt buộc.">*</span></label>
                                                        <input placeholder="Số điện thoại"
                                                            class="form-control form-text required" required="required"
                                                            type="text" id="edit-phone" name="phone" value="" size="60"
                                                            maxlength="255" fdprocessedid="v7bz9a">
                                                    </div>
                                                    <div class="form-item form-type-textfield form-item-address">
                                                        <label for="edit-address">Địa chỉ </label>
                                                        <input placeholder="Địa chỉ" class="form-control form-text"
                                                            type="text" id="edit-address" name="address" value="" size="60"
                                                            maxlength="500" fdprocessedid="1e2eyf">
                                                    </div>
                                                    <div class="form-item form-type-textfield form-item-services">
                                                        <label for="edit-services">Dịch vụ </label>
                                                        <input placeholder="Dịch vụ" class="form-control form-text"
                                                            type="text" id="edit-services" name="services" value=""
                                                            size="60" maxlength="500" fdprocessedid="zb46i">
                                                    </div>
                                                    <div class="form-item form-type-textarea form-item-content">
                                                        <label for="edit-content">Nội dung </label>
                                                        <div class="form-textarea-wrapper"><textarea placeholder="Nội dung"
                                                                class="form-control form-textarea" id="edit-content"
                                                                name="message" cols="60" rows="5"></textarea></div>
                                                    </div>
                                                    <div class="form-item submit-contact">
                                                        <input class="btn btn-default form-submit" type="submit"
                                                            id="edit-send-content" name="op" value="Gửi"
                                                            fdprocessedid="w49fjl">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 contact-infomation contact-infomation-page">
                                <h2><strong>{{ $contactInfo->title ?? 'NÔNG SẢN VIỆT NAM' }}</strong></h2>

                                @if($contactInfo)
                                    @php
                                        $extraData = $contactInfo->extra_data ?? [];
                                    @endphp
                                    @if(isset($extraData['address']))
                                        <p><strong>Địa chỉ:&nbsp;</strong>{{ $extraData['address'] }}</p>
                                    @endif

                                    @if(isset($extraData['hotline']))
                                        <p><strong>Hotline:</strong> <a href="tel:{{ preg_replace('/[^0-9]/', '', $extraData['hotline']) }}">{{ $extraData['hotline'] }}</a></p>
                                    @endif

                                    @if(isset($extraData['email']))
                                        <p><strong>Email:</strong> {{ $extraData['email'] }}</p>
                                    @endif

                                    @if(isset($extraData['fanpage_url']) && isset($extraData['fanpage_name']))
                                        <p><strong>Fanpage:</strong> <a href="{{ $extraData['fanpage_url'] }}" target="_blank">{{ $extraData['fanpage_name'] }}</a></p>
                                    @endif
                                @else
                                    {{-- Fallback nếu chưa có dữ liệu trong DB --}}
                                    <p><strong>Địa chỉ:&nbsp;</strong>Ô số 20 LK 03, khu shophouse Loong Toòng, P Yết Kiêu, TP
                                        Hạ Long, tỉnh Quảng Ninh.</p>

                                    <p><strong>Hotline:</strong> <a href="tel:0912900058">0889 333 618</a></p>

                                    <p><strong>Email:</strong> nongsanviet.net.vn@gmail.com</p>

                                    <p><strong>Fanpage:</strong> <a href="https://www.facebook.com/nongsanviet.net.vn/">Nông Sản
                                            Việt Nam</a></p>
                                @endif

                                <p>&nbsp;</p>

                                <p>&nbsp;</p>
                            </div>
                        </div>
                        <div class="content-bottom">
                            <div class="region region-content-bottom">
                                <div id="block-alla-tech-block-dang-ky-nhan-tin" class="block block-alla-tech">

                                    <div class="block-title">
                                        <h3>Đăng ký nhận tin khuyến mãi</h3>
                                    </div>

                                    <div class="content">
                                        <form action="{{ locale_route('contact') }}" method="post" id="block-dang-ky-nhan-tin"
                                            accept-charset="UTF-8">
                                            @csrf
                                            <input type="hidden" name="form_id" value="block_dang_ky_nhan_tin">
                                            <div>
                                                <div class="form-item form-type-emailfield form-item-email">
                                                    <label for="edit-email--2">Email <span class="form-required"
                                                            title="Trường dữ liệu này là bắt buộc.">*</span></label>
                                                    <input placeholder="Nhập địa chỉ email" required="required"
                                                        class="form-control form-text form-email required" type="email"
                                                        id="edit-email--2" name="email" value="" size="60" maxlength="255"
                                                        fdprocessedid="85hi6m">
                                                </div>
                                                <div class="form-item submit-newsletter"><input
                                                        class="btn btn-default form-submit" type="submit"
                                                        id="edit-submit--2" name="op" value="Đăng ký nhận tin"
                                                        fdprocessedid="pvmreb"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div><iframe id="google_map_contact_page1"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3726.027384698902!2d107.08109461493133!3d20.95141538604034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a59299a5b7577%3A0x4f7f3a5a907ec2e8!2zQ8O0bmcgdHkgVE5ISCDEkeG6p3UgdMawIEhvw6BuZyBBbmg!5e0!3m2!1svi!2s!4v1589247630346!5m2!1svi!2s"
                    width="100%" height="480" frameborder="0" allowfullscreen=""
                    sandbox="allow-same-origin allow-scripts allow-popups allow-forms"></iframe></div>
        </div>
    </div>
@endsection