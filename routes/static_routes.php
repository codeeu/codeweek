<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Static Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application static pages.
|
*/


Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/guide', 'StaticPageController@static')->name('guide');
Route::get('/privacy', 'StaticPageController@static')->name('privacy');
Route::get('/privacy/contact-points', 'StaticPageController@static')->name('privacy-contact-points');
Route::get('/cookie', 'StaticPageController@static')->name('cookie');
Route::get('toolkits', 'ToolkitsController@get')->name('toolkits');
Route::view('/challenges', '2021.challenges')->name('challenges');
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

Route::get('/treasure-hunt', 'StaticPageController@static')->name(
    'treasure-hunt'
);
Route::get('/dance', 'StaticPageController@static')->name('dance');
Route::get('/why-coding', 'StaticPageController@static')->name('why-coding');

Route::get('/remote-teaching', 'RemoteTeachingController@index')->name(
    'remote-teaching'
);

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

Route::get(
    '/training/sos-water',
    'StaticPageController@static'
)->name('training.module-18');

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

/*
 * Route for Challenges
 */
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
    Route::view('play-against-ai','2021.challenges.play-against-ai')->name('challenges.play-against-ai');
    Route::view('emobot-kliki','2021.challenges.emobot-kliki')->name('challenges.emobot-kliki');
    Route::view('craft-magic','2021.challenges.craft-magic')->name('challenges.craft-magic');
    Route::view('circle-of-dots','2021.challenges.circle-of-dots')->name('challenges.circle-of-dots');
    Route::view('coding-escape-room','2021.challenges.coding-escape-room')->name('challenges.coding-escape-room');
    Route::view('let-the-snake-run','2021.challenges.let-the-snake-run')->name('challenges.let-the-snake-run');
    Route::view('illustrate-a-joke','2021.challenges.illustrate-a-joke')->name('challenges.illustrate-a-joke');
    Route::view('app-that-counts-in-several-languages','2021.challenges.app-that-counts-in-several-languages')->name('challenges.app-that-counts-in-several-languages');
    Route::view('coding-with-art-through-storytelling','2021.challenges.coding-with-art-through-storytelling')->name('challenges.coding-with-art-through-storytelling');
    Route::view('coding-with-legoboost','2021.challenges.coding-with-legoboost')->name('challenges.coding-with-legoboost');
    Route::view('air-drawing-with-AI','2021.challenges.air-drawing-with-AI')->name('challenges.air-drawing-with-AI');
    Route::view('dance', '2021.challenges.dance')->name('challenges.dance');
};

Route::group(['prefix' => '2021/challenges'], $challenges);
Route::group(['prefix' => 'challenges'], $challenges);


/*
 * Schools page
 */
Route::get('schools', 'SchoolsController@index')->name('schools');

/*
 * Online courses page
 */
Route::view('/online-courses', 'online-courses')->name('online-courses');

/*
 * Old routes. To be deleted ?
 */
Route::view('/teach-day', 'teach-day')->name('teach-day');