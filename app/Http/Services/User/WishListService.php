<?php

namespace App\Http\Services\User;

use App\Http\Services\Models\Product\ProductModelService;
use App\Models\User\Wishlist\Wishlist;
use App\Models\User\Wishlist\WishlistProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class WishListService
{
    public $id = null, $type = "wishlist", $wishlist = null;
    public $limit = 10;
    public function __construct($is_start = 1)
    {
        if($is_start)
        {
            $this->id = $this->getID();
            $this->getWishlist();

            if ($this->wishlist && !$this->id) {
                $this->id = $this->wishlist->id;
            }

            // если авторезовался
            if ($this->wishlist) {
                $this->setCookie();
            }
            if ($this->wishlist && Auth::check() && !$this->wishlist->user_id) {
                $this->setUserId();
            }
        }
    }

    // количество элементов
    public function count()
    {
        if (!$this->wishlist) {
            return 0;
        }

        return WishlistProduct::where("wishlist_id", $this->wishlist->id)->count();
    }

    // получить список
    public function get()
    {
        if (!$this->wishlist) {
            return null;
        }

        // получаю список и возвращаю
        return WishlistProduct::where("wishlist_id", $this->wishlist->id)
            ->with([
                'product' => function ($q) {
                    $q = (new ProductModelService(select_list: ['id', 'mrp', 'slug', 'step', 'name', 'article', DB::raw('1 as wishlist_products_count')], model: $q))
                        ->getModel()
                        ->with([
                            'medias' => function ($q2) {
                                $q2->select(['name', 'product_id'])->limit(1);
                            },
                        ])
                        ->where(function ($q2) {
                            $q2->whereNull('company_id')
                                ->orWhereHas('company', function ($q3) {
                                    $q3->where('is_on', 1);
                                });
                        });
                },
            ])
            ->whereHas('product', function ($q) {
                $q = $q
                    ->where(function ($q2) {
                        $q2->whereNull('company_id')
                            ->orWhereHas('company', function ($q3) {
                                $q3->where('is_on', 1);
                            });
                    });
            })
            ->paginate($this->limit);
    }

    // добавить товар
    public function add($product_id)
    {
        if (!$this->wishlist) {
            $this->create();
        }

        $product_id = (int)$product_id;
        // делаю запрос в бд с ид wishlist и product_id, если записи нету, то создаю
        WishlistProduct::firstOrCreate(
            [
                'wishlist_id' => $this->wishlist->id,
                'product_id' => $product_id
            ],
            []
        );

        return;
    }

    // удаляю товар
    public function delite($product_id)
    {
        if (!$this->wishlist) {
            return;
        }
        $product_id = (int)$product_id;

        // по ид wishlist и product_id удаляю без проверок
        WishlistProduct::where([
            ["wishlist_id", $this->wishlist->id],
            ["product_id", $product_id]
        ])->delete();

        return;
    }

    // очистка
    public function clear()
    {
        if ($this->wishlist) {
            $this->wishlist->delete();
            $this->wishlist = null;
        }
        Cookie::queue(Cookie::forget($this->type));
    }

    public function create()
    {
        // создаю wishlist
        $wishlist = new Wishlist;

        if (Auth::check()) {
            $wishlist->user_id = app()->user->id;
        }

        $wishlist->save();
        $this->id = $wishlist->id;
        $this->setCookie();

        $this->wishlist = $wishlist;
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
        Wishlist::where("user_id", app()->user->id)->delete();
        $this->wishlist->user_id = app()->user->id;
        $this->wishlist->save();
    }

    public function getWishlist()
    {
        $list = Wishlist::query();
        if (!Auth::check() && !$this->id) {
            return;
        }

        if ($this->id) {
            $list->where("id", $this->id);
        } else {
            $list->where("user_id", app()->user->id);
        }

        $this->wishlist = $list->first();

        return;
    }
}
