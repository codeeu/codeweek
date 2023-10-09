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


//Auth::loginUsingId(20750);

Route::domain('{subdomain}.' . Config::get('app.url'))->group(function () {
    Route::get('/', function ($subdomain) {
        return redirect(Config::get('app.url') . '/' . $subdomain);
    });
});

Route::get('setlocale', function (Request $request) {
    $locale = $request->input('locale');

    if (in_array($locale, config('app.locales'))) {
        session(['locale' => $locale]);
        session(['force_lang' => true]);
    }
    return back();
})->name('setlocale');

//Static pages
Route::get('/', 'HomeController@index')->name('home');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/guide', 'StaticPageController@static')->name('guide');
Route::get('/privacy', 'StaticPageController@static')->name('privacy');
Route::get('/privacy/contact-points', 'StaticPageController@static')->name('privacy-contact-points');
Route::get('/cookie', 'StaticPageController@static')->name('cookie');
Route::get('/petition', 'StaticPageController@static')->name('petition');
Route::get('/beambassador', 'StaticPageController@static')->name(
    'beambassador'
);
Route::get('/about', 'StaticPageController@static')->name('about');
Route::get('/our-values', 'StaticPageController@static')->name('our-values');
Route::get('/partners', 'StaticPageController@static')->name('sponsors');
Route::get('/codeweek4all', 'StaticPageController@static')->name(
    'codeweek4all'
);
Route::get('/code-hunting-game', 'StaticPageController@static')->name(
    'code-hunting-game'
);
Route::get('/codeweek2020', 'StaticPageController@static')->name(
    'codeweek2020'
);
Route::get('/treasure-hunt', 'StaticPageController@static')->name(
    'treasure-hunt'
);
Route::get('/dance', 'StaticPageController@static')->name('dance');
Route::get('/why-coding', 'StaticPageController@static')->name('why-coding');

Route::get('/remote-teaching', 'RemoteTeachingController@index')->name(
    'remote-teaching'
);

//Static training pages
Route::get('/training', 'StaticPageController@static')->name('training.index');
Route::get(
    '/training/coding-without-computers',
    'StaticPageController@static'
)->name('training.module-1');
Route::get(
    '/training/computational-thinking-and-problem-solving',
    'StaticPageController@static'
)->name('training.module-2');
Route::get(
    '/training/visual-programming-introduction-to-scratch',
    'StaticPageController@static'
)->name('training.module-3');
Route::get(
    '/training/creating-educational-games-with-scratch',
    'StaticPageController@static'
)->name('training.module-4');
Route::get(
    '/training/making-robotics-and-tinkering-in-the-classroom',
    'StaticPageController@static'
)->name('training.module-5');
Route::get(
    '/training/developing-creative-thinking-through-mobile-app-development',
    'StaticPageController@static'
)->name('training.module-6');
Route::get(
    '/training/tinkering-and-making',
    'StaticPageController@static'
)->name('training.module-7');
Route::get(
    '/training/coding-for-all-subjects',
    'StaticPageController@static'
)->name('training.module-8');
Route::get(
    '/training/making-an-automaton-with-microbit',
    'StaticPageController@static'
)->name('training.module-9');
Route::get(
    '/training/creative-coding-with-python',
    'StaticPageController@static'
)->name('training.module-10');
Route::get(
    '/training/coding-for-inclusion',
    'StaticPageController@static'
)->name('training.module-11');
Route::get(
    '/training/coding-for-sustainable-development-goals',
    'StaticPageController@static'
)->name('training.module-12');
Route::get(
    '/training/introduction-to-artificial-intelligence-in-the-classroom',
    'StaticPageController@static'
)->name('training.module-13');
Route::get(
    '/training/learning-in-the-age-of-intelligent-machines',
    'StaticPageController@static'
)->name('training.module-14');
Route::get(
    '/training/mining-media-literacy',
    'StaticPageController@static'
)->name('training.module-15');

Route::get(
    '/training/story-telling-with-hedy',
    'StaticPageController@static'
)->name('training.module-16');

Route::get(
    '/training/feel-the-code',
    'StaticPageController@static'
)->name('training.module-17');

Route::get('/resources/CodingAtHome', 'CodingAtHomeController@show')->name(
    'coding@home'
);
Route::view(
    '/resources/CodingAtHome/introduction',
    'codingathome.introduction'
)->name('codingathome-introduction');
Route::view(
    '/resources/CodingAtHome/the-explorer',
    'codingathome.the-explorer'
)->name('codingathome-the-explorer');
Route::view(
    '/resources/CodingAtHome/right-and-left',
    'codingathome.right-and-left'
)->name('codingathome-right-and-left');
Route::view(
    '/resources/CodingAtHome/keep-off-my-path',
    'codingathome.keep-off-my-path'
)->name('codingathome-keep-off-my-path');
Route::view(
    '/resources/CodingAtHome/tug-of-war',
    'codingathome.tug-of-war'
)->name('codingathome-tug-of-war');
Route::view(
    '/resources/CodingAtHome/explorer-without-footprints',
    'codingathome.explorer-without-footprints'
)->name('codingathome-explorer-without-footprints');
Route::view(
    '/resources/CodingAtHome/walk-as-long-as-you-can',
    'codingathome.walk-as-long-as-you-can'
)->name('codingathome-walk-as-long-as-you-can');
//Route::view('/resources/CodingAtHome/ada-charles-roby', 'codingathome.ada-charles-roby')->name('codingathome-ada-charles-roby');
Route::view(
    '/resources/CodingAtHome/cody-and-roby',
    'codingathome.cody-and-roby'
)->name('codingathome-cody-and-roby');
Route::view(
    '/resources/CodingAtHome/the-tourist',
    'codingathome.the-tourist'
)->name('codingathome-the-tourist');
Route::view(
    '/resources/CodingAtHome/catch-the-robot',
    'codingathome.catch-the-robot'
)->name('codingathome-catch-the-robot');
Route::view(
    '/resources/CodingAtHome/the-snake',
    'codingathome.the-snake'
)->name('codingathome-the-snake');
Route::view(
    '/resources/CodingAtHome/storytelling',
    'codingathome.storytelling'
)->name('codingathome-storytelling');
Route::view(
    '/resources/CodingAtHome/two-snakes',
    'codingathome.two-snakes'
)->name('codingathome-two-snakes');
Route::view(
    '/resources/CodingAtHome/round-trip',
    'codingathome.round-trip'
)->name('codingathome-round-trip');
Route::view(
    '/resources/CodingAtHome/meeting-point',
    'codingathome.meeting-point'
)->name('codingathome-meeting-point');
Route::view(
    '/resources/CodingAtHome/follow-the-music',
    'codingathome.follow-the-music'
)->name('codingathome-follow-the-music');
Route::view(
    '/resources/CodingAtHome/colour-everything',
    'codingathome.colour-everything'
)->name('codingathome-colour-everything');
Route::view(
    '/resources/CodingAtHome/codyplotter-and-codyprinter',
    'codingathome.codyplotter-and-codyprinter'
)->name('codingathome-codyplotter-and-codyprinter');
Route::view(
    '/resources/CodingAtHome/boring-pixels',
    'codingathome.boring-pixels'
)->name('codingathome-boring-pixels');
Route::view(
    '/resources/CodingAtHome/turning-code-into-pictures',
    'codingathome.turning-code-into-pictures'
)->name('codingathome-turning-code-into-pictures');

Route::get('/events', 'SearchController@search')->name('events_map');
Route::get('/add', 'EventController@create')->name('create_event');
Route::get('/map', 'MapController@index')->name('map');
//Route::get('/resources', 'ResourcesPageController@index')->name('resources');
Route::get('/resources', 'ResourcesController@learn')->name('resources');
Route::get('/resources/learn', 'ResourcesController@learn')->name('resources_learn');
Route::get('/resources/teach', 'ResourcesController@teach')->name(
    'resources_teach'
);
Route::post('/resources/search', 'SearchResourcesController@search')->name(
    'search_resources'
);

//Route::get('/resources/suggest', 'SuggestResourcesController@get')->name('suggest_resources')->middleware('auth');
//Route::post('/resources/suggest', 'SuggestResourcesController@store')->name('store_suggest_resources')->middleware('auth');

//Route::get('/resources/{country}', 'ResourcesController@show')->name('resources_by_country');
Route::get('/ambassadors', 'CommunityController@index')->name('ambassadors');
Route::get('/volunteer', 'VolunteerController@create')
    ->middleware('auth')
    ->name('volunteer');
Route::post('/volunteer', 'VolunteerController@store')
    ->middleware('auth')
    ->name('volunteer_store');
Route::post('/events', 'EventController@store')->middleware('auth');
Route::patch('/events/{event}', 'EventController@update')->middleware('auth');
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get(
    'login/{provider}/callback',
    'Auth\LoginController@handleProviderCallback'
);
Route::get('/my', 'EventController@my')
    ->middleware('auth')
    ->name('my_events');

Route::get('/search', 'SearchController@search')->name('search_event');
Route::post('/search', 'SearchController@searchPOST')->name('search_events');
Route::get('/scoreboard', 'ScoreboardController@index')->name('scoreboard');
Route::patch('user', 'UserController@update')
    ->name('user.update')
    ->middleware('auth');
Route::get('view/{event}/{slug}', 'EventController@show')->name('view_event');

Route::get('/my/reportable', 'ReportController@list')
    ->middleware('auth')
    ->name('my_reportable_events');
Route::get('events_to_report', 'ReportController@list')
    ->name('report_list')
    ->middleware('auth');

Route::get('certificates', 'CertificateController@list')
    ->name('certificates')
    ->middleware('auth');

Route::get('certificates/excellence/{edition}', 'ExcellenceController@report')
    ->name('certificate_excellence')
    ->middleware('auth');
Route::post(
    'certificates/excellence/{edition}',
    'ExcellenceController@generate'
)
    ->name('certificate_excellence_report')
    ->middleware('auth');

Route::get(
    'certificates/super-organiser/{edition}',
    'SuperOrganiserController@report'
)
    ->name('certificate_super_organiser')
    ->middleware('auth');
Route::post(
    'certificates/super-organiser/{edition}',
    'SuperOrganiserController@generate'
)
    ->name('certificate_super_organiser_report')
    ->middleware('auth');

Route::get('participation', 'ParticipationController@show')
    ->name('participation')
    ->middleware('auth');
Route::post('participation', 'ParticipationController@generate')
    ->name('participation_submit')
    ->middleware('auth');

//Route::get('participation/test', 'ParticipationController@test');

Route::get('event/edit/{event}', 'EventController@edit')
    ->name('edit_event')
    ->middleware('auth');
Route::get('event/report/{event}', 'ReportController@index')
    ->name('report_event')
    ->middleware('auth');
Route::post('event/report/{event}', 'ReportController@store');
//Route::resource('school', 'SchoolController');
Route::get('schools', 'SchoolsController@index')->name('schools');

Route::post('api/users/{user}/avatar', 'Api\UserAvatarController@store')
    ->middleware('auth')
    ->name('avatar');
Route::post('api/events/picture', 'Api\EventPictureController@store')
    ->middleware('auth')
    ->name('event_picture');
Route::delete(
    'api/users/avatar',
    'Api\UserAvatarController@delete'
)->middleware('auth');

Route::get('api/event/list', 'Api\EventsController@list')->name('event_list');
Route::get('api/event/detail', 'Api\EventsController@detail')->name(
    'event_list'
);
Route::get('api/event/closest', 'Api\EventsController@closest');
Route::get('event/delete/{event}', 'EventController@delete')
    ->name('delete_event')
    ->middleware('auth');
Route::post('/api/event/delete/{event}', 'EventController@delete')
    ->name('event.delete')
    ->middleware('auth');

Route::get('api/event/list/eeducation', 'Api\EventsController@eeducation');

Route::get('toolkits', 'ToolkitsController@get')->name('toolkits');

Route::post('api/event/report/{event}', 'ReportController@store')->middleware(
    'auth'
);

Route::group(['middleware' => ['role:super admin']], function () {
    Route::post(
        'api/resource/level/',
        'Api\Resource\LevelController@store'
    )->name('resource_level');
    Route::post(
        'api/resource/item/',
        'Api\Resource\ItemController@store'
    )->name('resource_item');

    Route::get('podcasts/upcoming', 'PodcastsController@upcoming')->name(
        'podcasts_upcoming'
    );
});


Route::group(['middleware' => ['role:super admin']], function () {
    Route::get('/activities', 'AdminController@activities')->name('activities');
    Route::get('/pending/{country}', 'PendingEventsController@index')->name(
        'pending_by_country'
    );
    Route::get('/review/{country}', 'ReviewController@index')->name('review_by_country');


    Route::get('/online/list/{country}', 'OnlineEventsController@list')->name(
        'online_events_by_country'
    );
    Route::get('/online/promoted', 'OnlineEventsController@promoted')->name(
        'promoted_events'
    );
    Route::get(
        '/online/promoted/{country}',
        'OnlineEventsController@promoted'
    )->name('promoted_events_by_country');
    Route::get('/online/featured', 'OnlineEventsController@featured')->name(
        'featured_events'
    );
    Route::get(
        '/online/featured/{country}',
        'OnlineEventsController@featured'
    )->name('featured_events_by_country');
    Route::get('/volunteers', 'VolunteerController@index')
        ->middleware('auth')
        ->name('volunteers');
    Route::get('/volunteer/{volunteer}/approve', 'VolunteerController@approve')
        ->middleware('auth')
        ->name('volunteer_approve');
    Route::get('/volunteer/{volunteer}/reject', 'VolunteerController@reject')
        ->middleware('auth')
        ->name('volunteer_reject');
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
        '/admin/excellence/winners',
        'ExcellenceWinnersController@list'
    )->name('excellence_winners');
    Route::post(
        '/admin/excellence/excel',
        'ExcellenceWinnersController@excel'
    )->name('excellence_excel');

    Route::get(
        '/mail/template/remind/creators',
        'MailTemplateController@remindcreators'
    );

    Route::get('/admin/certificates', 'AdminController@certificates')->name(
        'admin_certificates'
    );
    Route::post(
        '/admin/certificates',
        'AdminController@generateCertificates'
    )->name('generate_certificates');




});

Route::group(['middleware' => ['role:super admin|ambassador']], function () {
    Route::get('/pending', 'PendingEventsController@index')->name('pending');
    Route::get('/review', 'ReviewController@index')->name('review');

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




Route::group(['middleware' => [
    'auth',
    'role:super admin|leading teacher|leading teacher admin']], function () {
    Route::get('/my/badges', 'BadgesController@my')->name('my-badges')->middleware('auth');
    Route::get('/badges/user/{user}/{year?}', 'BadgesController@user')->name('badges-user');
    Route::get('/badges/leaderboard/{year?}', 'BadgesController@leaderboard')->name('badges-leaderboard-year');
});

Route::get(
    '/codeweek4all/{code}/detail',
    'Codeweek4AllController@detail'
)->name('codeweek4all_details');

Route::get('/featured-activities', 'OnlineEventsController@calendar')->name(
    'featured_activities'
);

Route::get('/profile', function () {
    $data = ['profileUser' => Auth()->user()];

    return view('profile', $data);
})
    ->name('profile')
    ->middleware('auth');

Route::get('user/delete', 'UserController@delete')
    ->name('delete_user')
    ->middleware('auth');

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



Route::view('/chatbot', 'static.chatbot')->name('chatbot');
Route::view('/teach-day', 'teach-day')->name('teach-day');

Route::get('/community', 'CommunityController@index')->name('community');

Route::view('/challenges', '2021.challenges')->name('challenges');
Route::view('/challenges/dance', '2021.challenges.dance')->name('challenges.dance');;



$challenges =  function () {
    Route::view('compose-song','2021.challenges.compose-song')->name('challenges.compose-song');
    Route::view('sensing-game','2021.challenges.sensing-game')->name('challenges.sensing-game');
    Route::view('chatbot', '2021.challenges.chatbot')->name('challenges.chatbot');
    Route::view('paper-circuit','2021.challenges.paper-circuit')->name('challenges.paper-circuit');
    Route::view('ai-hour-of-code','2021.challenges.ai-hour-of-code')->name('challenges.ai-hour-of-code');
    Route::view('calming-leds','2021.challenges.calming-leds')->name('challenges.calming-leds');
    Route::view('computational-thinking-and-computational-fluency','2021.challenges.computational-thinking-and-computational-fluency')->name('challenges.computational-thinking-and-computational-fluency');
    Route::view('create-a-dance','2021.challenges.create-a-dance')->name('challenges.create-a-dance');
    Route::view('create-a-simulation','2021.challenges.create-a-simulation')->name('challenges.create-a-simulation');
    Route::view('create-your-own-masterpiece','2021.challenges.create-your-own-masterpiece')->name('challenges.create-your-own-masterpiece');
    Route::view('cs-first-unplugged-activities','2021.challenges.cs-first-unplugged-activities')->name('challenges.cs-first-unplugged-activities');
    Route::view('family-care', '2021.challenges.family-care')->name('challenges.family-care');
    Route::view('virtual-flower-field','2021.challenges.virtual-flower-field')->name('challenges.virtual-flower-field');
    Route::view('haunted-house','2021.challenges.haunted-house')->name('challenges.haunted-house');
    Route::view('inclusive-app-design','2021.challenges.inclusive-app-design')->name('challenges.inclusive-app-design');
    Route::view('silly-eyes', '2021.challenges.silly-eyes')->name('challenges.silly-eyes');
    Route::view('train-ai-bot','2021.challenges.train-ai-bot')->name('challenges.train-ai-bot');
    Route::view('build-calliope','2021.challenges.build-calliope')->name('challenges.build-calliope');
    Route::view('animate-a-name','2021.challenges.animate-a-name')->name('challenges.animate-a-name');
    Route::view('european-astro-pi','2021.challenges.european-astro-pi')->name('challenges.european-astro-pi');
    Route::view('code-a-dice','2021.challenges.code-a-dice')->name('challenges.code-a-dice');
    Route::view('personal-trainer','2021.challenges.personal-trainer')->name('challenges.personal-trainer');
    Route::view('create-a-spiral','2021.challenges.create-a-spiral')->name('challenges.create-a-spiral');
};

Route::group(['prefix' => '2021/challenges'], $challenges);
Route::group(['prefix' => 'challenges'], $challenges);


Route::view('/leaflet', 'map.leaflet')->name('leaflet');

Route::get(
    'leading-teachers-document',
    'LeadingTeacherController@getCurrentToolkit'
)->name('leading-teachers-document');

Route::get('podcasts', 'PodcastsController@index')->name('podcasts');
Route::get('podcast/{podcast}', 'PodcastsController@show')->name('podcast');




Route::get('/unsubscribe/{email}/{magic}', 'UnsubscribeController@index')->name('unsubscribe');


Route::group(['middleware' => ['auth']], function () {
    Route::get('activities-locations', 'LocationController@index')->name('activities-locations');
});

//Route::view('/registration', 'registration.add');
Route::view('/online-courses', 'online-courses')->name('online-courses');

Route::get('mailing/test', function(){

    //$email = ['alainvd@gmail.com'];
    $user = User::where("id","19588")->first();

    return new App\Mail\UserCreated($user);
});

Route::get('/hackathons', 'HackathonsController@index')->name('hackathons');


Auth::routes();
Route::feeds();

