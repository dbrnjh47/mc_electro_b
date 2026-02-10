<?php

namespace Database\Seeders\Order\Payment;

use App\Models\Order\Payment\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    public $payments = [
        [
            "title" => "Наличными при получении",
            "slug" => "nal",
            "img" => null,
            "is_on" => 1,
        ],
        [
            "title" => "Банковской картой при получении",
            "slug" => "karta-terminal",
            "img" => null,
            "is_on" => 1
        ],
        [
            "title" => "Оплата по счёту",
            "slug" => "beznal",
            "img" => null,
            "is_on" => 1
        ],
        [
            "title" => "Картой на сайте",
            "slug" => "tinkoff",
            "img" => "card.png", // /temple/images/cart/payments/card.png
            "is_on" => 1
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->payments as $payment)
        {
            Payment::factory(1)
                ->create($payment);
        }
    }
}
