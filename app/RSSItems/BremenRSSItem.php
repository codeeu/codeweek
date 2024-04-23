<?php

namespace App\RSSItems;

use App\Console\Commands\api\GermanTraits;
use Illuminate\Database\Eloquent\Model;

class BremenRSSItem extends Model
{
    use GermanTraits;

    public function createEvent($technicalUser)
    {

        $this->createGermanEvent('bremen');

    }
}
