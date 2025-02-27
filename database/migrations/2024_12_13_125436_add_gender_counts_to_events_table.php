<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            if (!Schema::hasColumn('events', 'percentage_of_females')) {
                $table->integer('percentage_of_females')->nullable();
            }
            if (!Schema::hasColumn('events', 'percentage_of_males')) {
                $table->integer('percentage_of_males')->nullable();
            }
            if (!Schema::hasColumn('events', 'percentage_of_other')) {
                $table->integer('percentage_of_other')->nullable();
            }
        });
    }


    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['percentage_of_females', 'percentage_of_males', 'percentage_of_other']);
        });
    }
};
