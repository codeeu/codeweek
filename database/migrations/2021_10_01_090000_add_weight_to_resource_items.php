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
        Schema::table('resource_items', function (Blueprint $table) {
            //$table->string('registration_url')->nullable();

            $table->unsignedInteger('weight')->default(10);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {

        Schema::table('resource_items', function (Blueprint $table) {
            $table->dropColumn('weight');
        });
    }
};
