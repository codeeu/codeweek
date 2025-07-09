@extends('layout.new_base')

@section('title', 'EU Code Week Values – Empowering Digital Skills for All')
@section('description', 'Discover the core values of EU Code Week: inclusion, innovation, collaboration, and digital empowerment for everyone.')
@php
    $list = [
        (object) ['label' => 'Our Values', 'href' => ''],
    ];
@endphp
       <style>
       @media (min-width: 768px) {
            .hero-image {
                clip-path: ellipse(70% 120% at 70% -2%);
            }
        }
        </style>
@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection
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
                                             @lang('menu.values')
                                    </h1>
                                    <p class="text-xl  md:text-2xl leading-8 text-[#333E48] p-0 mb-4 max-md:max-w-full max-w-[525px]">
                                      @lang('snippets.videos.1')
                                    </p>
                                </div>
                            </div>
                            <a href="https://www.youtube.com/watch?v=ENHjEgcrSZI&list=PLnqp3yQre_1hexUEMtOdNI9J5TtAVMGaq" target="_blank" class="flex z-50 justify-center items-center w-full md:w-1/2 group max-md:h-full">
                                <svg class="z-50 transition-all duration-300" width="80" height="80"
                                    viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="80" height="80" rx="40"
                                        class="transition-all duration-300 fill-[#FFD700] group-hover:fill-white" />
                                    <path d="M31.3335 25L54.6668 40L31.3335 55V25Z" stroke="black" stroke-width="3.33333"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <section class="relative z-10">
        <div class="flex relative z-10 justify-center py-10 md:py-20 codeweek-container-lg">
            <div class="w-full max-w-[880px] gap-2">
                <h2 class="text-dark-blue text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] mb-6">
                   @lang('values.title')
                </h2>
                 <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                  @lang('values.1.content')
                </p>
                <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                  @lang('values.description.1.1') <a
                        href="{{route('ambassadors')}}">@lang('values.description.1.2')</a>@lang('values.description.1.3')
                <a href="https://ec.europa.eu/digital-single-market/en/eu-code-week">@lang('values.description.1.4')</a> @lang('values.description.1.5')
                <br/><br/>
                @lang('values.description.2')
                <br/><br/>
                @lang('values.description.3')
                <br/><br/>
                @lang('values.description.4')
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
    
    <section class="overflow-hidden relative">
            <div class="absolute w-full h-full bg-yellow-50 md:hidden" style="clip-path: ellipse(370% 90% at 38% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-yellow-50 md:block lg:hidden" style="clip-path: ellipse(488% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-yellow-50 lg:block xl:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-yellow-50 xl:block" style="clip-path: ellipse(158% 90% at 50% 90%);"></div>
            <div class="relative pt-20 pb-16 codeweek-container-lg md:pt-40 md:pb-28">
                <div class="flex flex-col gap-10 items-center w-full lg:flex-row">
                    <div class="lg:px-6 my-auto w-full max-w-[674px] max-md:max-w-full">
                        <h2 class="text-4xl font-medium tracking-tighter leading-none text-blue-800 max-md:max-w-full">
                           1. @lang('values.1.title')
                        </h2>
                        <p class="mt-6 text-xl leading-8 text-gray-700 max-md:max-w-full">
                            @lang('values.1.content')
                        </p>
                    </div>
                    <div class="relative my-auto w-full max-w-[674px] max-md:max-w-full">
                        <img src="{{asset('images/values/1.png')}}"  loading="lazy" class="static-image object-cover w-full rounded-2xl aspect-[1.5] max-md:max-w-full" width="160vh">
                        <a href="https://www.youtube.com/watch?v=ENHjEgcrSZI" target="_blank" rel="noreferer noopener" class="flex absolute top-0 right-0 left-0 z-50 justify-center items-center w-full h-full group">
                                <svg class="z-50 transition-all duration-300" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="80" height="80" rx="40" class="transition-all duration-300 fill-[#FFD700] group-hover:fill-white"></rect>
                                    <path d="M31.3335 25L54.6668 40L31.3335 55V25Z" stroke="black" stroke-width="3.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                    </div>
                </div>
            </div>
    </section>

     <section class="overflow-hidden relative">
            <div class="absolute w-full h-full bg-white lg:bg-yellow-50 md:hidden" style="clip-path: ellipse(370% 90% at 38% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-white md:block lg:hidden" style="clip-path: ellipse(488% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-white lg:block xl:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-white xl:block" style="clip-path: ellipse(158% 90% at 50% 90%);"></div>
            <div class="relative pt-20 pb-16 codeweek-container-lg md:pt-40 md:pb-28">
                <div class="flex flex-col gap-10 items-center w-full lg:flex-row-reverse">
                    <div class="lg:px-6 my-auto w-full max-w-[674px] max-md:max-w-full">
                        <h2 class="text-4xl font-medium tracking-tighter leading-none text-blue-800 max-md:max-w-full">
                           2. @lang('values.2.title')
                        </h2>
                        <p class="mt-6 text-xl leading-8 text-gray-700 max-md:max-w-full">
                           @lang('values.2.content')
                        </p>
                    </div>
                    <div class="relative my-auto w-full max-w-[674px] max-md:max-w-full">
                        <img src="{{asset('images/values/2.png')}}"  loading="lazy" class="static-image object-cover w-full rounded-2xl aspect-[1.5] max-md:max-w-full" width="160vh">
                        <a href="https://www.youtube.com/watch?v=cbg7LgbzlD8" target="_blank" rel="noreferer noopener" class="flex absolute top-0 right-0 left-0 z-50 justify-center items-center w-full h-full group">
                                <svg class="z-50 transition-all duration-300" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="80" height="80" rx="40" class="transition-all duration-300 fill-[#FFD700] group-hover:fill-white"></rect>
                                    <path d="M31.3335 25L54.6668 40L31.3335 55V25Z" stroke="black" stroke-width="3.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                    </div>
                </div>
            </div>
    </section>

     <section class="overflow-hidden relative">
            <div class="absolute w-full h-full bg-yellow-50 md:hidden" style="clip-path: ellipse(370% 90% at 38% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-yellow-50 md:block lg:hidden" style="clip-path: ellipse(488% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-yellow-50 lg:block xl:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-yellow-50 xl:block" style="clip-path: ellipse(158% 90% at 50% 90%);"></div>
            <div class="relative pt-20 pb-16 codeweek-container-lg md:pt-40 md:pb-28">
                <div class="flex flex-col gap-10 items-center w-full lg:flex-row">
                    <div class="lg:px-6 my-auto w-full max-w-[674px] max-md:max-w-full">
                        <h2 class="text-4xl font-medium tracking-tighter leading-none text-blue-800 max-md:max-w-full">
                           3. @lang('values.3.title')
                        </h2>
                        <p class="mt-6 text-xl leading-8 text-gray-700 max-md:max-w-full">
                          @lang('values.3.content.1') <a
                                href="{{route('resources_all')}}">@lang('values.3.content.2')</a> @lang('values.3.content.3')
                        <a href="{{route('events_map')}}">@lang('values.3.content.4')</a> @lang('values.3.content.5')
                        </p>
                    </div>
                    <div class="relative my-auto w-full max-w-[674px] max-md:max-w-full">
                        <img src="{{asset('images/values/3.png')}}"  loading="lazy" class="static-image object-cover w-full rounded-2xl aspect-[1.5] max-md:max-w-full" width="160vh">
                        <a href="https://www.youtube.com/watch?v=LGLmjrx22ZE" target="_blank" rel="noreferer noopener" class="flex absolute top-0 right-0 left-0 z-50 justify-center items-center w-full h-full group">
                                <svg class="z-50 transition-all duration-300" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="80" height="80" rx="40" class="transition-all duration-300 fill-[#FFD700] group-hover:fill-white"></rect>
                                    <path d="M31.3335 25L54.6668 40L31.3335 55V25Z" stroke="black" stroke-width="3.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                    </div>
                </div>
            </div>
    </section>


    <section class="overflow-hidden relative">
            <div class="absolute w-full h-full lg:bg-yellow-50 md:hidden" style="clip-path: ellipse(370% 90% at 38% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-white md:block lg:hidden" style="clip-path: ellipse(488% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-white lg:block xl:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-white xl:block" style="clip-path: ellipse(158% 90% at 50% 90%);"></div>
            <div class="relative pt-20 pb-16 codeweek-container-lg md:pt-40 md:pb-28">
                <div class="flex flex-col gap-10 items-center w-full lg:flex-row-reverse">
                    <div class="lg:px-6 my-auto w-full max-w-[674px] max-md:max-w-full">
                        <h2 class="text-4xl font-medium tracking-tighter leading-none text-blue-800 max-md:max-w-full">
                          4. @lang('values.4.title')
                        </h2>
                        <p class="mt-6 text-xl leading-8 text-gray-700 max-md:max-w-full">
                            @lang('values.4.content.1')<br/><br/>
                        <a href="{{route('codeweek4all')}}">@lang('values.4.content.2')</a> @lang('values.4.content.3')
                        </p>
                    </div>
                    <div class="relative my-auto w-full max-w-[674px] max-md:max-w-full">
                        <img src="{{asset('images/values/4.png')}}"  loading="lazy" class="static-image object-cover w-full rounded-2xl aspect-[1.5] max-md:max-w-full" width="160vh">
                        <a href="https://www.youtube.com/watch?v=oU2kG_Z_EvI" target="_blank" rel="noreferer noopener" class="flex absolute top-0 right-0 left-0 z-50 justify-center items-center w-full h-full group">
                                <svg class="z-50 transition-all duration-300" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="80" height="80" rx="40" class="transition-all duration-300 fill-[#FFD700] group-hover:fill-white"></rect>
                                    <path d="M31.3335 25L54.6668 40L31.3335 55V25Z" stroke="black" stroke-width="3.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                    </div>
                </div>
            </div>
    </section>

    <section class="overflow-hidden relative">
            <div class="absolute w-full h-full bg-yellow-50 md:hidden" style="clip-path: ellipse(370% 90% at 38% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-yellow-50 md:block lg:hidden" style="clip-path: ellipse(488% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-yellow-50 lg:block xl:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-yellow-50 xl:block" style="clip-path: ellipse(158% 90% at 50% 90%);"></div>
            <div class="relative pt-20 pb-16 codeweek-container-lg md:pt-40 md:pb-28">
                <div class="flex flex-col gap-10 items-center w-full lg:flex-row">
                    <div class="lg:px-6 my-auto w-full max-w-[674px] max-md:max-w-full">
                        <h2 class="text-4xl font-medium tracking-tighter leading-none text-blue-800 max-md:max-w-full">
                              5. @lang('values.5.title')
                        </h2>
                        <p class="mt-6 text-xl leading-8 text-gray-700 max-md:max-w-full">
                             @lang('values.5.content.1') <a
                                href="{{route('resources_all')}}">@lang('values.5.content.2')</a> @lang('values.5.content.3')
                        </p>
                    </div>
                    <div class="relative my-auto w-full max-w-[674px] max-md:max-w-full">
                        <img src="{{asset('images/values/5.png')}}"  loading="lazy" class="static-image object-cover w-full rounded-2xl aspect-[1.5] max-md:max-w-full" width="160vh">
                        <a href="https://www.youtube.com/watch?v=4QeLQWUtttc" target="_blank" rel="noreferer noopener" class="flex absolute top-0 right-0 left-0 z-50 justify-center items-center w-full h-full group">
                                <svg class="z-50 transition-all duration-300" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="80" height="80" rx="40" class="transition-all duration-300 fill-[#FFD700] group-hover:fill-white"></rect>
                                    <path d="M31.3335 25L54.6668 40L31.3335 55V25Z" stroke="black" stroke-width="3.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                    </div>
                </div>
            </div>
    </section>


     <section class="overflow-hidden relative">
            <div class="absolute w-full h-full lg:bg-yellow-50 md:hidden" style="clip-path: ellipse(370% 90% at 38% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-white md:block lg:hidden" style="clip-path: ellipse(488% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-white lg:block xl:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-white xl:block" style="clip-path: ellipse(158% 90% at 50% 90%);"></div>
            <div class="relative pt-20 pb-16 codeweek-container-lg md:pt-40 md:pb-28">
                <div class="flex flex-col gap-10 items-center w-full lg:flex-row-reverse">
                    <div class="lg:px-6 my-auto w-full max-w-[674px] max-md:max-w-full">
                        <h2 class="text-4xl font-medium tracking-tighter leading-none text-blue-800 max-md:max-w-full">
                         6. @lang('values.6.title')
                        </h2>
                        <p class="mt-6 text-xl leading-8 text-gray-700 max-md:max-w-full">
                              @lang('values.6.content')
                        </p>
                    </div>
                    <div class="relative my-auto w-full max-w-[674px] max-md:max-w-full">
                        <img src="{{asset('images/values/6.png')}}"  loading="lazy" class="static-image object-cover w-full rounded-2xl aspect-[1.5] max-md:max-w-full" width="160vh">
                        <a href="https://www.youtube.com/watch?v=iq-rnRcb0Mg" target="_blank" rel="noreferer noopener" class="flex absolute top-0 right-0 left-0 z-50 justify-center items-center w-full h-full group">
                                <svg class="z-50 transition-all duration-300" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="80" height="80" rx="40" class="transition-all duration-300 fill-[#FFD700] group-hover:fill-white"></rect>
                                    <path d="M31.3335 25L54.6668 40L31.3335 55V25Z" stroke="black" stroke-width="3.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                    </div>
                </div>
            </div>
    </section>


    <section class="overflow-hidden relative">
            <div class="absolute w-full h-full bg-yellow-50 md:hidden" style="clip-path: ellipse(370% 90% at 38% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-yellow-50 md:block lg:hidden" style="clip-path: ellipse(488% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-yellow-50 lg:block xl:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-yellow-50 xl:block" style="clip-path: ellipse(158% 90% at 50% 90%);"></div>
            <div class="relative pt-20 pb-16 codeweek-container-lg md:pt-40 md:pb-28">
                <div class="flex flex-col gap-10 items-center w-full lg:flex-row">
                    <div class="lg:px-6 my-auto w-full max-w-[674px] max-md:max-w-full">
                        <h2 class="text-4xl font-medium tracking-tighter leading-none text-blue-800 max-md:max-w-full">
                          7. @lang('values.7.title')
                        </h2>
                        <p class="mt-6 text-xl leading-8 text-gray-700 max-md:max-w-full">
                            @lang('values.7.content')
                        </p>
                    </div>
                    <div class="relative my-auto w-full max-w-[674px] max-md:max-w-full">
                        <img src="{{asset('images/values/7.png')}}"  loading="lazy" class="static-image object-cover w-full rounded-2xl aspect-[1.5] max-md:max-w-full" width="160vh">
                        <a href="https://www.youtube.com/watch?v=6jTgOeKuY_o" target="_blank" rel="noreferer noopener" class="flex absolute top-0 right-0 left-0 z-50 justify-center items-center w-full h-full group">
                                <svg class="z-50 transition-all duration-300" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="80" height="80" rx="40" class="transition-all duration-300 fill-[#FFD700] group-hover:fill-white"></rect>
                                    <path d="M31.3335 25L54.6668 40L31.3335 55V25Z" stroke="black" stroke-width="3.33333" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                    </div>
                </div>
            </div>
    </section>

</section>
   
@endsection
