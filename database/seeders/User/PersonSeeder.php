<?php

namespace Database\Seeders\User;

use App\Models\User\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    public $persons = [
        [
            "person" => 'individual',
            "comment" => 'Физ. лицо',
        ],
        [
            "person" => 'legal',
            "comment" => 'Юр. лицо',
        ],
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->persons as $person)
        {
            Person::factory(1)->create($person);
        }
    }
}
