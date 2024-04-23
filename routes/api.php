<?php

use App\Http\Controllers\Api;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('events/geobox', [Api\EventsController::class, 'geobox']);
Route::get('events/germany', [Api\EventsController::class, 'germany']);
Route::get('event-detail/{event}', [Api\EventsController::class, 'event']);
