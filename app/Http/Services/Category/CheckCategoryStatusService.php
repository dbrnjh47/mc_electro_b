<?php

namespace App\Http\Services\Category;

use App\Models\Category\Category;

class CheckCategoryStatusService
{
    public function process()
    {
        for ($i = 0; $i < 30; $i++) {
            $category_ids = Category::where("is_on", 1)
                ->whereHas('category', function ($q) {
                    $q->where("is_on", 0);
                })
                ->pluck('id');

            if ($category_ids->isNotEmpty()) {
                Category::whereIn('id', $category_ids)
                    ->update(['is_on' => 0]);

                if (app()->runningInConsole()) {
                    dump("Изменено {$category_ids->count()} строк");
                }
            } else {
                break;
            }
        }
    }
}
