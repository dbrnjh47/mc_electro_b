<?php

namespace Database\Factories\Point;

use App\Models\City\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class PointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $city_id = City::query();

        if(rand(0, 100) > 50)
        {
            $city_id->where("is_on", 1);
        }

        $city_id = $city_id->inRandomOrder()->limit(1)->first()->id;
        return [
            "city_id" => $city_id,
            "lon" => $this->faker->longitude,
            "lat" => $this->faker->latitude,
            "email" => (rand(0, 10) > 5 ? fake()->unique()->safeEmail() : null),
            "is_on" => rand(0, 1),
            "is_pickup" => rand(0, 1),
            "yandex_widget_href" => (rand(0, 10) > 5 ? "https://yandex.ru/map-widget/v1/?z=12&ol=biz&oid=64442259794" : null),

            'title' => fake()->text(10),
            'address' => fake()->address,
            // 'district' => fake()->streetName,
            'comment' => (rand(0,10) > 7 ? fake()->text(5) : null),
            'description' => (rand(0, 10) > 3 ? fake()->text(rand(50, 100)) : null)
        ];
    }
}
