<!DOCTYPE html>
<html dir="ltr" lang="{{App::getLocale()}}" class="no-js" >
<head>
    @include('layout.analytics')
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/img/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css" />
    <link href="{{asset('css/cookiecuttr.css')}}" media="screen" rel="stylesheet" />

    <script>
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check(),
            'url' => url('/')
        ]) !!};
    </script>

    <!-- Title, keywords, description -->
    <meta name="description" content="October 5 - 20, 2019: a week to celebrate coding in Europe, encouraging citizens to learn more about technology, and connecting communities and organizations who can help you learn coding." />


    <title>Europe Code Week</title>


</head>


<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WHDNFHF"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="app">
        @include('layout.header')

        @yield("content")

        <flash message="{{ session('flash') }}"></flash>

        @include('layout.footer')
    </div>


    <!-- Scripts -->
    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    <script src="{{asset('js/app.js')}}"></script>
    <script type="text/javascript" src="{{ asset('lib/jquery/jquery.js') }}"></script>
    <script src=//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js charset=utf-8></script>
    <script type="text/javascript" src="{{ asset('js/ext/plugins.js') }}"></script>
    @include('scripts.countdown')
    <script type="text/javascript" src="{{ asset('js/ext/functions.js') }}"></script>
    <script src="https://unpkg.com/vue-select@latest"></script>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    @stack('scripts')
    <!-- Scripts End-->


</body>
</html>
