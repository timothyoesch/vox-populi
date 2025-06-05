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
            $lang = config("app.locales")[
                $request->getHost()
            ] ?? "de";
        } else {
            $lang = $request->cookie("lang");
        }
        if (!in_array($lang, ["de", "fr", "it"])) {
            $lang = "de";
        }
        app()->setLocale($lang);
        return $next($request);
    }
}
