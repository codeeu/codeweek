<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserAvatarController extends Controller
{
    /**
     * Store a new user avatar.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'avatar' => ['required', 'image']
        ]);


        Storage::disk('s3')->delete(auth()->user()->getOriginal('avatar_path'));


        auth()->user()->update([
            'avatar_path' => request()->file('avatar')->store('avatars', 's3')
        ]);


        return response([], 204);
    }

    public function delete(){

        Storage::disk('s3')->delete(auth()->user()->getOriginal('avatar_path'));

        auth()->user()->update([
            'avatar_path' => NULL
        ]);

        return response([], 204);

    }
}
