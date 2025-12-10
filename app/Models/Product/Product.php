<?php

namespace App\Models\Product;

use App\Models\Company\Company;
use App\Models\Product\Characteristic\ProductCharacteristic;
use App\Models\Product\Document\ProductDocument;
use App\Models\Product\Label\ProductLabel;
use App\Models\Product\Review\ProductReview;
use App\Models\Property\Property;
use App\Models\Property\PropertyValue;
use App\Models\Traits\Filterable;
use App\Models\Traits\Standardable;
use App\Models\User\Wishlist\WishlistProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\Product\ProductFactory> */
    use HasFactory;
    use Filterable;
    use Standardable;

    public function categories()
    {
        return $this->hasMany(ProductCategory::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->hasOne(ProductCategory::class, 'product_id', 'id');
    }

    public function medias()
    {
        return $this->hasMany(ProductMedia::class, 'product_id', 'id');
    }

    public function documents()
    {
        return $this->hasMany(ProductDocument::class, 'product_id', 'id');
    }

    public function characteristics()
    {
        return $this->hasMany(ProductCharacteristic::class, 'product_id', 'id');
    }

    public function labels()
    {
        return $this->hasMany(ProductLabel::class, 'product_id', 'id');
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id')->where("is_on", 1);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id', 'id')->where("is_on", 1);
    }

    public function wishlist_products()
    {
        return $this->hasMany(WishlistProduct::class, 'product_id', 'id');
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class, "product_properties")
            ->using(ProductProperty::class)  // Указываем pivot модель
            ->withPivot('property_value_id') // Добавляем pivot поле
            ->withTimestamps();
    }

    public function propertyValues()
    {
        return $this->belongsToMany(PropertyValue::class, "product_properties")
            ->using(ProductProperty::class)
            ->withPivot('property_id')
            ->withTimestamps();
    }

    // $product = Product::with(['productProperties.property', 'productProperties.value'])->find(1);
}
