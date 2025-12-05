<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Post;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        // Lấy sản phẩm nổi bật (is_featured = 1)
        $featuredProducts = Product::where('is_featured', 1)
            ->where('status', 1)
            ->get();

        // Lấy bài viết mới nhất
        $latestPosts = Post::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Nếu homepage cần slider
        $sliders = Slider::orderBy('sort_order', 'asc')->get();

        return view('home', compact('featuredProducts', 'latestPosts', 'sliders'));

        // nếu có bảng testimonials
        // $testimonials = Testimonial::where('status',1)->orderBy('created_at','desc')->take(4)->get();

        // tạm mẫu testimonials nếu chưa có DB
        $testimonials = [
            ['name'=>'Nguyễn A','role'=>'Khách hàng','text'=>'Sản phẩm rất tươi ngon, giao nhanh.'],
            ['name'=>'Trần B','role'=>'Nhà hàng','text'=>'Chất lượng ổn, ổn định mỗi lần đặt.'],
            ['name'=>'Lê C','role'=>'Bếp ăn','text'=>'Giá tốt, nguồn gốc rõ ràng.'],
        ];

        return view('home', compact('featuredProducts','latestPosts','testimonials'));
    }
}
