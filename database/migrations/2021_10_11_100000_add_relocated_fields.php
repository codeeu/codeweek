<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            //$table->string('registration_url')->nullable();
            $table->boolean('relocated')->default(false);
            $table->string('relocation_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            //$table->dropColumn('relocated');
            //$table->dropColumn('relocation_status');
        });
    }
};
