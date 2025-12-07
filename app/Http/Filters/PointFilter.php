<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PointFilter extends AbstractFilter
{
    public const SEARCH = 'search';
    public const CITY_ID = 'city_id';

    protected function getCallbacks(): array
    {
        return [
            self::SEARCH => [$this, 'search'],
            self::CITY_ID => [$this, 'cityId'],
        ];
    }

    public function search(Builder $builder, $value)
    {
        $builder->where(function ($й) use ($value) {
            $й->where("title", 'like', "%{$value}%")
                  ->orWhere("address", 'like', "%{$value}%");
        });
    }

    public function cityId(Builder $builder, $value)
    {
        $builder->where("city_id", $value);
    }
}
