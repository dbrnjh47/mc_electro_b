<?php

namespace App\Http\Services\Models;

use App\Models\Locale;

class LocaleModelServices
{
    public function firstBySlug($slug)
    {
        return Locale::where("slug", $slug)->where("is_configured", 1)->first();
    }

    public function get()
    {
        return Locale::where("is_configured", 1)->get();
    }
}
