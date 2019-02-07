<?php
/**
 * Created by PhpStorm.
 * User: doris
 * Date: 20/04/18
 * Time: 09:30
 */

namespace App\Queries;


use App\Event;
use App\Excellence;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ExcellenceQuery
{

    public static function mine()
    {

        return Excellence::where('user_id', auth()->id());

    }

    public static function byYear($edition)
    {


        return self::mine()
            ->where('edition', $edition);


    }


}