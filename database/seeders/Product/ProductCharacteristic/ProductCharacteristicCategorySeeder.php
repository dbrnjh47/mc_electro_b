<?php

namespace Database\Seeders\Product\ProductCharacteristic;

use App\Models\Locale;
use App\Models\Product\Characteristic\ProductCharacteristicCategory;
use App\Models\Product\Characteristic\ProductCharacteristicCategoryLocal;
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
            $product_characteristic_category = ProductCharacteristicCategory::create();
            $local = Locale::where("slug", "ru")->first();
            ProductCharacteristicCategoryLocal::factory(1)->create([
                "title" => $title,
                "locale_id" => $local->id,
                "product_characteristic_category_id" => $product_characteristic_category->id
            ]);
        }
    }
}
