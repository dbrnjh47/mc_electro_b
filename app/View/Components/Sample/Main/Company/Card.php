<?php

namespace App\View\Components\Sample\Main\Company;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $company;
    /**
     * Create a new component instance.
     */
    public function __construct($company = null)
    {
        $this->company = $company;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if(!$this->company){return "";}
        return view('sample.main.pages.company.components.card');
    }
}
