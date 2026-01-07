<?php

namespace Database\Seeders;

use App\Models\Banner\Banner;
use App\Models\Banner\BannerCity;
use App\Models\City\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public $banners = [
        // [
        //     "img" => 'test.svg',
        //     "href" => '/',
        //     "is_on" => 1
        // ],
        [
            "img" => '3.webp',
            "key" => 'home',
            "is_on" => 1,
        ],
        [
            "img" => '1.webp',
            "key" => 'home',
            "href" => "/",
        ],
        [
            "img" => '2.webp',
            "key" => 'home',
            "href" => "/",
        ],
        [
            "img" => '3.webp',
            "key" => 'home',
            "is_on" => 0,
            "href" => "/",
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->banners as $banner)
        {
            Banner::factory(1)
            ->afterCreating(function (Banner $banner) {
                $count = rand(1, 3);
                $city_ids = City::where("is_on", 1)->limit($count)->pluck("id");

                foreach($city_ids as $city_id)
                {
                    BannerCity::insertOrIgnore([
                        "city_id" => $city_id,
                        "banner_id" => $banner->id,
                    ]);
                }

            })->create($banner);
            BannerCity::where("banner_id", 1)->delete();
        }
    }
}
