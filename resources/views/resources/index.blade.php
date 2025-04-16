@extends('layout.new_base')

@php
    $currentUrl = request()->url();
@endphp

@if(strpos($currentUrl, route('resources_all')) !== false)
    @section('title', 'Learn Coding with EU Code Week – Free Educational Resources')
    @section('description', 'Explore a collection of free resources, courses, and tutorials designed to help students and beginners learn coding at their own pace.')
@else
    @section('title', 'Free Coding Resources – EU Code Week')
    @section('description', 'Access a wide range of free coding resources, including lesson plans, tutorials, and activities for students, teachers, and coding enthusiasts.')
@endif

@section('content')


    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
          rel="stylesheet" type="text/css"/>

    <section id="codeweek-resources-page" class="bg-light-blue">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-blue-gradient pt-32 pb-0 md:py-40">
                <div class="w-full overflow-hidden pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex flex-col md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-28">
                        <div class="order-1 flex-1 px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                                @lang('menu.learn')
                            </h2>
                            <p class="text-xl font-normal md:text-2xl leading-8 text-[#333E48] p-0 max-md:max-w-full max-w-[525px]">
                                @lang('snippets.learn_and_teach_1')
                            </p>
                        </div>
                        <div class="order-0 md:order-2 flex flex-1 justify-center items-center z-10"></div>
                        <img
                            class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden"
                            loading="lazy"
                            src="/images/training/training_bg.png"
                            style="clip-path: ellipse(71% 73% at 40% 20%);"
                        />
                        <img
                            class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                            loading="lazy"
                            src="/images/training/training_bg.png"
                            style="clip-path: ellipse(70% 140% at 70% 25%);"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10 px-5 bg-white">
          <div class="max-w-[880px] mx-auto text-[16px] md:text-xl leading-[22px] md:leading-[30px] text-slate-500">@lang('snippets.learn_and_teach_2')</div>
        </section>

        <resource-form
                :prp-query="'{{$query}}'"
                :prp-levels="{{$selected_levels}}"
                :prp-types="{{$selected_types}}"
                :prp-programming-languages="{{$selected_programming_languages}}"
                :prp-categories="{{$selected_categories}}"
                :prp-languages="{{$selected_languages}}"
                :prp-subjects="{{$selected_subjects}}"
                :levels="{{ $levels }}"
                :programming-languages="{{ $programmingLanguages }}"
                :languages="{{ $languages }}"
                :categories="{{ $categories }}"
                :subjects="{{ $subjects }}"
                :types="{{ $types }}"
                :locale="'{{App::getLocale()}}'"
        ></resource-form>

    </section>

    <section class="relative overflow-hidden py-10 lg:py-20 px-5">
      <div class="w-full max-w-[907px] mx-auto bg-light-blue rounded-lg p-6 flex flex-col md:flex-row text-['Blinker'] gap-2">
        <img class="min-w-8 min-h-8" src="/images/icon_info.svg" />
        <div class="text-slate-500 text-[16px] leading-[22px] tablet:text-xl tablet:leading-7">
            <p class="font-semibold p-0 mb-2 tablet:mb-0">Copyright notice ©</p>
            <p class="font-normal p-0">
                <a class="font-semibold text-dark-blue underline" href="/training">The EU Code Week website</a> is a service supported by the European Commission Except where stated otherwise, content made available on this site is licensed under a <a class="font-semibold text-dark-blue underline" href="https://creativecommons.org/licenses/by-nc-sa/4.0/deed.en">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0) license</a> Licensing under Creative Commons licenses does not of itself affect the ownership of the copyright Content from third party websites is subject to their own copyright restrictions; please refer to the site of origin for more information.
            </p>
        </div>
    </div>
  </section>

@endsection
