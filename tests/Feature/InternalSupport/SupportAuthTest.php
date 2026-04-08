<?php

namespace Tests\Feature\InternalSupport;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SupportAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_internal_support_endpoints_require_token(): void
    {
        putenv('SUPPORT_SERVICE_TOKEN=test-token');

        $this->postJson('/api/internal/support/cases/intake', [
            'subject' => 'Hello',
            'raw_message' => 'Body',
        ])->assertStatus(401);
    }
}

