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

    public function is_ukrainian_text($text)
    {
        $split = preg_split('/[\p{Cyrillic}]/u', $text);

        if (count($split) > 1) {
            \Log::info('Detected as Cyrillic/Ukrainian: ' . $text);
            return true;
        }

        return false;
    }
}
