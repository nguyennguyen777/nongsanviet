<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Post;

class CategoryController extends Controller
{
    /**
     * Hiển thị trang danh sách sản phẩm theo category slug
     */
    public function show($slug)
    {
        // Tìm category theo slug
        $category = Category::where('slug', $slug)->firstOrFail();

        // Lấy danh sách products thuộc category này, chỉ lấy những sản phẩm active
        $products = Product::where('category_id', $category->id)
            ->where('status', 1)
            ->orderByDesc('created_at')
            ->paginate(24);

        // Lấy danh sách categories để hiển thị sidebar (có thể lấy tất cả hoặc limit)
        // Bạn có thể thêm điều kiện lọc nếu cần, ví dụ: ->where('status', 1) nếu có field status
        $categories = Category::where('id', '!=', $category->id)
            ->orderBy('name')
            ->get();

        // Lấy tin tức mới nhất để hiển thị sidebar
        $latestPosts = Post::where('status', 1)
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        return view('pages.category', compact('category', 'products', 'categories', 'latestPosts'));
    }
}

