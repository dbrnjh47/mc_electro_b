<?php

namespace App\Http\Middleware;

use App\Http\Filters\CityFilter;
use App\Http\Services\City\IndexService as CityService;
use App\Http\Standards\CityStandard;
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
        if(!$part){return $next($request);}

        $cityStandard = app()->make(CityStandard::class, [
            'params' => [
                "is_on" => 1,
            ],
        ]);

        $cityilter = app()->make(CityFilter::class, ['params' => [
            "slug" => $part
        ]]);

        $city = City::standard($cityStandard)
            ->filter($cityilter)
            ->select(["id"])
            ->first();

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
