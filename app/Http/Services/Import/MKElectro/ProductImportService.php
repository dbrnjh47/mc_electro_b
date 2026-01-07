<?php

namespace App\Http\Services\Import\MKElectro;

use App\Http\Services\MediaService;
use App\Models\Category\Category;
use Illuminate\Support\Facades\DB;

class ProductImportService extends MKElectroImportService
{
    public $limit = 10;
    public $offset = 0;
    public function start()
    {
        $this->write("");
        $this->write("Создание товаров");

        //

        while (true) {
            $products = $this->api->getProducts($this->limit, $this->offset);

            if (!$products) {
                dump("Не удалось получить товары");
                break;
            }
            dd($products);


            $this->offset += $this->limit;
            exit();
        }


    }
}
