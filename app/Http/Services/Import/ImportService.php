<?php

namespace App\Http\Services\Import;

use App\Http\Services\Import\Ways\MKElectro\IndexWay;
use App\Models\Category\Category;
use App\Models\Point\Point;
use App\Models\Product\Product;

class ImportService
{
    public function start()
    {
        (new IndexWay)->start();
    }

    public function cleaning()
    {
        dump("Очистка контактов");
        Point::query()->delete();

        dump("Очистка категорий");
        Category::query()->delete();

        dump("Очистка товаров");
        Product::query()->delete();
    }
}
