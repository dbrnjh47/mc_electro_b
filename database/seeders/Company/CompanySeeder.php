<?php

namespace Database\Seeders\Company;

use App\Models\Company\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::factory(rand(3, 5))->create();

        $this->call(CompanyMediaSeeder::class);

        Company::where("id", 1)->update([
            "is_on" => 1
        ]);
    }
}
