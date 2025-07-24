<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Services\Models\Product\ProductCharacteristic\ProductCharacteristicModelService;
use App\Http\Services\Models\ProductModelService;

class IndexController extends Controller
{
    public function show($slug)
    {
        $product = (new ProductModelService(slug: $slug, select_list: [
            "id",
            "uuid",
            "company_id",
            "article",
            "slug",
            "weight",
            "length",
            "width",
            "height",
            "step"
        ]))
            ->getModel()
            ->with([
                'medias' => function ($q) {
                    $q->select(['name', 'product_id']);
                },
                'documents' => function ($q) {
                    $q = $q->select(['title', 'name', 'product_id'])->where("locale_id", app()->user_local->id);
                },
                'description' => function ($q) {
                    $q = $q->select(['text', 'product_id'])->where("locale_id", app()->user_local->id);
                },
                'company' => function ($q) {
                    $q = $q->select(['id', 'preview', 'name', 'slug']);
                },
                'company.locale' => function ($q) {
                    $q->select(['short', 'company_id'])->where('locale_id', app()->user_local->id)->whereNotNull("short");
                },
            ])
            ->with(['characteristics' => function ($query) {
                $query->where(function ($q) {
                    $q->whereNotNull('value') // value != null
                        ->orWhereHas('locale', function ($q2) {
                            $q2 = $q2->where("locale_id", app()->user_local->id);
                        });  // ИЛИ local существует
                })
                    ->with([
                        'locale' => function ($q) {
                            $q->select(['text', 'product_characteristic_id'])->where('locale_id', app()->user_local->id);
                        },
                        'title' => function ($q) {
                            $q->select(['id', 'product_characteristic_category_id', 'unit_id', 'to_unit_id']);
                        },
                        'title.locale' => function ($q) {
                            $q->select(['text', 'product_characteristic_title_id'])->where('locale_id', app()->user_local->id);
                        },
                        'title.category' => function ($q) {
                            $q->select(['id']);
                        },
                        'title.category.locale' => function ($q) {
                            $q->select(['title', 'product_characteristic_category_id'])->where('locale_id', app()->user_local->id);
                        },
                        //
                        'title.unit' => function ($q) {
                            $q->select(['id']);
                        },
                        'title.toUnit' => function ($q) {
                            $q->select(['id']);
                        },
                        'title.unit.locale' => function ($q) {
                            $q->select(['text', 'unit_id'])->where('locale_id', app()->user_local->id);
                        },
                        'title.toUnit.locale' => function ($q) {
                            $q->select(['text', 'unit_id'])->where('locale_id', app()->user_local->id);
                        },

                        // 'title.unitRules' => function ($q) {
                        //     $q->select(['unit_id', 'to_unit_id', 'value', 'action']);
                        // },
                    ])
                    ->whereHas('title.locale', function ($q) {
                        $q->where('locale_id', app()->user_local->id);
                    });
            }])
            ->firstOrFail();
        $product->characteristics = (new ProductCharacteristicModelService)->setUnitRules($product->characteristics);
        // dd($product->characteristics);

        $product->characteristics = $product->characteristics->groupBy(function ($char) {
            return $char->title->category ? $char->title->category->id : 'other';
        })->map(function ($chars, $key) {
            return [
                'category' => $key === 'other' ?
                    (object)['id' => null, 'locale' => (object)["title" => 'Другое']] :
                    $chars->first()->title->category,
                'items' => $chars
            ];
        })->sortBy(function ($group) {
            return $group['category']->id === null ? 9999 : $group['category']->id;
        })->values();

        dump($product);
        // dd($product);
        return view('sample.main.pages.product.index', [
            'title' => $product->locale->name,
            'description' => "",
            'product' => $product
        ]);
    }
}
