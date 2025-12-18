<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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
Route::get('/vi/ve-chung-toi', function () {
    return view('pages.about');
});
