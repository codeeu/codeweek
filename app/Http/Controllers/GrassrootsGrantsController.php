<?php

namespace App\Http\Controllers;

use App\GrassrootsGrantsPage;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class GrassrootsGrantsController extends Controller
{
    public function show(): View
    {
        $page = $this->loadPage();

        if ($page->is_preview_mode) {
            abort(404);
        }

        return view('static.grassroots-grants', [
            'page' => $page,
            'previewMode' => false,
        ]);
    }

    public function preview(): View
    {
        return view('static.grassroots-grants', [
            'page' => $this->loadPage(),
            'previewMode' => true,
        ]);
    }

    private function loadPage(): GrassrootsGrantsPage
    {
        return GrassrootsGrantsPage::config()->load([
            'activeHubs.activeProjects.links',
            'activeHubs.activeProjects.images',
        ]);
    }
}
