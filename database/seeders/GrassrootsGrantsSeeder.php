<?php

namespace Database\Seeders;

use App\GrassrootsGrantsHub;
use App\GrassrootsGrantsPage;
use App\GrassrootsGrantsProject;
use App\GrassrootsGrantsProjectImage;
use App\GrassrootsGrantsProjectLink;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\Finder\Finder;

class GrassrootsGrantsSeeder extends Seeder
{
    /**
     * Internal grant reports that must not be published with project evidence.
     *
     * @var list<string>
     */
    public const EXCLUDED_EVIDENCE_FILES = [
        'Pazin City Library_Final narrative report in English.pdf',
        'Article about workshops_My first code.pdf',
        'BETA_Evidence of conducted workshops.pdf',
        'BETA_Final narrative report in English.pdf',
        'BETA_Narrative report with evidence.pdf',
        'HROBOS_Final narrative report with evidence.pdf',
    ];

    public function run(): void
    {
        if (! Schema::hasTable('grassroots_grants_page')) {
            return;
        }

        $data = require database_path('seeders/data/grassroots_grants_round1.php');

        $page = GrassrootsGrantsPage::query()->first();
        if ($page) {
            GrassrootsGrantsProjectImage::query()->delete();
            GrassrootsGrantsProjectLink::query()->delete();
            GrassrootsGrantsProject::query()->delete();
            GrassrootsGrantsHub::query()->delete();
            $page->delete();
        }

        $page = GrassrootsGrantsPage::create($data['page']);

        foreach ($data['hubs'] as $position => $hubData) {
            $projects = $hubData['projects'] ?? [];
            unset($hubData['projects']);

            $hub = GrassrootsGrantsPage::find($page->id)->hubs()->create(array_merge($hubData, [
                'position' => $position,
                'active' => true,
            ]));

            foreach ($projects as $projectPosition => $projectData) {
                $links = $projectData['links'] ?? [];
                $imageFolder = $projectData['image_folder'] ?? null;
                unset($projectData['links'], $projectData['image_folder']);

                $project = $hub->projects()->create(array_merge($projectData, [
                    'position' => $projectPosition,
                    'active' => true,
                    'image_folder' => $imageFolder,
                ]));

                foreach ($links as $linkPosition => $link) {
                    if (is_string($link)) {
                        $project->links()->create([
                            'url' => $link,
                            'position' => $linkPosition,
                        ]);
                        continue;
                    }

                    $project->links()->create([
                        'label' => $link['label'] ?? null,
                        'url' => $link['url'],
                        'position' => $linkPosition,
                    ]);
                }

                $this->seedProjectImages($project, $hubData['image_folder'] ?? null, $imageFolder);
            }
        }
    }

    private function seedProjectImages(
        GrassrootsGrantsProject $project,
        ?string $hubFolder,
        ?string $projectFolder
    ): void {
        if (! $hubFolder || ! $projectFolder) {
            return;
        }

        $directory = public_path('images/grants/'.$hubFolder.'/'.$projectFolder);
        if (! is_dir($directory)) {
            return;
        }

        $finder = (new Finder())
            ->files()
            ->in($directory)
            ->ignoreDotFiles(true)
            ->sortByName();

        $position = 0;
        foreach ($finder as $file) {
            if (in_array($file->getFilename(), self::EXCLUDED_EVIDENCE_FILES, true)) {
                continue;
            }

            $url = '/images/grants/'.$hubFolder.'/'.$projectFolder.'/'.$file->getFilename();

            $extension = strtolower($file->getExtension());
            $fileType = $extension === 'pdf' ? 'pdf' : 'image';

            $project->images()->create([
                'url' => $url,
                'alt' => $project->title,
                'file_type' => $fileType,
                'position' => $position,
            ]);

            $position++;
        }
    }
}
