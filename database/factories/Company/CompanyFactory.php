<?php

namespace Database\Factories\Company;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company\Company>
 */
class CompanyFactory extends Factory
{
    public $previews = [1,2,3,4,5,6,7,8,9,10];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "preview" => ((rand(0, 100) < 80) ? array_rand($this->previews).".svg" : null),
            "name" => fake()->text(rand(5, 20)),
            "slug" => fake()->unique()->slug(rand(1, 15)),
            "phone" => ((rand(0, 100) < 80) ? fake()->e164PhoneNumber() : null),
            "email" => ((rand(0, 100) < 80) ? fake()->email() : null),
            "is_on" => rand(0,1),
        ];
    }
}
