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
 * Super Admin Pages: Routes for actions that are only possible for a user with the super admin role.
 */
require __DIR__ . '/admin_routes.php';

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
 * Show the community page with the list of ambassadors and leading teachers
 */
Route::get('/community', 'CommunityController@index')->name('community');
Route::get('podcasts', 'PodcastsController@index')->name('podcasts');
Route::get('podcast/{podcast}', 'PodcastsController@show')->name('podcast');

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
 * Show the featured activities page
 */
Route::get('/featured-activities', 'OnlineEventsController@calendar')->name(
    'featured_activities'
);

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
 * Show the logged user's events that can be reported in order to get a certificate
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
 * Route accessible only for the ambassadors
 */
Route::group(['middleware' => ['role:super admin|ambassador']], function () {

    // List of pending activities that need to be reviewed
    Route::get('/pending', 'PendingEventsController@index')->name('pending');

    // List of online activities
    Route::get('/online/list', 'OnlineEventsController@list')->name(
        'admin.online-events'
    );

    // Approve an activity action
    Route::post('/api/event/approve/{event}', 'EventController@approve')->name(
        'event.approve'
    );
    // Reject an activity
    Route::post('/api/event/reject/{event}', 'EventController@reject')->name(
        'event.reject'
    );
    // Ajax endpoint to approve all the activities for a specific country. Used in Nova Admin panel.
    Route::get(
        '/api/event/approveAll/{country}',
        'EventController@approveAll'
    )->name('event.approveAll');

});


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
 * Routes to allow the registration of the leading teachers
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


/*
 * Show the leading teachers list to the admins.
 */
Route::group(
    ['middleware' => ['role:super admin|leading teacher admin']],
    function () {
        Route::get('/leading-teachers/list', 'LeadingTeachersList@index')
            ->name('leading_teachers_list')
            ->middleware('auth');
    }
);

// Allow a leading teacher to report an action performed
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



// Unsubscribe from the automatic email submissions. This link is in the footer of the emails being sent.
Route::get('/unsubscribe/{email}/{magic}', 'UnsubscribeController@index')->name('unsubscribe');

// Show the schools previously used by a teacher in order to ease the input of new activities.
Route::group(['middleware' => ['auth']], function () {
    Route::get('activities-locations', 'LocationController@index')->name('activities-locations');
});

/*
 * Hackathons page
 */
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
//Route::get('/map', 'MapController@index')->name('map');
//
//Route::get('user/delete', 'UserController@delete')
//    ->name('delete_user')
//    ->middleware('auth');
//
//Route::get('/search', 'SearchController@search')->name('search_event');

/*
 * Get the current Toolkit for the leading teacher. Is this obsolete ?
 */
Route::get(
    'leading-teachers-document',
    'LeadingTeacherController@getCurrentToolkit'
)->name('leading-teachers-document');