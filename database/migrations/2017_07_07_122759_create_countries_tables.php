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
        if (!Schema::hasTable('countries')) {
            Schema::create('countries', function (Blueprint $table) {
                $table->string('iso')->primary();
                $table->string('name');
                $table->integer('population')->nullable();
                $table->string('continent');
                $table->string('facebook');
                $table->string('website');
                $table->string('longitude');
                $table->string('latitude');
                $table->string('parent')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
