<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('recurring_event')->default('no'); // 'yes' or 'no'
            $table->string('frequency')->nullable(); // 'daily', 'weekly', 'monthly'
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['recurring_event', 'frequency']);
        });
    }
};
