<?php

namespace App;

use App\Traits\LanguageDetection;
use App\Traits\LatexCleaner;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class SuperOrganiserCertificate
{
  use LanguageDetection, LatexCleaner;

  private $templateName;
  private $name_of_certificate_holder;
  private $number_of_activities;
  private $certificate_date;
  private $language;

  private $resource_path;
  private $pdflatex;
  private $personalized_template_name;
  private $id;

  /**
   * Constructor to generate a certificate.
   *
   * @param  string  $holderName  The recipient's name
   * @param  int  $numberOfActivities Number of coding activities
   * @param  string|null  $certificateDate Defaults to today's date
   * @param  string  $language Language: 'en' for English, 'el' for Greek
   */
  public function __construct($holderName, $numberOfActivities, $certificateDate = null, $language = 'en')
  {
    ini_set('max_execution_time', 600);
    ini_set('memory_limit', '512M');

    // Store user data
    $this->name_of_certificate_holder = $holderName;
    $this->number_of_activities = $numberOfActivities;
    $this->certificate_date = $certificateDate ?: Carbon::now()->format('d/m/Y');
    $this->language = $language;

    // Choose correct LaTeX template
    $this->templateName = ($language === 'el')
      ? 'super-organiser-greek-2025.tex'
      : 'super-organiser-2025.tex';

    // Generate unique filename
    $random = Str::random(10);
    $userId = auth()->check() ? auth()->id() : 0;
    $this->personalized_template_name = $random . '-' . $userId;

    // Set resource paths
    $this->resource_path = resource_path('latex');
    $this->pdflatex = config('codeweek.pdflatex_path', '/Library/TeX/texbin/pdflatex');
    $this->id = $userId . '-' . $random;
  }

  /**
   * Generate the PDF certificate.
   * @return string The base filename (without .pdf)
   */
  public function generate()
  {
    $this->customize_and_save_latex();
    $this->run_pdf_creation();

    // Upload the certificate PDF to S3
    $s3path = $this->upload_to_s3();

    // Clean up local temporary files
    $this->clean_temp_files();

    return $s3path;
  }

  /**
   * Remove leftover .aux, .log, .out, and .tex files
   */
  private function clean_temp_files()
  {
    $extensions = ['aux', 'log', 'out', 'tex'];
    foreach ($extensions as $ext) {
      Storage::disk('latex')->delete($this->personalized_template_name . '.' . $ext);
    }
  }

  /**
   * Read the template, replace placeholders, and save the new .tex file.
   */
  protected function customize_and_save_latex()
  {
    // Load the LaTeX template
    $base_template = Storage::disk('latex')->get($this->templateName);

    // Perform placeholder replacements
    $template = str_replace('<CERTIFICATE_HOLDER_NAME>', $this->tex_escape($this->name_of_certificate_holder), $base_template);
    $template = str_replace('<NUMBER_OF_ACTIVITIES>', $this->tex_escape($this->number_of_activities), $template);
    $template = str_replace('<CERTIFICATE_DATE>', $this->tex_escape($this->certificate_date), $template);

    // Save new LaTeX file
    Storage::disk('latex')->put($this->personalized_template_name . '.tex', $template);
  }

  /**
   * Compile the .tex file into a PDF using pdflatex.
   */
  protected function run_pdf_creation(): void
  {
    if (!file_exists($this->pdflatex)) {
      throw new \RuntimeException("pdflatex binary not found at path: {$this->pdflatex}");
    }

    $texFile = $this->resource_path . '/' . $this->personalized_template_name . '.tex';
    $command = sprintf(
      '%s -interaction=nonstopmode -output-directory %s %s',
      escapeshellcmd($this->pdflatex),
      escapeshellarg($this->resource_path),
      escapeshellarg($texFile)
    );

    $process = Process::fromShellCommandline($command, $this->resource_path);
    $process->setTimeout(600);
    $process->start();

    while ($process->isRunning()) {
      usleep(400000);
    }

    // Optional: Uncomment to throw an error on failure
    // if (!$process->isSuccessful()) {
    //     throw new ProcessFailedException($process);
    // }
  }


  protected function upload_to_s3(): string
  {
    $pdfFile = $this->personalized_template_name . '.pdf';
    $localPath = storage_path('app/latex/' . $pdfFile);
    $s3Path = 'certificates/super-organiser/' . $pdfFile; // Destination on S3

    // Upload to S3
    Storage::disk('s3')->put($s3Path, file_get_contents($localPath), 'public');

    // Return the public URL for the certificate
    return Storage::disk('s3')->url($s3Path);
  }

  /**
   * Escape special LaTeX characters (#, $, %, &, etc.)
   */
  private function tex_escape($string)
  {
    $map = [
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

    return preg_replace_callback(
      "/([\^\%~\\\\#\$%&_\{\}])/",
      function ($matches) use ($map) {
        return $map[$matches[0]];
      },
      $string
    );
  }
}
