<?php

namespace Database\Seeders\Unit;

use App\Models\Locale as ModelsLocale;
use App\Models\Unit\Unit;
use App\Models\Unit\UnitLocal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{

    public $data = [
        "В", "кВт", "м³", "л/ч"
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $local = ModelsLocale::where("slug", "ru")->firstOrFail();
        foreach($this->data as $value)
        {
            $unit = Unit::create();
            UnitLocal::factory(1)->create([
                "text" => $value,
                "locale_id" => $local->id,
                "unit_id" => $unit->id,
            ]);
        }

        $this->call(UnitRuleSeeder::class);
    }
}
