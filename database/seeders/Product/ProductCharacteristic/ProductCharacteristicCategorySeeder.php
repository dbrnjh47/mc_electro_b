<?php

namespace Database\Seeders\Product\ProductCharacteristic;

use App\Models\Product\Characteristic\ProductCharacteristicCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCharacteristicCategorySeeder extends Seeder
{
    public $titles = ["Технические характеристики", "Может что-то ещё"];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->titles as $title)
        {
            ProductCharacteristicCategory::factory(1)->create([
                "title" => $title
            ]);
        }
    }
}
