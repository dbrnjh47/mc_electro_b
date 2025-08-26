<?php

namespace App\Http\Services\UserCache;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;

class IndexService
{
    public $key, $type = "wishlist", $list;

    public function __construct()
    {
        $this->list = (Cache::get($this->key) ?? []);
    }

    public function get()
    {
        return $this->list;
    }

    public function clear()
    {
        Cache::forget($this->key);
        Cookie::queue(Cookie::forget($this->type));
    }

    public function setCookie()
    {
        $this->list = array_values($this->list);
        Cookie::queue($this->type, $this->key, (60 * 24 * 30));
        Cache::put($this->key, $this->list, (60 * 24 * 30));
        return;
    }

    protected function getKey(string $type)
    {
        $key = Cookie::get($type);

        if($key){
            return $key;
        }

        $key = "{$type}_" . Session::getId();
        return $key;
    }
}
