<?php

namespace App\Models\Product\Characteristic;

use App\Models\Unit\Unit;
use App\Models\Unit\UnitRule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCharacteristicTitle extends Model
{
    /** @use HasFactory<\Database\Factories\Product\Characteristic\ProductCharacteristicTitleFactory> */
    use HasFactory;
    public function category()
    {
        return $this->hasOne(ProductCharacteristicCategory::class, 'id', 'product_characteristic_category_id');
    }
    public function unit()
    {
        return $this->hasOne(Unit::class, 'id', 'unit_id');
    }
    public function toUnit()
    {
        return $this->hasOne(Unit::class, 'id', 'to_unit_id');
    }

    public function unitRules()
    {
        return $this->hasMany(UnitRule::class, 'unit_id', 'unit_id');
    }
}
