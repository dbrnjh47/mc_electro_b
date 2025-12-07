<?php

namespace App\Http\Standards;

use App\Http\Services\Models\CategoryModelService;
use Illuminate\Database\Eloquent\Builder;

class PointStandard extends AbstractStandard
{
    public const IS_ON = 'is_on';

    protected function getCallbacks(): array
    {
        return [
            self::IS_ON => [$this, 'isOn'],
        ];
    }

    public function default(Builder $builder)
    {
    }

    public function isOn(Builder $builder, $exclusion_list)
    {
        $is_check = !(is_array($exclusion_list) && !empty($exclusion_list));

        if($is_check || !in_array("is_on", $exclusion_list))
        {
            $builder->where("is_on", 1);
        }
    }
}
