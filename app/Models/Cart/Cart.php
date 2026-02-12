<?php

namespace App\Models\Cart;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\Cart\CartFactory> */
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(
            Product::class,          // Целевая модель
            (new CartProduct())->getTable(),     // Промежуточная таблица
        )->withPivot('count')
        ->orderByPivot('updated_at', 'desc');
    }
}
