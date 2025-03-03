@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')
    @php
        $slug = 'careers-as-constellations';
        //
    @endphp

    <section id="codeweek-schools-page" class="codeweek-page">


        <section class="flex flex-row justify-between" style="background-color: #CE80A5">
            <div class="flex items-center justify-center w-full">
                <div class="m-12 text-center">
                    <div class="w-full text-xl text-white"><a class="text-black"
                            href="{{ route('challenges') }}">@lang('challenges.title')</a>
                    </div>
                    <div class="mt-2 text-5xl" style="color: #ffffff">@lang("challenges-content.$slug.title")</div>
                </div>
            </div>

            <div class="hidden md:w-10/12 md:flex">
                <img src="{{ asset('img/2021/challenges/thumbnails/' . $slug . '.png') }}">


            </div>

        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                @include('2021.challenges._author', ['author' => __("challenges-content.$slug.author")]) 

                <section class="grid grid-cols-1 gap-6 mx-6 my-4 md:grid-cols-3">

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.activity-type')</div>
                        <ol class="ml-5 list-disc">
                            <li>@lang('challenges.common.open-online-activity')</li>

                        </ol>
                    </div>


                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.name-of-org')</div>
                        <ol class="ml-5 list-disc">
                            <li>Hello Ruby? </li>

                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.language')</div>
                        <ol class="ml-5 list-disc">
                            <li>@lang('challenges.common.english')</li>

                        </ol>
                    </div>


                    <div>



                </section>

                <section class="grid grid-cols-1 gap-6 mx-6 my-4 md:grid-cols-3">

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.type-of-org')</div>
                        <ol class="ml-5 list-disc">
                            <li>@lang('challenges.common.private-business')</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.audience')</div>
                        <ol class="ml-5 list-disc">
                            <li>@lang('challenges.common.secondary-school')</li>
                            <li>@lang('challenges.common.higher-education')</li>
                            <li>@lang('challenges.common.teachers')</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges.common.theme')</div>
                        <ol class="ml-5 list-disc">
                            <li>@lang('challenges.common.themes.motivation-and-awareness-raising')</li>
                            <li>@lang('challenges.common.themes.promoting-diversity')</li>
                        </ol>
                    </div>


                </section>


                <div class="text-base leading-6 text-left">

                    <section class="p-2 mt-6 bg-blue-100">
                        <div class="mt-2 text-3xl orange">
                            @lang('challenges.common.description')
                        </div>


                        <div class="mt-2">
                            @lang("challenges-content.$slug.description")
                        </div>
                    </section>


                    <section class="p-2">
                        <div class="leading-6">
                            <div class="mt-6 text-3xl orange">@lang('challenges.common.start-date')</div>
                           <ul class="mt-2 ml-2 leading-7 checklist">


                                <li>27.2.2025 - 27.2.2026</li>
                            



                            </ul>
                            <div class="mt-6 text-3xl orange">@lang('challenges.common.age-group')</div>
                            <ul class="mt-2 ml-2 leading-7 checklist">


                                <li>@lang("challenges.common.age-groups.12")</li>

                            </ul>
                            <div class="mt-6 text-3xl orange">@lang('challenges.common.time-required')</div>
                            <ul class="mt-2 ml-2 leading-7 checklist">


                                <li>@lang("challenges.common.45–60")</li>

                            </ul>
                             <div class="mt-6 text-3xl orange">@lang('challenges.common.group-size')</div>
                            <ul class="mt-2 ml-2 leading-7 checklist">


                                <li>@lang("challenges.common.group-sizes.small")</li>

                            </ul>

                             <div class="mt-6 text-3xl orange">@lang('challenges.common.required-materials')</div>
                            <ul class="mt-2 ml-2 leading-7 checklist">


                                <li>@lang("challenges.common.materials.one")</li>
                                 <li>@lang("challenges.common.materials.two")</li>
                                <li>@lang("challenges.common.materials.three")</li>
                            </ul>
                        </div>
                    </section>

                    @include('2021.challenges._share')

                    <section class="p-2">
                        <div class="text-3xl orange">@lang('challenges.common.step-by-step-instructions')</div>


                        <div class="my-4 text-base font-bold leading-6 text-left">@lang('challenges.common.title.one')</div>

                         <div class="my-4 text-base leading-6 text-left">@lang('challenges.common.intro')</div>

                         <div class="my-4 text-base font-bold leading-6 text-left">@lang('challenges.common.title.two')</div>
                          <ul class="mt-2 ml-2 leading-7 checklist">
                            @lang("challenges.common.content.one")
                                 <li>@lang("challenges.common.content.two")</li>
                                <li>@lang("challenges.common.content.three")</li>
                                <li>@lang("challenges.common.content.four")</li>
                            </ul>

                              <div class="my-4 text-base font-bold leading-6 text-left">@lang('challenges.common.title.three')</div>
                          <ul class="mt-2 ml-2 leading-7 checklist">
                                 <li>@lang("challenges.common.content.five")</li>
                                <li>@lang("challenges.common.content.six")</li>
                                <li>@lang("challenges.common.content.seven")</li>
                            </ul>

                     <div class="my-4 text-base font-bold leading-6 text-left">@lang('challenges.common.title.four')</div>
                          <ul class="mt-2 ml-2 leading-7 checklist">
                                 <li>@lang("challenges.common.content.eight")</li>
                                <li>@lang("challenges.common.content.nine")</li>

                                @lang("challenges.common.content.ten")

                                  <li>@lang("challenges.common.content.eleven")</li>

                                   <li>@lang("challenges.common.content.twelve")</li>
                                
                                   <li>@lang("challenges.common.content.thirteen")</li>
                            </ul>


                        <div class="my-4 text-base font-bold leading-6 text-left">@lang('challenges.common.title.five')</div>
                          <ul class="mt-2 ml-2 leading-7 checklist">
                                 <li>@lang("challenges.common.content.fourteen")</li>
                                <li>@lang("challenges.common.content.fifteen")</li>
                            </ul>
                    </section>
 @lang("challenges.common.content.16")

                </div>

              
            </div>
        </section>
    </section>
@endsection

@section('extra-css')
    <style>
        ul.checklist li:before {
            content: '• ';
            color: #ee6a2c;
            font-weight: bold;
        }
    </style>
@endsection
