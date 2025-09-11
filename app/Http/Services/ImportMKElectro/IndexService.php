<?php

namespace App\Http\Services\ImportMKElectro;

use App\Http\Services\ImportMKElectro\Seeders\PointSeeder;
use App\Models\Point\Point;

class IndexService
{
    public function start()
    {
        dump("Интеграция контактов");
        (new PointSeeder)->start();
    }

    public function cleaning()
    {
        dump("Очистка контактов");
        Point::query()->delete();
    }
}
