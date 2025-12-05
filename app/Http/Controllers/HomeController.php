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
            ->take(8)
            ->get();

        // Lấy bài viết mới nhất
        $latestPosts = Post::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Nếu homepage cần slider
        $sliders = Slider::orderBy('sort_order', 'asc')->get();

        return view('home', compact('featuredProducts', 'latestPosts', 'sliders'));
    }
}
