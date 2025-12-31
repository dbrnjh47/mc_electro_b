<?php

namespace App\Http\Standards;

use Illuminate\Database\Eloquent\Builder;

class ProductStandard extends AbstractStandard
{
    public const WISHLIST = 'wishlist';
    public const PREVIEW = 'preview';
    public const IS_ON = 'is_on';

    protected function getCallbacks(): array
    {
        return [
            self::WISHLIST => [$this, 'wishlist'],
            self::PREVIEW => [$this, 'preview'],
            self::IS_ON => [$this, 'isOn'],
        ];
    }

    public function default(Builder $builder)
    {
    }

    public function isOn(Builder $builder, $exclusion_list)
    {
        $is_check = !(is_array($exclusion_list) && !empty($exclusion_list));

        if($is_check || !in_array("category", $exclusion_list))
        {
            $categoryStandard = app()->make(CategoryStandard::class, [
                'params' => [
                    "is_on" => 1,
                ],
            ]);

            $builder->whereHas('categories.category', function ($q) use ($categoryStandard) {
                $q->standard($categoryStandard);
            });
        }

        if($is_check || !in_array("company", $exclusion_list))
        {
            $builder->where(function($query) {
                $query->whereNull('company_id')
                      ->orWhereHas('company', function($q) {
                          $q->where('is_on', 1);
                      });
            });
        }

        $builder->where("is_on", 1);
    }

    public function wishlist(Builder $builder, $wishlist_id)
    {
        $builder->withCount(['wishlist_products' => function (Builder $q) use ($wishlist_id) {
                $q->where("wishlist_id", $wishlist_id)->limit(1);
            },
        ]);
    }

    public function preview(Builder $builder, $value)
    {
        $builder->with([
            'medias' => function ($q2) {
                $q2->select(['name', 'product_id'])->limit(1);
            },
        ]);
    }
}
