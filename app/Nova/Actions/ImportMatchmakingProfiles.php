<?php

namespace App\Nova\Actions;

use App\Imports\MatchmakingProfileImport;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Http\Requests\NovaRequest;
use Maatwebsite\Excel\Facades\Excel;

class ImportMatchmakingProfiles extends Action
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The displayable name of the action.
     *
     * @var string
     */
    public $name = 'Import Matchmaking Profiles';

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        try {
            $file = $fields->csv_file;
            
            if (!$file) {
                return Action::danger('Please select a CSV file to import.');
            }

            // Validate file extension (more lenient)
            $extension = strtolower($file->getClientOriginalExtension());
            $allowedExtensions = ['csv', 'txt', 'xlsx', 'xls'];
            
            // Also check the filename if extension is missing
            if (empty($extension)) {
                $filename = strtolower($file->getClientOriginalName());
                if (strpos($filename, '.csv') !== false) {
                    $extension = 'csv';
                } elseif (strpos($filename, '.xlsx') !== false) {
                    $extension = 'xlsx';
                } elseif (strpos($filename, '.xls') !== false) {
                    $extension = 'xls';
                }
            }
            
            if (!in_array($extension, $allowedExtensions)) {
                return Action::danger('Invalid file type. Please upload a CSV or Excel file (.csv, .xlsx, or .xls).');
            }

            // Store the file temporarily
            $path = $file->storeAs('temp', 'matchmaking_import_' . time() . '.' . $extension);

            try {
                // Import the file
                Excel::import(new MatchmakingProfileImport(), $path);
                
                // Clean up temporary file
                Storage::delete($path);
                
                return Action::message('Matchmaking profiles imported successfully!');
            } catch (\Exception $e) {
                // Clean up temporary file on error
                Storage::delete($path);
                
                Log::error('[ImportMatchmakingProfiles] Import failed', [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                ]);
                
                return Action::danger('Import failed: ' . $e->getMessage());
            }
        } catch (\Exception $e) {
            Log::error('[ImportMatchmakingProfiles] Error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            
            return Action::danger('An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request): array
    {
        return [
            File::make('CSV File', 'csv_file')
                ->rules([
                    'required',
                    'file',
                    'max:10240',
                    function ($attribute, $value, $fail) {
                        if ($value) {
                            $extension = strtolower($value->getClientOriginalExtension());
                            $allowedExtensions = ['csv', 'txt', 'xlsx', 'xls'];
                            
                            // Check extension
                            if (!in_array($extension, $allowedExtensions)) {
                                // Also check filename for CSV
                                $filename = strtolower($value->getClientOriginalName());
                                $isCsv = strpos($filename, '.csv') !== false;
                                $isXlsx = strpos($filename, '.xlsx') !== false;
                                $isXls = strpos($filename, '.xls') !== false;
                                
                                if (!$isCsv && !$isXlsx && !$isXls) {
                                    $fail('The file must be a CSV or Excel file (.csv, .xlsx, or .xls).');
                                }
                            }
                        }
                    }
                ])
                ->acceptedTypes('.csv,.xlsx,.xls')
                ->help('Upload a CSV or Excel file with matchmaking profile data. The file should have headers matching the form field names.'),
        ];
    }

    /**
     * Indicate that this action can be run without any models.
     *
     * @return bool
     */
    public function standalone()
    {
        return true;
    }
}
