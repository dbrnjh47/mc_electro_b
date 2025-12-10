<?php

namespace Database\Factories\Property;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property\PropertyValue>
 */
class PropertyValueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public $types = ['text', 'float'];
    public function definition(): array
    {
        $type = $this->types[array_rand($this->types)];
        return [
            "value" => ($type == 'text' ? $this->faker->unique()->words(rand(1,2), true) : null),
            "number" => ($type == 'float' ? $this->faker->randomFloat(15, 0.0000000001, 10000) : null),
            "type" => $type,
        ];
    }
}
