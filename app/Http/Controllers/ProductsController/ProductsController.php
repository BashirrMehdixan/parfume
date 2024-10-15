<?php

namespace App\Http\Controllers\ProductsController;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        return view('pages.products.index', compact('products', 'brands'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('pages.products.show', compact('product'));
    }
}
