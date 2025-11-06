<?php

namespace App;

use App\Traits\LanguageDetection;
use App\Traits\LatexCleaner;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;

class CertificateParticipation
{
    use LanguageDetection, LatexCleaner;

    private $templateName = 'participation.tex';

    private $name_of_certificate_holder;
    private $event_name;
    private $event_date;

    private $pdflatex;
    private $personalized_template_name;
    private $id;
    private $latex_root; // absolute path where we read/write/compile

    private $certificate_holder_name_lang = 'russian';
    private $event_name_lang = 'russian';
    private $event_date_lang = 'russian';

    public function __construct($name_for_certificate, $event_name, $event_date)
    {
        ini_set('max_execution_time', 600);
        ini_set('memory_limit', '512M');

        $this->name_of_certificate_holder = (string) $name_for_certificate;
        $this->event_name = (string) $event_name;
        $this->event_date = (string) $event_date;

        $random = Str::random(10);
        $userId = auth()->id() ?? 'cli';

        $this->personalized_template_name = $random . '-' . $userId;

        // Resolve disk root (works whether disk points to resources/latex or storage/app/latex)
        $diskPath = '';
        try {
            $diskPath = (string) Storage::disk('latex')->path('');
        } catch (\Throwable $e) {
            $diskPath = '';
        }
        $diskPath = rtrim($diskPath, DIRECTORY_SEPARATOR);
        $this->latex_root = $diskPath !== '' ? $diskPath : resource_path('latex');

        $this->pdflatex = (string) config('codeweek.pdflatex_path');
        $this->id = $userId . '-' . $random;
    }

    public function generate()
    {
        $this->customize_and_save_latex();
        try {
            $this->run_pdf_creation();
        } catch (\Throwable $e) {
            // keep .tex/.log on failure for debugging
            throw $e;
        }
        $this->clean_temp_files(); // success: remove aux/log/tex
        return $this->personalized_template_name;
    }

    private function path(string $ext): string
    {
        return $this->latex_root . '/' . $this->personalized_template_name . '.' . $ext;
    }

    private function clean_temp_files(): void
    {
        foreach (['aux', 'log', 'tex'] as $ext) {
            @unlink($this->path($ext));
        }
    }

    protected function update_event($s3path)
    {
        $this->event->update([
            'certificate_url' => $s3path,
            'certificate_generated_at' => Carbon::now(),
        ]);
    }

    protected function copy_to_s3(): string
    {
        $pdf = $this->path('pdf');
        $inputStream = fopen($pdf, 'rb');
        $destination = 'certificates/' . $this->id . '.pdf';
        Storage::disk('s3')->put($destination, $inputStream);
        return Storage::disk('s3')->url($destination);
    }

    protected function customize_and_save_latex()
    {
        // --- Choose base template (per detected script in any field) ---
        if ($this->is_greek_text($this->event_name) || $this->is_greek_text($this->event_date) || $this->is_greek_text($this->name_of_certificate_holder)) {
            $this->templateName = 'participation_greek.tex';
        } elseif ($this->is_ukrainian_text($this->event_name) || $this->is_ukrainian_text($this->event_date) || $this->is_ukrainian_text($this->name_of_certificate_holder)) {
            $this->templateName = 'participation_ukrainian.tex';
        } else {
            $this->templateName = 'participation.tex';
        }

        // --- Per-field language flags for otherlanguage* blocks ---
        $this->event_name_lang = $this->is_greek_text($this->event_name) ? 'greek' : ($this->is_ukrainian_text($this->event_name) ? 'ukrainian' : 'english');
        $this->event_date_lang = $this->is_greek_text($this->event_date) ? 'greek' : ($this->is_ukrainian_text($this->event_date) ? 'ukrainian' : 'english');
        $this->certificate_holder_name_lang = $this->is_greek_text($this->name_of_certificate_holder) ? 'greek' : ($this->is_ukrainian_text($this->name_of_certificate_holder) ? 'ukrainian' : 'english');

        // --- Load LaTeX template source ---
        $base_template = null;
        try {
            $base_template = Storage::disk('latex')->get($this->templateName);
        } catch (\Throwable $e) {
            $base_template = null;
        }
        if ($base_template === null || $base_template === '') {
            $fallback = resource_path('latex/' . $this->templateName);
            if (is_file($fallback)) {
                $base_template = (string) file_get_contents($fallback);
            }
        }
        if ($base_template === null || $base_template === '' || strlen($base_template) < 100) {
            throw new \RuntimeException(
                "Base template missing/empty.\n".
                "tried disk root: {$this->latex_root}/{$this->templateName}\n".
                "fallback: " . resource_path('latex/'.$this->templateName)
            );
        }

        // --- Normalize punctuation that often breaks pdfTeX ---
        $normalizePunct = static function (string $s): string {
            return strtr($s, [
                "’"=>"'", "‘"=>"'", "“"=>'"', "”"=>'"',
                "–"=>"-", "—"=>"--", "\u{00A0}"=>" "
            ]);
        };

        // --- Fix mixed alphabet homoglyphs for Cyrillic langs, and normalize date for Ukrainian ---
        $holderRaw = $this->fix_cyrillic_homoglyphs($this->name_of_certificate_holder, $this->certificate_holder_name_lang);
        $eventRaw  = $this->fix_cyrillic_homoglyphs($this->event_name,                $this->event_name_lang);
        $dateRaw   = $this->normalize_date_for_lang(
            $this->fix_cyrillic_homoglyphs($this->event_date, $this->event_date_lang),
            $this->event_date_lang
        );

        // --- Compose final TeX-safe values ---
        $holder = $this->tex_escape($normalizePunct($holderRaw));
        $event  = $this->tex_escape($normalizePunct($eventRaw));
        $date   = $this->tex_escape($normalizePunct($dateRaw));

        // --- Substitute placeholders ---
        $template = str_replace('<CERTIFICATE_HOLDER_NAME>', $holder, $base_template);
        $template = str_replace('<EVENT_NAME>', $event, $template);
        $template = str_replace('<EVENT_DATE>', $date, $template);
        $template = str_replace('<CERTIFICATE_HOLDER_NAME_LANG>', $this->tex_escape($this->certificate_holder_name_lang), $template);
        $template = str_replace('<EVENT_NAME_LANG>', $this->tex_escape($this->event_name_lang), $template);
        $template = str_replace('<EVENT_DATE_LANG>', $this->tex_escape($this->event_date_lang), $template);

        // --- Persist .tex where pdflatex will read it ---
        Storage::disk('latex')->put($this->personalized_template_name . '.tex', $template);
        @file_put_contents($this->path('tex'), $template);

        if (!is_file($this->path('tex')) || filesize($this->path('tex')) < 50) {
            throw new \RuntimeException("Generated TEX missing or empty at: " . $this->path('tex') .
                ". Ensure templates & images are available under {$this->latex_root}");
        }
    }

    protected function run_pdf_creation(): void
    {
        if (!is_file($this->pdflatex)) {
            throw new \RuntimeException("pdflatex binary not found at path: {$this->pdflatex}");
        }

        $texBasename = $this->personalized_template_name . '.tex';
        $pdfPath = $this->path('pdf');
        $logPath = $this->path('log');

        $cmd = escapeshellcmd($this->pdflatex)
            . ' -interaction=nonstopmode -halt-on-error'
            . ' -output-directory ' . escapeshellarg($this->latex_root)
            . ' ' . escapeshellarg($texBasename);

        $process = Process::fromShellCommandline($cmd, $this->latex_root);
        $process->setTimeout(600);
        $process->run();

        if (!$process->isSuccessful() || !is_file($pdfPath)) {
            $stdout = $process->getOutput();
            $stderr = $process->getErrorOutput();
            $logTail = is_file($logPath)
                ? implode("\n", array_slice(explode("\n", (string) @file_get_contents($logPath)), -120))
                : '(no .log file found)';

            throw new \RuntimeException(
                "pdflatex failed or PDF not produced.\n".
                "-- latex_root -- {$this->latex_root}\n".
                "-- tex -- {$this->path('tex')}\n".
                "-- pdf exists -- " . (is_file($pdfPath) ? 'yes' : 'no') . "\n\n".
                "-- STDOUT --\n{$stdout}\n\n-- STDERR --\n{$stderr}\n\n-- LOG TAIL (.log) --\n{$logTail}"
            );
        }
    }

    /**
     * Swap Latin homoglyphs to proper Cyrillic where the field language is Cyrillic.
     * We keep this conservative (i/І only) to avoid corrupting mixed-language input.
     */
    private function fix_cyrillic_homoglyphs(string $s, string $lang): string
    {
        if ($lang === 'ukrainian' || $lang === 'russian') {
            $s = strtr($s, [
                'i' => 'і', // U+0069 -> U+0456
                'I' => 'І', // U+0049 -> U+0406
            ]);
        }
        return $s;
    }

    /**
     * For Ukrainian dates, collapse any datetime to "D MMMM YYYY р." (uk locale).
     * Leaves other languages untouched.
     */
    private function normalize_date_for_lang(string $s, string $lang): string
    {
        if ($lang !== 'ukrainian') return $s;

        // If it's a plain date or datetime string we can parse, format nicely.
        if (preg_match('/^\d{4}-\d{2}-\d{2}/', $s) || preg_match('/^\d{1,2}[\/\.\-]\d{1,2}[\/\.\-]\d{2,4}/', $s)) {
            try {
                $dt = Carbon::parse($s);
                $dt->locale('uk'); // requires intl ICU to be present on the system
                return $dt->isoFormat('D MMMM YYYY [р.]');
            } catch (\Throwable $e) {
                // fall through to original if parse fails
            }
        }

        // If user pasted a full datetime with time, strip a trailing time chunk like " 14:30" or " 14:30:00"
        $s = preg_replace('/\s+\d{1,2}:\d{2}(:\d{2})?(\s*[A-Z]{2,4})?$/u', '', $s) ?? $s;
        return $s;
    }
}
