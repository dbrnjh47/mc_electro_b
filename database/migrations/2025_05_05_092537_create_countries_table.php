<?php

use App\Http\Migrations\CountryModelMigration;
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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();

            $table->string('cca2', 2)->unique();
            $table->boolean('is_on')->default(false);

            $table->timestamps();
        });

        (new CountryModelMigration)->createAll();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
        (new CountryModelMigration)->dropAll();
    }
};
