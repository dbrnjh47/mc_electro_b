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
        $rand = (rand(0, 100) > 50 ? 1 : 0);
        return [
            "preview" => ((rand(0, 100) < 80) ? $this->previews[array_rand($this->previews)].".svg" : null),
            "name" => fake()->text(rand(5, 20)),
            "slug" => fake()->unique()->slug(rand(1, 15)),
            "phone" => ((rand(0, 100) < 80) ? fake()->e164PhoneNumber() : null),
            "email" => ((rand(0, 100) < 80) ? fake()->email() : null),
            "is_on" => rand(0,1),

            "description" => ($rand ? fake()->text(rand(70, 200)) : null),
            "short" => (!$rand ? fake()->text(rand(20, 60)) : null),
        ];
    }
}
