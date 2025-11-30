<?php

namespace App\Http\Services\Import\Ways\MKElectro;


class IndexWay
{
    public function start()
    {
        dump("Интеграция контактов");
        (new PointWay)->start();

        dump("Интеграция категорий");
        (new CategoryWay)->start();

        dump("Интеграция товаров");
        (new ProductWay)->start();
    }
}
