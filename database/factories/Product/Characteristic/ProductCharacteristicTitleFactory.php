<?php

namespace Database\Factories\Product\Characteristic;

use App\Models\Product\Characteristic\ProductCharacteristicCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product\Characteristic\ProductCharacteristicTitle>
 */
class ProductCharacteristicTitleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product_characteristic_category_id = null;
        if(rand(1, 100) > 50)
        {
            $product_characteristic_category_id = ProductCharacteristicCategory::inRandomOrder()->first()->id;
        }
        return [
            "text" => fake()->text(rand(10, 20)),
            "product_characteristic_category_id" => $product_characteristic_category_id
        ];
    }
}
