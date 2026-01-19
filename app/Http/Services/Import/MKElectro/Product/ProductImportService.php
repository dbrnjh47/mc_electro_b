<?php

namespace App\Http\Services\Import\MKElectro\Product;

use App\Http\Services\Import\MKElectro\MKElectroImportService;
use App\Http\Services\Media\Base64MediaService;
use App\Models\Category\Category;
use App\Models\Company\Company;
use App\Models\Product\Label\ProductLabelOption;
use App\Models\Product\Product;
use App\Models\Product\ProductMedia;
use Illuminate\Support\Facades\DB;

class ProductImportService extends MKElectroImportService
{
    public $limit = 10;
    public $offset = 0;
    public $mediaService = null;
    public function start()
    {
        $this->write("");
        $this->write("Создание товаров");

        $this->mediaService = (new Base64MediaService);

        //

        while (true) {
            $products = $this->api->getProducts($this->limit, $this->offset);
            dd($products);
            if (!$products) {
                dump("Не удалось получить товары");
                break;
            }

            foreach ($products as $product) {
                dump($product);
                DB::beginTransaction();
                try {
                    if (!isset($product["product_sku"]) || !isset($product["slug"])) {
                        throw new \Exception("Не найдены важные данные");
                    }

                    $company_id = null;
                    if (isset($product["manufacturers_slug"]) && $product["manufacturers_slug"] != "") {
                        $company = Company::select(["id"])->where("slug", $product["manufacturers_slug"])->first();
                        if ($company) {
                            $company_id = $company->id;
                        }
                        unset($company);
                    }

                    //


                    $p = new Product();
                    $p->fill([
                        'name' => $product["product_name"],
                        'short_desc' => ((isset($product["product_s_desc"]) && $product["product_s_desc"] && $product["product_s_desc"] != "") ? $product["product_s_desc"] : null),
                        'desc' => ((isset($product["product_desc"]) && $product["product_desc"] && $product["product_desc"] != "") ? $product["product_desc"] : null),
                        'uuid' => $product["product_sku"],
                        'article' => $product["product_mpn"],
                        'slug' => $product["slug"],
                        'mrp' => $product["price"],

                        'weight' => $product["product_weight"],
                        'length' => $product["product_length"],
                        'width' => $product["product_width"],
                        'height' => $product["product_height"],
                        'step' => ((!isset($product["step"]) || !$product["step"] || !is_numeric($product["step"])) ? 1 : $product["step"]),

                        'is_on' => $product["published"],
                        'is_archive' => $product["is_archive"],

                        'company_id' => $company_id,
                    ]);
                    $p->save();

                    //

                    $labels = [];
                    if ($product["is_sale"]) {
                        $labels[] = "sale";
                    }
                    if ($product["product_special"]) {
                        $labels[] = "recommend";
                    }
                    if (!empty($labels)) {
                        $labels = ProductLabelOption::whereIn('key', $labels)->pluck("id");
                        // $p->labels()->saveMany($labels);
                        $p->labels()->attach($labels);
                    }

                    //

                    if (isset($product["relationships"]) && !empty($product["relationships"])) {
                        $this->relationships($product["relationships"], $p);
                    }

                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    $this->error($e->getMessage());
                }
            }

            // dd($products);


            $this->offset += $this->limit;
            return;
        }
    }

    private function relationships($relationships, $product)
    {
        if (isset($relationships["categories"]) && !empty($relationships["categories"])) {
            $category_ids = Category::whereIn("slug", $relationships["categories"])->pluck("id");

            $product->categories()->createMany(
                $category_ids->map(fn($id) => [
                    'category_id' => $id
                ])->toArray()
            );
        }

        if (isset($relationships["medias"])) {
            $names = [];
            foreach ($relationships["medias"] as $name => $media) {
                $this->mediaService->maxWidth = ProductMedia::MAX_WIDTH;
                $this->mediaService->maxHeight = ProductMedia::MAX_HEIGHT;

                $name = $this->mediaService->create(ProductMedia::PATH . "photo/", $media);

                //
                if ($name) {
                    $this->mediaService->maxWidth = ProductMedia::MINIATURE_MAX_WIDTH;
                    $this->mediaService->maxHeight = ProductMedia::MINIATURE_MAX_HEIGHT;

                    $result = $this->mediaService->createMiniature(
                        ProductMedia::PATH . "miniature/",
                        (ProductMedia::PATH . "photo/" . $name)
                    );

                    $names[] = $name;
                }
            }
            if (!empty($names)) {
                $product->medias()->createMany(
                    collect($names)->map(fn($name) => [
                        'name' => $name
                    ])->toArray()
                );
            }
        }
    }
}
