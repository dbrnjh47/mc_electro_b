<?php

namespace Database\Seeders;

use App\Models\Point\Point;
use App\Models\Point\PointLocale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Point::factory(20)
            ->create();

        $point = Point::find(1);
        $point->is_on = 1;
        $point->save();
        //
        $this->call(PointPhotoSeeder::class);
        $this->call(PointPhoneSeeder::class);
        //
        $this->call(PointLinkCategorySeeder::class);
        $this->call(PointLinkSeeder::class);
    }
}
