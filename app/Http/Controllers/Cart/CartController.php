<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Services\BreadcrumbService;

class CartController extends Controller
{
    public function show()
    {
        $breadcrumbs = (new BreadcrumbService);
        $breadcrumbs->add("Корзина", "");

        //

        $title = "Корзина";
        $description = "";
        return view('sample.main.pages.cart.index', compact(
            "breadcrumbs",
            "title",
            "description"
        ));
    }
}
