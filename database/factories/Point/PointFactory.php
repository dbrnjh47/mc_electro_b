<?php

namespace Database\Factories\Point;

use App\Models\City\City;
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
            "city_id" => City::inRandomOrder()->first()->id,
            "lon" => $this->faker->longitude,
            "lat" => $this->faker->latitude,
            "email" => (rand(0, 10) > 5 ? fake()->unique()->safeEmail() : null),
            "is_on" => rand(0, 1),
            "yandex_widget_href" => (rand(0, 10) > 5 ? "https://yandex.ru/map-widget/v1/?z=12&ol=biz&oid=64442259794" : null),
        ];
    }
}
