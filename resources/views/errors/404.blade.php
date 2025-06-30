@extends('layout.new_base')

@section('content')

    <section id="codeweek-error-page">
        <div class="error-container">
            <div class="error-robot">
                <img src="{{ asset('images/404_robot.svg') }}" alt="Error Robot"  class="desktop-robot">
                <img src="{{ asset('images/404_robot_mobile.svg') }}" alt="Error Robot Mobile" class="mobile-robot">
            </div>
            <div class="error-box">
                <h1>Error!</h1>
                <p>Page not found</p>
                <a href="/">Go back to homepage</a>
            </div>
        </div>
        <div class="footer-ellipse" style="
            background: url('{{ asset('images/cream_ellipse.svg') }}');
            background-position: top center;
            background-repeat: no-repeat;
            background-size: cover;">
        </div>

    </section>
@endsection
