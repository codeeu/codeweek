<?php

namespace App\Http\Controllers\Api;

define("DEFAULT_AVATAR_PATH","avatars/default.png");

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class EventPictureController extends Controller
{


    /**
     * Store a new user avatar.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'picture' => ['required', 'image']
        ]);





        $file = request()->file('picture');

        $imageName = 'events/pictures/' . rand(100000000,999999999) .'/' . $file->getClientOriginalName();

        $img = Image::make($file);

        $img->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
        });

        //detach method is the key! Hours to find it... :/
        $resource = $img->stream()->detach();

        Storage::disk('s3')->put(
            $imageName,
            $resource
        );

/*        auth()->user()->update([
            'picture' =>  $imageName
        ]);*/


        return response(["path"=>Storage::disk('s3')->url($imageName),"imageName"=>$imageName], 200);
    }

    public function delete()
    {

        //Storage::disk('s3')->delete(auth()->user()->getOriginal('avatar_path'));

        auth()->user()->update([
            'avatar_path' => DEFAULT_AVATAR_PATH
        ]);

        return response([], 204);

    }
}
