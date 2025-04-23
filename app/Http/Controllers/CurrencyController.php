<?php

namespace App\Http\Controllers;

use App\Http\Requests\Currency\SetRequest;
use App\Http\Services\Currency\CurrencyService;
use Illuminate\Http\Request;

class CurrencyController
{
    public function set(SetRequest $request)
    {
        (new CurrencyService)->set($request->id);
        return redirect()->back();
    }
}
