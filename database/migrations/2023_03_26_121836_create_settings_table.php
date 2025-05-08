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
            $table->string('name')->default("");
            $table->string('abbreviation')->default("");
            $table->string('ie')->default("ИП Виктор");
            $table->string('email')->comment("temple@mail.com");
            $table->string('phone')->comment("+954637592634");

            $table->string('in')->comment("https://instagram.com/")->nullable();
            $table->string('vk')->comment("https://vk.com/")->nullable();
            $table->string('yt')->comment("https://www.youtube.com/")->nullable();
            $table->string('tg')->comment("https://t.me/")->nullable();

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
