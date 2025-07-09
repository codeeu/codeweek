@extends('layout.new_base')

@section('title', 'EU Code Week Toolkits – Organize & Promote Your Coding Event')
@section('description', 'Discover practical toolkits to help you organize, promote, and run engaging coding events during EU Code Week. Get started today!')
@php
    $list = [
        (object) ['label' => 'Presentations and Toolkits', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection
       <style>
       @media (min-width: 768px) {
            .hero-image {
                clip-path: ellipse(70% 120% at 70% -2%);
            }
        }
        </style>
@section('content')
    <section id="codeweek-get-involved" class="font-['Blinker'] overflow-hidden">
       <section class="flex overflow-hidden relative flex-col bg-violet-gradient">
            <div class="relative w-full transition-all">
                <div
                    class="relative flex flex-col justify-end w-full overflow-hidden md:p-0 md:flex-row md:items-center h-[760px]">
                    <div class="flex relative justify-start items-center w-full h-full duration-1000 home-activity">
                        <!-- Image with clip-path -->
                        <img class="absolute top-0 right-0 w-full md:w-[60vw] h-[50%]  md:h-full object-cover transition-all duration-300 hero-image"
                            src="images/get-involved-6.png"
                            />
                        <div
                            class="flex flex-col-reverse justify-between items-center mx-auto w-full max-md:h-full md:flex-row codeweek-container-lg">
                            <div class="flex justify-center items-center w-full h-full md:w-1/2">
                                <div
                                    class="px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 w-fit h-fit relative -top-6">
                                    <h1
                                        class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4">
                                          @lang('menu.toolkits')
                                    </h1>
                                    <p class="text-xl  md:text-2xl leading-8 text-[#333E48] p-0 mb-4 max-md:max-w-full max-w-[525px]">
                                      @lang('snippets.videos.1')
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="relative flex overflow-hidden bg-[#FFF] lg:py-12">
          <div class="absolute bg-[#FFEF99] rounded-full h-[280px] rotate-[-162.343deg] top-[198px] -left-[10rem] w-[280px] max-md:hidden" aria-hidden="true"></div>
                <div class="absolute right-6 bg-[#FFEF99] rounded-full h-[93px] rotate-[-162.343deg] top-[57px] -left-[10rem] w-[93px] max-md:hidden" aria-hidden="true"></div>
            <div class="relative max-lg:py-12 lg:pt-20 lg:pb-16 codeweek-container-lg">
                <div class=" bg-[#FFEF99] rounded-full h-[93px] absolute top-12 -right-8 z-10 rotate-[-162.343deg] w-[93px] max-md:hidden" aria-hidden="true"></div>
                <div class="flex overflow-hidden relative flex-col items-center">
                <div class="flex lg:gap-20 items-start mx-auto w-full max-w-[1428px] max-lg:flex-col">
                   <div class="relative w-full lg:w-1/2">
                    <img
                    src="{{asset('images/toolkits.png')}}"
                    alt="Toolkit preview"
                    class="object-cover relative z-50 w-full h-auto rounded-2xl md:max-w-1/3 xl:max-w-1/2"
                    />
                <div class="max-lg:hidden bg-[#FFEF99] rounded-full h-[118px] relative -top-8 left-12 z-10 rotate-[-162.343deg] w-[118px]" aria-hidden="true"></div>
                    </div>
                    <!-- Content section -->
                    <div class="flex flex-col flex-1 gap-6 lg:w-1/2">
                    <h4 class="text-[#1C4DA1] text-2xl md:text-4xl lg:leading-[44px] font-medium font-['Montserrat']">
                         @lang('snippets.toolkits.0')
                    </h4>

                    <div id="toolkit" class="text-[#333e48] text-xl font-normal mb-2 font-['Blinker'] leading-[30px]">
                        @include('_tookits')
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

</section>
   
@endsection
