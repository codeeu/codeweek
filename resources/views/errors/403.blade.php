@extends('layout.base')

@section('content')

    <section id="codeweek-error-page" class="codeweek-page">

        <section class="codeweek-banner error">
            <div class="text">
                <h2>#EUCodeWeek</h2>
                <h1>Error!</h1>
            </div>
            <div class="image">
                <img src="{{asset('images/robot_error.svg')}}" class="static-image">
            </div>
        </section>

        <section class="codeweek-content-wrapper" style="align-items: center;">

            @if($exception->getMessage())
                <h1>{!! $exception->getMessage() !!}</h1>
            @else
                <h1>You are not authorized to perform this action!</h1>
            @endif

            <a href="/" class="codeweek-action-link-button" style="width: 200px;margin-top: 15px;">GO TO HOMEPAGE</a>

        </section>

    </section>

@endsection
