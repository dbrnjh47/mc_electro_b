<?php

namespace App\Http\Middleware;

use App\Http\Services\City\IndexService as CityService;
use App\Http\Services\Models\CityModelService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\City\City;

class CityMiddleware
{
    /** https://laravel.com/docs/12.x/middleware
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $part = $request->segment(1);
        $city = (new CityModelService)->firstBySlug($part);

        if($city)
        {
            // (new CityService)->setCookie($city->id);
            $newUrl = str_replace('/'.$part, '', $request->getRequestUri());
            return redirect($newUrl, 301)
                ->cookie((new CityService)->key, $city->id, (new CityService)->life_time);
        }

        return $next($request);
    }
}
