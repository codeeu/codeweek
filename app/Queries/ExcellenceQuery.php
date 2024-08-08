<?php
/**
 * Created by PhpStorm.
 * User: doris
 * Date: 20/04/18
 * Time: 09:30
 */

namespace App\Queries;

use App\Excellence;

class ExcellenceQuery
{
    public static function mine()
    {

        return Excellence::where([
            'user_id' => auth()->id(),
            'type' => 'Excellence',
        ]);

    }

    public static function byYear($edition)
    {

        return self::mine()
            ->where('edition', $edition);

    }
}
