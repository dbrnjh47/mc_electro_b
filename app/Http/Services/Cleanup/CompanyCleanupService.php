<?php

namespace App\Http\Services\Cleanup;

use App\Models\Company\Company;
use App\Models\Company\CompanyMedia;
use Illuminate\Support\Facades\DB;

class CompanyCleanupService extends CleanupService
{
    public function start()
    {
        $this->write("");
        $this->write("Удаление компаний");

        DB::beginTransaction();
        try {
            Company::query()->delete();

            $this->deleteFiles(Company::PATH_PREVIEW, Company::TEST_FILES);
            $this->deleteFiles(CompanyMedia::PATH, CompanyMedia::TEST_FILES);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error($e->getMessage());
        }
    }
}
