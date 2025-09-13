<?php

namespace App\Http\Services\ImportMKElectro\Seeders;

use App\Http\API\MKElectroApi;
use App\Http\Services\MediaService;
use App\Http\Services\Models\CategoryModelService;
use App\Models\Product\Product;
use App\Models\Product\ProductCategory;
use App\Models\Product\ProductMedia;
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
                dump($product_api);
                $product_id = $this->createProduct($product_api);
                if (isset($product_api["relationships"]) && !empty($product_api["relationships"])) {
                    $this->relationships($product_api["relationships"], $product_id);
                }
            }

            $this->offset += $this->limit;
            exit();
        }

        return;
    }

    public function relationships($relationships, $product_id)
    {
        if (isset($relationships["medias"])) {
            foreach ($relationships["medias"] as $name => $media) {
                $name = (new MediaService)->createImgBase64(ProductMedia::PATH ."photo/".$name, $media);
                if($name)
                {
                    $this->createProductMedia($product_id, $name);
                }
            }
        }

        if (isset($relationships["categories"])) {
            foreach($relationships["categories"] as $category)
            {
                $this->createProductCategory($product_id, $category["slug"]);
            }
        }
    }

    public function createProductCategory($product_id, $category_slug)
    {
        $product_media = new ProductCategory();

        $product_media->product_id = $product_id;
        $product_media->category_id = (new CategoryModelService(select_list:["id"], on_check: 0))->firstBySlug($category_slug)->id;

        $product_media->save();
    }

    public function createProductMedia($product_id, $name)
    {
        $product_media = new ProductMedia();

        $product_media->name = $name;
        $product_media->product_id = $product_id;

        $product_media->save();
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
