<?php

namespace App\Traits;

trait LatexCleaner
{
    public function tex_escape($string)
    {
        $map = [
            'ʼ' => "'",  // Replace Unicode apostrophe with standard apostrophe
            'ə' => '\\textschwa{}', // Handle ə
            '"' => "''", // Replace double quotes with two single quotes
            '#' => '\\#',
            '$' => '\\$',
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
            "/([\#\$%&~_\^\\\\{}ʼ\"])/",
            function ($matches) use ($map) {
                return $map[$matches[0]] ?? $matches[0];
            },
            $string
        );
    }
}
