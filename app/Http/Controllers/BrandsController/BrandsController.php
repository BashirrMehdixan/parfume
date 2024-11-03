<?php

namespace App\Http\Controllers\BrandsController;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brand::where('status', 1)->get();
        $langs = [
            ['code' => 'az', 'url' => '/markalar'],
            ['code' => 'en', 'url' => '/en/brands'],
        ];
        return view('pages.brands.index', compact('brands', 'langs'));
    }

    public function show($slug)
    {
        $brand = Brand::where('slug->' . session('locale'), $slug)->first();
//        dd($brand);
        $products = $brand->products()->where('status', 1)->get();
        $langs = [
            ['code' => 'az', 'url' => '/markalar/' . $brand->getTranslation('slug', 'az')],
            ['code' => 'en', 'url' => '/en/brands/' . $brand->getTranslation('slug', 'en')],
        ];
        return view('pages.brands.show', compact('brand', 'products', 'langs'));
    }
}
