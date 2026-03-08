<?php

namespace App\View\Components\Sample\Main\Layout;

use App\Http\Controllers\Controller;
use App\Http\Services\Models\CurrencyModelService;
use App\Http\Services\User\CartService;
use App\Http\Services\User\WishListService;
use App\Models\Product\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

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
        if ($this->start) {
            (new Controller)->__construct();
        }
        $search_strings = Cache::remember('header.search.strings', Carbon::now()->addDays(1), function () {
            return Product::inRandomOrder()
                ->limit(5)
                ->pluck('name')
                ->toArray();
        });
        //
        // $currencies = (new CurrencyModelService)->all();
        $wishlist_count = (new WishListService)->count();
        $cart_count = (new CartService)->count();

        return view('sample.main.layouts.components.header.index', compact(
            "search_strings",
            "wishlist_count",
            "cart_count",
        ));
    }
}
