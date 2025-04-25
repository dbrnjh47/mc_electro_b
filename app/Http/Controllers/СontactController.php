<?php

namespace App\Http\Controllers;

use App\Http\Services\Models\PointModelService;

class СontactController extends Controller
{
    public function getBreadcrumbs()
    {
        return [
            [
                "href" => route("contacts"),
                "text" => "Контакты"
            ],
        ];
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

    public function show()
    {
        return view('sample.main.pages.сontact.one', ['title' => "Точка", 'description' => ""]);
    }
}
