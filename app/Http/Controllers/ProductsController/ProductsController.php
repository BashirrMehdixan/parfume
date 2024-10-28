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
    public function index($slug)
    {
        $category = Collection::where('slug->' . session('locale'), $slug)->first();
//        dd($category->slug);
        $langs = [
            ['code' => 'az', 'url' => '/mehsullar/' . $category->getTranslation('slug', 'az')],
            ['code' => 'en', 'url' => '/en/products/' . $category->getTranslation('slug', 'en')],
            ['code' => 'ru', 'url' => '/ru/produkty/' . $category->getTranslation('slug', 'ru')],
        ];
        $products = $category->products()->orderBy('created_at', 'desc')->where('status', 1)->paginate(12);
        $brands = Brand::where('status', 1)->get();
        return view('pages.products.index', compact('langs', 'products', 'brands', 'category'));
    }

    public function show($category, $slug)
    {
        $langs = [
            ['code' => 'az', 'url' => '/mehsullar/' . $category . '/' . $slug],
            ['code' => 'en', 'url' => '/en/products/' . $category . '/' . $slug],
            ['code' => 'ru', 'url' => '/ru/produkty/' . $category . '/' . $slug],
        ];
        $category = Collection::where('slug->' . session('locale'), $category)->first();
        $products = Product::where('status', 1)->get();
        $product = Product::where('slug->' . session('locale'), $slug)->first();
        return view('pages.products.show', compact('langs', 'product', 'products', 'category'));
    }

    public function filter(Request $request, $category)
    {
        $langs = [
            ['code' => 'az', 'url' => '/mehsullar/' . $category . '/filter'],
            ['code' => 'en', 'url' => '/en/products/' . $category . '/filter'],
            ['code' => 'ru', 'url' => '/ru/produkty/' . $category . '/filter'],
        ];
        $category = Collection::where('slug->' . session('locale'), $category)->first();
        $query = Product::query()->where('status', 1)->where('collection_id', $category->id);
        if ($request->gender && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }

        if ($request->brand && $request->brand !== 'all') {
            $query->where('brand_id', $request->brand);
        }

        $products = $query->paginate(12);

        return view('pages.products.index', compact('langs', 'products', 'category'));
    }
}
