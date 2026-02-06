<?php

namespace Database\Factories\Product\Label;

use App\Models\Product\Label\ProductLabelOption;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product\Label\ProductLabel>
 */
class ProductLabelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "product_label_option_id" => ProductLabelOption::inRandomOrder()->limit(1)->first()->id,
        ];
    }
}
