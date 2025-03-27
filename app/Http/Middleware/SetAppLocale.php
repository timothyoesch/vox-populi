<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class SetAppLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->cookie("lang")) {
            $lang = $request->getPreferredLanguage(["de", "fr", "it"]);
        } else {
            $lang = explode("|", Crypt::decryptString(Cookie::get('lang')))[1];
        }
        app()->setLocale($lang);
        return $next($request);
    }
}
