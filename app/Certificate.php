<?php

namespace App;


use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class Certificate
{

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
        $this->pdflatex = env("PDFLATEX_PATH");
        $this->event = $event;
        $this->id = $event->id . '-' . str_random(10);
    }

    public function generate()
    {

        $this->customize_and_save_latex();
        $this->run_pdf_creation();
        $s3path =  $this->copy_to_s3();

        return $s3path;

    }


    private function tex_escape($string)
    {
        $map = array(
            "#" => "\\#",
            "$" => "\\$",
            "%" => "\\%",
            "&" => "\\&",
            "~" => "\\~{}",
            "_" => "\\_",
            "^" => "\\^{}",
            "\\" => "\\textbackslash",
            "{" => "\\{",
            "}" => "\\}",
        );
        return preg_replace_callback("/([\^\%~\\\\#\$%&_\{\}])/",
            function ($matches) use ($map) {
                foreach ($matches as $match) {
                    return ($map[$match]);
                }
            }
            , $string);
    }

    /**
     * @return string
     * @throws \League\Flysystem\FileNotFoundException
     */
    protected function copy_to_s3(): string
    {
        $inputStream = Storage::disk('latex')->getDriver()->readStream( $this->event->id . '.pdf');
        $destination = Storage::disk('s3')->getDriver()->getAdapter()->getPathPrefix() . '/certificates/' . $this->id . '.pdf';
        Storage::disk('s3')->getDriver()->putStream($destination, $inputStream);

        return Storage::disk('s3')->url('certificates/' . $this->id . '.pdf');
    }

    /**
     * @return mixed
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function customize_and_save_latex()
    {
        //open the latex template
        $base_template = Storage::disk('latex')->get($this->templateName);

        //replace the text in template
        $template = str_replace('<CERTIFICATE_HOLDER_NAME>', $this->tex_escape($this->name_of_certificate_holder), $base_template);

        //save it locally
        Storage::disk('latex')->put($this->personalized_template_name, $template);
    }

    protected function run_pdf_creation(): void
    {


//call the pdflatex command
        $command = $this->pdflatex . " -interaction=nonstopmode -output-directory " . $this->resource_path . " " . $this->resource_path . "/" . $this->event->id . ".tex";

        $cwd = $this->resource_path;

        $process = new Process($command, $cwd);
        $process->run();


        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    }


    //call the pdflatex command

    /*



    resources_path             = dirname(realpath(__file__)) + '/resources/'
    static_files_path          = dirname(dirname(realpath(__file__))) + '/staticfiles/certificates/'

    generic_template_path      = resources_path + 'template.tex'
    personalized_template_path = resources_path + str(event_id) + '.tex'
    resulting_certificate_path = static_files_path + certificate_name
    print generic_template_path
    with open(generic_template_path) as template:
        personalized_certificate_content = template.read().replace(
            '<CERTIFICATE_HOLDER_NAME>', tex_escape(name_of_certificate_holder))

    with open(personalized_template_path, 'w') as personalized_template:
        personalized_template.write(personalized_certificate_content.encode('utf-8'))

    commands = [
        'cd ' + resources_path,
        'pdflatex -interaction=nonstopmode -output-directory ' + resources_path + ' ' + personalized_template_path,
        'mkdir -p ' + static_files_path,
        'mv -f ' + personalized_template_path.replace('.tex', '.pdf') + ' ' + resulting_certificate_path,
        'rm -rf ' + resources_path + str(event_id) + '.*',
    ]

    if system(' && '.join(commands)) != 0:
        return False

    filename=str(event_id) + " " + personalized_template_path
    local_path = resulting_certificate_path
    print 'Certificate name: ' + certificate_name
    print 'Local Path: ' + local_path
    push_picture_to_s3(certificate_name, local_path)

    return resulting_certificate_path

     */

}