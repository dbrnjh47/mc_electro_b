<?php

namespace App\Http\Standards;

use Illuminate\Database\Eloquent\Builder;

class CityStandard extends AbstractStandard
{
    public const IS_ON = 'is_on';
    public const POINTS = 'points';

    protected function getCallbacks(): array
    {
        return [
            self::IS_ON => [$this, 'isOn'],
            self::POINTS => [$this, 'points'],
        ];
    }

    public function default(Builder $builder)
    {
    }

    public function isOn(Builder $builder, $exclusion_list)
    {
        // $is_check = !(is_array($exclusion_list) && !empty($exclusion_list));

        $builder->where("is_on", 1);
    }

    public function points(Builder $builder, $value)
    {
        $builder->whereHas('points', function ($q) {
            $point_standard = app()->make(PointStandard::class, ['params' => [
                "is_on" => 1,
            ]]);
            $q = $q->standard($point_standard);
        });
    }
}
