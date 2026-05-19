<?php

namespace App\Console\Commands\Support;

use App\Models\Support\SupportCase;
use App\Services\Support\SupportJson;
use App\Services\Support\UserProfileUpdateService;
use Illuminate\Console\Command;

class UserUpdateProfileCommand extends Command
{
    protected $signature = 'support:user-update-profile
        {email : User email to update}
        {--firstname= : New first name (firstname field)}
        {--lastname= : New last name (lastname field)}
        {--dry-run : Plan only; do not write}
        {--json : Output JSON only}';

    protected $description = 'Support tool: update a user profile first/last name (dry-run supported)';

    public function handle(UserProfileUpdateService $service): int
    {
        $email = (string) $this->argument('email');
        $firstname = $this->option('firstname');
        $lastname = $this->option('lastname');
        $dryRun = (bool) $this->option('dry-run');

        $firstname = is_string($firstname) && trim($firstname) !== '' ? trim($firstname) : null;
        $lastname = is_string($lastname) && trim($lastname) !== '' ? trim($lastname) : null;

        $case = SupportCase::create([
            'source_channel' => 'manual',
            'processing_mode' => 'manual',
            'subject' => 'CLI: support:user-update-profile',
            'raw_message' => json_encode(['email' => $email, 'firstname' => $firstname, 'lastname' => $lastname]),
            'status' => 'investigating',
            'risk_level' => 'low',
            'target_email' => $email,
            'correlation_id' => SupportJson::correlationId(),
        ]);

        $payload = $service->updateProfile(
            case: $case,
            email: $email,
            firstname: $firstname,
            lastname: $lastname,
            dryRun: $dryRun,
            viaEmailApproval: !$dryRun,
        );

        $json = json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        $this->output->writeln($json);

        return ($payload['ok'] ?? false) ? self::SUCCESS : self::FAILURE;
    }
}
