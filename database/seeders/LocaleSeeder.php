<?php

namespace Database\Seeders;

use App\Models\Locale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class LocaleSeeder extends Seeder
{
    public $languages = [
        [
            "slug" => "ru",
            "text" => "Русский",
            "is_configured" => true,
            "icon" => "russian-federation.svg",
            "hreflang" => "ru-ae"
        ],
        // [
        //     "slug" => "hi",
        //     "text" => "हिंदी",
        //     "icon" => "india.svg",
        //     "hreflang" => ""
        // ],
        // [
        //     "slug" => "ja",
        //     "text" => "日本語",
        //     "icon" => "japan.svg",
        //     "hreflang" => ""
        // ],
        // [
        //     "slug" => "ms",
        //     "text" => "Melayu",
        //     "icon" => "malaysia.svg",
        //     "hreflang" => ""
        // ],
        [
            "slug" => "en",
            "text" => "English",
            "is_configured" => true,
            "icon" => "united-kingdom.svg",
            "hreflang" => "en-ae"
        ],
        // [
        //     "slug" => "ar",
        //     "text" => "عرب",
        //     "icon" => "united-arab-emirates.svg",
        //     "hreflang" => "ar-ae"
        // ],
        // [
        //     "slug" => "fa",
        //     "text" => "فارسی",
        //     "icon" => "iran.svg",
        //     "hreflang" => ""
        // ],
        // [
        //     "slug" => "ur",
        //     "text" => "اردو",
        //     "icon" => "pakistan.svg",
        //     "hreflang" => ""
        // ],
        // [
        //     "slug" => "zh",
        //     "text" => "中國人",
        //     "icon" => "china.svg",
        //     "hreflang" => "zh-ae"
        // ],
        // [
        //     "slug" => "bn",
        //     "text" => "বাংলা",
        //     "icon" => "bangladesh.svg",
        //     "hreflang" => ""
        // ],
        // [
        //     "slug" => "it",
        //     "text" => "Italiano",
        //     "icon" => "italy.svg",
        //     "hreflang" => "it-ae"
        // ],
        // [
        //     "slug" => "fr",
        //     "text" => "Français",
        //     "icon" => "france.svg",
        //     "hreflang" => "fr-ae"
        // ],
        // [
        //     "slug" => "pt",
        //     "text" => "Português",
        //     "icon" => "portugal.svg",
        //     "hreflang" => ""
        // ],
        // [
        //     "slug" => "ko",
        //     "text" => "한국인",
        //     "icon" => "korean.svg",
        //     "hreflang" => ""
        // ],
        // [
        //     "slug" => "gu",
        //     "text" => "ગુજરાતી",
        //     "icon" => "comoros.svg",
        //     "hreflang" => ""
        // ],
        // [
        //     "slug" => "es",
        //     "text" => "Español",
        //     "icon" => "spain.svg",
        //     "hreflang" => "es-ae"
        // ],
        // [
        //     "slug" => "pnb",
        //     "text" => "Лахнда",
        //     "icon" => "lahnda.svg",
        //     "hreflang" => ""
        // ],
        // [
        //     "slug" => "tr",
        //     "text" => "Türkçe",
        //     "icon" => "turkey.svg",
        //     "hreflang" => "tr-ae"
        // ],
        // [
        //     "slug" => "ta",
        //     "text" => "தமிழ்",
        //     "icon" => "Tamil2.svg",
        //     "hreflang" => ""
        // ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->languages as $language)
        {
            Locale::factory(1)->create($language);
        }
    }
}
