<?php

namespace App\Http\Services\DeliveryMethod\Modal;

use App\Http\Filters\PointFilter;
use App\Http\Standards\PointStandard;
use App\Models\Point\Point;

class PickupModal
{
    public $limit = 10;
    public function start($delivery_method, $cart)
    {
        $points = $this->getPoints();
        if($points->isEmpty())
        {
            return null;
        }

        return view('sample.main.pages.cart.components.modal.point',
            compact(
                "points",
                "delivery_method",
                "cart"
            )
        );
    }

    public function getPoints($search = null, $page = 1)
    {
        $city_id = (app()->user_city ? app()->user_city->id : 0);
        if(!$city_id){return null;}

        $pointStandard = app()->make(PointStandard::class, ['params' => [
            "is_on" => 1,
            "is_pickup" => 1
        ]]);

        //

        $pointFilter = app()->make(PointFilter::class, ['params' => [
            "city_id" => $city_id
        ]]);

        $points = Point::standard($pointStandard)
            ->filter($pointFilter)
            ->paginate(10, page:$page);

        return $points;
    }
}
