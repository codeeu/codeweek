@extends('layout.base')

@section('title', 'EU Code Week Cookie Policy – Manage Your Preferences')
@section('description', 'Learn how EU Code Week uses cookies to enhance your browsing experience and how you can manage your preferences.')

@section('content')

    <section id="codeweek-privacy-page" class="codeweek-page">
        <section class="codeweek-content-wrapper cookies" style="margin-top: 0;">
            <h1 style="margin-bottom:10px;">@lang('cookie_policy.title')</h1>
            
            <!-- Cookie Declaration Container -->
            <div id="cookie-declaration-container"></div>

        </section>
    </section>

@endsection

@push('scripts')
    <script>
        // Wait for the DOM to fully load
        document.addEventListener('DOMContentLoaded', function () {
            // Select the target container
            const container = document.getElementById('cookie-declaration-container');

            // Create the script element
            const script = document.createElement('script');
            script.id = 'CookieDeclaration';
            script.src = 'https://consent.cookiebot.com/719385d2-f5d2-4806-8352-72e5ebe53996/cd.js';
            script.type = 'text/javascript';
            script.async = true;

            // Append the script to the target container
            container.appendChild(script);
        });
    </script>
@endpush
