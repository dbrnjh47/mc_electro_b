<?php

namespace App\Http\Services\DeliveryMethod\Exception;

use App\Http\Filters\PointFilter;
use App\Http\Services\DeliveryMethod\DeliveryMethodService;
use App\Http\Standards\PointStandard;
use App\Models\Point\Point;
use stdClass;

class PickupException
{
    public function start($delivery_method)
    {
        $point = (new DeliveryMethodService())->getPoint();
        if (!$point) {
            return null;
        }
        $point_id = $point->value((new Point())->getTable() . ".id");

        if (!$point_id) {
            $delivery_method = null;
        } else {
            $delivery_method->default_point = new stdClass();
            $delivery_method->default_point->id = $point_id;
        }


        return $delivery_method;
    }
}
