<?php

namespace App\Http\Controllers\BrandsController;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brand::where('status', 1)->get();
        $langs = [
            ['code' => 'az', 'url' => '/markalar'],
            ['code' => 'en', 'url' => '/en/brands'],
            ['code' => 'ru', 'url' => '/ru/brendy'],
        ];
        return view('pages.brands.index', compact('brands', 'langs'));
    }

    public function show($slug)
    {
        $langs = [
            ['code' => 'az', 'url' => 'brendler/' . $slug],
            ['code' => 'en', 'url' => '/en/brands/' . $slug],
            ['code' => 'ru', 'url' => '/ru/brendy/' . $slug],
        ];
        $brand = Brand::where('slug->' . session('locale'), $slug)->first();
        $brandedP = Product::where('brand_id', $brand->id)->get();
        return view('pages.brands.show', compact('brand', 'brandedP', 'langs'));
    }
}
