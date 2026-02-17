<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\DeliveryMethod\ShowRequest;
use App\Http\Services\User\CartService;
use App\Http\Standards\DeliveryMethodStandard;
use App\Models\Order\DeliveryMethod\DeliveryMethod;

class DeliveryMethodController extends Controller
{
    public function showModal(ShowRequest $request)
    {
        $deliveryMethodStandard = app()->make(DeliveryMethodStandard::class, [
            'params' => [
                "is_on" => 1,
                "city_id" => 1,
            ]
        ]);

        $delivery_method = DeliveryMethod::standard($deliveryMethodStandard)->find($request->delivery_method_id);
        if(!$delivery_method){throw new \Exception("Не найден способ доставки");}

        $class = "App\\Http\\Services\\DeliveryMethod\\Modal\\".ucfirst($delivery_method->slug)."Modal";
        if (!class_exists($class)) {
            throw new \Exception("Не найдена функция доставки");
        }

        $cart = (new CartService)->getOnlyCart();
        $exceptionClass = app()->make($class);
        $modal_html = $exceptionClass->start($delivery_method, $cart);

        if (!$modal_html) {
            throw new \Exception("Не найден шаблон");
        }

        return $modal_html;
    }
}
