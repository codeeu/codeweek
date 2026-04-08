<?php

namespace App\Services\Support;

use App\Models\Support\SupportCase;
use Illuminate\Support\Str;

class CaseIntakeService
{
    public function intake(array $payload): SupportCase
    {
        $gmailMessageId = $payload['gmail_message_id'] ?? null;

        if ($gmailMessageId) {
            $existing = SupportCase::query()->where('gmail_message_id', $gmailMessageId)->first();
            if ($existing) {
                return $existing;
            }
        }

        $raw = (string) ($payload['raw_message'] ?? '');
        $subject = (string) ($payload['subject'] ?? '(no subject)');

        $normalized = $this->normalizeForwardedBody($raw);

        return SupportCase::create([
            'source_channel' => (string) ($payload['source_channel'] ?? 'gmail_forwarded'),
            'processing_mode' => (string) ($payload['processing_mode'] ?? 'forwarded'),

            'gmail_message_id' => $gmailMessageId,
            'gmail_thread_id' => $payload['gmail_thread_id'] ?? null,

            'forwarded_by_email' => $payload['forwarded_by_email'] ?? null,
            'original_sender_email' => $payload['original_sender_email'] ?? null,
            'assigned_to_email' => $payload['assigned_to_email'] ?? null,

            'subject' => $subject,
            'raw_message' => $raw,
            'normalized_message' => $normalized,

            'status' => 'new',
            'risk_level' => 'low',
            'needs_human_review' => false,

            'correlation_id' => SupportJson::correlationId($payload['correlation_id'] ?? null),
        ]);
    }

    private function normalizeForwardedBody(string $raw): string
    {
        $text = Str::of($raw)->replace("\r\n", "\n")->toString();

        // V1 heuristic: trim common forwarding headers blocks and collapse whitespace.
        $lines = explode("\n", $text);
        $out = [];
        foreach ($lines as $line) {
            $trim = trim($line);
            if ($trim === '') {
                $out[] = '';
                continue;
            }
            // Remove quoted-forward separators but keep content.
            if (Str::startsWith($trim, ['-----Original Message-----', 'Begin forwarded message:'])) {
                continue;
            }
            $out[] = $line;
        }

        $joined = trim(implode("\n", $out));
        // Collapse 3+ blank lines to 2.
        $joined = preg_replace("/\n{3,}/", "\n\n", $joined) ?? $joined;

        return $joined;
    }
}

