<?php

namespace App\Http\Controllers;

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

    public function all()
    {
        $title = "Контакты";
        $description = "";
        $points = (new PointModelService)->pagination();
        if($points->isEmpty()){abort("404");}
        // dd($points);
        $breadcrumbs = $this->getBreadcrumbs();

        return view('sample.main.pages.сontact.index', compact("title", "description", "points", "breadcrumbs"));
    }

    public function show(Request $request)
    {
        $point = (new PointModelService)->find($request->id);
        dd($point);
        //

        $title = "Точка";
        $description = "";

        //
        $breadcrumbs = $this->getBreadcrumbs();
        $breadcrumbs->add("Контакт ");

        return view('sample.main.pages.сontact.one', compact("title", "description", "breadcrumbs"));
    }
}
