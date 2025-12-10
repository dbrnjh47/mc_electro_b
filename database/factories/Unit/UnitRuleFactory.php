<?php

namespace Database\Factories\Unit;

use App\Models\Unit\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit\UnitRule>
 */
class UnitRuleFactory extends Factory
{
    public $actions = ["*", "/"];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "value" => 1000,
            "action" => $this->actions[array_rand($this->actions)]
        ];
    }
}
