<?php

namespace App;

use App\Helpers\MeetAndCodeHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * App\MeetAndCodeRSSItem
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $link
 * @property string $pubDate
 * @property string $organisation_mail
 * @property string $school_name
 * @property string $organisation_type
 * @property string $activity_type
 * @property string $country
 * @property string $address
 * @property string $organiser_website
 * @property string $organiser_email
 * @property string $image_link
 * @property string $start_date
 * @property string $end_date
 * @property float $lat
 * @property float $lon
 * @property string|null $imported_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem whereActivityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem whereImageLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem whereImportedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem whereLon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem whereOrganisationMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem whereOrganisationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem whereOrganiserEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem whereOrganiserWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem wherePubDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem whereSchoolName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MeetAndCodeRSSItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MeetAndCodeRSSItem extends Model
{

    public function getCounryIso()
    {

        switch ($this->country) {
            case 'North Macedonia':
                return 'MK';
            case 'Italia':
                return 'IT';
            case 'Bosnia&Herzegovina':
                return 'BA';
            default:
                return Country::where('name', 'like', $this->country)->first()->iso;
        }

    }

    private function mapOrganisationTypes($organisation_type)
    {
        switch ($organisation_type) {
            case "Non-Profit Organisation":
                return "non profit";
            default:
                return "other";
        }


    }

    private function mapActivityTypes($activity_type)
    {
        switch ($activity_type) {
            case "offline and open":
                return "open-in-person";
            case "online and open":
                return "open-online";
            default:
                return "other";
        }


    }

    public function createEvent($technicalUser)
    {

        $event = new Event([
            'status' => "APPROVED",
            'title' => htmlspecialchars_decode($this->title),
            'slug' => Str::slug($this->title),
            'organizer' => $this->school_name,
            'description' => $this->description,
            'organizer_type' => $this->mapOrganisationTypes($this->organisation_type),
            'activity_type' => $this->mapActivityTypes($this->activity_type),
            'location' => $this->address,
            'event_url' => $this->link,
            'user_email' => $this->organiser_email,
            'creator_id' => $technicalUser->id,
            'country_iso' => $this->getCounryIso(),
            'picture' => $this->image_link,
            "pub_date" => now(),
            "created" => now(),
            "updated" => now(),
            "codeweek_for_all_participation_code" => 'cw-meetcode',
            "start_date" => $this->start_date,
            "end_date" => $this->end_date,
            "longitude" => $this->lon,
            "latitude" => $this->lat,
            "geoposition" => $this->lat . "," . $this->lon,
            "language" => MeetAndCodeHelper::getLanguage($this->link)
        ]);

        $event->save();

        //Link Other as theme and audience
        $event->audiences()->attach(8);
        $event->themes()->attach(8);

        return $event;



    }


}
