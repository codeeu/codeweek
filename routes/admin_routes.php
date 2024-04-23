<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Super Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes that are only accessible to the super admin.
|
*/

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

    // Display all the organisers that are eligible to receive a certificate of excellence with details about the Codeweek4all code.
    Route::get(
        '/admin/excellence/winners',
        'ExcellenceWinnersController@list'
    )->name('excellence_winners');

    // Create an Excel with the winners of the excellence certificates
    Route::post(
        '/admin/excellence/excel',
        'ExcellenceWinnersController@excel'
    )->name('excellence_excel');

    // Get the detail of a codeweek4all code with all the participants linked to the code.
    Route::get(
        '/codeweek4all/{code}/detail',
        'Codeweek4AllController@detail'
    )->name('codeweek4all_details');
});