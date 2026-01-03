<?php

namespace App\Http\Services\Cleanup;

use App\Models\Property\Property;
use App\Models\Property\PropertySection;
use App\Models\Property\PropertyValue;
use App\Models\Unit\Unit;
use Illuminate\Support\Facades\DB;

class PropertyCleanupService extends CleanupService
{
    public function start()
    {
        $this->write("");
        $this->write("Удаление характеристик/фильтров/units");

        DB::beginTransaction();
        try {
            Property::query()->delete();
            PropertyValue::query()->delete();
            PropertySection::query()->delete();
            Unit::query()->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error($e->getMessage());
        }
    }
}
