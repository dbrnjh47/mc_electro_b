<?php

namespace Database\Factories\Product\Review;

use App\Models\Product\Review\ProductReviewDescription;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product\Review\ProductReviewDescription>
 */
class ProductReviewDescriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = (new ProductReviewDescription)->types;

        return [
            "text" => fake()->text(rand(5, 200)),
            "type" => $types[rand(0, 2)]
        ];
    }
}
