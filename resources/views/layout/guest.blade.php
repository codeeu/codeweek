<!DOCTYPE html>
<html dir="ltr" lang="{{App::getLocale()}}" class="no-js">
<head>
    @include('layout.analytics')
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
    <meta name="description"
          content="October 14 - 27, 2024: a week to celebrate coding in Europe, encouraging citizens to learn more about technology, and connecting communities and organizations who can help you learn coding."/>

    @hasSection('title')
        <title>EU Code Week - @yield('title')</title>
    @else
        <title>EU Code Week</title>
    @endif


    @livewireStyles

</head>


<body>


<!-- Document Wrapper -->
<div id="app">

    <main>
        {{ $slot }}
    </main>



    {{--    <flash message="{{ session('flash') }}"></flash>--}}
</div>

<!-- Scripts -->
<script data-cookieconsent="marketing" async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
<script type="text/plain" data-cookieconsent="marketing">
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>


@vite('resources/js/app.js')
<script type="text/javascript" src="{{ asset('lib/jquery/jquery.js') }}"></script>
{{--<script src=//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js charset=utf-8></script>--}}
<script type="text/javascript" src="{{ asset('js/ext/plugins.js') }}"></script>
@include('scripts.countdown')
<script type="text/javascript" src="{{ asset('js/ext/functions.js') }}"></script>

<script src="https://unpkg.com/vue-select@latest"></script>
{{--<script src="https://t003c459d.emailsys2a.net/form/26/4245/574a0c9b7e/popup.js?_g=1663162661" async></script>--}}

@stack('scripts')

@yield('extra-js')

@livewireScripts
</body>
</html>
