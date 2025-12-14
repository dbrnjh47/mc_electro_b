<?php

namespace App\Http\Standards;

use App\Http\Services\Models\CategoryModelService;
use Illuminate\Database\Eloquent\Builder;

class PropertyStandard extends AbstractStandard
{
    public const PROPERTY_TYPE = 'property_type';
    public const IS_ON = 'is_on';

    protected function getCallbacks(): array
    {
        return [
            self::IS_ON => [$this, 'isOn'],
            self::PROPERTY_TYPE => [$this, 'propertyType'],
        ];
    }

    public function default(Builder $builder)
    {
        $builder->with([
            'unit' => function ($q2) {
                $q2->select(['id', 'text']);
            },
            'toUnit' => function ($q2) {
                $q2->select(['id', 'text']);
            },
            'unitRules' => function ($q2) {
                $q2->select(['id', 'unit_id', 'to_unit_id', 'value', 'action']);
            },
        ]);
    }

    public function propertyType(Builder $builder, $value)
    {
        $builder->whereNotNull("property_type_id")
        ->with([
            'propertyType' => function ($q2) {
                $q2->select(['id', 'type']);
            },
        ]);
    }

    public function isOn(Builder $builder, $exclusion_list)
    {
        $is_check = !(is_array($exclusion_list) && !empty($exclusion_list));

        $builder->where("is_on", 1);
    }
}
