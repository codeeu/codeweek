<?php

namespace Tests\Unit\BulkUserChanges;

use App\Services\BulkUserChanges\BulkUserChangesTextParser;
use Tests\TestCase;

final class BulkUserChangesTextParserTest extends TestCase
{
    private const SAMPLE_PASTE = <<<'TEXT'
Poland
Anita Kocunik
anitakocunik@wp.pl
add
leading teachers
Finland
Anu Kahri
anu.kahri@opetus.espoo.fi
email change
new email: anu.kahri@gmail.com
Ireland
Rory Leonard
rory_leonard@yahoo.ie
add
ambassadors
Ireland
Veronica Ward
vward@eircom.net
delete
ambassadors
Sweden
Joanna Lasek
joanna.lasek@malmo.se
add
leading teachers
TEXT;

    public function test_parses_pasted_change_blocks(): void
    {
        $parsed = app(BulkUserChangesTextParser::class)->parse(self::SAMPLE_PASTE);

        $this->assertSame('paste', $parsed['source']);
        $this->assertSame(5, $parsed['meta']['parsed_rows']);
        $this->assertSame('anitakocunik@wp.pl', $parsed['meta']['first_email']);
        $this->assertSame('joanna.lasek@malmo.se', $parsed['meta']['last_email']);

        $anita = $parsed['rows'][0];
        $this->assertSame('role_add', $anita['operation']);
        $this->assertSame('leading teacher', $anita['role_name']);

        $anu = $parsed['rows'][1];
        $this->assertSame('email_update', $anu['operation']);
        $this->assertSame('anu.kahri@gmail.com', $anu['new_email']);

        $rory = $parsed['rows'][2];
        $this->assertSame('role_add', $rory['operation']);
        $this->assertSame('ambassador', $rory['role_name']);

        $veronica = $parsed['rows'][3];
        $this->assertSame('role_remove', $veronica['operation']);
        $this->assertSame('ambassador', $veronica['role_name']);
    }

    public function test_rejects_incomplete_paste(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('groups of 5 lines');

        app(BulkUserChangesTextParser::class)->parse("Poland\nAnita\nanita@example.com\nadd\n");
    }
}
