<?php

namespace Database\Seeders\Product;

use App\Models\Product\Product;
use App\Models\Product\ProductPoint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total = Product::count();
        $product_ids = Product::inRandomOrder()
            ->where("id", "!=", 1)
            ->take($total / 2)
            ->pluck('id');
        $product_count = count($product_ids);
        for ($i = 0; $i < $product_count; $i++) {
            ProductPoint::factory(rand(1, 2))->create([
                "product_id" => $product_ids[$i],
            ]);
        }
        unset($product_ids);

    }
}
