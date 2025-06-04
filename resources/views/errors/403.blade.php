@extends('layout.base')

@section('content')

    <section id="codeweek-error-page">
        <div class="error-container">
            <div class="error-robot">
                <img src="{{ asset('images/404_robot.svg') }}" alt="Error Robot">
            </div>
            <div class="error-box">
                <h1>Error!</h1>
                <p>User does not have the right roles.</p>
                <a href="/">Go back to homepage</a>
            </div>
        </div>
        <div class="footer-ellipse"></div>
    </section>
@endsection
