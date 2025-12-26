<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PostController;

/*Route::get('/', function () {
    return view('home');
});*/

// Route chuyển ngôn ngữ - phải đặt trước các route khác
Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('language.switch');

// Route trang chủ - redirect đến locale mặc định
Route::get('/', function () {
    $locale = session('locale', 'vi');
    return redirect('/' . $locale);
});

// Route trang chủ với locale
Route::get('/{locale}', [HomeController::class, 'index'])->name('home')->where(['locale' => 'vi|en|zh']);

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');
Route::get('/product/{slug}', [ProductController::class, 'show'])
    ->name('product.show');
Route::get('/search', function () {
    return 'search page';
})->name('search');
// Routes với locale prefix - hỗ trợ vi, en, zh
Route::prefix('{locale}')->where(['locale' => 'vi|en|zh'])->group(function () {
    Route::get('/ve-chung-toi', [PageController::class, 'about'])->name('about');
    Route::get('/lien-he', [PageController::class, 'contact'])->name('contact');
    Route::post('/lien-he', [PageController::class, 'contactStore']);
    Route::get('/he-thong-phan-phoi', [PageController::class, 'hethongphanphoi'])->name('hethongphanphoi');
    Route::get('/danh-muc-san-pham', [PageController::class, 'danhmucsanpham'])->name('danhmucsanpham');
    Route::get('/tin-tuc', [PostController::class, 'index'])->name('news.index');
    Route::get('/tin-tuc/{slug}', [PostController::class, 'show'])->name('news.show');
    
    // Dynamic routes - phải đặt sau các routes cụ thể để tránh conflict
    // Route này sẽ handle tất cả các category và service pages
    Route::get('/{slug}', function ($locale, $slug) {
        // Kiểm tra xem slug là category hay service
        $category = \App\Models\Category::where('slug', $slug)->first();
        if ($category) {
            return app(CategoryController::class)->show($slug);
        }
        
        $service = \App\Models\Service::where('slug', $slug)->where('status', 1)->first();
        if ($service) {
            return app(ServiceController::class)->show($slug);
        }
        
        // Nếu không tìm thấy, trả về 404
        abort(404);
    })->name('category.show')->where('slug', '[a-z0-9-]+');
});

// Routes cũ để tương thích ngược (redirect đến locale mặc định)
Route::get('/vi/ve-chung-toi', function () {
    return redirect()->route('about', ['locale' => 'vi']);
});
Route::get('/vi/lien-he', function () {
    return redirect()->route('contact', ['locale' => 'vi']);
});
Route::get('/vi/he-thong-phan-phoi', function () {
    return redirect()->route('hethongphanphoi', ['locale' => 'vi']);
});
Route::get('/vi/danh-muc-san-pham', function () {
    return redirect()->route('danhmucsanpham', ['locale' => 'vi']);
});
Route::get('/vi/tin-tuc', function () {
    return redirect()->route('news.index', ['locale' => 'vi']);
});
Route::get('/vi/tin-tuc/{slug}', function ($slug) {
    return redirect()->route('news.show', ['locale' => 'vi', 'slug' => $slug]);
})->where('slug', '[a-z0-9-]+');
Route::get('/vi/{slug}', function ($slug) {
    return redirect()->route('category.show', ['locale' => 'vi', 'slug' => $slug]);
})->where('slug', '[a-z0-9-]+');

