<?php

namespace App\Http\Services\Cleanup;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserCleanupService extends CleanupService
{
    public function start()
    {
        $this->write("");
        $this->write("Удаление пользователей");

        DB::beginTransaction();
        try {
            User::where("email", "!=","test@example.com")->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error($e->getMessage());
        }
    }
}
