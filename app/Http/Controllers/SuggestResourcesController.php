<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResourceRequest;
use App\ResourceItem;
use Illuminate\Http\Request;

class SuggestResourcesController extends Controller
{
    public function get(){
        return view ("resources.suggest");
    }

    public function store(ResourceRequest $request){
        $request['active'] = false;
        ResourceItem::create($request->toArray());
        return view('resources.suggest_thankyou');
    }


}
