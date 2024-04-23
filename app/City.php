<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Get the comments for the blog post.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function getNameAttribute()
    {
        return $this->city;
    }

    public static function getClosestCity($longitude, $latitude)
    {
        //acos is not known with sqlite that is used for testing.
        if (config('codeweek.db_connection') == 'sqlite') {
            return City::first();
        }

        $city = City::selectRaw('id, city, country, country_iso,
        ( 6371 *
         acos( cos( radians(?) ) *
         cos( radians( latitude ) ) *
         cos( radians( longitude ) -
         radians(?) ) +
         sin( radians(?) ) *
         sin( radians( latitude ) ) ) )
         AS distance', [$latitude, $longitude, $latitude])
            ->orderBy('distance')
            ->take(1)
            ->first();

        return $city;

    }
}
