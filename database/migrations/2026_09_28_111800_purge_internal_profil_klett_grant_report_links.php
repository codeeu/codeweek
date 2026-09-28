<?php

use App\GrassrootsGrantsProjectImage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('grassroots_grants_project_images')) {
            return;
        }

        // Files were removed from public/, but production still served DB links as 404 tiles.
        GrassrootsGrantsProjectImage::purgeExcludedFromPublic();
    }

    public function down(): void
    {
        // Internal reports stay unpublished.
    }
};
