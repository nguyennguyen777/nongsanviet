<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Post;
use App\Models\PageContent;
use App\Models\DistributionPoint;
use App\Models\Contact;
use App\Models\Newsletter;

class PageController extends Controller
{
    /**
     * Trang danh mục sản phẩm
     */
    public function danhmucsanpham()
    {
        // Lấy 3 danh mục cụ thể theo thứ tự: đồ uống giải khát, thực phẩm chế biến, gia vị
        $categorySlugs = ['do-uong-giai-khat', 'thuc-pham-che-bien', 'gia-vi'];
        $categories = Category::whereIn('slug', $categorySlugs)
            ->orderByRaw("FIELD(slug, 'do-uong-giai-khat', 'thuc-pham-che-bien', 'gia-vi')")
            ->get();

        // Lấy sản phẩm theo từng category
        // Thực phẩm chế biến: 4 sản phẩm, các danh mục khác: 8 sản phẩm
        $categoryProducts = [];
        foreach ($categories as $category) {
            $limit = $category->slug === 'thuc-pham-che-bien' ? 4 : 8;
            $categoryProducts[$category->id] = Product::where('category_id', $category->id)
                ->where('status', 1)
                ->orderBy('created_at', 'desc')
                ->take($limit)
                ->get();
        }

        // Lấy tất cả categories cho sidebar (sản phẩm nổi bật)
        $allCategories = Category::orderBy('name')->get();

        // Lấy tin tức mới nhất
        $latestPosts = Post::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view('pages.danhmucsanpham', compact('categories', 'categoryProducts', 'allCategories', 'latestPosts'));
    }

    /**
     * Trang về chúng tôi
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Trang liên hệ
     */
    public function contact()
    {
        // Lấy thông tin liên hệ từ page_contents
        $contactInfo = PageContent::where('page_key', 'contact_info')->first();

        return view('pages.contact', compact('contactInfo'));
    }

    /**
     * Xử lý form liên hệ và đăng ký nhận tin
     */
    public function contactStore(Request $request)
    {
        $formId = $request->input('form_id');

        // Xử lý form liên hệ
        if ($formId === 'alla_tech_lien_he') {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'email' => 'nullable|email|max:255',
                'message' => 'required|string',
            ]);

            Contact::create([
                'name' => $validated['name'],
                'email' => $validated['email'] ?? '',
                'phone' => $validated['phone'],
                'address' => $request->address ?? null,
                'services' => $request->services ?? null,
                'message' => $validated['message'],
            ]);

            return redirect()->route('contact', ['locale' => app()->getLocale()])->with('success', 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất có thể.');
        }

        // Xử lý form đăng ký nhận tin
        if ($formId === 'block_dang_ky_nhan_tin') {
            try {
                $validated = $request->validate([
                    'email' => 'required|email|max:255|unique:newsletters,email',
                ]);

                Newsletter::create([
                    'email' => $validated['email'],
                    'status' => true,
                ]);

                return redirect()->route('contact', ['locale' => app()->getLocale()])->with('success', 'Đăng ký nhận tin thành công!');
            } catch (\Illuminate\Validation\ValidationException $e) {
                // Nếu email đã tồn tại, vẫn hiển thị thành công (user-friendly)
                if (Newsletter::where('email', $request->email)->exists()) {
                    return redirect()->route('contact', ['locale' => app()->getLocale()])->with('success', 'Email này đã được đăng ký nhận tin!');
                }
                throw $e;
            }
        }

        return redirect()->route('contact', ['locale' => app()->getLocale()])->with('error', 'Có lỗi xảy ra. Vui lòng thử lại.');
    }

    /**
     * Trang hệ thống phân phối
     */
    public function hethongphanphoi(\Illuminate\Http\Request $request)
    {
        // Điều kiện tìm kiếm đơn giản theo province / district (text)
        $provinceFilter = $request->query('tinh-thanh');
        $districtFilter = $request->query('quan-huyen');

        $distributionQuery = DistributionPoint::where('status', 1);

        if (!empty($provinceFilter)) {
            $distributionQuery->where('province', 'like', '%' . $provinceFilter . '%');
        }

        if (!empty($districtFilter)) {
            $distributionQuery->where('district', 'like', '%' . $districtFilter . '%');
        }

        // Lấy danh sách các điểm phân phối (đã áp dụng filter nếu có)
        $distributionPoints = $distributionQuery
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        // Provinces / districts cho dropdown được lấy từ API ở phía client,
        // nên ở đây chỉ cần trả về danh sách điểm phân phối.
        return view('pages.hethongphanphoi', compact('distributionPoints'));
    }
}
