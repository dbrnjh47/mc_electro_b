<?php

namespace App\Models\Product\Characteristic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCharacteristicTitle extends Model
{
    /** @use HasFactory<\Database\Factories\Product\Characteristic\ProductCharacteristicTitleFactory> */
    use HasFactory;

    public function local()
    {
        return $this->hasOne(ProductCharacteristicTitleLocal::class, 'id', 'product_characteristic_id');
    }
}
