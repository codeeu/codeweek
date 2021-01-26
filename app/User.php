<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;
use App\Filters\UserFilters;

/**
 * App\User
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $username
 * @property string $password
 * @property string|null $email
 * @property string|null $country_iso
 * @property string|null $twitter
 * @property string|null $website
 * @property string|null $bio
 * @property string $avatar_path
 * @property string|null $provider
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $privacy
 * @property string|null $email_display
 * @property int $receive_emails
 * @property-read \App\Country|null $country
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Event[] $events
 * @property-read int|null $events_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Excellence[] $excellences
 * @property-read int|null $excellences_count
 * @property mixed $ambassador
 * @property-read string $avatar
 * @property-read mixed $full_name
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Participation[] $participations
 * @property-read int|null $participations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\School[] $schools
 * @property-read int|null $schools_count
 * @method static \Illuminate\Database\Eloquent\Builder|User filter(\App\Filters\UserFilters $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatarPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryIso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailDisplay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePrivacy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereReceiveEmails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereWebsite($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'username', 'avatar_path', 'email', 'password', 'bio', 'twitter', 'website', 'country_iso', 'privacy','email_display','receive_emails'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['fullName'];

    protected $dates = ['deleted_at'];

    public function getName()
    {
        if(!empty($this->username)) return $this->username;
        if(!empty($this->firstname) && !empty($this->lastname)) return $this->firstname . " " . $this->lastname;
        if(!empty($this->firstname) && empty($this->lastname)) return $this->firstname;
        return $this->email;
    }

    public function getAmbassadorAttribute(){
        return $this->isAmbassador();
    }

    public function setAmbassadorAttribute($value){
//        Log::info($value);
        if ($value){
            $this->assignRole('ambassador');
        } else {
            $this->removeRole('ambassador');
        }


    }

    public function isAdmin()
    {

        return $this->hasRole("super admin");
    }

    public function isAmbassador()
    {

        return $this->hasRole("ambassador");
    }

    public function events()
    {
        return $this->hasMany('App\Event', 'creator_id');
    }

    public function schools()
    {
        return $this->belongsToMany('App\School');
    }

    public function country()
    {
        return $this->belongsTo('App\Country', 'country_iso', 'iso');
    }

    public function excellences()
    {
        return $this->hasMany('App\Excellence')->where('type',"Excellence");
    }

    public function superOrganisers()
    {
        return $this->hasMany('App\Excellence')->where('type',"SuperOrganiser");
    }

    public function participations()
    {
        return $this->hasMany('App\Participation');
    }

    public function scopeFilter($query, UserFilters $filters)
    {
        return $filters->apply($query);
    }


    /**
     * Get the path to the user's avatar.
     *
     * @param  string $avatar
     * @return string
     */
    public function getAvatarPathAttribute($avatar)
    {
        return Storage::disk('s3')->url($avatar);

    }

    /**
     * Get the path to the user's avatar.
     *
     * @param  string $avatar
     * @return string
     */
    public function getAvatarAttribute()
    {

        $arr = explode("/", $this->avatar_path);
        $filename = array_pop($arr);
        array_push($arr, $filename);
        $glued = implode("/", $arr);
        return $glued;


    }


    /**
     * Get a string path for the thread.
     *
     * @return string
     */
    public function fullName()
    {
        return $this->firstname . " " . $this->lastname;
    }

    /**
     * Fetch the path to the thread as a property.
     */
    public function getFullNameAttribute()
    {
        return $this->fullName();
    }

    public static function getGeoIPData()
    {
        return geoip(geoip()->getClientIP());
    }

    public function activities($edition){

        return  DB::table('events')
            ->where('creator_id','=',$this->id)
            ->where('status', "=", "APPROVED")
            ->whereNull('deleted_at')
            ->whereYear('end_date', '=', $edition)
            ->count();
    }


}
