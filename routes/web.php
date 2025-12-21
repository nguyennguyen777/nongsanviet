<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PageController;

/*Route::get('/', function () {
    return view('home');
});*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');
Route::get('/product/{slug}', [ProductController::class, 'show'])
    ->name('product.show');
Route::get('/search', function () {
    return 'search page';
})->name('search');
Route::get('/vi/ve-chung-toi', [PageController::class, 'about']);
Route::get('/vi/lien-he', [PageController::class, 'contact'])->name('contact');
Route::post('/vi/lien-he', [PageController::class, 'contactStore']);
Route::get('/vi/he-thong-phan-phoi', [PageController::class, 'hethongphanphoi']);
Route::get('/vi/danh-muc-san-pham', [PageController::class, 'danhmucsanpham']);

// Dynamic routes - phải đặt sau các routes cụ thể để tránh conflict
// Route này sẽ handle tất cả các category và service pages
Route::get('/vi/{slug}', function ($slug) {
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

