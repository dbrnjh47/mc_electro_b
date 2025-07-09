<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Services\Models\ProductModelService;

class IndexController extends Controller
{
    public function show($slug)
    {
        $product = (new ProductModelService(slug: $slug))
            ->getModel()
            ->with("medias")
            ->with("documents", function ($q) {
                $q = $q->where("locale_id", app()->user_local->id);
            })
            ->with(['characteristics' => function ($query) {
                $query->where(function($q) {
                        $q->whereNotNull('value') // value != null
                            ->orWhereHas('locale', function ($q2) {
                                $q2 = $q2->where("locale_id", app()->user_local->id);
                            });  // ИЛИ local существует
                    })
                    ->with(['locale' => function ($q) {
                        $q->where('locale_id', app()->user_local->id);
                    }])

                    ->whereHas('title.locale', function ($q) {
                        $q->where('locale_id', app()->user_local->id);
                    })
                    ->with(['title.locale' => function ($q) {
                        $q->where('locale_id', app()->user_local->id);
                    }])
                    ->with(['title.category.locale' => function ($q) {
                        $q->where('locale_id', app()->user_local->id);
                    }]);
            }])
            ->firstOrFail();
        // dump($product->characteristics);
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

        // dd($product->characteristics);
        return view('sample.main.pages.product.index', [
            'title' => $product->locale->name,
            'description' => "",
            'product' => $product
        ]);
    }
}
