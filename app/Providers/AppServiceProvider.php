<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Brand;
use App\Models\Collection;
use App\Models\Contact;
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
        $contact = Contact::first();
        $brands = Brand::where('status', 1)->get();
        $collections = Collection::where('status', 1)->get();
        view()->share('about', $about);
        view()->share('brands', $brands);
        view()->share('collections', $collections);
        view()->share('contact', $contact);
    }
}
