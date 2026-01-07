<?php

namespace Database\Factories\Category;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = (rand(0, 100) > 20 ? Category::where("id", "!=", 1)->inRandomOrder()->first() : null);
        return [
            "is_on" => rand(0,1),
            "preview" => (rand(0,10) > 7 ? null : "1.png"),
            // "slug" => str_replace('.', '', str_replace(' ', '_', strtolower(fake()->unique()->sentence(rand(1, 3))))),
            "name" => fake()->unique()->sentence(rand(1, 3)),
            "description" => fake()->text(rand(10, 35)),
            "category_parent_id" => (!$category ? null : $category->id),
        ];
    }
}
