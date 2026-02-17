<?php

namespace App\Http\Services\DeliveryMethod\Modal;

class CourierModal
{
    public function start($delivery_method, $cart)
    {
        return view('sample.main.pages.cart.components.modal.courier',
            compact(
                "delivery_method",
                "cart"
            )
        );
    }
}
