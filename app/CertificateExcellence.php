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

    private $event;

    private $id;

    private $edition;

    private $number_of_activities;

    public function __construct($edition, $name_for_certificate, $type, $number_of_activities)
    {

        $this->edition = $edition;
        $this->name_of_certificate_holder = $name_for_certificate;
        $this->email_of_certificate_holder = auth()->user()->email ?? '';
        $this->personalized_template_name = $edition.'-'.auth()->id();
        $this->resource_path = resource_path().'/latex';
        $this->pdflatex = config('codeweek.pdflatex_path');
        $this->id = auth()->id().'-'.str_random(10);
        $this->number_of_activities = $number_of_activities;
        $this->type = $type ?? 'excellence';

        $this->templateName = "{$this->type}-{$this->edition}.tex";

        Log::info('User ID '.auth()->id()." generating {$this->type} certificate with name: ".$name_for_certificate);
    }

    public function generate()
    {

        $this->customize_and_save_latex();
        $this->run_pdf_creation();
        $s3path = $this->copy_to_s3();
        $this->clean_temp_files();

        return $s3path;

    }

    private function clean_temp_files()
    {
        Storage::disk('latex')->delete($this->personalized_template_name.'.aux');
        Storage::disk('latex')->delete($this->personalized_template_name.'.tex');
        Storage::disk('latex')->delete($this->personalized_template_name.'.pdf');
        Storage::disk('latex')->delete($this->personalized_template_name.'.log');
    }

    public function is_greek()
    {

        $split = preg_split('/[\p{Greek}]/u', $this->name_of_certificate_holder);
        if (count($split) > 1) {
            //            Log::info("Detected as Greek: " . $this->name_of_certificate_holder);
            return true;
        }

        return false;

    }

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

        return preg_replace_callback("/([\^\%~\\\\#\$%&_\{\}])/",
            function ($matches) use ($map) {
                foreach ($matches as $match) {
                    return $map[$match];
                }
            }, $string);
    }

    protected function update_event($s3path)
    {
        $this->event->update([
            'certificate_url' => $s3path,
            'certificate_generated_at' => Carbon::now(),
        ]);
    }

    /**
     * @throws \League\Flysystem\FileNotFoundException
     */
    protected function copy_to_s3(): string
    {
        $inputStream = Storage::disk('latex')->getDriver()->readStream($this->personalized_template_name.'.pdf');
        $destination = Storage::disk('s3')->path('/certificates/'.$this->id.'.pdf');
        Storage::disk('s3')->put($destination, $inputStream);

        return Storage::disk('s3')->url('certificates/'.$this->id.'.pdf');
    }

    /**
     * @return mixed
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function customize_and_save_latex()
    {
        if ($this->is_greek()) {
            $this->templateName = "{$this->type}_greek-{$this->edition}.tex";
        }
        Log::info($this->templateName);
        //open the latex template
        $base_template = Storage::disk('latex')->get($this->templateName);

        //replace the text in template
        $template = str_replace('<CERTIFICATE_HOLDER_NAME>', $this->tex_escape($this->name_of_certificate_holder), $base_template);

        if ($this->type == 'super-organiser') {
            $template = str_replace('<CERTIFICATE_EMAIL>', $this->tex_escape($this->email_of_certificate_holder), $template);
            $template = str_replace('<CERTIFICATE_DATE>', $this->tex_escape(Carbon::now()->format('d/m/Y')), $template);
            $template = str_replace('<NUMBER_OF_ACTIVITIES>', $this->tex_escape($this->number_of_activities), $template);
        }

        Log::info($template);

        //save it locally
        Storage::disk('latex')->put($this->personalized_template_name.'.tex', $template);
    }

    protected function run_pdf_creation(): void
    {

        //call the pdflatex command
        $command = $this->pdflatex.' -interaction=nonstopmode -output-directory '.$this->resource_path.' '.$this->resource_path.'/'.$this->personalized_template_name.'.tex';

        Log::info($command);

        $cwd = $this->resource_path;

        Log::info($cwd);

        // $process = new Process($command, $cwd);
        $process = Process::fromShellCommandline($command, $cwd);
        $process->run();

        // executes after the command finishes
        if (! $process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    }
}
