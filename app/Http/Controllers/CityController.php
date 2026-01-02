<?php

namespace App\Http\Controllers;

use App\Http\Filters\CityFilter;
use App\Http\Requests\City\GetRequest;
use App\Http\Requests\City\SetRequest;
use App\Http\Services\City\IndexService as CityService;
use App\Http\Standards\CityStandard;
use App\Models\City\City;

class CityController
{
    public function get(GetRequest $request)
    {
        $page = $request->get('page', 1);

        $cityStandard = app()->make(CityStandard::class, [
            'params' => [
                "is_on" => 1,
            ],
        ]);

        $cityilter = app()->make(CityFilter::class, ['params' => array_filter($request->all())]);

        $cities = City::standard($cityStandard)
            ->filter($cityilter)
            ->select(["id", "name as text"])
            ->paginate(10, page:$page);

        return response()->json([
            'results' => $cities->items(),
            'next' => $cities->nextPageUrl()
        ]);
    }

    public function set(SetRequest $request)
    {
        (new CityService)->setCookie($request->id);
    }
}
