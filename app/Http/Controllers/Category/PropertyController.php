<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Filters\PropertyFilter;
use App\Http\Standards\ProductStandard;
use App\Http\Standards\PropertyStandard;
use App\Models\Product\ProductProperty;
use App\Models\Property\Property;
use App\Models\Property\PropertyValue;
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

        $propertyValueModel = new PropertyValue();
        $productPropertyModel = new ProductProperty();

        //

        $propertis = Property::standard($propertyStandard)
            ->filter($propertyFilter)
            ->whereDoesntHave('propertyType', function ($query) {
                $query->where('type', 'range');
            })
            ->with(['values' => function ($query) use ($productStandard, $productFilter) {
                $query->withCount(['productProperties as product_count' => function ($q) use ($productStandard, $productFilter) {
                    $q->whereHas(
                        'product',
                        fn($q2) =>
                        $q2->standard($productStandard)->filter($productFilter)
                    );
                }])
                    ->having('product_count', '>', 0)
                    ->distinct()
                    ->orderBy('product_count', 'asc');
            }])
            ->has('values')
            ->get();

        $rangeProperties = Property::standard($propertyStandard)
            ->filter($propertyFilter)
            ->whereHas('propertyType', function ($query) {
                $query->where('type', 'range');
            })
            ->addSelect([
                'properties.*',
                'min_value' => PropertyValue::query()
                    ->selectRaw("MIN({$propertyValueModel->qualifyColumn('number')})")
                    ->join(
                        $productPropertyModel->getTable(),
                        $propertyValueModel->qualifyColumn('id'),
                        '=',
                        $productPropertyModel->qualifyColumn('property_value_id'),
                    )
                    ->whereColumn(
                        $productPropertyModel->qualifyColumn('property_id'),
                        'properties.id'
                    )
                    ->whereHas('productProperties', function($q) use ($productStandard, $productFilter) {
                        $q->whereHas('product', fn($q2) =>
                            $q2->standard($productStandard)->filter($productFilter)
                        );
                    }),
                'max_value' => PropertyValue::query()
                ->selectRaw("MAX({$propertyValueModel->qualifyColumn('number')})")
                    ->join(
                        $productPropertyModel->getTable(),
                        $propertyValueModel->qualifyColumn('id'),
                        '=',
                        $productPropertyModel->qualifyColumn('property_value_id'),
                    )
                    ->whereColumn(
                        $productPropertyModel->qualifyColumn('property_id'),
                        'properties.id'
                    )
                    ->whereHas('productProperties', function($q) use ($productStandard, $productFilter) {
                        $q->whereHas('product', fn($q2) =>
                            $q2->standard($productStandard)->filter($productFilter)
                        );
                    })
            ])
            ->whereHas('values', function($query) use ($productStandard, $productFilter) {
                $query->whereHas('productProperties', function($q) use ($productStandard, $productFilter) {
                    $q->whereHas('product', fn($q2) =>
                        $q2->standard($productStandard)->filter($productFilter)
                    );
                });
            })
            ->get();

        $propertis = $propertis->merge($rangeProperties)->sortBy('ordering');

        return $propertis;
    }
}
