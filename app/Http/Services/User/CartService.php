<?php

namespace App\Http\Services\User;

use App\Http\Standards\ProductStandard;
use App\Models\Cart\Cart;
use App\Models\Cart\CartProduct;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CartService
{
    public $id = null, $type = "cart", $cart = null;
    // public $limit = 10;
    public function __construct($is_start = 1)
    {
        if($is_start)
        {
            $this->id = $this->getID();
            $this->getCart();

            if ($this->cart && !$this->id) {
                $this->id = $this->cart->id;
            }

            // если авторезовался
            if ($this->cart) {
                $this->setCookie();
            }
            if ($this->cart && Auth::check() && !$this->cart->user_id) {
                $this->setUserId();
            }
        }
    }

    // количество элементов
    public function count()
    {
        if (!$this->cart) {
            return 0;
        }

        return CartProduct::where("cart_id", $this->cart->id)->count();
    }

    public function get()
    {
        if (!$this->cart) {
            return null;
        }

        $productModel = new Product();
        $wishlist_id = (new WishListService(0))->getID();

        $productStandard = app()->make(ProductStandard::class, [
            'params' => [
                "is_on" => 1,
                "wishlist" => $wishlist_id,
                "preview" => 1,
                "labels" => 1,
                "point_count" => 0,
            ]
        ]);

        $this->cart = Cart::with(['products' => function ($q) use ($productStandard, $productModel) {
                $q->select([$productModel->getTable().'.id', 'mrp', 'slug', 'step', 'name', 'uuid', DB::raw('1 as cart_products_count')])
                    ->standard($productStandard);
            }])
            ->find($this->cart->id);

        return $this->cart;
    }

    // добавить товар
    public function add($product_id, $count = 1)
    {
        if (!$this->cart) {
            $this->create();
        }

        $product_id = (int)$product_id;
        $count = (int)$count;
        // делаю запрос в бд с ид cart и product_id, если записи нету, то создаю
        CartProduct::updateOrCreate(
            [
                'cart_id' => $this->cart->id,
                'product_id' => $product_id
            ],
            [
                'count' => $count
            ]
        );

        return;
    }

    // удаляю товар
    public function delete($product_id)
    {
        if (!$this->cart) {
            return;
        }
        $product_id = (int)$product_id;

        // по cart_id и product_id удаляю без проверок
        CartProduct::where([
            ["cart_id", $this->cart->id],
            ["product_id", $product_id]
        ])->delete();

        return;
    }

    // очистка
    public function clear()
    {
        if ($this->cart) {
            $this->cart->delete();
            $this->cart = null;
        }
        Cookie::queue(Cookie::forget($this->type));
    }

    public function create()
    {
        // создаю cart
        $cart = new Cart;

        if (Auth::check()) {
            $cart->user_id = app()->user->id;
        }

        $cart->save();
        $this->id = $cart->id;
        $this->setCookie();

        $this->cart = $cart;
    }

    //

    public function setCookie()
    {
        Cookie::queue($this->type, $this->id, (60 * 24 * 30));
        return;
    }

    public function getID()
    {
        $id = Cookie::get($this->type);

        if ($id && $id != "") {
            return $id;
        }

        return null;
    }

    public function setUserId()
    {
        // dump("setUserId");
        Cart::where("user_id", app()->user->id)->delete();
        $this->cart->user_id = app()->user->id;
        $this->cart->save();
    }

    public function getCart()
    {
        $list = Cart::query();
        if (!Auth::check() && !$this->id) {
            return;
        }

        if ($this->id) {
            $list->where("id", $this->id);
        } else {
            $list->where("user_id", app()->user->id);
        }

        $this->cart = $list->first();

        return;
    }
}
