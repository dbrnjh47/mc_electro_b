<?php

namespace Database\Seeders\Product\ProductLabel;

use App\Models\Locale;
use App\Models\Product\Label\ProductLabelOption;
use App\Models\Product\Label\ProductLabelOptionLocal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductLabelOptionSeeder extends Seeder
{
    public $labels = ["Распродажа", "Топ"];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $local = Locale::where("slug", "ru")->first();
        foreach($this->labels as $label)
        {
            ProductLabelOption::factory(1)->has(
                ProductLabelOptionLocal::factory(1)
                    ->state(function (array $attributes, ProductLabelOption $product_label_option) use ($local, $label) {
                        return [
                            'title' => $label,
                            'locale_id' => $local->id,
                            'product_label_option_id' => $product_label_option->id
                        ];
                    }),
                'locale'
            )->create();
        }
    }
}
