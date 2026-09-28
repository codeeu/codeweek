<?php

namespace App\Http\View\Composers;

use App\GrassrootsGrantsPage;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class GrassrootsGrantsComposer
{
    public function compose(View $view): void
    {
        if (! Schema::hasTable('grassroots_grants_page')) {
            $view->with('page', null);

            return;
        }

        $view->with('page', GrassrootsGrantsPage::config()->withoutExcludedEvidence());
    }
}
