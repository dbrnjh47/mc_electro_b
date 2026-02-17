<?php

namespace App\Http\Services\DeliveryMethod\AddInfo;

use App\Http\Services\DeliveryMethod\DeliveryMethodService;
use App\Models\Point\Point;

class PickupAddInfo
{
    public function start($cart, $delivery_method)
    {
        $point = null;

        if($cart->point_id)
        {
            $point = (new DeliveryMethodService)
                ->getPoint()
                ->find($cart->point_id);
        }

        if(!$point && !isset($delivery_method->default_point->city_id))
        {
            $point = Point::find($delivery_method->default_point->id);
        }

        $delivery_method->default_point = $point;
        $cart->address = $delivery_method->default_point->address;
        $cart->point_id = $delivery_method->default_point->id;
    }
}
