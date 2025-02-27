<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Log;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class CertificateExcellence
{
    private $templateName;

    private $name_of_certificate_holder;
    private $email_of_certificate_holder;
    private $resource_path;
    private $pdflatex;
    private $personalized_template_name;
    private $id;
    private $edition;
    private $number_of_activities;
    private $type;

    public function __construct($edition, $name_for_certificate, $type = 'excellence', $number_of_activities = 0)
    {
        $this->edition = $edition;
        $this->name_of_certificate_holder = $name_for_certificate;
        $this->email_of_certificate_holder = auth()->user()->email ?? '';
        $this->personalized_template_name = $edition . '-' . auth()->id();
        $this->resource_path = resource_path() . '/latex';
        $this->pdflatex = config('codeweek.pdflatex_path');
        $this->id = auth()->id() . '-' . str_random(10);
        $this->number_of_activities = $number_of_activities;
        $this->type = $type ?: 'excellence';

        // e.g. "excellence-2025.tex" or "super-organiser-2025.tex"
        $this->templateName = "{$this->type}-{$this->edition}.tex";

        Log::info('User ID ' . auth()->id() . " generating {$this->type} certificate with name: " . $name_for_certificate);
    }

    /**
     * Generates the certificate PDF, saves to S3, cleans up temp files.
     * Returns the S3 path of the generated PDF.
     */
    public function generate()
    {
        $this->customize_and_save_latex();
        $this->run_pdf_creation();
        $s3path = $this->copy_to_s3();
        $this->clean_temp_files();

        return $s3path;
    }

    /**
     * Clean up LaTeX artifacts for the generated file.
     */
    private function clean_temp_files()
    {
        Storage::disk('latex')->delete($this->personalized_template_name . '.aux');
        Storage::disk('latex')->delete($this->personalized_template_name . '.tex');
        Storage::disk('latex')->delete($this->personalized_template_name . '.pdf');
        Storage::disk('latex')->delete($this->personalized_template_name . '.log');
    }

    /**
     * Check for Greek characters in the name.
     */
    public function is_greek()
    {
        $split = preg_split('/[\p{Greek}]/u', $this->name_of_certificate_holder);
        return (count($split) > 1);
    }

    /**
     * Escape LaTeX special characters in user data.
     */
    private function tex_escape($string)
    {
        $map = [
            '#' => '\\#',
            '$' => '\$',
            '%' => '\\%',
            '&' => '\\&',
            '~' => '\\~{}',
            '_' => '\\_',
            '^' => '\\^{}',
            '\\' => '\\textbackslash',
            '{' => '\\{',
            '}' => '\\}',
        ];

        return preg_replace_callback(
            "/([\^\%~\\\\#\$%&_\{\}])/",
            function ($matches) use ($map) {
                foreach ($matches as $match) {
                    return $map[$match];
                }
            },
            $string
        );
    }

    /**
     * Read the base template from disk, replace placeholders, and save the .tex file.
     */
    protected function customize_and_save_latex()
    {
        // If the name is Greek, switch to Greek template if it exists:
        if ($this->is_greek()) {
            $this->templateName = "{$this->type}_greek-{$this->edition}.tex";
        }

        Log::info("Using template: {$this->templateName}");
        $base_template = Storage::disk('latex')->get($this->templateName);

        // Always replace <CERTIFICATE_HOLDER_NAME> for both excellence & super-organiser
        $template = str_replace(
            '<CERTIFICATE_HOLDER_NAME>',
            $this->tex_escape($this->name_of_certificate_holder),
            $base_template
        );

        // If super-organiser, we also replace these:
        if ($this->type === 'super-organiser') {
            // Possibly also <EDITION> if you want it dynamic
            $template = str_replace('<NUMBER_OF_ACTIVITIES>', $this->tex_escape($this->number_of_activities), $template);
            $template = str_replace('<CERTIFICATE_DATE>', $this->tex_escape(Carbon::now()->format('d/m/Y')), $template);
            // If you added <CERTIFICATE_EMAIL> or <EDITION> placeholders, handle them as well:
            $template = str_replace('<CERTIFICATE_EMAIL>', $this->tex_escape($this->email_of_certificate_holder), $template);
            $template = str_replace('<EDITION>', $this->edition, $template);
        }

        // For excellence type, you can do other placeholder replacements here if needed.

        // Save updated .tex
        Log::info($template);
        Storage::disk('latex')->put($this->personalized_template_name . '.tex', $template);
    }

    /**
     * Compile the .tex file with pdflatex.
     */
    protected function run_pdf_creation(): void
    {
        $command = $this->pdflatex . ' -interaction=nonstopmode -output-directory ' .
        $this->resource_path . ' ' .
            $this->resource_path . '/' . $this->personalized_template_name . '.tex';

        Log::info("pdflatex command: $command");
        $cwd = $this->resource_path;

        $process = Process::fromShellCommandline($command, $cwd);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    }

    /**
     * Copy the resulting PDF to S3, return its S3 URL.
     */
    protected function copy_to_s3(): string
    {
        $pdfFile = $this->personalized_template_name . '.pdf';
        $inputStream = Storage::disk('latex')->getDriver()->readStream($pdfFile);
        $destination = Storage::disk('s3')->path('/certificates/' . $this->id . '.pdf');

        Storage::disk('s3')->put($destination, $inputStream);

        return Storage::disk('s3')->url('certificates/' . $this->id . '.pdf');
    }
}
