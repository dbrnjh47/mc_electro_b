<?php

namespace App\Http\Services\DeliveryMethod\Modal;

use App\Http\Filters\PointFilter;
use App\Http\Standards\PointStandard;
use App\Models\Cart\CartProduct;
use App\Models\Point\Point;
use Illuminate\Support\Facades\DB;

class PickupModal
{
    public $limit = 5;
    public function start($delivery_method, $cart)
    {
        $cart_product_ids = CartProduct::where('cart_id', $cart->id)
            ->pluck('product_id')
            ->toArray();
        $total_count = count($cart_product_ids);
        // есть ли товары вообще
        $hasAvailableProducts = Point::with([
            "product_point" => function ($q) use ($cart_product_ids) {
                $q->whereIn("product_id", $cart_product_ids);
            }
        ])->exists();


        $points = $this->getPoints(
            cart_id: $cart->id,
            cart_product_ids: $cart_product_ids
        );

        if ($points->isEmpty()) {
            return null;
        }

        return view(
            'sample.main.pages.cart.components.modal.point',
            compact(
                "points",
                "delivery_method",
                "cart",
                "hasAvailableProducts",
                "total_count"
            )
        );
    }

    public function getHtmlPoints($cart, $request)
    {
        $cart_product_ids = CartProduct::where('cart_id', $cart->id)
            ->pluck('product_id')
            ->toArray();
        $total_count = count($cart_product_ids);
        // есть ли товары вообще
        $hasAvailableProducts = Point::with([
            "product_point" => function ($q) use ($cart_product_ids) {
                $q->whereIn("product_id", $cart_product_ids);
            }
        ])->exists();

        $points = $this->getPoints(
            search: ($request->search ? $request->search : null),
            page:$request->page,
            cart_id: $cart->id,
            cart_product_ids: $cart_product_ids
        );
        if ($points->isEmpty()) {
            return null;
        }

        return view(
            'sample.main.pages.cart.components.modal.point.list',
            compact(
                "points",
                "cart",
                "hasAvailableProducts",
                "total_count"
            )
        );
    }

    public function getPoints($cart_id, $cart_product_ids, $search = null, $page = 1)
    {
        $city_id = (app()->user_city ? app()->user_city->id : 0);
        if (!$city_id) {
            return null;
        }

        $pointStandard = app()->make(PointStandard::class, ['params' => [
            "is_on" => 1,
            "is_pickup" => 1
        ]]);

        //

        $pointFilter = app()->make(PointFilter::class, ['params' => [
            "city_id" => $city_id,
            "search" => $search
        ]]);

        //

        $points = Point::select(
            'points.*',
            // Количество позиций из корзины, которые есть на точке
            DB::raw('COUNT(DISTINCT product_points.product_id) as available_positions_count'),
            // Сколько товаров из корзины можно купить на этой точке
            DB::raw('SUM(
                CASE
                    WHEN product_points.count >= cart_products.count THEN cart_products.count
                    ELSE product_points.count
                END
            ) as available_items_count'),
            DB::raw('COALESCE(SUM(product_points.count), 0) as total_stock_count')
        )
            ->standard($pointStandard)
            ->filter($pointFilter)
            ->leftJoin('product_points', function ($join) use ($cart_product_ids) {
                $join->on('points.id', '=', 'product_points.point_id')
                    ->whereIn('product_points.product_id', $cart_product_ids);
            })
            ->leftJoin('cart_products', function ($join) use ($cart_id) {
                $join->on('cart_products.product_id', '=', 'product_points.product_id')
                    ->where('cart_products.cart_id', '=', $cart_id);
            })
            ->groupBy('points.id')
            ->orderByDesc('available_positions_count')
            ->orderByDesc('available_items_count')
            ->orderByDesc('total_stock_count')
            ->paginate($this->limit, page: $page);
        // ->toSql();

        // dd($points);
        return $points;
    }
}
