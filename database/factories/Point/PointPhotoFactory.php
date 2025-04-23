<?php

namespace Database\Factories\Point;

use App\Models\Point\Point;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Point\PointPhoto>
 */
class PointPhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'point_id' => Point::inRandomOrder()->where("id", "!=", 1)->first()->id,
            'img' => (rand(0,10) > 5 ? "1.png" : "2.png")
        ];
    }
}
