<?php

namespace App;

use App\Traits\LanguageDetection;
use App\Traits\LatexCleaner;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class CertificateParticipation
{
    use LanguageDetection, LatexCleaner;

    private $templateName = 'participation.tex';

    private $name_of_certificate_holder;

    private $resource_path;

    private $pdflatex;

    private $personalized_template_name;

    private $id;

    private $event_name;

    private $event_date;

    private $certificate_holder_name_lang = 'russian';

    private $event_name_lang = 'russian';

    private $event_date_lang = 'russian';

    public function __construct($name_for_certificate, $event_name, $event_date)
    {
        ini_set('max_execution_time', 600); // Set max execution time to 600 seconds
        ini_set('memory_limit', '512M');    // Set memory limit to 512 MB (adjust as needed)

        $this->name_of_certificate_holder = $name_for_certificate;
        $this->event_name = $event_name;
        $this->event_date = $event_date;

        $random = Str::random(10);

        $this->personalized_template_name = $random . '-' . auth()->id();
        $this->resource_path = resource_path() . '/latex';
        $this->pdflatex = config('codeweek.pdflatex_path');
        $this->id = auth()->id() . '-' . $random;
    }

    public function generate()
    {
        $this->customize_and_save_latex();
        $this->run_pdf_creation();
        $this->clean_temp_files();

        return $this->personalized_template_name;
    }

    private function clean_temp_files()
    {
        $extensions = ['aux', 'tex', 'log'];
        foreach ($extensions as $ext) {
            Storage::disk('latex')->delete($this->personalized_template_name . '.' . $ext);
        }
    }

    protected function update_event($s3path)
    {
        $this->event->update([
            'certificate_url' => $s3path,
            'certificate_generated_at' => Carbon::now(),
        ]);
    }

    protected function copy_to_s3(): string
    {
        $inputStream = Storage::disk('latex')->getDriver()->readStream($this->personalized_template_name . '.pdf');
        $destination = Storage::disk('s3')->path('/certificates/' . $this->id . '.pdf');
        Storage::disk('s3')->put($destination, $inputStream);

        return Storage::disk('s3')->url('certificates/' . $this->id . '.pdf');
    }

    protected function customize_and_save_latex()
    {
        if ($this->is_greek_text($this->event_name) || $this->is_greek_text($this->event_date) || $this->is_greek_text($this->name_of_certificate_holder)) {
            $this->templateName = 'participation_greek.tex';
        }

        if ($this->is_greek_text($this->event_name)) {
            $this->event_name_lang = 'greek';
        }

        if ($this->is_greek_text($this->event_date)) {
            $this->event_date_lang = 'greek';
        }

        if ($this->is_greek_text($this->name_of_certificate_holder)) {
            $this->certificate_holder_name_lang = 'greek';
        }

        $base_template = Storage::disk('latex')->get($this->templateName);

        $template = str_replace('<CERTIFICATE_HOLDER_NAME>', $this->tex_escape($this->name_of_certificate_holder), $base_template);
        $template = str_replace('<EVENT_NAME>', $this->tex_escape($this->event_name), $template);
        $template = str_replace('<EVENT_DATE>', $this->tex_escape($this->event_date), $template);

        $template = str_replace('<CERTIFICATE_HOLDER_NAME_LANG>', $this->tex_escape($this->certificate_holder_name_lang), $template);
        $template = str_replace('<EVENT_NAME_LANG>', $this->tex_escape($this->event_name_lang), $template);
        $template = str_replace('<EVENT_DATE_LANG>', $this->tex_escape($this->event_date_lang), $template);

        Storage::disk('latex')->put($this->personalized_template_name . '.tex', $template);
    }

    protected function run_pdf_creation(): void
    {
        if (!file_exists($this->pdflatex)) {
            throw new \RuntimeException("pdflatex binary not found at path: {$this->pdflatex}");
        }

        $command = escapeshellcmd($this->pdflatex) . ' -interaction=nonstopmode -output-directory '
        . escapeshellarg($this->resource_path) . ' '
            . escapeshellarg($this->resource_path . '/' . $this->personalized_template_name . '.tex');

        $process = Process::fromShellCommandline($command, $this->resource_path);
        $process->setTimeout(600); // Allow up to 600 seconds for execution
        $this->execute_process($process);

        if (!$process->isSuccessful()) {
            // Optionally log the $process->getErrorOutput() or $process->getOutput()
            // Then DO NOT throw the exception:
            // throw new ProcessFailedException($process);
        }
    }

    private function execute_process(Process $process): void
    {
        $process->start();

        while ($process->isRunning()) {
            usleep(400000); // Sleep for 400ms
        }
    }
}
