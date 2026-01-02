<?php

namespace Database\Seeders;

use App\Http\API\Delivery\CDEKDeliveryApi;
use App\Http\Filters\CountryFilter;
use App\Models\City\City;
use App\Models\Country\Country;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public $cities = [];
    public $on_cities = ["Екатеринбург", "Миасс", "Челябинск", "Магнитогорск", "Златоуст", "Тюмень", "Южно-Сахалинск"];

    public function run(): void
    {
        if(Storage::disk('local')->exists('migrations/cities_backup.json'))
        {
            $contents = Storage::disk('local')->get('migrations/cities_backup.json');
            $this->cities = json_decode($contents, true);
        } else {
            if (Storage::disk('local')->exists('migrations/cities.json')) {
                $contents = Storage::disk('local')->get('migrations/cities.json');
                $this->cities = json_decode($contents, true);
            }

            $this->addCDEK();

            //

            $this->saveBackup();
        }

        foreach($this->cities as $name => $city)
        {
            $city["name"] = $name;
            City::create($city);
        }

        City::whereIn('name', $this->on_cities)->update(['is_on' => 1]);
    }

    public function saveBackup()
    {
        Storage::disk('local')->put('migrations/cities_backup.json', json_encode($this->cities));
    }

    public function addCDEK()
    {
        $results = (new CDEKDeliveryApi())->getCities();
        if(!$results){return;}
        $country_cca2_list = array_unique(array_column($results, 'country_code'));
        $countris = $this->getCountris($country_cca2_list);

        foreach($results as $result)
        {
            $this->cities[$result["city"]] = [
                "lat" => $result["latitude"],
                "lon" => $result["longitude"],
                "fias_guid" => (isset($result["fias_guid"]) ? $result["fias_guid"] : null),
                "time_zone" => $result["time_zone"],
                "country_id" => (isset($result["country_code"]) ? $countris[$result["country_code"]] : null),
            ];
        }
    }

    public function getCountris($country_cca2_list)
    {
        $countryFilter = app()->make(CountryFilter::class, [
            'params' => [
                "cca2_list" => $country_cca2_list,
            ]
        ]);

        $countris = Country::filter($countryFilter)
            ->select(["id", "cca2"])
            ->get();

        $results = [];
        foreach($countris as $country)
        {
            $results[$country->cca2] = $country->id;
        }

        return $results;
    }
}
