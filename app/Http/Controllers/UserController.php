<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function update()
    {

        $user = auth()->user();


        $user->update(request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'privacy' => 'required',
            'country_iso' => 'nullable',
            'twitter' => 'nullable',
            'website' => 'nullable',
            'bio' => 'nullable'
        ]));

        return back()->with('flash', 'Your profile has been modified!');;
    }

    public static function getMainAccount($email)
    {
        $users_with_same_email = User::where('email', $email)->get();

        $max_weight = -1;

        foreach ($users_with_same_email as $user) {

            $weight = 0;
            if ($user->hasRole('ambassador')) {
                $weight++;
                if ($user->bio != "") {
                    $weight++;
                }
                if ($user->twitter != "") {
                    $weight++;
                }

                if ($user->website != "") {
                    $weight++;
                }

                if ($user->country_iso != "") {
                    $weight++;
                }
            }

            if ($user->hasRole('super admin')) {
                $weight++;
                if ($user->bio != "") {
                    $weight++;
                }
                if ($user->twitter != "") {
                    $weight++;
                }

                if ($user->website != "") {
                    $weight++;
                }

                if ($user->country_iso != "") {
                    $weight++;
                }
            }


            if ($weight > $max_weight) {
                $main_user = $user;
                $max_weight = $weight;
            }
        }


        return $main_user;


    }

    public static function mergeEvents()
    {

        Log::info('merge events');
        //Get all user with more than one record per email
        $emails = DB::table('users')
            ->select(DB::raw('count(email) as email_count, email'))
            ->where('email', '<>', '')
            ->groupBy('email')
            ->having('email_count', ">", 1)
            ->get();

        foreach ($emails as $email) {
            $main_user = self::getMainAccount($email->email);
            Log::info("Main email: {$email->email}");
            Log::info("Main user: {$main_user->id}");

            $events = DB::table('users')
                ->join('events', 'users.id', '=', 'events.creator_id')
                ->where('users.email', '=', $email->email)->get();


            foreach ($events as $event) {
                DB::table('events')
                    ->where('id', $event->id)
                    ->update(['creator_id' => $main_user->id]);

            }

            //Delete other users
            User::where([['email', $email->email], ['id', '<>', $main_user->id]])->delete();


        }


        // Update each event with my user_id
    }
}
