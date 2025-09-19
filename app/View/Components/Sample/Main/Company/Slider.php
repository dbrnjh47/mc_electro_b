<?php

namespace App\View\Components\Sample\Main\Company;

use App\Models\Company\Company;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Slider extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $companies = null)
    {
        if(!$this->companies)
        {
            $this->companies = Company::select(['id', 'preview', 'name', 'slug'])
                ->where('is_on', 1)
                ->whereNotNull("preview")
                ->inRandomOrder()
                ->limit(15)
                ->get();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('sample.main.pages.company.components.slider');
    }
}
