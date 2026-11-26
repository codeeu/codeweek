<?php

namespace Tests\Unit;

use App\Services\BulkEventUploadValidator;
use Tests\TestCase;

/**
 * The bulk upload column list is a published contract. National partners build
 * export scripts against the public wiki page:
 *
 *   https://github.com/codeeu/codeweek/wiki/Publish-your-events-into-Codeweek
 *
 * Changing REQUIRED_COLUMNS without updating that page gives partners failures
 * that look like our bug from their side. This test pins the list so any change
 * has to be deliberate, and fails with a reminder to update the wiki.
 */
final class BulkEventUploadColumnContractTest extends TestCase
{
    private const PUBLISHED_COLUMNS = [
        'activity_title',
        'name_of_organisation',
        'type_of_organisation',
        'activity_type',
        'description',
        'address',
        'country',
        'start_date',
        'end_date',
        'longitude',
        'latitude',
        'contact_email',
        'organiser_website',
        'participants_count',
        'males_count',
        'females_count',
        'other_count',
    ];

    public function test_required_columns_match_the_published_wiki_contract(): void
    {
        $this->assertSame(
            self::PUBLISHED_COLUMNS,
            BulkEventUploadValidator::REQUIRED_COLUMNS,
            'The bulk upload column contract changed. Update the public wiki page '
            .'and this test together, and tell national partners before deploying.'
        );
    }
}
