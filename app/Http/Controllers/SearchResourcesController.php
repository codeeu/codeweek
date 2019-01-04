<?php

namespace App\Http\Controllers;

use App\Filters\ResourceFilters;
use App\ResourceItem;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SearchResourcesController extends Controller
{
    public function search(ResourceFilters $filters, Request $request){

        $items = $this->getItems($filters);

        $items->load('types');
        //$items = \App\ResourceItem::all();


        return $items;


    }

    protected function getItems(ResourceFilters $filters)
    {

        $items = ResourceItem::filter($filters);


        return $items->paginate(20);
    }
}
