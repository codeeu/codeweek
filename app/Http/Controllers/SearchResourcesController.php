<?php

namespace App\Http\Controllers;

use App\Filters\ResourceFilters;
use App\ResourceItem;
use Illuminate\Http\Request;

class SearchResourcesController extends Controller
{
    public function search(ResourceFilters $filters, Request $request)
    {

        $items = $this->getItems($filters);

        $items->load(['types', 'levels', 'programmingLanguages', 'subjects', 'categories', 'languages']);

        return $items;

    }

    protected function getItems(ResourceFilters $filters)
    {

        $items = ResourceItem::filter($filters)
            ->whereActive(true)
            ->orderBy('weight', 'desc')
            ->orderBy('created_at', 'desc')
            ->orderBy('name', 'asc');

        return $items->distinct()->paginate(30);
    }
}
