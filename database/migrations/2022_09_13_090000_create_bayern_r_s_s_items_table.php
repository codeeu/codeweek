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
        Schema::create('bayern_r_s_s_items', function (Blueprint $table) {
            $table->id();
            $table->integer('uid')->unique();
            $table->string('title');
            $table->longText('description');
            $table->string('organizer');
            $table->string('photo')->nullable();
            $table->dateTime('eventEndDate');
            $table->dateTime('eventStartDate');
            $table->float('latitude', 12, 6);
            $table->float('longitude', 12, 6);
            $table->string('location');
            $table->string('user_company');
            $table->string('user_email');
            $table->string('user_publicEmail');
            $table->string('user_type');
            $table->string('user_website');
            $table->string('activity_type');
            $table->dateTime('imported_at')->nullable();
            $table->string('audience')->nullable();
            $table->string('themes')->nullable();
            $table->string('tags')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('muensterland_r_s_s_items');
    }
};
