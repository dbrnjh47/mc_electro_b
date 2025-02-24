<?php

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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default("IMPYREX");
            $table->string('email')->default("Info@oneclickdrive.com");
            $table->string('phone')->default("+954637592634");

            // $table->string('tg')->default("https://web.telegram.org/")->nullable();
            // $table->string('in')->default("https://instagram.com/")->nullable();
            // $table->string('tv')->default("https://twitter.com/")->nullable();
            // $table->string('fb')->default("https://facebook.com/")->nullable();
            // $table->string('wt')->default("971568463945")->nullable();
            // $table->string('ti')->default("https://tiktok.com/")->nullable();

            $table->string('address')->nullable();

            $table->boolean('teh_works')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
