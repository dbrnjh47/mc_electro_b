<?php

namespace App\Http\Services\Models\Product\ProductCharacteristic;

use App\Http\Services\Models\ControllerModelService;
use App\Models\Unit\UnitRule;

class ProductCharacteristicModelService extends ControllerModelService
{
    public function setUnitRules($characteristics)
    {
        $key_rules = $characteristics->mapWithKeys(function ($characteristic) {
            if(is_null($characteristic->title->unit_id) || is_null($characteristic->title->to_unit_id))
            {
                return [];
            }
            return [
                $characteristic->title->id => [$characteristic->title->unit_id, $characteristic->title->to_unit_id]
            ];
        })->toArray();

        $unit_rules = UnitRule::query();

        foreach ($key_rules as $key_rule) {
            $unit_rules->orWhere(function($q) use ($key_rule) {
                $q->where('unit_id', $key_rule[0])
                  ->where('to_unit_id', $key_rule[1]);
            });
        }

        $unit_rules = $unit_rules->get();

        //
        $results = [];

        foreach ($key_rules as $key => $pair) {
            foreach ($unit_rules as $unit_rule) {
                if ($pair[0] == $unit_rule->unit_id && $pair[1] == $unit_rule->to_unit_id) {
                    $results[$key] = $unit_rule;
                    break;
                }
            }
        }

        foreach($characteristics as $characteristic)
        {
            if($characteristic->title && array_key_exists($characteristic->title->id, $results))
            {
                $characteristic->setUnitRule($results[$characteristic->title->id]);
            }
        }

        return $characteristics;
    }
}
