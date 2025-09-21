<?php

namespace App\Http\Controllers;

use App\Http\Requests\City\GetRequest;
use App\Http\Requests\City\SetRequest;
use App\Http\Services\City\IndexService as CityService;
use App\Http\Services\Currency\CurrencyService;
use App\Http\Services\Models\CityModelService;
use Illuminate\Http\Request;

class CityController
{
    public function get(GetRequest $request)
    {
        $page = $request->get('page', 1);

        $q = (new CityModelService(["id", "name as text"]));

        if ($request->search && $request->search != "") {
            $q->where('name', 'like', "%{$request->search}%");
        }

        $cities = $q->paginate($page);

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
