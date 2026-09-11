<?php

namespace Tests\Unit;

use App\User;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class UserCommunityAvatarUrlTest extends TestCase
{
    #[Test]
    public function null_avatar_uses_local_placeholder(): void
    {
        $user = new User;
        $user->setRawAttributes(['avatar_path' => null]);

        $this->assertSame(
            asset('images/default.png'),
            $user->communityAvatarUrl()
        );
    }

    #[Test]
    public function default_s3_avatar_uses_local_placeholder(): void
    {
        $user = new User;
        $user->setRawAttributes(['avatar_path' => 'avatars/default_avatar.png']);

        $this->assertSame(
            asset('images/default.png'),
            $user->communityAvatarUrl()
        );
    }

    #[Test]
    public function real_avatar_keeps_storage_url(): void
    {
        $user = new User;
        $user->setRawAttributes(['avatar_path' => 'avatars/200/photo.jpg']);

        $this->assertStringContainsString(
            'avatars/200/photo.jpg',
            $user->communityAvatarUrl()
        );
    }
}
