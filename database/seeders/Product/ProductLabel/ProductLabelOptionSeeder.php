<?php

namespace Database\Seeders\Product\ProductLabel;

use App\Models\Product\Label\ProductLabelOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductLabelOptionSeeder extends Seeder
{
    public $labels = ["Распродажа", "Топ"];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->labels as $label)
        {
            ProductLabelOption::factory(1)->create([
                'title' => $label,
            ]);
        }
    }
}
