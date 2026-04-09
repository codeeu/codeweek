<?php

namespace App\Console\Commands\Support;

use App\Services\Support\Gmail\GmailOAuthConfig;
use Google\Client as GoogleClient;
use Google\Service\Gmail as GmailService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GmailAuthorizeCommand extends Command
{
    protected $signature = 'support:gmail:authorize
        {--credentials= : Path to OAuth client credentials JSON (defaults to SUPPORT_GMAIL_CREDENTIALS_JSON)}
        {--token= : Path to write token JSON (defaults to SUPPORT_GMAIL_TOKEN_JSON)}
        {--code= : OAuth authorization code (optional; if omitted, you will be prompted)}';

    protected $description = 'One-time OAuth authorization for the support Gmail mailbox (writes token JSON).';

    public function handle(): int
    {
        $credentialsPath = $this->option('credentials');
        $tokenPath = $this->option('token') ?: config('support_gmail.token_json');

        $client = new GoogleClient();
        $client->setApplicationName('Codeweek Internal Support Copilot');
        $client->setScopes([GmailService::GMAIL_READONLY]);
        if ($credentialsPath) {
            if (!is_file((string) $credentialsPath)) {
                $this->error('OAuth credentials file not found: '.$credentialsPath);

                return self::FAILURE;
            }
            $client->setAuthConfig((string) $credentialsPath);
        } else {
            GmailOAuthConfig::applyClientSecrets($client);
        }
        $client->setAccessType('offline');
        $client->setPrompt('consent');

        // For non-Workspace (consumer Gmail) we use a localhost redirect. The browser will fail to connect,
        // but the redirected URL will contain ?code=... which you paste back here.
        $client->setRedirectUri('http://localhost');

        $authUrl = $client->createAuthUrl();
        $this->line('1) Open this URL in a browser while logged into the support mailbox:');
        $this->line($authUrl);
        $this->newLine();
        $this->line("2) After consent, you'll be redirected to a localhost URL that won't load.");
        $this->line('   Copy the `code` parameter from the URL and paste it below.');
        $this->newLine();

        $code = (string) ($this->option('code') ?: $this->ask('OAuth code'));
        $code = trim($code);
        if ($code === '') {
            $this->error('No code provided.');
            return self::FAILURE;
        }

        $token = $client->fetchAccessTokenWithAuthCode($code);
        if (isset($token['error'])) {
            $this->error('OAuth failed: '.($token['error_description'] ?? $token['error']));
            return self::FAILURE;
        }

        if ($tokenPath) {
            File::ensureDirectoryExists(dirname((string) $tokenPath));
            File::put((string) $tokenPath, json_encode($token, JSON_PRETTY_PRINT));
            @chmod((string) $tokenPath, 0600);
            $this->info('Token saved to '.$tokenPath);
        } else {
            $this->warn('No SUPPORT_GMAIL_TOKEN_JSON / --token path — paste this JSON into Forge as SUPPORT_GMAIL_TOKEN:');
            $this->line(json_encode($token, JSON_PRETTY_PRINT));
        }

        $this->line('Next: set SUPPORT_GMAIL_ENABLED=true and run `php artisan support:gmail:poll`.');

        return self::SUCCESS;
    }
}

