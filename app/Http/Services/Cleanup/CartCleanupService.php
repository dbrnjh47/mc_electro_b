<?php

namespace App\Http\Services\Cleanup;

use App\Models\Banner;
use App\Models\Cart\Cart;
use Illuminate\Support\Facades\DB;

class CartCleanupService extends CleanupService
{
    public function start()
    {
        $this->write("");
        $this->write("Удаление корзин");

        DB::beginTransaction();
        try {
            Cart::query()->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error($e->getMessage());
        }
    }
}
