<?php

namespace Database\Seeders\Unit;

use App\Models\Unit\Unit;
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
        foreach($this->data as $value)
        {
            $unit = Unit::create(["text" => $value]);
        }

        $this->call(UnitRuleSeeder::class);
    }
}
