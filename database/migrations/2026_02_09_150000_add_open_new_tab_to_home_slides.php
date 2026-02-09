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
        Schema::table('home_slides', function (Blueprint $table) {
            $table->boolean('open_primary_new_tab')->default(false)->after('button_text');
            $table->boolean('open_second_new_tab')->default(false)->after('button2_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_slides', function (Blueprint $table) {
            $table->dropColumn(['open_primary_new_tab', 'open_second_new_tab']);
        });
    }
};
