<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyMedia extends Model
{
    /** @use HasFactory<\Database\Factories\Company\CompanyMediaFactory> */
    use HasFactory;

    const PATH = "/assets/companies/media/";
    const TEST_FILES = ["1.png"];
}
