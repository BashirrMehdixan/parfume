<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $languages = Language::where('status', 1)->pluck('code')->toArray();
        if (in_array($request->segment(1), $languages, true)) {
            App::setLocale($request->segment(1));
            Session::put('locale', $request->segment(1));
        } else {
            App::setLocale('az');
            Session::put('locale', 'az');
        }
        return $next($request);
    }
}
