<?php

use Database\Seeders\GrassrootsGrantsSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('grassroots_grants_project_images')) {
            return;
        }

        $ids = DB::table('grassroots_grants_project_images')
            ->pluck('url', 'id')
            ->filter(function ($url): bool {
                $path = parse_url((string) $url, PHP_URL_PATH) ?: (string) $url;
                $filename = rawurldecode(basename($path));

                return in_array($filename, GrassrootsGrantsSeeder::EXCLUDED_EVIDENCE_FILES, true);
            })
            ->keys();

        if ($ids->isEmpty()) {
            return;
        }

        DB::table('grassroots_grants_project_images')->whereIn('id', $ids->all())->delete();
    }

    public function down(): void
    {
        // Internal reports stay unpublished.
    }
};
