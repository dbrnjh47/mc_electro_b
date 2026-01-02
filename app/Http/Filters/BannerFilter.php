<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class BannerFilter extends AbstractFilter
{
    public const KEY = 'key';

    protected function getCallbacks(): array
    {
        return [
            self::KEY => [$this, 'key'],
        ];
    }

    public function default(Builder $builder)
    {
    }

    public function key(Builder $builder, $value)
    {
        $builder->where("key", $value);
    }
}
