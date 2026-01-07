<?php

namespace Database\Factories\Banner;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner\Banner>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "is_on" => rand(0,1),
            "key" => "home",
            "img" => "test.png",
            "label" => fake()->text(rand(10, 35)),
        ];
    }
}
