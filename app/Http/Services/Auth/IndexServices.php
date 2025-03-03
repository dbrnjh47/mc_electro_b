<?php

namespace App\Http\Services\Auth;

use Illuminate\Support\Facades\Auth;

class IndexServices
{
    public function logout($request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return;
    }
}
