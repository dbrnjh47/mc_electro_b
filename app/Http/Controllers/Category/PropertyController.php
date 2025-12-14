<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Filters\PropertyFilter;
use App\Http\Standards\ProductStandard;
use App\Http\Standards\PropertyStandard;
use App\Models\Product\ProductProperty;
use App\Models\Property\Property;
use Illuminate\Support\Facades\DB;

class PropertyController
{
    public function get($request)
    {
        $propertyStandard = app()->make(PropertyStandard::class, ['params' => [
            "is_on" => 1,
            "property_type" => 1,
        ]]);

        $propertyFilter = app()->make(PropertyFilter::class, [
            'params' => array_filter($request->all())
        ]);

        //
        $request->offsetUnset('category_id');
        $productStandard = app()->make(ProductStandard::class, ['params' => [
            "is_on" => ["category"],
        ]]);
        $productFilter = app()->make(ProductFilter::class, ['params' => array_filter($request->all())]);


        $propertis = Property::standard($propertyStandard)
            ->filter($propertyFilter)
            // ->with(['values' => function ($query) use ($productStandard, $productFilter) {
            //     $query->addSelect([
            //         'product_count' => ProductProperty::
            //             selectRaw('COUNT(DISTINCT product_id)')
            //             ->whereHas('product', function ($q) use ($productStandard, $productFilter) {
            //                 $q->standard($productStandard)->filter($productFilter);
            //             })
            //             ->whereColumn(
            //                 'product_properties.property_value_id',
            //                 'property_values.id'
            //             )

            //     ])->having('product_count', '!=', 0)->distinct();
            // }])
            ->with(['values' => function ($query) use ($productStandard, $productFilter) {
                $query->withCount(['productProperties as product_count' => function($q) use ($productStandard, $productFilter) {
                    $q->whereHas('product', fn($q2) =>
                        $q2->standard($productStandard)->filter($productFilter)
                    );
                }])
                ->having('product_count', '>', 0)
                ->distinct()
                ->orderBy('product_count', 'asc');
            }])
            ->has('values')
            ->get();

        return $propertis;
    }

}
