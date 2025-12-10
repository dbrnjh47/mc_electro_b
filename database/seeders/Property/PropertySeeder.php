<?php

namespace Database\Seeders\Property;

use App\Models\Property\Property;
use App\Models\Property\PropertyValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(PropertySectionSeeder::class);
        $this->call(PropertyTypeSeeder::class);

        Property::factory(40)->create();

        $this->call(PropertyValueSeeder::class);
    }
}
