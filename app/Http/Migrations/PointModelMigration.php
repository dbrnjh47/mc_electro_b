<?php

namespace App\Http\Migrations;

use App\Http\Services\Models\LocaleModelServices;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class PointModelMigration
{
    public function createAll()
    {
        $locals = (new LocaleModelServices)->get();
        foreach($locals as $local)
        {
            $this->create($local->slug);
        }
    }

    public function create($local_slug)
    {
        Schema::create('points_'.$local_slug, function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('point_id');

            $table->string('address');
            $table->string('district');
            $table->string('comment');

            $table->foreign('point_id')->references('id')->on('points')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    //

    public function dropAll()
    {
        $locals = (new LocaleModelServices)->get();
        foreach($locals as $local)
        {
            $this->drop($local->slug);
        }
    }

    public function drop($local_slug)
    {
        Schema::dropIfExists('points_'.$local_slug);
    }
}
