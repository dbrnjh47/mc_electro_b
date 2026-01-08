<?php

namespace App\Observers;

use App\Http\Services\Product\ProductCategoryService;
use App\Models\Category\Category;
use App\Models\Category\Subcategory;
use Illuminate\Support\Facades\Artisan;

class CategoryObserver
{
    public function created(Category $category): void
    {
        $category->createSubCategory();
        $category->createCategoryPath();
        (new ProductCategoryService)->update($category->id, $category->category_parent_id);

        Artisan::call('app:check-category-status-command');
    }

    public function updated(Category $category): void
    {
        if ($category->wasChanged("category_parent_id")) {
            $category->deleteSubCategory();
            $category->createSubCategory();
            $category->createCategoryPath();
            (new ProductCategoryService)->update($category->id, $category->category_parent_id, $category->getOriginal('category_parent_id'));

            Artisan::call('app:check-category-status-command');
        }
    }
}
