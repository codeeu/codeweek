<?php

namespace App\Console\Commands\Support;

use App\Services\Support\SupportJson;
use App\Services\Support\UserAuditService;
use Illuminate\Console\Command;

class UserAuditCommand extends Command
{
    protected $signature = 'support:user-audit {email} {--json}';

    protected $description = 'Support tool: audit a user by email/email_display';

    public function handle(UserAuditService $service): int
    {
        $email = (string) $this->argument('email');
        $input = ['email' => $email];

        try {
            $result = $service->audit($email);
            $payload = SupportJson::ok('user_audit', $input, $result);
        } catch (\Throwable $e) {
            $payload = SupportJson::fail('user_audit', $input, $e->getMessage());
        }

        $this->output->writeln(json_encode($payload, JSON_UNESCAPED_SLASHES));

        return $payload['ok'] ? self::SUCCESS : self::FAILURE;
    }
}

