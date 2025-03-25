<?php

use App\Http\Controllers\ProductsController\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/products4/{slug}',[ProductsController::class,'index']);
