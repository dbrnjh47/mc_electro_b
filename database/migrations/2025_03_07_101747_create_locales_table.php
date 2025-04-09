<?php

use Database\Seeders\LocaleSeeder;
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
        Schema::create('locales', function (Blueprint $table) {
            $table->id();

            $table->string('slug', 2)->unique();
            $table->string('hreflang', 24)->nullable();
            $table->string('text', 126);
            $table->boolean('is_configured')->default(false);

            $table->string('icon', 24)->nullable();

            $table->timestamps();
        });

        echo "\n";
        dump("Seeding database LocaleSeeder");
        (new LocaleSeeder())->run();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locales');
    }
};
