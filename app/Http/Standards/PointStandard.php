<?php

namespace App\Http\Standards;

use Illuminate\Database\Eloquent\Builder;

class PointStandard extends AbstractStandard
{
    public const IS_ON = 'is_on';
    public const IS_PICKUP = 'is_pickup';

    protected function getCallbacks(): array
    {
        return [
            self::IS_ON => [$this, 'isOn'],
            self::IS_PICKUP => [$this, 'isPickup'],
        ];
    }

    public function default(Builder $builder)
    {
    }

    public function isPickup(Builder $builder, $exclusion_list)
    {
        $builder->where("is_pickup", 1);
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
