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
        Schema::table('events', function (Blueprint $table) {
            //$table->string('registration_url')->nullable();
            $table->string('playback_url')->nullable();
            $table->string('highlighted_status')->default('NONE');
            $table->string('language')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('events', function (Blueprint $table) {
            //
            //            $table->dropColumn('playback_url');
            //            $table->dropColumn('highlighted_status');
            //            $table->dropColumn('language');
        });
    }
};
