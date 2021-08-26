<?php

namespace App\Http\Controllers\Api;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Transformers\EventTransformer;
use App\Importer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\EventResource as EventResource;
use Illuminate\Support\Facades\Cache;

class HamburgController extends Controller {
    public function index() {
        //236485 is event from Hamburg
        //        return Event::whereIn('id', [236485, 236505])
        //            ->with(['audiences', 'themes', 'tags', 'owner'])
        //            ->get();
    }
}
