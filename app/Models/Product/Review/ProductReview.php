<?php

namespace App\Models\Product\Review;

use App\Models\User;
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

    public function medias()
    {
        return $this->hasMany(ProductReviewMedia::class, 'product_review_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
