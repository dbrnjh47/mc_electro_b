<?php

namespace App\Http\Services\Modals;

use App\Models\Locale;

class LocaleModalServices
{
    public function firstBySlug($slug)
    {
        return Locale::where("slug", $slug)->where("is_configured", 1)->first();
    }
}
