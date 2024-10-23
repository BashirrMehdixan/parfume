<?php

namespace App\Http\Controllers\ProductsController;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->where('status', 1)->where('collection_id', 2)->paginate(12);
        $brands = Brand::where('status', 1)->get();
        return view('pages.products.index', compact('products', 'brands'));
    }

    public function show($slug)
    {
        $products = Product::where('status', 1)->get();
        $product = Product::where('slug->' . LaravelLocalization::getCurrentLocale(), $slug)->first();
        return view('pages.products.show', compact('product', 'products'));
    }
}
