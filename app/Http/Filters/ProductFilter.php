<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const CATEGORY_IDS = 'category_ids';
    public const CATEGORY_ID = 'category_id';
    public const SORT = 'sort';
    public const SLUG = 'slug';
    public const SEARCH = 'search';
    public const FILTERS = 'filters';

    protected function getCallbacks(): array
    {
        return [
            self::CATEGORY_IDS => [$this, 'categoryIds'],
            self::CATEGORY_ID => [$this, 'categoryId'],
            self::SORT => [$this, 'sort'],
            self::SLUG => [$this, 'slug'],
            self::SEARCH => [$this, 'search'],
            self::FILTERS => [$this, 'filters'],
        ];
    }

    public function default(Builder $builder)
    {
    }

    public function filters(Builder $builder, $list)
    {
        $builder->where(function ($query) use ($list) {
            foreach ($list as $propertyId => $values) {
                $query->whereHas('productProperties', function ($q) use ($propertyId, $values) {
                    $q->where('property_id', $propertyId)
                      ->whereIn('property_value_id', $values);
                });
            }
        });
    }

    public function search(Builder $builder, $value)
    {
        $builder->where(function ($q) use ($value) {
            $q->where("name", 'like', "%{$value}%")
                ->orWhere("article", 'like', "%{$value}%")
                ->orWhere("uuid", 'like', "%{$value}%");
        });
    }

    public function slug(Builder $builder, $value)
    {
        $builder->where("slug", $value);
    }

    public function categoryId(Builder $builder, $value)
    {
        $builder->whereHas('categories', function ($query) use ($value) {
            $query->where('category_id', $value);
        });
    }

    public function categoryIds(Builder $builder, $value)
    {
        $builder->whereHas('categories', function ($query) use ($value) {
            $query->whereIn('category_id', $value);
        });
    }

    public function sort(Builder $builder, $value)
    {
        switch ($value) {
            case "name_asc":
                $builder->orderBy('name', 'asc');
                break;
            case "create_desc":
                $builder->orderBy('created_at', 'desc');
                break;
            case "create_asc":
                $builder->orderBy('created_at', 'asc');
                break;
            case "price_desc":
                $builder->orderBy('mrp', 'desc');
                break;
            case "price_asc":
                $builder->orderBy('mrp', 'asc');
                break;
        }
    }
}
