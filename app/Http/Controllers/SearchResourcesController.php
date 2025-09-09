<?php

namespace App\Http\Controllers;

use App\Filters\ResourceFilters;
use App\ResourceItem;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class SearchResourcesController extends Controller
{
    /**
     * Return unique ResourceItems and attach `main_language` field
     * based on selectedLanguages (fallback to first related language).
     *
     * @param  ResourceFilters $filters
     * @param  Request         $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Http\JsonResponse
     */
    public function search(ResourceFilters $filters, Request $request)
    {
        try {
            // 1) Build base query (keep Filters behavior intact)
            $builder = $this->getItems($filters)->select('resource_items.*');

            // 2) Fetch raw (may contain duplicates due to groupBy in filters)
            $raw = $builder->get();

            // 3) Deduplicate by resource id
            $unique = $raw->unique('id')->values();

            // 4) Eager-load relations once for unique set
            $unique->load(['types', 'levels', 'programmingLanguages', 'subjects', 'categories', 'languages']);

            // 5) Determine main_language per item using selectedLanguages from request
            $selectedLanguageIds = collect($request->input('selectedLanguages', []))
                ->pluck('id')
                ->map(fn ($v) => (int) $v)
                ->filter()
                ->values()
                ->all();

            foreach ($unique as $item) {
                /** @var \Illuminate\Support\Collection $langs */
                $langs = $item->languages ?? collect();

                // prefer the first language that matches the filter order
                $main = null;
                if (!empty($selectedLanguageIds) && $langs->isNotEmpty()) {
                    foreach ($selectedLanguageIds as $lid) {
                        $match = $langs->firstWhere('id', $lid);
                        if ($match) {
                            $main = $match;
                            break;
                        }
                    }
                }

                // fallback: first related language (if any)
                if (!$main && $langs->isNotEmpty()) {
                    $main = $langs->first();
                }

                // attach lightweight field for FE
                $item->setAttribute('main_language', $main ? [
                    'id'   => (int) $main->id,
                    'name' => (string) $main->name,
                ] : null);
            }

            // 6) Paginate AFTER deduplication
            $perPage = 30;
            $page    = LengthAwarePaginator::resolveCurrentPage() ?: 1;

            $slice = $unique->forPage($page, $perPage)->values();
            $paginator = new LengthAwarePaginator(
                $slice,
                $unique->count(),
                $perPage,
                $page,
                ['path' => Paginator::resolveCurrentPath()]
            );

            return $paginator;
        } catch (\Throwable $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Failed to search resources.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Keep original builder composition; pagination moved to controller.
     *
     * @param  ResourceFilters $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function getItems(ResourceFilters $filters)
    {
        return ResourceItem::filter($filters)
            ->whereActive(true)
            ->orderBy('weight', 'desc')
            ->orderBy('created_at', 'desc')
            ->orderBy('name', 'asc');
    }
}
