<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BadgesController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\Codeweek4AllController;
use App\Http\Controllers\CodingAtHomeController;
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
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeocodeController;

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

// Static pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/guide', [StaticPageController::class, 'static'])->name('guide');
Route::get('/privacy', [StaticPageController::class, 'static'])->name('privacy');
Route::get('/privacy/contact-points', [StaticPageController::class, 'static'])->name('privacy-contact-points');
Route::get('/cookie', [StaticPageController::class, 'static'])->name('cookie');
Route::get('/petition', [StaticPageController::class, 'static'])->name('petition');
Route::get('/beambassador', [StaticPageController::class, 'static'])->name('beambassador');
Route::get('/about', [StaticPageController::class, 'static'])->name('about');
Route::get('/our-values', [StaticPageController::class, 'static'])->name('our-values');
Route::get('/partners', [StaticPageController::class, 'static'])->name('sponsors');
Route::get('/codeweek4all', [StaticPageController::class, 'static'])->name('codeweek4all');
Route::get('/code-hunting-game', [StaticPageController::class, 'static'])->name('code-hunting-game');
Route::get('/codeweek2020', [StaticPageController::class, 'static'])->name('codeweek2020');
Route::get('/treasure-hunt', [StaticPageController::class, 'static'])->name('treasure-hunt');
Route::get('/dance', [StaticPageController::class, 'static'])->name('dance');
Route::get('/why-coding', [StaticPageController::class, 'static'])->name('why-coding');
Route::get('/remote-teaching', [RemoteTeachingController::class, 'index'])->name('remote-teaching');

// Static training pages
Route::get('/training', [StaticPageController::class, 'static'])->name('training.index');
Route::get('/training/coding-without-computers', [StaticPageController::class, 'static'])->name('training.module-1');
Route::get('/training/computational-thinking-and-problem-solving', [StaticPageController::class, 'static'])->name('training.module-2');
Route::get('/training/visual-programming-introduction-to-scratch', [StaticPageController::class, 'static'])->name('training.module-3');
Route::get('/training/creating-educational-games-with-scratch', [StaticPageController::class, 'static'])->name('training.module-4');
Route::get('/training/making-robotics-and-tinkering-in-the-classroom', [StaticPageController::class, 'static'])->name('training.module-5');
Route::get('/training/developing-creative-thinking-through-mobile-app-development', [StaticPageController::class, 'static'])->name('training.module-6');
Route::get('/training/tinkering-and-making', [StaticPageController::class, 'static'])->name('training.module-7');
Route::get('/training/coding-for-all-subjects', [StaticPageController::class, 'static'])->name('training.module-8');
Route::get('/training/making-an-automaton-with-microbit', [StaticPageController::class, 'static'])->name('training.module-9');
Route::get('/training/creative-coding-with-python', [StaticPageController::class, 'static'])->name('training.module-10');
Route::get('/training/coding-for-inclusion', [StaticPageController::class, 'static'])->name('training.module-11');
Route::get('/training/coding-for-sustainable-development-goals', [StaticPageController::class, 'static'])->name('training.module-12');
Route::get('/training/introduction-to-artificial-intelligence-in-the-classroom', [StaticPageController::class, 'static'])->name('training.module-13');
Route::get('/training/learning-in-the-age-of-intelligent-machines', [StaticPageController::class, 'static'])->name('training.module-14');
Route::get('/training/mining-media-literacy', [StaticPageController::class, 'static'])->name('training.module-15');
Route::get('/training/story-telling-with-hedy', [StaticPageController::class, 'static'])->name('training.module-16');
Route::get('/training/feel-the-code', [StaticPageController::class, 'static'])->name('training.module-17');
Route::get('/training/sos-water', [StaticPageController::class, 'static'])->name('training.module-18');

Route::get('/resources/CodingAtHome', [CodingAtHomeController::class, 'show'])->name('coding@home');
Route::view('/resources/CodingAtHome/introduction', 'codingathome.introduction')->name('codingathome-introduction');
Route::view('/resources/CodingAtHome/the-explorer', 'codingathome.the-explorer')->name('codingathome-the-explorer');
Route::view('/resources/CodingAtHome/right-and-left', 'codingathome.right-and-left')->name('codingathome-right-and-left');
Route::view('/resources/CodingAtHome/keep-off-my-path', 'codingathome.keep-off-my-path')->name('codingathome-keep-off-my-path');
Route::view('/resources/CodingAtHome/tug-of-war', 'codingathome.tug-of-war')->name('codingathome-tug-of-war');
Route::view('/resources/CodingAtHome/explorer-without-footprints', 'codingathome.explorer-without-footprints')->name('codingathome-explorer-without-footprints');
Route::view('/resources/CodingAtHome/walk-as-long-as-you-can', 'codingathome.walk-as-long-as-you-can')->name('codingathome-walk-as-long-as-you-can');
Route::view('/resources/CodingAtHome/cody-and-roby', 'codingathome.cody-and-roby')->name('codingathome-cody-and-roby');
Route::view('/resources/CodingAtHome/the-tourist', 'codingathome.the-tourist')->name('codingathome-the-tourist');
Route::view('/resources/CodingAtHome/catch-the-robot', 'codingathome.catch-the-robot')->name('codingathome-catch-the-robot');
Route::view('/resources/CodingAtHome/the-snake', 'codingathome.the-snake')->name('codingathome-the-snake');
Route::view('/resources/CodingAtHome/storytelling', 'codingathome.storytelling')->name('codingathome-storytelling');
Route::view('/resources/CodingAtHome/two-snakes', 'codingathome.two-snakes')->name('codingathome-two-snakes');
Route::view('/resources/CodingAtHome/round-trip', 'codingathome.round-trip')->name('codingathome-round-trip');
Route::view('/resources/CodingAtHome/meeting-point', 'codingathome.meeting-point')->name('codingathome-meeting-point');
Route::view('/resources/CodingAtHome/follow-the-music', 'codingathome.follow-the-music')->name('codingathome-follow-the-music');
Route::view('/resources/CodingAtHome/colour-everything', 'codingathome.colour-everything')->name('codingathome-colour-everything');
Route::view('/resources/CodingAtHome/codyplotter-and-codyprinter', 'codingathome.codyplotter-and-codyprinter')->name('codingathome-codyplotter-and-codyprinter');
Route::view('/resources/CodingAtHome/boring-pixels', 'codingathome.boring-pixels')->name('codingathome-boring-pixels');
Route::view('/resources/CodingAtHome/turning-code-into-pictures', 'codingathome.turning-code-into-pictures')->name('codingathome-turning-code-into-pictures');

Route::get('/events', [SearchController::class, 'search'])->name('events_map');
Route::get('/add', [EventController::class, 'create'])->name('create_event');
Route::get('/map', [MapController::class, 'index'])->name('map');
Route::get('/resources', [ResourcesController::class, 'learn'])->name('resources');
Route::get('/resources/learn', [ResourcesController::class, 'learn'])->name('resources_learn');
Route::get('/resources/teach', [ResourcesController::class, 'teach'])->name('resources_teach');
Route::post('/resources/search', [SearchResourcesController::class, 'search'])->name('search_resources');
Route::get('/ambassadors', [CommunityController::class, 'index'])->name('ambassadors');
Route::get('/volunteer', [VolunteerController::class, 'create'])->name('volunteer');
Route::post('/volunteer', [VolunteerController::class, 'store'])->name('volunteer_store');
Route::post('/events', [EventController::class, 'store']);
Route::patch('/events/{event}', [EventController::class, 'update']);
Route::get('login/{provider}', [LoginController::class, 'redirectToProvider']);
Route::get('login/{provider}/callback', [LoginController::class, 'handleProviderCallback']);
Route::get('/my', [EventController::class, 'my'])->name('my_events');
Route::get('/search', [SearchController::class, 'search'])->name('search_event');
Route::post('/search', [SearchController::class, 'searchPOST'])->name('search_events');
Route::get('/scoreboard', [ScoreboardController::class, 'index'])->name('scoreboard');
Route::patch('user', [UserController::class, 'update'])->name('user.update');
Route::get('view/{event}/{slug}', [EventController::class, 'show'])->name('view_event');
Route::get('/my/reportable', [ReportController::class, 'list'])->name('my_reportable_events');
Route::get('events_to_report', [ReportController::class, 'list'])->name('report_list');
Route::get('certificates', [CertificateController::class, 'list'])->name('certificates');
Route::get('certificates/excellence/{edition}', [ExcellenceController::class, 'report'])->name('certificate_excellence');
Route::post('certificates/excellence/{edition}', [ExcellenceController::class, 'generate'])->name('certificate_excellence_report');
Route::get('certificates/super-organiser/{edition}', [SuperOrganiserController::class, 'report'])->name('certificate_super_organiser');
Route::post('certificates/super-organiser/{edition}', [SuperOrganiserController::class, 'generate'])->name('certificate_super_organiser_report');
Route::get('participation', [ParticipationController::class, 'show'])->name('participation');
Route::post('participation', [ParticipationController::class, 'generate'])->name('participation_submit');
Route::get('event/edit/{event}', [EventController::class, 'edit'])->name('edit_event');
Route::get('event/report/{event}', [ReportController::class, 'index'])->name('report_event');
Route::post('event/report/{event}', [ReportController::class, 'store']);
Route::get('schools', [SchoolsController::class, 'index'])->name('schools');
Route::post('api/users/{user}/avatar', [Api\UserAvatarController::class, 'store'])->name('avatar');
Route::post('api/events/picture', [Api\EventPictureController::class, 'store'])->name('event_picture');
Route::delete('api/users/avatar', [Api\UserAvatarController::class, 'delete']);
Route::get('api/event/list', [Api\EventsController::class, 'list'])->name('event_list');
Route::get('api/event/detail', [Api\EventsController::class, 'detail'])->name('event_list');
Route::get('api/event/closest', [Api\EventsController::class, 'closest']);
Route::get('event/delete/{event}', [EventController::class, 'delete'])->name('delete_event');
Route::post('/api/event/delete/{event}', [EventController::class, 'delete'])->name('event.delete');
Route::get('api/event/list/eeducation', [Api\EventsController::class, 'eeducation']);
Route::get('toolkits', [ToolkitsController::class, 'get'])->name('toolkits');
Route::post('api/event/report/{event}', [ReportController::class, 'store']);
Route::get('/profile', function () {
    if (app()->environment('local') && !Auth::check()) {
        Auth::login(\App\User::first());
    }

    $data = ['profileUser' => Auth::user()];

    return view('profile', $data);
})->name('profile');

Route::get('user/delete', [UserController::class, 'delete'])->name('delete_user');

Route::get('/leading-teachers/signup', [LeadingTeachersSignup::class, 'index'])->name('LT.signup');
Route::view('/leading-teachers/success', 'leading-teachers.signup-form-success');
Route::post('/leading-teachers/signup', [LeadingTeachersSignup::class, 'store'])->name('LT.signup.store');

Route::get('/chatbot', function() { return view('static.chatbot'); })->name('chatbot');
Route::get('/teach-day', function() { return view('teach-day'); })->name('teach-day');

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
};

Route::prefix('2021/challenges')->group($challenges);
Route::prefix('challenges')->group($challenges);

Route::view('/leaflet', 'map.leaflet')->name('leaflet');

Route::get('leading-teachers-document', [LeadingTeacherController::class, 'getCurrentToolkit'])->name('leading-teachers-document');
Route::get('podcasts', [PodcastsController::class, 'index'])->name('podcasts');
Route::get('podcast/{podcast}', [PodcastsController::class, 'show'])->name('podcast');
Route::get('/unsubscribe/{email}/{magic}', [UnsubscribeController::class, 'index'])->name('unsubscribe');
Route::view('/online-courses', 'online-courses')->name('online-courses');
Route::get('/hackathons', [HackathonsController::class, 'index'])->name('hackathons');
Route::view('/contact', 'contact')->name('contact-us');
Route::get('/consent', [ConsentController::class, 'show'])->name('consent.show');
Route::post('/consent', [ConsentController::class, 'store'])->name('consent.store');
Route::post('/consent/logout', [ConsentController::class, 'logout'])->name('consent.logout');
Route::get('/api/proxy/geocode', [GeocodeController::class, 'findAddressCandidates']);
Route::get('/api/proxy/suggest', [GeocodeController::class, 'suggest']);
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->name('verification.notice');
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/profile');
})->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->name('verification.send');

Route::middleware(ProtectAgainstSpam::class)->group(function() {
    Auth::routes();
});
Route::feeds();

Route::get('/autologin', function () {
    if (app()->environment('local')) {
        Auth::login(User::first());
        return redirect('/home');
    }
    abort(403);
});
Route::get('activities-locations', [LocationController::class, 'index'])->name('activities-locations');
Route::get('/my/badges', [BadgesController::class, 'my'])->name('my-badges');
Route::get('/online/promoted', [OnlineEventsController::class, 'promoted'])->name('promoted_events');
Route::get('/env', function () {
    return app()->environment();
});

Route::get('/dashboard', function () {
    return 'You are logged in!';
});

Route::get('/featured-activities', [OnlineEventsController::class, 'calendar'])->name('featured_activities');