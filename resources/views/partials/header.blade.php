<header class="bg-white shadow-sm pb-8">
  <div class="container mx-auto">

    <div class="grid grid-cols-3 items-center gap-4 py-3">

      <!-- LEFT -->
      <div class="flex items-center space-x-4 whitespace-nowrap">

        <!-- Flags -->
        <div class="flex items-center space-x-1">
          <a href="{{ route('language.switch', 'vi') }}" 
            class="w-8 h-8 rounded-full bg-no-repeat bg-center bg-contain {{ app()->getLocale() === 'vi' ? 'ring-2 ring-blue-500' : '' }}"
            style="background-image: url('{{ asset('storage/products/vietnam.png') }}')"
            title="Tiếng Việt"></a>
          <a href="{{ route('language.switch', 'en') }}" 
            class="w-8 h-8 rounded-full bg-no-repeat bg-center bg-contain {{ app()->getLocale() === 'en' ? 'ring-2 ring-blue-500' : '' }}"
            style="background-image: url('{{ asset('storage/products/en.png') }}')"
            title="English"></a>
          <a href="{{ route('language.switch', 'zh') }}" 
            class="w-8 h-8 rounded-full bg-no-repeat bg-center bg-contain {{ app()->getLocale() === 'zh' ? 'ring-2 ring-blue-500' : '' }}"
            style="background-image: url('{{ asset('storage/products/china.png') }}')"
            title="中文"></a>
        </div>


        <!-- menu left -->
        <nav class="hidden md:flex md:space-x-6 whitespace-nowrap">

          <a href="{{ locale_url('ve-chung-toi') }}" class="relative inline-block text-[#464646] text-[15px] font-bold py-[35px] px-[5px] uppercase 
          after:content-[''] after:absolute after:left-1/2 after:-translate-x-1/2 after:bottom-9.5 
          after:h-[1px] after:w-[calc(100%-10px)] after:bg-gray-600 after:opacity-0 after:transition-opacity
          hover:after:opacity-100">
            {{ __('Về chúng tôi') }}
          </a>

          <!-- Sản phẩm dropdown -->
          <div class="relative" x-data="{ openMain: false }" @mouseenter="openMain = true"
            @mouseleave="openMain = false">

            <!-- MENU CHA -->
            <a href="{{ locale_url('danh-muc-san-pham') }}"
              class="relative flex items-center text-[#464646] text-[15px] font-bold py-[35px] px-[5px] uppercase">
              {{ __('Sản phẩm') }}
              <img src="{{ asset('storage/products/li-expanded.png') }}" class="ml-1 w-2.5 h-2.5 object-contain">
            </a>

            <!-- DROPDOWN CẤP 1 -->
            <div class="absolute left-0 top-full w-56 bg-white/70 shadow-xl z-[9999]
              opacity-0 scale-95 transition-all duration-200" x-show="openMain" x-transition
              :class="openMain && 'opacity-100 scale-100 pointer-events-auto'" x-cloak>

              <!-- THỰC PHẨM -->
              <div class="relative" x-data="{ openSub: false }" @mouseenter="openSub = true"
                @mouseleave="openSub = false">

                <a href="{{ locale_url('danh-muc-san-pham') }}"
                  class="flex justify-between items-center px-4 py-2 hover:bg-gray-50 font-normal uppercase">
                  {{ __('Thực phẩm') }}
                  <img src="{{ asset('storage/products/li-expanded-right.png') }}" class="w-3 h-3">
                </a>

                <!-- DROPDOWN CẤP 2 -->
                <div class="absolute top-0 left-full w-56 bg-white/70 shadow-xl z-[9999]
                  opacity-0 scale-95 transition-all duration-200" x-show="openSub" x-transition
                  :class="openSub && 'opacity-100 scale-100 pointer-events-auto'" x-cloak>

                  <!-- Thực phẩm tươi sống -->
                  <div class="relative" x-data="{ openSubSub: false }" @mouseenter="openSubSub = true"
                    @mouseleave="openSubSub = false">

                    <a href="{{ locale_url('thuc-pham-tuoi-song') }}"
                      class="flex justify-between items-center px-4 py-2 hover:bg-gray-50 font-normal">
                      {{ __('Thực phẩm tươi sống') }}
                      <img src="{{ asset('storage/products/li-expanded-right.png') }}" class="w-3 h-3">
                    </a>

                    <!-- DROPDOWN CẤP 3 -->
                    <div class="absolute top-0 left-full w-56 bg-white/70 shadow-xl z-[9999]
                      opacity-0 scale-95 transition-all duration-200" x-show="openSubSub" x-transition
                      :class="openSubSub && 'opacity-100 scale-100 pointer-events-auto'" x-cloak>

                      <a href="{{ locale_url('rau-cu-qua') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Rau, củ, quả') }}</a>
                      <a href="{{ locale_url('thit-trung-sua') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Thịt, trứng, sữa tươi') }}</a>
                    </div>
                  </div>

                  <!-- Thực phẩm thô, sơ chế -->
                  <div class="relative" x-data="{ openSubSub: false }" @mouseenter="openSubSub = true"
                    @mouseleave="openSubSub = false">

                    <a href="{{ locale_url('thuc-pham-tho-so-che') }}"
                      class="flex justify-between items-center px-4 py-2 hover:bg-gray-50 font-normal">
                      {{ __('Thực phẩm thô, sơ chế') }}
                      <img src="{{ asset('storage/products/li-expanded-right.png') }}" class="w-3 h-3">
                    </a>

                    <!-- DROPDOWN CẤP 3 -->
                    <div class="absolute top-0 left-full w-56 bg-white/70 shadow-xl z-[9999]
                      opacity-0 scale-95 transition-all duration-200" x-show="openSubSub" x-transition
                      :class="openSubSub && 'opacity-100 scale-100 pointer-events-auto'" x-cloak>

                      <a href="{{ locale_url('gao-ngu-coc') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Gạo, ngũ cốc') }}</a>
                      <a href="{{ locale_url('mat-ong') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Mật ong') }}</a>
                    </div>
                  </div>

                  <!-- Thực phẩm chế biến -->
                  <div class="relative" x-data="{ openSubSub: false }" @mouseenter="openSubSub = true"
                    @mouseleave="openSubSub = false">

                    <a href="{{ locale_url('thuc-pham-che-bien') }}"
                      class="flex justify-between items-center px-4 py-2 hover:bg-gray-50 font-normal">
                      {{ __('Thực phẩm chế biến') }}
                      <img src="{{ asset('storage/products/li-expanded-right.png') }}" class="w-3 h-3">
                    </a>

                    <!-- DROPDOWN CẤP 3 -->
                    <div class="absolute top-0 left-full w-56 bg-white/70 shadow-xl z-[9999]
                      opacity-0 scale-95 transition-all duration-200" x-show="openSubSub" x-transition
                      :class="openSubSub && 'opacity-100 scale-100 pointer-events-auto'" x-cloak>

                      <a href="{{ locale_url('gao-ngu-coc-che-bien') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Gạo, ngũ cốc') }}</a>
                      <a href="{{ locale_url('rau-cu-qua-hat') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Rau, củ, quả, hạt') }}</a>
                      <a href="{{ locale_url('thit-trung-sua-che-bien') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Thịt, trứng, sữa') }}</a>
                      <a href="{{ locale_url('thuy-hai-san') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Thủy, hải sản') }}</a>
                    </div>
                  </div>

                  <a href="{{ locale_url('gia-vi') }}" class="block px-5 py-3 hover:bg-gray-50 font-normal">
                    {{ __('Gia vị') }}
                  </a>
                </div>
              </div>

              <!-- đồ uống - giải khát -->
              <a href="{{ locale_url('do-uong-giai-khat') }}" class="block px-4 py-2 hover:bg-gray-50 font-normal uppercase">
                {{ __('đồ uống - giải khát') }}
              </a>

              <!-- chắm sóc cá nhân -->
              <a href="{{ locale_url('cham-soc-ca-nhan') }}" class="block px-4 py-2 hover:bg-gray-50 font-normal uppercase">
                {{ __('chắm sóc cá nhân') }}
              </a>

              <!-- thủ công mỹ nghệ -->
              <a href="{{ locale_url('thu-cong-my-nghe') }}" class="block px-4 py-2 hover:bg-gray-50 font-normal uppercase">
                {{ __('thủ công mỹ nghệ') }}
              </a>

              <!-- hoa cây cảnh -->
              <div class="relative" x-data="{ openSub: false }" @mouseenter="openSub = true"
                @mouseleave="openSub = false">

                <a href="{{ locale_url('hoa-cay-canh') }}"
                  class="flex justify-between items-center px-4 py-2 hover:bg-gray-50 font-normal uppercase">
                  {{ __('hoa cây cảnh') }}
                  <img src="{{ asset('storage/products/li-expanded-right.png') }}" class="w-3 h-3">
                </a>

                <div class="absolute top-0 left-full w-56 bg-white/70 shadow-xl z-[9999]
                  opacity-0 scale-95 transition-all duration-200" x-show="openSub" x-transition
                  :class="openSub && 'opacity-100 scale-100 pointer-events-auto'" x-cloak>
                  <a href="{{ locale_url('cay-phong-thuy') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Cây phong thủy') }}</a>
                </div>
              </div>

            </div>
          </div>

          <!-- Dịch Vụ dropdown -->
          <div class="relative" x-data="{ openMain: false }" @mouseenter="openMain = true"
            @mouseleave="openMain = false">

            <!-- MENU CHA -->
            <a href="{{ locale_url('dich-vu') }}"
              class="relative flex items-center text-[#464646] text-[15px] font-bold py-[35px] px-[5px] uppercase">
              {{ __('dịch vụ') }}
              <img src="{{ asset('storage/products/li-expanded.png') }}" class="ml-1 w-2.5 h-2.5 object-contain">
            </a>

            <!-- DROPDOWN CẤP 1 -->
            <div class="absolute left-0 top-full w-56 bg-white/70 shadow-xl z-[9999]
              opacity-0 scale-95 transition-all duration-200" x-show="openMain" x-transition
              :class="openMain && 'opacity-100 scale-100 pointer-events-auto'" x-cloak>

              <!-- Du lịch -->
              <div class="relative" x-data="{ openSub: false }" @mouseenter="openSub = true"
                @mouseleave="openSub = false">

                <a href="{{ locale_url('du-lich') }}"
                  class="flex justify-between items-center px-4 py-2 hover:bg-gray-50 font-normal uppercase">
                  {{ __('Du lịch') }}
                  <img src="{{ asset('storage/products/li-expanded-right.png') }}" class="w-3 h-3">
                </a>

                <!-- DROPDOWN CẤP 2 -->
                <div class="absolute top-0 left-full w-56 bg-white/70 shadow-xl z-[9999]
                  opacity-0 scale-95 transition-all duration-200" x-show="openSub" x-transition
                  :class="openSub && 'opacity-100 scale-100 pointer-events-auto'" x-cloak>

                  <!-- Du lịch miền bắc -->
                  <div class="relative" x-data="{ openSubSub: false }" @mouseenter="openSubSub = true"
                    @mouseleave="openSubSub = false">

                    <a href="{{ locale_url('du-lich-mien-bac') }}"
                      class="flex justify-between items-center px-4 py-2 hover:bg-gray-50 font-normal">
                      {{ __('Du lịch miền bắc') }}
                      <img src="{{ asset('storage/products/li-expanded-right.png') }}" class="w-3 h-3">
                    </a>

                    <!-- DROPDOWN CẤP 3 -->
                    <div class="absolute top-0 left-full w-56 bg-white/70 shadow-xl z-[9999]
                      opacity-0 scale-95 transition-all duration-200" x-show="openSubSub" x-transition
                      :class="openSubSub && 'opacity-100 scale-100 pointer-events-auto'" x-cloak>

                      <a href="{{ locale_url('du-lich-bac-kan') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Bắc Kạn') }}</a>
                      <a href="{{ locale_url('du-lich-bac-ninh') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Bắc Ninh') }}</a>
                      <a href="{{ locale_url('du-lich-ha-giang') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Hà Giang') }}</a>
                      <a href="{{ locale_url('du-lich-ha-noi') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Hà Nội') }}</a>
                      <a href="{{ locale_url('du-lich-lang-son') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Lạng Sơn') }}</a>
                      <a href="{{ locale_url('du-lich-mai-chau') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Mai Châu') }}</a>
                      <a href="{{ locale_url('du-lich-moc-chau') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Mộc Châu') }}</a>
                      <a href="{{ locale_url('du-lich-ninh-binh') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Ninh Bình') }}</a>
                      <a href="{{ locale_url('du-lich-quang-ninh') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Quảng Ninh') }}</a>
                      <a href="{{ locale_url('du-lich-lao-cai') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Lào Cai') }}</a>
                      <a href="{{ locale_url('du-lich-son-la') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Sơn La') }}</a>
                      <a href="{{ locale_url('du-lich-tay-bac') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Tây Bắc') }}</a>
                      <a href="{{ locale_url('du-lich-dien-bien') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Điện Biên') }}</a>
                      <a href="{{ locale_url('du-lich-dong-bac') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Đông Bắc') }}</a>
                      <a href="{{ locale_url('du-lich-hoa-binh') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Hòa Bình') }}</a>
                    </div>
                  </div>

                  <!-- Du lịch miền trung -->
                  <div class="relative" x-data="{ openSubSub: false }" @mouseenter="openSubSub = true"
                    @mouseleave="openSubSub = false">

                    <a href="{{ locale_url('du-lich-mien-trung') }}"
                      class="flex justify-between items-center px-4 py-2 hover:bg-gray-50 font-normal">
                      {{ __('Du lịch miền trung') }}
                      <img src="{{ asset('storage/products/li-expanded-right.png') }}" class="w-3 h-3">
                    </a>

                    <!-- DROPDOWN CẤP 3 -->
                    <div class="absolute top-0 left-full w-56 bg-white/70 shadow-xl z-[9999]
                      opacity-0 scale-95 transition-all duration-200" x-show="openSubSub" x-transition
                      :class="openSubSub && 'opacity-100 scale-100 pointer-events-auto'" x-cloak>

                      <a href="{{ locale_url('du-lich-buon-ma-thuot') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Buôn Ma Thuột') }}</a>
                      <a href="{{ locale_url('du-lich-binh-thuan') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Bình Thuận') }}</a>
                      <a href="{{ locale_url('du-lich-binh-dinh') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Bình Định') }}</a>
                      <a href="{{ locale_url('du-lich-hue') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Huế') }}</a>
                      <a href="{{ locale_url('du-lich-quang-nam') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Quảng Nam') }}</a>
                      <a href="{{ locale_url('du-lich-khanh-hoa') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Khánh Hòa') }}</a>
                      <a href="{{ locale_url('du-lich-nghe-an') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Nghệ An') }}</a>
                      <a href="{{ locale_url('du-lich-ninh-thuan') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Ninh Thuận') }}</a>
                      <a href="{{ locale_url('du-lich-phan-thiet') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Phan Thiết') }}</a>
                      <a href="{{ locale_url('du-lich-phu-yen') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Phú Yên') }}</a>
                      <a href="{{ locale_url('du-lich-quang-binh') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Quảng Bình') }}</a>
                      <a href="{{ locale_url('du-lich-tay-nguyen') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Tây Nguyên') }}</a>
                      <a href="{{ locale_url('du-lich-da-lat') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Đà Lạt') }}</a>
                      <a href="{{ locale_url('du-lich-da-nang') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Đà Nẵng') }}</a>
                      <a href="{{ locale_url('du-lich-dao-binh-ba') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Đảo Bình Ba') }}</a>
                      <a href="{{ locale_url('du-lich-dao-binh-hung') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Đảo Bình Hưng') }}</a>
                      <a href="{{ locale_url('du-lich-quy-nhon') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Quy Nhơn') }}</a>
                      <a href="{{ locale_url('du-lich-dao-ba-lua') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Đảo Bà Lụa') }}</a>
                      <a href="{{ locale_url('du-lich-ha-tinh') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Hà Tĩnh') }}</a>
                    </div>
                  </div>

                  <!-- Du lịch miền nam -->
                  <div class="relative" x-data="{ openSubSub: false }" @mouseenter="openSubSub = true"
                    @mouseleave="openSubSub = false">

                    <a href="{{ locale_url('du-lich-mien-nam') }}"
                      class="flex justify-between items-center px-4 py-2 hover:bg-gray-50 font-normal">
                      {{ __('Du lịch miền nam') }}
                      <img src="{{ asset('storage/products/li-expanded-right.png') }}" class="w-3 h-3">
                    </a>

                    <!-- DROPDOWN CẤP 3 -->
                    <div class="absolute top-0 left-full w-56 bg-white/70 shadow-xl z-[9999]
                      opacity-0 scale-95 transition-all duration-200" x-show="openSubSub" x-transition
                      :class="openSubSub && 'opacity-100 scale-100 pointer-events-auto'" x-cloak>

                      <a href="{{ locale_url('du-lich-an-giang') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch An Giang') }}</a>
                      <a href="{{ locale_url('du-lich-bac-lieu') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Bạc Liêu') }}</a>
                      <a href="{{ locale_url('du-lich-ben-tre') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Bến Tre') }}</a>
                      <a href="{{ locale_url('du-lich-chau-doc') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Châu Đốc') }}</a>
                      <a href="{{ locale_url('du-lich-ca-mau') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Cà Mau') }}</a>
                      <a href="{{ locale_url('du-lich-con-dao') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Côn Đảo') }}</a>
                      <a href="{{ locale_url('du-lich-can-tho') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Cần Thơ') }}</a>
                      <a href="{{ locale_url('du-lich-ha-tien') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Hà Tiên') }}</a>
                      <a href="{{ locale_url('du-lich-kien-giang') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Kiên Giang') }}</a>
                      <a href="{{ locale_url('du-lich-long-an') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Long An') }}</a>
                      <a href="{{ locale_url('du-lich-mien-tay') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Miền Tây') }}</a>
                      <a href="{{ locale_url('du-lich-nam-du') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Nam Du') }}</a>
                      <a href="{{ locale_url('du-lich-phu-quoc') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Phú Quốc') }}</a>
                      <a href="{{ locale_url('du-lich-soc-trang') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Sóc Trăng') }}</a>
                      <a href="{{ locale_url('du-lich-tien-giang') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Tiền Giang') }}</a>
                      <a href="{{ locale_url('du-lich-vung-tau') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch Vũng Tàu') }}</a>
                      <a href="{{ locale_url('du-lich-tp-ho-chi-minh') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Du lịch TP Hồ Chí Minh') }}</a>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Khách sạn -->
              <a href="{{ locale_url('khach-san') }}" class="block px-4 py-2 hover:bg-gray-50 font-normal uppercase">
                {{ __('Khách sạn') }}
              </a>

              <!-- Nhà hàng -->
              <a href="{{ locale_url('nha-hang') }}" class="block px-4 py-2 hover:bg-gray-50 font-normal uppercase">
                {{ __('Nhà hàng') }}
              </a>

              <!-- Vận tải -->
              <div class="relative" x-data="{ openSub: false }" @mouseenter="openSub = true"
                @mouseleave="openSub = false">

                <a href="{{ locale_url('van-tai') }}"
                  class="flex justify-between items-center px-4 py-2 hover:bg-gray-50 font-normal uppercase">
                  {{ __('Vận tải') }}
                  <img src="{{ asset('storage/products/li-expanded-right.png') }}" class="w-3 h-3">
                </a>

                <div class="absolute top-0 left-full w-56 bg-white/70 shadow-xl z-[9999]
                  opacity-0 scale-95 transition-all duration-200" x-show="openSub" x-transition
                  :class="openSub && 'opacity-100 scale-100 pointer-events-auto'" x-cloak>
                  <a href="{{ locale_url('xe-khach') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Xe khách') }}</a>
                  <a href="{{ locale_url('van-chuyen-hang-hoa') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Vận chuyển hàng hóa') }}</a>
                </div>
              </div>

            </div>
          </div>

        </nav>
      </div>

      <!-- CENTER (logo lệch trái xíu) -->
      <div class="flex justify-start pl-30">
        <a href="{{ locale_url() }}">
          <img src="{{ asset('storage/products/logo-01_3.png') }}" class="h-18 object-contain">
        </a>
      </div>

      <!-- RIGHT -->
      <div class="flex justify-start ml-[-150px] items-center space-x-4 whitespace-nowrap">
        <nav class="hidden md:flex md:space-x-6 whitespace-nowrap">

          <a href="{{ locale_url('he-thong-phan-phoi') }}" class="relative text-[#464646] text-[15px] font-bold py-[35px] px-[5px] uppercase
          after:content-[''] after:absolute after:left-1/2 after:-translate-x-1/2 after:bottom-9.5 
          after:h-[1px] after:w-[calc(100%-10px)] after:bg-gray-600 after:opacity-0 after:transition-opacity
          hover:after:opacity-100">{{ __('Hệ thống phân phối') }}</a>

          <a href="{{ locale_url('tin-tuc') }}" class="relative text-[#464646] text-[15px] font-bold py-[35px] px-[20px] uppercase
          after:content-[''] after:absolute after:left-1/2 after:-translate-x-1/2 after:bottom-9.5 
          after:h-[1px] after:w-[calc(100%-40px)] after:bg-gray-600 after:opacity-0 after:transition-opacity
          hover:after:opacity-100">{{ __('Tin tức') }}</a>

        </nav>

        <!-- search -->
        <form action="{{ route('search') }}" class="hidden md:flex items-center bg-white ml-auto">
          <div class="relative flex items-center">
            <input type="search" name="q" placeholder="{{ __('Tìm kiếm...') }}" class="w-40 border border-gray-300 shadow-sm rounded-md pl-3 pr-3 py-1 
                    focus:outline-none
                    focus:border-[#66afe9]
                    focus:shadow-[inset_0_1px_1px_rgba(0,0,0,0.075),0_0_8px_rgba(102,175,233,0.6)]
                    transition">
            <!-- icon search -->
            <i class="fa-solid fa-magnifying-glass absolute right-3 text-gray-700 text-xl"></i>
          </div>
        </form>

      </div>

      <!-- Mobile hamburger -->
      <div class="md:hidden" x-data="{open:false}">
        <button @click="open = !open" aria-label="Toggle menu" class="p-2 rounded-md text-gray-700 hover:bg-gray-100">
          <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
          </svg>
          <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>

        <!-- mobile menu panel -->
        <div x-show="open" @click.away="open = false" x-cloak
          class="absolute right-4 top-16 w-64 bg-white border rounded shadow-lg py-3 z-50">
          <a href="{{ locale_url() }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Trang chủ') }}</a>
          <a href="{{ locale_url('ve-chung-toi') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Về chúng tôi') }}</a>
          <a href="{{ locale_url('danh-muc-san-pham') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Sản phẩm') }}</a>
          <a href="{{ locale_url('dich-vu') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('dịch vụ') }}</a>
          <a href="{{ locale_url('tin-tuc') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Tin tức') }}</a>
          <a href="{{ locale_url('lien-he') }}" class="block px-4 py-2 hover:bg-gray-50">{{ __('Liên hệ') }}</a>
        </div>
      </div>
    </div>

  </div>
  <!-- liên hệ dưới về chúng tôi -->
  <a href="{{ locale_url('lien-he') }}" class="relative ml-25 text-[#464646] text-[15px] font-bold py-[35px] px-[25px] uppercase
          after:content-[''] after:absolute after:left-1/2 after:-translate-x-1/2 after:bottom-9 
          after:h-[1.5px] after:w-[calc(100%-50px)] after:bg-gray-600 after:opacity-0 after:transition-opacity
          hover:after:opacity-100">
    {{ __('Liên hệ') }}
  </a>
  </div>
</header>

<!-- If you use Alpine via CDN, add this in your head layout (only if not already loaded via Vite):-->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>