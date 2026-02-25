<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    private const OLD_DEFAULT = 'Explore Career Pathway';

    private const NEW_DEFAULT = 'For inspiration from more role models check out <a class="text-dark-blue underline" target="_blank" rel="noopener" href="https://high5girls.dk/bliv-rollemodel-2/">High5Girls rollemodeller - kvinder i STEM-fag</a>';

    public function up(): void
    {
        if (! Schema::hasTable('dream_job_role_models') || ! Schema::hasColumn('dream_job_role_models', 'pathway_title')) {
            return;
        }

        DB::table('dream_job_role_models')
            ->whereNull('pathway_title')
            ->orWhere('pathway_title', '')
            ->orWhere('pathway_title', self::OLD_DEFAULT)
            ->update(['pathway_title' => self::NEW_DEFAULT]);
    }

    public function down(): void
    {
        if (! Schema::hasTable('dream_job_role_models') || ! Schema::hasColumn('dream_job_role_models', 'pathway_title')) {
            return;
        }

        DB::table('dream_job_role_models')
            ->where('pathway_title', self::NEW_DEFAULT)
            ->update(['pathway_title' => self::OLD_DEFAULT]);
    }
};
