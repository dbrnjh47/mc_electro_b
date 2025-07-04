<?php

namespace Database\Seeders;

use App\Models\Product\Product;
use App\Models\Product\ProductPhoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product_count = Product::count();
        ProductPhoto::factory(($product_count * rand(1, 3)))
            ->create();
    }
}
