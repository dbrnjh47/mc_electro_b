<?php

namespace App\Http\Controllers\Text;

use App\Http\Controllers\Controller;
use App\Http\Services\BreadcrumbService;

class PolicyController extends Controller
{
    public function show()
    {
        $title = __("page/policy.seo.title");
        $description = __("page/policy.seo.description");

        $breadcrumbs = (new BreadcrumbService);
        $breadcrumbs->add(__("page/policy.breadcrumbs.1"), route("agreement"));

        return view('sample.main.pages.text.policy', compact("breadcrumbs", "title", "description"));
    }
}
