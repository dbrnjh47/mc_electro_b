<?php

namespace App\Http\Services\Import\MKElectro;

use App\Models\Property\Property;
use App\Models\Property\PropertyType;
use App\Models\Property\PropertyValue;
use App\Models\Unit\Unit;
use App\Models\Unit\UnitRule;
use Illuminate\Support\Facades\DB;

class PropertyImportService extends MKElectroImportService
{
    public $limit = 200;
    public $offset = 0;

    public function start()
    {
        $this->write("");
        $this->write("Создание ед. измерений");

        $this->unit();
        $this->unitRule();
        //
        $this->properties();
        $this->propertyValues();
    }

    public function propertyValues()
    {
        while (true) {
            $property_values = $this->api->getPropertyValue($this->limit, $this->offset);
            if (!$property_values) {
                // dump("Не удалось получить характеристики");
                break;
            }

            $propertyValuesToInsert = [];
            foreach ($property_values as $property_value) {
                if(!is_numeric($property_value["value"]))
                {
                    $propertyValuesToInsert[] = [
                        "value" => $property_value["value"],
                        "type" => "text",
                    ];
                } else {
                    $propertyValuesToInsert[] = [
                        "number" => $property_value["value"],
                        "type" => "float",
                    ];
                }
            }

            try {
                // Массовая вставка с игнорированием дубликатов
                PropertyValue::insertOrIgnore($propertyValuesToInsert);
            } catch (\Exception $e) {
                $this->error('Ошибка: ' . $e->getMessage());
            }

            $this->offset += $this->limit;
        }
    }

    public function properties()
    {
        $units = Unit::pluck('id', 'text')
            ->toArray();

        $property_types = PropertyType::pluck('id', 'type')
            ->toArray();

        while (true) {
            $properties = $this->api->getProperties($this->limit, $this->offset);

            if (!$properties) {
                // dump("Не удалось получить характеристики");
                break;
            }

            $propertiesToInsert = [];
            foreach ($properties as $property) {
                $propertiesToInsert[] = [
                    'title' => $property['title'],
                    'ordering' => $property['ordering'],
                    'is_on' => $property['is_on'],
                    'property_type_id' => (isset($property['type']) && $property['type'] && $property_types[$property['type']]
                        ? $property_types[$property['type']]
                        : null),
                    'property_section_id' => null,
                    'unit_id' => (isset($property['from_name']) && $property['from_name'] && $units[$property['from_name']]
                        ? $units[$property['from_name']]
                        : null),
                    'to_unit_id' => (isset($property['to_name']) && $property['to_name'] && $units[$property['to_name']]
                        ? $units[$property['to_name']]
                        : null),
                ];
            }

            try {
                // Массовая вставка с игнорированием дубликатов
                Property::insertOrIgnore($propertiesToInsert);
            } catch (\Exception $e) {
                $this->error('Ошибка: ' . $e->getMessage());
            }

            $this->offset += $this->limit;
        }
    }

    public function unitRule()
    {
        $unit_rules = $this->api->getUnitRules();

        if (!$unit_rules) {
            dump("Не удалось получить правила ед. измерений");
            exit();
        }

        foreach ($unit_rules as $unit_rule) {
            try {
                $ur = new UnitRule();
                $ur->fill([
                    "unit_id" => Unit::select("id")
                        ->where("text", $unit_rule["from_name"])
                        ->first()
                        ->id,
                    "to_unit_id" =>  Unit::select("id")
                        ->where("text", $unit_rule["to_name"])
                        ->first()
                        ->id,
                    "value" => $unit_rule["number"],
                    "action" => $unit_rule["action"],
                ]);
                $ur->save();
            } catch (\Exception $e) {
                $this->error($e->getMessage());
            }
        }
    }

    public function unit()
    {
        $units = $this->api->getUnits();

        if (!$units) {
            dump("Не удалось получить ед. измерений");
            exit();
        }

        Unit::insertOrIgnore($units);
    }
}
