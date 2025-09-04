<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ShowWishlistRequest;

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
    public function show(ShowWishlistRequest $request)
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

    public function clear()
    {
        (new WishListService)->clear();
    }
}
