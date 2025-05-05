<?php

namespace App\Http\Services\Models;

use App\Models\Currency;

class CurrencyModelService
{
    public $defult = "RUB";
    public function start()
    {
        return Currency::where("is_on", 1);
    }
    public function all()
    {
        return $this->start()->get();
    }

    public function find($id)
    {
        return $this->start()->find($id);
    }

    public function defult()
    {
        return $this->start()->where("abbreviation", $this->defult)->first();
    }
}
