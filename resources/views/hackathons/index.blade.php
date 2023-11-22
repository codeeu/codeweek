@extends('layout.base')

@section('title', 'Hackathons')
@section('content')

    <section id="codeweek-hackathons-page" class="codeweek-page">

        <section class="codeweek-banner hackathons">
            <div class="image">
                <div class="text">
                    <div class="text-inside">
                        <h1 style="font-weight: bold;">@lang('hackathons.title')</h1>
                        <h2>@lang('hackathons.subtitle')</h2>
                    </div>
                </div>
                <img src="{{asset('images/hackathons/banner_hackathons.svg')}}" class="static-image desktop">
                <img src="{{asset('images/hackathons/banner_hackathons_mobile.svg')}}" class="static-image mobile">
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <h1 class="align-center">Hackathons</h1>
            <p>

                A hackathon is an event where participants collaborate intensively, over 24 hours in up to 3 days, to
                create software projects or solve challenges. Adapting the traditional hackathon format, the EU Code
                Week Hackathons take into consideration the age of the participants and cater to the unique skills,
                insights, and interests of adolescents.<br/><br/>

                Participants form teams to brainstorm, design, and code, aiming to produce a working solution or
                prototype by the event's conclusion. Beyond fostering innovation and teamwork, teen hackathons offer a
                platform for young tech enthusiasts to learn, showcase their talents, and connect with like-minded
                peers.<br/><br/>

                The EU Code Week 2023 Hackathon is open to individuals between 15 and 19 years old, with a specific
                emphasis on STEM,
                computer science, design, engineering, ICT, and other related fields. To the extent possible, the teams
                should encompass both technical and functional competencies.<br/><br/>

                Each year select European countries receive the focus and organize locally the event.

            </p>

        </section>

        <div class="codeweek-content-wrapper">

            <h1 class="align-center">EU Code Week Hackathon 2023</h1>

            <p>
                The central theme for 2023 is “Code to problem-solve and give life to your dreams”. The winning teams of
                each of the participating countries will challenge themselves with their ideas EU Code Week Hackathon
                final will be Friday 24 November, follow this link for more information:<br/><br/></p>
            <div class="align-center" style="margin-bottom:10px;">
                <a href="https://eventornado.com/event/final-eu-code-week-hackathon-2023#home">
                    <img src="/images/hackathons/banner_final.png">
                </a>
            </div>
            <p>
                For 2023, there are five countries in focus. Follow the links for more information on challenge areas,
                local organizers, and important dates:
            </p>
            <div class="align-center">
            <section class="hackathons-content-grid">


                <div class="codeweek-card-grid">
                    <a href="https://codeweek.eu/hackathon/2023/albania" target="_blank">
                        <div class="city-image">
                            <img src="/images/hackathons/flags/europe.jpg">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">Albania</div>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="codeweek-card-grid">
                    <a href="https://codeweek.eu/hackathon/2023/greece" target="_blank">
                        <div class="city-image">
                            <img src="/images/hackathons/flags/europe.jpg">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">Greece</div>
                            </div>
                        </div>
                    </a>
                </div>


                <div class="codeweek-card-grid">
                    <a href="https://codeweek.eu/hackathon/2023/ireland" target="_blank">
                        <div class="city-image">
                            <img src="/images/hackathons/flags/europe.jpg">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">Ireland</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="https://codeweek.eu/hackathon/2023/latvia" target="_blank">
                        <div class="city-image">
                            <img src="/images/hackathons/flags/europe.jpg">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">Latvia</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="codeweek-card-grid">
                    <a href="https://codeweek.eu/hackathon/2023/italy" target="_blank">
                        <div class="city-image">
                            <img src="/images/hackathons/flags/europe.jpg">
                            <div class="transparent"></div>
                            <div class="text">
                                <div class="title hackaton">Italy</div>
                            </div>
                        </div>
                    </a>
                </div>


            </section>
            </div>
        </div>
    </section>
@endsection
