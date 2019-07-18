@extends('layout.base')

@section('content')
    <section id="content">
        <section id="main-banner">
            <div class="what">
                <div class="separator"></div>
                <div class="text">EU Code Week is a grassroots initiative which aims to bring coding and digital literacy to everybody in a fun and engaging way…</div>
            </div>
            <div class="info">
                <div class="when">
                    <div class="title">#CodeWeek</div>
                    <div class="date">5-20 October 2019</div>
                    <div class="text">Learning to code helps us make sense of the rapidly changing world around us. Join millions of fellow organisers and participants to inspire the development of coding and computational thinking skills in order to explore new ideas and innovate for the future.</div>
                    <div class="arrow"><img src="/images/arrow_down.svg"></div>
                </div>
                <div class="countdown"><img src="/images/countdown.svg" alt="Countdown" class="static-image"></div>
            </div>
        </section>
    </section>
@endsection

@push('scripts')
    @include('static.countdown')
@endpush

@section("extra-css")
    <style>
        .section-intro, .section-banner {

            background: transparent;

        }
    </style>
@endsection

