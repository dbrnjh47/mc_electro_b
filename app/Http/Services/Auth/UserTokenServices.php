<?php

namespace App\Http\Services\Auth;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class UserTokenServices
{
    public $prefix = "user_auth_";
    public function create($user_id)
    {
        $token = Str::random(15);

        Cache::put($this->prefix.$token, $user_id, 3600); // 3600 - 1 час

        return $token;
    }

    public function distroy($token)
    {
        Cache::forget($this->prefix.$token);
        return;
    }

    public function first($token)
    {
        return Cache::get($this->prefix.$token);
    }
}
