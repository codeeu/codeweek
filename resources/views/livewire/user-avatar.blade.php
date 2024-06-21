<div x-data="{
    hasAvatar: @entangle('avatar').defer !== 'default.png',
    canUpdate: @json(Auth::id() === $user->id)
}" class="codeweek-user-avatar">
    <div class="name">
        <h1>{{ $user->fullName }}</h1>
    </div>
    <div class="avatar">
        @if(str_contains($user->avatar_path,'default.png'))
            <div style="display: flex; align-items: center; margin-left: 10px;">
                <button class="codeweek-action-link-button" x-show="canUpdate"
                        @click="document.getElementById('imageUploadInput').click()">Upload Picture
                </button>
                <input type="file" id="imageUploadInput" style="display: none;" wire:model="newAvatar">
            </div>

        @else
            <img src="{{$user->avatar_path}}" class="codeweek-avatar-image"
                 @click="document.getElementById('imageUploadInput').click()">
            <div style="display: flex;align-items: flex-end;margin-left: -35px;">
                <button class="codeweek-image-button" x-show="hasAvatar" @click="$wire.remove()">
                    <img src="/images/trash.svg">
                </button>
            </div>
        @endif
    </div>

</div>

