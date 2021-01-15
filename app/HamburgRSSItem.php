<?php

namespace App;

use App\Helpers\MeetAndCodeHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * App\HamburgRSSItem
 *
 * @property int $id
 * @property int $uid
 * @property string $title
 * @property string $description
 * @property string $organizer
 * @property string|null $photo
 * @property string $eventEndDate
 * @property string $eventStartDate
 * @property float $latitude
 * @property float $longitude
 * @property string $location
 * @property string $user_company
 * @property string $user_email
 * @property string $user_publicEmail
 * @property string $user_type
 * @property string $user_website
 * @property string $activity_type
 * @property string|null $imported_at
 * @property string|null $audience
 * @property string|null $themes
 * @property string|null $tags
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereActivityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereAudience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereEventEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereEventStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereImportedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereOrganizer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereThemes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereUserCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereUserEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereUserPublicEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereUserType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HamburgRSSItem whereUserWebsite($value)
 * @mixin \Eloquent
 */
class HamburgRSSItem extends Model
{

    public function createEvent($technicalUser)
    {

        $user = User::where(['email' => $this->user_email])->first();

        if ($user == null) {

            //Create user
            $user = User::create(
                [
                    'email' => $this->user_email,
                    'firstname' => $this->organizer,
                    'lastname' => '',
                    'username' => $this->organizer,
                    "password" => bcrypt(Str::random()),
                ]);

        }

        $event = new Event([
            'status' => "APPROVED",
            'title' => htmlspecialchars_decode($this->title),
            'slug' => Str::slug($this->title),
            'organizer' => $this->organizer,
            'description' => $this->description,
            'organizer_type' => $this->user_type,
            'activity_type' => $this->activity_type,
            'location' => $this->location,
            'event_url' => $this->user_website,
            'contact_person' => $this->user_publicEmail,
            'user_email' => $this->user_email,
            'creator_id' => $user->id,
            'country_iso' => "DE",
            'picture' => $this->photo,
            "pub_date" => now(),
            "created" => now(),
            "updated" => now(),
            "codeweek_for_all_participation_code" => 'cw20-hamburg',
            "start_date" => $this->eventStartDate,
            "end_date" => $this->eventEndDate,
            "longitude" => $this->longitude,
            "latitude" => $this->latitude,
            "geoposition" => $this->latitude . "," . $this->longitude,
            "language" => "de"
        ]);

        $event->save();

        //Link Other as theme and audience
        if ($this->audience) {
            $event->audiences()->attach(explode(",",$this->audience));
        }
        if ($this->themes) {
            $event->themes()->attach(explode(",",$this->themes));
        }

        if ($this->tags){
            $tagsArray = [];

            foreach (explode(";", $this->tags) as $item) {
                $tag = Tag::firstOrCreate([
                    "name" => trim($item),
                    "slug" => str_slug(trim($item))
                ]);
                array_push($tagsArray, $tag->id);
            }

            $event->tags()->sync($tagsArray);
        }

    }


}
