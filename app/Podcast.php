<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Podcast extends Model implements Feedable
{
    //
    protected $guarded = [];

    protected $casts = [
        'release_date' => 'datetime',
    ];

    public function guests(): HasMany
    {
        return $this->hasMany(\App\PodcastGuest::class)->orderBy('position');
    }

    public function resources(): HasMany
    {
        return $this->hasMany(\App\PodcastResource::class)->orderBy('position');
    }

    public function scopeActive($query)
    {
        return $query
            ->where('active', true)
            ->where('release_date', '<=', Carbon::now());
    }

    /* public function toFeedItem(): FeedItem {
        return FeedItem::create([
            'id' => $this->id,
            'title' => $this->title,
            'summary' => $this->description,
            'updated' => $this->updated_at,
            'link' => $this->filename,
            'authorName' => 'EU Code Week',
            'authorEmail' => 'm.bailey@mcgroup.com'
        ]);
    }*/

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->link($this->duration)
            ->summary($this->description)
            ->updated($this->release_date)
            ->enclosure($this->filename)
            ->enclosureType('audio/mpeg')
            ->enclosureLength($this->filesize)
            ->authorName('EU Code Week')
            ->authorEmail('m.bailey@mcgroup.com')
            ->image('https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/art/'.$this->image);
    }

    public static function getFeedItems()
    {
        return Podcast::active()
            ->orderBy('release_date', 'DESC')
            ->get();
    }
}
