<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

namespace App\Http\Middleware;

use Closure;

class ReplaceOldS3Urls
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($response instanceof \Illuminate\Http\Response && str_contains($response->headers->get('Content-Type'), 'text/html')) {
            $content = $response->getContent();
            $content = str_replace(
                'https://s3-eu-west-1.amazonaws.com/codeweek-s3/',
                'https://codeweek-s3.s3.eu-west-1.amazonaws.com/',
                $content
            );
            $response->setContent($content);
        }

        return $response;
    }
}