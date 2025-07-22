<?php

namespace Database\Seeders\Company;

use App\Models\Company\Company;
use App\Models\Company\CompanyMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company_ids = Company::where("id", "!=", 1)->pluck('id')->all();
        foreach($company_ids as $company_id)
        {
            if(rand(0, 100) < 90)
            {
                CompanyMedia::factory(rand(2,5))
                    ->create([
                        'company_id' => $company_id
                    ]);
            }
        }
    }
}
