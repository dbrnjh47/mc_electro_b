<?php

namespace Database\Seeders\Product\ProductReview;

use App\Models\Locale;
use App\Models\Product\Product;
use App\Models\Product\ProductDescription;
use App\Models\Product\Review\ProductReview;
use App\Models\Product\Review\ProductReviewDescription;
use App\Models\Product\Review\ProductReviewMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total = Product::count();
        $local = Locale::where("slug", "ru")->first();
        $product_ids = Product::inRandomOrder()
            ->where("id", "!=", 1)
            ->take($total / 2)
            ->pluck('id');
        $product_count = count($product_ids);

        for ($i = 0; $i < $product_count; $i++) {
            ProductReview::factory(rand(1, 2))->has(
                ProductReviewDescription::factory(rand(1,3))
                    ->state(function (array $attributes, ProductReview $product_review)
                    {
                        return [
                            'product_review_id' => $product_review->id
                        ];
                    }),
                'descriptions'
            )
                ->create([
                    "product_id" => $product_ids[$i],
                    "local_id" => $local->id
                ]);
        }
        unset($product_ids);

        $this->call(ProductReviewMediaSeeder::class);
    }
}
