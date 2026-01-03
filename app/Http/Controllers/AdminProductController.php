<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    /**
     * Hiển thị danh sách sản phẩm
     */
    public function index(Request $request)
    {
        $query = Product::with('category');

        // Tìm kiếm
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Lọc theo category
        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        // Lọc theo trạng thái
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        $products = $query->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->paginate(10);
        $categories = Category::orderBy('name')->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    /**
     * Hiển thị form tạo sản phẩm mới
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Lưu sản phẩm mới
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'name' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_zh' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug',
            'price' => 'nullable|integer|min:0',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_zh' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'background_image' => 'nullable|image|max:2048',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'boolean',
        ]);

        // Tạo slug nếu không có
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
            // Đảm bảo slug unique
            $counter = 1;
            while (Product::where('slug', $validated['slug'])->exists()) {
                $validated['slug'] = Str::slug($validated['name']) . '-' . $counter;
                $counter++;
            }
        }

        // Upload ảnh đại diện
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        // Upload ảnh nền
        if ($request->hasFile('background_image')) {
            $validated['background_image'] = $request->file('background_image')->store('products', 'public');
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['status'] = $request->has('status');

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Sản phẩm đã được tạo thành công!');
    }

    /**
     * Hiển thị form chỉnh sửa sản phẩm
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Cập nhật sản phẩm
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'name' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_zh' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug,' . $product->id,
            'price' => 'nullable|integer|min:0',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_zh' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'background_image' => 'nullable|image|max:2048',
            'is_featured' => 'boolean',
            'status' => 'boolean',
        ]);

        // Tạo slug nếu không có
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
            // Đảm bảo slug unique
            $counter = 1;
            while (Product::where('slug', $validated['slug'])->where('id', '!=', $product->id)->exists()) {
                $validated['slug'] = Str::slug($validated['name']) . '-' . $counter;
                $counter++;
            }
        }

        // Upload ảnh đại diện mới và xóa ảnh cũ
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        // Upload ảnh nền mới và xóa ảnh cũ
        if ($request->hasFile('background_image')) {
            if ($product->background_image) {
                Storage::disk('public')->delete($product->background_image);
            }
            $validated['background_image'] = $request->file('background_image')->store('products', 'public');
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['status'] = $request->has('status');

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Sản phẩm đã được cập nhật thành công!');
    }

    /**
     * Xóa sản phẩm
     */
    public function destroy(Product $product)
    {
        // Xóa ảnh nếu có
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        if ($product->background_image) {
            Storage::disk('public')->delete($product->background_image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Sản phẩm đã được xóa thành công!');
    }
}

