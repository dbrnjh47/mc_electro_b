<?php

namespace Database\Seeders;

use App\Models\Point\Link\PointLinkCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PointLinkCategorySeeder extends Seeder
{
    public $types = [
        [
            "type" => "google",
            "title" => "Google"
        ],
        [
            "type" => "yandex",
            "title" => "Yandex"
        ],
        [
            "type" => "gis",
            "title" => "2GIS"
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->types as $type)
        {
            PointLinkCategory::factory(1)->create($type);
        }
    }
}
