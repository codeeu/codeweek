<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_sections', function (Blueprint $table) {
            $table->id();
            $table->string('location')->index(); // e.g. resources_dropdown
            $table->string('column')->default('left'); // left|right
            $table->string('title')->nullable(); // optional literal title
            $table->string('title_key')->nullable(); // optional translation key (preferred)
            $table->unsignedInteger('sort_order')->default(0)->index();
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_sections');
    }
};

