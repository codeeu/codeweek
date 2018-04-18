<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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


        $file = request()->file('avatar');

        $imageName = $file->getClientOriginalName();

        $img = Image::make($file);

        $img->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
        });

        //detach method is the key! Hours to find it... :/
        $resource = $img->stream()->detach();

        Storage::disk('s3')->put(
            'my-s3-folder/' . $imageName,
            $resource
        );

        auth()->user()->update([
            'avatar_path' => 'my-s3-folder/' . $imageName
        ]);


        return response(["path"=>Storage::disk('s3')->url('my-s3-folder/' . $imageName)], 200);
    }

    public function delete()
    {

        Storage::disk('s3')->delete(auth()->user()->getOriginal('avatar_path'));

        auth()->user()->update([
            'avatar_path' => NULL
        ]);

        return response([], 204);

    }
}
