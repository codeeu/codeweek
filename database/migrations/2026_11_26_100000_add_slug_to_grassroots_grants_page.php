<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('grassroots_grants_page')) {
            return;
        }

        if (! Schema::hasColumn('grassroots_grants_page', 'slug')) {
            Schema::table('grassroots_grants_page', function (Blueprint $table) {
                $table->string('slug')->nullable()->after('id');
            });
        }

        $pages = DB::table('grassroots_grants_page')->orderBy('id')->get();
        foreach ($pages as $index => $page) {
            if ($page->slug) {
                continue;
            }

            DB::table('grassroots_grants_page')
                ->where('id', $page->id)
                ->update(['slug' => $index === 0 ? 'round-1' : 'round-'.($index + 1)]);
        }

        // Ensure uniqueness without relying on Doctrine.
        $duplicates = DB::table('grassroots_grants_page')
            ->select('slug', DB::raw('count(*) as aggregate'))
            ->groupBy('slug')
            ->having('aggregate', '>', 1)
            ->exists();

        if (! $duplicates) {
            try {
                Schema::table('grassroots_grants_page', function (Blueprint $table) {
                    $table->unique('slug');
                });
            } catch (\Throwable) {
                // Index may already exist from a partial prior run.
            }
        }
    }

    public function down(): void
    {
        if (! Schema::hasTable('grassroots_grants_page')) {
            return;
        }

        if (! Schema::hasColumn('grassroots_grants_page', 'slug')) {
            return;
        }

        try {
            Schema::table('grassroots_grants_page', function (Blueprint $table) {
                $table->dropUnique(['slug']);
            });
        } catch (\Throwable) {
            // Ignore if the unique index was never created.
        }

        Schema::table('grassroots_grants_page', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
