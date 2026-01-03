<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminServiceController extends Controller
{
    /**
     * Hiển thị danh sách dịch vụ
     */
    public function index(Request $request)
    {
        $query = Service::query();

        // Tìm kiếm
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('title_en', 'like', "%{$search}%")
                  ->orWhere('title_zh', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Lọc theo trạng thái
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        $services = $query->orderBy('id', 'asc')->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    /**
     * Hiển thị form tạo dịch vụ mới
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Lưu dịch vụ mới
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_zh' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug',
            'description' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_zh' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'boolean',
        ];

        // Thêm rules cho các sections (title1-8, description2-8, image2-8)
        for ($i = 1; $i <= 8; $i++) {
            $rules["title{$i}"] = 'nullable|string|max:255';
            $rules["title{$i}_en"] = 'nullable|string|max:255';
            $rules["title{$i}_zh"] = 'nullable|string|max:255';
            if ($i > 1) {
                $rules["description{$i}"] = 'nullable|string';
                $rules["description{$i}_en"] = 'nullable|string';
                $rules["description{$i}_zh"] = 'nullable|string';
            }
            if ($i > 1) {
                $rules["image{$i}"] = 'nullable|image|max:2048';
            }
        }

        $validated = $request->validate($rules);

        // Tạo slug nếu không có
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
            // Đảm bảo slug unique
            $counter = 1;
            while (Service::where('slug', $validated['slug'])->exists()) {
                $validated['slug'] = Str::slug($validated['title']) . '-' . $counter;
                $counter++;
            }
        }

        // Upload ảnh chính
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        // Upload các ảnh sections (image2-8)
        for ($i = 2; $i <= 8; $i++) {
            if ($request->hasFile("image{$i}")) {
                $validated["image{$i}"] = $request->file("image{$i}")->store('services', 'public');
            }
        }

        $validated['status'] = $request->has('status');

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Dịch vụ đã được tạo thành công!');
    }

    /**
     * Hiển thị form chỉnh sửa dịch vụ
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Cập nhật dịch vụ
     */
    public function update(Request $request, Service $service)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_zh' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug,' . $service->id,
            'description' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_zh' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'boolean',
        ];

        // Thêm rules cho các sections (title1-8, description2-8, image2-8)
        for ($i = 1; $i <= 8; $i++) {
            $rules["title{$i}"] = 'nullable|string|max:255';
            $rules["title{$i}_en"] = 'nullable|string|max:255';
            $rules["title{$i}_zh"] = 'nullable|string|max:255';
            if ($i > 1) {
                $rules["description{$i}"] = 'nullable|string';
                $rules["description{$i}_en"] = 'nullable|string';
                $rules["description{$i}_zh"] = 'nullable|string';
            }
            if ($i > 1) {
                $rules["image{$i}"] = 'nullable|image|max:2048';
            }
        }

        $validated = $request->validate($rules);

        // Tạo slug nếu không có
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
            // Đảm bảo slug unique
            $counter = 1;
            while (Service::where('slug', $validated['slug'])->where('id', '!=', $service->id)->exists()) {
                $validated['slug'] = Str::slug($validated['title']) . '-' . $counter;
                $counter++;
            }
        }

        // Upload ảnh chính mới và xóa ảnh cũ
        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $validated['image'] = $request->file('image')->store('services', 'public');
        }

        // Upload các ảnh sections (image2-8) và xóa ảnh cũ
        for ($i = 2; $i <= 8; $i++) {
            if ($request->hasFile("image{$i}")) {
                $oldImage = $service->{"image{$i}"};
                if ($oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
                $validated["image{$i}"] = $request->file("image{$i}")->store('services', 'public');
            }
        }

        $validated['status'] = $request->has('status');

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Dịch vụ đã được cập nhật thành công!');
    }

    /**
     * Xóa dịch vụ
     */
    public function destroy(Service $service)
    {
        // Xóa tất cả ảnh nếu có (image chính và image2-8)
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        for ($i = 2; $i <= 8; $i++) {
            $imageField = "image{$i}";
            if ($service->$imageField) {
                Storage::disk('public')->delete($service->$imageField);
            }
        }

        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Dịch vụ đã được xóa thành công!');
    }
}

