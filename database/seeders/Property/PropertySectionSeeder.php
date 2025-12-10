<?php

namespace Database\Seeders\Property;

use App\Models\Property\PropertySection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySectionSeeder extends Seeder
{
    public $titles = ["Технические характеристики", "Может что-то ещё"];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->titles as $title)
        {
            PropertySection::factory(1)->create([
                "title" => $title
            ]);
        }
    }
}
