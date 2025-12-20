<?php

namespace App\Models\Property;

use App\Models\Category\Category;
use App\Models\Product\Product;
use App\Models\Product\ProductProperty;
use App\Models\Unit\Unit;
use App\Models\Unit\UnitRule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Filterable;
use App\Models\Traits\Standardable;

class Property extends Model
{
    /** @use HasFactory<\Database\Factories\Property\PropertyFactory> */
    use HasFactory;
    use Filterable;
    use Standardable;

    public function type()
    {
        return $this->hasOne(PropertyType::class, 'id', 'property_type_id');
    }

    public function section()
    {
        return $this->hasOne(PropertySection::class, 'id', 'property_section_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, (new PropertyCategory())->getTable());
    }

    public function values()
    {
        return $this->belongsToMany(
            PropertyValue::class,
            (new ProductProperty())->getTable()
        )->orderBy('number', 'asc');
    }

    public function productValues()
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

    public function getFullTitle()
    {
        if($this->toUnit){return "{$this->title}({$this->toUnit->text})";}
        if($this->unit){return "{$this->title}({$this->unit->text})";}
        return $this->title;
    }
}
