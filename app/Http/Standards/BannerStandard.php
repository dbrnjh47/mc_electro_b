<?php

namespace App\Http\Standards;

use Illuminate\Database\Eloquent\Builder;

class BannerStandard extends AbstractStandard
{
    public const IS_ON = 'is_on';
    public const SORT = 'sort';
    protected function getCallbacks(): array
    {
        return [
            self::IS_ON => [$this, 'isOn'],
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
        // $is_check = !(is_array($exclusion_list) && !empty($exclusion_list));

        $builder->where("is_on", 1);
    }
}
