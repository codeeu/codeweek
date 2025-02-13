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
        // First transliterate Georgian to Latin
        $text = $this->transliterate_georgian($text);

        // Check for Greek
        if ($this->is_greek_text($text)) {
            return 'greek';
        }

        // Check for Cyrillic
        $cyrillic_split = preg_split('/[\p{Cyrillic}]/u', $text);
        if (count($cyrillic_split) > 1) {
            Log::info('Detected as Russian: ' . $text);
            return 'russian';
        }

        // Default to english for all other cases
        Log::info('Detected as English: ' . $text);
        return 'english';
    }

    private function transliterate_georgian($text)
    {
        // Simple transliteration for Georgian characters
        $georgian_chars = [
            'გ' => 'g',
            'ა' => 'a',
            'მ' => 'm',
            'რ' => 'r',
            'ჯ' => 'j',
            'ო' => 'o',
            'ბ' => 'b',
            'ვ' => 'v'
        ];

        return str_replace(array_keys($georgian_chars), array_values($georgian_chars), $text);
    }
}