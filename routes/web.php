<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandsController\BrandsController;
use App\Http\Controllers\ContactController\ContactController;
use App\Http\Controllers\IndexController\IndexController;
use App\Http\Controllers\ProductsController\ProductsController;

$locale = Request::segment(1);
if (in_array($locale, ['en', 'ru'])) {
    $locale = Request::segment(1);
} else {
    $locale = '';
}
Route::group(['prefix' => $locale, function ($locale = null) {
    return $locale;
}, 'where' => ['locale' => '[a-zA-Z]{2}'], 'middleware' => SetLocale::class], function () {
    // Static
    Route::get("/", [IndexController::class, 'index'])->name('index');
    // Contact
    Route::name('contact_')->group(function () {
        Route::get('elaqe', [ContactController::class, 'index'])->name('az');
        Route::get('contact', [ContactController::class, 'index'])->name('en');
        Route::get('kontakt', [ContactController::class, 'index'])->name('ru');
    });
    // Products
    Route::name('products_category_')->group(function () {
        Route::get('mehsullar/{slug}', [ProductsController::class, 'index'])->name('az');
        Route::get('products/{slug}', [ProductsController::class, 'index'])->name('en');
        Route::get('produkty/{slug}', [ProductsController::class, 'index'])->name('ru');
    });
    Route::name('products_filter_')->group(function () {
        Route::get('mehsullar/{category}/filter', [ProductsController::class, 'filter'])->name('az');
        Route::get('products/{category}/filter', [ProductsController::class, 'filter'])->name('en');
        Route::get('produkty/{category}/filter', [ProductsController::class, 'filter'])->name('ru');
    });
    Route::name('products_show_')->group(function () {
        Route::get('mehsullar/{category}/{slug}', [ProductsController::class, 'show'])->name('az');
        Route::get('products/{category}/{slug}', [ProductsController::class, 'show'])->name('en');
        Route::get('produkty/{category}/{slug}', [ProductsController::class, 'show'])->name('ru');
    });
    // Brands
    Route::name('brands_')->group(function () {
        Route::get('markalar', [BrandsController::class, 'index'])->name('az');
        Route::get('brands', [BrandsController::class, 'index'])->name('en');
        Route::get('brendy', [BrandsController::class, 'index'])->name('ru');
    });
    Route::name('brands_show_')->group(function () {
        Route::get('markalar/{brand}', [BrandsController::class, 'show'])->name('az');
        Route::get('brands/{brand}', [BrandsController::class, 'show'])->name('en');
        Route::get('marky/{brand}', [BrandsController::class, 'show'])->name('ru');
    });
    Route::name('search_')->group(function () {
        Route::get('axtaris', [ProductsController::class, 'search'])->name('az');
        Route::get('search', [ProductsController::class, 'search'])->name('en');
    });
});
