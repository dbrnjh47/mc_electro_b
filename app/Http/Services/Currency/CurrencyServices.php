<?php

namespace App\Http\Services\Currency;

use App\Models\Currency;
use Illuminate\Support\Facades\Cookie;

use App\Http\Services\API\ExchangerateApi;

class CurrencyServices
{
    // public static function conversion($sum, $productCurrency, $userCurrencie)
    // {
    //     if(is_int($productCurrency)){$productCurrency = (new CurrencieServices)->find(1);}
    //     if(is_int($userCurrencie)){$userCurrencie = (new CurrencieServices)->find($userCurrencie);}


    //     $sum = ($sum / $productCurrency->to_usd) * $userCurrencie->to_usd;
    //     return [
    //         "normal" => $sum,
    //         "finance_format" => number_format($sum, 0, '.', ',')
    //     ];
    //     return $sum;
    // }

    // public function all()
    // {
    //     return CurrencyServices::get();
    // }

    // public function find($id)
    // {
    //     return CurrencyServices::find($id);
    // }

    // public function get()
    // {
    //     $currencie = Cookie::get('currencie');
    //     $currencie = $this->find($currencie);

    //     if(!$currencie)
    //     {
    //         $currencie = Currencie::first();
    //         $this->set($currencie->id);
    //     }
    //     return $currencie;
    // }

    public function set($id)
    {
        cookie()->queue('currency', $id, 8400600);
        return;
    }

    public function update()
    {
        return 1;
        $currencies = $this->all();
        $allInfoCurrencies = (new ExchangerateApi)->getCurrencies();

        foreach($currencies as $currency)
        {
            $currency->to_usd = $allInfoCurrencies["conversion_rates"][$currency->currency];
            $currency->save();
        }

        return;
    }
}
