<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PointFilter extends AbstractFilter
{
    public const SEARCH = 'search';
    public const CITY_ID = 'city_id';
    public const EXCLUDE_CITY_ID = 'exclude_city_id';

    protected function getCallbacks(): array
    {
        return [
            self::SEARCH => [$this, 'search'],
            self::CITY_ID => [$this, 'cityId'],
            self::EXCLUDE_CITY_ID => [$this, 'excludeCityId'],
        ];
    }

    public function default(Builder $builder)
    {
    }

    public function search(Builder $builder, $value)
    {
        if(!$value || $value == ""){return;}
        $builder->where(function ($q) use ($value) {
            $q->where("title", 'like', "%{$value}%")
                  ->orWhere("address", 'like', "%{$value}%");
        });
    }

    public function cityId(Builder $builder, $value)
    {
        if(!$value){return;}
        $builder->where("city_id", $value);
    }

    public function excludeCityId(Builder $builder, $value)
    {
        if(!$value){return;}
        $builder->where("city_id", "!=", $value);
    }
}
