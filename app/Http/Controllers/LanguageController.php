<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Chuyển đổi ngôn ngữ và redirect về trang trước đó
     */
    public function switch($locale)
    {
        // Kiểm tra locale hợp lệ
        $allowedLocales = ['vi', 'en', 'zh'];
        
        if (!in_array($locale, $allowedLocales)) {
            $locale = 'vi'; // Mặc định là tiếng Việt
        }

        // Lưu locale vào session
        Session::put('locale', $locale);
        App::setLocale($locale);

        // Lấy URL trước đó
        $previousUrl = url()->previous();
        $baseUrl = url('/');
        
        // Nếu URL trước đó là từ cùng domain
        if (strpos($previousUrl, $baseUrl) === 0) {
            // Lấy path từ URL
            $path = str_replace($baseUrl, '', parse_url($previousUrl, PHP_URL_PATH));
            
            // Loại bỏ locale hiện tại nếu có
            $path = preg_replace('#^/(vi|en|zh)(/|$)#', '/', $path);
            $path = ltrim($path, '/');
            
            // Tạo URL mới với locale mới
            $newUrl = $baseUrl . '/' . $locale . ($path ? '/' . $path : '');
            
            // Giữ nguyên query string nếu có
            $query = parse_url($previousUrl, PHP_URL_QUERY);
            if ($query) {
                $newUrl .= '?' . $query;
            }
            
            return redirect($newUrl);
        }

        // Nếu không có URL trước đó hoặc từ domain khác, về trang chủ với locale mới
        return redirect(url('/' . $locale));
    }
}

