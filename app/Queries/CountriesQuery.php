<?php
/**
 * Created by PhpStorm.
 * User: doris
 * Date: 20/04/18
 * Time: 09:36
 */

namespace App\Queries;


use App\Country;

class CountriesQuery
{
    public static function all() {
        return Country::all();
    }
}