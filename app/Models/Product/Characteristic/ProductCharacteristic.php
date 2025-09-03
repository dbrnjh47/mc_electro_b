<?php

namespace App\Models\Product\Characteristic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCharacteristic extends Model
{
    /** @use HasFactory<\Database\Factories\Product\Characteristic\ProductCharacteristicFactory> */
    use HasFactory;

    public function title()
    {
        return $this->hasOne(ProductCharacteristicTitle::class, 'id', 'product_characteristic_title_id');
    }

    public function getValueName()
    {
        if($this->valueName){return $this->valueName;}
        $this->valueName = "";

        if($this->unitRule && $this->title && $this->title->toUnit){
            $this->valueName = $this->title->toUnit->text;
        } else if($this->title && $this->title->unit) {
            $this->valueName = $this->title->unit->text;
        }

        return $this->valueName;
    }

    public function setUnitRule($unitRule)
    {
        $this->unitRule = $unitRule;
    }

    public function getValueProccess()
    {
        if(isset($this->valueProccess) && $this->valueProccess){return $this->valueProccess;}
        $this->valueProccess = $this->value;

        if(!$this->valueProccess || !$this->title || !$this->title->unit_id || !$this->title->to_unit_id || !$this->unitRule)
        {
            return $this->valueProccess;
        }

        return $this->proccessUnit();
    }

    public function proccessUnit()
    {
        switch ($this->unitRule->action) {
            case "/":
                $this->valueProccess = ($this->valueProccess / $this->unitRule->value);
                break;
            case "*":
                $this->valueProccess = ($this->valueProccess * $this->unitRule->value);
                break;
        }

        // cleanFloat?
        return $this->valueProccess;
    }

    // public static function cleanFloat($v)
    // {
    //     // return $v;
    //     $digits = 10;
    //     if ($v == 0) return 0;
    //     $scale = pow(10, $digits - floor(log10(abs($v))) - 1);
    //     return round($v * $scale) / $scale;
    // }
}
