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


Route::domain('{subdomain}.'.Config::get('app.url'))->group(function () {

    Route::get('/', function ($subdomain) {

        return redirect(Config::get('app.url').'/'.$subdomain);
    });
});





Route::get('setlocale', function (Request $request) {

    $locale = $request->input('locale');
    if (in_array($locale, config('app.locales'))) {
        session(['locale' => $locale]);

    }
    return redirect()->back();
})->name("setlocale");


//Static pages
Route::get('/', 'StaticPageController@index')->name('home');
Route::get('/home', 'StaticPageController@index')->name('home');
Route::get('/guide', 'StaticPageController@index')->name('guide');
Route::get('/privacy', 'StaticPageController@index')->name('privacy');
Route::get('/petition', 'StaticPageController@index')->name('petition');
Route::get('/beambassador', 'StaticPageController@index')->name('beambassador');
Route::get('/about', 'StaticPageController@index')->name('about');
Route::get('/resources', 'StaticPageController@index')->name('resources');
Route::get('/codeweek4all', 'StaticPageController@index')->name('codeweek4all');
//Static training pages
Route::get('/training', 'StaticPageController@index')->name('training.index');
Route::get('/training/coding-without-computers', 'StaticPageController@index')->name('training.module-1');
Route::get('/training/computational-thinking-and-problem-solving', 'StaticPageController@index')->name('training.module-2');
Route::get('/training/visual-programming-introduction-to-scratch', 'StaticPageController@index')->name('training.module-3');
Route::get('/training/creating-educational-games-with-scratch', 'StaticPageController@index')->name('training.module-4');
Route::get('/training/making-robotics-and-tinkering-in-the-classroom', 'StaticPageController@index')->name('training.module-5');




Route::get('/events', 'EventController@index')->name('events_map');
Route::get('/add', 'EventController@create')->name('create_event');
Route::get('/map', 'MapController@index')->name('map');
Route::get('/resources/{country}', 'ResourcesController@show')->name('resources_by_country');
Route::get('/ambassadors', 'AmbassadorController@index')->name('ambassadors');
Route::get('/volunteer', 'VolunteerController@create')->middleware('auth')->name('volunteer');
Route::post('/volunteer', 'VolunteerController@store')->middleware('auth')->name('volunteer_store');
Route::post('/events', 'EventController@store');
Route::patch('/events/{event}', 'EventController@update');
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/my', 'EventController@my')->middleware('auth')->name('my_events');
Route::get('/my/reportable', 'EventController@myreportable')->middleware('auth')->name('my_reportable_events');
Route::get('/search', 'SearchController@search')->name('search_event');
Route::get('/scoreboard', 'ScoreboardController@index')->name('scoreboard');
Route::patch('user', 'UserController@update')->name('user.update')->middleware('auth');
Route::get('view/{event}/{slug}', 'EventController@show')->name('view_event');
Route::get('events_to_report', 'ReportController@list')->name('report_list')->middleware('auth');
Route::get('certificates', 'CertificateController@list')->name('certificates')->middleware('auth');
Route::get('event/edit/{event}', 'EventController@edit')->name('edit_event')->middleware('auth');
Route::get('event/report/{event}', 'ReportController@index')->name('report_event')->middleware('auth');
Route::post('event/report/{event}', 'ReportController@store');
//Route::resource('school', 'SchoolController');
Route::get('schools', 'SchoolsController@index')->name('schools');

Route::post('api/users/{user}/avatar', 'Api\UserAvatarController@store')->middleware('auth')->name('avatar');
Route::post('api/events/picture', 'Api\EventPictureController@store')->middleware('auth')->name('event_picture');
Route::delete('api/users/avatar', 'Api\UserAvatarController@delete')->middleware('auth');
Route::get('api/event/list', 'Api\EventsController@list')->name('event_list');
Route::get('api/event/detail', 'Api\EventsController@detail')->name('event_list');
Route::get('api/event/closest', 'Api\EventsController@closest');

Route::post('api/event/report/{event}', 'ReportController@store')->middleware('auth');

Route::group(['middleware' => ['role:super admin']], function () {
    Route::get('/activities', 'AdminController@activities')->name('activities');
    Route::get('/pending/{country}', 'PendingEventsController@index')->name('pending_by_country');
    Route::get('/volunteers', 'VolunteerController@index')->middleware('auth')->name('volunteers');
    Route::get('/volunteer/{volunteer}/approve', 'VolunteerController@approve')->middleware('auth')->name('volunteer_approve');
    Route::get('/volunteer/{volunteer}/reject', 'VolunteerController@reject')->middleware('auth')->name('volunteer_reject');
    Route::get('mail/{event}', 'EmailController@create')->middleware('auth');

    Route::get('/mail/template/ambassadors/new', 'MailTemplateController@ambassador');
    Route::get('/mail/template/ambassadors/remind_ambassador', 'MailTemplateController@remind_ambassador');
    Route::get('/mail/template/creators/registered', 'MailTemplateController@registered');
    Route::get('/mail/template/creators/approved', 'MailTemplateController@approved');
    Route::get('/mail/template/creators/rejected', 'MailTemplateController@rejected');

    Route::get('stats', [
        'uses' => 'StatsController@getMetrics',
        'as' => 'stats'
    ]);


    Route::get('stats/events/years', [
        'uses' => 'StatsController@getEventsPerYear',
        'as' => 'stats.year'
    ]);


    Route::get('stats/events/organiser', [
        'uses' => 'StatsController@getEventsPerOrganiserType',
        'as' => 'stats.organiser'
    ]);

    Route::get('stats/events/reported', [
        'uses' => 'StatsController@getNotReportedEvents',
        'as' => 'stats_notreported'
    ]);

    Route::get('/mail/template/remind/creators', 'MailTemplateController@remindcreators');
});

Route::group(['middleware' => ['role:super admin|ambassador']], function () {
    Route::get('/pending', 'PendingEventsController@index')->name('pending');

    Route::post('/api/event/approve/{event}', 'EventController@approve')->name('event.approve');
    Route::post('/api/event/reject/{event}', 'EventController@reject')->name('event.reject');

    Route::get('/profile', function () {
        $data = ['profileUser' => Auth()->user()];

        return view('profile', $data);
    })->name('profile')->middleware('auth');
});


Auth::routes();

