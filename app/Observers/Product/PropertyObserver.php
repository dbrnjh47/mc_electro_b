<?php

namespace App\Observers\Product;

use App\Models\Category\Subcategory;
use App\Models\Product\ProductProperty;
use App\Models\Property\PropertyCategory;

class PropertyObserver
{
    public function created(ProductProperty $productProperty): void
    {
        $productProperty->createPropertyCategory();
    }
}
