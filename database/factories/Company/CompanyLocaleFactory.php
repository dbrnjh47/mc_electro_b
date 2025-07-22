<?php

namespace Database\Factories\Company;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company\CompanyLocale>
 */
class CompanyLocaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rand = (rand(0, 100) > 50 ? 1 : 0);
        return [
            "description" => ($rand ? fake()->text(rand(70, 200)) : null),
            "short" => (!$rand ? fake()->text(rand(20, 60)) : null),
        ];
    }
}
