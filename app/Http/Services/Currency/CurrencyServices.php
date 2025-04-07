<?php

namespace App\Http\Services\Currency;

use App\Http\API\ExchangerateApi;
use Illuminate\Support\Facades\Cookie;

use App\Http\Services\Models\CurrencyModelServices;

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

    public function get()
    {
        $currency_id = Cookie::get('user_currency');
        $currency = (new CurrencyModelServices)->find($currency_id);

        if(!$currency)
        {
            $currency = (new CurrencyModelServices)->defult();
            $this->set($currency->id);
        }

        return $currency;
    }

    public function set($id)
    {
        Cookie::queue('user_currency', $id, (60 * 24 * 7));
        // setcookie("user_currency", $id, time()+(525600*60), "/", $_SERVER['HTTP_HOST']);
        return;
    }

    public function update()
    {
        $currencies = (new CurrencyModelServices)->all();
        $allInfoCurrencies = (new ExchangerateApi)->getCurrencies();
        foreach($currencies as $currency)
        {
            $currency->to = $allInfoCurrencies["conversion_rates"][$currency->abbreviation];
            $currency->save();
        }

        return;
    }
}
