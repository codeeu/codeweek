<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Filters\UserFilters;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'avatar_path','email', 'password','bio','twitter','website','country_iso'
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

    public function events(){
        return $this->hasMany('App\Event','creator_id');
    }

    public function schools()
    {
        return $this->belongsToMany('App\School');
    }

    public function country()
    {
        return $this->belongsTo('App\Country','country_iso','iso');
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
        return asset($avatar ?: 'img/avatars/default.png');
    }

    /**
     * Get a string path for the thread.
     *
     * @return string
     */
    public function fullName()
    {
        return  $this->firstname . " " . $this->lastname;
    }

    /**
     * Fetch the path to the thread as a property.
     */
    public function getFullNameAttribute()
    {

        return $this->fullName();
    }


}
