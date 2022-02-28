<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGuestsToPodcasts extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('podcasts', function (Blueprint $table) {
            $table->string('guest_name')->nullable();
            $table->string('guest_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('podcasts', function (Blueprint $table) {
            $table->dropColumn('guest_name');
            $table->dropColumn('guest_description');
        });
    }
}
