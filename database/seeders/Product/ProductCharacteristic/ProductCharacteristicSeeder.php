<?php

namespace Database\Seeders\Product\ProductCharacteristic;

use App\Models\Locale;
use App\Models\Product\Characteristic\ProductCharacteristic;
use App\Models\Product\Characteristic\ProductCharacteristicLocal;
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
        $products_ids = Product::pluck('id')->toArray();
        $local = Locale::where("slug", "ru")->first();
        $this->call(ProductCharacteristicTitleSeeder::class);

        foreach($products_ids as $products_id)
        {
            for($i = 0; $i < rand(3, 10); $i++)
            {
                $is_text = (rand(0, 100) < 80 ? 1 : 0);
                $productCharacteristicFactory = ProductCharacteristic::factory(1);

                if($is_text)
                {
                    $productCharacteristicFactory->has(ProductCharacteristicLocal::factory(1)
                        ->state(function (array $attributes, ProductCharacteristic $product_characteristic) use ($local) {
                            return [
                                'locale_id' => $local->id,
                                'product_characteristic_id' => $product_characteristic->id
                            ];
                        }),
                        'locale'
                    )->create([
                        "product_id" => $products_id
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
