<?php

namespace App\Http\Controllers\BrandsController;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brand::where('status', 1)->get();
        return view('pages.brands.index', compact('brands'));
    }

    public function show($slug)
    {
        $brand = Brand::where('slug->' . LaravelLocalization::getCurrentLocale(), $slug)->first();
        $brandedP = Product::where('brand_id', $brand->id)->get();
        return view('pages.brands.show', compact('brand', 'brandedP'));
    }
}
