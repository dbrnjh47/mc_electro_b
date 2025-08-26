<?php

namespace App\Http\Services\User;

use App\Models\User\Wishlist\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;

class WishListService
{
    public $key = null, $type = "wishlist", $wishlist = null;
    public function __construct()
    {
        if(!Auth::check()){$this->key = $this->getKey($this->type);}
        $this->getWishlist();
    }

    // количество элементов
    public function count()
    {

    }

    // получить список
    public function get()
    {
        if(!$this->wishlist){return null;}

        // получаю список и возвращаю
    }

    // добавить товар
    public function add($product_id)
    {
        if(!$this->wishlist){
            // создаю wishlist
            // если нужно setCookie()
        }

        $product_id = (int)$product_id;
        // делаю запрос в бд с ид wishlist и product_id, если записи нету, то создаю

        return;
    }

    // удаляю товар
    public function delite($product_id)
    {
        if(!$this->wishlist){return;}
        $product_id = (int)$product_id;

        // по ид wishlist и product_id удаляю без проверок

        return;
    }

    // очистка
    public function clear()
    {
        if($this->wishlist){$this->wishlist->delete(); $this->wishlist = null;}
        Cookie::queue(Cookie::forget($this->type));
    }

    //

    public function setCookie()
    {
        Cookie::queue($this->type, $this->key, (60 * 24 * 30));
        return;
    }

    protected function getKey(string $type)
    {
        $key = Cookie::get($type);
        if($key){return $key;}

        // генерирую свободный код
        while(true)
        {
            $key = "{$type}_" . str()->random(random_int(12, 60));
            if(!Wishlist::where("key", $key)->count()){break;}
        }

        return $key;
    }

    public function getWishlist()
    {
        $list = Wishlist::query();

        if($this->key)
        {
            $list->where("key", $this->key);
        } else
        {
            $list->where("user_id", app()->user->id);
        }

        $this->wishlist = $list->first();

        return;
    }
}
