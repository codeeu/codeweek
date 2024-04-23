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

        Schema::table('excellences', function (Blueprint $table) {

            $table->dropUnique(['user_id', 'edition']);
            $table->string('type')->default('Excellence');
            $table->unique(['user_id', 'edition', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('excellences', function (Blueprint $table) {

        });

    }
};
