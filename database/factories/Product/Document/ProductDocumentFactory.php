<?php

namespace Database\Factories\Product\Document;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product\Document\ProductDocument>
 */
class ProductDocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->text(10),
            "name" => "test.pdf",
            "product_id" => Product::inRandomOrder()->where("id", "!=", 1)->limit(1)->first()->id,
        ];
    }
}
