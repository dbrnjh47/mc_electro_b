<?php

namespace Database\Seeders\Product;

use App\Models\Locale;
use App\Models\Product\Product;
use App\Models\Product\ProductDescription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product_ids = Product::where("id", "!=", 1)->pluck('id')->all();
        $local = Locale::where("slug", "ru")->first();

        for($i = 0; $i < count($product_ids); $i++)
        {
            if(rand(0, 100) > 50)
            {
                ProductDescription::factory(1)
                    ->create([
                        "product_id" => $product_ids[$i],
                        'locale_id' => $local->id
                    ]);
            }
        }
    }
}
