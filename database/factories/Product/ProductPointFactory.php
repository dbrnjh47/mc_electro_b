<?php

namespace Database\Factories\Product;

use App\Models\Point\Point;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product\ProductPoint>
 */
class ProductPointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "point_id" => Point::inRandomOrder()->where("id", "!=", 1)->limit(1)->first()->id,
            "count" => rand(1, 1000),
        ];
    }
}
