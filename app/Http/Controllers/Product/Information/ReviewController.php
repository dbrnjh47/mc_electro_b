<?php

namespace App\Http\Controllers\Product\Information;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Information\Review\GetRequest;
use App\Models\Product\Review\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class ReviewController extends Controller
{
    const LIMIT = 5;
    public function get(GetRequest $request)
    {
        // dump($request->all());
        $reviews = ProductReview::query();

        $reviews->select(['id', 'quantity', 'product_id', 'user_id', 'created_at'])
            ->where([
                ["product_id", $request->product_id],
                ["is_on", 1],
            ]);

        $reviews->with([
            'descriptions' => function ($q) {
                $q->select(['id', 'text', 'type', 'product_review_id'])
                    ->orderByRaw("FIELD(type, 'comment', 'dignity', 'flaw')");
            },
            'medias' => function ($q) {
                $q->select(['id', 'name', 'product_review_id']);
            },
            'user' => function ($q) {
                $q->select(['id', 'name']);
            },
        ]);

        switch ($request->sort) {
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
        if ($reviews->isEmpty()) {
            abort(403, 'Ничего не найдено');
        }

        $html = '';

        foreach($reviews as $review)
        {
            $html .= Blade::render('
                <x-sample.main.product.information.review
                    :review="$review"
                />
            ', ['review' => $review]);
        }
        return $html;
    }
}
