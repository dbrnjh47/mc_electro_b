<?php

namespace App\Models\Product;

use App\Models\Product\Document\ProductDocument;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\Product\ProductFactory> */
    use HasFactory;

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class, 'product_id', 'id');
    }

    public function documents()
    {
        return $this->hasMany(ProductDocument::class, 'product_id', 'id');
    }
}
