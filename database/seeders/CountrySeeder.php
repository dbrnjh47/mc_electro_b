<?php

namespace Database\Seeders;

use App\Http\Services\Models\LocaleModelService;
use App\Models\Country\Country;
use App\Models\Country\CountryLocale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = (new LocaleModelService)->get();
        $countries = json_decode(file_get_contents(base_path('vendor/mledoze/countries/dist/countries-unescaped.json')), true);

        foreach ($countries as $country) {
            $c = Country::create([
                "cca2" => $country["cca2"],
                "code" => ($country["ccn3"] && $country["ccn3"] != "" ? $country["ccn3"] : null),
                "is_on" => true,
                "lat" => $country["latlng"][0],
                "lon" => $country["latlng"][1],
            ]);

            foreach ($locales as $local) {
                $model = new CountryLocale();
                $model->setTable(CountryLocale::$tabel_name . $local->slug);

                $country_info  = collect($country["translations"])
                    ->first(function ($value, $key) use ($local) {
                        return str_starts_with($key, $local->slug);
                    });

                $model->create([
                    "name" => ($country_info && $country_info["common"] ? $country_info["common"] : $country["name"]["common"]),
                    "official" => ($country_info && $country_info["official"] ? $country_info["official"] : $country["name"]["official"]),
                    "country_id" => $c->id
                ]);
            }
        }
    }
}
