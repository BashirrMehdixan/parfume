<?php

namespace App\Http\Controllers\WatchesController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class WatchesController extends Controller
{
    public function index()
    {
        $watches = Product::where('collection_id', 1)->get();
        return view('pages.watches.index', compact('watches'));
    }

    public function show($slug)
    {
        $watch = Product::where('slug->' . LaravelLocalization::getCurrentLocale(), $slug)->first();
        return view('pages.watches.show', compact('watch'));
    }
}
