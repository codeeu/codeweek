<?php

namespace Tests\Feature;

use App\Certificate;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class CertificateGenerationTest extends TestCase
{
    use DatabaseMigrations;

    protected $event;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed('RolesAndPermissionsSeeder');
        $this->event = \App\Event::factory()->create(['status' => 'APPROVED', 'start_date' => Carbon::now()->subMonth(1)]);

    }

    #[Test]
    public function it_should_escape_special_characters(): void
    {

        $certificate = new Certificate($this->event);
        $expected = "foo''bar \# \\$ \% \& \~{} \_ \^{} \\textbackslash \{ \}";
        $this->assertEquals($expected, $certificate->tex_escape('foo"bar # $ % & ~ _ ^ \\ { }'));

    }
}
