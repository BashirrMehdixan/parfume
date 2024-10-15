<?php

use App\Http\Controllers\BrandsController\BrandsController;
use App\Http\Controllers\CategoriesController\CategoriesController;
use App\Http\Controllers\IndexController\IndexController;
use App\Http\Controllers\ProductsController\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/brands', [BrandsController::class, 'index'])->name('brands.index');
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
