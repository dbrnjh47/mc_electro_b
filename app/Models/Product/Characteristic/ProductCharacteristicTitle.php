<?php

namespace App\Models\Product\Characteristic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCharacteristicTitle extends Model
{
    /** @use HasFactory<\Database\Factories\Product\Characteristic\ProductCharacteristicTitleFactory> */
    use HasFactory;

    public function locale()
    {
        return $this->hasOne(ProductCharacteristicTitleLocal::class, 'id', 'product_characteristic_title_id');
    }
}
