<?php

namespace App\Http\Controllers;

use App\Http\Filters\PointFilter;
use App\Http\Requests\Contact\FindRequest;
use App\Http\Requests\Contact\AllRequest;
use App\Http\Services\BreadcrumbService;
use App\Http\Standards\CityStandard;
use App\Http\Standards\PointStandard;
use App\Models\City\City;
use App\Models\Point\Point;
use App\View\Components\Sample\Main\Point\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class ContactController extends Controller
{
    public function getBreadcrumbs()
    {
        $breadcrumbs = (new BreadcrumbService);
        $breadcrumbs->add("Контакты", route("contacts"));

        return $breadcrumbs;
    }

    public function getPoints($request)
    {
        $point_standard = app()->make(PointStandard::class, ['params' => [
            "is_on" => 1,
            "is_pickup" => 1
        ]]);
        $point_filter = app()->make(PointFilter::class, ['params' => array_filter($request->all())]);
        $points = Point::standard($point_standard)
            ->filter($point_filter)
            ->with('links.category')
            ->with('phones')
            ->with('photos')
            ->paginate(9, page:$request->page);

        return $points;
    }

    public function all(AllRequest $request)
    {
        $title = "Контакты";
        $description = "";

        $points = $this->getPoints($request);

        if($points->isEmpty()){abort("404");}

        $breadcrumbs = $this->getBreadcrumbs();

        //

        $cityStandard = app()->make(CityStandard::class, [
            'params' => [
                "is_on" => 1,
                "points" => 1
            ],
        ]);

        $cities = City::standard($cityStandard)
            ->select(["id", "name"])
            ->get();

        return view('sample.main.pages.contact.index', compact("title", "description", "points", "breadcrumbs", "cities"));
    }

    public function block(AllRequest $request)
    {
        $points = $this->getPoints($request);
        $html = "";
        foreach($points as $point)
        {
            $html .= Blade::renderComponent(new Card($point));
        }

        $pagination = $points->appends(request()->input())->onEachSide(1)->links()->render();

        return [$html, $pagination];
    }

    public function show(FindRequest $request)
    {
        $point_standard = app()->make(PointStandard::class, ['params' => [
            "is_on" => 1,
            "is_pickup" => 1
        ]]);

        $point = Point::standard($point_standard)
            ->with('links.category')
            ->with('phones')
            ->with('photos')
            ->findOrFail($request->id);

        //

        $title = "Точка {$point->title}";
        $description = "";

        //
        $breadcrumbs = $this->getBreadcrumbs();
        $breadcrumbs->add($point->title);

        return view('sample.main.pages.contact.one', compact("title", "description", "breadcrumbs", "point"));
    }
}
