<?php

namespace App\Http\Controllers;

use App\Http\Requests\Сontact\FindRequest;
use App\Http\Requests\Сontact\AllRequest;
use App\Http\Services\BreadcrumbService;
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

    public function all(AllRequest $request)
    {
        $title = "Контакты";
        $description = "";
        $points = (new PointModelService($request->search))->pagination();
        if($points->isEmpty()){abort("404");}
        // dd($points);
        $breadcrumbs = $this->getBreadcrumbs();

        return view('sample.main.pages.сontact.index', compact("title", "description", "points", "breadcrumbs"));
    }

    public function block(AllRequest $request)
    {
        $points = (new PointModelService($request->search))->pagination();
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
