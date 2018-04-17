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
        'name', 'email', 'password','bio','twitter','website','country_iso'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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


}
