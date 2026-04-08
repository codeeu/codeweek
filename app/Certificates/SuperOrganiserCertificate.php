<?php

namespace App\Certificates;

use App\Traits\LanguageDetection;
use App\Traits\LatexCleaner;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;

class SuperOrganiserCertificate
{
    use LanguageDetection, LatexCleaner;

    private string $templateName;
    private string $name_of_certificate_holder;
    private int $number_of_activities;
    private string $certificate_date;
    private string $language;

    private string $resource_path;
    private string $pdflatex;
    private string $personalized_template_name;
    private string $id;

    public function __construct(string $holderName, int $numberOfActivities, ?string $certificateDate = null, string $language = 'en')
    {
        ini_set('max_execution_time', '600');
        ini_set('memory_limit', '512M');

        $this->name_of_certificate_holder = $holderName;
        $this->number_of_activities = $numberOfActivities;
        $this->certificate_date = $certificateDate ?: Carbon::now()->format('d/m/Y');
        $this->language = $language;

        $this->templateName = ($language === 'el')
            ? 'super-organiser-greek-2025.tex'
            : 'super-organiser-2025.tex';

        $random = Str::random(10);
        $this->personalized_template_name = $random.'-'.'0';

        $this->resource_path = resource_path('latex');
        $this->pdflatex = config('codeweek.pdflatex_path', '/Library/TeX/texbin/pdflatex');
        $this->id = '0-'.$random;
    }

    public function generate(): string
    {
        $this->customize_and_save_latex();
        $this->run_pdf_creation();
        $s3path = $this->upload_to_s3();
        $this->clean_temp_files();

        return $s3path;
    }

    private function clean_temp_files(): void
    {
        foreach (['aux', 'log', 'out', 'tex'] as $ext) {
            Storage::disk('latex')->delete($this->personalized_template_name.'.'.$ext);
        }
    }

    protected function customize_and_save_latex(): void
    {
        $base_template = Storage::disk('latex')->get($this->templateName);

        $template = str_replace('<CERTIFICATE_HOLDER_NAME>', $this->tex_escape($this->name_of_certificate_holder), $base_template);
        $template = str_replace('<NUMBER_OF_ACTIVITIES>', $this->tex_escape((string) $this->number_of_activities), $template);
        $template = str_replace('<CERTIFICATE_DATE>', $this->tex_escape($this->certificate_date), $template);

        Storage::disk('latex')->put($this->personalized_template_name.'.tex', $template);
    }

    protected function run_pdf_creation(): void
    {
        if (!file_exists($this->pdflatex)) {
            throw new \RuntimeException("pdflatex binary not found at path: {$this->pdflatex}");
        }

        $texFile = $this->resource_path.'/'.$this->personalized_template_name.'.tex';
        $command = sprintf(
            '%s -interaction=nonstopmode -output-directory %s %s',
            escapeshellcmd($this->pdflatex),
            escapeshellarg($this->resource_path),
            escapeshellarg($texFile)
        );

        $process = Process::fromShellCommandline($command, $this->resource_path);
        $process->setTimeout(600);
        $process->run();
    }

    protected function upload_to_s3(): string
    {
        $pdfFile = $this->personalized_template_name.'.pdf';
        $localPath = storage_path('app/latex/'.$pdfFile);
        $s3Path = 'certificates/super-organiser/'.$pdfFile;

        Storage::disk('s3')->put($s3Path, file_get_contents($localPath), 'public');

        return Storage::disk('s3')->url($s3Path);
    }

    private function tex_escape(string $string): string
    {
        $map = [
            '#' => '\\#',
            '$' => '\\$',
            '%' => '\\%',
            '&' => '\\&',
            '~' => '\\~{}',
            '_' => '\\_',
            '^' => '\\^{}',
            '\\' => '\\textbackslash{}',
            '{' => '\\{',
            '}' => '\\}',
        ];

        return preg_replace_callback(
            "/([\\^\\%~\\\\#\\$%&_\\{\\}])/",
            fn ($matches) => $map[$matches[0]] ?? $matches[0],
            $string
        ) ?? $string;
    }
}

