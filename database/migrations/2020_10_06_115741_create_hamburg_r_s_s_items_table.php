<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHamburgRSSItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hamburg_r_s_s_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('link')->unique();
            $table->dateTime('pubDate');
            $table->string('organisation_mail');
            $table->string('school_name');
            $table->string('organisation_type');
            $table->string('activity_type');
            $table->string('country');
            $table->string('address');
            $table->string('organiser_website');
            $table->string('organiser_email');
            $table->string('image_link');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->float('lat', 12,6);
            $table->float('lon', 12, 6);
            $table->dateTime('imported_at')->nullable();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hamburg_r_s_s_items');
    }
}
