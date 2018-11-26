<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;
use App\Filters\UserFilters;

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
        'firstname', 'lastname', 'avatar_path', 'email', 'password', 'bio', 'twitter', 'website', 'country_iso', 'privacy'
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
        Log::info($value);
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
        array_push($arr, "resized");
        array_push($arr, "80");
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


}
