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
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique()->nullable();
            $table->string('title')->nullable();

            $table->string('email')->nullable();
            $table->decimal('lon', 12, 7)->nullable();
            $table->decimal('lat', 12, 7)->nullable();
            $table->string('yandex_widget_href')->nullable()->comment("https://yandex.ru/map-widget/v1/?z=12&ol=biz&oid=64442259794");
            $table->boolean('is_on')->default(1);
            $table->boolean('is_pickup')->comment("Не удалённый склад")->default(0);

            $table->string('address')->nullable();
            // $table->string('district');
            $table->string('comment')->nullable();
            $table->string('description', 126)->nullable();

            $table->unsignedBigInteger('city_id')->nullable();

            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points');
    }
};
