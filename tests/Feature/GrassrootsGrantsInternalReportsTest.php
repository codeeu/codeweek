<?php

namespace Tests\Feature;

use App\GrassrootsGrantsProjectImage;
use Database\Seeders\GrassrootsGrantsSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class GrassrootsGrantsInternalReportsTest extends TestCase
{
    use DatabaseMigrations;

    #[Test]
    public function internal_profil_klett_reports_are_not_published(): void
    {
        $this->seed(GrassrootsGrantsSeeder::class);

        $published = GrassrootsGrantsProjectImage::query()->pluck('url');

        foreach (GrassrootsGrantsSeeder::EXCLUDED_EVIDENCE_FILES as $filename) {
            $this->assertFileDoesNotExist($this->grantEvidencePath($filename));

            $this->assertFalse(
                $published->contains(fn (string $url): bool => rawurldecode(basename(parse_url($url, PHP_URL_PATH) ?: $url)) === $filename),
                $filename.' is still linked on the grassroots grants page.'
            );
        }
    }

    private function grantEvidencePath(string $filename): string
    {
        $folders = [
            'Pazin City Library_Final narrative report in English.pdf' => 'MY FIRST CODE First steps into the world of coding with LEGO',
            'Article about workshops_My first code.pdf' => 'MY FIRST CODE First steps into the world of coding with LEGO',
            'BETA_Evidence of conducted workshops.pdf' => 'Holiday creative workshops at the Garage for Children 13+',
            'BETA_Final narrative report in English.pdf' => 'Holiday creative workshops at the Garage for Children 13+',
            'BETA_Narrative report with evidence.pdf' => 'Holiday creative workshops at the Garage for Children 13+',
            'HROBOS_Final narrative report with evidence.pdf' => 'Preparatory workshops for WRO 2025 Ljubljana',
        ];

        return public_path('images/grants/Croatia & Slovenia/'.$folders[$filename].'/'.$filename);
    }
}
