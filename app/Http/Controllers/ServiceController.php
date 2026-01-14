<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Post;

class ServiceController extends Controller
{
    /**
     * Trang danh sách dịch vụ tổng quan
     * Hiển thị danh sách các tỉnh có bài viết du lịch
     */
    public function index()
    {
        // Lấy 12 tỉnh có ít nhất 1 bài viết du lịch (type = 'du-lich')
        $provinces = \DB::table('services')
            ->where('services.type', 'du-lich')
            ->where('services.status', 1)
            ->where('services.content_type', 'article')
            ->leftJoin('provinces', 'services.province_id', '=', 'provinces.id')
            ->selectRaw('provinces.id as province_id, provinces.name as province_name, COUNT(services.id) as article_count')
            ->groupBy('services.province_id', 'provinces.id', 'provinces.name')
            ->havingRaw('COUNT(services.id) >= 1')
            ->orderByDesc('article_count')
            ->limit(12)
            ->get();

        // Lấy thông tin chi tiết dịch vụ du lịch
        $services = Service::where('status', 1)
            ->where('type', 'du-lich')
            ->where('content_type', 'article')
            ->orderBy('sort_order', 'asc')
            ->orderBy('title', 'asc')
            ->paginate(18);

        $latestPosts = Post::where('status', 1)
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        // Du lịch luôn dùng tourism layout
        $layoutType = 'tourism';

        return view('pages.services', compact('services', 'latestPosts', 'provinces', 'layoutType'));
    }

    /**
     * Hiển thị danh sách bài viết du lịch theo vùng miền
     */
    public function regionTourism($regionSlug)
    {
        // Map slug từ header sang region value trong database
        $regionMap = [
            'du-lich-mien-bac' => 'mien-bac',
            'du-lich-mien-trung' => 'mien-trung',
            'du-lich-mien-nam' => 'mien-nam',
        ];

        $regionValue = $regionMap[$regionSlug] ?? null;

        if (!$regionValue) {
            abort(404);
        }

        // Lấy tên vùng miền để hiển thị
        $regionNames = [
            'mien-bac' => __('Du lịch miền bắc'),
            'mien-trung' => __('Du lịch miền trung'),
            'mien-nam' => __('Du lịch miền nam'),
        ];

        $regionName = $regionNames[$regionValue];

        // Lấy tất cả services du lịch thuộc vùng miền này
        $services = Service::where('services.type', 'du-lich')
            ->where('services.status', 1)
            ->where('services.content_type', 'article')
            ->leftJoin('provinces', 'services.province_id', '=', 'provinces.id')
            ->where('provinces.region', $regionValue)
            ->select('services.*', 'provinces.name as province_name')
            ->orderBy('services.sort_order', 'asc')
            ->orderBy('services.title', 'asc')
            ->paginate(18);

        // Lấy tin tức mới nhất
        $latestPosts = Post::where('status', 1)
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        // Lấy danh sách tỉnh có bài viết trong vùng này
        $provinces = \DB::table('services')
            ->where('services.type', 'du-lich')
            ->where('services.status', 1)
            ->where('services.content_type', 'article')
            ->leftJoin('provinces', 'services.province_id', '=', 'provinces.id')
            ->where('provinces.region', $regionValue)
            ->selectRaw('provinces.id as province_id, provinces.name as province_name, COUNT(services.id) as article_count')
            ->groupBy('services.province_id', 'provinces.id', 'provinces.name')
            ->havingRaw('COUNT(services.id) >= 1')
            ->orderByDesc('article_count')
            ->get();

        // Du lịch luôn dùng tourism layout
        $layoutType = 'tourism';

        return view('pages.service-articles', compact('services', 'latestPosts', 'provinces', 'regionName', 'layoutType'));
    }

    /**
     * Hiển thị danh sách bài viết theo loại dịch vụ (nhà hàng, khách sạn, vận tải)
     */
    public function typeIndex($typeSlug)
    {
        $typeMap = [
            'du-lich' => 'du-lich',
            'nha-hang' => 'nha-hang',
            'khach-san' => 'khach-san',
            'van-tai' => 'van-tai',
        ];

        $type = $typeMap[$typeSlug] ?? $typeSlug;

        // Nếu là vận tải, bao gồm cả các tiểu loại
        $types = ($type === 'van-tai')
            ? ['van-tai', 'xe-khach', 'van-chuyen-hang-hoa']
            : [$type];

        $typeNames = [
            'du-lich' => __('Du lịch'),
            'nha-hang' => __('Nhà hàng'),
            'khach-san' => __('Khách sạn'),
            'van-tai' => __('Vận tải'),
        ];
        $typeName = $typeNames[$type] ?? ucfirst(str_replace('-', ' ', $type));

        // Danh sách bài viết theo loại
        $services = Service::whereIn('services.type', $types)
            ->where('services.status', 1)
            ->where('services.content_type', 'article')
            ->leftJoin('provinces', 'services.province_id', '=', 'provinces.id')
            ->select('services.*', 'provinces.name as province_name')
            ->orderBy('services.sort_order', 'asc')
            ->orderBy('services.title', 'asc')
            ->paginate(18);

        // Tin tức mới nhất
        $latestPosts = Post::where('status', 1)
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        // Danh sách tỉnh có bài viết theo loại
        // Nếu là du lịch, chỉ lấy 12 tỉnh để hiển thị grid
        $provincesQuery = \DB::table('services')
            ->whereIn('services.type', $types)
            ->where('services.status', 1)
            ->where('services.content_type', 'article')
            ->leftJoin('provinces', 'services.province_id', '=', 'provinces.id')
            ->selectRaw('provinces.id as province_id, provinces.name as province_name, COUNT(services.id) as article_count')
            ->groupBy('services.province_id', 'provinces.id', 'provinces.name')
            ->havingRaw('COUNT(services.id) >= 1')
            ->orderByDesc('article_count');

        // Chỉ lấy 12 tỉnh cho du lịch
        if ($type === 'du-lich') {
            $provinces = $provincesQuery->limit(12)->get();
        } else {
            $provinces = $provincesQuery->get();
        }

        // Du lịch dùng tourism layout, các loại khác dùng list layout
        $layoutType = ($type === 'du-lich') ? 'tourism' : 'list';

        return view('pages.services', compact('services', 'latestPosts', 'provinces', 'typeName', 'layoutType'));
    }

    /**
     * Hiển thị danh sách bài viết theo tiểu loại vận tải (xe khách, vận chuyển hàng hóa)
     * Không thay đổi schema, chỉ lọc theo trường type của Service
     */
    public function subtypeIndex($subtype)
    {
        // Tiểu loại hiển thị dưới Vận tải
        $allowed = ['xe-khach', 'van-chuyen-hang-hoa'];
        if (!in_array($subtype, $allowed)) {
            abort(404);
        }

        $labels = [
            'xe-khach' => __('Xe khách'),
            'van-chuyen-hang-hoa' => __('Vận chuyển hàng hóa'),
        ];
        $typeName = __('Vận tải') . ' / ' . ($labels[$subtype] ?? ucfirst(str_replace('-', ' ', $subtype)));

        $services = Service::where('services.type', $subtype)
            ->where('services.status', 1)
            ->where('services.content_type', 'article')
            ->leftJoin('provinces', 'services.province_id', '=', 'provinces.id')
            ->select('services.*', 'provinces.name as province_name')
            ->orderBy('services.sort_order', 'asc')
            ->orderBy('services.title', 'asc')
            ->paginate(18);

        $latestPosts = Post::where('status', 1)
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        $provinces = \DB::table('services')
            ->where('services.type', $subtype)
            ->where('services.status', 1)
            ->where('services.content_type', 'article')
            ->leftJoin('provinces', 'services.province_id', '=', 'provinces.id')
            ->selectRaw('provinces.id as province_id, provinces.name as province_name, COUNT(services.id) as article_count')
            ->groupBy('services.province_id', 'provinces.id', 'provinces.name')
            ->havingRaw('COUNT(services.id) >= 1')
            ->orderByDesc('article_count')
            ->get();

        // Transport subtypes luôn dùng list layout
        $layoutType = 'list';

        return view('pages.services', compact('services', 'latestPosts', 'provinces', 'typeName', 'layoutType'));
    }

    /**
     * Hiển thị danh sách bài viết du lịch theo tỉnh
     */
    public function provinceTourism($provinceSlug)
    {
        // Loại bỏ tiền tố 'du-lich-' để lấy province slug
        $provinceSlug = str_replace('du-lich-', '', $provinceSlug);

        // Tìm province theo slug
        $province = \App\Models\Province::where('slug', $provinceSlug)
            ->where('status', 1)
            ->first();

        if (!$province) {
            abort(404);
        }

        // Lấy tất cả services du lịch thuộc tỉnh này
        $services = Service::where('services.type', 'du-lich')
            ->where('services.status', 1)
            ->where('services.content_type', 'article')
            ->where('services.province_id', $province->id)
            ->select('services.*')
            ->orderBy('services.sort_order', 'asc')
            ->orderBy('services.title', 'asc')
            ->paginate(18);

        // Lấy tin tức mới nhất
        $latestPosts = Post::where('status', 1)
            ->orderByDesc('created_at')
            ->take(6)
            ->get();

        // Lấy thông tin tỉnh cho display
        $provinces = collect([]);

        // Tên hiển thị
        $typeName = __('Du lịch') . ' / ' . $province->name;

        // Layout type: tourism để hiển thị grid
        $layoutType = 'tourism';

        return view('pages.service-articles', compact('services', 'latestPosts', 'provinces', 'typeName', 'layoutType', 'province'));
    }

    /**
     * Hiển thị chi tiết service (dynamic)
     * - Nếu là category -> hiển thị danh sách children
     * - Nếu là article -> hiển thị chi tiết bài viết
     */
    public function show($slug)
    {
        $service = Service::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        // Nếu là category -> hiển thị danh sách children
        if ($service->isCategory()) {
            return $this->showCategory($service);
        }

        // Nếu là article -> hiển thị chi tiết
        return $this->showArticle($service);
    }

    /**
     * Hiển thị category (danh sách children)
     */
    protected function showCategory(Service $service)
    {
        // Lấy breadcrumb path
        $breadcrumbs = $this->getBreadcrumbs($service);

        // Đặc biệt cho Du lịch: hiển thị trực tiếp tất cả tỉnh
        if ($service->type === 'du-lich' && $service->parent_id === null) {
            // Lấy tất cả tỉnh thuộc du lịch (bỏ qua cấp miền)
            $children = Service::where('type', 'du-lich')
                ->whereNotNull('province')
                ->where('status', 1)
                ->orderBy('region', 'asc')
                ->orderBy('province', 'asc')
                ->get();

            return view('pages.service-provinces', compact('service', 'children', 'breadcrumbs'));
        }

        // Lấy children của category này
        $children = $service->children()
            ->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('title', 'asc')
            ->get();

        // Nếu children là provinces (du lịch) -> hiển thị grid tỉnh
        if ($this->isProvinceLevel($service)) {
            return view('pages.service-provinces', compact('service', 'children', 'breadcrumbs'));
        }

        // Nếu children là articles -> hiển thị list articles
        if ($children->first() && $children->first()->isArticle()) {
            return view('pages.service-articles', compact('service', 'children', 'breadcrumbs'));
        }

        // Mặc định: hiển thị subcategories
        return view('pages.service-subcategories', compact('service', 'children', 'breadcrumbs'));
    }

    /**
     * Hiển thị article (chi tiết bài viết)
     */
    protected function showArticle(Service $service)
    {
        // Tăng view_count
        $service->increment('view_count');

        // Lấy breadcrumb path
        $breadcrumbs = $this->getBreadcrumbs($service);

        // Lấy thông tin tỉnh nếu có
        if ($service->province_id) {
            $province = \App\Models\Province::find($service->province_id);
            $service->province_name = $province ? $province->name : null;
        }

        // Lấy related services (cùng province_id)
        $relatedServices = Service::where('province_id', $service->province_id)
            ->where('id', '!=', $service->id)
            ->where('status', 1)
            ->where('content_type', 'article')
            ->orderBy('sort_order', 'asc')
            ->take(6)
            ->get();

        // Lấy tin tức mới nhất
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

        return view('pages.service-detail', compact('service', 'relatedServices', 'latestPosts', 'breadcrumbs', 'relatedPosts', 'featuredPosts'));
    }

    /**
     * Kiểm tra xem có phải level tỉnh không
     */
    protected function isProvinceLevel(Service $service)
    {
        // Nếu service có region và children có province -> đây là level tỉnh
        if ($service->type === 'du-lich' && $service->region) {
            $firstChild = $service->children->first();
            return $firstChild && $firstChild->province;
        }
        return false;
    }

    /**
     * Lấy breadcrumb path
     */
    protected function getBreadcrumbs(Service $service)
    {
        $breadcrumbs = collect([$service]);
        $current = $service;

        while ($current->parent) {
            $breadcrumbs->prepend($current->parent);
            $current = $current->parent;
        }

        return $breadcrumbs;
    }

    /**
     * API: Lấy children của một service (cho dynamic menu)
     */
    public function getChildren($id)
    {
        $children = Service::where('parent_id', $id)
            ->where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('title', 'asc')
            ->get(['id', 'title', 'title_en', 'title_zh', 'slug', 'icon', 'content_type']);

        return response()->json($children);
    }
}

