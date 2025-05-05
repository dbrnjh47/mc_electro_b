<?php

namespace App\Http\Migrations;

use App\Http\Services\Models\LocaleModelService;
use App\Models\Country\CountryLocale;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CountryModelMigration
{
    public function createAll()
    {
        $locals = (new LocaleModelService)->get();
        foreach($locals as $local)
        {
            $this->create($local->slug);
        }
    }

    public function create($local_slug)
    {
        Schema::create(CountryLocale::$tabel_name.$local_slug, function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('official');
            $table->unsignedBigInteger('country_id');

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    //

    public function dropAll()
    {
        $locals = (new LocaleModelService)->get();
        foreach($locals as $local)
        {
            $this->drop($local->slug);
        }
    }

    public function drop($local_slug)
    {
        Schema::dropIfExists(CountryLocale::$tabel_name.$local_slug);
    }
}
