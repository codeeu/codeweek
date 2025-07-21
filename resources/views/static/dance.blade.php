@extends('layout.new_base')

@section('title', 'EU Code Week: Code Your Own Dance Moves')
@section('description', 'Learn coding through music and movement! Join the EU Code Week Dance Challenge and code your own dance.')

@php
    $list = [
        (object) ['label' => 'Dance', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')
    <section id="codeweek-dance-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-orange-gradient pt-32 pb-0 md:py-20">
                <div class="w-full overflow-hidden pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex flex-col md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-28">
                        <div class="order-1 flex-1 px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                                @lang('cw2020.title.0')
                            </h2>
                            <p class="text-xl font-normal md:text-2xl leading-8 text-[#333E48] p-0 max-md:max-w-full max-w-[525px]">
                                @lang('cw2020.dance.title')
                            </p>
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
                <p class="text-dark-blue font-['Montserrat'] font-medium text-[22px] leading-7 md:text-4xl p-0 mb-6">@lang('cw2020.dance.title')</p>
                <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-6">@lang('snippets.dance.subtitle')</p>

                <p class="font-semibold text-2xl p-0 mb-2">
                    @lang('cw2020.dance.section1.title')
                </p>
                <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                    @lang('snippets.dance.content')
                </p>

                <p class="font-semibold text-2xl p-0 mb-2">
                    @lang('cw2020.dance.section2.title')
                </p>
                <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                    @lang('cw2020.dance.section2.content').
                </p>
                <div class="pl-4">
                    <p class="font-semibold p-0 mb-2 text-lg md:text-[1.35rem]">
                        1. @lang('cw2020.dance.activity1.title')
                    </p>
                    <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                        @lang('cw2020.dance.activity1.subtitle').
                    </p>
                    <p class="font-semibold p-0 mb-2 text-lg md:text-xl">
                        @lang('cw2020.common.resources'):
                    </p>
                    <ul class="list-[circle] m-0 ml-4 pl-2 mb-3">
                        @include("static._cw2020-common")
                        <li class="font-normal text-default md:text-xl p-0 text-slate-500"><a class="text-dark-blue" href="https://curriculum.code.org/hoc/unplugged/4/#dance-party-unplugged4">@lang('cw2020.dance.activity1.resources.0')</a></li>
                        <li class="font-normal text-default md:text-xl p-0 text-slate-500"><a class="text-dark-blue" href="{{route("training.module-1")}}">@lang('cw2020.dance.activity1.resources.1')</a></li>
                    </ul>

                    <p class="font-semibold p-0 mb-2 text-lg md:text-[1.35rem]">
                        2. @lang('cw2020.dance.activity2.title')
                    </p>
                    <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                        @lang('cw2020.dance.activity2.subtitle') <a class="text-dark-blue" href="https://scratch.mit.edu/studios/27581197/">@lang('cw2020.dance.activity2.resources.4')</a>
                    </p>
                    <p class="font-semibold p-0 mb-2 text-lg md:text-xl">
                        @lang('cw2020.common.resources'):
                    </p>
                    <ul class="list-[circle] m-0 ml-4 pl-2 mb-3">
                        @include("static._cw2020-common")
                        <li class="font-normal text-default md:text-xl p-0 text-slate-500"><a class="text-dark-blue" href="https://scratch.mit.edu/projects/428131435">@lang('cw2020.dance.activity2.resources.0')</a></li>
                        <li class="font-normal text-default md:text-xl p-0 text-slate-500"><a class="text-dark-blue" href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/cw2020/finaldancecharacters.rar">@lang('cw2020.dance.activity2.resources.1')</a></li>
                        <li class="font-normal text-default md:text-xl p-0 text-slate-500"><a class="text-dark-blue" href="https://sip.scratch.mit.edu/guides/animation/">@lang('cw2020.dance.activity2.resources.2')</a></li>
                        <li class="font-normal text-default md:text-xl p-0 text-slate-500"><a class="text-dark-blue" href="https://curriculum.code.org/hoc/plugged/8/">@lang('cw2020.dance.activity2.resources.3')</a></li>
                    </ul>

                    <p class="font-semibold p-0 mb-2 text-lg md:text-[1.35rem]">
                        3. @lang('cw2020.dance.activity3.title')
                    </p>
                    <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                        @lang('cw2020.dance.activity3.subtitle').
                    </p>
                    <p class="font-semibold p-0 mb-2 text-lg md:text-xl">
                        @lang('cw2020.common.resources'):
                    </p>
                    <ul class="list-[circle] m-0 ml-4 pl-2 mb-3">
                        @include("static._cw2020-common")
                        <li class="font-normal text-default md:text-xl p-0 text-slate-500"><a class="text-dark-blue" href="https://www.youtube.com/watch?v=5ThWr3stq9M&feature=youtu.be">@lang('cw2020.dance.activity3.resources.0')</a></li>
                        <li class="font-normal text-default md:text-xl p-0 text-slate-500"><a class="text-dark-blue" href="https://sonic-pi.net/tutorial.html">@lang('cw2020.dance.activity3.resources.1')</a></li>
                    </ul>

                    <p class="font-semibold p-0 mb-2 text-lg md:text-[1.35rem]">
                        4. @lang('cw2020.dance.activity4.title')
                    </p>
                    <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                        @lang('cw2020.dance.activity4.subtitle').
                    </p>
                    <p class="font-semibold p-0 mb-2 text-lg md:text-xl">
                        @lang('cw2020.common.resources'):
                    </p>
                    <ul class="list-[circle] m-0 ml-4 pl-2 mb-3">
                        @include("static._cw2020-common")
                    </ul>
                </div>
                <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-8">
                    @lang('cw2020.dance.outro.1') <a class="text-dark-blue" href="https://digit.srl/ode-to-code/">@lang('cw2020.dance.outro.2')</a>,
                    @lang('cw2020.dance.outro.3').
                </p>

                <p class="text-dark-blue font-['Montserrat'] font-medium text-[22px] leading-7 md:text-4xl p-0 mb-6">@lang('cw2020.get-involved.title')</p>
                <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-6">@lang('cw2020.get-involved.subtitle').</p>
                <ul class="list-[circle] m-0 ml-4 pl-2 mb-3">
                    <li class="font-normal text-default md:text-xl p-0 text-slate-500"><a class="text-dark-blue" href="https://blog.codeweek.eu/getting-started-with-eu-code-week/">@lang('cw2020.get-involved.content.0')</a></li>
                    <li class="font-normal text-default md:text-xl p-0 text-slate-500"><a class="text-dark-blue" href="{{route("guide")}}">@lang('cw2020.get-involved.content.1')</a></li>
                    <li class="font-normal text-default md:text-xl p-0 text-slate-500"><a class="text-dark-blue" href="{{route("training.index")}}">@lang('cw2020.get-involved.content.2')</a></li>
                    <li class="font-normal text-default md:text-xl p-0 text-slate-500"><a class="text-dark-blue" href="https://bit.ly/DEEPDIVE2020">@lang('cw2020.get-involved.content.3')</a></li>
                    <li class="font-normal text-default md:text-xl p-0 text-slate-500"><a class="text-dark-blue" href="{{route("coding@home")}}">@lang('cw2020.get-involved.content.4')</a></li>
                </ul>
            </div>
        </section>
    </section>
@endsection
