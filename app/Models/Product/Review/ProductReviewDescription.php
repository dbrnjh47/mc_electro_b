<?php

namespace App\Models\Product\Review;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReviewDescription extends Model
{
    /** @use HasFactory<\Database\Factories\Product\Review\ProductReviewDescriptionFactory> */
    use HasFactory;
    public $types = ['comment', 'flaw', 'dignity'];
}
