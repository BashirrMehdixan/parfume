<?php

use App\Http\Controllers\BlogController\BlogController;
use App\Http\Controllers\BrandsController\BrandsController;
use App\Http\Controllers\CategoriesController\CategoriesController;
use App\Http\Controllers\IndexController\IndexController;
use App\Http\Controllers\ProductsController\ProductsController;
use App\Http\Controllers\WatchesController\WatchesController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localize']], function () {
    // Static
    Route::get(LaravelLocalization::transRoute('routes.index'), [IndexController::class, 'index'])->name('index');
    // Products
    Route::get(LaravelLocalization::transRoute('routes.products'), [ProductsController::class, 'index'])->name('products.index');
    Route::get(LaravelLocalization::transRoute('routes.products_show'), [ProductsController::class, 'show'])->name('products.show');
    // Brands
    Route::get(LaravelLocalization::transRoute('routes.brands'), [BrandsController::class, 'index'])->name('brands.index');
    Route::get(LaravelLocalization::transRoute('routes.brands_show'), [BrandsController::class, 'show'])->name('brands.show');
    // Watches
    Route::get(LaravelLocalization::transRoute('routes.watches'), [WatchesController::class, 'index'])->name('watches.index');
    Route::get(LaravelLocalization::transRoute('routes.watches_show'), [WatchesController::class, 'show'])->name('watches.show');
    // Categories
    Route::get(LaravelLocalization::transRoute('routes.categories'), [CategoriesController::class, 'index'])->name('categories.index');
    // Blog
    Route::get(LaravelLocalization::transRoute('routes.blog'), [BlogController::class, 'index'])->name('blogs.index');
    Route::get(LaravelLocalization::transRoute('routes.blog_show'), [BlogController::class, 'show'])->name('blogs.show');
});
