<?php

namespace App\Http\Controllers\Product\Information;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Information\Review\GetRequest;
use App\Models\Product\Review\ProductReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    const LIMIT = 5;
    public function get(GetRequest $request)
    {
        dump($request->all());
        $reviews = ProductReview::query();

        $reviews->where([
            ["product_id", $request->product_id],
            ["is_on", 1],
            ["locale_id", app()->user_local->id],
        ]);

        switch($request->sort)
        {
            case "created_at_asc":
                $reviews->orderBy("created_at", "asc");
                break;
            case "created_at_desc":
                $reviews->orderBy("created_at", "desc");
                break;
        }

        $reviews = $reviews
            ->offset(self::LIMIT * $request->page)
            ->limit(self::LIMIT)
            ->get();
        dd($reviews);
    }
}
