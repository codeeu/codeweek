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
                    </div>
                    <img src="/images/countdown.svg" class="static-image">
                </div>
                <div class="when">
                    <div class="mb-4 title test3">#EUCodeWeek</div>
                    <!--<div class="date">@lang('home.when')</div> -->
                    <div class="text">@lang('home.when_text')</div>
                    <div class="arrow"><img src="/images/arrow_down.svg"></div>
                </div>
            </div>
        </section>

        <section id="school-banner">
            <a href="/guide" style="color:inherit">
                <div class="title">
                @lang('home.school_banner_title')
            </div>
            </a>
        </section>

        {{-- Include the Minecraft section here --}}
         <x-minecraft />

        <section class="sub-section" id="organize-activity">

            <div class="text">@lang('home.organize_activity_text')</div>

            <img src="/images/organize_your_activity.svg" class="static-image">
            <a href="{{route('create_event')}}" style="color:inherit">
            <div class="title">@lang('home.organize_activity_title')</div>
            </a>
        </section>
        <div class="mobile-arrow"><img src="/images/arrow_down.svg"></div>
        <section class="sub-section" id="get-started">
            <div class="text">@lang('home.get_started_text')</div>
            <img src="/images/get_started.svg" class="static-image">
            <a href="{{route('guide')}}" style="color:inherit">
            <div class="title">@lang('home.get_started_title')</div>
            </a>
        </section>
        <div class="mobile-arrow"><img src="/images/arrow_down.svg"></div>
        <section class="sub-section" id="access-resources">
            <div class="text">@lang('home.access_resources_text')</div>
            <img src="/images/access_resources.svg" class="static-image">
            <a href="{{route('resources_teach')}}" style="color:inherit">
            <div class="title">@lang('home.access_resources_title')</div>
            </a>
        </section>
        <div class="mobile-arrow"><img src="/images/arrow_down.svg"></div>
{{--        <doris-chatbot environment="codeweek"/>--}}
    </section>
@endsection

@push('scripts')
    {{-- @include('static.chatbot') --}}
    @include('static.countdown')
@endpush
