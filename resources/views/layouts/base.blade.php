<!DOCTYPE html>
<html dir="ltr" lang="en" class="no-js" >
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
{{--<link rel="shortcut icon" href="{{asset("img/favicon.ico" }}" type="image/x-icon">--}}
{{--<link rel="icon" href="{{asset("img/favicon.ico" }}" type="image/x-icon">--}}

<!-- Custom font -->
{{--<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />--}}

<!-- Stylesheets -->

    <link href="{{asset('css/cookiecuttr.css')}}" media="screen" rel="stylesheet" />

        <link rel="stylesheet" href="{{asset('css/ext/cache.css')}}" type="text/css" />


    <!-- Theme stylesheets -->
    <link rel="stylesheet" href="{{asset('css/ext/style.css')}}" type="text/css" />
    {{--<link rel="stylesheet" href="http://codeweekeu.s3.amazonaws.com/assets/stylesheets/style.css" type="text/css" />--}}

    <link rel="stylesheet" href="{{asset('css/ext/dark.css')}}" type="text/css" />
    {{--<link rel="stylesheet" href="http://codeweekeu.s3.amazonaws.com/assets/stylesheets/dark.css" type="text/css" />--}}
    <link rel="stylesheet" href="{{asset('css/font-icons.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{asset('css/ext/responsive.css')}}" type="text/css" />


    {{--<link rel="stylesheet" href="http://codeweekeu.s3.amazonaws.com/assets/stylesheets/responsive.css" type="text/css" />--}}
{{--    <link rel="stylesheet" href="{{ settings.THEME_ASSETS_BASE_URL }}stylesheets/customizations.css" type="text/css" />--}}
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{asset('css/ext/colors.css')}}" type="text/css" />
    {{--<link rel="stylesheet" href="http://codeweekeu.s3.amazonaws.com/assets/stylesheets/colors.css" type="text/css" />--}}

<!-- TODO: remove font-awesome? -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

    <link href="{{asset('css/custom.css') }}" media="screen" rel="stylesheet" />

    @yield('extra-css')

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <!-- Title, keywords, description -->
    <meta name="description" content="October 15 - 23, 2016: a week to celebrate coding in Europe, encouraging citizens to learn more about technology, and connecting communities and organizations who can help you learn coding." />
    <meta property="og:image" content="/img/codeweekEU-logo-600.png" />

    <title>Europe Code Week</title>


</head>


<body class="stretched no-transition">

<!-- Document Wrapper -->
<div id="wrapper" class="clearfix">

    @include('layout.top_navigation')

    {{--{% block messages }}--}}
    {{--{% include 'layout/messages.html' }}--}}
    {{--{% endblock messages }}--}}

    @yield("content")
    {{--{% block content }} {% endblock content }}--}}

</div>
@include('layout.footer')


<!-- Scripts -->
<script type="text/javascript" src="{{ asset('lib/jquery/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ext/plugins.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ext/functions.js') }}"></script>

<!-- joseihf: Dropdown doesn´t works
<script type="text/javascript" src="{{asset('lib/bootstrap-sass/javascripts/bootstrap/dropdown.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/bootstrap-sass/javascripts/bootstrap/collapse.js')}}"></script>
-->
<script type="text/javascript" src="{{asset('js/jquery.cookie.js') }}"></script>
<script type="text/javascript" src="{{asset('js/jquery.cookiecuttr.js') }}"></script>
<script type="text/javascript" src="{{asset('js/base.js') }}"></script>
<script type="text/javascript">
        //Codeweek.Base.init();
</script>
<script src="{{asset('js/app.js')}}"></script>

@yield('extra-js')





</body>
</html>
