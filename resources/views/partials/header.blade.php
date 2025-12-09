<header class="bg-white shadow-sm pb-8">
  <div class="container mx-auto">

    <div class="grid grid-cols-3 items-center gap-4 py-3">

      <!-- LEFT -->
      <div class="flex items-center space-x-4 whitespace-nowrap">

        <!-- Flags -->
        <div class="flex items-center space-x-1">
          <a href="{{ url('/vi') }}" class="w-8 h-8 rounded-full bg-no-repeat bg-center bg-contain" style="background-image: url('{{ asset('storage/products/vietnam.png') }}')"></a>
          <a href="{{ url('/en') }}" class="w-8 h-8 rounded-full bg-no-repeat bg-center bg-contain" style="background-image: url('{{ asset('storage/products/en.png') }}')"></a>
          <a href="{{ url('/zh') }}" class="w-8 h-8 rounded-full bg-no-repeat bg-center bg-contain" style="background-image: url('{{ asset('storage/products/china.png') }}')"></a>
        </div>


        <!-- menu left -->
        <nav class="hidden md:flex md:space-x-6 whitespace-nowrap">

          <a href="{{ url('/ve-chung-toi') }}" class="relative inline-block text-[#464646] text-[15px] font-bold py-[35px] px-[5px] uppercase 
          after:content-[''] after:absolute after:left-1/2 after:-translate-x-1/2 after:bottom-9.5 
          after:h-[1px] after:w-[calc(100%-10px)] after:bg-gray-600 after:opacity-0 after:transition-opacity
          hover:after:opacity-100">
            Về chúng tôi
          </a>

          <div class="relative group">
            <a href="{{ url('/products') }}" class="text-[#464646] flex items-center text-[15px] font-bold py-[35px] px-[5px] uppercase 
            after:content-[''] after:absolute after:left-1/2 after:-translate-x-1/2 after:bottom-9.5
            after:h-[1px] after:w-[calc(100%-10px)] after:bg-gray-600 after:opacity-0 after:transition-opacity
            hover:after:opacity-100">
              Sản phẩm <img src="{{ asset('storage/products/li-expanded.png') }}" class="ml-1 w-2.5 h-2.5 object-contain">
            </a>
          </div>

          <!-- Dịch Vụ dropdown -->
          <div class="relative" x-data="{ openMain: false }"
              @mouseenter="openMain = true"
              @mouseleave="openMain = false">

            <a href="#" class="text-[#464646] flex items-center text-[15px] font-bold py-[35px] px-[5px] uppercase
                after:content-[''] after:absolute after:left-1/2 after:-translate-x-1/2 after:bottom-9.5
                after:h-[1px] after:w-[calc(100%-10px)] after:bg-gray-600 after:opacity-0 after:transition-opacity
                hover:after:opacity-100">
              Dịch vụ
              <img src="{{ asset('storage/products/li-expanded.png') }}" class="ml-1 w-2.5 h-2.5 object-contain">
            </a>

            <!-- Dropdown chính – ĐÃ SỬA -->
            <div class="absolute left-0 top-full mt-2 w-56 bg-white shadow-xl rounded-md z-[9999]
                        opacity-0 scale-95 pointer-events-none transition-all duration-200"
                x-show="openMain"
                x-transition
                @mouseenter.stop="openMain = true"
                x-bind:class="openMain && 'opacity-100 scale-100 pointer-events-auto'"
                x-cloak>
              
              <!-- DU LỊCH -->
              <div class="relative" x-data="{ openSub: false }"
                  @mouseenter="openSub = true"
                  @mouseleave="openSub = false">

                <a href="#" class="flex justify-between items-center px-5 py-3 hover:bg-gray-50 font-medium">
                  Du lịch
                  <img src="{{ asset('storage/products/li-expanded-right.png') }}" class="w-3 h-3">
                </a>

                <!-- Dropdown cấp 2 -->
                <div class="absolute top-0 left-full ml-1 w-56 bg-white shadow-xl rounded-md z-[9999]
                            opacity-0 scale-95 pointer-events-none transition-all duration-200"
                    x-show="openSub"
                    x-transition
                    x-bind:class="openSub && 'opacity-100 scale-100 pointer-events-auto'"
                    x-cloak>

                  <!-- Miền Bắc -->
                  <div class="relative" x-data="{ openSubSub: false }"
                      @mouseenter="openSubSub = true"
                      @mouseleave="openSubSub = false">

                    <a href="#" class="flex justify-between items-center px-5 py-3 hover:bg-gray-50 font-medium">
                      Du lịch Miền Bắc
                      <img src="{{ asset('storage/products/li-expanded-right.png') }}" class="w-3 h-3">
                    </a>

                    <div class="absolute top-0 left-full ml-1 w-56 bg-white shadow-xl rounded-md z-[9999]
                                opacity-0 scale-95 pointer-events-none transition-all duration-200"
                        x-show="openSubSub"
                        x-transition
                        x-bind:class="openSubSub && 'opacity-100 scale-100 pointer-events-auto'"
                        x-cloak>
                      <a href="/vi/du-lich-bac-kan"  class="block px-5 py-2.5 hover:bg-gray-50">Bắc Kạn</a>
                      <a href="/vi/du-lich-bac-ninh" class="block px-5 py-2.5 hover:bg-gray-50">Bắc Ninh</a>
                      <a href="/vi/du-lich-ha-giang" class="block px-5 py-2.5 hover:bg-gray-50">Hà Giang</a>
                      <!-- ... các tỉnh khác -->
                    </div>
                  </div>
                  <!-- Miền Trung, Miền Nam copy y hệt cấu trúc trên -->
                </div>

              </div>

              <a href="/vi/khach-san-0" class="block px-5 py-3 hover:bg-gray-50 font-medium">Khách sạn</a>
              <a href="/vi/nha-hang-0"   class="block px-5 py-3 hover:bg-gray-50 font-medium">Nhà hàng</a>

              <!-- Vận tải -->
              <div class="relative" x-data="{ openSub: false }"
                  @mouseenter="openSub = true"
                  @mouseleave="openSub = false">
                <a href="/vi/van-tai-0" class="flex justify-between items-center px-5 py-3 hover:bg-gray-50 font-medium">
                  Vận tải
                  <img src="{{ asset('storage/products/li-expanded-right.png') }}" class="w-3 h-3">
                </a>
                <div class="absolute top-0 left-full ml-1 w-56 bg-white shadow-xl rounded-md z-[9999]
                            opacity-0 scale-95 pointer-events-none transition-all duration-200"
                    x-show="openSub"
                    x-transition
                    x-bind:class="openSub && 'opacity-100 scale-100 pointer-events-auto'"
                    x-cloak>
                  <a href="/vi/xe-khach"              class="block px-5 py-2.5 hover:bg-gray-50">Xe khách</a>
                  <a href="/vi/van-chuyen-hang-hoa"   class="block px-5 py-2.5 hover:bg-gray-50">Vận chuyển hàng hóa</a>
                </div>
              </div>

            </div>
          </div>

        </nav>
      </div>

      <!-- CENTER (logo lệch trái xíu) -->
      <div class="flex justify-start pl-30">
        <a href="{{ url('/') }}">
          <img src="{{ asset('storage/products/logo-01_3.png') }}" class="h-18 object-contain">
        </a>
      </div>

      <!-- RIGHT -->
      <div class="flex justify-start ml-[-150px] items-center space-x-4 whitespace-nowrap">
        <nav class="hidden md:flex md:space-x-6 whitespace-nowrap">

          <a href="{{ url('/he-thong-phan-phoi') }}" class="relative text-[#464646] text-[15px] font-bold py-[35px] px-[5px] uppercase
          after:content-[''] after:absolute after:left-1/2 after:-translate-x-1/2 after:bottom-9.5 
          after:h-[1px] after:w-[calc(100%-10px)] after:bg-gray-600 after:opacity-0 after:transition-opacity
          hover:after:opacity-100">Hệ thống phân phối</a>

          <a href="{{ url('/tin-tuc') }}" class="relative text-[#464646] text-[15px] font-bold py-[35px] px-[20px] uppercase
          after:content-[''] after:absolute after:left-1/2 after:-translate-x-1/2 after:bottom-9.5 
          after:h-[1px] after:w-[calc(100%-40px)] after:bg-gray-600 after:opacity-0 after:transition-opacity
          hover:after:opacity-100">Tin tức</a>

        </nav>

        <!-- search -->
        <form action="{{ route('search') }}" class="hidden md:flex items-center bg-white ml-auto">
          <div class="relative flex items-center">
            <input 
              type="search" 
              name="q" 
              placeholder="Tìm kiếm..."
              class="w-40 border border-gray-300 shadow-sm rounded-md pl-3 pr-3 py-1 
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
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
            </svg>
            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>

          <!-- mobile menu panel -->
          <div x-show="open" @click.away="open = false" x-cloak class="absolute right-4 top-16 w-64 bg-white border rounded shadow-lg py-3 z-50">
            <a href="{{ url('/') }}" class="block px-4 py-2 hover:bg-gray-50">Trang chủ</a>
            <a href="{{ url('/ve-chung-toi') }}" class="block px-4 py-2 hover:bg-gray-50">Về chúng tôi</a>
            <a href="{{ url('/products') }}" class="block px-4 py-2 hover:bg-gray-50">Sản phẩm</a>
            <a href="{{ url('/dich-vu') }}" class="block px-4 py-2 hover:bg-gray-50">Dịch vụ</a>
            <a href="{{ url('/tin-tuc') }}" class="block px-4 py-2 hover:bg-gray-50">Tin tức</a>
            <a href="{{ url('/lien-he') }}" class="block px-4 py-2 hover:bg-gray-50">Liên hệ</a>
          </div>
        </div>
      </div>

    </div>
    <!-- liên hệ dưới về chúng tôi -->
          <a href="{{ url('/lien-he') }}" class="relative ml-25 text-[#464646] text-[15px] font-bold py-[35px] px-[25px] uppercase
          after:content-[''] after:absolute after:left-1/2 after:-translate-x-1/2 after:bottom-9 
          after:h-[1.5px] after:w-[calc(100%-50px)] after:bg-gray-600 after:opacity-0 after:transition-opacity
          hover:after:opacity-100">
            Liên hệ
          </a>
  </div>
</header>

<!-- If you use Alpine via CDN, add this in your head layout (only if not already loaded via Vite):
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
-->
