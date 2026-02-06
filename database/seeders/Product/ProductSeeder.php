<?php

namespace Database\Seeders\Product;

use App\Models\Category\Category;
use App\Models\Point\Point;
use App\Models\Product\Label\ProductLabel;
use App\Models\Product\Label\ProductLabelOption;
use App\Models\Product\Product;
use App\Models\Product\ProductCategory;
use App\Models\Product\ProductPoint;
use Database\Seeders\Product\ProductLabel\ProductLabelOptionSeeder;
use Database\Seeders\Product\ProductReview\ProductReviewSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::where("id", "!=", 1)->get();
        $this->call(ProductLabelOptionSeeder::class);

        foreach ($categories as $category) {
            Product::factory(rand(10, 30))
                ->afterCreating(function (Product $product) {
                    if(rand(0, 100) > 50){return;}

                    $count = rand(1, 2);

                    for ($i = 0; $i < $count; $i++) {
                        ProductLabel::insertOrIgnore([
                            'product_id' => $product->id,
                            'product_label_option_id' => ProductLabelOption::inRandomOrder()
                                ->limit(1)->first()->id,
                        ]);
                    }
                })
                ->afterCreating(function (Product $product) {
                    $count = rand(0, 3);

                    for ($i = 0; $i < $count; $i++) {
                        $category_id = Category::inRandomOrder()->limit(1)->first()->id;
                        ProductCategory::firstOrCreate([
                            "category_id" => $category_id,
                            "product_id" => $product->id,
                        ],
                        [
                            "category_id" => $category_id,
                            "product_id" => $product->id,
                        ]);

                        // ProductCategory::insertOrIgnore([
                        //     'product_id' => $product->id,
                        //     'category_id' => Category::inRandomOrder()
                        //         ->limit(1)->first()->id,
                        // ]);
                    }
                })
                ->afterCreating(function (Product $product) {
                    $count = rand(0, 2);

                    for ($i = 0; $i < $count; $i++) {
                        // Находим опцию, которая еще не привязана к этому продукту
                        $existingOptionIds = ProductPoint::where('product_id', $product->id)
                            ->pluck('point_id');

                        $option = Point::whereNotIn('id', $existingOptionIds)
                            ->inRandomOrder()
                            ->limit(1)
                            ->first();

                        if ($option) {
                            // Создаем связь
                            ProductPoint::factory(1)->create([
                                'product_id' => $product->id,
                                'point_id' => $option->id,
                            ]);
                        }
                    }
                })
                ->create();
        }

        $this->call(ProductMediaSeeder::class);
        $this->call(ProductDocumentSeeder::class);
        $this->call(ProductReviewSeeder::class);

        $this->call(ProductPropertySeeder::class);

        ProductPoint::where("product_id", 1)->delete();
    }
}
