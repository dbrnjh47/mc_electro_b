<?php

namespace Database\Seeders\Product\ProductCharacteristic;

use App\Models\Product\Characteristic\ProductCharacteristicTitle;
use App\Models\Unit\UnitRule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCharacteristicTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unit_rules = UnitRule::get();

        foreach($unit_rules as $unit_rule)
        {
            ProductCharacteristicTitle::factory(1)
                ->create([
                    "unit_id" => $unit_rule->unit_id,
                    "to_unit_id" => $unit_rule->to_unit_id,
                    "text" => fake()->text(rand(10, 20)),
                ]);
        }

        ProductCharacteristicTitle::factory(15)
                ->create();

    }
}
