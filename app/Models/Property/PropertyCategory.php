<?php

namespace App\Models\Property;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyCategory extends Model
{
    /** @use HasFactory<\Database\Factories\Property\PropertyCategoryFactory> */
    use HasFactory;

    public function property()
    {
        return $this->hasOne(Property::class, 'id', 'property_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
