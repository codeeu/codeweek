<?php

namespace App\RSSItems;

use App\Console\Commands\api\GermanTraits;
use Illuminate\Database\Eloquent\Model;

class BayernRSSItem extends Model
{
    protected $fillable = [
        'uid',
        'title',
        'description',
        'organizer',
        'photo',
        'eventEndDate',
        'eventStartDate',
        'latitude',
        'longitude',
        'location',
        'user_company',
        'user_email',
        'user_publicEmail',
        'user_type',
        'user_website',
        'activity_type',
        'imported_at',
        'audience',
        'themes',
        'tags',
        'last_updated_at',
    ];

    protected $dates = [
        'eventEndDate',
        'eventStartDate',
        'imported_at',
        'created_at',
        'updated_at',
        'last_updated_at',
    ];
    
    use GermanTraits;

    public function createEvent($technicalUser)
    {

        $this->createGermanEvent('bayern');

    }
}
