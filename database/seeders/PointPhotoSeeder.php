<?php

namespace Database\Seeders;

use App\Models\Point\PointPhoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PointPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PointPhoto::factory(rand(5, 20))
            ->create();
    }
}
