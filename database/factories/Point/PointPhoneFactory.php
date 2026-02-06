<?php

namespace Database\Factories\Point;

use App\Models\Point\Point;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Point\PointPhone>
 */
class PointPhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "phone" => fake()->unique()->e164PhoneNumber(),
            'point_id' => Point::inRandomOrder()->where("id", "!=", 1)->limit(1)->first()->id,
        ];
    }
}
