<?php

namespace App\Http\Services\Cleanup;

use App\Models\Category\Category;
use Illuminate\Support\Facades\DB;

class CategoryCleanupService extends CleanupService
{
    public function start()
    {
        $this->write("");
        $this->write("Удаление категорий");

        DB::beginTransaction();
        try {
            Category::query()->delete();

            $this->deleteFiles(Category::PATH, Category::TEST_FILES);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error($e->getMessage());
        }
    }
}
