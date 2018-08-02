<!DOCTYPE html>
<html dir="ltr" lang="en" class="no-js" >
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">




    <link href="{{asset('css/cookiecuttr.css')}}" media="screen" rel="stylesheet" />

        <link rel="stylesheet" href="{{asset('css/ext/cache.css')}}" type="text/css" />


    <!-- Theme stylesheets -->
    <link rel="stylesheet" href="{{asset('css/ext/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/ext/dark.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/font-icons.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{asset('css/ext/responsive.css')}}" type="text/css" />




    <link rel="stylesheet" href="{{asset('css/ext/colors.css')}}" type="text/css" />



    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

    <link href="{{asset('css/custom.css') }}" media="screen" rel="stylesheet" />



    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css" />



    <!-- Custom style -->
    <link href="{{asset('css/map.css')}}" rel="stylesheet" type="text/css">

    @yield('extra-css')


    <script>
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check(),
            'url' => url('/')
        ]) !!};


    </script>

    <!-- Title, keywords, description -->
    <meta name="description" content="October 15 - 23, 2016: a week to celebrate coding in Europe, encouraging citizens to learn more about technology, and connecting communities and organizations who can help you learn coding." />
    <meta property="og:image" content="/img/codeweekEU-logo-600.png" />

    <title>Europe Code Week</title>


</head>


<body>

<!-- Document Wrapper -->
<div id="app">

    @include('layout.top_navigation')


    @yield("content")

    <flash message="{{ session('flash') }}"></flash>

</div>
@include('layout.footer')


<!-- Scripts -->

<script src="{{asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{ asset('lib/jquery/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ext/plugins.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ext/functions.js') }}"></script>



<script src="https://unpkg.com/vue-select@latest"></script>



@stack('scripts')

@yield('extra-js')





</body>
</html>
