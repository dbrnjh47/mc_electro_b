<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public $banners = [
        // [
        //     "img" => 'test.svg',
        //     "href" => '/',
        //     "locale_id" => 3,
        //     "is_on" => 1
        // ],
        [
            "img" => '1.webp',
            "href" => '/',
        ],
        [
            "img" => '2.webp',
            "href" => '/',
        ],
        [
            "img" => '3.webp',
            "href" => '/',
            "is_on" => 1
        ],
        [
            "img" => '3.webp',
            "href" => '/',
            "is_on" => 0
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->banners as $banner)
        {
            Banner::factory(1)->create($banner);
        }
    }
}
