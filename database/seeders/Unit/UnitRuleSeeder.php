<?php

namespace Database\Seeders\Unit;

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
        UnitRule::factory(1)->create([
            "action" => "*"
        ]);
        UnitRule::factory(1)->create([
            "action" => "/"
        ]);
    }
}
