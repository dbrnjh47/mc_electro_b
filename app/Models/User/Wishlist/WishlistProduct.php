<?php

namespace App\Models\User\Wishlist;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishlistProduct extends Model
{
    /** @use HasFactory<\Database\Factories\User\Wishlist\WishlistProductFactory> */
    use HasFactory;
    protected $guarded = false;

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
