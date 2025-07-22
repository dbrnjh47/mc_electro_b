<?php

namespace Database\Seeders\Company;

use App\Models\Company\Company;
use App\Models\Company\CompanyLocale;
use App\Models\Locale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $local = Locale::where("slug", "ru")->first();
        Company::factory(rand(3, 5))->has(
            CompanyLocale::factory(1)
                ->state(function (array $attributes, Company $company) use ($local) {
                    return [
                        'locale_id' => $local->id,
                        'company_id' => $company->id
                    ];
                }),
            'locale'
        )->create();

        $this->call(CompanyMediaSeeder::class);

        Company::where("id", 1)->update([
            "is_on" => 1
        ]);
    }
}
