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

class HomeController extends Controller
{
    public function index()
    {
        // Lấy sản phẩm nổi bật (is_featured = 1)
        $featuredProducts = Product::where('is_featured', 1)
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
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

        // Category slides (slide sản phẩm/dịch vụ)
        $categorySlides = CategorySlide::where('status', 1)
            ->with('category')
            ->orderBy('sort_order', 'asc')
            ->get();

        // Dịch vụ nổi bật
        $featuredServices = Service::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Đánh giá khách hàng
        $testimonials = Testimonial::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        // Đối tác
        $partners = Partner::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('home', compact(
            'featuredProducts',
            'latestPosts',
            'featuredPosts',
            'sliders',
            'categorySlides',
            'featuredServices',
            'testimonials',
            'partners'
        ));
    }
}
