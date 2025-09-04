<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ShowWishlistRequest;
use App\Http\Requests\Profile\Wishlist\AddRequest;
use App\Http\Requests\Profile\Wishlist\DeleteRequest;
use App\Http\Requests\Profile\Wishlist\ShowRequest;
use App\Models\Product\Product;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use App\Http\Services\BreadcrumbService;
use App\Http\Services\User\WishListService;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public $limit = 9;
    public function show(ShowRequest $request)
    {
        $wish_list_products = (new WishListService)->get();
        // dd($wish_list_products);
        //

        $breadcrumbs = (new BreadcrumbService);
        if(Auth::check())
        {
            $breadcrumbs->add("Профиль", route("profile"));
        }
        $breadcrumbs->add("Избранное", route("wishlist"));

        return view('sample.main.pages.profile.wishlist', [
            'title' => "Избранное",
            'description' => "",
            'wish_list_products' => $wish_list_products,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    public function add(AddRequest $request)
    {
        (new WishListService)->add($request->product_id);
    }

    public function delete(DeleteRequest $request)
    {
        (new WishListService)->delete($request->product_id);
    }

    public function clear()
    {
        (new WishListService)->clear();
    }
}
