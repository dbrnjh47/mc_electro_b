<?php

namespace App\Http\Services\ImportMKElectro\Seeders;

use App\Http\API\MKElectroApi;

use App\Models\Product\Product;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends MKElectroApi
{
    public $limit = 100;
    public $offset = 0;
    public function start()
    {
        while (true) {
            $products = $this->getProducts($this->limit, $this->offset);

            if (!$products) {
                dump("Не удалось получить товары");
                break;
            }
            // dd($products);

            for ($i = 0; $i < count($products); $i++) {
                $product_api = $products[$i];
                $product_id = $this->createProduct($product_api);

            }

            $this->offset += $this->limit;
            exit();
        }

        return;
    }

    public function createProduct($product_api)
    {
        $product = new Product();

        $product->name = $product_api["product_name"];
        $product->short_desc = ((isset($product_api["product_s_desc"]) && $product_api["product_s_desc"] && $product_api["product_s_desc"] != "") ? $product_api["product_s_desc"] : null);
        $product->desc = ((isset($product_api["product_desc"]) && $product_api["product_desc"] && $product_api["product_desc"] != "") ? $product_api["product_desc"] : null);
        $product->uuid = $product_api["product_sku"];
        // $product->company_id = $product_api[""];
        $product->article = $product_api["product_mpn"];
        $product->slug = $product_api["slug"];
        // $product->mrp = $product_api[""];
        $product->weight = $product_api["product_weight"];
        $product->length = $product_api["product_length"];
        $product->width = $product_api["product_width"];
        $product->height = $product_api["product_height"];
        $product->step = ((!isset($product_api["step"]) || !$product_api["step"] || !is_numeric($product_api["step"])) ? 1 : $product_api["step"]);
        $product->is_on = $product_api["published"];

        $product->save();
        return $product->id;
    }
}
