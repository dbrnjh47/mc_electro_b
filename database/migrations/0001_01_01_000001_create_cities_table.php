<?php

use App\Http\Migrations\CityModelMigration;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->unsignedBigInteger('country_id')->nullable();

            $table->string('fias_guid', 64)->nullable()->index()->comment("Идентификатор ФИАС населенного пункта");
            $table->decimal('lon', 12, 7)->nullable();
            $table->decimal('lat', 12, 7)->nullable();
            $table->boolean('is_on')->default(false);
            $table->string('time_zone', 50)->nullable();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
