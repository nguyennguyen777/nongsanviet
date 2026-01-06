<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Service;
use App\Models\Post;

class SearchController extends Controller
{
    /**
     * Trang kết quả tìm kiếm toàn site
     */
    public function index(Request $request)
    {
        $keyword = trim($request->input('q', ''));

        if ($keyword === '') {
            $products = collect();
            $services = collect();
            $posts = collect();
        } else {
            $products = Product::where('status', 1)
                ->where(function ($q) use ($keyword) {
                    $q->where('name', 'like', "%{$keyword}%")
                        ->orWhere('description', 'like', "%{$keyword}%");
                })
                ->orderByDesc('created_at')
                ->take(12)
                ->get();

            $services = Service::where('status', 1)
                ->where(function ($q) use ($keyword) {
                    $q->where('title', 'like', "%{$keyword}%")
                        ->orWhere('description', 'like', "%{$keyword}%");
                })
                ->orderBy('id')
                ->take(12)
                ->get();

            $posts = Post::where('status', 1)
                ->where(function ($q) use ($keyword) {
                    $q->where('title', 'like', "%{$keyword}%")
                        ->orWhere('content', 'like', "%{$keyword}%");
                })
                ->orderByDesc('created_at')
                ->take(12)
                ->get();
        }

        return view('pages.search', compact('keyword', 'products', 'services', 'posts'));
    }
}

