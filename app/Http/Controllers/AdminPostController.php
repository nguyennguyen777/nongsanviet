<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    /**
     * Hiển thị danh sách bài viết
     */
    public function index(Request $request)
    {
        $query = Post::query();

        // Tìm kiếm
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('title_en', 'like', "%{$search}%")
                  ->orWhere('title_zh', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // Lọc theo trạng thái
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        $posts = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Hiển thị form tạo bài viết mới
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Lưu bài viết mới
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_zh' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug',
            'content' => 'nullable|string',
            'content_en' => 'nullable|string',
            'content_zh' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'boolean',
        ]);

        // Tạo slug nếu không có
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
            // Đảm bảo slug unique
            $counter = 1;
            while (Post::where('slug', $validated['slug'])->exists()) {
                $validated['slug'] = Str::slug($validated['title']) . '-' . $counter;
                $counter++;
            }
        }

        // Upload ảnh
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        $validated['status'] = $request->has('status');

        Post::create($validated);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Bài viết đã được tạo thành công!');
    }

    /**
     * Hiển thị form chỉnh sửa bài viết
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Cập nhật bài viết
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_zh' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug,' . $post->id,
            'content' => 'nullable|string',
            'content_en' => 'nullable|string',
            'content_zh' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'boolean',
        ]);

        // Tạo slug nếu không có
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
            // Đảm bảo slug unique
            $counter = 1;
            while (Post::where('slug', $validated['slug'])->where('id', '!=', $post->id)->exists()) {
                $validated['slug'] = Str::slug($validated['title']) . '-' . $counter;
                $counter++;
            }
        }

        // Upload ảnh mới và xóa ảnh cũ
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        $validated['status'] = $request->has('status');

        $post->update($validated);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Bài viết đã được cập nhật thành công!');
    }

    /**
     * Xóa bài viết
     */
    public function destroy(Post $post)
    {
        // Xóa ảnh nếu có
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Bài viết đã được xóa thành công!');
    }
}

