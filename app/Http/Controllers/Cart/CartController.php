<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\AddRequest;
use App\Http\Requests\Cart\DeleteRequest;
use App\Http\Requests\Cart\ShowRequest;
use App\Http\Services\BreadcrumbService;
use App\Http\Services\DeliveryMethod\DeliveryMethodService;
use App\Http\Services\User\CartService;
use App\Http\Standards\PaymentStandard;
use App\Models\Order\Payment\Payment;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function getBreadcrumb()
    {
        $breadcrumbs = (new BreadcrumbService);
        if(Auth::check())
        {
            $breadcrumbs->add("Профиль", route("profile"));
        }
        $breadcrumbs->add("Корзина", route("cart"));

        return $breadcrumbs;
    }

    public function showClear()
    {
        $title = "Корзина";
        $description = "";
        $breadcrumbs = $this->getBreadcrumb();
        return view('sample.main.pages.cart.clear', compact(
            "breadcrumbs",
            "title",
            "description"
        ));
    }

    public function show(ShowRequest $request)
    {
        $cart = (new CartService)->get();
        if(!$cart || $cart->products->isEmpty())
        {
            return $this->showClear();
        }

        $delivery_methods = (new DeliveryMethodService)->get()->keyBy("id");

        // нужно проверить, что выбранная доставка ещё актуальна
        if($cart->delivery_method_id)
        {
            (new DeliveryMethodService())->checkDefault($cart, $delivery_methods);
        }

        // нужно установить дефолтное значение
        if(!$cart->delivery_method_id)
        {
            (new DeliveryMethodService())->setDefault($cart, $delivery_methods);
        }

        // ксли нужно получить доп. информацию
        if($cart->delivery_method_id)
        {
            (new DeliveryMethodService())->addInfo($cart, $delivery_methods);
        }
        // dd($delivery_methods);
        //
        $paymentStandard = app()->make(PaymentStandard::class, [
            'params' => [
                "is_on" => 1,
            ]
        ]);

        $payments = Payment::standard($paymentStandard)->get()->keyBy('id');
        // dd($payments);
        //

        $breadcrumbs = $this->getBreadcrumb();

        //
        // $delivery_methods = $delivery_methods->keyBy("id");
        if(!$cart->phone && Auth::check())
        {
            $cart->phone = $this->user->phone;
        }
        if(!$cart->full_name && Auth::check())
        {
            $cart->full_name = $this->user->name;
        }

        $cart->save();
        $cart_array = $cart->formatToBasket();
        $delivery_methods_array = (new DeliveryMethodService)->format($delivery_methods);
        $current_delivery = ($cart->delivery_method_id ? $delivery_methods[$cart->delivery_method_id] : null);

        $title = "Корзина";
        $description = "";

        return view('sample.main.pages.cart.index', compact(
            "breadcrumbs",
            "title",
            "description",
            "cart",
            "cart_array",
            "delivery_methods",
            "delivery_methods_array",
            "payments",
            "current_delivery"
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
