<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

Route::get('setlocale', function (Request $request) {

    $locale = $request->input('locale');
    if (in_array($locale, config('app.locales'))) {
        session(['locale' => $locale]);

    }
    return redirect()->back();
})->name("setlocale");


Route::get('/profile', function () {
    $data = ['profileUser' => Auth()->user()];

    return view('profile', $data);
})->name('profile')->middleware('auth');


Route::get('/', function () {return view('index');})->name('map');
Route::get('/add', 'EventController@create')->name('create_event');
Route::get('/ambassadors', 'AmbassadorController@index')->name('ambassadors');
Route::post('/events', 'EventController@store');
Route::get('/guide', function () {return view('guide');})->name('guide');
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/my', 'EventController@my')->name('my_events');
Route::get('/search', 'SearchController@search')->name('search_event');
Route::get('/scoreboard', 'ScoreboardController@index')->name('scoreboard');
Route::patch('user', 'UserController@update')->name('user.update');
Route::get('view/{event}/{slug}', 'EventController@show')->name('view_event');
Route::resource('school', 'SchoolController');

Route::post('api/users/{user}/avatar', 'Api\UserAvatarController@store')->middleware('auth')->name('avatar');
Route::post('api/events/picture', 'Api\EventPictureController@store')->middleware('auth')->name('event_picture');
Route::delete('api/users/avatar', 'Api\UserAvatarController@delete')->middleware('auth');
Route::get('api/event/list', 'Api\EventsController@list')->name('event_list');
Route::get('api/event/detail', 'Api\EventsController@detail')->name('event_list');
Route::get('api/event/closest', 'Api\EventsController@closest');

Route::group(['middleware' => ['role:super admin']], function () {
    Route::get('/activities', 'AdminController@activities')->name('activities');
    Route::get('/pending/{country}', 'PendingEventsController@index')->name('pending_by_country');
});

Route::group(['middleware' => ['role:super admin|ambassador']], function () {
    Route::get('/pending', 'PendingEventsController@index')->name('pending');
});






Auth::routes();

