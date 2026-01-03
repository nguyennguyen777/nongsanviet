<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Partner;
use App\Models\CategorySlide;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy sản phẩm nổi bật (is_featured = 1)
        $featuredProducts = Product::where('is_featured', 1)
            ->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        // Lấy bài viết mới nhất
        $latestPosts = Post::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // Lấy tin nổi bật
        $featuredPosts = Post::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // Slider
        $sliders = Slider::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        // Category slides (slide sản phẩm/dịch vụ) - chỉ lấy slide có ảnh tồn tại để hiển thị
        $categorySlides = CategorySlide::where('status', 1)
            ->with('category')
            ->orderBy('sort_order', 'asc')
            ->get()
            ->filter(function ($slide) {
                if (!$slide->image) {
                    return false;
                }
                // Kiểm tra trên disk public để tránh sai đường dẫn/driver
                return Storage::disk('public')->exists($slide->image);
            })
            ->values();

        // Ảnh slide tĩnh từ thư mục storage/app/public/products
        $productSlideImages = collect(Storage::files('public/products'))
            ->filter(function ($path) {
                return preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $path);
            })
            ->map(function ($path) {
                // Chuyển từ public/... sang đường dẫn dùng cho asset('storage/...')
                return str_replace('public/', '', $path);
            })
            ->values();

        // Dịch vụ nổi bật: sắp xếp theo ID tăng dần
        $featuredServices = Service::where('status', 1)
            ->orderBy('id', 'asc')
            ->take(5)
            ->get();

        // Đánh giá khách hàng
        $testimonials = Testimonial::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        // Đối tác - không filter dựa trên file tồn tại vì view đã có fallback
        $partners = Partner::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('home', compact(
            'featuredProducts',
            'latestPosts',
            'featuredPosts',
            'sliders',
            'categorySlides',
            'productSlideImages',
            'featuredServices',
            'testimonials',
            'partners'
        ));
    }
}
