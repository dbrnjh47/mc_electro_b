<?php

namespace App\Models\Product;

use App\Models\Company\Company;
use App\Models\Product\Characteristic\ProductCharacteristic;
use App\Models\Product\Document\ProductDocument;
use App\Models\Product\Label\ProductLabel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\Product\ProductFactory> */
    use HasFactory;

    public function locale()
    {
        return $this->hasOne(ProductLocale::class, 'product_id', 'id');
    }

    public function categories()
    {
        return $this->hasOne(ProductCategory::class, 'product_id', 'id');
    }

    public function description()
    {
        return $this->hasOne(ProductDescription::class, 'product_id', 'id');
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
}
