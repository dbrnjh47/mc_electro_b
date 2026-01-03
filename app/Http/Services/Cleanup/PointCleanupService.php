<?php

namespace App\Http\Services\Cleanup;

use App\Models\Point\Point;
use App\Models\Point\PointPhoto;
use Illuminate\Support\Facades\DB;

class PointCleanupService extends CleanupService
{
    public function start()
    {
        $this->write("");
        $this->write("Очистка контактов/точек");

        DB::beginTransaction();
        try {
            Point::query()->delete();

            $this->deleteFiles(PointPhoto::PATH, PointPhoto::TEST_FILES);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error($e->getMessage());
        }
    }
}
