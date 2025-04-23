<?php

namespace Database\Seeders;

use App\Models\Point\Point;
use App\Models\Point\PointPhone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PointPhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $points = Point::select("id")->where("id", "!=", 1)->get();

        foreach($points as $point)
        {
            PointPhone::factory(rand(1, 3))
                ->create([
                    "point_id" =>  $point->id
                ]);
        }
    }
}
