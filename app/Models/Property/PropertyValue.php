<?php

namespace App\Models\Property;

use App\Models\Product\ProductProperty;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyValue extends Model
{
    /** @use HasFactory<\Database\Factories\Property\PropertyValueFactory> */
    use HasFactory;
    public function productProperties()
    {
        return $this->hasMany(ProductProperty::class);
    }

    public function getVal($property)
    {
        if($property->unitRules){
            return (isset($this->valueProccess)
                ? $this->format($this->valueProccess)." ".$property->toUnit->text
                : $this->format($this->proccessUnit($property->unitRules))." ".$property->toUnit->text
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

    public function proccessUnit($unitRule)
    {
        if(!$unitRule){return $this->number;}
        switch ($unitRule->action) {
            case "/":
                $this->valueProccess = ($this->number / $unitRule->value);
                break;
            case "*":
                $this->valueProccess = ($this->number * $unitRule->value);
                break;
        }

        return $this->valueProccess;
    }

    public function format($number)
    {
        return number_format($number, 2, '.', ' ');
    }
}
