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
        // Check for Georgian
        $georgian_split = preg_split('/[\x{10A0}-\x{10FF}]/u', $text);
        if (count($georgian_split) > 1) {
            Log::info('Detected as Georgian: ' . $text);
            return 'english'; // Fallback to english for Georgian since LaTeX template doesn't support it
        }

        // Check for Greek
        if ($this->is_greek_text($text)) {
            return 'greek';
        }

        // Check for Russian/Cyrillic
        $cyrillic_split = preg_split('/[\p{Cyrillic}]/u', $text);
        if (count($cyrillic_split) > 1) {
            Log::info('Detected as Russian: ' . $text);
            return 'russian';
        }

        // Check for Polish and other Latin-based special characters
        if (preg_match('/[ąćęłńóśźżĄĆĘŁŃÓŚŹŻ]/u', $text)) {
            Log::info('Detected as Polish or Special Latin: ' . $text);
            return 'english'; // Use English for Latin-based special characters
        }

        // Default to english for all other cases
        Log::info('Detected as English: ' . $text);
        return 'english';
    }
}
