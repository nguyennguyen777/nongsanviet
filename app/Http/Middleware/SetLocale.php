<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Lấy locale từ URL (ví dụ: /vi/..., /en/..., /zh/...)
        $locale = $request->segment(1);
        
        // Kiểm tra locale hợp lệ
        $allowedLocales = ['vi', 'en', 'zh'];
        
        if (in_array($locale, $allowedLocales)) {
            // Nếu locale trong URL hợp lệ, sử dụng nó
            App::setLocale($locale);
            Session::put('locale', $locale);
        } else {
            // Nếu không có locale trong URL, lấy từ session hoặc mặc định
            $sessionLocale = Session::get('locale', 'vi');
            if (in_array($sessionLocale, $allowedLocales)) {
                App::setLocale($sessionLocale);
            } else {
                App::setLocale('vi'); // Mặc định là tiếng Việt
            }
        }

        return $next($request);
    }
}
