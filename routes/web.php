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

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


/*
 * Domain Handling: Redirects subdomains to appropriate routes.
 */
Route::domain('{subdomain}.' . Config::get('app.url'))->group(function () {
    Route::get('/', function ($subdomain) {
        return redirect(Config::get('app.url') . '/' . $subdomain);
    });
});

/*
 * Localization: Allows users to set the language/locale of the website.
 */
Route::get('setlocale', function (Request $request) {
    $locale = $request->input('locale');

    if (in_array($locale, config('app.locales'))) {
        session(['locale' => $locale]);
        session(['force_lang' => true]);
    }
    return back();
})->name('setlocale');


/*
 * Static Pages: Routes for various static pages like home, guide, privacy, cookie, etc. Routes for training modules.
 */
require __DIR__ . '/static_routes.php';

/*
 * Resources: Routes for accessing learning and teaching resources.
 */
Route::get('/resources', 'ResourcesController@learn')->name('resources');
Route::get('/resources/learn', 'ResourcesController@learn')->name('resources_learn');
Route::get('/resources/teach', 'ResourcesController@teach')->name(
    'resources_teach'
);
/*
 * Search functionality for resources.
 */
Route::post('/resources/search', 'SearchResourcesController@search')->name(
    'search_resources'
);

/*
 * Show the Events Map
 */
Route::get('/events', 'SearchController@search')->name('events_map');

/*
 * Search used on the events map
 */
Route::post('/events', 'EventController@store')->middleware('auth');

/*
 * Show the event page
 */
Route::get('view/{event}/{slug}', 'EventController@show')->name('view_event');

/*
 * Update an event
 */
Route::patch('/events/{event}', 'EventController@update')->middleware('auth');

/*
 * Events Creation page
 */
Route::get('/add', 'EventController@create')->name('create_event');
Route::post('/search', 'SearchController@searchPOST')->name('search_events');

/*
 * Show the Events Leaderboard
 */
Route::get('/scoreboard', 'ScoreboardController@index')->name('scoreboard');

/*
 * Route to the logged user events page
 */
Route::get('/my', 'EventController@my')
    ->middleware('auth')
    ->name('my_events');

/*
 * Edit an event page
 */
Route::get('event/edit/{event}', 'EventController@edit')
    ->name('edit_event')
    ->middleware('auth');

/*
 * Delete an event
 */
Route::get('event/delete/{event}', 'EventController@delete')
    ->name('delete_event')
    ->middleware('auth');

/*
 * Report an activity to generate a certificate
 */
Route::get('event/report/{event}', 'ReportController@index')
    ->name('report_event')
    ->middleware('auth');
Route::post('event/report/{event}', 'ReportController@store');


/*
 * User Management: Routes for handling user avatars.
 */
Route::post('api/users/{user}/avatar', 'Api\UserAvatarController@store')
    ->middleware('auth')
    ->name('avatar');
Route::delete(
    'api/users/avatar',
    'Api\UserAvatarController@delete'
)->middleware('auth');

/*
 * Show the logged user events that can be reported in order to get a certificate
 */
Route::get('/my/reportable', 'ReportController@list')
    ->middleware('auth')
    ->name('my_reportable_events');
Route::get('events_to_report', 'ReportController@list')
    ->name('report_list')
    ->middleware('auth');

/*
 * User Management: Routes for managing badges for users.
 */
Route::group([
    'middleware' => [
        'auth',
        'role:super admin|leading teacher|leading teacher admin'
    ]
], function () {
    Route::get('/my/badges', 'BadgesController@my')->name('my-badges')->middleware('auth');
    Route::get('/badges/user/{user}/{year?}', 'BadgesController@user')->name('badges-user');
    Route::get('/badges/leaderboard/{year?}', 'BadgesController@leaderboard')->name('badges-leaderboard-year');
});

/*
 * Route to show the ambassadors
 */
Route::get('/ambassadors', 'CommunityController@index')->name('ambassadors');

/*
 * Show the current user list of certificates
 */
Route::get('certificates', 'CertificateController@list')
    ->name('certificates')
    ->middleware('auth');

/*
 * Route to generate a certificate of excellence for the logged user.
 */
Route::get('certificates/excellence/{edition}', 'ExcellenceController@report')
    ->name('certificate_excellence')
    ->middleware('auth');

/*
 * Generate the certificate of excellence
 */
Route::post(
    'certificates/excellence/{edition}',
    'ExcellenceController@generate'
)
    ->name('certificate_excellence_report')
    ->middleware('auth');

/*
 * Route to generate a super organiser certificate for the logged user.
 */
Route::get(
    'certificates/super-organiser/{edition}',
    'SuperOrganiserController@report'
)
    ->name('certificate_super_organiser')
    ->middleware('auth');

/*
 * Generate the super organiser certificate
 */
Route::post(
    'certificates/super-organiser/{edition}',
    'SuperOrganiserController@generate'
)
    ->name('certificate_super_organiser_report')
    ->middleware('auth');

/*
 * Route to generate a participation certificate for multiple users.
 */
Route::get('participation', 'ParticipationController@show')
    ->name('participation')
    ->middleware('auth');

/*
 * Generate the participation certificates
 */
Route::post('participation', 'ParticipationController@generate')
    ->name('participation_submit')
    ->middleware('auth');


/*
 * Routes used by AJAX calls: Store event picture
 */
Route::post('api/events/picture', 'Api\EventPictureController@store')
    ->middleware('auth')
    ->name('event_picture');

/*
 * Routes used by AJAX calls: Get the list of events
 */
Route::get('api/event/list', 'Api\EventsController@list')->name('event_list');
/*
 * Routes used by AJAX calls: get an event detail
 */
Route::get('api/event/detail', 'Api\EventsController@detail')->name(
    'event_list'
);

/*
 * Routes used by AJAX calls: Get the events close to the user
 */
Route::get('api/event/closest', 'Api\EventsController@closest');

/*
 * Routes used by AJAX calls: Delete an event
 */
Route::post('/api/event/delete/{event}', 'EventController@delete')
    ->name('event.delete')
    ->middleware('auth');
/*
 * Routes used by AJAX calls: Show events created by eeducation
 */
Route::get('api/event/list/eeducation', 'Api\EventsController@eeducation');

/*
 * Routes used by AJAX calls: moderate an activity
 */
Route::post('api/event/report/{event}', 'ReportController@store')->middleware(
    'auth'
);


/*
 * Super Admin Functions:
 */
Route::group(['middleware' => ['role:super admin']], function () {
    // Resources management
    Route::post(
        'api/resource/level/',
        'Api\Resource\LevelController@store'
    )->name('resource_level');
    Route::post(
        'api/resource/item/',
        'Api\Resource\ItemController@store'
    )->name('resource_item');

    // Show the upcoming podcasts
    Route::get('podcasts/upcoming', 'PodcastsController@upcoming')->name(
        'podcasts_upcoming'
    );

    // Get pending events by country
    Route::get('/pending/{country}', 'PendingEventsController@index')->name(
        'pending_by_country'
    );

    // List of online events per country
    Route::get('/online/list/{country}', 'OnlineEventsController@list')->name(
        'online_events_by_country'
    );
    // Show the events that have been promoted and are visible
    Route::get('/online/promoted', 'OnlineEventsController@promoted')->name(
        'promoted_events'
    );
    Route::get(
        '/online/promoted/{country}',
        'OnlineEventsController@promoted'
    )->name('promoted_events_by_country');

    // Show the featured events (events that have been selected by ambassadors as worthy to be displayed in the Featured Activities section.
    Route::get('/online/featured', 'OnlineEventsController@featured')->name(
        'featured_events'
    );
    Route::get(
        '/online/featured/{country}',
        'OnlineEventsController@featured'
    )->name('featured_events_by_country');

    /*
     * Routes to test the email templates generation
     */

    Route::get('mail/{event}', 'EmailController@create')->middleware('auth');

    Route::get(
        '/mail/template/ambassadors/new',
        'MailTemplateController@ambassador'
    );
    Route::get(
        '/mail/template/ambassadors/remind_ambassador',
        'MailTemplateController@remind_ambassador'
    );
    Route::get(
        '/mail/template/creators/registered',
        'MailTemplateController@registered'
    );
    Route::get(
        '/mail/template/creators/approved',
        'MailTemplateController@approved'
    );
    Route::get(
        '/mail/template/creators/rejected',
        'MailTemplateController@rejected'
    );

    Route::get(
        '/mail/template/remind/creators',
        'MailTemplateController@remindcreators'
    );

    // Get the page that display all the organisers that are eligible to receive a certificate of excellence with details about the Codeweek4all code.
    Route::get(
        '/admin/excellence/winners',
        'ExcellenceWinnersController@list'
    )->name('excellence_winners');

    // Create an Excel with the winners of the excellence certificates
    Route::post(
        '/admin/excellence/excel',
        'ExcellenceWinnersController@excel'
    )->name('excellence_excel');

});

Route::group(['middleware' => ['role:super admin|ambassador']], function () {
    Route::get('/pending', 'PendingEventsController@index')->name('pending');


    Route::get('/online/list', 'OnlineEventsController@list')->name(
        'admin.online-events'
    );
    Route::post('/api/event/approve/{event}', 'EventController@approve')->name(
        'event.approve'
    );
    Route::get(
        '/api/event/approveAll/{country}',
        'EventController@approveAll'
    )->name('event.approveAll');
    Route::post('/api/event/reject/{event}', 'EventController@reject')->name(
        'event.reject'
    );
});


Route::get(
    '/codeweek4all/{code}/detail',
    'Codeweek4AllController@detail'
)->name('codeweek4all_details');

Route::get('/featured-activities', 'OnlineEventsController@calendar')->name(
    'featured_activities'
);

/*
 * Routes to manage the current user profile
 */
Route::get('/profile', function () {
    $data = ['profileUser' => Auth()->user()];

    return view('profile', $data);
})
    ->name('profile')
    ->middleware('auth');

Route::patch('user', 'UserController@update')
    ->name('user.update')
    ->middleware('auth');


/*
 * Routes to manage the leading teachers
 */
Route::get('/leading-teachers/signup', 'LeadingTeachersSignup@index')
    ->name('LT.signup')
    ->middleware('auth');
Route::view(
    '/leading-teachers/success',
    'leading-teachers.signup-form-success'
)->middleware('auth');
Route::post('/leading-teachers/signup', 'LeadingTeachersSignup@store')
    ->name('LT.signup.store')
    ->middleware('auth');


Route::group(
    ['middleware' => ['role:super admin|leading teacher admin']],
    function () {
        Route::get('/leading-teachers/list', 'LeadingTeachersList@index')
            ->name('leading_teachers_list')
            ->middleware('auth');
    }
);

Route::group(
    [
        'middleware' => [
            'role:leading teacher|super admin|leading teacher admin'
        ]
    ],
    function () {
        Route::get(
            '/leading-teachers/report',
            'LeadingTeachersReport@index'
        )->name('LT.report');
    }
);

Route::get('/community', 'CommunityController@index')->name('community');


Route::get('podcasts', 'PodcastsController@index')->name('podcasts');
Route::get('podcast/{podcast}', 'PodcastsController@show')->name('podcast');


Route::get('/unsubscribe/{email}/{magic}', 'UnsubscribeController@index')->name('unsubscribe');


Route::group(['middleware' => ['auth']], function () {
    Route::get('activities-locations', 'LocationController@index')->name('activities-locations');
});

//Route::view('/registration', 'registration.add');
Route::view('/online-courses', 'online-courses')->name('online-courses');

Route::get('mailing/test', function () {
    //$email = ['alainvd@gmail.com'];
    $user = User::where("id", "19588")->first();

    return new App\Mail\UserCreated($user);
});

Route::get('/hackathons', 'HackathonsController@index')->name('hackathons');

/*
 * Authentication: Routes for user authentication using Laravel's built-in authentication system.
 */
Auth::routes();

/*
 * Callback Routes for user authentication and profile management.
 */
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get(
    'login/{provider}/callback',
    'Auth\LoginController@handleProviderCallback'
);

/*
 * RSS Feeds: Routes to generate RSS Feeds.
 */
Route::feeds();

/*
 * To be deleted ??
 */
Route::get('/map', 'MapController@index')->name('map');

Route::get('user/delete', 'UserController@delete')
    ->name('delete_user')
    ->middleware('auth');

Route::get('/search', 'SearchController@search')->name('search_event');

/*
 * Get the current Toolkit for the leading teacher. Is this obsolete ?
 */
Route::get(
    'leading-teachers-document',
    'LeadingTeacherController@getCurrentToolkit'
)->name('leading-teachers-document');