@extends('layout.new_base')

@section('title', 'Remote Teaching Resources for Coding Education')
@section('description', 'Access tools, guides, and best practices to teach coding remotely. Engage students in online learning with EU Code Week’s curated resources.')

@php
    $list = [
        (object) ['label' => 'Remote Teaching', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')

    <section id="codeweek-remote-teaching-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-orange-gradient pt-32 pb-0 md:py-20">
                <div class="w-full overflow-hidden pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex flex-col md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-40">
                        <div class="order-1 flex-1 px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] max-md:max-w-full max-w-[532px]">
                                @lang('remote-teaching.remote-teaching')
                            </h2>
                        </div>
                        <div class="order-0 md:order-2 flex flex-1 justify-center items-center z-10">
                            <img src="images/banner_scoreboard.svg" class="static-image">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="overflow-hidden relative z-10">
            <div class="relative z-10 py-10 md:py-20 codeweek-container-lg">
                <p class="text-dark-blue font-['Montserrat'] font-medium text-[22px] leading-7 md:text-4xl p-0 mb-6">@lang('remote-teaching.intro.title')</p>
                <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-6">@lang('remote-teaching.intro.text')</p>
                <ul class="list-[circle] m-0 ml-4 pl-2 mb-3">
                    <li class="font-normal text-default md:text-xl p-0 text-slate-500 py-1"><a class="text-dark-blue" href="{{route('coding@home')}}">@lang('menu.coding@home')</a>: @lang('remote-teaching.intro.points.1')</li>
                    <li class="font-normal text-default md:text-xl p-0 text-slate-500 py-1"><a class="text-dark-blue" href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/docs/EU+Code+Week_Deep+Dive+MOOC+2020_Module+1_+Actitivities+at+home+.pdf">@lang('remote-teaching.intro.points.2.0')</a>: @lang('remote-teaching.intro.points.2.1')</li>
                    <li class="font-normal text-default md:text-xl p-0 text-slate-500 py-1">
                        <a class="text-dark-blue" href="{{route('training.index')}}">@lang('remote-teaching.intro.points.3.0')</a>: @lang('remote-teaching.intro.points.3.1')

                    </li>
                    <li class="font-normal text-default md:text-xl p-0 text-slate-500 py-1">
                        <a class="text-dark-blue" href="{{route('resources_all')}}">@lang('remote-teaching.intro.points.4.0')</a>:
                        @lang('remote-teaching.intro.points.4.1')


                    </li>
                    <li class="font-normal text-default md:text-xl p-0 text-slate-500 py-1">
                        <a class="text-dark-blue" href="https://www.youtube.com/playlist?list=PLnqp3yQre_1i7U2QKr2mc98pt2WEhA7Ig">@lang('remote-teaching.intro.points.5.0')</a>: @lang('remote-teaching.intro.points.5.1')
                    </li>
                </ul>


                <p class="font-semibold p-0 mt-6 mb-4 text-lg md:text-2xl capitalize">@lang('remote-teaching.tips.title')</p>

                <ol class="list-decimal m-0 ml-4 pl-2">
                    <li class="font-normal text-default md:text-xl p-0 text-slate-500 py-2">
                        <strong>@lang('remote-teaching.tips.points.1.0')</strong>
                        @lang('remote-teaching.tips.points.1.1')
                    </li>
                    <li class="font-normal text-default md:text-xl p-0 text-slate-500 py-2">
                        <strong>@lang('remote-teaching.tips.points.2.0')</strong>
                        @lang('remote-teaching.tips.points.2.1')
                    </li>
                    <li class="font-normal text-default md:text-xl p-0 text-slate-500 py-2">
                        <strong>@lang('remote-teaching.tips.points.3.0')</strong>
                        @lang('remote-teaching.tips.points.3.1')
                    </li>
                    <li class="font-normal text-default md:text-xl p-0 text-slate-500 py-2">
                        <strong>@lang('remote-teaching.tips.points.4.0')</strong>
                        @lang('remote-teaching.tips.points.4.1')
                    </li>

                    <li class="font-normal text-default md:text-xl p-0 text-slate-500 py-2">
                        <strong>@lang('remote-teaching.tips.points.5.0')</strong>
                        @lang('remote-teaching.tips.points.5.1')
                    </li>
                    <li class="font-normal text-default md:text-xl p-0 text-slate-500 py-2">
                        <strong>@lang('remote-teaching.tips.points.6.0')</strong>
                        @lang('remote-teaching.tips.points.6.1')

                    </li>
                    <li class="font-normal text-default md:text-xl p-0 text-slate-500 py-2">
                        <strong>@lang('remote-teaching.tips.points.7.0')</strong>
                        @lang('remote-teaching.tips.points.7.1')
                    </li>
                </ol>
            </div>
        </section>
    </section>
@endsection