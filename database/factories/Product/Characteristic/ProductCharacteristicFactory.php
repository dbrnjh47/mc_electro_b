<?php

namespace Database\Factories\Product\Characteristic;

use App\Models\Product\Characteristic\ProductCharacteristicTitle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product\Characteristic\ProductCharacteristic>
 */
class ProductCharacteristicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "product_characteristic_title_id" => ProductCharacteristicTitle::whereNull("unit_id")->inRandomOrder()->first()->id
        ];
    }
}
