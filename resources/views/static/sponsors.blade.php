@extends('layout.new_base')

@section('title', 'EU Code Week Partners – Join Our Network for Digital Education')
@section('description', 'Collaborate with EU Code Week as a partner and help spread digital literacy and coding skills across Europe.')
@php
    $list = [
      (object) ['label' => '', 'href' => ''],
    ];
@endphp
@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')
    <section id="codeweek-sponsors-page" class="font-['Blinker'] overflow-hidden">
       <section class="flex overflow-hidden relative flex-col bg-violet-gradient">
       <style>
       @media (min-width: 768px) {
            .hero-image {
                clip-path: ellipse(70% 120% at 70% -2%);
            }
        }
        </style>
            <div class="relative w-full transition-all">
                <div
                    class="relative flex flex-col justify-end w-full overflow-hidden md:p-0 md:flex-row md:items-center h-[760px]">
                    <div class="flex relative justify-start items-center w-full h-full duration-1000 home-activity">
                        <!-- Image with clip-path -->
                        <img class="absolute top-0 right-0 w-full md:w-[60vw] h-[50%]  md:h-full object-cover transition-all duration-300 hero-image"
                            src="images/sponsors/1.png"
                            />
                        <div
                            class="flex flex-col-reverse justify-between items-center mx-auto w-full max-md:h-full md:flex-row codeweek-container-lg">
                            <div class="flex justify-center items-center w-full md:w-1/2">
                                <div
                                    class="px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 w-full h-fit relative -top-6">
                                    <h4
                                        class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4">
                                      @lang('about.partners_and_sponsors')
                                    </h4>
                                    <p
                                        class="text-xl  md:text-2xl leading-8 text-[#333E48] p-0 mb-4 max-md:max-w-full max-w-[525px]">
                                       Uniting Europe’s leading industry, education, tech and communication partners to drive digital skills and innovation for a brighter, connected future.
                                    </p>
                                </div>
                            </div>
                            <button class="hidden justify-center items-center w-full md:w-1/2 group max-md:h-full">
                                <svg class="z-50 transition-all duration-300" width="80" height="80"
                                    viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="80" height="80" rx="40"
                                        class="transition-all duration-300 fill-[#FFD700] group-hover:fill-white" />
                                    <path d="M31.3335 25L54.6668 40L31.3335 55V25Z" stroke="black" stroke-width="3.33333"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="overflow-hidden relative bg-[#F2FBFE]">
                            <!-- Filter Section -->
                    <section class="flex flex-col justify-center px-16 py-10 font-bold text-center max-md:px-5">
                        <div class="flex flex-col items-center w-full max-md:max-w-full">
                            <h2 class="hidden text-4xl leading-tight text-orange-500"></h2>
                            <p class="hidden pt-4 w-2/3 text-base font-light leading-6 text-black"></p>
                            @livewire('partner-filter-component')
                        </div>
                    </section>
            <div class="absolute w-full h-full bg-yellow-50 lg:hidden" style="clip-path: ellipse(270% 90% at 38% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-yellow-50 md:block" style="clip-path: ellipse(108% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-yellow-50sm:block" style="clip-path: ellipse(88% 90% at 50% 90%);"></div>
            <div class="relative py-14 lg:pt-24 lg:pb-24">
                <div class="codeweek-container-lg">
                    <!-- Partner Content Section -->
                    <section class="lg:pt-8 lg:px-6 max-lg:pb-12">
                        @livewire('partner-content-component')
                    </section>
                 </div>
            </div>
        </section>
    </section>
@endsection
