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
            "in" => "https://instagram.com/",
            "vk" => "https://vk.com/",
            "yt" => "https://www.youtube.com/",
            "tg" => "https://t.me/",
            "name" => "IMPYREX",
            "abbreviation" => "IM",
            "email" => "temple@mail.com",
            "phone" => "+954637592634",
            "address" => null,
        ]);
    }
}
