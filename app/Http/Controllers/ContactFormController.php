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
        // Honeypot field: bot filled
        if ($request->filled('website')) {
            Log::warning('Spam detected: honeypot field filled', ['ip' => $request->ip()]);
            abort(403, 'Spam detected.');
        }

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

        // Verify CAPTCHA via Cloudflare Turnstile
        if (env('TURNSTILE_SECRET_KEY')) {
            $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                'secret'   => env('TURNSTILE_SECRET_KEY'),
                'response' => $request->input('cf-turnstile-response'),
                'remoteip' => $request->ip(),
            ]);

            if (!$response->json('success')) {
                return back()
                    ->withInput()
                    ->withErrors(['captcha' => 'CAPTCHA verification failed. Please try again.']);
            }
        }

        Log::info('Contact form submitted', [
            'ip' => $request->ip(),
            'name' => $validated['first_name'] . ' ' . $validated['last_name'],
            'email' => $validated['email'],
        ]);

        $locale = app()->getLocale();
        $view = view()->exists("emails.$locale.contact") ? "emails.$locale.contact" : 'emails.en.contact';

        Mail::send($view, ['data' => $validated], function ($message) use ($validated) {
            $message->to(env('CONTACT_FORM_RECIPIENT_EMAIL', 'bernard@matrixinternet.ie'))
                    ->subject('New Contact Form Submission')
                    ->replyTo($validated['email'], $validated['first_name'] . ' ' . $validated['last_name']);
        });

        return back()->with('success', 'Thank you for contacting us.');
    }
}
