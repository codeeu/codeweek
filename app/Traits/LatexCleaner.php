<?php

namespace App\Traits;

trait LatexCleaner
{
    public function tex_escape($string)
    {
        $map = [
            'ʼ' => "'",  // Replace Unicode apostrophe with standard apostrophe
            'ə' => '\\textschwa{}', // Handle ə
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

        $string = preg_replace_callback(
            "/([\^\%~\\\\#\$%&_\{\}ʼ])/",
            function ($matches) use ($map) {
                return $map[$matches[0]] ?? $matches[0];
            },
            $string
        );

        return $string;
    }
}
