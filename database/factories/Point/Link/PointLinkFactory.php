<?php

namespace Database\Factories\Point\Link;

use App\Models\Point\Point;
use App\Models\Point\Link\PointLinkCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Point\Link\PointLink>
 */
class PointLinkFactory extends Factory
{
    public $urls = [
        "https://2gis.ru/",
        "https://yandex.ru/",
        "https://g.page/mk-elektro-polarnaya"
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $random_key = array_rand($this->urls);

        return [
            "url" => $this->urls[$random_key],
            "point_link_category_id" => PointLinkCategory::inRandomOrder()->limit(1)->first()->id,
            "point_id" => Point::inRandomOrder()->where("id", "!=", 1)->limit(1)->first()->id,
        ];
    }
}
