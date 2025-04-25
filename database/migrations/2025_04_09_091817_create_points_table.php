<?php

use App\Http\Migrations\PointModelMigration;
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

            $table->string('email')->nullable();
            $table->decimal('lon', 12, 7)->nullable();
            $table->decimal('lat', 12, 7)->nullable();
            $table->string('yandex_widget_href')->nullable()->comment("https://yandex.ru/map-widget/v1/?z=12&ol=biz&oid=64442259794");
            $table->boolean('is_on')->default(1);

            $table->timestamps();
        });

        (new PointModelMigration)->createAll();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points');
        (new PointModelMigration)->dropAll();
    }
};
