@extends('layout.base')

@section('title', 'EU Code Week Hackathons – Innovate, Code & Compete')
@section('description', 'Join EU Code Week Hackathons, where young minds collaborate to solve real-world challenges through coding and innovation.')

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
            <p>A hackathon is an event where participants with diverse skills collaborate to tackle global challenges. Participants form teams to brainstorm, design, and code, aiming to produce a working solution or prototype by the event's conclusion. Beyond fostering innovation and teamwork, EU Code Week hackathons offer a platform for young enthusiasts to learn, showcase their talents, and connect with like-minded peers.<br/><br/>
            Adapting the traditional hackathon format, the EU Code Week Hackathons take into consideration the age of the participants and cater to the unique skills, insights, and interests of adolescents.<br/><br/>
            The aim of the EU Code Week Hackathons is to inspire young people to develop their coding and problem-solving skills by engaging them in collaborative, creative, and innovative projects.
            </p>

        </section>
        
        <section class="codeweek-content-wrapper">
            <!-- Include the YouTube partial and pass the video ID -->
            @include('static.youtube', ['video_id' => 'fx0zJCpUTa8'])
        </section>

        <div class="pt-0 codeweek-content-wrapper">

            <h1 class="align-center">EU Code Week Hackathon 2024</h1>

            <p>
                EU Code Week Hackathons have an overarching theme to foster a sense of connection and belonging among participants across different countries. The central theme for EU Code Week 2024 Hackathons is <strong>Hello, Future! Technical Solutions for a changing world.</strong><br/><br/>
                From October 2024 and March 2025, the EU Code Week 2024 Hackathon invites young innovators, ages 15-19, to join exciting local hackathons. Team up with peers to brainstorm, collaborate and create digital solutions to tackle some of the global challenges!
                <br/><br/>
            To guide organisers in planning and delivering successful hackathons, <a target="_blank" href="/docs/EU_Code_Week_Hackathons_2024 Toolkit_Final.pdf">here is the EU Code Week Hackathons Toolkit.</a> In this Toolkit, you will find step-by-step instructions and tips for creating engaging and impactful events.  <br/><br/>
            All hackathons will take place online via <a target="_blank" href="https://eventornado.com/event/eu-codeweek-hackathon2024#home">Eventornado.</a> There will be one common online environment for all hackathons.<br/><br/>
            More details on local hackathons, registrations and hackathon platform are coming soon!<br/><br/></p>
            <!--<div class="align-center">
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


            </section> -->
            </div>
        </div>
    </section>
@endsection
