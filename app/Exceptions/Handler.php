<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\ErrorHandler\ErrorRenderer\HtmlErrorRenderer;
use Symfony\Component\ErrorHandler\Exception\FlattenException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        $request = request();
        if ($request && $this->isNovaRequest($request)) {
            Log::error('Nova request failed: ' . $exception->getMessage(), [
                'path' => $request->path(),
                'method' => $request->method(),
                'exception' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ]);
        }
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * When NOVA_SHOW_ERRORS=true (e.g. on live for debugging), Nova API errors
     * return JSON with the real exception message. Check the failed request in
     * DevTools → Network → Response to see "error", "file", "line".
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Throwable $exception)
    {
        if ($request && $this->isNovaRequest($request) && env('NOVA_SHOW_ERRORS', false)) {
            return response()->json([
                'message' => 'There was a problem submitting the form.',
                'error' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
            ], 500);
        }

        return parent::render($request, $exception);
    }

    private function isNovaRequest(Request $request): bool
    {
        $path = $request->path();
        return str_starts_with($path, 'nova/') || str_starts_with($path, 'nova-api/');
    }

    /**
     * Sends an email to the developer about the exception.
     *
     * @return void
     */
    public function sendEmail(Throwable $exception)
    {
        try {
            $e = FlattenException::create($exception);
            $handler = new HtmlErrorRenderer(true); // boolean, true raises debug flag...
            $css = $handler->getStylesheet();
            $content = $handler->getBody($e);

            Mail::send('emails.en.exception', compact('css', 'content'), function ($message) {
                $message
                    ->to(config('codeweek.administrator'))
                    ->subject('Exception on Codeweek');
            });
        } catch (Throwable $ex) {
            Log::error($ex);
        }
    }
}
