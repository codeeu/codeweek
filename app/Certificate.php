<?php

namespace App;


use App\Traits\LatexCleaner;
use Carbon\Carbon;
use Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use App\Traits\LanguageDetection;

class Certificate
{

    use LanguageDetection, LatexCleaner;

    private $templateName = "template.tex";

    private $name_of_certificate_holder;
    private $resource_path;
    private $pdflatex;
    private $personalized_template_name;
    private $event;
    private $id;

    public function __construct(Event $event)
    {
        $this->name_of_certificate_holder = $event->name_for_certificate;
        $this->personalized_template_name = $event->id . ".tex";
        $this->resource_path = resource_path() . "/latex";
        $this->pdflatex = config('codeweek.pdflatex_path');
        $this->event = $event;
        $this->id = $event->id . '-' . str_random(10);
    }



    public function generate()
    {

        $this->customize_and_save_latex();
        $this->run_pdf_creation();
        $s3path = $this->copy_to_s3();
        if ($this->event->id !== 0){
            $this->update_event($s3path);
        }

        $this->clean_temp_files();


        return $s3path;

    }

    public function is_greek(){
        return $this->is_greek_text($this->name_of_certificate_holder);
    }

    private function clean_temp_files()
    {
        $deletedAux = Storage::disk('latex')->delete($this->event->id . ".aux");
        $deletedTex = Storage::disk('latex')->delete($this->event->id . ".tex");
        $deletedPdf = Storage::disk('latex')->delete($this->event->id . ".pdf");
        $deletedLog = Storage::disk('latex')->delete($this->event->id . ".log");
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
        $inputStream = Storage::disk('latex')->getDriver()->readStream($this->event->id . '.pdf');
        $destination = Storage::disk('s3')->path('/certificates/' . $this->id . '.pdf') ;
        Storage::disk('s3')->put($destination, $inputStream);

        return Storage::disk('s3')->url('certificates/' . $this->id . '.pdf');
    }

    /**
     * @return mixed
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function customize_and_save_latex()
    {
        if ($this->is_greek()) $this->templateName = "template_greek.tex";
//        Log::info($this->templateName);
        //open the latex template
        $base_template = Storage::disk('latex')->get($this->templateName);

        $end_of_event_year = Carbon::parse($this->event->end_date)->year;

        if ($end_of_event_year > Carbon::now('Europe/Brussels')->year) {
            $end_of_event_year = Carbon::now('Europe/Brussels')->year;
        }

        //replace the text in template
        $template = str_replace('<CERTIFICATE_HOLDER_NAME>', $this->tex_escape($this->name_of_certificate_holder), $base_template);
        $template = str_replace('<CERTIFICATE_YEAR>', $end_of_event_year, $template);

        //save it locally
        Storage::disk('latex')->put($this->personalized_template_name, $template);
    }

    protected function run_pdf_creation(): void
    {


//call the pdflatex command
        $command = $this->pdflatex . " -interaction=nonstopmode -output-directory " . $this->resource_path . " " . $this->resource_path . "/" . $this->event->id . ".tex";

        $cwd = $this->resource_path;

        // $process = new Process($command, $cwd);
        $process = Process::fromShellCommandline($command, $cwd);
        $process->run();


        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    }


}