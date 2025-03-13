@extends('layout.new_base')

@php
    $list = [
        (object) ['label' => 'Educational Resources', 'href' => '/educational-resources'],
        (object) ['label' => 'Hackathons', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('title', 'EU Code Week Hackathons – Innovate, Code & Compete')
@section('description', 'Join EU Code Week Hackathons, where young minds collaborate to solve real-world challenges through coding and innovation.')

@section('content')
    <section id="hackathons-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-orange-gradient pt-32 pb-0 md:py-32">
                <div class="w-full overflow-hidden pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex flex-col md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-28">
                        <div class="order-1 flex-1 px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                                Hackathons
                            </h2>
                            <p class="text-xl font-normal md:text-2xl leading-8 text-[#333E48] p-0 max-md:max-w-full max-w-[525px]">
                                Bring your ideas to life!
                            </p>
                        </div>
                        <div class="order-0 md:order-2 flex flex-1 justify-center items-center z-10">

                        </div>
                        <img
                            class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden"
                            loading="lazy"
                            src="/images/hackathons/hackathons_bg.png"
                            style="clip-path: ellipse(71% 73% at 40% 20%);"
                        />
                        <img
                            class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                            loading="lazy"
                            src="/images/hackathons/hackathons_bg.png"
                            style="clip-path: ellipse(70% 140% at 70% 25%);"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-10">
            <div class="relative z-10 py-10 md:py-20 codeweek-container-lg flex justify-center">
                <div class="w-full max-w-[880px] gap-2">
                    <h2 class="text-dark-blue text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] mb-6">
                        Hackathons optional section
                    </h2>
                    <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                        A hackathon is an event where participants with diverse skills collaborate to tackle global challenges. Participants form teams to brainstorm, design, and code, aiming to produce a working solution or prototype by the event's conclusion. Beyond fostering innovation and teamwork, EU Code Week hackathons offer a platform for young enthusiasts to learn, showcase their talents, and connect with like-minded peers.
                    </p>
                    <p class="text-[#333E48] font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                        Adapting the traditional hackathon format, the EU Code Week Hackathons take into consideration the age of the participants and cater to the unique skills, insights, and interests of adolescents.
                        The aim of the EU Code Week Hackathons is to inspire young people to develop their coding and problem-solving skills by engaging them in collaborative, creative, and innovative projects.
                    </p>
                </div>
            </div>
            <div
                class="animation-element move-background duration-[1.5s] absolute z-0 bottom-10 md:bottom-auto md:top-1/3 -right-14 md:-right-40 w-28 md:w-72 h-28 md:h-72 bg-[#FFEF99] rounded-full hidden lg:block"
                style="transform: translate(-16px, -24px)"
            ></div>
            <div
                class="animation-element move-background duration-[1.5s] absolute z-0 lg:-bottom-20 xl:-bottom-36 right-40 w-28 h-28 hidden lg:block bg-[#FFEF99] rounded-full"
                style="transform: translate(-16px, -24px)"
            ></div>
        </section>

        <section class="relative overflow-hidden">
            <div class="absolute w-full h-full bg-yellow-50 md:hidden" style="clip-path: ellipse(270% 90% at 38% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden md:block lg:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden lg:block xl:hidden" style="clip-path: ellipse(128% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-yellow-50 hidden xl:block" style="clip-path: ellipse(93% 90% at 50% 90%);"></div>
            <div class="codeweek-container-lg relative pt-20 pb-16 md:pt-40 md:pb-28">
                <div class="flex flex-col lg:flex-row gap-6 lg:gap-20">
                    <div class="relative flex-1 flex items-center overflow-hidden">
                        <img src="{{asset('images/hackathons/hackathon.png')}}" class="rounded-lg h-full object-cover">
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                            @include('layout.video-player', [
                                'id' => 'hackathons-video',
                                'src' => 'https://www.youtube.com/embed/fx0zJCpUTa8',
                            ])
                        </div>
                    </div>
                    <div class="flex-1">
                        <p class="text-dark-blue text-[22px] md:text-4xl font-medium font-['Montserrat'] mb-6 p-0">
                            EU Code Week Hackathon 2024
                        </p>
                        <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0 mb-6">
                            EU Code Week Hackathons have an overarching theme to foster a sense of connection and belonging among participants across different countries. The central theme for EU Code Week 2024 Hackathons is Hello, Future! Technical Solutions for a changing world.
                            From October 2024 and March 2025, the EU Code Week 2024 Hackathon invites young innovators, ages 15-19, to join exciting local hackathons. Team up with peers to brainstorm, collaborate and create digital solutions to tackle some of the global challenges!
                        </p>
                        <p class="text-slate-500 font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0 mb-6">
                            To guide organisers in planning and delivering successful hackathons, here is the EU Code Week Hackathons Toolkit. In this Toolkit, you will find step-by-step instructions and tips for creating engaging and impactful events.
                            All hackathons will take place online via Eventornado. There will be one common online environment for all hackathons.
                            More details on local hackathons, registrations and hackathon platform are coming soon!
                        </p>
                        <div class="flex flex-col tablet:flex-row lg:flex-col 2xl:flex-row gap-x-2 gap-y-4">
                            <a
                                class="inline-block bg-primary hover:bg-hover-orange rounded-full py-4 px-6 md:px-10 font-semibold text-base w-full md:w-auto text-center text-[#20262C] transition-all duration-300"
                                target="_blank" href="https://eventornado.com/event/eu-codeweek-hackathon2024#home"
                            >
                                Register for Hackathon 2025
                            </a>
                            <a
                                class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                target="_blank" href="/docs/EU_Code_Week_Hackathons_2024 Toolkit_Final.pdf"
                            >
                                <span>Hackathon 2025 Toolkit</span>
                                <div class="flex gap-2 w-4 overflow-hidden">
                                    <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                                    <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
