<?php

namespace App\Models\Property;

use App\Models\Product\Product;
use App\Models\Product\ProductProperty;
use App\Models\Unit\Unit;
use App\Models\Unit\UnitRule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    /** @use HasFactory<\Database\Factories\Property\PropertyFactory> */
    use HasFactory;

    public function propertyType()
    {
        return $this->hasOne(PropertyType::class, 'id', 'property_type_id');
    }

    public function propertySection()
    {
        return $this->hasOne(PropertySection::class, 'id', 'property_section_id');
    }

    public function categories()
    {
        return $this->hasMany(PropertyCategory::class, 'property_id', 'id');
    }

    public function productProperties()
    {
        return $this->hasMany(ProductProperty::class, 'property_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    //

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
