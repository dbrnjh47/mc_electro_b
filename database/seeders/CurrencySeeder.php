<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class CurrencySeeder extends Seeder
{
    public $currencies = [
        [
            "abbreviation" => "RUB",
            "icon" => "₽",
            "img" => null,
            "to" => 0.01
        ],
        [
            "abbreviation" => "USD",
            "icon" => "$",
            "img" => null,
        ],
        [
            "abbreviation" => "EUR",
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
        Artisan::call('app:update-currencies-сommand');
    }
}
