<?php

namespace App\Services\Support\Agents;

use App\Models\Support\SupportCase;
use App\Services\Support\Artisan\ArtisanActionRegistry;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Process;

/**
 * AI triage brain backed by the Cursor headless CLI:
 *
 *   agent -p --output-format json --model <model> "<prompt>"
 *
 * Authenticated via the CURSOR_API_KEY env var. Returns a triage result in the
 * same stable schema as the deterministic TriageAgentService, plus the
 * `code_change` case type for frontend/code fixes.
 */
class CursorCliTriageProvider implements TriageProvider
{
    /** Case types the model is allowed to choose. */
    private const CASE_TYPES = [
        'account_restore',
        'profile_update',
        'duplicate_account',
        'missing_events',
        'certificate_issue',
        'role_issue',
        'code_change',
        'artisan_command',
        'unknown',
    ];

    public function __construct(private readonly ArtisanActionRegistry $registry)
    {
    }

    public function available(): bool
    {
        return (bool) config('support_ai.enabled')
            && (bool) config('support_ai.triage.enabled')
            && trim((string) config('support_ai.cursor_api_key', '')) !== '';
    }

    private function artisanEnabled(): bool
    {
        return (bool) config('support_ai.artisan.enabled');
    }

    /** @return list<string> case types offered to the model this run. */
    private function offeredCaseTypes(): array
    {
        return array_values(array_filter(
            self::CASE_TYPES,
            fn (string $type) => $type !== 'artisan_command' || $this->artisanEnabled()
        ));
    }

    public function triage(SupportCase $case): ?array
    {
        if (!$this->available()) {
            return null;
        }

        $rawText = (string) ($case->normalized_message ?? $case->raw_message ?? '');
        if (trim($rawText) === '') {
            return null;
        }

        try {
            $result = Process::timeout((int) config('support_ai.triage.timeout_seconds', 120))
                ->path(base_path())
                ->env(['CURSOR_API_KEY' => (string) config('support_ai.cursor_api_key')])
                ->run([
                    (string) config('support_ai.triage.cli_bin', 'agent'),
                    '-p',
                    // --force trusts the workspace non-interactively (no Workspace Trust prompt).
                    '--force',
                    '--output-format', 'json',
                    '--model', (string) config('support_ai.triage.model', 'gpt-5.5'),
                    $this->buildPrompt($case, $rawText),
                ]);
        } catch (\Throwable $e) {
            Log::warning('Cursor CLI triage failed to run', ['case_id' => $case->id, 'error' => $e->getMessage()]);

            return null;
        }

        if (!$result->successful()) {
            Log::warning('Cursor CLI triage non-zero exit', [
                'case_id' => $case->id,
                'exit' => $result->exitCode(),
                'stderr' => mb_substr($result->errorOutput(), 0, 500),
            ]);

            return null;
        }

        $parsed = $this->parseModelJson($result->output());
        if ($parsed === null) {
            Log::warning('Cursor CLI triage produced unparseable output', ['case_id' => $case->id]);

            return null;
        }

        return $this->normalize($parsed);
    }

    private function buildPrompt(SupportCase $case, string $rawText): string
    {
        $types = implode(', ', $this->offeredCaseTypes());
        // Keep the ticket text bounded so the CLI invocation stays small.
        $ticket = mb_substr($rawText, 0, 6000);
        $artisanBlock = $this->artisanEnabled() ? $this->artisanPromptBlock() : '';

        return <<<PROMPT
You are the triage brain for the CodeWeek support copilot. Classify ONE support ticket.
Do NOT make any code changes, run tools, or edit files. Respond with a single JSON object ONLY (no prose, no code fences).

Allowed case_type values: {$types}
Use "code_change" only when the request is about a bug or change in the website/application code
(frontend or template/markup/styling/behaviour) that a developer would fix in the repository.
{$artisanBlock}
JSON schema to return:
{
  "case_type": "<one allowed value>",
  "confidence": <number 0..1>,
  "target_email": "<the affected user's email, or null>",
  "secondary_emails": ["<other emails mentioned>"],
  "risk_level": "low|medium|high",
  "recommended_runbook": "<short snake_case label>",
  "needs_human_review": <true|false>,
  "reasoning_summary": "<one sentence>",
  "profile_firstname": "<requested first name or null>",
  "profile_lastname": "<requested last name or null>",
  "change_summary": "<for code_change: one sentence describing the fix, else null>",
  "change_area": "<for code_change: e.g. frontend/blade/css/js, else null>",
  "cursor_prompt": "<for code_change: a precise instruction for a coding agent to implement the fix and open a PR, else null>",
  "artisan_command_name": "<for artisan_command: an allowlisted command name, else null>",
  "artisan_args": {},
  "artisan_raw_command": "<for artisan_command: a raw artisan command WITHOUT 'php artisan' prefix if no allowlisted command fits, else null>"
}

Ticket subject: {$case->subject}
Ticket body:
\"\"\"
{$ticket}
\"\"\"
PROMPT;
    }

    private function artisanPromptBlock(): string
    {
        $lines = [];
        foreach ($this->registry->all() as $name => $spec) {
            $args = array_keys((array) ($spec['arguments'] ?? []));
            $argList = $args === [] ? '' : ' (args: '.implode(', ', $args).')';
            $lines[] = "- {$name}{$argList} — {$spec['description']}";
        }
        $allow = implode("\n", $lines);

        return <<<BLOCK

Use "artisan_command" only when the fix requires running a server maintenance command.
Prefer an allowlisted command and put its name in "artisan_command_name" with values in "artisan_args"
(keys = argument/option names, e.g. {"email":"user@example.com","--firstname":"Ada"}).
Allowlisted commands:
{$allow}
If none fits, set "artisan_command_name" to null and put the bare artisan command in "artisan_raw_command"
(no "php artisan" prefix, no shell operators). Destructive commands will be rejected.

BLOCK;
    }

    /**
     * The CLI's --output-format json wraps the agent result; the model's JSON
     * may be the whole payload, a "result"/"text" field, or embedded in prose.
     *
     * @return array<string, mixed>|null
     */
    private function parseModelJson(string $stdout): ?array
    {
        $stdout = trim($stdout);
        if ($stdout === '') {
            return null;
        }

        $direct = json_decode($stdout, true);
        if (is_array($direct)) {
            if ($this->looksLikeTriage($direct)) {
                return $direct;
            }
            foreach (['result', 'text', 'output', 'response', 'message'] as $key) {
                if (isset($direct[$key]) && is_string($direct[$key])) {
                    $inner = $this->extractFirstJsonObject($direct[$key]);
                    if ($inner !== null) {
                        return $inner;
                    }
                }
            }
        }

        return $this->extractFirstJsonObject($stdout);
    }

    /**
     * @return array<string, mixed>|null
     */
    private function extractFirstJsonObject(string $text): ?array
    {
        if (preg_match('/\{(?:[^{}]|(?R))*\}/s', $text, $m)) {
            $decoded = json_decode($m[0], true);
            if (is_array($decoded) && $this->looksLikeTriage($decoded)) {
                return $decoded;
            }
        }

        return null;
    }

    /**
     * @param array<string, mixed> $data
     */
    private function looksLikeTriage(array $data): bool
    {
        return array_key_exists('case_type', $data);
    }

    /**
     * @param array<string, mixed> $data
     * @return array<string, mixed>
     */
    private function normalize(array $data): array
    {
        $caseType = is_string($data['case_type'] ?? null) ? strtolower(trim($data['case_type'])) : 'unknown';
        if (!in_array($caseType, self::CASE_TYPES, true)) {
            $caseType = 'unknown';
        }

        $risk = is_string($data['risk_level'] ?? null) ? strtolower(trim($data['risk_level'])) : 'low';
        if (!in_array($risk, ['low', 'medium', 'high'], true)) {
            $risk = 'low';
        }

        $confidence = is_numeric($data['confidence'] ?? null) ? (float) $data['confidence'] : 0.5;
        $confidence = max(0.0, min(1.0, $confidence));

        $secondary = [];
        foreach ((array) ($data['secondary_emails'] ?? []) as $email) {
            if (is_string($email) && $email !== '') {
                $secondary[] = strtolower(trim($email));
            }
        }

        $requestedAction = match ($caseType) {
            'profile_update' => 'user_profile_update',
            'account_restore' => 'user_restore',
            'code_change' => 'code_change',
            'artisan_command' => 'artisan_command',
            default => null,
        };

        $artisanArgs = [];
        foreach ((array) ($data['artisan_args'] ?? []) as $key => $value) {
            if (is_string($key) && (is_string($value) || is_numeric($value) || is_bool($value))) {
                $artisanArgs[$key] = is_bool($value) ? $value : (string) $value;
            }
        }

        return [
            'case_type' => $caseType,
            'confidence' => $confidence,
            'target_email' => $this->stringOrNull($data['target_email'] ?? null),
            'secondary_emails' => array_values(array_unique($secondary)),
            'target_user_id' => null,
            'requested_action' => $requestedAction,
            'profile_firstname' => $this->stringOrNull($data['profile_firstname'] ?? null),
            'profile_lastname' => $this->stringOrNull($data['profile_lastname'] ?? null),
            'risk_level' => $risk,
            'recommended_runbook' => $this->stringOrNull($data['recommended_runbook'] ?? null) ?? $caseType,
            'needs_human_review' => (bool) ($data['needs_human_review'] ?? false),
            'reasoning_summary' => $this->stringOrNull($data['reasoning_summary'] ?? null) ?? 'AI triage (Cursor CLI).',
            'change_summary' => $this->stringOrNull($data['change_summary'] ?? null),
            'change_area' => $this->stringOrNull($data['change_area'] ?? null),
            'cursor_prompt' => $this->stringOrNull($data['cursor_prompt'] ?? null),
            'artisan_command_name' => $this->stringOrNull($data['artisan_command_name'] ?? null),
            'artisan_args' => $artisanArgs,
            'artisan_raw_command' => $this->stringOrNull($data['artisan_raw_command'] ?? null),
            'triage_source' => 'cursor_cli',
        ];
    }

    private function stringOrNull(mixed $value): ?string
    {
        if (!is_string($value)) {
            return null;
        }
        $value = trim($value);
        if ($value === '' || strtolower($value) === 'null') {
            return null;
        }

        return $value;
    }
}
