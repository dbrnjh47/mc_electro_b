<?php

namespace Database\Seeders\Property;

use App\Models\Property\PropertyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    public $types = ['checkbox', 'select', 'range', 'radio', 'select_list'];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->types as $type)
        {
            PropertyType::factory(1)->create([
                "type" => $type
            ]);
        }
    }
}
