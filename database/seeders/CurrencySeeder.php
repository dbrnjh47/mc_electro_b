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
            "to" => 0.01,
            "is_on" => 1
        ],
        [
            "abbreviation" => "USD",
            "icon" => "$",
            "img" => null,
            "is_on" => 1
        ],
        [
            "abbreviation" => "EUR",
            "icon" => "€",
            "to" => 1.07,
            "img" => null,
            "is_on" => 1
        ],
    ];

    public $filleds = ["EUR", "USD", "RUB"];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->currencies as $currencie)
        {
            Currency::factory(1)->create($currencie);
        }

        //

        $countries = json_decode(file_get_contents(base_path('vendor/mledoze/countries/dist/countries-unescaped.json')), true);
        foreach ($countries as $country) {
            foreach($country["currencies"] as $slug_currency => $currency)
            {
                if(!in_array($slug_currency, $this->filleds))
                {
                    $this->filleds[] = $slug_currency;
                    Currency::factory(1)->create([
                        "abbreviation" => $slug_currency,
                        "icon" => $currency["symbol"],
                    ]);
                }
            }
        }

        //

        // Artisan::call('app:update-currencies-command');
    }
}
