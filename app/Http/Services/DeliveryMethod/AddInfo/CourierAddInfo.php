<?php

namespace App\Http\Services\DeliveryMethod\AddInfo;

use App\Models\Cart\DeliveryMethod\CartCourier;
use App\Models\Order\DeliveryMethod\DeliveryMethodCourier;

class CourierAddInfo
{
    public function start($cart, $delivery_method)
    {
        $delivery_method->courier = CartCourier::select("city", "city_id", "street", "house", "apartment")
            ->where("cart_id", $cart->id)->first();
        $cart->address = $delivery_method->courier->getFullAddress();
    }
}
