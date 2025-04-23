<?php

namespace Database\Factories\Point;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Point>
 */
class PointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "lon" => $this->faker->longitude,
            "lat" => $this->faker->latitude,
            "email" => (rand(0, 10) > 5 ? fake()->unique()->safeEmail() : null),
            "is_on" => rand(0, 1),
        ];
    }
}
