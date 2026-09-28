<?php

namespace Tests\Feature;

use App\GrassrootsGrantsPage;
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

        foreach (GrassrootsGrantsProjectImage::EXCLUDED_PUBLIC_FILENAMES as $filename) {
            $this->assertFileDoesNotExist($this->grantEvidencePath($filename));

            $this->assertFalse(
                $published->contains(fn (string $url): bool => GrassrootsGrantsProjectImage::urlIsExcludedFromPublic($url) && rawurldecode(basename(parse_url($url, PHP_URL_PATH) ?: $url)) === $filename),
                $filename.' is still linked on the grassroots grants page.'
            );
        }
    }

    #[Test]
    public function stale_internal_report_links_are_hidden_from_the_page(): void
    {
        $page = GrassrootsGrantsPage::create([
            'is_preview_mode' => false,
            'hero_title' => 'Grassroots Grants',
            'round_title' => 'Round 1',
        ]);

        $hub = $page->hubs()->create([
            'title' => 'Croatia & Slovenia – Profil Klett',
            'hub_status' => 'active',
            'position' => 0,
            'active' => true,
        ]);

        $project = $hub->projects()->create([
            'title' => 'MY FIRST CODE: First steps into the world of coding with LEGO',
            'position' => 0,
            'active' => true,
        ]);

        $staleUrl = '/images/grants/Croatia & Slovenia/MY FIRST CODE First steps into the world of coding with LEGO/Article about workshops_My first code.pdf';

        $project->images()->create([
            'url' => $staleUrl,
            'alt' => 'Internal report',
            'file_type' => 'pdf',
            'position' => 0,
        ]);

        $project->images()->create([
            'url' => '/images/grants/Croatia & Slovenia/MY FIRST CODE First steps into the world of coding with LEGO/City Library Pazin_Evidence of workshop.png',
            'alt' => 'Workshop evidence',
            'file_type' => 'image',
            'position' => 1,
        ]);

        $html = $this->get(route('grassroots-grants'))->assertOk()->getContent();

        $this->assertStringNotContainsString('Article about workshops_My first code.pdf', $html);
        $this->assertStringNotContainsString('Article%20about%20workshops_My%20first%20code.pdf', $html);
        $this->assertStringContainsString('City%20Library%20Pazin_Evidence%20of%20workshop.png', $html);

        $this->assertSame(1, GrassrootsGrantsProjectImage::purgeExcludedFromPublic());
        $this->assertSame(0, GrassrootsGrantsProjectImage::query()->where('url', $staleUrl)->count());
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
