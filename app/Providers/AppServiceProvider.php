<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Brand;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $about = About::first();
        $brands = Brand::where('status', 1)->get();
        view()->share('about', $about);
        view()->share('brands', $brands);
    }
}
