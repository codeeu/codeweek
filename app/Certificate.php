<?php

namespace App;


use Illuminate\Support\Facades\Storage;

class Certificate
{

    protected $templateName = "template.tex";
    protected $name_of_certificate_holder;
    protected $filename;

    public function __construct(Event $event)
    {
        $this->name_of_certificate_holder = $event->name_for_certificate;
    }

    public function generate()
    {

        $base_template = Storage::disk('public')->get('resources/'.$this->templateName);
        $template = str_replace('<CERTIFICATE_HOLDER_NAME>', $this->tex_escape($this->name_of_certificate_holder), $base_template);

        return $template;

        //return $this->name_of_certificate_holder;
    }


    private function tex_escape( $string )
    {
        $map = array(
            "#"=>"\\#",
            "$"=>"\\$",
            "%"=>"\\%",
            "&"=>"\\&",
            "~"=>"\\~{}",
            "_"=>"\\_",
            "^"=>"\\^{}",
            "\\"=>"\\textbackslash",
            "{"=>"\\{",
            "}"=>"\\}",
        );
        return preg_replace_callback( "/([\^\%~\\\\#\$%&_\{\}])/",
            function($matches) use($map){
                foreach($matches as $match) {
                    return ($map[$match]);
                }
            }
            , $string );
    }
    //open the latex template
    //replace the text in template
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