<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Post;

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

        // Tải product kèm category và images (giả sử Product hasMany images relation)
        $product = Product::with(['category', 'images'])
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        // Tăng view_count
        $product->increment('view_count');

        // Related products: cùng category, khác id, lấy 4, sắp xếp mới nhất
        $related = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', 1)
            ->orderByDesc('created_at')
            ->take(4)
            ->get();

        // Lấy danh sách categories cho sidebar "Sản phẩm nổi bật"
        $featuredCategories = Category::orderBy('name')
            ->take(7)
            ->get();

        // Lấy tin tức mới nhất cho sidebar
        $latestPosts = Post::where('status', 1)
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        // Lấy tin tức liên quan cho content-bottom "Tin khác"
        $relatedPosts = Post::where('status', 1)
            ->orderByDesc('created_at')
            ->take(5)
            ->get();

        // Lấy tin nổi bật cho content-bottom "Tin nổi bật"
        $featuredPosts = Post::where('status', 1)
            ->orderByDesc('created_at')
            ->take(5)
            ->get();

        return view('product.show', compact('product', 'related', 'featuredCategories', 'latestPosts', 'relatedPosts', 'featuredPosts'));
    }

    public function update(Request $request, Product $product)
    {
        // (khuyến khích) validate trước
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'name_en' => $request->name_en,
            'name_zh' => $request->name_zh,
            'slug' => $request->slug,
            'price' => $request->price,
            'short_description' => $request->short_description,

            'description' => $request->description,
            'description_en' => $request->description_en,
            'description_zh' => $request->description_zh,

            'sort_order' => $request->sort_order ?? 0,
            'is_featured' => $request->has('is_featured'),
            'status' => $request->has('status'),
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Cập nhật sản phẩm thành công');
    }

}
