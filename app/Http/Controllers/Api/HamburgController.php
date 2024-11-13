<?php

namespace App\Http\Controllers\Api;

use App\Event;
use App\Http\Controllers\Controller;

class HamburgController extends Controller
{
    public function index()
    {
        //236485 is event from Hamburg
        //        return Event::whereIn('id', [236485, 236505])
        //            ->with(['audiences', 'themes', 'tags', 'owner'])
        //            ->get();
    }
}
