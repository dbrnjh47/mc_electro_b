<?php

namespace App\Http\Controllers\Cart\DeliveryMethod;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\DeliveryMethod\Courier\SetRequest;
use App\Http\Services\User\CartService;
use App\Models\Cart\DeliveryMethod\CartCourier;

class CourierController extends Controller
{
    public function set(SetRequest $request)
    {
        $cart = (new CartService)->getOnlyCart();
        CartCourier::updateOrCreate(
            ['cart_id' => $cart->id],
            $request->validated()
        );

        return;
    }
}
