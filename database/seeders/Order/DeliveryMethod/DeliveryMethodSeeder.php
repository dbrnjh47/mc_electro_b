<?php

namespace Database\Seeders\Order\DeliveryMethod;

use App\Models\City\City;
use App\Models\Order\DeliveryMethod\DeliveryMethod;
use App\Models\Order\DeliveryMethod\DeliveryMethodCity;
use App\Models\Order\DeliveryMethod\DeliveryMethodPayment;
use App\Models\Order\Payment\Payment;
use App\Models\User\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryMethodSeeder extends Seeder
{
    public $deliveryMethods = [
        [
            "title" => "Самовывоз",
            "slug" => "pickup",
            "description" => null,
            "price" => 0,
            "sum_to_free" => null,
            "is_on" => 1,
            "payments" => [
                "individual" => [
                    "nal",
                    "karta-terminal",
                    "tinkoff"
                ],
                "legal" => [
                    "nal",
                    "beznal"
                ]
            ]
        ],
        [
            "title" => "Доставка по России",
            "slug" => "courier",
            "description" => "От 20 000 руб бесплатно",
            "price" => 1000,
            "sum_to_free" => 20000,
            "is_on" => 1,
            "cities" => ["chelyabinsk", "zlatoust"],
            "payments" => [
                "individual" => [
                    "tinkoff"
                ],
                "legal" => [
                    "beznal"
                ]
            ]
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payments = Payment::pluck('id', 'slug');
        $persons = Person::pluck('id', 'person');

        foreach ($this->deliveryMethods as $deliveryMethod) {
            $deliveryPayments = null;
            if (isset($deliveryMethod["payments"])) {
                $deliveryPayments = $deliveryMethod["payments"];
                unset($deliveryMethod["payments"]);
            }

            $deliveryCities = null;
            if (isset($deliveryMethod["cities"])) {
                $deliveryCities = $deliveryMethod["cities"];
                unset($deliveryMethod["cities"]);
            }

            DeliveryMethod::factory(1)
                ->afterCreating(function (DeliveryMethod $deliveryMethod) use ($payments, $persons, $deliveryPayments) {
                    if (!$deliveryPayments) {
                        return;
                    }
                    foreach ($deliveryPayments as $person => $personDeliveryPayments) {
                        foreach ($personDeliveryPayments as $deliveryPayments) {
                            DeliveryMethodPayment::insertOrIgnore([
                                'delivery_method_id' => $deliveryMethod->id,
                                'payment_id' => $payments[$deliveryPayments],
                                'person_id' => $persons[$person],
                            ]);
                        }
                    }
                })
                ->afterCreating(function (DeliveryMethod $deliveryMethod) use ($deliveryCities) {
                    if (!$deliveryCities) {
                        return;
                    }

                    $cities = City::whereIn("slug", $deliveryCities)->pluck("id");
                    foreach ($cities as $city_id) {
                        DeliveryMethodCity::insertOrIgnore([
                            'delivery_method_id' => $deliveryMethod->id,
                            'city_id' => $city_id,
                        ]);
                    }
                })
                ->create($deliveryMethod);
        }
    }
}
