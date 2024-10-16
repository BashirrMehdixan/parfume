<?php

use App\Http\Controllers\BlogController\BlogController;
use App\Http\Controllers\BrandsController\BrandsController;
use App\Http\Controllers\CategoriesController\CategoriesController;
use App\Http\Controllers\IndexController\IndexController;
use App\Http\Controllers\ProductsController\ProductsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localize']], function () {
    Route::get(LaravelLocalization::transRoute('routes.index'), [IndexController::class, 'index'])->name('index');
    Route::get(LaravelLocalization::transRoute('routes.products'), [ProductsController::class, 'index'])->name('products.index');
    Route::get(LaravelLocalization::transRoute('routes.products_show'), [ProductsController::class, 'show'])->name('products.show');
    Route::get(LaravelLocalization::transRoute('routes.brands'), [BrandsController::class, 'index'])->name('brands.index');
    Route::get(LaravelLocalization::transRoute('routes.brands_show'), [BrandsController::class, 'show'])->name('brands.show');
    Route::get(LaravelLocalization::transRoute('routes.categories'), [CategoriesController::class, 'index'])->name('categories.index');
    Route::get(LaravelLocalization::transRoute('routes.blog'), [BlogController::class, 'index'])->name('categories.show');
    Route::get(LaravelLocalization::transRoute('routes.blog_show'), [BlogController::class, 'show'])->name('categories.show');
});
