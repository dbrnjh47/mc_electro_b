<?php

namespace Database\Factories\Property;

use App\Models\Category\Category;
use App\Models\Property\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property\PropertyCategory>
 */
class PropertyCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "property_id" => Property::inRandomOrder()->first()->id,
            "category_id" => Category::inRandomOrder()->first()->id,
        ];
    }
}
