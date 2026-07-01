<?php

namespace Tests\Unit\BulkUserChanges;

use App\Services\BulkUserChanges\BulkUserChangesRowNormalizer;
use Tests\TestCase;

final class BulkUserChangesRowNormalizerTest extends TestCase
{
    public function test_normalizes_add_leading_teacher_row(): void
    {
        $normalized = (new BulkUserChangesRowNormalizer())->normalize([
            'country' => 'Poland',
            'full_name' => 'Anita Kocunik',
            'email' => 'anitakocunik@wp.pl;',
            'action' => 'add ',
            'role' => 'leading teachers',
            'comments' => null,
        ]);

        $this->assertSame('role_add', $normalized['operation']);
        $this->assertSame('leading teacher', $normalized['role_name']);
        $this->assertSame('anitakocunik@wp.pl', $normalized['email']);
    }

    public function test_normalizes_email_change_row(): void
    {
        $normalized = (new BulkUserChangesRowNormalizer())->normalize([
            'country' => 'Finland',
            'full_name' => 'Anu Kahri',
            'email' => 'anu.kahri@opetus.espoo.fi',
            'action' => 'email change',
            'role' => 'new email: anu.kahri@gmail.com',
            'comments' => null,
        ]);

        $this->assertSame('email_update', $normalized['operation']);
        $this->assertSame('anu.kahri@gmail.com', $normalized['new_email']);
    }

    public function test_skips_blank_rows(): void
    {
        $normalized = (new BulkUserChangesRowNormalizer())->normalize([
            'country' => null,
            'full_name' => null,
            'email' => null,
            'action' => null,
            'role' => null,
            'comments' => null,
        ]);

        $this->assertNull($normalized['operation']);
    }
}
