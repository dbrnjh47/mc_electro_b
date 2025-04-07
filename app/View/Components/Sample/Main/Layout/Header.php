<?php

namespace App\View\Components\Sample\Main\Layout;

use App\Http\Controllers\Controller;
use App\Http\Services\Locale\IndexServices as LocaleServices;
use App\Http\Services\Models\CurrencyModelServices;
use App\Http\Services\Models\LocaleModelServices;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public $start;
    /**
     * Create a new component instance.
     */
    public function __construct($start = 0)
    {
        $this->start = $start;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

            (new Controller)->__construct();


        $locales = (new LocaleModelServices)->get();
        //
        $currencies = (new CurrencyModelServices)->all();
        return view('sample.main.layouts.components.header.index', compact("locales", "currencies"));
    }
}
