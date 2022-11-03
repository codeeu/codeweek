<?php

namespace App;


use App\Traits\LatexCleaner;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use App\Traits\LanguageDetection;

class CertificateParticipation
{

    use LanguageDetection, LatexCleaner;
    private $templateName = "participation.tex";

    private $name_of_certificate_holder;
    private $resource_path;
    private $pdflatex;
    private $personalized_template_name;
    //private $event;
    private $id;
    private $event_name;
    private $event_date;
    private $certificate_holder_name_lang = "russian";
    private $event_name_lang = "russian";
    private $event_date_lang = "russian";

    public function __construct($name_for_certificate, $event_name, $event_date)
    {
        $this->name_of_certificate_holder = $name_for_certificate;
        $this->event_name = $event_name;
        $this->event_date = $event_date;

        //if ($this->is_greek_text($this->name_of_certificate_holder)){
            $random = Str::random(10);
        //} else {
          //  $random = Str::kebab($this->name_of_certificate_holder) . "-" . Str::random(10);
        //}

        $this->personalized_template_name = $random . "-" . auth()->id();
        $this->resource_path = resource_path() . "/latex";
        $this->pdflatex = config('codeweek.pdflatex_path');
        $this->id = auth()->id() . '-' . $random;
        Log::info("User ID " . auth()->id() . " generating participation certificate with name: " . $name_for_certificate);
    }

    public function generate()
    {

        $this->customize_and_save_latex();
        $this->run_pdf_creation();
        $this->clean_temp_files();
        return $this->personalized_template_name;
        //$s3path = $this->copy_to_s3();


        //return $s3path;

    }

    private function clean_temp_files()
    {
        Storage::disk('latex')->delete($this->personalized_template_name . ".aux");
        Storage::disk('latex')->delete($this->personalized_template_name . ".tex");
        Storage::disk('latex')->delete($this->personalized_template_name . ".log");
    }




    protected function update_event($s3path)
    {
        $this->event->update([
            "certificate_url" => $s3path,
            "certificate_generated_at" => Carbon::now()
        ]);
    }

    /**
     * @return string
     * @throws \League\Flysystem\FileNotFoundException
     */
    protected function copy_to_s3(): string
    {
        $inputStream = Storage::disk('latex')->getDriver()->readStream($this->personalized_template_name . '.pdf');
        $destination = Storage::disk('s3')->path('/certificates/' . $this->id . '.pdf');
        Storage::disk('s3')->put($destination, $inputStream);

        return Storage::disk('s3')->url('certificates/' . $this->id . '.pdf');
    }

    /**
     * @return mixed
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function customize_and_save_latex()
    {

        if ($this->is_greek_text($this->event_name) || $this->is_greek_text($this->event_date) || $this->is_greek_text($this->name_of_certificate_holder)) $this->templateName = "participation_greek.tex";

        if ($this->is_greek_text($this->event_name)) {
            $this->event_name_lang = "greek";
        }

        if ($this->is_greek_text($this->event_date)) {
            $this->event_date_lang = "greek";
        }

        if ($this->is_greek_text($this->name_of_certificate_holder)) {
            $this->certificate_holder_name_lang = "greek";
        }
            //        Log::info($this->templateName);
        //open the latex template
        $base_template = Storage::disk('latex')->get($this->templateName);


        //replace the text in template
        $template = str_replace('<CERTIFICATE_HOLDER_NAME>', $this->tex_escape($this->name_of_certificate_holder), $base_template);
        $template = str_replace('<EVENT_NAME>', $this->tex_escape($this->event_name), $template);
        $template = str_replace('<EVENT_DATE>', $this->tex_escape($this->event_date), $template);

        $template = str_replace('<CERTIFICATE_HOLDER_NAME_LANG>', $this->tex_escape($this->certificate_holder_name_lang), $template);
        $template = str_replace('<EVENT_NAME_LANG>', $this->tex_escape($this->event_name_lang), $template);
        $template = str_replace('<EVENT_DATE_LANG>', $this->tex_escape($this->event_date_lang), $template);

//        dd($template);

        //save it locally
        Storage::disk('latex')->put($this->personalized_template_name . ".tex", $template);
    }

    protected function run_pdf_creation(): void
    {


//call the pdflatex command
        $command = $this->pdflatex . " -interaction=nonstopmode -output-directory " . $this->resource_path . " " . $this->resource_path . "/" . $this->personalized_template_name . ".tex";

        $cwd = $this->resource_path;
        $process = Process::fromShellCommandline($command, $cwd);
        //$process = new Process($command, $cwd);
        $process->run();


        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    }


}