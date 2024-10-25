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
    public function index($category)
    {
        $category = Collection::where('slug->' . LaravelLocalization::getCurrentLocale(), $category)->first();
        $products = $category->products()->orderBy('created_at', 'desc')->where('status', 1)->paginate(12);
        $brands = Brand::where('status', 1)->get();
        return view('pages.products.index', compact('products', 'brands', 'category'));
    }

    public function show($category, $slug)
    {
        $products = Product::where('status', 1)->get();
        $product = Product::where('slug->' . LaravelLocalization::getCurrentLocale(), $slug)->first();
        return view('pages.products.show', compact('product', 'products'));
    }

    public function filter(Request $request, $category)
    {
        $category = Collection::where('slug->' . LaravelLocalization::getCurrentLocale(), $category)->first();
        $query = Product::query()->where('status', 1)->where('collection_id', $category->id);
        if ($request->gender && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }

        if ($request->brand && $request->brand !== 'all') {
            $query->where('brand_id', $request->brand);
        }

        $products = $query->paginate(12);

        return view('pages.products.index', compact('products', 'category'));
    }
}
