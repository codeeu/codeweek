<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="zxx">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="index,follow">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Listing Hub - Listing & Directory Template | ThemezHub</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}" type="text/css"/>

    <!-- Bootstrap Select Option css -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap-select.min.css')}}" type="text/css"/>

    <!-- Icons -->
    <link href="{{asset('plugins/font-awesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('plugins/themify-icons/css/themify-icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('plugins/line-icons/css/line-font.css')}}" rel="stylesheet" type="text/css">

    <!-- Animate -->
    <link href="{{asset('plugins/animate/animate.css')}}" rel="stylesheet" type="text/css">

    <!-- Bootsnav -->
    <link href="{{asset('plugins/bootstrap/css/bootsnav.css')}}" rel="stylesheet" type="text/css">

    <!-- Slick Slider -->
    <link href="{{asset('plugins/slick-slider/slick.css')}}" rel="stylesheet" type="text/css">


    <!-- Custom style -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/responsiveness.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/colors/amber.css')}}" rel="stylesheet" type="text/css">

    <script>
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check()
        ]) !!};
    </script>

    @stack('css')

</head>
<body>
<div class="wrapper" id="app">
    <!-- Start Navigation -->

        @include('include.header')

        @yield('content')


    <flash message="{{ session('flash') }}"></flash>




    @include('include.footer')


    @include('include.login')



    <a id="back2Top" class="theme-bg" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

</div>

<script src="{{ asset('js/app.js') }}"></script>

    <!-- START JAVASCRIPT -->
    <!-- Jquery js-->
    <script src="{{asset('js/jquery.min.js')}}"></script>

    <!-- Bootstrap js-->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>


    <!-- Bootsnav js-->
    <script src="{{asset('plugins/bootstrap/js/bootsnav.js')}}"></script>
    <script src="{{asset('js/viewportchecker.js')}}"></script>

    <!-- bootstrap Select js-->
    <script src="{{asset('plugins/bootstrap/js/bootstrap-select.min.js')}}"></script>


    <!-- Slick Slider js-->
    <script src="{{asset('plugins/slick-slider/slick.js')}}"></script>


    <!-- counter js-->
    <script src="{{asset('plugins/jquery-counter/js/waypoints.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-counter/js/jquery.counterup.min.js')}}"></script>




@stack('scripts')


<!-- Custom Js -->
<!-- <script src="{{asset('js/custom.js')}}"></script> -->



</body>
</html>