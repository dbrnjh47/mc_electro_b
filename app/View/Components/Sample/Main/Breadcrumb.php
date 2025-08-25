<?php

namespace App\View\Components\Sample\Main;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $breadcrumbs;
    /**
     * Create a new component instance.
     */
    public function __construct($breadcrumbs)
    {
        $breadcrumbs->add("Главная", route("home"), move_to_start:1);
        $this->breadcrumbs = $breadcrumbs->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('sample.main.components.breadcrumb');
    }
}
