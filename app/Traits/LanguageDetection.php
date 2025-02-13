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

    public function detect_language($text)
    {
        // Check for Greek first using existing method
        if ($this->is_greek_text($text)) {
            return 'greek';
        }

        // Check for Russian/Cyrillic using similar pattern
        $cyrillic_split = preg_split('/[\p{Cyrillic}]/u', $text);
        if (count($cyrillic_split) > 1) {
            Log::info('Detected as Russian: ' . $text);
            return 'russian';
        }

        // Default to english
        Log::info('Detected as English: ' . $text);
        return 'english';
    }
}
