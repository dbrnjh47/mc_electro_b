<?php

namespace App\Models\Product\Characteristic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCharacteristic extends Model
{
    /** @use HasFactory<\Database\Factories\Product\Characteristic\ProductCharacteristicFactory> */
    use HasFactory;

    public function locale()
    {
        return $this->hasOne(ProductCharacteristicLocal::class, 'id', 'product_characteristic_id');
    }
}
