<?php

namespace App\Services\Support\Gmail;

use Google\Client as GoogleClient;

/**
 * Loads OAuth client credentials and tokens from env (inline JSON) or disk paths.
 * Use SUPPORT_GMAIL_CREDENTIALS + SUPPORT_GMAIL_TOKEN on Forge so deploys do not rely on gitignored files.
 */
final class GmailOAuthConfig
{
    public static function applyClientSecrets(GoogleClient $client): void
    {
        $inline = config('support_gmail.credentials');
        if (self::nonEmptyString($inline)) {
            $decoded = json_decode($inline, true);
            if (!is_array($decoded)) {
                throw new \RuntimeException('SUPPORT_GMAIL_CREDENTIALS must be valid JSON (Google OAuth client secret JSON).');
            }
            $client->setAuthConfig($decoded);

            return;
        }

        $path = config('support_gmail.credentials_json');
        if ($path && is_file($path)) {
            $client->setAuthConfig($path);

            return;
        }

        if ($path) {
            throw new \RuntimeException(
                'Gmail OAuth credentials file not found: '.$path.'. Set SUPPORT_GMAIL_CREDENTIALS (paste client JSON in env) or upload the file to that path.'
            );
        }

        throw new \RuntimeException(
            'Gmail OAuth credentials missing. Set SUPPORT_GMAIL_CREDENTIALS (client JSON) or SUPPORT_GMAIL_CREDENTIALS_JSON (path to client JSON).'
        );
    }

    public static function applyAccessToken(GoogleClient $client): void
    {
        $inline = config('support_gmail.token');
        if (self::nonEmptyString($inline)) {
            $decoded = json_decode($inline, true);
            if (!is_array($decoded)) {
                throw new \RuntimeException('SUPPORT_GMAIL_TOKEN must be valid JSON.');
            }
            $client->setAccessToken($decoded);

            return;
        }

        $tokenJson = config('support_gmail.token_json');
        if ($tokenJson && is_file($tokenJson)) {
            $client->setAccessToken(json_decode((string) file_get_contents($tokenJson), true));
        }
    }

    private static function nonEmptyString(mixed $v): bool
    {
        return is_string($v) && trim($v) !== '';
    }
}
