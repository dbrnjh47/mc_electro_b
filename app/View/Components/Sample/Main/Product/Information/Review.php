<?php

namespace App\View\Components\Sample\Main\Product\Information;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Review extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $review, public $product_name = null)
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('sample.main.pages.product.components.review');
    }
}
