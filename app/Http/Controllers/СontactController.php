<?php

namespace App\Http\Controllers;

use App\Http\Requests\Сontact\FindRequest;
use App\Http\Requests\Сontact\AllRequest;
use App\Http\Services\BreadcrumbService;
use App\Http\Services\Models\CityModelService;
use App\Http\Services\Models\PointModelService;
use Illuminate\Http\Request;

class СontactController extends Controller
{
    public function getBreadcrumbs()
    {
        $breadcrumbs = (new BreadcrumbService);
        $breadcrumbs->add("Контакты", route("contacts"));

        return $breadcrumbs;
    }

    public function getPoints($request)
    {
        $points = (new PointModelService(search:$request->search));

        if(isset($request->city_id))
        {
            $points->where("city_id", $request->city_id);
        }

        $points = $points->pagination($request->page);
        return $points;
    }

    public function all(AllRequest $request)
    {
        $title = "Контакты";
        $description = "";

        $points = $this->getPoints($request);

        if($points->isEmpty()){abort("404");}

        $breadcrumbs = $this->getBreadcrumbs();

        $cities = (new CityModelService(select_list:["id"]))
            ->getModel()
            ->whereHas('points', function ($q) {
                $q = PointModelService::whereOn($q);
            })
            ->get();

        $city_id = ($request->city_id ?? null);

        return view('sample.main.pages.сontact.index', compact("title", "description", "points", "breadcrumbs", "cities", "city_id"));
    }

    public function block(AllRequest $request)
    {
        $points = $this->getPoints($request);
        $html = view('sample.main.pages.сontact.components.cards', compact("points"))->render();
        $pagination = $points->appends(request()->input())->onEachSide(1)->links()->render();

        return [$html, $pagination];
    }

    public function show(FindRequest $request)
    {
        $point = (new PointModelService)->find($request->id);

        //

        $title = "Точка {$point->locale->title}";
        $description = "";

        //
        $breadcrumbs = $this->getBreadcrumbs();
        $breadcrumbs->add("Точка {$point->locale->title}");

        return view('sample.main.pages.сontact.one', compact("title", "description", "breadcrumbs", "point"));
    }
}
