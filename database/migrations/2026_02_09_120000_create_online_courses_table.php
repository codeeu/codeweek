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
        Schema::create('online_courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url');
            $table->string('date_display')->nullable(); // e.g. "9 October – 15 November 2023"
            $table->string('image')->nullable();       // filename in /img/online-courses/
            $table->text('description')->nullable();
            $table->unsignedInteger('position')->default(0)->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('online_courses');
    }
};
