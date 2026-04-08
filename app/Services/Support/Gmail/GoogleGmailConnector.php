<?php

namespace App\Services\Support\Gmail;

use Google\Client as GoogleClient;
use Google\Service\Gmail as GmailService;
use Google\Service\Gmail\Label as GoogleLabel;
use Google\Service\Gmail\Message as GoogleMessage;
use Illuminate\Support\Str;

class GoogleGmailConnector implements GmailConnector
{
    private GmailService $gmail;
    private GoogleClient $client;

    public function __construct()
    {
        $client = new GoogleClient();
        $client->setApplicationName('Codeweek Internal Support Copilot');
        $client->setScopes([GmailService::GMAIL_READONLY]);
        $client->setAccessType('offline');

        GmailOAuthConfig::applyClientSecrets($client);
        GmailOAuthConfig::applyAccessToken($client);

        $this->client = $client;
        $this->gmail = new GmailService($client);
    }

    public function fetchNewMessages(
        string $mailbox,
        ?string $label,
        string $query,
        ?string $sinceHistoryId,
        int $max = 25,
    ): array {
        $this->ensureValidToken();

        $q = trim($query);
        $labelId = null;
        $warnings = [];
        if ($label) {
            // Label filtering is optional. If the label doesn't exist, we ingest without label scoping
            // rather than failing the whole poll.
            $labelId = $this->resolveLabelIdOrNull($mailbox, $label);
            if ($labelId === null && trim((string) $label) !== '') {
                $warnings[] = sprintf(
                    'Configured Gmail label "%s" was not found; polling without label filter.',
                    trim((string) $label),
                );
            }
        }

        $params = [
            'q' => $q,
            'maxResults' => $max,
        ];

        if ($labelId) {
            $params['labelIds'] = [$labelId];
        }

        // V1: we use search-based ingestion; historyId is only used as a stored cursor.
        // If you want strict incremental ingest, we can switch to users.history.list.
        $list = $this->gmail->users_messages->listUsersMessages($mailbox, $params);
        $messages = [];

        foreach (($list->getMessages() ?? []) as $msgRef) {
            $full = $this->gmail->users_messages->get($mailbox, $msgRef->getId(), ['format' => 'full']);
            $messages[] = $this->toMessage($full);
        }

        // Best-effort: use the highest historyId seen in payloads, if present.
        $nextHistoryId = null;
        foreach ($messages as $m) {
            // Google "full" message does not always include historyId; ignore if missing.
            // We'll set cursor to "now" by leaving null (caller can store polled_at).
            $nextHistoryId = $nextHistoryId ?? $sinceHistoryId;
        }

        return [
            'messages' => $messages,
            'next_history_id' => $nextHistoryId,
            'warnings' => $warnings,
        ];
    }

    private function resolveLabelIdOrNull(string $mailbox, string $label): ?string
    {
        $label = trim($label);
        if ($label === '') {
            return null;
        }

        // If user already provided a label ID (usually "Label_..."), use it directly.
        if (Str::startsWith($label, 'Label_')) {
            return $label;
        }

        $labels = $this->gmail->users_labels->listUsersLabels($mailbox)->getLabels() ?? [];

        /** @var GoogleLabel $l */
        foreach ($labels as $l) {
            if ($l->getId() === $label || $l->getName() === $label) {
                return (string) $l->getId();
            }
        }

        return null;
    }

    private function ensureValidToken(): void
    {
        $token = $this->client->getAccessToken();
        if (empty($token)) {
            throw new \RuntimeException('Gmail token missing. Run support:gmail:authorize and set SUPPORT_GMAIL_TOKEN or SUPPORT_GMAIL_TOKEN_JSON.');
        }

        if (!$this->client->isAccessTokenExpired()) {
            return;
        }

        $refreshToken = $this->client->getRefreshToken() ?: ($token['refresh_token'] ?? null);
        if (!$refreshToken) {
            throw new \RuntimeException('Gmail token expired and no refresh_token available. Re-run support:gmail:authorize.');
        }

        $newToken = $this->client->fetchAccessTokenWithRefreshToken($refreshToken);
        if (isset($newToken['error'])) {
            throw new \RuntimeException('Failed to refresh Gmail token: '.($newToken['error_description'] ?? $newToken['error']));
        }

        $tokenJson = config('support_gmail.token_json');
        if ($tokenJson) {
            // Persist the refreshed token best-effort; file permissions handled by authorize command.
            @file_put_contents($tokenJson, json_encode($this->client->getAccessToken(), JSON_PRETTY_PRINT));
        }
    }

    private function toMessage(GoogleMessage $msg): GmailMessage
    {
        $headers = [];
        foreach (($msg->getPayload()?->getHeaders() ?? []) as $h) {
            $headers[strtolower($h->getName())] = $h->getValue();
        }

        $subject = $headers['subject'] ?? null;
        $from = $headers['from'] ?? null;

        $rawBody = $this->extractBestBody($msg);

        return new GmailMessage(
            id: (string) $msg->getId(),
            threadId: $msg->getThreadId(),
            subject: $subject,
            from: $from,
            rawBody: $rawBody,
            internalDateMs: $msg->getInternalDate(),
        );
    }

    private function extractBestBody(GoogleMessage $msg): string
    {
        $payload = $msg->getPayload();
        if (!$payload) {
            return '';
        }

        $body = $payload->getBody()?->getData();
        if ($body) {
            return $this->decodeBody($body);
        }

        $parts = $payload->getParts() ?? [];
        $candidates = $this->flattenParts($parts);

        // Prefer text/plain; fallback to text/html stripped.
        foreach (['text/plain', 'text/html'] as $mime) {
            foreach ($candidates as $part) {
                if (($part['mimeType'] ?? null) === $mime && !empty($part['body'])) {
                    $decoded = $this->decodeBody($part['body']);
                    return $mime === 'text/html' ? strip_tags($decoded) : $decoded;
                }
            }
        }

        return '';
    }

    /**
     * @param array<int, \Google\Service\Gmail\MessagePart> $parts
     * @return array<int, array{mimeType: ?string, body: ?string}>
     */
    private function flattenParts(array $parts): array
    {
        $out = [];
        foreach ($parts as $p) {
            $out[] = [
                'mimeType' => $p->getMimeType(),
                'body' => $p->getBody()?->getData(),
            ];
            if ($p->getParts()) {
                $out = array_merge($out, $this->flattenParts($p->getParts()));
            }
        }
        return $out;
    }

    private function decodeBody(string $data): string
    {
        $data = str_replace(['-', '_'], ['+', '/'], $data);
        $decoded = base64_decode($data, true);
        return $decoded === false ? '' : $decoded;
    }
}

