<?php

namespace Database\Seeders\Product\ProductCharacteristic;

use App\Models\Locale;
use App\Models\Product\Characteristic\ProductCharacteristicTitle;
use App\Models\Product\Characteristic\ProductCharacteristicTitleLocal;
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
        $local = Locale::where("slug", "ru")->first();

        foreach($unit_rules as $unit_rule)
        {
            ProductCharacteristicTitle::factory(1)
                ->has(ProductCharacteristicTitleLocal::factory(1)
                    ->state(function (array $attributes, ProductCharacteristicTitle $title) use ($local) {
                        return [
                            'locale_id' => $local->id,
                            'product_characteristic_title_id' => $title->id
                        ];
                    }),
                    'locale'
                )
                ->create([
                    "unit_id" => $unit_rule->unit_id,
                    "to_unit_id" => $unit_rule->to_unit_id,
                ]);
        }

        ProductCharacteristicTitle::factory(15)
                ->has(ProductCharacteristicTitleLocal::factory(1)
                    ->state(function (array $attributes, ProductCharacteristicTitle $title) use ($local) {
                        return [
                            'locale_id' => $local->id,
                            'product_characteristic_title_id' => $title->id
                        ];
                    }),
                    'locale'
                )
                ->create();

    }
}
