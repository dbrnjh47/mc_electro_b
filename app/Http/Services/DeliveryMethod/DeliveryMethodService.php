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
            ->with([
                'delivery_payments' => function ($q) {
                    $q->with([
                        "person" => function ($q2) {
                            $q2->select("id", "person");
                        },
                    ]);
                }
            ])
            ->get();

        return $delivery_methods;
    }

    public function format($delivery_methods)
    {
        $result = $delivery_methods->toArray();
        foreach($result as $key => $delivery_method)
        {
            unset($result[$key]["created_at"], $result[$key]["updated_at"], $result[$key]["is_on"]);
            $result[$key]["delivery_payments"] = collect($result[$key]['delivery_payments'])
            ->groupBy('person.person')
            ->map(function ($items, $personType) {
                return $items->pluck('payment_id')->toArray();
            })
            ->toArray();
        }

        return $result;
    }
}
