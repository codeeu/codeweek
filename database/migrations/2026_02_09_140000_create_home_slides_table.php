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
        Schema::create('home_slides', function (Blueprint $table) {
            $table->id();
            $table->string('title');                    // Lang key (e.g. home.banner1_title) or plain text
            $table->text('description')->nullable();    // Lang key or plain text
            $table->string('url');
            $table->string('button_text');              // Primary button label (lang key or text)
            $table->string('url2')->nullable();
            $table->string('button2_text')->nullable(); // Second button label (optional)
            $table->string('image')->nullable();         // Path e.g. /images/homepage/slide1.png or full URL
            $table->unsignedInteger('position')->default(0);
            $table->boolean('active')->default(true);
            $table->boolean('show_countdown')->default(false);
            $table->dateTime('countdown_target')->nullable(); // e.g. 2025-10-14 00:00:00
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_slides');
    }
};
