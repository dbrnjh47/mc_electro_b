<?php

namespace Database\Factories\Property;

use App\Models\Property\PropertySection;
use App\Models\Property\PropertyType;
use App\Models\Unit\UnitRule;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $unit_rule = (rand(0, 100) > 50 ? UnitRule::first() : null);

        return [
            "title" => $this->faker->text(rand(10, 20)),
            "ordering" => $this->faker->randomFloat(
                2,           // количество знаков после запятой
                1,           // минимальное значение
                999         // максимальное значение
            ),
            "is_on" => rand(0, 1),
            "property_type_id" => (rand(0, 100) > 50 ? PropertyType::inRandomOrder()->first()->id: null),
            "property_section_id" => (rand(0, 100) > 50 ? PropertySection::inRandomOrder()->first()->id : null),
            "unit_id" => ($unit_rule ? $unit_rule->unit_id : null),
            "to_unit_id" => ($unit_rule ? $unit_rule->to_unit_id : null),
        ];
    }
}
