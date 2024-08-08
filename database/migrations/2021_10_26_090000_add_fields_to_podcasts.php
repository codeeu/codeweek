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
        Schema::table('podcasts', function (Blueprint $table) {
            $table->unsignedInteger('duration')->default(10);
            $table->unsignedInteger('filesize')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('podcasts', function (Blueprint $table) {
            $table->dropColumn('duration');
        });
        Schema::table('podcasts', function (Blueprint $table) {
            $table->dropColumn('filesize');
        });
    }
};
