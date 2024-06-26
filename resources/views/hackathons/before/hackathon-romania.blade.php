@extends('layout.base')

<x-tailwind></x-tailwind>

@section('hackathons.header')
    @include('hackathons.before.header', ["enabled_language" => "ro","registration_link"=>"https://ec.europa.eu/eusurvey/runner/EUCWHackathonRomania"])
@endsection

@section('content')

    <section id="codeweek-hackathons-before-page" class="codeweek-page romania">


        <section class="codeweek-banner hackathon">
            <div class="image">
                <div class="text">
                    <div class="text-inside">
                        <h1 style="font-weight: bold;">@lang('hackathons.title')</h1>
                        <h2>@lang('hackathon-romania.subtitle')</h2>
                    </div>
                </div>
                <div class="paragraph">
                    <p>@lang('hackathon-romania.sections.1.content.0')<br/>
                </div>
                <img src="/images/hackathons/banner_hackathon_before.svg" class="static-image desktop">
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <p>
                @lang('hackathon-romania.sections.1.content.1')
                @lang('hackathon-romania.sections.1.content.2')<br/><br/>
                @lang('hackathon-romania.sections.1.content.3')


            </p>

        </section>

        <section class="questions">
            <div class="left-wrapper">
                <div class="expect">
                    {{--                    <h1>@lang('hackathon-romania.sections.2.title')</h1>--}}
                    {{--                    <ul>--}}
                    {{--                        <li>@lang('hackathon-romania.sections.2.content.0')</li>--}}
                    {{--                        <li>@lang('hackathon-romania.sections.2.content.1')</li>--}}
                    {{--                        <li>@lang('hackathon-romania.sections.2.content.2')</li>--}}

                    {{--                    </ul>--}}
                </div>
                <div class="bring">
                    <h1>@lang('hackathon-romania.sections.2.title')</h1>
                    <ul>
                        <li>@lang('hackathon-romania.sections.2.content.0')</li>
                        <li>@lang('hackathon-romania.sections.2.content.1')</li>
                        <li>@lang('hackathon-romania.sections.2.content.2')</li>
                        <li>@lang('hackathon-romania.sections.2.content.3')</li>
                        <li>@lang('hackathon-romania.sections.2.content.4')</li>
                        <li>@lang('hackathon-romania.sections.2.content.5')</li>
                    </ul>
                </div>
            </div>

        </section>

        <section class="registration">
            <div class="register-wrapper">
                <div class="register">
                    <div class="title">@lang('hackathon-romania.title')</div>
                    <div class="city">@lang('hackathons.cities.1.country')</div>
                    <div class="date">@lang('hackathons.cities.1.date')</div>
                    <a target="_blank" href="https://ec.europa.eu/eusurvey/runner/EUCWHackathonRomania"
                       class="codeweek-action-link-button">@lang('login.register')</a>
                </div>
            </div>
        </section>

        {{--        <section id="challenge">--}}
        {{--            <img src="/images/hackathons/ideation.png" class="desktop">--}}
        {{--            <div class="text">--}}
        {{--                <div class="challenge-text">--}}
        {{--                    <h1>@lang('hackathon-romania.sections.4.title')</h1>--}}
        {{--                    <p>@lang('hackathon-romania.sections.4.content.0')</p>--}}
        {{--                    <div class="button">--}}
        {{--                        <a target="_blank" href="https://ec.europa.eu/eusurvey/runner/EUCodeWeek2020_Challenge_Romania"--}}
        {{--                           class="codeweek-action-link-button">@lang('hackathon-romania.sections.4.content.1')</a>--}}
        {{--                    </div>--}}

        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </section>--}}

        {{--        <section id="challenge">--}}
        {{--            <img src="/images/hackathons/ideation.png" class="desktop">--}}
        {{--            <div class="text">--}}
        {{--                <div class="challenge-text">--}}
        {{--                    <h1>@lang('hackathon-romania.sections.5.title')</h1>--}}
        {{--                    <p>@lang('hackathon-romania.sections.5.content.0')</p>--}}

        {{--                    <a target="_blank" href="https://ec.europa.eu/eusurvey/runner/CodeWeekHacks_RO_voting"--}}
        {{--                       class="codeweek-action-link-button">@lang('hackathon-romania.sections.5.content.1')</a>--}}

        {{--                    <p>@lang('hackathon-romania.sections.5.content.2')</p>--}}

        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </section>--}}

        <section id="programme">
            <h1>@lang('hackathon-romania.sections.9.title')</h1>

            @lang('hackathon-romania.sections.9.content.0')<br/>
            @lang('hackathon-romania.sections.9.content.1')


            <br/><br/>
            <h1>@lang('hackathon-romania.sections.8.title')</h1>
            @lang('hackathon-romania.sections.8.content.0')
            <ol>
                <li>@lang('hackathon-romania.sections.8.content.1')</li>
                <li>@lang('hackathon-romania.sections.8.content.2')</li>
                <li>@lang('hackathon-romania.sections.8.content.3')</li>
            </ol>
            <div>
                @lang('hackathon-romania.sections.8.content.4')<br/><br/>

                @lang('hackathon-romania.sections.8.content.5')<br/><br/>
                @lang('hackathon-romania.sections.8.content.6')<br/><br/>
                @lang('hackathon-romania.sections.8.content.7')<br/><br/>
                @lang('hackathon-romania.sections.8.content.8')<br/><br/>
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
        {{--                            <p>Dream Space, Microsoft romania</p>--}}
        {{--                            <p>South Country Business Park, Leopardstown, Dublin 18, D18 P521</p>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </section>--}}

        <section id="jury-mentors">

            <h1>@lang('hackathon-romania.sections.10.title')</h1>
            <p>
                @lang('hackathon-romania.sections.10.content.0')
            </p>
            <div class="jury-grid">
                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/romania/diana_ghitun.png')}}">
                    </div>
                    <h2 class="text-center">Diana Ghitun</h2>
                    <div class="text-sm">@lang('hackathon-romania.sections.mentors.1.0')
                        <br/><br/>@lang("hackathon-romania.sections.mentors.1.1")
                    </div>

                </div>
                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/romania/elena_simion.png')}}">
                    </div>
                    <h2 class="text-center">Elena Simion</h2>
                    <div class="text-sm">@lang('hackathon-romania.sections.mentors.2.0')
                        <br/><br/>@lang("hackathon-romania.sections.mentors.2.1")
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/romania/george_dita.png')}}">
                    </div>
                    <h2 class="text-center">George Dita</h2>
                    <div class="text-sm">@lang('hackathon-romania.sections.mentors.3.0')
                        <br/><br/>@lang("hackathon-romania.sections.mentors.3.1")
                    </div>
                </div>


                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/romania/ioana_alexandru.png')}}">
                    </div>
                    <h2 class="text-center">Ioana Alexandru</h2>
                    <div class="text-sm">@lang('hackathon-romania.sections.mentors.4.0')
                        <br/><br/>@lang("hackathon-romania.sections.mentors.4.1")
                    </div>
                </div>


                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/romania/ioana_blaga.png')}}">
                    </div>
                    <h2 class="text-center">Ioana Blaga</h2>
                    <div class="text-sm">@lang('hackathon-romania.sections.mentors.5.0')
                        <br/><br/>@lang("hackathon-romania.sections.mentors.5.1")
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/romania/irina_bejan.png')}}">
                    </div>
                    <h2 class="text-center">Irina Bejan</h2>
                    <div class="text-sm">@lang('hackathon-romania.sections.mentors.6.0')
                        <br/><br/>@lang("hackathon-romania.sections.mentors.6.1")
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/romania/cristina_andreescu.png')}}">
                    </div>
                    <h2 class="text-center">Cristina Adreescu</h2>
                    <div class="text-sm">@lang('hackathon-romania.sections.mentors.7.0')
                        <br/><br/>@lang("hackathon-romania.sections.mentors.7.1")
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/romania/laurentiu_gabriel_ghergu.png')}}">
                    </div>
                    <h2 class="text-center">Laurentiu Gabriel Ghergu</h2>
                    <div class="text-sm">@lang('hackathon-romania.sections.mentors.8.0')
                        <br/><br/>@lang("hackathon-romania.sections.mentors.8.1")
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/romania/mihaela_roxana_ghidersa.png')}}">
                    </div>
                    <h2 class="text-center">Mihaela-Roxana Ghidersa</h2>
                    <div class="text-sm">@lang('hackathon-romania.sections.mentors.9.0')
                        <br/><br/>@lang("hackathon-romania.sections.mentors.9.1")
                    </div>
                </div>


            </div>
        </section>

        {{--                <section id="side-events">--}}
        {{--                    <div class="left">--}}
        {{--                        <h1>@lang('hackathon-romania.sections.11.title')</h1>--}}
        {{--                        <p>@lang('hackathon-romania.sections.11.content.0')</p>--}}
        {{--                        <a href="" class="codeweek-action-link-button">@lang('login.register')</a>--}}
        {{--                    </div>--}}
        {{--                    <img src="/images/hackathons/side_events.png">--}}
        {{--                </section>--}}

        <section id="side-events">
            <h1>@lang('hackathon-romania.sections.11.title')</h1>
            <p>@lang('hackathon-romania.sections.11.content.0')</p>

            <div class="p-8 leading-6 bg-yellow-200 bg-opacity-25">
                <h2>@lang('hackathon-romania.sections.11.events.1.title')</h2>

                <div class="mb-4">@lang('hackathon-romania.sections.11.events.1.content.0')</div>
                @lang('hackathon-romania.sections.11.events.1.content.1')
                <br/>
                <ul style="list-style-type: circle;margin-left:40px; margin-top:0px;">
                    <li>@lang('hackathon-romania.sections.11.events.1.content.2')</li>
                    <li>@lang('hackathon-romania.sections.11.events.1.content.3')</li>
                    <li>@lang('hackathon-romania.sections.11.events.1.content.4')</li>
                </ul>
                @lang('hackathon-romania.sections.11.events.1.content.5') <a href="https://docs.google.com/forms/d/e/1FAIpQLSesBUqGBj8EFvdJbIuS_Slx2m2HAF_CCAgEPGJAsqGCLdaF_w/viewform?resourcekey=0-WQlQyHo6twflWIsuSzEh4A">@lang('hackathon-romania.sections.11.events.1.content.6')</a> @lang('hackathon-romania.sections.11.events.1.content.7')<br/>
                @lang('hackathon-romania.sections.11.events.1.content.8') <a href="https://www.youtube.com/watch?v=zhyBFH3m92U&list=PLnqp3yQre_1ju5NJ18E4LLFTQg_EdyKLV">https://www.youtube.com/watch?v=zhyBFH3m92U&list=PLnqp3yQre_1ju5NJ18E4LLFTQg_EdyKLV</a>

            </div>

            <div class="p-8 leading-6 bg-yellow-200 bg-opacity-25 mt-6">
                <h2>@lang('hackathon-romania.sections.11.events.2.title')</h2>

                <div class="mb-4">@lang('hackathon-romania.sections.11.events.2.content.0')</div>

                @lang('hackathon-romania.sections.11.events.2.content.1') <a href="https://codeweek.eu/view/361883/creative-coding-workshop">@lang('hackathon-romania.sections.11.events.2.content.2')</a> @lang('hackathon-romania.sections.11.events.2.content.3')<br/>
                <div class="text-sm"> @lang('hackathon-romania.sections.11.events.2.content.4')</div>
            </div>

            <div class="p-8 leading-6 bg-yellow-200 bg-opacity-25 mt-6">
                <h2>@lang('hackathon-romania.sections.11.events.makex.title.0')</h2>

                <div class="mb-4">@lang('hackathon-romania.sections.11.events.makex.content.0')</div>
                <div class="mb-4">@lang('hackathon-romania.sections.11.events.makex.content.1')</div>

                <div class="text-lg text-orange-300">@lang('hackathon-romania.sections.11.events.makex.title.1')</div>
                @lang('hackathon-romania.sections.11.events.makex.dates.0') <a href="https://forms.gle/h4VRLUc9uSpLYCVHA">@lang('hackathon-romania.sections.11.events.makex.content.2')</a> @lang('hackathon-romania.sections.11.events.makex.content.3')<br/>

                <div class="text-lg text-orange-300 mt-6">@lang('hackathon-romania.sections.11.events.makex.title.2')</div>
                @lang('hackathon-romania.sections.11.events.makex.dates.1') <a href="https://forms.gle/h4VRLUc9uSpLYCVHA">@lang('hackathon-romania.sections.11.events.makex.content.2')</a> @lang('hackathon-romania.sections.11.events.makex.content.3')<br/>

                <div class="text-lg text-orange-300 mt-6">@lang('hackathon-romania.sections.11.events.makex.title.3')</div>
                @lang('hackathon-romania.sections.11.events.makex.dates.2') <a href="https://forms.gle/h4VRLUc9uSpLYCVHA">@lang('hackathon-romania.sections.11.events.makex.content.2')</a> @lang('hackathon-romania.sections.11.events.makex.content.3')<br/>

                <div class="mt-6">
                    @lang('hackathon-romania.sections.11.events.makex.content.4') <a href="@lang('hackathon-romania.sections.11.events.makex.content.5')">@lang('hackathon-romania.sections.11.events.makex.content.5')</a>
                </div>



            </div>
        </section>

        <section id="partners">
            <div>
                <h1>@lang('hackathon-romania.misc.2')</h1>
            </div>

            <div class="partners-grid">
                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/apdetic.png')}}">
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/imagilabs.png')}}">
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/google.png')}}">
                    </div>
                </div>
            </div>

            <div class="partners-grid">

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/makeblock-makex.png')}}">
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/redhat.png')}}">
                    </div>
                </div>




            </div>
        </section>

        <section id="about-codeweek">
            <div class="text">
                <h1>@lang('hackathon-romania.sections.12.title')</h1>
                <p>@lang('hackathon-romania.sections.12.content.0') @lang('hackathon-romania.sections.12.content.1') @lang('hackathon-romania.sections.12.content.2')</p>
                <br/><br/>
                <p>@lang('hackathon-romania.sections.12.content.3')
                    <b>@lang('hackathon-romania.sections.12.content.4')</b> @lang('hackathon-romania.sections.12.content.5')
                    <b>@lang('hackathon-romania.sections.12.content.6')</b>
                    @lang('hackathon-romania.sections.12.content.7')
                    <b>@lang('hackathon-romania.sections.12.content.8')</b>
                </p><br/><br/>
            </div>
            <img src="/images/hackathons/about_codeweek.svg" class="static-image">
            <a target="_blank" href="https://codeweek.eu/about"
               class="codeweek-action-link-button">@lang('hackathon-romania.sections.12.content.9')</a>
        </section>

    </section>

@endsection

