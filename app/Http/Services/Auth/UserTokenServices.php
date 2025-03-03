<?php

namespace App\Http\Services\Auth;

use App\Models\UserToken;
use Illuminate\Support\Str;

class UserTokenServices
{
    public function create($user_id)
    {
        $code = Str::random(15);

        $this->distroy($user_id);

        $user_token = UserToken::create([
            'user_id' => $user_id,
            'code' => $code,
        ]);

        return $user_token;
    }

    public function distroy($user_id)
    {
        UserToken::where("user_id", $user_id)->delete();
        return;
    }

    public function first($user_id, $token)
    {
        return UserToken::with("user")->where("user_id", $user_id)->where("code", $token)->firstOrFail();
    }

    public function find($id)
    {
        return UserToken::with("user")->findOrFail($id);
    }
}
