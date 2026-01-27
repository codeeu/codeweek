<?php

namespace App\Nova\Actions;

use App\MatchmakingProfile;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Http\Requests\NovaRequest;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DownloadMatchmakingTemplate extends Action
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The displayable name of the action.
     *
     * @var string
     */
    public $name = 'Download CSV Template';

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        $csvHeaders = [
            'Email',
            'Name',
            'Organisation name',
            'Organisation website',
            'Organisation type',
            'Main email address',
            'Country/Region/Areas of operation:',
            'Want to tell us more about your organisation?',
            'Do you give your consent to use your logo and display it in the matchmaking directory?',
            'What kind of activities or support can you offer to schools and educators? (Select all that apply):',
            'Are you interested in collaborating with schools to bring real-world expertise into the classroom?',
            'What types of schools are you most interested in working with?',
            'What areas of digital expertise does your organisation or you specialise in?',
            'Would you like to be part of the wider EU Code Week community and receive updates about future activities and events?',
            'Do you have any additional information or comments that could help us better match you with schools and educators?',
            'By registering as a Digital Volunteer, you agree to being contacted later to share feedback about your experience.',
            'Start time',
            'Completion time',
        ];

        // Example row with helpful values
        $exampleRow = [
            'example@example.com',
            'John Doe',
            'Example Organisation',
            'www.example.org',
            'Non-Governmental Organisation (NGO)',
            'contact@example.org',
            'Belgium',
            'Our mission is to promote coding education.',
            'Yes',
            'Delivering workshops or training;Providing learning resources or curricula;',
            'Yes',
            'Primary Schools;Secondary Schools;',
            'Coding and programming;Cybersecurity;',
            'Yes',
            'Additional information about our organisation.',
            'Yes',
            '2025-01-01 10:00:00',
            '2025-01-01 10:30:00',
        ];

        // Get valid options for reference
        $validOrgTypes = implode('; ', MatchmakingProfile::getValidOrganizationTypeOptions());
        $validCollaboration = implode('; ', MatchmakingProfile::getValidCollaborationOptions());
        $validFormats = implode('; ', MatchmakingProfile::getValidFormats());

        $filename = 'matchmaking-template.csv';
        
        $httpHeaders = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];
        
        $callback = function () use ($csvHeaders, $exampleRow, $validOrgTypes, $validCollaboration, $validFormats) {
            $stream = fopen('php://output', 'w');
            
            // Add BOM for Excel compatibility
            fprintf($stream, chr(0xEF).chr(0xBB).chr(0xBF));
            
            // Write headers
            fputcsv($stream, $csvHeaders);
            
            // Write example row
            fputcsv($stream, $exampleRow);
            
            // Write a comment row with valid options
            fputcsv($stream, ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']);
            fputcsv($stream, ['VALID OPTIONS:', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']);
            fputcsv($stream, ['Organisation type options:', $validOrgTypes, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']);
            fputcsv($stream, ['Collaboration options:', $validCollaboration, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']);
            fputcsv($stream, ['Format options:', $validFormats, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']);
            fputcsv($stream, ['NOTES:', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']);
            fputcsv($stream, ['- Multiple values should be separated by semicolons (;)', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']);
            fputcsv($stream, ['- Boolean fields: Yes/No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']);
            fputcsv($stream, ['- Dates should be in format: YYYY-MM-DD HH:MM:SS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']);
            fputcsv($stream, ['- Country should be the full country name (e.g., "Belgium", "United States")', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '']);
            
            fclose($stream);
        };
        
        return new StreamedResponse($callback, 200, $httpHeaders);
    }

    /**
     * Get the fields available on the action.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request): array
    {
        return [];
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
