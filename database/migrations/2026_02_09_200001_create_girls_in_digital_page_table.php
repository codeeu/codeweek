<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('girls_in_digital_page', function (Blueprint $table) {
            $table->id();
            $table->json('locale_overrides')->nullable();
            $table->timestamps();
        });
        DB::table('girls_in_digital_page')->insert(['locale_overrides' => null, 'created_at' => now(), 'updated_at' => now()]);
    }

    public function down(): void
    {
        Schema::dropIfExists('girls_in_digital_page');
    }
};
