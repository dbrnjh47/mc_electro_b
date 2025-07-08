<?php

namespace Database\Seeders\Product\ProductCharacteristic;

use App\Models\Product\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCharacteristicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(ProductCharacteristicCategorySeeder::class);
        $products_ids = Product::pluck('id')->toArray();

    }
}
