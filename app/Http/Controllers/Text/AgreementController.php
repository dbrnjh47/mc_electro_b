<?php

namespace App\Http\Controllers\Text;

use App\Http\Controllers\Controller;
use App\Http\Services\BreadcrumbService;

class AgreementController extends Controller
{
    public function show()
    {
        $title = __("page/agreement.seo.title");
        $description = __("page/agreement.seo.description");

        $breadcrumbs = (new BreadcrumbService);
        $breadcrumbs->add(__("page/agreement.breadcrumbs.1"), route("agreement"));

        return view('sample.main.pages.text.agreement', compact("breadcrumbs", "title", "description"));
    }
}
