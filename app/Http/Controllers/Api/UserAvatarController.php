<?php

namespace App\Http\Controllers\Api;

//define("DEFAULT_AVATAR_PATH","avatars/default.png");

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserAvatarController extends Controller
{
    /**
     * Store a new user avatar.
     */
    public function store(): Response
    {
        request()->validate([
            'avatar' => ['required', 'image'],
        ]);

        //Storage::disk('s3')->delete(auth()->user()->getOriginal('avatar_path'));

        $file = request()->file('avatar');

        $imageName = 'avatars/'.auth()->user()->getAuthIdentifier().'/'.$file->getClientOriginalName();

        $img = Image::make($file);

        $img->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
        });

        $imgResized = Image::make($file);

        $imgResized->resize(null, 80, function ($constraint) {
            $constraint->aspectRatio();
        });

        //detach method is the key! Hours to find it... :/
        $resource = $img->stream()->detach();
        $resourceResized = $imgResized->stream()->detach();

        $resizedImageName = 'avatars/'.auth()->user()->getAuthIdentifier().'/resized/80/'.$file->getClientOriginalName();

        Storage::disk('s3')->put(
            $resizedImageName,
            $resourceResized
        );

        Storage::disk('s3')->put(
            $imageName,
            $resource
        );

        auth()->user()->update([
            'avatar_path' => $imageName,
        ]);

        return response(['path' => Storage::disk('s3')->url($imageName)], 200);
    }

    public function delete(): Response
    {

        //Storage::disk('s3')->delete(auth()->user()->getOriginal('avatar_path'));

        auth()->user()->update([
            'avatar_path' => 'avatars/default.png',
        ]);

        return response([], 204);

    }
}
