<?php

namespace Database\Seeders;

use App\Models\Country\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = json_decode(file_get_contents(base_path('vendor/mledoze/countries/dist/countries-unescaped.json')), true);

        foreach ($countries as $country) {
            $country_info  = collect($country["translations"])
                    ->first(function ($value, $key) {
                        return str_starts_with($key, "ru");
                    });

            $c = Country::create([
                "cca2" => $country["cca2"],
                "code" => ($country["ccn3"] && $country["ccn3"] != "" ? $country["ccn3"] : null),
                "is_on" => true,
                "lat" => $country["latlng"][0],
                "lon" => $country["latlng"][1],
                "name" => ($country_info && $country_info["common"] ? $country_info["common"] : $country["name"]["common"]),
                "official" => ($country_info && $country_info["official"] ? $country_info["official"] : $country["name"]["official"]),
            ]);
        }
    }
}
