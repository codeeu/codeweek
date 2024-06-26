@extends('layout.base')

<x-tailwind></x-tailwind>

@section('hackathons.header')
    @include('hackathons.before.header', ["enabled_language" => "it","registration_link"=>"https://ec.europa.eu/eusurvey/runner/EUCWHackathonItaly"])
@endsection

@section('content')

    <section id="codeweek-hackathons-before-page" class="codeweek-page">


        <section class="codeweek-banner hackathon">
            <div class="image">
                <div class="text">
                    <div class="text-inside">
                        <h1 style="font-weight: bold;">@lang('hackathons.title')</h1>
                        <h2>@lang('hackathon-italy.subtitle')</h2>
                    </div>
                </div>
                <div class="paragraph">
                    <p>@lang('hackathon-italy.sections.1.content.0')<br/>
                </div>
                <img src="/images/hackathons/banner_hackathon_before.svg" class="static-image desktop">
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <p>
                @lang('hackathon-italy.sections.1.content.1')
                @lang('hackathon-italy.sections.1.content.2')<br/><br/>
                @lang('hackathon-italy.sections.1.content.3')


            </p>

        </section>

        <section class="questions">
            <div class="left-wrapper">
                <div class="expect">
                    {{--                    <h1>@lang('hackathon-italy.sections.2.title')</h1>--}}
                    {{--                    <ul>--}}
                    {{--                        <li>@lang('hackathon-italy.sections.2.content.0')</li>--}}
                    {{--                        <li>@lang('hackathon-italy.sections.2.content.1')</li>--}}
                    {{--                        <li>@lang('hackathon-italy.sections.2.content.2')</li>--}}

                    {{--                    </ul>--}}
                </div>
                <div class="bring">
                    <h1>@lang('hackathon-italy.sections.2.title')</h1>
                    <ul>
                        <li>@lang('hackathon-italy.sections.2.content.0')</li>
                        <li>@lang('hackathon-italy.sections.2.content.1')</li>
                        <li>@lang('hackathon-italy.sections.2.content.2')</li>
                        <li>@lang('hackathon-italy.sections.2.content.3')</li>
                        <li>@lang('hackathon-italy.sections.2.content.4')</li>
                        <li>@lang('hackathon-italy.sections.2.content.5')</li>
                    </ul>
                </div>
            </div>

        </section>

        <section class="registration">
            <div class="register-wrapper">
                <div class="register">
                    <div class="title">@lang('hackathon-italy.title')</div>
                    <div class="city">@lang('hackathons.cities.3.country')</div>
                    <div class="date">@lang('hackathons.cities.3.date')</div>
                    <a target="_blank" href="https://ec.europa.eu/eusurvey/runner/EUCWHackathonItaly"
                       class="codeweek-action-link-button">@lang('login.register')</a>
                </div>
            </div>
        </section>

        {{--        <section id="challenge">--}}
        {{--            <img src="/images/hackathons/ideation.png" class="desktop">--}}
        {{--            <div class="text">--}}
        {{--                <div class="challenge-text">--}}
        {{--                    <h1>@lang('hackathon-italy.sections.4.title')</h1>--}}
        {{--                    <p>@lang('hackathon-italy.sections.4.content.0')</p>--}}
        {{--                    <div class="button">--}}
        {{--                        <a target="_blank" href="https://ec.europa.eu/eusurvey/runner/EUCodeWeek2020_Challenges_Italy"--}}
        {{--                           class="codeweek-action-link-button">@lang('hackathon-italy.sections.4.content.1')</a>--}}
        {{--                    </div>--}}

        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </section>--}}

        <section id="programme" id="pratical-info">
            <h1>@lang('hackathon-italy.sections.9.title')</h1>

            @lang('hackathon-italy.sections.9.content.0')<br/>
            @lang('hackathon-italy.sections.9.content.1')


            <br/><br/>
            <h1>@lang('hackathon-italy.sections.8.title')</h1>
            @lang('hackathon-italy.sections.8.content.0')
            <ol>
                <li>@lang('hackathon-italy.sections.8.content.1')</li>
                <li>@lang('hackathon-italy.sections.8.content.2')</li>
                <li>@lang('hackathon-italy.sections.8.content.3')</li>
            </ol>
            <div>
                @lang('hackathon-italy.sections.8.content.4')<br/><br/>

                @lang('hackathon-italy.sections.8.content.5')<br/><br/>
                @lang('hackathon-italy.sections.8.content.6')<br/><br/>
                @lang('hackathon-italy.sections.8.content.7')<br/><br/>
                @lang('hackathon-italy.sections.8.content.8')<br/><br/>
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
        {{--                            <p>Dream Space, Microsoft Ireland</p>--}}
        {{--                            <p>South Country Business Park, Leopardstown, Dublin 18, D18 P521</p>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </section>--}}

        <section id="jury-mentors">

            <h1>@lang('hackathon-italy.sections.10.title')</h1>
            <p>
                @lang('hackathon-italy.sections.10.content.0')
            </p>
            <div class="jury-grid">
                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/italy/piersoft.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-italy.sections.mentors.1.0')</h2>
                    <div class="text-sm">@lang('hackathon-italy.sections.mentors.1.1')<br/>
                        @lang('hackathon-italy.sections.mentors.1.2')<br/>
                        @lang('hackathon-italy.sections.mentors.1.3')<br/>
                        @lang('hackathon-italy.sections.mentors.1.4')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/italy/gianluca-orpello.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-italy.sections.mentors.2.0')</h2>
                    <div class="text-sm">@lang('hackathon-italy.sections.mentors.2.1')<br/>
                        @lang('hackathon-italy.sections.mentors.2.2')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/italy/luca-versari.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-italy.sections.mentors.3.0')</h2>
                    <div class="text-sm">@lang('hackathon-italy.sections.mentors.3.1')<br/>
                        @lang('hackathon-italy.sections.mentors.3.2')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/italy/alessandra-valenti.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-italy.sections.mentors.4.0')</h2>
                    <div class="text-sm">@lang('hackathon-italy.sections.mentors.4.1')<br/>
                        @lang('hackathon-italy.sections.mentors.4.2')
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/italy/maura_sandri.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-italy.sections.mentors.5.0')</h2>
                    <div class="text-sm">@lang('hackathon-italy.sections.mentors.5.1')<br/>
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/italy/paolo-ganci.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-italy.sections.mentors.6.0')</h2>
                    <div class="text-sm">@lang('hackathon-italy.sections.mentors.6.1')<br/>
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/italy/christel-sirocchi.png')}}">
                    </div>
                    <h2 class="text-center">@lang('hackathon-italy.sections.mentors.7.0')</h2>
                    <div class="text-sm">@lang('hackathon-italy.sections.mentors.7.1')<br/>
                    </div>
                </div>


            </div>
        </section>

        {{--                <section id="side-events">--}}
        {{--                    <div class="left">--}}
        {{--                        <h1>@lang('hackathon-italy.sections.11.title')</h1>--}}
        {{--                        <p>@lang('hackathon-italy.sections.11.content.0')</p>--}}
        {{--                        <a href="" class="codeweek-action-link-button">@lang('login.register')</a>--}}
        {{--                    </div>--}}
        {{--                    <img src="/images/hackathons/side_events.png">--}}
        {{--                </section>--}}

        <section id="side-events">
            <h1>@lang('hackathon-italy.sections.11.title')</h1>
            <p>@lang('hackathon-italy.sections.11.content.0')</p>

            <div class="p-8 leading-6 bg-yellow-200 bg-opacity-25">
                <h2>@lang('hackathon-italy.sections.11.events.makex.title.0')</h2>

                <div class="mb-4">@lang('hackathon-italy.sections.11.events.makex.content.0')</div>
                <div class="mb-4">@lang('hackathon-italy.sections.11.events.makex.content.1')</div>

                <div class="text-lg text-orange-300">@lang('hackathon-italy.sections.11.events.makex.title.1')</div>
                @lang('hackathon-italy.sections.11.events.makex.dates.0') <a href="https://forms.gle/h4VRLUc9uSpLYCVHA">@lang('hackathon-italy.sections.11.events.makex.content.2')</a> @lang('hackathon-italy.sections.11.events.makex.content.3')<br/>

                <div class="text-lg text-orange-300 mt-6">@lang('hackathon-italy.sections.11.events.makex.title.2')</div>
                @lang('hackathon-italy.sections.11.events.makex.dates.1') <a href="https://forms.gle/h4VRLUc9uSpLYCVHA">@lang('hackathon-italy.sections.11.events.makex.content.2')</a> @lang('hackathon-italy.sections.11.events.makex.content.3')<br/>

                <div class="text-lg text-orange-300 mt-6">@lang('hackathon-italy.sections.11.events.makex.title.3')</div>
                @lang('hackathon-italy.sections.11.events.makex.dates.2') <a href="https://forms.gle/h4VRLUc9uSpLYCVHA">@lang('hackathon-italy.sections.11.events.makex.content.2')</a> @lang('hackathon-italy.sections.11.events.makex.content.3')<br/>

                <div class="mt-6">
                    @lang('hackathon-italy.sections.11.events.makex.content.4') <a href="@lang('hackathon-italy.sections.11.events.makex.content.5')">@lang('hackathon-italy.sections.11.events.makex.content.5')</a>
                </div>



            </div>




        </section>


        <section id="partners">
            <div>
                <h1>@lang('hackathon-italy.misc.2')</h1>
            </div>

            <div class="partners-grid">

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/google.png')}}">
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/imagilabs.png')}}">
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/makeblock-makex.png')}}">
                    </div>
                </div>

                {{--                <div class="item">--}}
                {{--                    <div class="flex justify-center">--}}
                {{--                        <img src="{{asset('/images/hackathons/partners/redhat.png')}}">--}}
                {{--                    </div>--}}
                {{--                </div>--}}


            </div>

            <div class="partners-grid">

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/microsoft.png')}}">
                    </div>
                </div>

            </div>
        </section>

        <section id="about-codeweek">
            <div class="text">
                <h1>@lang('hackathon-italy.sections.12.title')</h1>
                <p>@lang('hackathon-italy.sections.12.content.0') @lang('hackathon-italy.sections.12.content.1') @lang('hackathon-italy.sections.12.content.2')</p>
                <br/><br/>
                <p>@lang('hackathon-italy.sections.12.content.3')
                    <b>@lang('hackathon-italy.sections.12.content.4')</b> @lang('hackathon-italy.sections.12.content.5')
                    <b>@lang('hackathon-italy.sections.12.content.6')</b>
                    @lang('hackathon-italy.sections.12.content.7') <b>@lang('hackathon-italy.sections.12.content.8')</b>
                </p><br/><br/>
            </div>
            <img src="/images/hackathons/about_codeweek.svg" class="static-image">
            <a target="_blank" href="https://codeweek.eu/about"
               class="codeweek-action-link-button">@lang('hackathon-italy.sections.12.content.9')</a>
        </section>

    </section>

@endsection

