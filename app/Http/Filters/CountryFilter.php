<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class CountryFilter extends AbstractFilter
{
    public const CCA2_LIST = 'cca2_list';

    protected function getCallbacks(): array
    {
        return [
            self::CCA2_LIST => [$this, 'cca2List'],
        ];
    }

    public function default(Builder $builder)
    {
    }

    public function cca2List(Builder $builder, $list)
    {
        $builder->whereIn("key", $list);
    }
}
