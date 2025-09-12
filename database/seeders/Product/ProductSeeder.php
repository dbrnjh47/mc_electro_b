<?php

namespace Database\Seeders\Product;

use App\Models\Category\Category;
use App\Models\Product\Label\ProductLabel;
use App\Models\Product\Product;
use App\Models\Product\ProductCategory;
use Database\Seeders\Product\ProductCharacteristic\ProductCharacteristicSeeder;
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
            Product::factory(rand(1, 30))->has(
                ProductLabel::factory(rand(1, 2))
                    ->state(function (array $attributes, Product $product)  {
                        return [
                            'product_id' => $product->id,
                        ];
                    }),
                'labels'
            )->has(
                ProductCategory::factory(rand(1, 3))
                    ->state(function (array $attributes, Product $product)  {
                        return [
                            'product_id' => $product->id,
                        ];
                    }),
                'categories'
            )->create();
        }

        $this->call(ProductMediaSeeder::class);
        $this->call(ProductDocumentSeeder::class);
        $this->call(ProductCharacteristicSeeder::class);
        $this->call(ProductReviewSeeder::class);
        $this->call(ProductPointSeeder::class);

        ProductLabel::where("product_id", 1)->delete();
    }
}
