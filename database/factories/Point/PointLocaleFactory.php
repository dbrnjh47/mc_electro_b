<?php

namespace Database\Factories\Point;

use App\Models\Point\PointLocale;
use Illuminate\Database\Eloquent\Factories\Factory;

class PointLocaleFactory extends Factory
{
    public function forTable(string $tableName)
    {
        return $this->afterMaking(function (PointLocale $model) use ($tableName) {
            $model->setTable($tableName);
        })->afterCreating(function (PointLocale $model) use ($tableName) {
            $model->setTable($tableName);
        });
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text(10),
            'address' => fake()->address,
            'district' => fake()->streetName,
            'comment' => (rand(0,10) > 7 ? fake()->text(5) : "")
        ];
    }
}
