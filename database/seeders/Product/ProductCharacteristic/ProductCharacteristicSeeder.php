<?php

namespace Database\Seeders\Product\ProductCharacteristic;


use App\Models\Product\Characteristic\ProductCharacteristic;
use App\Models\Product\Characteristic\ProductCharacteristicTitle;
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
        $products_ids = Product::where("id", "!=", 1)->pluck('id')->toArray();

        $this->call(ProductCharacteristicTitleSeeder::class);

        foreach($products_ids as $products_id)
        {
            for($i = 0; $i < rand(3, 10); $i++)
            {
                $is_text = (rand(0, 100) < 80 ? 1 : 0);
                $productCharacteristicFactory = ProductCharacteristic::factory(1);

                if($is_text)
                {
                    $productCharacteristicFactory->create([
                        "product_id" => $products_id,
                        "text" => fake()->text(rand(5, 10))
                    ]);
                } else {
                    $productCharacteristicFactory->create([
                        "product_id" => $products_id,
                        "product_characteristic_title_id" => ProductCharacteristicTitle::whereNotNull("unit_id")->inRandomOrder()->first()->id,
                        "value" => round(mt_rand(0, 99999999999) / 1000000, rand(1, 6))
                    ]);
                }
            }
        }
    }
}
