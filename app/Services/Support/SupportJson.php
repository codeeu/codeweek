<?php

namespace App\Services\Support;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class SupportJson
{
    public static function ok(string $tool, array $input, array $result, array $warnings = []): array
    {
        return [
            'ok' => true,
            'tool' => $tool,
            'input' => $input,
            'result' => $result,
            'warnings' => array_values($warnings),
            'errors' => [],
        ];
    }

    public static function fail(string $tool, array $input, array|string $errors, array $warnings = []): array
    {
        $errorsArr = is_array($errors) ? $errors : [$errors];

        return [
            'ok' => false,
            'tool' => $tool,
            'input' => $input,
            'result' => new \stdClass(),
            'warnings' => array_values($warnings),
            'errors' => array_values($errorsArr),
        ];
    }

    public static function json(array $payload, int $status = 200): JsonResponse
    {
        return response()->json($payload, $status, [
            'X-Support-Correlation-Id' => self::correlationIdFromPayload($payload),
        ]);
    }

    public static function correlationId(?string $existing = null): string
    {
        return $existing ?: (string) Str::uuid();
    }

    private static function correlationIdFromPayload(array $payload): string
    {
        // Best-effort: callers may also explicitly set this header upstream.
        return (string) ($payload['correlation_id'] ?? '');
    }
}

