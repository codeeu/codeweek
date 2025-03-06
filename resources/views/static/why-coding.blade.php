@extends('layout.base')

@section('title', 'Why Learn to Code? Discover the Benefits with EU Code Week')
@section('description', 'Coding is a key skill for the future! Learn why coding matters and how it fosters problem-solving, creativity, and digital literacy.')

@section('content')

    <section id="codeweek-about-page" class="codeweek-page">

        <section class="codeweek-banner scoreboard">
            <div class="text">
                <h1>@lang('why-coding.titles.0')</h1>
            </div>
            <div class="image">
                <img src="images/banner_scoreboard.svg" class="static-image">
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <div class="codeweek-about-blue-box" style="line-height: 22px;">

                <h3>@lang('why-coding.titles.1')</h3>
                <p>

                    @lang('why-coding.texts.0')
                    <br/><br/>
                    @lang('why-coding.texts.1')
                    <br/><br/>
                    @lang('why-coding.texts.2')
                </p>

                <h3>@lang('why-coding.titles.2')</h3>
                <p>
                    @lang('why-coding.texts.3')
                    <br/><br/>
                    @lang('why-coding.texts.4')
                </p>
                <h1>while(!(succeed = try())))</h1>


                <h3>@lang('why-coding.titles.3')</h3>
                <p>
                    @lang('why-coding.texts.5')
                    <br/><br/>
                    @lang('why-coding.texts.6')<br/>
                <div style="margin-top:-16px; font-style: italic; background-color: rgb(145 204 222);padding:12px; opacity: 90%; border-radius: 10px">
                    <q>@lang('why-coding.texts.7')</q>
                </div>

                <br/>
                @lang('why-coding.texts.8')
                </p>

                <div>
                    @lang('why-coding.texts.9') <a href="{{route('guide')}}">@lang('why-coding.texts.10')</a><br/><br/>
                    @lang('why-coding.texts.11') <a href="https://blog.codeweek.eu">@lang('why-coding.texts.12')</a>
                </div>

            </div>


        </section>


    </section>

@endsection
