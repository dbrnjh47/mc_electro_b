<?php

namespace App\Http\Standards;

use App\Http\Filters\PointFilter;
use Illuminate\Database\Eloquent\Builder;

class ProductStandard extends AbstractStandard
{
    public const WISHLIST = 'wishlist';
    public const CART = 'cart';
    public const PREVIEW = 'preview';
    public const IS_ON = 'is_on';
    public const LABELS = 'labels';
    public const IS_ARCHIVE = 'is_archive';
    public const POINT_COUNT = 'point_count';
    public const CITY_POINT_COUNT = 'city_point_count';
    protected function getCallbacks(): array
    {
        return [
            self::WISHLIST => [$this, 'wishlist'],
            self::CART => [$this, 'cart'],
            self::PREVIEW => [$this, 'preview'],
            self::IS_ON => [$this, 'isOn'],
            self::LABELS => [$this, 'labels'],
            self::IS_ARCHIVE => [$this, 'isArchive'],
            self::POINT_COUNT => [$this, 'pointCount'],
            self::CITY_POINT_COUNT => [$this, 'cityPointCount'],
        ];
    }

    public function default(Builder $builder) {}

    public function cityPointCount(Builder $builder, $city_id)
    {
        $pointStandard = app()->make(PointStandard::class, ['params' => [
            "is_on" => 1,
            "is_pickup" => 1
        ]]);

        //

        $pointFilter = app()->make(PointFilter::class, ['params' => [
            "city_id" => $city_id
        ]]);


        $builder->withSum(['product_points as city_point_count' => function ($q) use ($pointStandard, $pointFilter) {
            $q->whereHas('point', function ($q2) use ($pointStandard, $pointFilter) {
                $q2->standard($pointStandard)->filter($pointFilter);
            });
        }], 'count');
    }

    public function pointCount(Builder $builder, $city_id)
    {
        $pointStandard = app()->make(PointStandard::class, ['params' => [
            "is_on" => 1,
            // "is_pickup" => 1
        ]]);

        //

        $pointFilter = null;
        if($city_id){
            $pointFilter = app()->make(PointFilter::class, ['params' => [
                "exclude_city_id" => $city_id
            ]]);
        }

        //

        $builder->withSum(['product_points as point_count' => function ($q) use ($pointStandard, $pointFilter) {
            $q->whereHas('point', function ($q2) use ($pointStandard, $pointFilter) {
                $q2->standard($pointStandard);
                if($pointFilter){$q2->filter($pointFilter);}
            });
        }], 'count');
    }

    public function isArchive(Builder $builder, $value)
    {
        $builder->where("is_archive", $value);
    }

    public function isOn(Builder $builder, $exclusion_list)
    {
        $is_check = !(is_array($exclusion_list) && !empty($exclusion_list));

        if ($is_check || !in_array("category", $exclusion_list)) {
            $categoryStandard = app()->make(CategoryStandard::class, [
                'params' => [
                    "is_on" => 1,
                ],
            ]);

            $builder->whereHas('categories.category', function ($q) use ($categoryStandard) {
                $q->standard($categoryStandard);
            });
        }

        if ($is_check || !in_array("company", $exclusion_list)) {
            $builder->where(function ($query) {
                $query->whereNull('company_id')
                    ->orWhereHas('company', function ($q) {
                        $q->where('is_on', 1);
                    });
            });
        }

        $builder->where("is_on", 1);
    }

    public function cart(Builder $builder, $cart_id)
    {
        $builder->withCount([
            'cart_products' => function (Builder $q) use ($cart_id) {
                $q->where("cart_id", $cart_id)->limit(1);
            },
        ]);
    }

    public function wishlist(Builder $builder, $wishlist_id)
    {
        $builder->withCount([
            'wishlist_products' => function (Builder $q) use ($wishlist_id) {
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

    public function labels(Builder $builder, $value)
    {
        $builder->with('labels');
    }
}
