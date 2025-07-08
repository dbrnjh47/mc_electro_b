<?php

namespace App\Models\Product;

use App\Models\Product\Characteristic\ProductCharacteristic;
use App\Models\Product\Document\ProductDocument;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\Product\ProductFactory> */
    use HasFactory;

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
}
