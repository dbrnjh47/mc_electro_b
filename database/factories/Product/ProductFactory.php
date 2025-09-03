<?php

namespace Database\Factories\Product;

use App\Models\Company\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "uuid" => fake()->unique()->regexify('[A-Za-z0-9]{'.rand(10, 48).'}'),
            "article" => fake()->unique()->regexify('[A-Za-z0-9]{'.rand(10, 48).'}'),
            "weight" => fake()->randomFloat(4, 1, 100),
            "length" => fake()->randomFloat(4, 1, 100),
            "width" => fake()->randomFloat(4, 1, 100),
            "height" => fake()->randomFloat(4, 1, 100),
            "step" => (rand(1, 100) > 50 ? 100 : 1),
            "mrp" => $this->faker->randomFloat(2, 100, 10000),
            "slug" => fake()->unique()->slug(rand(1, 5)),
            "company_id" => (rand(0, 100) > 50 ? Company::inRandomOrder()->where("id", "!=", 1)->first()->id : null),

            "name" => fake()->text(rand(5, 20))
        ];
    }
}
