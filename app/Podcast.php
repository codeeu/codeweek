<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Podcast extends Model implements Feedable {
    //
    protected $guarded = [];

    protected $casts = [
        'release_date' => 'datetime'
    ];

    public function scopeActive($query) {
        return $query->where('active', true);
    }

    /* public function toFeedItem(): FeedItem {
        return FeedItem::create([
            'id' => $this->id,
            'title' => $this->title,
            'summary' => $this->description,
            'updated' => $this->updated_at,
            'link' => $this->filename,
            'authorName' => 'Max Bailey',
            'authorEmail' => 'm.bailey@mcgroup.com'
        ]);
    }*/

    public function toFeedItem(): FeedItem {
        return FeedItem::create()
            ->id($this->id)
            ->link('https://codeweek.eu/feed/podcasts')
            ->title($this->title)
            ->summary($this->description)
            ->updated($this->updated_at)
            ->enclosure($this->filename)
            ->enclosureType('audio/mpeg')
            ->enclosureLength(21830720)
            ->authorName('Max Bailey')
            ->authorEmail('m.bailey@mcgroup.com')
            ->image('http://codeweek.test/images/podcasts/' . $this->image);
    }

    public static function getFeedItems() {
        return Podcast::all();
    }
}