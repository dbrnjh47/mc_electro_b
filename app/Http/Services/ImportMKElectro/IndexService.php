<?php

namespace App\Http\Services\ImportMKElectro;

use App\Http\Services\ImportMKElectro\Seeders\CategorySeeder;
use App\Http\Services\ImportMKElectro\Seeders\PointSeeder;
use App\Http\Services\ImportMKElectro\Seeders\ProductSeeder;
use App\Models\Category\Category;
use App\Models\Point\Point;
use App\Models\Product\Product;

class IndexService
{
    public function start()
    {
        // dump("Интеграция контактов");
        // (new PointSeeder)->start();

        dump("Интеграция категорий");
        (new CategorySeeder)->start();

        // dump("Интеграция товаров");
        // (new ProductSeeder)->start();
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
