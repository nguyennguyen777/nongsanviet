<section class="relative py-53" x-data="heroSlider()">
    <div class="container mx-auto relative z-10">

        {{-- Slide Image --}}
        <template x-for="(image, index) in images" :key="index">
            <div
                x-show="current === index"
                x-transition:enter="transition-opacity duration-1000"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity duration-1000"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute inset-0 flex justify-center items-center"
            >
                <img :src="image" class="w-full h-[500px] object-cover shadow-lg">
            </div>
        </template>

        {{-- Indicators --}}
        <div class="flex justify-center mt-7 space-x-4 relative z-20 absolute top-55">
            <template x-for="(image, index) in images" :key="index">
                <button @click="goTo(index)"
                        :class="current === index 
                            ? 'bg-green-500'
                            : 'bg-white/80 hover:bg-green-500'"
                        class="w-2.5 h-2.5 rounded-full transition-all duration-300"></button>
            </template>
        </div>

    </div>

    {{-- Overlay Background --}}
    <div class="absolute inset-0 bg-black/25"></div>
</section>

<script>
function heroSlider() {
    return {
        images: [
            '{{ asset("storage/products/hero1.jpg") }}',
            '{{ asset("storage/products/hero2.jpg") }}',
            '{{ asset("storage/products/hero3.jpg") }}',
            '{{ asset("storage/products/hero4.jpg") }}',
            '{{ asset("storage/products/hero5.jpg") }}',
            '{{ asset("storage/products/hero6.jpg") }}',
            '{{ asset("storage/products/hero7.jpg") }}',
            '{{ asset("storage/products/hero8.jpg") }}',
            '{{ asset("storage/products/hero9.jpg") }}',
            '{{ asset("storage/products/hero10.jpg") }}',
            '{{ asset("storage/products/hero11.jpg") }}',
            '{{ asset("storage/products/hero12.jpg") }}',
            '{{ asset("storage/products/hero13.jpg") }}',
            '{{ asset("storage/products/hero14.jpg") }}',
            '{{ asset("storage/products/hero15.jpg") }}',
            '{{ asset("storage/products/hero16.jpg") }}',
            '{{ asset("storage/products/hero17.jpg") }}',
            '{{ asset("storage/products/hero18.jpg") }}'
        ],
        current: 0,
        init() {
            setInterval(() => this.next(), 5000);
        },
        next() {
            this.current = (this.current + 1) % this.images.length;
        },
        goTo(index) {
            this.current = index;
        }
    }
}
</script>
