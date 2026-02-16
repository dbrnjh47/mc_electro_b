<?php

namespace App\Http\Services\DeliveryMethod;

use App\Http\Standards\DeliveryMethodStandard;
use App\Models\Order\DeliveryMethod\DeliveryMethod;

class DeliveryMethodService
{
    public function get()
    {
        $deliveryMethodStandard = app()->make(DeliveryMethodStandard::class, [
            'params' => [
                "is_on" => 1,
                "city_id" => 1,
            ]
        ]);

        $delivery_methods = DeliveryMethod::standard($deliveryMethodStandard)
            ->get();

        return $delivery_methods;
    }
}
