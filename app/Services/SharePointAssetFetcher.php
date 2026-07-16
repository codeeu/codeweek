<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Fetch binary assets from SharePoint share links during resource import.
 *
 * Works when links are accessible to the server (e.g. org guest access or anonymous links).
 * If SharePoint returns a login page, import falls back to ZIP/local assets or keeps the URL.
 */
class SharePointAssetFetcher
{
    public function isSharePointUrl(string $url): bool
    {
        return (bool) preg_match('#^https?://[^/]*sharepoint\.com#i', $url);
    }

    public function looksLikePdfUrl(string $url): bool
    {
        return (bool) preg_match('#\.pdf(\?|$)#i', $url);
    }

    public function looksLikeImageUrl(string $url): bool
    {
        return (bool) preg_match('#\.(png|jpe?g|gif|webp)(\?|$)#i', $url);
    }

    public function fetch(string $url): ?string
    {
        try {
            $response = Http::timeout(90)
                ->withOptions(['allow_redirects' => true])
                ->withHeaders([
                    'User-Agent' => 'CodeWeek-Resources-Import/1.0',
                    'Accept' => '*/*',
                ])
                ->get($url);
        } catch (\Throwable $e) {
            Log::warning('[SharePointAssetFetcher] Request failed: '.$e->getMessage(), ['url' => $url]);

            return null;
        }

        if (! $response->successful()) {
            Log::warning('[SharePointAssetFetcher] Non-success response', [
                'url' => $url,
                'status' => $response->status(),
            ]);

            return null;
        }

        $body = $response->body();
        if ($body === '') {
            return null;
        }

        if ($this->isLoginPage($body)) {
            Log::warning('[SharePointAssetFetcher] SharePoint returned a login page', ['url' => $url]);

            return null;
        }

        return $body;
    }

    private function isLoginPage(string $body): bool
    {
        if (str_starts_with($body, '%PDF')) {
            return false;
        }

        $snippet = strtolower(substr($body, 0, 4000));

        return str_contains($snippet, 'sign in to your account')
            || str_contains($snippet, 'login.microsoftonline.com');
    }
}
