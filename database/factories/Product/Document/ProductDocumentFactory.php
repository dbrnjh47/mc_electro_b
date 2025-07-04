<?php

namespace Database\Factories\Product\Document;

use App\Models\Locale;
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
        $local = Locale::inRandomOrder()->where("is_configured", 1)->first();
        return [
            "title" => $local->slug."_".fake()->text(10),
            "name" => "test.pdf",
            "locale_id" => $local->id,
            "product_id" => Product::inRandomOrder()->where("id", "!=", 1)->first()->id,
        ];
    }
}
