<?php

namespace App\Http\Controllers\IndexController;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $slides = Slide::orderBy('order')->where('status', 1)->get();
        $products = Product::inRandomOrder()->where('status', 1)->get();
        $bestSell = Product::where('best_selling', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $blogs = Blog::where('status', 1)->take(3)->get();
        return view('pages.index', compact('slides', 'products', 'bestSell', 'brands', 'blogs'));


    }
}
