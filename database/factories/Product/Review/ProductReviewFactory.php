<?php

namespace Database\Factories\Product\Review;

use App\Models\Product\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product\Review\ProductReview>
 */
class ProductReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "quantity" => rand(1, 5),
            "user_id" => User::inRandomOrder()->first()->id,
            // "product_id" => Product::inRandomOrder()->first()->id,
            "is_on" => rand(0, 1),
            "created_at" => $this->faker->dateTimeBetween('-1 year', 'now')
        ];
    }
}
