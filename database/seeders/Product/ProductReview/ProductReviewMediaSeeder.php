<?php

namespace Database\Seeders\Product\ProductReview;

use App\Models\Product\Review\ProductReview;
use App\Models\Product\Review\ProductReviewMedia;
use Illuminate\Database\Seeder;

class ProductReviewMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total = ProductReview::count();
        $product_reviews_ids = ProductReview::inRandomOrder()
            ->where("id", "!=", 1)
            ->take($total / 2)
            ->pluck('id');
        $product_reviews_count = count($product_reviews_ids);

        for ($i = 0; $i < $product_reviews_count; $i++) {
            if (rand(0, 100) > 50) {
                ProductReviewMedia::factory(rand(1, 5))
                    ->create([
                        "product_review_id" => $product_reviews_ids[$i],
                    ]);
            }
        }
    }
}
