<?php

namespace App\Http\Services\UserCache;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;

class WishListService extends IndexService
{
    public function __construct()
    {
        $this->key = $this->getKey($this->type);
        parent::__construct();
    }

    public function add($product_id)
    {
        $product_id = (int)$product_id;

        if(!in_array($product_id, $this->list)) {
            $this->list[] = $product_id;
            $this->setCookie();
        }

        return;
    }

    public function delite($product_id)
    {
        $product_id = (int)$product_id;

        if(in_array($product_id, $this->list)) {
            $this->list = array_diff($this->list, [$product_id]);
            $this->setCookie();
        }

        return;
    }
}
