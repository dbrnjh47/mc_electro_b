<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    public $currencies = [
        [
            "currency" => "RUB",
            "icon" => "₽",
            "img" => null,
            "to" => 0.01
        ],
        [
            "currency" => "USD",
            "icon" => "$",
            "img" => null,
        ],
        [
            "currency" => "EUR",
            "icon" => "€",
            "to" => 1.07,
            "img" => null,
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->currencies as $currencie)
        {
            Currency::factory(1)->create($currencie);
        }
    }
}
