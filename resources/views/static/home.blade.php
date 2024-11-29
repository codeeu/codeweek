@extends('layout.base')

@section('content')
    <section id="codeweek-homepage" class="codeweek-page">
        <section class="relative" id="main-banner">
            <img src="/images/bubbles1.png" class="absolute top-0 right-0 static-image">
            <div class="what">
                <div class="separator"></div>
                <div class="text">@lang('home.about')</div>
            </div>
            <div class="info">
                <div class="countdown">
                    <div id="countdown">
                    </div>
                    <img src="/images/xmas.svg" class="static-image max-h-[422px]">
                </div>
                <div class="when">
                    <div class="title">Coding@Christmas</div>
                    <div class="date">@lang('home.when')</div> 
                    <div class="text">@lang('home.xmas_text')</div>
                   <!-- <div class="arrow"><img src="/images/arrow_down.svg"></div>-->
                   <a href="/blog/codingchristmas-2024/" class="mt-4 self-start px-6 text-base font-bold text-white uppercase bg-secondary hover:bg-blue-primary leading-truly-normal rounded-lg min-h-[38px] lg:max-w-[168px] flex items-center justify-center max-tablet:px-5 max-tablet:w-full max-tablet:max-w-full max-lg:text-center max-tablet:mx-auto" role="button">
                    Get involved!
                    </a>
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
