<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class BannerFilter extends AbstractFilter
{
    public const KEY = 'key';
    public const CITY_ID = 'city_id';
    protected function getCallbacks(): array
    {
        return [
            self::KEY => [$this, 'key'],
            self::CITY_ID => [$this, 'city_id'],
        ];
    }

    public function default(Builder $builder)
    {
    }

    public function city_id(Builder $builder, $value)
    {
        $builder->where(function ($query) use ($value) {
            $query->whereDoesntHave('cities');
            if($value)
            {
                $query->orWhereHas('cities', function ($q) use ($value) {
                    $q->where('city_id', $value);
                });
            }
        });
    }

    public function key(Builder $builder, $value)
    {
        $builder->where("key", $value);
    }
}
