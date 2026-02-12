<?php

namespace App\Models\Cart;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    /** @use HasFactory<\Database\Factories\Cart\CartProductFactory> */
    use HasFactory;

    protected $guarded = false;

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
