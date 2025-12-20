<?php

namespace App\Models\Product;

use App\Models\Property\Property;
use App\Models\Property\PropertyValue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
class ProductProperty extends Model
{
    /** @use HasFactory<\Database\Factories\Product\ProductPropertyFactory> */
    use HasFactory;

    public function product()
    {
        return $this->hasOne(Product::class, "id", "product_id");
    }

    public function property()
    {
        return $this->hasOne(Property::class, "id", "property_id");
    }

    public function value()
    {
        return $this->hasOne(PropertyValue::class, "id", "property_value_id");
    }
}
