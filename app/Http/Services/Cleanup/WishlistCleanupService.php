<?php

namespace App\Http\Services\Cleanup;

use App\Models\User\Wishlist\Wishlist;
use Illuminate\Support\Facades\DB;

class WishlistCleanupService extends CleanupService
{
    public function start()
    {
        $this->write("");
        $this->write("Удаление избранных");

        DB::beginTransaction();
        try {
            Wishlist::query()->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error($e->getMessage());
        }
    }
}
