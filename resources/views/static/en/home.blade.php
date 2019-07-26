@extends('layout.base')

@section('content')
    <section id="content">
        <section id="main-banner">
            <div class="what">
                <div class="separator"></div>
                <div class="text">EU Code Week is a grassroots initiative which aims to bring coding and digital literacy to everybody in a fun and engaging way…</div>
            </div>
            <div class="info">
                <div class="countdown"><img src="/images/countdown.svg" alt="Countdown" class="static-image"></div>
                <div class="when">
                    <div class="title">#CodeWeek</div>
                    <div class="date">5-20 October 2019</div>
                    <div class="text">Learning to code helps us make sense of the rapidly changing world around us. Join millions of fellow organisers and participants to inspire the development of coding and computational thinking skills in order to explore new ideas and innovate for the future.</div>
                    <div class="arrow"><img src="/images/arrow_down.svg"></div>
                </div>
            </div>
        </section>
        <section id="school-banner">
            <div class="title">
                Get involved!
            </div>
            <div class="text">
                Are you a teacher?
            </div>
            <div class="text">
                Find out how to get involved!
            </div>
        </section>
        <section class="sub-section" id="organize-activity">
            <div class="text">Anyone is welcome to organise or join  an activity. Just pick a topic and a target audience and add your activity to the map, or browse for events in your area.</div>
            <img src="/images/organize_your_activity.svg" class="static-image">
            <div class="title">Organise or join an activity</div>
        </section>
        <div class="mobile-arrow"><img src="/images/arrow_down.svg"></div>
        <section class="sub-section" id="get-started">
            <div class="text">Not sure how to get started? Take a look at the how-to page, and download our toolkits for organisers to get prepared and spread the word.</div>
            <img src="/images/get_started.svg" class="static-image">
            <div class="title">Get started</div>
        </section>
        <div class="mobile-arrow"><img src="/images/arrow_down.svg"></div>
        <section class="sub-section" id="access-resources">
            <div class="text">If you are not sure how to organise an activity, visit our teaching resources page and learning bits training materials for guidance and tailored lesson plans.</div>
            <img src="/images/access_resources.svg" class="static-image">
            <div class="title">Access resources and training</div>
        </section>
        <div class="mobile-arrow"><img src="/images/arrow_down.svg"></div>
    </section>
@endsection

@push('scripts')
    @include('static.countdown')
@endpush
