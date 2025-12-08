<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // 📌 Danh sách + filter + pagination
    public function index(Request $request)
    {
        $categorySlug = $request->query('category');

        $query = Product::with('category')
            ->where('status', 1)
            ->orderByDesc('created_at');

        // ✅ Filter theo category SLUG
        if ($categorySlug) {
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        $products = $query->paginate(12)
            ->appends($request->except('page'));

        $categories = Category::orderBy('name')->get();

        return view('product.index', compact(
            'products',
            'categories',
            'categorySlug'
        ));
    }

    // 📌 Trang chi tiết sản phẩm
    public function show($slug)
    {
        $product = Product::with('category')
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        return view('product.show', compact('product'));
    }
}
