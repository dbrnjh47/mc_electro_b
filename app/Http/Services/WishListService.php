<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class WishListService
{
    public $key;
    public function __construct()
    {
        $this->key = $this->getKey("wishlist");
        // dump($this->key);
    }
    public function get()
    {
        $favorites = Session::get('favorites', []);

        return $favorites;
    }

    public function add($product_id)
    {
        $product_id = (int)$product_id;

        $favorites = Session::get('favorites', []);
        if (!in_array($product_id, $favorites)) {
            $favorites[] = $product_id;
            Session::put('favorites', $favorites);
        }

        return;
    }

    public function delite()
    {

    }

    protected function getKey(string $type): string
    {
        // if (Auth::check()) {
        //     return "user_{$type}_" . Auth::id();
        // }

        return "{$type}_" . session_id();
    }
}
