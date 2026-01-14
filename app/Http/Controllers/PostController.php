<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Product;
use App\Models\Category;

class PostController extends Controller
{
    /**
     * Hiển thị trang danh sách tin tức
     */
    public function index($locale)
    {
        // Lấy tin nổi bật (3 tin đầu tiên)
        $featuredPosts = Post::where('status', 1)
            ->orderByDesc('created_at')
            ->take(3)
            ->get();

        // Lấy danh sách tin tức với pagination (loại bỏ 3 tin nổi bật)
        $posts = Post::where('status', 1)
            ->whereNotIn('id', $featuredPosts->pluck('id'))
            ->orderByDesc('created_at')
            ->paginate(10);

        // Lấy danh mục sản phẩm cho sidebar "Sản phẩm nổi bật"
        $featuredCategories = Category::orderBy('name')
            ->take(10)
            ->get();

        // Lấy sản phẩm mới cho sidebar
        $newProducts = Product::where('status', 1)
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        // Lấy tin tức mới nhất cho sidebar
        $latestPosts = Post::where('status', 1)
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        return view('pages.news', compact(
            'featuredPosts',
            'posts',
            'featuredCategories',
            'newProducts',
            'latestPosts'
        ));
    }

    /**
     * Hiển thị chi tiết một bài viết
     */
    public function show($locale, $slug)
    {
        $post = Post::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        // Tăng view_count
        $post->increment('view_count');

        // Lấy tin tức liên quan (cho phần "Tin khác")
        $relatedPosts = Post::where('status', 1)
            ->where('id', '!=', $post->id)
            ->orderByDesc('created_at')
            ->take(5)
            ->get();

        // Lấy tin nổi bật (cho phần "Tin nổi bật")
        $featuredPosts = Post::where('status', 1)
            ->where('id', '!=', $post->id)
            ->orderByDesc('created_at')
            ->take(5)
            ->get();

        // Lấy tin tức mới nhất cho sidebar
        $latestPosts = Post::where('status', 1)
            ->where('id', '!=', $post->id)
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        // Lấy danh mục sản phẩm cho sidebar "Sản phẩm nổi bật"
        $featuredCategories = Category::orderBy('name')
            ->take(10)
            ->get();

        // Lấy sản phẩm mới cho sidebar
        $newProducts = Product::where('status', 1)
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        return view('pages.new-detail', compact('post', 'relatedPosts', 'featuredPosts', 'latestPosts', 'featuredCategories', 'newProducts'));
    }
}

