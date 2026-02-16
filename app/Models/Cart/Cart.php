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

    public function formatToBasket()
    {
        $result = $this->toArray();
        unset(
            $result["created_at"],
            $result["updated_at"],
            $result["user_id"],
        );

        if($result["products"])
        {
            $productsCollection = collect($result['products']);

            $result["products"] = $productsCollection
            ->keyBy('id')
            ->map(function ($product) {
                return [
                    'id' => $product['id'],
                    'mrp' => $product['mrp'],
                    'step' => $product['step'],
                    'weight' => $product['weight'],
                    'point_count' => $product['point_count'],
                    'count' => $product['pivot']['count'] ?? 0
                ];
            })
            ->toArray();

            $result['product_price_sum'] = $productsCollection->sum(function ($product) {
                return $product['mrp'] * ($product['pivot']['count'] ?? 0);
            });
            $result['product_weight_sum'] = $productsCollection->sum(function ($product) {
                return $product['weight'] ?? 0;
            });
            $result['product_count'] = $productsCollection->sum(function ($product) {
                return $product['pivot']['count'] ?? 0;
            });
        } else {
            $result['product_price_sum'] = 0;
            $result['product_count'] = 0;
            $result['product_weight_sum'] = 0;
        }
        return $result;
    }
}
