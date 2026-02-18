<?php

namespace App\Http\Standards;

use Illuminate\Database\Eloquent\Builder;

class CategoryStandard extends AbstractStandard
{
    public const IS_ON = 'is_on';
    public const PRODUCT_COUNT = 'product_count';
    public const SORT = 'sort';

    protected function getCallbacks(): array
    {
        return [
            self::IS_ON => [$this, 'isOn'],
            self::PRODUCT_COUNT => [$this, 'productCount'],
            self::SORT => [$this, 'sort'],
        ];
    }

    public function default(Builder $builder)
    {
    }

    public function sort(Builder $builder, $value)
    {
        $builder->orderBy('ordering', 'asc');
    }

    public function isOn(Builder $builder, $exclusion_list)
    {
        $is_check = !(is_array($exclusion_list) && !empty($exclusion_list));

        if($is_check || !in_array("is_on", $exclusion_list))
        {
            $builder->where("is_on", 1);
        }
    }

    public function productCount(Builder $builder, $value)
    {
        $productStandard = app()->make(ProductStandard::class, [
            'params' => [
                "is_on" => 1,
                "is_archive" => 0
            ],
        ]);

        $builder->withCount(['products' => function ($query) use ($productStandard) {
            $query->standard($productStandard);
        }])
        ->having('products_count', '>', 0);
    }
}
