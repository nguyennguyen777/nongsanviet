<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AdminContactController;

/*Route::get('/', function () {
    return view('home');
});*/

// Route chuyển ngôn ngữ - phải đặt trước các route khác
Route::get('/lang/{locale}', [LanguageController::class, 'switch'])->name('language.switch');

// Admin Routes (phải đặt trước để tránh conflict)
Route::prefix('admin')->group(function () {
    // Login routes (public)
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Protected admin routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Products management
        Route::resource('products', AdminProductController::class)->names([
            'index' => 'admin.products.index',
            'create' => 'admin.products.create',
            'store' => 'admin.products.store',
            'edit' => 'admin.products.edit',
            'update' => 'admin.products.update',
            'destroy' => 'admin.products.destroy',
        ]);

        // Categories management
        Route::resource('categories', AdminCategoryController::class)->names([
            'index' => 'admin.categories.index',
            'create' => 'admin.categories.create',
            'store' => 'admin.categories.store',
            'edit' => 'admin.categories.edit',
            'update' => 'admin.categories.update',
            'destroy' => 'admin.categories.destroy',
        ]);

        // Posts management
        Route::resource('posts', AdminPostController::class)->names([
            'index' => 'admin.posts.index',
            'create' => 'admin.posts.create',
            'store' => 'admin.posts.store',
            'edit' => 'admin.posts.edit',
            'update' => 'admin.posts.update',
            'destroy' => 'admin.posts.destroy',
        ]);

        // Services management
        Route::resource('services', AdminServiceController::class)->names([
            'index' => 'admin.services.index',
            'create' => 'admin.services.create',
            'store' => 'admin.services.store',
            'edit' => 'admin.services.edit',
            'update' => 'admin.services.update',
            'destroy' => 'admin.services.destroy',
        ]);

        // Contacts management
        Route::resource('contacts', AdminContactController::class)->only(['index', 'show', 'destroy'])->names([
            'index' => 'admin.contacts.index',
            'show' => 'admin.contacts.show',
            'destroy' => 'admin.contacts.destroy',
        ]);
    });
});

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

