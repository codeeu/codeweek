<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->float('latitude', 12, 6);
            $table->float('longitude', 12, 6);
            $table->string('trimmed_geoposition', 20);
            $table->string('geoposition', 42);
            $table->string('location', 1000);
            $table->string('name', 255)->nullable();
            $table->string('country_iso', 2);
            $table->boolean('is_default')->default(false);
            $table->boolean('is_primary')->default(false);
            $table->string('organizer_type', 50)->nullable();
            $table->string('activity_type', 50)->nullable();
            $table->integer('user_id');
            $table->integer('event_id');

            $table->timestamps();
            $table->softDeletes();

            $table->unique(['user_id', 'trimmed_geoposition']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
};
