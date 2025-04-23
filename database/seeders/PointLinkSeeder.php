<?php

namespace Database\Seeders;

use App\Models\Point\Point;
use App\Models\Point\Link\PointLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PointLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $points = Point::select("id")->where("id", "!=", 1)->get();

        foreach($points as $point)
        {
            PointLink::factory(1)->create([
                "point_id" => $point->id
            ]);
        }
    }
}
