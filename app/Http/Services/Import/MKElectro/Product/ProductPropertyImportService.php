<?php

namespace App\Http\Services\Import\MKElectro\Product;

use App\Http\Services\Import\MKElectro\MKElectroImportService;
use App\Models\Product\Product;
use App\Models\Product\ProductProperty;
use App\Models\Property\Property;
use App\Models\Property\PropertyValue;
use Illuminate\Support\Facades\DB;

class ProductPropertyImportService extends MKElectroImportService
{
    public $limit = 500;
    public $offset = 0;
    public function start()
    {
        $this->write("");
        $this->write("Создание характеристик товаров");

        while (true) {
            $products_propertis = $this->api->getProductsPropertis($this->limit, $this->offset);
            if (!$products_propertis) {
                dump("Не удалось получить характеристик товаров");
                break;
            }
            $products = Product::whereIn("slug", array_column($products_propertis, 'slug'))
                ->pluck('id', 'slug')
                ->toArray();

            $propertis = Property::whereIn("title", array_column($products_propertis, 'title'))
                ->pluck('id', 'title')
                ->toArray();

            DB::beginTransaction();
            try {
                foreach ($products_propertis as $product_property) {
                    if (!isset($products[$product_property["slug"]])) {
                        $this->error("Товар не найден {$product_property["slug"]}");
                        continue;
                    }
                    if (!isset($propertis[$product_property["title"]])) {
                        $this->error("Фильтр не найден {$product_property["title"]}");
                        continue;
                    }
                    $property_value = PropertyValue::query();
                    if (is_numeric($product_property["value"])) {
                        $property_value = $property_value->firstOrCreate(
                            ['number' => $product_property["value"]],
                            [
                                'number' => $product_property["value"],
                                'type' => 'float',
                            ]
                        );
                    }
                    if (!is_numeric($product_property["value"])) {
                        $property_value = $property_value->firstOrCreate(
                            ['value' => $product_property["value"]],
                            [
                                'value' => $product_property["value"],
                                'type' => 'text',
                            ]
                        );
                    }

                    try {
                        $p = new ProductProperty();
                        $p->fill([
                            "property_id" => $propertis[$product_property["title"]],
                            "property_value_id" => $property_value->id,
                            "product_id" => $products[$product_property["slug"]],
                        ]);
                        $p->save();
                    } catch (\Illuminate\Database\QueryException $e) {
                        // Проверяем, что это ошибка дубликата (код 23000)
                        if ($e->getCode() === '23000') {
                            // Просто игнорируем
                            $this->error("Дубликат ProductProperty, Товар {$product_property["slug"]} - Характеристика {$product_property["title"]}");
                        } else {
                            throw $e; // Перебрасываем другие ошибки
                        }
                    }
                }
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                $this->error($e->getMessage());
                // exit();
            }

            // dd($products_propertis);
            $this->offset += $this->limit;
            // return;
        }
    }
}
