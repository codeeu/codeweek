<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
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
        //        if ($this->shouldReport($exception)) {
        //            $this->sendEmail($exception); // sends an email
        //        }
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
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
