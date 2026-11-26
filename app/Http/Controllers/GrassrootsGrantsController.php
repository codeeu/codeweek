<?php

namespace App\Http\Controllers;

use App\GrassrootsGrantsPage;
use Illuminate\View\View;

class GrassrootsGrantsController extends Controller
{
    public function show(): View
    {
        return $this->render(GrassrootsGrantsPage::SLUG_ROUND_1, previewMode: false);
    }

    public function preview(): View
    {
        return $this->render(GrassrootsGrantsPage::SLUG_ROUND_1, previewMode: true);
    }

    public function showRound2(): View
    {
        return $this->render(GrassrootsGrantsPage::SLUG_ROUND_2, previewMode: false);
    }

    public function previewRound2(): View
    {
        return $this->render(GrassrootsGrantsPage::SLUG_ROUND_2, previewMode: true);
    }

    private function render(string $slug, bool $previewMode): View
    {
        $page = GrassrootsGrantsPage::forSlug($slug)->withoutExcludedEvidence();

        if (! $previewMode && $page->is_preview_mode) {
            abort(404);
        }

        return view('static.grassroots-grants', [
            'page' => $page,
            'previewMode' => $previewMode,
        ]);
    }
}
