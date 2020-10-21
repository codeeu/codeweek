<?php

namespace App\Http\Controllers;

use App\Filters\ResourceFilters;
use App\ResourceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SearchResourcesController extends Controller
{
    public function search(ResourceFilters $filters, Request $request){


        $items = $this->getItems($filters);

        $items->load(['types','levels','programmingLanguages','subjects','categories','languages']);
        //$items = \App\ResourceItem::all();


        return $items;


    }

    protected function getItems(ResourceFilters $filters)
    {

        $items = ResourceItem::filter($filters)->whereActive(true)->orderBy('name', 'asc');

        //return($items->get()->distinct());

        //dd($items->distinct()->paginate(10)->items);

        return $items->distinct()->paginate(30);
    }
}
