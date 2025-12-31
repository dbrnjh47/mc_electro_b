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
    public $propertyStandard = null;
    public $propertyFilter = null;
    public $productStandard = null;
    public $productFilter = null;
    public $propertyValueModel = null;
    public $productPropertyModel = null;

    public function __construct($request, public $is_short = 0)
    {
        $propertyStandardArray = ['params' => [
            "is_on" => 1,
        ]];

        if (!$is_short) {
            $propertyStandardArray['params']['unit'] = 1;
            $propertyStandardArray['params']['type'] = 1;
        }

        $this->propertyStandard = app()->make(PropertyStandard::class, $propertyStandardArray);

        $this->propertyFilter = app()->make(PropertyFilter::class, [
            'params' => array_filter($request->all())
        ]);

        $this->productStandard = app()->make(ProductStandard::class, ['params' => [
            "is_on" => ["category"],
        ]]);
        $this->productFilter = app()->make(ProductFilter::class, ['params' => array_filter($request->all())]);

        $this->propertyValueModel = new PropertyValue();
        $this->productPropertyModel = new ProductProperty();
    }

    public function process()
    {
        $properties = $this->get();
        if (!$this->is_short) {
            $rangeProperties = $this->getRang();
            $properties = $properties->merge($rangeProperties)->sortBy('ordering');
        }

        return $properties;
    }

    public function get()
    {
        $properties = Property::standard($this->propertyStandard)
            ->filter($this->propertyFilter);
        if ($this->is_short) {$properties = $properties->select("id");}
        $properties = $properties->whereDoesntHave('type', function ($query) {
            $query->where('type', 'range');
        })
            ->with(['productValues' => function ($query) {
                $query->whereHas('product', function ($q2) {
                    $q2->standard($this->productStandard)->filter($this->productFilter);
                })
                    ->select('property_id', 'property_value_id', DB::raw('COUNT(*) as product_count'))
                    ->groupBy('property_id', 'property_value_id')
                    ->with([
                        'value' => function ($q3) {
                            if ($this->is_short) {$q3->select("id");}
                        },
                    ]);
            }])
            ->whereHas('productValues', function ($query) {
                $query->whereHas('product', function ($q2) {
                    $q2->standard($this->productStandard)->filter($this->productFilter);
                });
            })
            ->get()
            ->each(function ($property) {
                // Преобразуем productValues в values
                $values = $property->productValues->map(function ($productValue) {
                    $value = $productValue->value;
                    $value->product_count = $productValue->product_count;
                    return $value;
                })->unique('id');

                $property->setRelation('values', $values);

                unset($property->productValues);
            });

        return $properties;
    }

    public function getRang()
    {
        $rangeProperties = Property::standard($this->propertyStandard)
            ->filter($this->propertyFilter)
            ->whereHas('type', function ($query) {
                $query->where('type', 'range');
            })
            ->addSelect([
                'min_value' => PropertyValue::query()
                    ->selectRaw("MIN({$this->propertyValueModel->qualifyColumn('number')})")
                    ->join(
                        $this->productPropertyModel->getTable(),
                        $this->propertyValueModel->qualifyColumn('id'),
                        '=',
                        $this->productPropertyModel->qualifyColumn('property_value_id'),
                    )
                    ->whereColumn(
                        $this->productPropertyModel->qualifyColumn('property_id'),
                        'properties.id'
                    )
                    ->whereHas('productProperties', function ($q) {
                        $q->whereHas(
                            'product',
                            fn($q2) =>
                            $q2->standard($this->productStandard)->filter($this->productFilter)
                        );
                    }),
                'max_value' => PropertyValue::query()
                    ->selectRaw("MAX({$this->propertyValueModel->qualifyColumn('number')})")
                    ->join(
                        $this->productPropertyModel->getTable(),
                        $this->propertyValueModel->qualifyColumn('id'),
                        '=',
                        $this->productPropertyModel->qualifyColumn('property_value_id'),
                    )
                    ->whereColumn(
                        $this->productPropertyModel->qualifyColumn('property_id'),
                        'properties.id'
                    )
                    ->whereHas('productProperties', function ($q) {
                        $q->whereHas(
                            'product',
                            fn($q2) =>
                            $q2->standard($this->productStandard)->filter($this->productFilter)
                        );
                    })
            ])
            ->whereHas('values', function ($query) {
                $query->whereHas('productProperties', function ($q) {
                    $q->whereHas(
                        'product',
                        fn($q2) =>
                        $q2->standard($this->productStandard)->filter($this->productFilter)
                    );
                });
            })
            ->get();

        return $rangeProperties;
    }
}
