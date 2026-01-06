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

        // Lấy ID các category con (nếu có)
        $childCategoryIds = Category::where('parent_id', $category->id)
            ->pluck('id')
            ->toArray();

        // Lấy sản phẩm:
        // - thuộc category hiện tại
        // - HOẶC thuộc các category con
        $products = Product::where('status', 1)
            ->where(function ($query) use ($category, $childCategoryIds) {
                $query->where('category_id', $category->id);

                if (!empty($childCategoryIds)) {
                    $query->orWhereIn('category_id', $childCategoryIds);
                }
            })
            ->orderByDesc('created_at')
            ->paginate(24);

        // Sidebar category
        $categories = Category::where('id', '!=', $category->id)
            ->orderBy('name')
            ->take(7)
            ->get();

        // Tin tức mới
        $latestPosts = Post::where('status', 1)
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        return view('pages.category', compact(
            'category',
            'products',
            'categories',
            'latestPosts'
        ));
    }


}

