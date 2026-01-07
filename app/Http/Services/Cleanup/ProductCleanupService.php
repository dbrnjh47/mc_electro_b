<?php

namespace App\Http\Services\Cleanup;

use App\Models\Product\Document\ProductDocument;
use App\Models\Product\Label\ProductLabelOption;
use App\Models\Product\Product;
use App\Models\Product\ProductMedia;
use App\Models\Product\Review\ProductReviewMedia;
use Illuminate\Support\Facades\DB;

class ProductCleanupService extends CleanupService
{
    public function start()
    {
        $this->write("");
        $this->write("Удаление товаров");

        DB::beginTransaction();
        try {
            Product::query()->delete();
            // ProductLabelOption::query()->delete();

            $this->deleteFiles(ProductMedia::PATH."miniature", ProductMedia::TEST_FILES);
            $this->deleteFiles(ProductMedia::PATH."photo", ProductMedia::TEST_FILES);

            $this->deleteFiles(ProductReviewMedia::PATH."media", ProductReviewMedia::TEST_FILES);
            $this->deleteFiles(ProductReviewMedia::PATH."miniature", ProductReviewMedia::TEST_FILES);

            $this->deleteFiles(ProductDocument::PATH, ProductDocument::TEST_FILES);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error($e->getMessage());
        }
    }
}
