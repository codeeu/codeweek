<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class UserAvatar extends Component
{
    use WithFileUploads;

    public $user;
    public $avatar;
    public $newAvatar;

    public function mount($user)
    {
        $this->user = $user;
        $this->avatar = $this->user->avatar_path;
    }

    public function updatedNewAvatar()
    {
        $this->validate([
            'newAvatar' => 'image|max:4096', // 1MB Max
        ]);

        $this->persist();
    }

    public function persist()
    {
        if ($this->newAvatar) {
            $path = $this->newAvatar->storePublicly('avatars/'.$this->user->id, 's3');

            // Update user avatar path in database or wherever it is stored
            $this->user->update(['avatar_path' => $path]);

            $this->avatar = $path;
            $this->newAvatar = null;

            session()->flash('message', 'Avatar uploaded!');
        }
    }

    public function remove()
    {


        if($this->user->original_avatar_path !== 'avatars/default.png'){
            Storage::disk('s3')->delete($this->user->original_avatar_path);
        }


        $this->user->update(['avatar_path' => 'avatars/default.png']);
        $this->avatar = 'avatars/default.png';

        session()->flash('message', 'Avatar deleted!');
    }

    public function render()
    {
        return view('livewire.user-avatar');
    }
}
