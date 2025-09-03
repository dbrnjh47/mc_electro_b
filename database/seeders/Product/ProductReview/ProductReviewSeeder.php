<?php

namespace Database\Seeders\Product\ProductReview;

use App\Models\Company\Company;
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
                ]);
        }
        unset($product_ids);

        $this->call(ProductReviewMediaSeeder::class);
        $this->setCompanyStatistic();
    }

    public function setCompanyStatistic()
    {
        $companies = Company::select('companies.*')
        ->selectRaw('(
            SELECT COUNT(*)
            FROM product_reviews
            INNER JOIN products ON products.id = product_reviews.product_id
            WHERE product_reviews.is_on = 1 AND products.company_id = companies.id
        ) as total_reviews_count')
        ->selectRaw('(
            SELECT COALESCE(SUM(product_reviews.quantity), 0)
            FROM product_reviews
            INNER JOIN products ON products.id = product_reviews.product_id
            WHERE product_reviews.is_on = 1 AND products.company_id = companies.id
        ) as total_quantity_sum')
        ->get();

        foreach($companies as $company)
        {
            $company->count_reviews = $company->total_reviews_count;
            $company->grade_review = ($company->total_reviews_count > 0 ? ($company->total_quantity_sum / $company->total_reviews_count) : 0);
            $company->save();
        }
    }
}
