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
            $products = Product::inRandomOrder()->limit(15)->get();
            $type = (($property->unit_id || $property->property_type_id == 3) ? "float" : "text");

            $property_values = PropertyValue::where("type", $type)->inRandomOrder()->limit(10)->pluck("id");

            foreach($products as $product)
            {
                ProductProperty::firstOrCreate([
                    "property_id" => $property->id,
                    "product_id" => $product->id,
                ],
                [
                    "property_id" => $property->id,
                    "product_id" => $product->id,
                    "property_value_id" => $property_values->random()
                ]);
            }
        }
    }
}
