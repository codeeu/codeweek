@extends('layout.base')

<x-tailwind></x-tailwind>

@section('hackathons.header')
    @include('hackathons.before.header', ["enabled_language" => "en", "registration_link"=>"https://ec.europa.eu/eusurvey/runner/EUCWHackathonIreland"])
@endsection

@section('content')

    <section id="codeweek-hackathons-before-page" class="codeweek-page ireland">


        <section class="codeweek-banner hackathon">
            <div class="image">
                <div class="text">
                    <div class="text-inside">
                        <h1 style="font-weight: bold;">@lang('hackathons.title')</h1>
                        <h2>@lang('hackathon-ireland.subtitle')</h2>
                    </div>
                </div>
                <div class="paragraph">
                    <p>@lang('hackathon-ireland.sections.1.content.0')<br/>
                </div>
                <img src="/images/hackathons/banner_hackathon_before.svg" class="static-image desktop">
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <p>
                @lang('hackathon-ireland.sections.1.content.1')
                @lang('hackathon-ireland.sections.1.content.2')<br/><br/>
                @lang('hackathon-ireland.sections.1.content.3')


            </p>

        </section>

        <section class="questions">
            <div class="left-wrapper">
                <div class="expect">
                    {{--                    <h1>@lang('hackathon-ireland.sections.2.title')</h1>--}}
                    {{--                    <ul>--}}
                    {{--                        <li>@lang('hackathon-ireland.sections.2.content.0')</li>--}}
                    {{--                        <li>@lang('hackathon-ireland.sections.2.content.1')</li>--}}
                    {{--                        <li>@lang('hackathon-ireland.sections.2.content.2')</li>--}}

                    {{--                    </ul>--}}
                </div>
                <div class="bring">
                    <h1>@lang('hackathon-ireland.sections.2.title')</h1>
                    <ul>
                        <li>@lang('hackathon-ireland.sections.2.content.0')</li>
                        <li>@lang('hackathon-ireland.sections.2.content.1')</li>
                        <li>@lang('hackathon-ireland.sections.2.content.2')</li>
                        <li>@lang('hackathon-ireland.sections.2.content.3')</li>
                        <li>@lang('hackathon-ireland.sections.2.content.4')</li>
                        <li>@lang('hackathon-ireland.sections.2.content.5')</li>
                    </ul>
                </div>
            </div>

        </section>

        <section class="registration">
            <div class="register-wrapper">
                <div class="register">
                    <div class="title">@lang('hackathon-ireland.title')</div>
                    <div class="city">@lang('hackathons.cities.2.country')</div>
                    <div class="date">@lang('hackathons.cities.2.date')</div>
                    <a target="_blank" href="https://ec.europa.eu/eusurvey/runner/EUCWHackathonIreland"
                       class="codeweek-action-link-button">@lang('login.register')</a>
                </div>
            </div>
        </section>

        {{--        <section id="challenge">--}}
        {{--            <img src="/images/hackathons/ideation.png" class="desktop">--}}
        {{--            <div class="text">--}}
        {{--                <div class="challenge-text">--}}
        {{--                    <h1>@lang('hackathon-ireland.sections.4.title')</h1>--}}
        {{--                    <p>@lang('hackathon-ireland.sections.4.content.0')</p>--}}
        {{--                    <div class="button">--}}
        {{--                        <a target="_blank" href="https://ec.europa.eu/eusurvey/runner/EUCodeWeek2020_Challenges_Ireland"--}}
        {{--                           class="codeweek-action-link-button">@lang('hackathon-ireland.sections.4.content.1')</a>--}}
        {{--                    </div>--}}

        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </section>--}}

{{--        <section id="challenge" name="voting">--}}

{{--            <div class="text">--}}
{{--                <div class="challenge-text">--}}
{{--                    <h1>@lang('hackathon-ireland.sections.voting.title')</h1>--}}
{{--                    <div class="mb-4">@lang('hackathon-ireland.sections.5.content.0')--}}
{{--                        <br/>@lang('hackathon-ireland.sections.voting.challenges')</div>--}}


{{--                    @if(session('success'))--}}
{{--                        <div class="text-xl">--}}
{{--                            @lang('hackathon-ireland.sections.voting.thanks.0')<br/>--}}
{{--                            @lang('hackathon-ireland.sections.voting.thanks.1')<br/>--}}
{{--                        </div>--}}
{{--                    @else--}}
{{--                        <div class="mb-6">@lang('hackathon-ireland.sections.voting.deadline')</div>--}}
{{--                        <div class="text-xl">@lang('hackathon-ireland.sections.voting.header')</div>--}}
{{--                        <form method="POST" action="{{route('hackathon-vote', ["country" => "ireland"])}}">--}}
{{--                            @csrf--}}
{{--                            <button class="codeweek-action-button w-1/3 m-2 p-8" name="choice"--}}
{{--                                    value="1 - @lang('hackathon-ireland.sections.voting.choices.0')"--}}
{{--                                    type="submit">@lang('hackathon-ireland.sections.voting.choices.0')</button>--}}
{{--                            <br/>--}}
{{--                            <button class="codeweek-action-button w-1/3 m-2 p-8" name="choice"--}}
{{--                                    value="2 - @lang('hackathon-ireland.sections.voting.choices.1')"--}}
{{--                                    type="submit">@lang('hackathon-ireland.sections.voting.choices.1')</button>--}}
{{--                            <br/>--}}
{{--                            <button class="codeweek-action-button w-1/3 m-2 p-8" name="choice"--}}
{{--                                    value="3 - @lang('hackathon-ireland.sections.voting.choices.2')"--}}
{{--                                    type="submit">@lang('hackathon-ireland.sections.voting.choices.2')</button>--}}
{{--                        </form>--}}
{{--                    @endif--}}
{{--                    <p>@lang('hackathon-ireland.sections.5.content.2')</p>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}

        <section id="programme" id="pratical-info">
            <h1>@lang('hackathon-ireland.sections.9.title')</h1>

            @lang('hackathon-ireland.sections.9.content.0')<br/>
            @lang('hackathon-ireland.sections.9.content.1')<br/>
            @lang('hackathon-ireland.sections.9.content.2')<br/>


            <br/><br/>
            <h1>@lang('hackathon-ireland.sections.8.title')</h1>
            @lang('hackathon-ireland.sections.8.content.0')
            <ol>
                <li>@lang('hackathon-ireland.sections.8.content.1')</li>
                <li>@lang('hackathon-ireland.sections.8.content.2')</li>
                <li>@lang('hackathon-ireland.sections.8.content.3')</li>
            </ol>
            <div>
                @lang('hackathon-ireland.sections.8.content.4')<br/><br/>

                @lang('hackathon-ireland.sections.8.content.5')<br/><br/>
                @lang('hackathon-ireland.sections.8.content.6')<br/><br/>
                @lang('hackathon-ireland.sections.8.content.7')<br/><br/>
                @lang('hackathon-ireland.sections.8.content.8')<br/><br/>
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

            <h1>@lang('hackathon-ireland.sections.10.title')</h1>
            <p>
                @lang('hackathon-ireland.sections.10.content.0')
            </p>
            <div class="jury-grid">

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/_blank2.png')}}">
                    </div>
                    <h2 class="text-center">Anluan Dunne</h2>
                    <div class="text-sm">Anluan is a Client Success Specialist for Red Hat Ireland. He has a background in Linux engineering but started his journey in technology on a Commodore 64.<br/>
                        With over 20 years of experience designing and supporting solutions, Anluan is a results-focussed person who seeks out the best possible result for his clients.

                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/ireland/roisin-faherty.png')}}">
                    </div>
                    <h2 class="text-center">Roisin Faherty</h2>
                    <div class="text-sm">Róisín is a lecturer of computing in the Technological University Dublin, Tallaght Campus. Róisín has over twenty years teaching experience at third level in Computing across many different modules including Database, Analysis and Design and Software Development. <br/>
                        Róisín worked as a Software Engineer and Team Lead in a Computer Based Training company for a number of years before joining the teaching team at TU Dublin. <br/>
                        Róisín has a keen interest in Computer Science Education, delivering computing camps in primary and secondary schools around Ireland, as well as being involved in the delivery of teacher training programmes to promoting computer science to school teachers.
                    </div>
                </div>


                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/ireland/iseult-mangan.png')}}">
                    </div>
                    <h2 class="text-center">Iseult Mangan</h2>
                    <div class="text-sm">Iseult Mangan, primary school teaching principal in Co Mayo. I'm a Raspberry Pi certified educator, Youth zone Wrangler for Mozfest and mentor with Teen Turn and Coder Dojo.
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/ireland/florian-moss.png')}}">
                    </div>
                    <h2 class="text-center">Florian Moss</h2>
                    <div class="text-sm">Florian is a Solution Architect for Red Hat and has previously worked in Ireland, Australia and Germany. He is working with businesses in Ireland to implement solutions that will drive the next generation, all built by Open Source technology.<br/>
                        As a recent Computer Science graduate from Letterkenny Institue of Technology. Florian also has a good understanding of what it takes to be successful in IT and what options are available in Ireland.
                    </div>
                </div>






                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/_blank4.png')}}">
                    </div>
                    <h2 class="text-center">Murph</h2>
                    <div class="text-sm">Murph is Chief Architect for Red Hat Ireland; A tinkerer from a young age, he has over 30 years of experience taking things apart and putting them back together in interesting ways. <br/>
                        A full-stack enthusiast, he has interest and experience ranging from 8-bit breadboard computers to open source game engines to JavaScript-based business apps for the web - with stops at every tech along the way.
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/ireland/amanda-jolliffe.png')}}">
                    </div>
                    <h2 class="text-center">Amanda Jolliffe</h2>
                    <div class="text-sm">Amanda Jolliffe leads Microsoft Ireland DreamSpace, a STEM Education venue for school communities across Ireland. Amanda is a post-primary teacher by background and is encouraged and inspired by her work with young people throughout her career.<br/>
                        She is excited about how this EU Code Week Hackathon will continue to showcase the incredible potential of our young people to make a real difference.
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/ireland/kevin-o-flannagain.png')}}">
                    </div>
                    <h2 class="text-center">Kevin O'Flannagain</h2>
                    <div class="text-sm">Kevin O'Flannagain graduated from UCD engineering in 2017 and has over three years experience working with cutting edge hardware and software solutions in optical engineering and robotics.
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/ireland/matt-hanlon.png')}}">
                    </div>
                    <h2 class="text-center">Matt Hanlon</h2>
                    <div class="text-sm">I'm Matt Hanlon, a longtime software developer, coach, author, and dad. I was a software engineer at Apple on various products and software you probably have in your home or in your pocket.
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/ireland/kieran-collins.png')}}">
                    </div>
                    <h2 class="text-center">Kieran Collins</h2>
                    <div class="text-sm">Dr Kieran Collins is an educator, researcher and applied performance scientist. Kieran's education philosophy is based on the development of critical thinking, problem solving and the application of logic with the aim of producing STEM leaders.
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/ireland/nathan.png')}}">
                    </div>
                    <h2 class="text-center">Nathan Cahill</h2>
                    <div class="text-sm">Nathan is a software developer with a background in visual art, design and photography. He holds a BA and MA from the National College of Art and Design and a Higher Diploma in Computing from TU Dublin.
                    </div>
                </div>




            </div>
        </section>

        <section id="side-events">
            <h1>@lang('hackathon-ireland.sections.11.title')</h1>
            <p>@lang('hackathon-ireland.sections.11.content.0')</p>

            <div class="p-8 leading-6 bg-yellow-200 bg-opacity-25">
                <h2>Animate a name</h2>

                <div class="mb-4">Are you between 9 to 14 and eager to know more about computer programming? This workshop is for you! You will create, have fun and quickly acquire some coding skills. With just a handful of blocks and a few clicks, you can make a "sprite" (character) dance, talk, or animate it in a variety of ways. In addition, the computer science concepts we will be using in Scratch for CS First can be applied to other advanced programming languages such as Python or Java.</div>

                Register, and participate in this activity and you will be able to:<br/>
                <ul style="list-style-type: circle;margin-left:40px; margin-top:0px;">
                    <li>Use a block-based programming language</li>
                    <li>Master important computer science concepts such as events, sequences and loops</li>
                    <li>Create an animation project in Scratch for CS</li>
                </ul>

                First Date: Friday 21 May - <a href="https://docs.google.com/forms/d/e/1FAIpQLSfjRuTdiP9zMwY0HSjUiZwLYBKEodJZ03jLbA9pE15oBvK7OA/viewform?resourcekey=0-bG86S5TaE77kuXK_VmTzIQ">Click here to register</a> !
            </div>

            <div class="p-8 leading-6 bg-yellow-200 bg-opacity-25 mt-6">
                <h2>Creative Coding Workshop</h2>

                <div class="mb-4">Learn the basics of Python with imagiLabs' creative coding tools! Perfect for kids aged 9-15, this 1.5 hour workshop for beginners will take coders from lighting up one pixel at a time to making colourful animations.</div>
                Date: Saturday 15 May, 13:00 - <a href="https://docs.google.com/forms/d/e/1FAIpQLSf123Y_kiUYfvCspHgU4z0SKzQcTD_nXbCnyRdwk4l7xCPqng/viewform">click here to register</a> !

                <div class="text-sm">Download the free imagiLabs app on your iOS or Android device to get started today. No imagiCharms needed -- come to the virtual workshop as you are!</div>
            </div>

            <div class="p-8 leading-6 bg-yellow-200 bg-opacity-25 mt-6">
                <h2>@lang('hackathon-ireland.sections.11.events.makex.title.0')</h2>

                <div class="mb-4">@lang('hackathon-ireland.sections.11.events.makex.content.0')</div>
                <div class="mb-4">@lang('hackathon-ireland.sections.11.events.makex.content.1')</div>

                <div class="text-lg text-orange-300">@lang('hackathon-ireland.sections.11.events.makex.title.1')</div>
                @lang('hackathon-ireland.sections.11.events.makex.dates.0') <a href="https://forms.gle/h4VRLUc9uSpLYCVHA">@lang('hackathon-ireland.sections.11.events.makex.content.2')</a> @lang('hackathon-ireland.sections.11.events.makex.content.3')<br/>

                <div class="text-lg text-orange-300 mt-6">@lang('hackathon-ireland.sections.11.events.makex.title.2')</div>
                @lang('hackathon-ireland.sections.11.events.makex.dates.1') <a href="https://forms.gle/h4VRLUc9uSpLYCVHA">@lang('hackathon-ireland.sections.11.events.makex.content.2')</a> @lang('hackathon-ireland.sections.11.events.makex.content.3')<br/>

                <div class="text-lg text-orange-300 mt-6">@lang('hackathon-ireland.sections.11.events.makex.title.3')</div>
                @lang('hackathon-ireland.sections.11.events.makex.dates.2') <a href="https://forms.gle/h4VRLUc9uSpLYCVHA">@lang('hackathon-ireland.sections.11.events.makex.content.2')</a> @lang('hackathon-ireland.sections.11.events.makex.content.3')<br/>

                <div class="mt-6">
                    @lang('hackathon-ireland.sections.11.events.makex.content.4') <a href="@lang('hackathon-ireland.sections.11.events.makex.content.5')">@lang('hackathon-ireland.sections.11.events.makex.content.5')</a>
                </div>



            </div>
        </section>


{{--        <section id="side-events">--}}
{{--            <div class="left">--}}
{{--                --}}
{{--                <a target="_blank" href="https://ec.europa.eu/eusurvey/runner/EUCWHackathonIreland"--}}
{{--                   class="codeweek-action-link-button">@lang('login.register')</a>--}}
{{--            </div>--}}
{{--            <img src="/images/hackathons/side_events.png">--}}
{{--        </section>--}}

        <section id="partners">
            <div>
                <h1>@lang('hackathon-ireland.misc.2')</h1>
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
                        <img src="{{asset('/images/hackathons/partners/microsoft.png')}}">
                    </div>
                </div>
            </div>
            <div class="partners-grid">
                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/redhat.png')}}">
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/makeblock-makex.png')}}">
                    </div>
                </div>





            </div>
        </section>

        <section id="about-codeweek">
            <div class="text">
                <h1>@lang('hackathon-ireland.sections.12.title')</h1>
                <p>@lang('hackathon-ireland.sections.12.content.0') @lang('hackathon-ireland.sections.12.content.1') @lang('hackathon-ireland.sections.12.content.2')</p>
                <br/><br/>
                <p>@lang('hackathon-ireland.sections.12.content.3')
                    <b>@lang('hackathon-ireland.sections.12.content.4')</b> @lang('hackathon-ireland.sections.12.content.5')
                    <b>@lang('hackathon-ireland.sections.12.content.6')</b>
                    @lang('hackathon-ireland.sections.12.content.7')
                    <b>@lang('hackathon-ireland.sections.12.content.8')</b>
                </p><br/><br/>
            </div>
            <img src="/images/hackathons/about_codeweek.svg" class="static-image">
            <a target="_blank" href="https://codeweek.eu/about"
               class="codeweek-action-link-button">@lang('hackathon-ireland.sections.12.content.9')</a>
        </section>

    </section>

@endsection

