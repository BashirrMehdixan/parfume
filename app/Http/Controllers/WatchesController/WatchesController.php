<?php

namespace App\Http\Controllers\WatchesController;

use App\Http\Controllers\Controller;
use App\Models\Watch;
use App\Models\WatchCategory;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class WatchesController extends Controller
{
    public function index()
    {
        $watches = Watch::where('status', 1)->get();
        $watchCategories = WatchCategory::where('status', 1)->get();
        return view('pages.watches.index', compact('watches', 'watchCategories'));
    }

    public function show($slug)
    {
        $watch = Watch::where('slug->' . LaravelLocalization::getCurrentLocale(), $slug)->first();
        $wCategories = WatchCategory::where('status', 1)->get();
        return view('pages.watches.show', compact('watch', 'wCategories'));
    }
}
