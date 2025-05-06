<?php

namespace App\Http\Migrations;

use App\Http\Services\Models\LocaleModelService;
use App\Models\City\CityLocale;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CityModelMigration
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
        Schema::create(CityLocale::$tabel_name.$local_slug, function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->unsignedBigInteger('city_id');

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists(CityLocale::$tabel_name.$local_slug);
    }
}
