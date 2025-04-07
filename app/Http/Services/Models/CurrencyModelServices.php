<?php

namespace App\Http\Services\Models;

use App\Models\Currency;

class CurrencyModelServices
{
    public $defult = "RUB";
    public function all()
    {
        return Currency::get();
    }

    public function find($id)
    {
        return Currency::find($id);
    }

    public function defult()
    {
        return Currency::where("abbreviation", $this->defult)->first();
    }
}
