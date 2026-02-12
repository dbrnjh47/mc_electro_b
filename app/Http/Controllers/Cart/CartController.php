<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\AddRequest;
use App\Http\Requests\Cart\DeleteRequest;
use App\Http\Requests\Cart\ShowRequest;
use App\Http\Services\BreadcrumbService;
use App\Http\Services\User\CartService;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function show(ShowRequest $request)
    {
        $cart = (new CartService)->get();

        //

        $breadcrumbs = (new BreadcrumbService);
        if(Auth::check())
        {
            $breadcrumbs->add("Профиль", route("profile"));
        }
        $breadcrumbs->add("Корзина", route("cart"));

        //

        $title = "Корзина";
        $description = "";
        return view('sample.main.pages.cart.index', compact(
            "breadcrumbs",
            "title",
            "description",
            "cart"
        ));
    }

    public function add(AddRequest $request)
    {
        (new CartService)->add($request->product_id, (isset($request->count) ? $request->count : null));
    }

    public function delete(DeleteRequest $request)
    {
        (new CartService)->delete($request->product_id);
    }

    public function clear()
    {
        (new CartService)->clear();
    }
}
