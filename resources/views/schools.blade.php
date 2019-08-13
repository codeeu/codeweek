@extends('layout.base')

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">

        <section class="codeweek-banner schools">
            <div class="text">
                <h1>Why</h1>
                <h2>BRING CODEWEEK</h2>
                <h2>TO YOUR STUDENTS</h2>
            </div>
            <div class="image">
                <img src="/images/banner_training.svg" class="static-image">
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            @foreach($questions as $question)
                <question :question="{{json_encode($question)}}"></question>
            @endforeach

        </section>

    </section>

@endsection