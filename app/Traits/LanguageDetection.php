<?php

namespace App\Traits;

use Log;

trait LanguageDetection
{
    public function is_greek_text($text)
    {

        $split = preg_split('/[\p{Greek}]/u', $text);
        if (count($split) > 1) {
            Log::info('Detected as Greek: ' . $text);

            return true;
        }

        return false;
    }
}
