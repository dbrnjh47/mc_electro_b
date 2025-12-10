<?php

namespace Database\Seeders\Unit;

use App\Models\Unit\Unit;
use App\Models\Unit\UnitRule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = Unit::get()->shuffle();

        $units->chunk(2)->each(function ($pair) {
            if ($pair->count() === 2 && rand(1, 100) > 20) {
                $pair = $pair->values();

                UnitRule::factory(1)->create([
                    "action" => (rand(0, 100) > 50 ? "/" : "*"),
                    "unit_id" => $pair[0]->id,
                    "to_unit_id" => $pair[1]->id,
                ]);
            }
        });
    }
}
