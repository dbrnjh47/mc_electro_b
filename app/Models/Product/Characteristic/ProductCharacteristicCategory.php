<?php

namespace App\Models\Product\Characteristic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCharacteristicCategory extends Model
{
    /** @use HasFactory<\Database\Factories\Product\Characteristic\ProductCharacteristicCategoryFactory> */
    use HasFactory;

    public function locale()
    {
        return $this->hasOne(ProductCharacteristicCategoryLocal::class, 'product_characteristic_category_id', 'id');
    }
}
