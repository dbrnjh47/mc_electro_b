<?php

namespace App\Models\Product\Label;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLabel extends Model
{
    /** @use HasFactory<\Database\Factories\Product\Label\ProductLabelFactory> */
    use HasFactory;

    public function options()
    {
        return $this->hasMany(ProductLabelOption::class, 'id', 'product_label_option_id');
    }
}
