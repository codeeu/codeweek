<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConsentGivenToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('consent_given_at')->nullable();
            $table->timestamp('future_consent_given_at')->nullable();

        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('consent_given_at');
            $table->dropColumn('future_consent_given_at');
        });
    }
}

