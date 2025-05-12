<?php

namespace App\Http\Migrations;

use App\Http\Services\Models\LocaleModelService;
use App\Models\Category\CategoryLocal;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CategoryModelMigration
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
        Schema::create(CategoryLocal::$tabel_name.$local_slug, function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->unsignedBigInteger('category_id');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists(CategoryLocal::$tabel_name.$local_slug);
    }
}
