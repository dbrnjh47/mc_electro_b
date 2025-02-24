<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Setting;

use Carbon\Carbon;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::factory(1)->create([
            // "tg" => "https://t.me/impyrex",
            // "in" => "https://www.instagram.com/impyrexrent?igsh=azc5bjhlaDgydGg1&utm_source=qr",
            // "tv" => null,
            // "fb" => null,
            // "wt" => "971568463945",
            // "ti" => "https://www.tiktok.com/@impyrexrent?_t=8kEYQYutybO&_r=1",
            "email" => "manager@impyrex.com",
            "phone" => '+971568463945',
            "address" => null,
        ]);
    }
}
