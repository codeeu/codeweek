<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class ContactFormController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'phone'      => 'nullable|string|max:50',
            'subject'    => 'required|string',
            'message'    => 'required|string',
            'terms'      => 'accepted',
            'cf-turnstile-response' => env('TURNSTILE_SECRET_KEY') ? 'required' : 'nullable',
        ]);

        // Validate Turnstile CAPTCHA if keys are present
        if (env('TURNSTILE_SECRET_KEY')) {
            $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                'secret'   => env('TURNSTILE_SECRET_KEY'),
                'response' => $request->input('cf-turnstile-response'),
                'remoteip' => $request->ip(),
            ]);

            if (!$response->json('success')) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['captcha' => 'CAPTCHA verification failed. Please try again.']);
            }
        }

        Log::info('Contact form submitted', $validated);

        $locale = app()->getLocale();
        $view = "emails.$locale.contact";

        // Fallback to English view if the localized one doesn't exist
        if (!view()->exists($view)) {
            $view = 'emails.en.contact';
        }

        // Use email from .env, fallback to your address if missing
        $recipientEmail = env('CONTACT_FORM_RECIPIENT_EMAIL', 'bernard@matrixinternet.ie');

        Mail::send($view, ['data' => $validated], function ($message) use ($validated, $recipientEmail) {
            $message->to($recipientEmail)
                    ->subject('New Contact Form Submission')
                    ->replyTo($validated['email'], $validated['first_name'] . ' ' . $validated['last_name']);
        });

        return redirect()->back()->with('success', 'Thank you for contacting us.');
    }
}
