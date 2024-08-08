<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResourceRequest;
use App\ResourceItem;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class SuggestResourcesController extends Controller
{
    public function get(): View
    {
        return view('resources.suggest');
    }

    public function store(ResourceRequest $request): View
    {
        $request['active'] = false;
        $resourceItem = ResourceItem::create($request->toArray());

        $editors = User::role('resource editor')->get();

        //send emails
        foreach ($editors as $editor) {
            Mail::to($editor->email)->queue(new \App\Mail\ResourceSuggested($resourceItem));
        }

        return view('resources.suggest_thankyou');
    }
}
