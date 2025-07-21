<?php

namespace App\View\Components\Sample\Main;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Share extends Component
{
    public $url, $text;
    /**
     * Create a new component instance.
     */
    public function __construct($url = null, $text = null)
    {
        $this->text = $text;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('sample.main.components.share');
    }
}
