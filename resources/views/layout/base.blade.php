<!DOCTYPE html>
<html dir="ltr" lang="{{App::getLocale()}}" class="no-js">
<head>
@if(!isset(Request::header()["dnt"]))
    @if (Cookie::get('codeweek_cookie_consent') == 1)
        @include('layout.analytics')
    @endif
@else
    <!-- DO NOT TRACK removed Analytics -->
    @endif
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="/images/favicon.png" type="image/x-icon">


    <link href="{{asset('css/cookiecuttr.css')}}" media="screen" rel="stylesheet"/>
    <link href="{{asset('css/fonts.css')}}" media="screen" rel="stylesheet"/>

    <!-- No index -->
    <meta name="robots" content="noindex">

    @stack('extra-css')

    @yield('extra-css')


{{--    @vite('resources/css/app.css')--}}
    @vite(['resources/assets/sass/app.scss', 'resources/js/app.js'])
{{--    @vite(['resources/css/app.css', 'resources/js/app.js'])--}}






    <script>
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check(),
            'url' => url('/')
        ]) !!};


    </script>



    <!-- Title, keywords, description -->

    @hasSection('description')
        <meta name="description"
              content="@yield('description')"/>
    @else
        <meta name="description"
              content="October 14 - 27, 2024: a week to celebrate coding in Europe, encouraging citizens to learn more about technology, and connecting communities and organizations who can help you learn coding."/>
    @endif

    @hasSection('title')
        <title>@yield('title')</title>
    @else
        <title>EU Code Week</title>
    @endif

    <!-- Start - Cookie Bot -->
    <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="719385d2-f5d2-4806-8352-72e5ebe53996" data-blockingmode="auto" type="text/javascript"></script>
    <!-- End - Cookie Bot -->

</head>


<body>

<!-- Document Wrapper -->
<div id="app">

    @if((Request::is('hackathons/*')))
        @yield('hackathons.header')
    @else
        @include('layout.menu')
    @endif

    <main>

        @yield("content")
    </main>

    @include('layout.footer')

{{--    <flash message="{{ session('flash') }}"></flash>--}}
</div>

<!-- Scripts -->
@if(!isset(Request::header()["dnt"]))
    @if (Cookie::get('codeweek_cookie_consent') == 1)
        <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

    @endif
@endif


@vite('resources/js/app.js')
<script type="text/javascript" src="{{ asset('lib/jquery/jquery.js') }}"></script>
{{--<script src=//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js charset=utf-8></script>--}}
<script type="text/javascript" src="{{ asset('js/ext/plugins.js') }}"></script>
@include('scripts.countdown')
<script type="text/javascript" src="{{ asset('js/ext/functions.js') }}"></script>
@livewireScripts
<script src="https://unpkg.com/vue-select@latest"></script>
{{--<script src="https://t003c459d.emailsys2a.net/form/26/4245/574a0c9b7e/popup.js?_g=1663162661" async></script>--}}

@stack('scripts')

@yield('extra-js')

    {{-- Hot fix --}}
    <script type="text/javascript">
      if (window.Livewire && window.Livewire.all().length == 0) {
        window.Livewire.start();
      }
    </script>
</body>
</html>
