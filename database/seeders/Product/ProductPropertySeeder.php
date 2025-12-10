<?php

namespace Database\Seeders\Product;

use App\Models\Product\Product;
use App\Models\Product\ProductProperty;
use App\Models\Property\Property;
use App\Models\Property\PropertyValue;
use Database\Seeders\Property\PropertyCategorySeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $propertis = Property::get();

        foreach($propertis as $property)
        {
            $products = Product::with("categories")->inRandomOrder()->limit(15)->get();
            $category_ids = $products->pluck('categories.*.category_id')->flatten()->unique()->values();
            $type = (($property->unit_id && rand(0, 100) > 70) ? "float" : "text");

            $property_values = PropertyValue::where("type", $type)->inRandomOrder()->limit(10)->pluck("id");

            foreach($products as $product)
            {
                ProductProperty::insertOrIgnore([
                    "property_id" => $property->id,
                    "product_id" => $product->id,
                    "property_value_id" => $property_values->random()
                ]);
            }

            $this->callSilent(PropertyCategorySeeder::class, [
                'parameters' => [
                    'category_ids' => $category_ids,
                    'property_id' => $property->id
                ]
            ]);
        }
    }
}
