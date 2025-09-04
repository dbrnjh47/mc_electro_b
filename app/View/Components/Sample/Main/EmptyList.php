<?php

namespace App\View\Components\Sample\Main;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EmptyList extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $title = "Пусто", public $text = null, public $button = null,)
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('sample.main.components.empty_list');
    }
}
