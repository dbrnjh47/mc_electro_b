<?php

namespace Database\Factories\Product\Review;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product\Review\ProductReviewMedia>
 */
class ProductReviewMediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => (rand(0, 100) > 50 ? "test.mp4" : "test.webp")
        ];
    }
}
