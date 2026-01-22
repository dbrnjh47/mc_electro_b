<?php

namespace App\Models\Property;

use App\Models\Product\ProductProperty;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyValue extends Model
{
    /** @use HasFactory<\Database\Factories\Property\PropertyValueFactory> */
    use HasFactory;
    protected $guarded = false;
    public function productProperties()
    {
        return $this->hasMany(ProductProperty::class);
    }

    public function getVal($property)
    {
        if($property->unit_rule_id){
            return (isset($this->valueProccess)
                ? $this->format($this->valueProccess)." ".$property->toUnit->text
                : $this->format($this->proccessUnit($property->unit_rule_value, $property->unit_rule_action))." ".$property->toUnit->text
            );
        }
        if($property->toUnit){
            return $this->format($this->number)." ".$property->toUnit->text;
        }
        if($property->unit){
            return $this->format($this->number)." ".$property->unit->text;
        }
        return ($this->value ? $this->value : $this->format($this->number));
    }

    public function proccessUnit($value, $action)
    {
        if(!$action){return $this->number;}
        switch ($action) {
            case "/":
                $this->valueProccess = ($this->number / $value);
                break;
            case "*":
                $this->valueProccess = ($this->number * $value);
                break;
        }

        return $this->valueProccess;
    }

    public function format($number)
    {
        if (is_int($number) || $number == floor($number)) {
            // Целое число - без десятичных
            return number_format($number, 0, '', ' ');
        } else {
            // Дробное число - с десятичными
            $formatted = number_format($number, 2, '.', ' ');
            return rtrim(rtrim($formatted, '0'), '.');
        }
    }
}
