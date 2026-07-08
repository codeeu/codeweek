<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('online_courses_page')) {
            return;
        }

        DB::table('online_courses_page')
            ->where('hero_cta_text', 'Optional secondary CTA introduction to online courses')
            ->update([
                'hero_cta_text' => null,
                'hero_cta_link' => null,
            ]);
    }

    public function down(): void
    {
        // Placeholder CTA intentionally removed; no restore.
    }
};
