<?php

namespace App\Http\Services\Cleanup;

use App\Models\Banner\Banner;
use Illuminate\Support\Facades\DB;

class BannerCleanupService extends CleanupService
{
    public function start()
    {
        $this->write("");
        $this->write("Удаление банеров");

        DB::beginTransaction();
        try {
            Banner::query()->delete();

            $this->deleteFiles(Banner::PATH, Banner::TEST_FILES);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error($e->getMessage());
        }
    }
}
