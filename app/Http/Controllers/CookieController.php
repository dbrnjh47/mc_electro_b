<?php

namespace App\Http\Controllers;

class CookieController
{
    public function agreement()
    {
        return response()->json([
            'success' => true,
        ])
            ->cookie('cookie_checked', 'true', 60 * 24 * 30); // 30 дней
    }

    public function city()
    {
        return response()->json([
            'success' => true,
        ])
            ->cookie('city_checked', 'true', 60 * 24 * 30); // 30 дней
    }
}
