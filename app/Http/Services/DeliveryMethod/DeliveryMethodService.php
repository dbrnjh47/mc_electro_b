<?php

namespace App\Http\Services\DeliveryMethod;

use App\Http\Filters\PointFilter;
use App\Http\Standards\DeliveryMethodStandard;
use App\Http\Standards\PointStandard;
use App\Models\Order\DeliveryMethod\DeliveryMethod;
use App\Models\Point\Point;
use stdClass;

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
            ->with([
                'delivery_payments' => function ($q) {
                    $q->with([
                        "person" => function ($q2) {
                            $q2->select("id", "person");
                        },
                    ]);
                }
            ])
            ->get()
            ->keyBy("slug");
        $delivery_methods = $this->exceptions($delivery_methods);

        return $delivery_methods;
    }

    public function exceptions($delivery_methods)
    {
        foreach($delivery_methods as $key => $delivery_method)
        {
            $class = "App\\Http\\Services\\DeliveryMethod\\Exception\\".ucfirst($delivery_method->slug)."Exception";
            if (!class_exists($class)) {
                continue;
            }

            $exceptionClass = app()->make($class);
            $delivery_method = $exceptionClass->start($delivery_method);

            if($delivery_method)
            {
                $delivery_methods[$key] = $delivery_method;
            } else {
                unset($delivery_methods[$key]);
            }
        }

        return $delivery_methods;
    }

    public function format($delivery_methods)
    {
        foreach ($delivery_methods as $key => $delivery_method) {
            $delivery_methods[$key]["transform_delivery_payments"] = $delivery_methods[$key]['delivery_payments']
                ->groupBy('person.person')
                ->map(function ($items, $personType) {
                    return $items->pluck('payment_id')->toArray();
                })
                ->toArray();
            $delivery_method->makeHidden('delivery_payments');
        }

        $result = $delivery_methods->toArray();
        foreach ($result as $key => $delivery_method) {
            unset($result[$key]["created_at"], $result[$key]["updated_at"], $result[$key]["is_on"]);
        }

        return $result;
    }

    public function setDefault($cart, $delivery_methods)
    {
        $delivery_methods = $delivery_methods->keyBy("slug");

        if (isset($delivery_methods["pickup"]))
        {
            $cart->delivery_method_id = $delivery_methods["pickup"]->id;
            // $cart->point_id = $delivery_methods["pickup"]->default_point->id;
        }
    }

    public function checkDefault($cart, $delivery_methods)
    {
        $current_delivery_method = (
            isset($delivery_methods[$cart->delivery_method_id])
            ? $delivery_methods[$cart->delivery_method_id]
            : null
        );

        if(!$current_delivery_method)
        {
            $cart->address = null;
            $cart->point_id = null;
            $cart->delivery_method_id = null;
            return;
        }

        switch ($current_delivery_method["slug"]) {
            case "pickup":
                $point = $this->getPoint()->find($cart->point_id);
                if(!$point)
                {
                    $cart->point_id = null;
                    $cart->delivery_method_id = null;
                } else {
                    $current_delivery_method->default_point = $point;
                }
                return;
        }
    }

    public function getPoint()
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

        $point = Point::standard($pointStandard)
            ->filter($pointFilter);

        return $point;
    }

    public function addInfo($cart, $delivery_methods)
    {
        $current_delivery_method = $delivery_methods[$cart->delivery_method_id];

        $class = "App\\Http\\Services\\DeliveryMethod\\AddInfo\\".ucfirst($current_delivery_method->slug)."AddInfo";
        if (!class_exists($class)) {
            return;
        }
        $exceptionClass = app()->make($class);
        $exceptionClass->start($cart, $current_delivery_method);
    }
}
