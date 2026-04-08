<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SupportServiceToken
{
    public function handle(Request $request, Closure $next)
    {
        $expected = (string) env('SUPPORT_SERVICE_TOKEN', '');
        if ($expected === '') {
            return response()->json([
                'ok' => false,
                'tool' => 'auth',
                'input' => new \stdClass(),
                'result' => new \stdClass(),
                'warnings' => [],
                'errors' => ['SUPPORT_SERVICE_TOKEN_not_configured'],
            ], 500);
        }

        $provided = $this->extractToken($request);

        if (!hash_equals($expected, $provided)) {
            return response()->json([
                'ok' => false,
                'tool' => 'auth',
                'input' => new \stdClass(),
                'result' => new \stdClass(),
                'warnings' => [],
                'errors' => ['unauthorized'],
            ], 401);
        }

        return $next($request);
    }

    private function extractToken(Request $request): string
    {
        $bearer = $request->bearerToken();
        if (is_string($bearer) && $bearer !== '') {
            return $bearer;
        }

        $header = (string) $request->header('X-Support-Service-Token', '');
        if ($header !== '') {
            return $header;
        }

        return '';
    }
}

