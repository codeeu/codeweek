@extends('layout.base')

@section('content')

    <section id="codeweek-privacy-page" class="codeweek-page">
        <section class="codeweek-content-wrapper cookies" style="margin-top: 0;">
            <h1 style="margin-bottom:10px;">@lang('cookie_policy.title')</h1>
             <!-- Cookie Declaration Script -->
             <script id="CookieDeclaration" 
                    src="https://consent.cookiebot.com/719385d2-f5d2-4806-8352-72e5ebe53996/cd.js" 
                    type="text/javascript" 
                    async>
            </script>
        </section>
    </section>

@endsection

