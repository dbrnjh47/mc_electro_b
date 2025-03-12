<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Services\Locale\IndexServices as LocaleServices;

class LocaleMiddleware
{
    /** https://laravel.com/docs/12.x/middleware
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1);
        if(preg_match('/^[a-zA-Z]{2}$/', $locale))
        {
            $locale = (new LocaleServices)->set($locale, 1);
            $newUrl = str_replace('/'.$locale, '', $request->getRequestUri());
            return redirect($newUrl, 301);
        } else {
            $locale = null;
            $locale = (new LocaleServices)->set($locale, 1);
        }

        return $next($request);
    }
}
