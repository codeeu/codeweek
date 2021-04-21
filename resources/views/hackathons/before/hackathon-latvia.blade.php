@extends('layout.base')

<x-tailwind></x-tailwind>

@section('hackathons.header')
    @include('hackathons.before.header', ["enabled_language" => "lv","registration_link"=>"https://ec.europa.eu/eusurvey/runner/EUCWHackathonLatvia"])
@endsection

@section('content')

    <section id="codeweek-hackathons-before-page" class="codeweek-page latvia">


        <section class="codeweek-banner hackathon">
            <div class="image">
                <div class="text">
                    <div class="text-inside">
                        <h1 style="font-weight: bold;">@lang('hackathons.title')</h1>
                        <h2>@lang('hackathon-latvia.subtitle')</h2>
                    </div>
                </div>
                <div class="paragraph">
                    <p>@lang('hackathon-latvia.sections.1.content.0')<br/>
                </div>
                <img src="/images/hackathons/banner_hackathon_before.svg" class="static-image desktop">
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <p>
                @lang('hackathon-latvia.sections.1.content.1')
                @lang('hackathon-latvia.sections.1.content.2')<br/><br/>
                @lang('hackathon-latvia.sections.1.content.3')


            </p>

        </section>

        <section class="questions">
            <div class="left-wrapper">
                <div class="expect">
{{--                    <h1>@lang('hackathon-latvia.sections.2.title')</h1>--}}
{{--                    <ul>--}}
{{--                        <li>@lang('hackathon-latvia.sections.2.content.0')</li>--}}
{{--                        <li>@lang('hackathon-latvia.sections.2.content.1')</li>--}}
{{--                        <li>@lang('hackathon-latvia.sections.2.content.2')</li>--}}

{{--                    </ul>--}}
                </div>
                <div class="bring">
                    <h1>@lang('hackathon-latvia.sections.2.title')</h1>
                    <ul>
                        <li>@lang('hackathon-latvia.sections.2.content.0')</li>
                        <li>@lang('hackathon-latvia.sections.2.content.1')</li>
                        <li>@lang('hackathon-latvia.sections.2.content.2')</li>
                        <li>@lang('hackathon-latvia.sections.2.content.3')</li>
                        <li>@lang('hackathon-latvia.sections.2.content.4')</li>
                        <li>@lang('hackathon-latvia.sections.2.content.5')</li>
                    </ul>
                </div>
            </div>

        </section>

        <section class="registration">
            <div class="register-wrapper">
                <div class="register">
                    <div class="title">@lang('hackathon-latvia.title')</div>
                    <div class="city">@lang('hackathons.cities.6.country')</div>
                    <div class="date">@lang('hackathons.cities.6.date')</div>
                    <a target="_blank" href="https://ec.europa.eu/eusurvey/runner/EUCWHackathonLatvia"
                       class="codeweek-action-link-button">@lang('login.register')</a>
                </div>
            </div>
        </section>

        <section id="challenge">
            <img src="/images/hackathons/ideation.png" class="desktop">
            <div class="text">
                <div class="challenge-text">
                    <h1>@lang('hackathon-latvia.sections.4.title')</h1>
                    <p>@lang('hackathon-latvia.sections.4.content.0')</p>
                    <div class="button">
                        <a target="_blank" href="https://ec.europa.eu/eusurvey/runner/EUCodeWeek2020_Challenges_Latvia"
                           class="codeweek-action-link-button">@lang('hackathon-latvia.sections.4.content.1')</a>
                    </div>

                </div>
            </div>
        </section>

        <section id="programme" id="pratical-info">
            <h1>@lang('hackathon-latvia.sections.9.title')</h1>

            @lang('hackathon-latvia.sections.9.content.0')<br/>
            @lang('hackathon-latvia.sections.9.content.1')


            <br/><br/>
            <h1>@lang('hackathon-latvia.sections.8.title')</h1>
            @lang('hackathon-latvia.sections.8.content.0')
            <ol>
                <li>@lang('hackathon-latvia.sections.8.content.1')</li>
                <li>@lang('hackathon-latvia.sections.8.content.2')</li>
                <li>@lang('hackathon-latvia.sections.8.content.3')</li>
            </ol>
        <div>
            @lang('hackathon-latvia.sections.8.content.4')<br/><br/>

            @lang('hackathon-latvia.sections.8.content.5')<br/><br/>
            @lang('hackathon-latvia.sections.8.content.6')<br/><br/>
            @lang('hackathon-latvia.sections.8.content.7')<br/><br/>
            @lang('hackathon-latvia.sections.8.content.8')<br/><br/>
        </div>
        </section>


{{--            <div class="conditions-participation">--}}
{{--                <img src="/images/tick.svg" class="static-image">--}}
{{--                <a target="_blank"--}}
{{--                   href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/hackathons/CONDITIONS_PARTICIPATION_CWHACKATHON_IE.pdf">Conditions--}}
{{--                    of Participation</a>--}}
{{--            </div>--}}


{{--        </section>--}}

{{--                <section id="pratical-info">--}}
{{--                    <div class="info">--}}
{{--                        <h1>Practical Info</h1>--}}
{{--                        <div class="info-details">--}}
{{--                            <h3>Date</h3>--}}
{{--                            <p>April 17-18, 2020</p>--}}
{{--                        </div>--}}
{{--                        <div class="info-details">--}}
{{--                            <h3>Address</h3>--}}
{{--                            <p>Dream Space, Microsoft Latvia</p>--}}
{{--                            <p>South Country Business Park, Leopardstown, Dublin 18, D18 P521</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </section>--}}

        <section id="jury-mentors">

            <h1>@lang('hackathon-latvia.sections.10.title')</h1>
            <p>
                @lang('hackathon-latvia.sections.10.content.0')
            </p>
            <div class="jury-grid">
                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/latvia/lina-sarma.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-latvia.sections.mentors.1.0')</h2>
                    <div class="text-sm">@lang('hackathon-latvia.sections.mentors.1.1')</div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/latvia/janis-mozgis.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-latvia.sections.mentors.2.0')</h2>
                    <div class="text-sm">@lang('hackathon-latvia.sections.mentors.2.1')
                        <a href="http://inzpire.me/">Inzpire.me</a>, @lang('hackathon-latvia.sections.mentors.2.2')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/latvia/janis-cimbulis.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-latvia.sections.mentors.3.0')</h2>
                    <div class="text-sm">@lang('hackathon-latvia.sections.mentors.3.1')</div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/latvia/angela.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-latvia.sections.mentors.4.0')</h2>
                    <div class="text-sm">@lang('hackathon-latvia.sections.mentors.4.1')</div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/latvia/elchin.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-latvia.sections.mentors.5.0')</h2>
                    <div class="text-sm">@lang('hackathon-latvia.sections.mentors.5.1')</div>
                </div>



            </div>
        </section>

{{--                <section id="side-events">--}}
{{--                    <div class="left">--}}
{{--                        <h1>@lang('hackathon-latvia.sections.11.title')</h1>--}}
{{--                        <p>@lang('hackathon-latvia.sections.11.content.0')</p>--}}
{{--                        <a href="" class="codeweek-action-link-button">@lang('login.register')</a>--}}
{{--                    </div>--}}
{{--                    <img src="/images/hackathons/side_events.png">--}}
{{--                </section>--}}

        <section id="partners">
            <div>
                <h1>@lang('hackathon-latvia.misc.2')</h1>
            </div>

            <div class="partners-grid">
                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/google.png')}}">
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/microsoft.png')}}">
                    </div>
                </div>



            </div>
        </section>

        <section id="about-codeweek">
            <div class="text">
                <h1>@lang('hackathon-latvia.sections.12.title')</h1>
                <p>@lang('hackathon-latvia.sections.12.content.0') @lang('hackathon-latvia.sections.12.content.1') @lang('hackathon-latvia.sections.12.content.2')</p><br/><br/>
                <p>@lang('hackathon-latvia.sections.12.content.3') <b>@lang('hackathon-latvia.sections.12.content.4')</b> @lang('hackathon-latvia.sections.12.content.5') <b>@lang('hackathon-latvia.sections.12.content.6')</b>
                    @lang('hackathon-latvia.sections.12.content.7') <b>@lang('hackathon-latvia.sections.12.content.8')</b>
                </p><br/><br/>
            </div>
            <img src="/images/hackathons/about_codeweek.svg" class="static-image">
            <a target="_blank" href="https://codeweek.eu/about" class="codeweek-action-link-button">@lang('hackathon-latvia.sections.12.content.9')</a>
        </section>

    </section>

@endsection

