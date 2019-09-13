@extends('layout.base')

@section('content')
    <section id="codeweek-homepage" class="codeweek-page">
        <section id="main-banner">
            <div class="what">
                <div class="separator"></div>
                <div class="text">@lang('home.about')</div>
            </div>
            <div class="info">
                <div class="countdown">
                    <div id="countdown">
                        <div class="day">39</div>
                        <div class="separator">:</div>
                        <div class="hours">13</div>
                        <div class="separator">:</div>
                        <div class="minutes">44</div>
                        <div class="separator">:</div>
                        <div class="seconds">01</div>
                    </div>
                    <img src="/images/countdown.svg" class="static-image">
                </div>
                <div class="when">
                    <div class="title">#CodeWeek</div>
                    <div class="date">@lang('home.when')</div>
                    <div class="text">@lang('home.when_text')</div>
                    <div class="arrow"><img src="/images/arrow_down.svg"></div>
                </div>
            </div>
        </section>
        <section id="school-banner">
            <div class="title">
                @lang('home.school_banner_title')
            </div>
            <div class="text">
                @lang('home.school_banner_text')
            </div>
            <div class="text">
                <a href="/schools">@lang('home.school_banner_text2')</a>
            </div>
        </section>
        <section class="sub-section" id="organize-activity">
            <div class="text">@lang('home.organize_activity_text')</div>
            <img src="/images/organize_your_activity.svg" class="static-image">
            <div class="title">@lang('home.organize_activity_title')</div>
        </section>
        <div class="mobile-arrow"><img src="/images/arrow_down.svg"></div>
        <section class="sub-section" id="get-started">
            <div class="text">@lang('home.get_started_text')</div>
            <img src="/images/get_started.svg" class="static-image">
            <div class="title">@lang('home.get_started_title')</div>
        </section>
        <div class="mobile-arrow"><img src="/images/arrow_down.svg"></div>
        <section class="sub-section" id="access-resources">
            <div class="text">@lang('home.access_resources_text')</div>
            <img src="/images/access_resources.svg" class="static-image">
            <div class="title">@lang('home.access_resources_title')</div>
        </section>
        <div class="mobile-arrow"><img src="/images/arrow_down.svg"></div>
    </section>
@endsection

@push('scripts')
    @include('static.countdown')
@endpush
