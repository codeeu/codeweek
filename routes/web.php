<?php

/**
 * @Author: Bernard Hanna
 * @Date:   2025-03-03 16:51:10
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2025-03-13 12:18:47
 */


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

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api;
// use App\Http\Controllers\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BadgesController;
use App\Http\Controllers\BulkEventUploadController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\Codeweek4AllController;
use App\Http\Controllers\CodingAtHomeController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExcellenceController;
use App\Http\Controllers\ExcellenceWinnersController;
use App\Http\Controllers\HackathonsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadingTeacherController;
use App\Http\Controllers\LeadingTeachersList;
use App\Http\Controllers\LeadingTeachersReport;
use App\Http\Controllers\LeadingTeachersSignup;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MailTemplateController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MatchMakingToolController;
use App\Http\Controllers\OnlineEventsController;
use App\Http\Controllers\ParticipationController;
use App\Http\Controllers\PendingEventsController;
use App\Http\Controllers\PodcastsController;
use App\Http\Controllers\RemoteTeachingController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SchoolsController;
use App\Http\Controllers\ScoreboardController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SearchResourcesController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\SuperOrganiserController;
use App\Http\Controllers\ToolkitsController;
use App\Http\Controllers\UnsubscribeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\ConsentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeocodeController;
use Illuminate\Support\Facades\Config;
// Bulk upload: register early so no other route shadows it
Route::middleware(['auth', 'role:super admin'])->group(function () {
    Route::get('/admin/bulk-upload', [BulkEventUploadController::class, 'index'])->name('admin.bulk-upload.index');
    Route::post('/admin/bulk-upload/validate', [BulkEventUploadController::class, 'validateUpload'])->name('admin.bulk-upload.validate');
    Route::post('/admin/bulk-upload/import', [BulkEventUploadController::class, 'import'])->name('admin.bulk-upload.import');
    Route::get('/admin/bulk-upload/import', fn () => redirect()->route('admin.bulk-upload.index'))->name('admin.bulk-upload.import.get');
    Route::get('/admin/bulk-upload/report', [BulkEventUploadController::class, 'report'])->name('admin.bulk-upload.report');
});

//redirects start
Route::permanentRedirect('/certificates/excellence/Excellence Certificate', '/certificates/excellence/2024');
Route::permanentRedirect('/certificates/excellence/Excellence%20Certificate', '/certificates/excellence/2024');
Route::redirect('/resources/learn', '/resources/learn-and-teach', 301);
Route::redirect('/learn', '/resources/learn-and-teach', 301);
Route::redirect('/teach', '/resources/learn-and-teach', 301);
Route::redirect('/static/docs/codeeu_toolkit.pdf', '/guide', 301);
Route::get('/google-grants-to-46-eu-code-week-projects-thatt', function () {
    return redirect('/blog/google-grants-to-46-eu-code-week-projects-that', 301);
});
Route::permanentRedirect('/the-codehunting-game-is-on-across-europe', '/blog/the-codehunting-game-is-on-across-europe');
Route::permanentRedirect('/eu-code-week-leading-teachers-join-a-growing', '/blog/eu-code-week-leading-teachers-join-a-growing');
Route::permanentRedirect('/25-selected-leading-teachers-to-attend-the-first', '/blog/25-selected-leading-teachers-to-attend-the-first');
Route::permanentRedirect('/eu-code-weeks-deep-dive-mooc-to-expand-teachers', '/blog/eu-code-weeks-deep-dive-mooc-to-expand-teachers');
Route::permanentRedirect('/day-1-of-the-eu-code-week-pilot-summer-school', '/blog/day-1-of-the-eu-code-week-pilot-summer-school');
Route::permanentRedirect('/europe-code-week-veria-central-public-library', '/blog/europe-code-week-veria-central-public-library');
Route::permanentRedirect('/5-activities-to-try-out-something-new-with-coding', '/blog/5-activities-to-try-out-something-new-with-coding');
Route::permanentRedirect('/eucodeweek19stats', '/blog/eucodeweek19stats');
Route::permanentRedirect('/eu-code-week-free-icebreaker-course-starts-11-may', '/blog/eu-code-week-free-icebreaker-course-starts-11-may');
Route::permanentRedirect('/distance-learning-with-coding', '/blog/distance-learning-with-coding');
Route::permanentRedirect('/meet-the-ambassadors-alessandro-bogliolo-italy', '/blog/meet-the-ambassadors-alessandro-bogliolo-italy');
Route::permanentRedirect('/meet-the-ambassadors-alja-isakovic-slovenia', '/blog/meet-the-ambassadors-alja-isakovic-slovenia');
Route::permanentRedirect('/meet-the-ambassadors-lieke-boon-netherlands', '/blog/meet-the-ambassadors-lieke-boon-netherlands');
Route::permanentRedirect('/meet-the-ambassadors-kostas-karpouzis-greece', '/blog/meet-the-ambassadors-kostas-karpouzis-greece');
Route::permanentRedirect('/meet-the-ambassadors-laurence-bricteux-france', '/blog/meet-the-ambassadors-laurence-bricteux-france');
Route::permanentRedirect('/meet-the-ambassadors-adil-tugyan-turkey', '/blog/meet-the-ambassadors-adil-tugyan-turkey');
Route::permanentRedirect('/meet-the-ambassadors-szabolcs-mizsei-hungary', '/blog/meet-the-ambassadors-szabolcs-mizsei-hungary');
Route::permanentRedirect('/meet-the-ambassadors-gesche-joost-germany', '/blog/meet-the-ambassadors-gesche-joost-germany');
Route::permanentRedirect('/meet-the-ambassadors-antonis-hadjiantonis-cyprus', '/blog/meet-the-ambassadors-antonis-hadjiantonis-cyprus');
Route::permanentRedirect('/meet-the-ambassadors-abayomi-ogundipe-moldova', '/blog/meet-the-ambassadors-abayomi-ogundipe-moldova');
Route::permanentRedirect('/meet-the-ambassadors-yasemin-allsop-united-kingdom', '/blog/meet-the-ambassadors-yasemin-allsop-united-kingdom');
Route::permanentRedirect('/meet-the-ambassadors-paulius-podolskis-lithuania', '/blog/meet-the-ambassadors-paulius-podolskis-lithuania');
Route::permanentRedirect('/meet-the-ambassadors-gabriella-fumagalli-switzerland', '/blog/meet-the-ambassadors-gabriella-fumagalli-switzerland');
Route::permanentRedirect('/as-the-preparations-for-the-second-code-week-are', '/blog/as-the-preparations-for-the-second-code-week-are');
Route::permanentRedirect('/as-the-preparations-for-the-second-code-week-are', '/blog/as-the-preparations-for-the-second-code-week-are');
Route::permanentRedirect('/programming-a-pedometer-to-bring-coding-to?is_related_post=1', '/blog/programming-a-pedometer-to-bring-coding-to/');
Route::get('/podcast/{slug}', function ($slug) {
    return redirect("/podcasts/{$slug}", 301);
});
Route::permanentRedirect('/view/1221651/blog/careers-linda-liukas/', '/blog/careers-linda-liukas/');
Route::permanentRedirect('/challenges/careers-as-constellations/', '/blog/careers-as-constellations/');
Route::permanentRedirect('/view/1221652/blog/careers-linda-liukas/', '/blog/careers-linda-liukas/');
Route::permanentRedirect('/view/1221652/challenges/careers-as-constellations', '/challenges/careers-as-constellations/');
Route::permanentRedirect('/view/1221912/blog/careers-linda-liukas/', '/blog/careers-linda-liukas/');
Route::permanentRedirect('/view/1221912/challenges/careers-as-constellations', '/challenges/careers-as-constellations/');
Route::permanentRedirect('/view/1221651/challenges/careers-as-constellations', '/challenges/careers-as-constellations');

Route::permanentRedirect('/blog/codeeu-monday-and-tuesday-thousands-of-schools/1Lg7vYO/', '/blog/codeeu-monday-and-tuesday-thousands-of-schools/');
Route::permanentRedirect('/2021/challenges/dance/', '/challenges/dance/');
Route::permanentRedirect('/2021/challenges', '/challenges');
Route::permanentRedirect('/blog/submit', '/blog');
Route::permanentRedirect('/blog/top-programming-languages-for-kids-of-any-language/Introduction%20to%20Scratch', '/blog/top-programming-languages-for-kids-of-any-language/');
Route::permanentRedirect('/blog/top-programming-languages-for-kids-of-any-language/ScratchEd', '/blog/top-programming-languages-for-kids-of-any-language/');
Route::permanentRedirect('/hackathons/slovenia', '/hackathons');
Route::permanentRedirect('/hackathons/greece', '/hackathons');

Route::get('/search/{term}', function ($term) {
    if (strtolower($term) === 'e twinning') {
        return redirect('/search', 301);
    }

    // Optionally, handle other terms or return 404
    abort(404);
});
//redirects end
//Auth::loginUsingId(268354);

Route::domain('{subdomain}.'.Config::get('app.url'))->group(function () {
    Route::get('/', function ($subdomain) {
        return redirect(Config::get('app.url').'/'.$subdomain);
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
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/guide', [StaticPageController::class, 'static'])->name('guide');
Route::get('/privacy', [StaticPageController::class, 'static'])->name('privacy');
Route::get('/privacy/contact-points', [StaticPageController::class, 'static'])->name('privacy-contact-points');
Route::get('/cookie', [StaticPageController::class, 'static'])->name('cookie');
Route::get('/petition', [StaticPageController::class, 'static'])->name('petition');
Route::get('/beambassador', [StaticPageController::class, 'static'])->name(
    'beambassador'
);
Route::get('/about', [StaticPageController::class, 'static'])->name('about');
Route::get('/our-values', [StaticPageController::class, 'static'])->name('our-values');
Route::get('/partners', [StaticPageController::class, 'static'])->name('sponsors');
Route::get('/codeweek4all', [StaticPageController::class, 'static'])->name(
    'codeweek4all'
);
Route::get('/code-hunting-game', [StaticPageController::class, 'static'])->name(
    'code-hunting-game'
);
Route::get('/codeweek2020', [StaticPageController::class, 'static'])->name(
    'codeweek2020'
);
Route::get('/treasure-hunt', [StaticPageController::class, 'static'])->name(
    'treasure-hunt'
);
Route::get('/dance', [StaticPageController::class, 'static'])->name('dance');
Route::get('/why-coding', [StaticPageController::class, 'static'])->name('why-coding');

Route::get('/girls-in-digital-week', [StaticPageController::class, 'static'])->name(
    'girls-in-digital-week'
);

Route::get('/educational-resources', [StaticPageController::class, 'static'])->name(
    'educational-resources'
);

Route::get('/webinars', [StaticPageController::class, 'static'])->name(
    'webinars'
);

Route::get('/remote-teaching', [RemoteTeachingController::class, 'index'])->name(
    'remote-teaching'
);

Route::get('/dream-jobs-in-digital', [StaticPageController::class, 'static'])->name(
    'dream-jobs-in-digital'
);
Route::get('/future-ready-csr', [StaticPageController::class, 'static'])->name(
    'csr-campaign'
);

Route::get('dream-jobs-in-digital/{role}', [StaticPageController::class, 'static'])->name('dream-jobs-in-digital-role');

Route::get('/get-involved', [StaticPageController::class, 'static'])
     ->name('get-involved');
Route::get('/contact-us', [StaticPageController::class, 'static'])
     ->name('contact-us');
//Static training pages
Route::get('/training', [StaticPageController::class, 'static'])->name('training.index');
Route::get(
    '/training/coding-without-computers',
    [StaticPageController::class, 'static']
)->name('training.module-1');
Route::get(
    '/training/computational-thinking-and-problem-solving',
    [StaticPageController::class, 'static']
)->name('training.module-2');
Route::get(
    '/training/visual-programming-introduction-to-scratch',
    [StaticPageController::class, 'static']
)->name('training.module-3');
Route::get(
    '/training/creating-educational-games-with-scratch',
    [StaticPageController::class, 'static']
)->name('training.module-4');
Route::get(
    '/training/making-robotics-and-tinkering-in-the-classroom',
    [StaticPageController::class, 'static']
)->name('training.module-5');
Route::get(
    '/training/developing-creative-thinking-through-mobile-app-development',
    [StaticPageController::class, 'static']
)->name('training.module-6');
Route::get(
    '/training/tinkering-and-making',
    [StaticPageController::class, 'static']
)->name('training.module-7');
Route::get(
    '/training/coding-for-all-subjects',
    [StaticPageController::class, 'static']
)->name('training.module-8');
Route::get(
    '/training/making-an-automaton-with-microbit',
    [StaticPageController::class, 'static']
)->name('training.module-9');
Route::get(
    '/training/creative-coding-with-python',
    [StaticPageController::class, 'static']
)->name('training.module-10');
Route::get(
    '/training/coding-for-inclusion',
    [StaticPageController::class, 'static']
)->name('training.module-11');
Route::get(
    '/training/coding-for-sustainable-development-goals',
    [StaticPageController::class, 'static']
)->name('training.module-12');
Route::get(
    '/training/introduction-to-artificial-intelligence-in-the-classroom',
    [StaticPageController::class, 'static']
)->name('training.module-13');
Route::get(
    '/training/learning-in-the-age-of-intelligent-machines',
    [StaticPageController::class, 'static']
)->name('training.module-14');
Route::get(
    '/training/mining-media-literacy',
    [StaticPageController::class, 'static']
)->name('training.module-15');

Route::get(
    '/training/story-telling-with-hedy',
    [StaticPageController::class, 'static']
)->name('training.module-16');

Route::get(
    '/training/feel-the-code',
    [StaticPageController::class, 'static']
)->name('training.module-17');

Route::get(
    '/training/sos-water',
    [StaticPageController::class, 'static']
)->name('training.module-18');

Route::get(
    '/training/creative-scratch-laboratory',
    [StaticPageController::class, 'static']
)->name('training.module-19');

Route::get(
    '/training/code-through-art',
    [StaticPageController::class, 'static']
)->name('training.module-20');

Route::get(
    '/training/making-and-coding',
    [StaticPageController::class, 'static']
)->name('training.module-21');

/*Route::get(
    '/training/making-and-coding',
    [StaticPageController::class, 'static']
)->name('training.module-22'); */
Route::post('/contact-submit', [ContactFormController::class, 'submit'])
    ->middleware('throttle:5,1') // 5 requests per minute per IP
    ->name('contact.submit');
Route::get('/resources/CodingAtHome', [CodingAtHomeController::class, 'show'])->name(
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

Route::get('/add', [EventController::class, 'create'])->name('create_event')->middleware('auth');
Route::get('/map', [MapController::class, 'index'])->name('map');
//Route::get('/resources', 'ResourcesPageController@index')->name('resources');
Route::get('/resources', [ResourcesController::class, 'all'])->name('resources');
Route::get('/resources/learn-and-teach', [ResourcesController::class, 'all'])->name('resources_all');
Route::post('/resources/search', [SearchResourcesController::class, 'search'])->name(
    'search_resources'
);
Route::get('/matchmaking-tool', [MatchMakingToolController::class, 'index'])->name(
    'matchmaking_tool'
);
Route::post('/matchmaking-tool/search', [MatchMakingToolController::class, 'searchPOST'])->name('search_matchprofiles');
Route::get('/matchmaking-tool/{slug}', [MatchMakingToolController::class, 'show'])->name(
    'matchmaking_tool_detail'
);
//Route::get('/resources/suggest', 'SuggestResourcesController@get')->name('suggest_resources')->middleware('auth');
//Route::post('/resources/suggest', 'SuggestResourcesController@store')->name('store_suggest_resources')->middleware('auth');

//Route::get('/resources/{country}', 'ResourcesController@show')->name('resources_by_country');
Route::get('/ambassadors', [CommunityController::class, 'index'])->name('ambassadors');
Route::get('/volunteer', [VolunteerController::class, 'create'])
    ->middleware('auth')
    ->name('volunteer');
Route::post('/volunteer', [VolunteerController::class, 'store'])
    ->middleware('auth')
    ->name('volunteer_store');
Route::post('/events', [EventController::class, 'store'])->middleware('auth');
Route::patch('/events/{event}', [EventController::class, 'update'])->middleware('auth');
Route::get('login/{provider}', [LoginController::class, 'redirectToProvider']);
Route::get(
    'login/{provider}/callback',
    [LoginController::class, 'handleProviderCallback']
);
Route::get('/my', [EventController::class, 'my'])
    ->middleware('auth')
    ->name('my_events');

Route::get('/events', [SearchController::class, 'search'])->name('events_map');
Route::post('/search', [SearchController::class, 'searchPOST'])->name('search_events');
Route::get('/search', [SearchController::class, 'index'])->name('search_event');
Route::get('/scoreboard', [ScoreboardController::class, 'index'])->name('scoreboard');
Route::patch('user', [UserController::class, 'update'])
    ->name('user.update')
    ->middleware('auth');
Route::get('view/{event}/{slug}', [EventController::class, 'show'])->name('view_event');

Route::get('/my/reportable', [ReportController::class, 'list'])
    ->middleware('auth')
    ->name('my_reportable_events');
Route::get('events_to_report', [ReportController::class, 'list'])
    ->name('report_list')
    ->middleware('auth');

Route::get('certificates', [CertificateController::class, 'list'])
    ->name('certificates')
    ->middleware('auth');

Route::get('certificates/excellence/{edition}', [ExcellenceController::class, 'report'])
    ->name('certificate_excellence')
    ->middleware('auth');
Route::post(
    'certificates/excellence/{edition}',
    [ExcellenceController::class, 'generate']
)
    ->name('certificate_excellence_report')
    ->middleware('auth');

Route::get(
    'certificates/super-organiser/{edition}',
    [SuperOrganiserController::class, 'report']
)
    ->name('certificate_super_organiser')
    ->middleware('auth');
Route::post(
    'certificates/super-organiser/{edition}',
    [SuperOrganiserController::class, 'generate']
)
    ->name('certificate_super_organiser_report')
    ->middleware('auth');

Route::get('participation', [ParticipationController::class, 'show'])
    ->name('participation')
    ->middleware(['auth','verified']);
Route::post('participation', [ParticipationController::class, 'generate'])
    ->name('participation_submit')
    ->middleware('auth');

//Route::get('participation/test', 'ParticipationController@test');

Route::get('event/edit/{event}', [EventController::class, 'edit'])
    ->name('edit_event')
    ->middleware('auth');
Route::get('event/report/{event}', [ReportController::class, 'index'])
    ->name('report_event')
    ->middleware('auth');
Route::post('event/report/{event}', [ReportController::class, 'store']);
//Route::resource('school', 'SchoolController');
Route::get('schools', [SchoolsController::class, 'index'])->name('schools');

Route::post('api/users/{user}/avatar', [Api\UserAvatarController::class, 'store'])
    ->middleware('auth')
    ->name('avatar');
Route::post('api/events/picture', [Api\EventPictureController::class, 'store'])
    ->middleware('auth')
    ->name('event_picture');
Route::delete(
    'api/users/avatar',
    [Api\UserAvatarController::class, 'delete']
)->middleware('auth');

Route::get('api/event/list', [Api\EventsController::class, 'list'])->name('event_list');
Route::get('api/event/detail', [Api\EventsController::class, 'detail'])->name(
    'event_list'
);
Route::get('api/event/closest', [Api\EventsController::class, 'closest']);
Route::get('event/delete/{event}', [EventController::class, 'delete'])
    ->name('delete_event')
    ->middleware('auth');
Route::post('/api/event/delete/{event}', [EventController::class, 'delete'])
    ->name('event.delete')
    ->middleware('auth');

Route::get('api/event/list/eeducation', [Api\EventsController::class, 'eeducation']);

Route::get('toolkits', [ToolkitsController::class, 'get'])->name('toolkits');

Route::post('api/event/report/{event}', [ReportController::class, 'store'])->middleware(
    'auth'
);

Route::middleware('role:super admin')->group(function () {
    Route::post(
        'api/resource/level/',
        [Api\Resource\LevelController::class, 'store']
    )->name('resource_level');
    Route::post(
        'api/resource/item/',
        [Api\Resource\ItemController::class, 'store']
    )->name('resource_item');

    Route::get('podcasts/upcoming', [PodcastsController::class, 'upcoming'])->name(
        'podcasts_upcoming'
    );
});

Route::middleware(['auth', 'role:super admin'])->group(function () {
    Route::get('/activities', [AdminController::class, 'activities'])->name('activities');
    Route::get('/pending/{country}', [PendingEventsController::class, 'index'])->name(
        'pending_by_country'
    );
    Route::get('/review/{country}', [ReviewController::class, 'index'])->name('review_by_country');

    Route::get('/online/list/{country}', [OnlineEventsController::class, 'list'])->name(
        'online_events_by_country'
    );
    Route::get('/online/promoted', [OnlineEventsController::class, 'promoted'])->name(
        'promoted_events'
    );
    Route::get(
        '/online/promoted/{country}',
        [OnlineEventsController::class, 'promoted']
    )->name('promoted_events_by_country');
    Route::get('/online/featured', [OnlineEventsController::class, 'featured'])->name(
        'featured_events'
    );
    Route::get(
        '/online/featured/{country}',
        [OnlineEventsController::class, 'featured']
    )->name('featured_events_by_country');
    Route::get('/volunteers', [VolunteerController::class, 'index'])
        ->middleware('auth')
        ->name('volunteers');
    Route::get('/volunteer/{volunteer}/approve', [VolunteerController::class, 'approve'])
        ->middleware('auth')
        ->name('volunteer_approve');
    Route::get('/volunteer/{volunteer}/reject', [VolunteerController::class, 'reject'])
        ->middleware('auth')
        ->name('volunteer_reject');
    Route::get('mail/{event}', [EmailController::class, 'create'])->middleware('auth');

    Route::get(
        '/mail/template/ambassadors/new',
        [MailTemplateController::class, 'ambassador']
    );
    Route::get(
        '/mail/template/ambassadors/remind_ambassador',
        [MailTemplateController::class, 'remind_ambassador']
    );
    Route::get(
        '/mail/template/creators/registered',
        [MailTemplateController::class, 'registered']
    );
    Route::get(
        '/mail/template/creators/approved',
        [MailTemplateController::class, 'approved']
    );
    Route::get(
        '/mail/template/creators/rejected',
        [MailTemplateController::class, 'rejected']
    );

    Route::get(
        '/admin/excellence/winners',
        [ExcellenceWinnersController::class, 'list']
    )->name('excellence_winners');
    Route::post(
        '/admin/excellence/excel',
        [ExcellenceWinnersController::class, 'excel']
    )->name('excellence_excel');

    Route::get(
        '/mail/template/remind/creators',
        [MailTemplateController::class, 'remindcreators']
    );

    Route::get('/admin/certificates', [AdminController::class, 'certificates'])->name(
        'admin_certificates'
    );
    Route::post(
        '/admin/certificates',
        [AdminController::class, 'generateCertificates']
    )->name('generate_certificates');

});

Route::middleware('role:super admin|ambassador')->group(function () {
    Route::get('/pending', [PendingEventsController::class, 'index'])->name('pending');
    Route::get('/review', [ReviewController::class, 'index'])->name('review');

    Route::get('/online/list', [OnlineEventsController::class, 'list'])->name(
        'admin.online-events'
    );
    Route::post('/api/event/approve/{event}', [EventController::class, 'approve'])->name(
        'event.approve'
    );
    Route::get(
        '/api/event/approveAll/{country}',
        [EventController::class, 'approveAll']
    )->name('event.approveAll');
    Route::post('/api/event/reject/{event}', [EventController::class, 'reject'])->name(
        'event.reject'
    );
});

Route::middleware('auth', 'role:super admin|leading teacher|leading teacher admin')->group(function () {
    Route::get('/my/badges', [BadgesController::class, 'my'])->name('my-badges')->middleware('auth');
    Route::get('/badges/user/{user}/{year?}', [BadgesController::class, 'user'])->name('badges-user');
    Route::get('/badges/leaderboard/{year?}', [BadgesController::class, 'leaderboard'])->name('badges-leaderboard-year');
});

Route::get(
    '/codeweek4all/{code}/detail',
    [Codeweek4AllController::class, 'detail']
)->name('codeweek4all_details');

Route::get('/featured-activities', [OnlineEventsController::class, 'calendar'])->name(
    'featured_activities'
);

Route::get('/profile', function () {
    $data = ['profileUser' => Auth()->user()];

    return view('profile', $data);
})
    ->name('profile')
    ->middleware(['auth','verified']);

Route::get('user/delete', [UserController::class, 'delete'])
    ->name('delete_user')
    ->middleware('auth');

Route::get('/leading-teachers/signup', [LeadingTeachersSignup::class, 'index'])
    ->name('LT.signup')
    ->middleware('auth');
Route::view(
    '/leading-teachers/success',
    'leading-teachers.signup-form-success'
)->middleware('auth');
Route::post('/leading-teachers/signup', [LeadingTeachersSignup::class, 'store'])
    ->name('LT.signup.store')
    ->middleware('auth');

Route::middleware('role:super admin|leading teacher admin')->group(function () {
    Route::get('/leading-teachers/list', [LeadingTeachersList::class, 'index'])
        ->name('leading_teachers_list')
        ->middleware('auth');
}
);

Route::middleware('role:leading teacher|super admin|leading teacher admin')->group(function () {
    Route::get(
        '/leading-teachers/report',
        [LeadingTeachersReport::class, 'index']
    )->name('LT.report');
}
);

Route::view('/chatbot', 'static.chatbot')->name('chatbot');
Route::view('/teach-day', 'teach-day')->name('teach-day');

Route::get('/community', [CommunityController::class, 'index'])->name('community');

Route::view('/challenges', '2021.challenges')->name('challenges');
Route::view('/challenges/dance', '2021.challenges.dance')->name('challenges.dance');

$challenges = function () {
    Route::view('compose-song', '2021.challenges.compose-song')->name('challenges.compose-song');
    Route::view('sensing-game', '2021.challenges.sensing-game')->name('challenges.sensing-game');
    Route::view('chatbot', '2021.challenges.chatbot')->name('challenges.chatbot');
    Route::view('paper-circuit', '2021.challenges.paper-circuit')->name('challenges.paper-circuit');
    Route::view('ai-hour-of-code', '2021.challenges.ai-hour-of-code')->name('challenges.ai-hour-of-code');
    Route::view('calming-leds', '2021.challenges.calming-leds')->name('challenges.calming-leds');
    Route::view('computational-thinking-and-computational-fluency', '2021.challenges.computational-thinking-and-computational-fluency')->name('challenges.computational-thinking-and-computational-fluency');
    Route::view('create-a-dance', '2021.challenges.create-a-dance')->name('challenges.create-a-dance');
    Route::view('create-a-simulation', '2021.challenges.create-a-simulation')->name('challenges.create-a-simulation');
    Route::view('create-your-own-masterpiece', '2021.challenges.create-your-own-masterpiece')->name('challenges.create-your-own-masterpiece');
    Route::view('cs-first-unplugged-activities', '2021.challenges.cs-first-unplugged-activities')->name('challenges.cs-first-unplugged-activities');
    Route::view('family-care', '2021.challenges.family-care')->name('challenges.family-care');
    Route::view('virtual-flower-field', '2021.challenges.virtual-flower-field')->name('challenges.virtual-flower-field');
    Route::view('haunted-house', '2021.challenges.haunted-house')->name('challenges.haunted-house');
    Route::view('inclusive-app-design', '2021.challenges.inclusive-app-design')->name('challenges.inclusive-app-design');
    Route::view('silly-eyes', '2021.challenges.silly-eyes')->name('challenges.silly-eyes');
    Route::view('train-ai-bot', '2021.challenges.train-ai-bot')->name('challenges.train-ai-bot');
    Route::view('build-calliope', '2021.challenges.build-calliope')->name('challenges.build-calliope');
    Route::view('animate-a-name', '2021.challenges.animate-a-name')->name('challenges.animate-a-name');
    Route::view('european-astro-pi', '2021.challenges.european-astro-pi')->name('challenges.european-astro-pi');
    Route::view('code-a-dice', '2021.challenges.code-a-dice')->name('challenges.code-a-dice');
    Route::view('personal-trainer', '2021.challenges.personal-trainer')->name('challenges.personal-trainer');
    Route::view('create-a-spiral', '2021.challenges.create-a-spiral')->name('challenges.create-a-spiral');
    Route::view('play-against-ai', '2021.challenges.play-against-ai')->name('challenges.play-against-ai');
    Route::view('emobot-kliki', '2021.challenges.emobot-kliki')->name('challenges.emobot-kliki');
    Route::view('craft-magic', '2021.challenges.craft-magic')->name('challenges.craft-magic');
    Route::view('circle-of-dots', '2021.challenges.circle-of-dots')->name('challenges.circle-of-dots');
    Route::view('coding-escape-room', '2021.challenges.coding-escape-room')->name('challenges.coding-escape-room');
    Route::view('let-the-snake-run', '2021.challenges.let-the-snake-run')->name('challenges.let-the-snake-run');
    Route::view('illustrate-a-joke', '2021.challenges.illustrate-a-joke')->name('challenges.illustrate-a-joke');
    Route::view('app-that-counts-in-several-languages', '2021.challenges.app-that-counts-in-several-languages')->name('challenges.app-that-counts-in-several-languages');
    Route::view('coding-with-art-through-storytelling', '2021.challenges.coding-with-art-through-storytelling')->name('challenges.coding-with-art-through-storytelling');
    Route::view('coding-with-legoboost', '2021.challenges.coding-with-legoboost')->name('challenges.coding-with-legoboost');
    Route::view('air-drawing-with-AI', '2021.challenges.air-drawing-with-AI')->name('challenges.air-drawing-with-AI');
    Route::view('careers-as-constellations', '2021.challenges.careers-as-constellations')->name('challenges.careers-as-constellations');
    Route::view('code-it-like-margaret-hamilton', '2021.challenges.code-it-like-margaret-hamilton')->name('challenges.code-it-like-margaret-hamilton');
    Route::view('dance-with-ally', '2021.challenges.dance-with-ally')->name('challenges.dance-with-ally');
    Route::view('gender-gap-gender-graph', '2021.challenges.gender-gap-gender-graph')->name('challenges.gender-gap-gender-graph');
    Route::view('coding-for-the-ocean', '2021.challenges.coding-for-the-ocean')->name('challenges.coding-for-the-ocean');
    Route::view('simulate-dice-in-python', '2021.challenges.simulate-dice-in-python')->name('challenges.simulate-dice-in-python');
    Route::view('train-it-like-fei-fei-li', '2021.challenges.train-it-like-fei-fei-li')->name('challenges.train-it-like-fei-fei-li');
    Route::view('create-your-own-website-with-html-and-css', '2021.challenges.create-your-own-website-with-html-and-css')->name('challenges.create-your-own-website-with-html-and-css');
};

Route::prefix('2021/challenges')->group($challenges);
Route::prefix('challenges')->group($challenges);

Route::view('/leaflet', 'map.leaflet')->name('leaflet');

Route::get(
    'leading-teachers-document',
    [LeadingTeacherController::class, 'getCurrentToolkit']
)->name('leading-teachers-document');

Route::get('podcasts', [PodcastsController::class, 'index'])->name('podcasts');
Route::get('podcasts/{podcast}', [PodcastsController::class, 'show'])->name('podcast');

Route::get('/unsubscribe/{email}/{magic}', [UnsubscribeController::class, 'index'])->name('unsubscribe');

Route::middleware('auth')->group(function () {
    Route::get('activities-locations', [LocationController::class, 'index'])->name('activities-locations');
});

//Route::view('/registration', 'registration.add');
Route::view('/online-courses', 'online-courses')->name('online-courses');

Route::get('/hackathons', [HackathonsController::class, 'index'])->name('hackathons');

Route::view('/contact', 'contact')->middleware('auth')->name('contact-us');

Route::get('/consent', [ConsentController::class, 'show'])->middleware('auth')->name('consent.show');
Route::post('/consent', [ConsentController::class, 'store'])->middleware('auth')->name('consent.store');
Route::post('/consent/logout', [ConsentController::class, 'logout'])->middleware('auth')->name('consent.logout');

Route::get('/api/proxy/geocode', [GeocodeController::class, 'findAddressCandidates']);
Route::get('/api/proxy/suggest', [GeocodeController::class, 'suggest']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/profile');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(ProtectAgainstSpam::class)->group(function() {
    Auth::routes();
});
Route::feeds();

Route::get('/events/list/{country?}', [OnlineEventsController::class, 'list'])->name('events.list');
Route::get('/events/promoted/{country?}', [OnlineEventsController::class, 'promoted'])->name('events.promoted');
Route::get('/events/featured/{country?}', [OnlineEventsController::class, 'featured'])->name('events.featured');
//redirects