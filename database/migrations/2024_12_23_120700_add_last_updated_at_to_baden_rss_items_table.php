<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLastUpdatedAtToBadenRssItemsTable extends Migration
{
    public function up()
    {
        Schema::table('baden_r_s_s_items', function (Blueprint $table) {
            $table->timestamp('last_updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('baden_r_s_s_items', function (Blueprint $table) {
            $table->dropColumn('last_updated_at');
        });
    }
}
