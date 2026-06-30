<?php

namespace App\Services\Support;

use Illuminate\Support\Str;

/**
 * Extract a role-change request (operation + role + target emails) from support ticket text.
 *
 * Supports two styles:
 *   1) A labelled block:
 *        Add role: leading teacher
 *        Emails:
 *        a@example.com
 *        b@example.com
 *   2) A pasted table (tab- or multi-space separated), one person per line:
 *        Italy   Antonio Delli   antonio@example.com   add   leading teachers   19-Jun-26
 */
final class SupportRoleRequestParser
{
    /**
     * @return array{operation: string, role: ?string, emails: list<string>}
     */
    public function parse(string $text): array
    {
        $normalized = Str::of($text)->replace("\r\n", "\n")->toString();

        $labelled = $this->parseLabelled($normalized);
        if ($labelled['role'] !== null && $labelled['emails'] !== []) {
            return $labelled;
        }

        $tabular = $this->parseTabular($normalized);
        if ($tabular['role'] !== null && $tabular['emails'] !== []) {
            return $tabular;
        }

        // Fall back to: any explicit role label we found, plus every email in the text.
        $role = $labelled['role'] ?? $tabular['role'];
        $emails = $this->extractAllEmails($normalized);
        $operation = $labelled['operation'] !== 'add' ? $labelled['operation'] : $tabular['operation'];

        return [
            'operation' => $operation,
            'role' => $role,
            'emails' => $emails,
        ];
    }

    /**
     * @return array{operation: string, role: ?string, emails: list<string>}
     */
    private function parseLabelled(string $text): array
    {
        $operation = 'add';
        $role = null;

        if (preg_match('/(?:^|\n)\s*(?:add|grant|assign)\s+role\s*[:\-]\s*([^\n\r]+)/iu', $text, $m)) {
            $role = $this->cleanRole($m[1]);
            $operation = 'add';
        } elseif (preg_match('/(?:^|\n)\s*(?:remove|revoke)\s+role\s*[:\-]\s*([^\n\r]+)/iu', $text, $m)) {
            $role = $this->cleanRole($m[1]);
            $operation = 'remove';
        } elseif (preg_match('/(?:^|\n)\s*role\s*(?:to\s+(add|remove))?\s*[:\-]\s*([^\n\r]+)/iu', $text, $m)) {
            $operation = strtolower(trim($m[1] ?? '')) === 'remove' ? 'remove' : 'add';
            $role = $this->cleanRole($m[2]);
        }

        return [
            'operation' => $operation,
            'role' => $role,
            'emails' => $role !== null ? $this->extractAllEmails($text) : [],
        ];
    }

    /**
     * @return array{operation: string, role: ?string, emails: list<string>}
     */
    private function parseTabular(string $text): array
    {
        $roleCounts = [];
        $operationCounts = [];
        $emails = [];

        foreach (explode("\n", $text) as $line) {
            $email = $this->firstEmail($line);
            if ($email === null) {
                continue;
            }

            $cells = $this->splitColumns($line);
            $opIndex = null;
            foreach ($cells as $i => $cell) {
                $value = strtolower(trim($cell));
                if (in_array($value, ['add', 'grant', 'assign', 'remove', 'revoke'], true)) {
                    $opIndex = $i;
                    $operation = in_array($value, ['remove', 'revoke'], true) ? 'remove' : 'add';
                    $operationCounts[$operation] = ($operationCounts[$operation] ?? 0) + 1;
                    break;
                }
            }

            if ($opIndex !== null) {
                for ($j = $opIndex + 1; $j < count($cells); $j++) {
                    $candidate = $this->cleanRole($cells[$j]);
                    if ($candidate !== null && ! $this->looksLikeDate($candidate)) {
                        $roleCounts[$candidate] = ($roleCounts[$candidate] ?? 0) + 1;
                        break;
                    }
                }
            }

            $emails[] = $email;
        }

        arsort($roleCounts);
        arsort($operationCounts);

        return [
            'operation' => array_key_first($operationCounts) ?: 'add',
            'role' => array_key_first($roleCounts) ?: null,
            'emails' => $this->uniqueEmails($emails),
        ];
    }

    /**
     * @return list<string>
     */
    private function splitColumns(string $line): array
    {
        if (str_contains($line, "\t")) {
            $parts = explode("\t", $line);
        } else {
            $parts = preg_split('/\s{2,}/', trim($line)) ?: [];
        }

        return array_values(array_filter(array_map('trim', $parts), fn ($p) => $p !== ''));
    }

    private function cleanRole(?string $value): ?string
    {
        if ($value === null) {
            return null;
        }

        $value = trim(preg_replace('/\s+/', ' ', $value) ?? '');
        $value = trim($value, " \t.-:");

        if ($value === '' || $this->looksLikeDate($value)) {
            return null;
        }

        if (preg_match('/@/', $value)) {
            return null;
        }

        return $value;
    }

    private function looksLikeDate(string $value): bool
    {
        return (bool) preg_match('/^\d{1,2}[-\/ ][A-Za-z0-9]{2,}[-\/ ]\d{2,4}$/', trim($value))
            || (bool) preg_match('/^\d{4}-\d{2}-\d{2}$/', trim($value));
    }

    private function firstEmail(string $text): ?string
    {
        if (preg_match('/[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}/i', $text, $m)) {
            return strtolower(trim($m[0]));
        }

        return null;
    }

    /**
     * @return list<string>
     */
    private function extractAllEmails(string $text): array
    {
        preg_match_all('/[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}/i', $text, $m);

        return $this->uniqueEmails($m[0] ?? []);
    }

    /**
     * @param  array<int, string>  $emails
     * @return list<string>
     */
    private function uniqueEmails(array $emails): array
    {
        $normalized = array_map(fn ($e) => strtolower(trim($e)), $emails);

        return array_values(array_unique(array_filter($normalized)));
    }
}
