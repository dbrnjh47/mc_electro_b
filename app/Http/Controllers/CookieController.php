<?php

namespace App\Http\Controllers;

class CookieController
{
    public function agreement()
    {
        return response()->json([
            'success' => true,
        ])
            ->cookie('cookies_checked', 'true', 60 * 24 * 30); // 30 дней
    }
}
