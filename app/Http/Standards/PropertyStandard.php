<?php

namespace App\Http\Standards;

use Illuminate\Database\Eloquent\Builder;

class PropertyStandard extends AbstractStandard
{
    public const TYPE = 'type';
    public const IS_ON = 'is_on';
    public const SECTION = 'section';
    public const SORT = 'sort';
    public const UNIT = 'unit';

    protected function getCallbacks(): array
    {
        return [
            self::IS_ON => [$this, 'isOn'],
            self::TYPE => [$this, 'type'],
            self::SECTION => [$this, 'section'],
            self::SORT => [$this, 'sort'],
            self::UNIT => [$this, 'unit'],
        ];
    }

    public function default(Builder $builder)
    {
        $builder->select('properties.*');
    }

    public function sort(Builder $builder, $value)
    {
        $builder->orderBy('ordering', 'asc');
    }

    public function unit(Builder $builder, $value)
    {
        $builder->with([
            'unit' => function ($q2) {
                $q2->select(['id', 'text']);
            },
            'toUnit' => function ($q2) {
                $q2->select(['id', 'text']);
            },
        ])
        ->leftJoin('unit_rules', function($join) {
            $join->on('properties.unit_id', '=', 'unit_rules.unit_id')
                 ->on('properties.to_unit_id', '=', 'unit_rules.to_unit_id');
        })
        ->addSelect([
            'unit_rules.id as unit_rule_id',
            'unit_rules.value as unit_rule_value',
            'unit_rules.action as unit_rule_action'
        ]);
    }

    public function section(Builder $builder, $value)
    {
        $builder->with([
            'section' => function ($q2) {
                $q2->select(['id', 'title']);
            },
        ]);
    }

    public function type(Builder $builder, $value)
    {
        $builder->whereNotNull("property_type_id")
        ->with([
            'type' => function ($q2) {
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
