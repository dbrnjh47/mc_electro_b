<?php

namespace App\Models\Product\Review;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    /** @use HasFactory<\Database\Factories\Product\Review\ProductReviewFactory> */
    use HasFactory;

    public function descriptions()
    {
        return $this->hasMany(ProductReviewDescription::class, 'product_review_id', 'id');
    }
}
