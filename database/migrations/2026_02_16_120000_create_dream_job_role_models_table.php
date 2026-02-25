<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dream_job_role_models', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('slug')->unique();
            $table->string('role');
            $table->string('image');
            $table->string('country', 8);
            $table->text('description1')->nullable();
            $table->text('description2')->nullable();
            $table->string('link')->nullable();
            $table->string('video')->nullable();
            $table->string('pathway_map_link')->nullable();
            $table->unsignedInteger('position')->default(0);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dream_job_role_models');
    }
};
