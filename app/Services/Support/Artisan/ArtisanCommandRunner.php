<?php

namespace App\Services\Support\Artisan;

use App\Services\Support\SupportJson;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Str;

/**
 * Validates and runs support AI artisan actions.
 *
 * Two modes:
 *  - registry: an allowlisted command (ArtisanActionRegistry) with validated args.
 *  - raw:      an AI-proposed artisan command (fallback) — guarded by a deny-list,
 *              rejected if it contains shell metacharacters, executed argv-only
 *              (never through a shell), and always behind dry-run + APPROVE.
 *
 * Commands are executed with the PHP binary + the app's artisan file using the
 * Process array form, so values can never be interpreted by a shell.
 */
class ArtisanCommandRunner
{
    public function __construct(private readonly ArtisanActionRegistry $registry)
    {
    }

    public function enabled(): bool
    {
        return (bool) config('support_ai.enabled') && (bool) config('support_ai.artisan.enabled');
    }

    /**
     * Build a plan straight from a triage payload's artisan_* fields.
     *
     * @param  array<string, mixed>  $triage
     * @return array<string, mixed> SupportJson envelope.
     */
    public function planFromTriage(array $triage): array
    {
        $name = is_string($triage['artisan_command_name'] ?? null) ? trim($triage['artisan_command_name']) : '';
        $raw = is_string($triage['artisan_raw_command'] ?? null) ? trim($triage['artisan_raw_command']) : '';
        $args = (array) ($triage['artisan_args'] ?? []);

        return $this->plan($name !== '' ? $name : null, $args, $raw !== '' ? $raw : null);
    }

    /**
     * Build a validated execution plan from triage output.
     *
     * @param  array<string, mixed>  $args
     * @return array<string, mixed> SupportJson envelope; result holds the plan.
     */
    public function plan(?string $commandName, array $args = [], ?string $rawCommand = null): array
    {
        if (!$this->enabled()) {
            return SupportJson::fail('artisan_plan', [], 'artisan_actions_disabled');
        }

        if ($commandName !== null && $commandName !== '') {
            return $this->planRegistry($commandName, $args);
        }

        if ($rawCommand !== null && trim($rawCommand) !== '') {
            return $this->planRaw($rawCommand);
        }

        return SupportJson::fail('artisan_plan', [], 'no_command_proposed');
    }

    /**
     * @param  array<string, mixed>  $args
     */
    private function planRegistry(string $commandName, array $args): array
    {
        $spec = $this->registry->get($commandName);
        if ($spec === null) {
            return SupportJson::fail('artisan_plan', ['command' => $commandName], 'command_not_in_allowlist');
        }

        $tokens = [$commandName];

        foreach ((array) ($spec['arguments'] ?? []) as $name => $rule) {
            $value = $args[$name] ?? null;
            if ($value === null || $value === '') {
                if ($rule['required'] ?? false) {
                    return SupportJson::fail('artisan_plan', ['command' => $commandName], 'missing_argument:'.$name);
                }
                continue;
            }
            if (!$this->registry->validateValue($rule['type'], $value)) {
                return SupportJson::fail('artisan_plan', ['command' => $commandName], 'invalid_argument:'.$name);
            }
            $tokens[] = (string) $value;
        }

        foreach ((array) ($spec['options'] ?? []) as $opt => $rule) {
            $key = ltrim($opt, '-');
            $value = $args[$key] ?? ($args[$opt] ?? null);
            if ($value === null || $value === false || $value === '') {
                continue;
            }
            if (($rule['type'] ?? '') === 'flag') {
                $tokens[] = $opt;
                continue;
            }
            if (!$this->registry->validateValue($rule['type'], $value)) {
                return SupportJson::fail('artisan_plan', ['command' => $commandName], 'invalid_option:'.$key);
            }
            $tokens[] = $opt.'='.$value;
        }

        return SupportJson::ok('artisan_plan', ['command' => $commandName], [
            'mode' => 'registry',
            'command' => $commandName,
            'tokens' => $tokens,
            'is_write' => (bool) ($spec['is_write'] ?? false),
            'supports_dry_run' => (bool) ($spec['supports_dry_run'] ?? false),
            'display' => $this->display($tokens),
        ]);
    }

    private function planRaw(string $rawCommand): array
    {
        if (!(bool) config('support_ai.artisan.allow_raw_fallback', true)) {
            return SupportJson::fail('artisan_plan', [], 'raw_fallback_disabled');
        }

        $raw = trim($rawCommand);
        // Strip an accidental "php artisan" / "artisan" prefix.
        $raw = preg_replace('/^\s*(php\s+)?artisan\s+/i', '', $raw) ?? $raw;

        if (preg_match('/[;|&$`<>\n\r\t\\\\"\']/', $raw)) {
            return SupportJson::fail('artisan_plan', ['raw' => $raw], 'shell_metacharacters_rejected');
        }

        $tokens = array_values(array_filter(explode(' ', $raw), fn ($t) => $t !== ''));
        if ($tokens === []) {
            return SupportJson::fail('artisan_plan', [], 'empty_raw_command');
        }

        $subcommand = strtolower($tokens[0]);
        if (!preg_match('/^[a-z][a-z0-9:_-]*$/', $subcommand)) {
            return SupportJson::fail('artisan_plan', ['raw' => $raw], 'invalid_subcommand');
        }

        foreach ((array) config('support_ai.artisan.denylist', []) as $denied) {
            $denied = strtolower((string) $denied);
            if ($subcommand === $denied || Str::startsWith($subcommand, $denied)) {
                return SupportJson::fail('artisan_plan', ['raw' => $raw], 'denylisted_command:'.$subcommand);
            }
        }

        return SupportJson::ok('artisan_plan', ['raw' => $raw], [
            'mode' => 'raw',
            'command' => $subcommand,
            'tokens' => $tokens,
            // Raw commands are treated as writes and are never auto-simulated.
            'is_write' => true,
            'supports_dry_run' => false,
            'display' => $this->display($tokens),
        ]);
    }

    /**
     * Produce the dry-run preview for a plan.
     *
     * @param  array<string, mixed>  $plan
     * @return array<string, mixed> SupportJson envelope.
     */
    public function dryRun(array $plan): array
    {
        $tokens = (array) ($plan['tokens'] ?? []);
        $input = ['command' => $plan['display'] ?? $this->display($tokens)];

        // Raw commands cannot be safely simulated — present the exact command only.
        if (($plan['mode'] ?? '') === 'raw') {
            return SupportJson::ok('artisan_dry_run', $input, [
                'executed' => false,
                'command' => $plan['display'] ?? $this->display($tokens),
                'note' => 'Raw command cannot be simulated. The exact command above will run on APPROVE.',
            ]);
        }

        // Write commands: append --dry-run. Read-only commands: safe to run as-is.
        $runTokens = $tokens;
        if (($plan['is_write'] ?? false) && ($plan['supports_dry_run'] ?? false)) {
            $runTokens[] = '--dry-run';
        }

        $result = $this->runArtisan($runTokens);

        return SupportJson::ok('artisan_dry_run', $input, [
            'executed' => true,
            'command' => $this->display($runTokens),
            'exit_code' => $result['exit_code'],
            'output' => $result['output'],
        ]);
    }

    /**
     * Execute the plan for real (post-APPROVE).
     *
     * @param  array<string, mixed>  $plan
     * @return array<string, mixed> SupportJson envelope.
     */
    public function execute(array $plan): array
    {
        if (!$this->enabled()) {
            return SupportJson::fail('artisan_execute', [], 'artisan_actions_disabled');
        }

        $tokens = (array) ($plan['tokens'] ?? []);
        if ($tokens === []) {
            return SupportJson::fail('artisan_execute', [], 'empty_plan');
        }

        $result = $this->runArtisan($tokens);
        $input = ['command' => $this->display($tokens)];

        if ($result['exit_code'] !== 0) {
            $envelope = SupportJson::fail('artisan_execute', $input, 'exit_code_'.$result['exit_code']);
            $envelope['result'] = [
                'command' => $this->display($tokens),
                'exit_code' => $result['exit_code'],
                'output' => $result['output'],
            ];

            return $envelope;
        }

        return SupportJson::ok('artisan_execute', $input, [
            'command' => $this->display($tokens),
            'exit_code' => $result['exit_code'],
            'output' => $result['output'],
        ]);
    }

    /**
     * @param  list<string>  $tokens
     * @return array{exit_code: int, output: string}
     */
    private function runArtisan(array $tokens): array
    {
        $php = (string) config('support_ai.artisan.php_binary', PHP_BINARY);
        $argv = array_merge([$php, base_path('artisan')], array_values($tokens));

        $result = Process::timeout((int) config('support_ai.artisan.timeout_seconds', 120))
            ->path(base_path())
            ->run($argv);

        $output = trim($result->output()."\n".$result->errorOutput());
        $limit = (int) config('support_ai.artisan.output_limit', 8000);
        if (mb_strlen($output) > $limit) {
            $output = mb_substr($output, 0, $limit)."\n…(truncated)";
        }

        return ['exit_code' => $result->exitCode() ?? 1, 'output' => $output];
    }

    /**
     * @param  list<string>  $tokens
     */
    private function display(array $tokens): string
    {
        return 'php artisan '.implode(' ', $tokens);
    }
}
