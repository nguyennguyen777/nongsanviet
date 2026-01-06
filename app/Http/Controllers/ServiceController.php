<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Post;

class ServiceController extends Controller
{
    /**
     * Trang danh sách dịch vụ
     */
    public function index()
    {
        $services = Service::where('status', 1)
            ->orderBy('id')
            ->paginate(12);

        $latestPosts = Post::where('status', 1)
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        return view('pages.services', compact('services', 'latestPosts'));
    }

    /**
     * Hiển thị trang chi tiết dịch vụ theo slug
     */
    public function show($slug)
    {
        // Tìm service theo slug
        $service = Service::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        // Lấy danh sách services khác để hiển thị sidebar
        $services = Service::where('id', '!=', $service->id)
            ->where('status', 1)
            ->orderBy('title')
            ->get();

        // Lấy tin tức mới nhất để hiển thị sidebar
        $latestPosts = Post::where('status', 1)
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        return view('pages.service', compact('service', 'services', 'latestPosts'));
    }
}
