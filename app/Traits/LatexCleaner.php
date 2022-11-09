<?php

namespace App\Traits;

use Log;

trait LatexCleaner
{
    public function tex_escape($string)
    {

        $string = str_replace('"',"''", $string);
        $string = str_replace('Ȋ',"Î", $string);

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
            "}" => "\\}"
        );

        $string =  preg_replace_callback("/([\^\%~\\\\#\$%&_\{\}])/",
            function ($matches) use ($map) {
                foreach ($matches as $match) {
                    return ($map[$match]);
                }
            }
            , $string);

        return $string;
    }


}