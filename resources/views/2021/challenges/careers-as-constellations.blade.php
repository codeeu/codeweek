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
                    <div class="mt-2 text-5xl" style="color: #ffffff">@lang("challenges-content.careers-as-constellations.title")</div>
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
                        <div class="text-xl text-left text-blue-600">@lang('challenges-content.careers-as-constellations.activity-type')</div>
                        <ol class="ml-5 list-disc">
                            <li>@lang('challenges-content.careers-as-constellations.open-online-activity')</li>

                        </ol>
                    </div>


                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges-content.careers-as-constellations.name-of-org')</div>
                        <ol class="ml-5 list-disc">
                            <li>Hello Ruby? </li>

                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges-content.careers-as-constellations.language')</div>
                        <ol class="ml-5 list-disc">
                            <li>@lang('challenges-content.careers-as-constellations.english')</li>

                        </ol>
                    </div>


                    <div>



                </section>

                <section class="grid grid-cols-1 gap-6 mx-6 my-4 md:grid-cols-3">

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges-content.careers-as-constellations.type-of-org')</div>
                        <ol class="ml-5 list-disc">
                            <li>@lang('challenges-content.careers-as-constellations.private-business')</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges-content.careers-as-constellations.audience')</div>
                        <ol class="ml-5 list-disc">
                            <li>@lang('challenges-content.careers-as-constellations.secondary-school')</li>
                            <li>@lang('challenges-content.careers-as-constellations.higher-education')</li>
                            <li>@lang('challenges-content.careers-as-constellations.teachers')</li>
                        </ol>
                    </div>

                    <div>
                        <div class="text-xl text-left text-blue-600">@lang('challenges-content.careers-as-constellations.theme')</div>
                        <ol class="ml-5 list-disc">
                            <li>@lang('challenges-content.careers-as-constellations.themes.motivation-and-awareness-raising')</li>
                            <li>@lang('challenges-content.careers-as-constellations.themes.promoting-diversity')</li>
                        </ol>
                    </div>


                </section>


                <div class="text-base leading-6 text-left">

                    <section class="p-2 mt-6 bg-blue-100">
                        <div class="mt-2 text-3xl orange">
                            Description
                        </div>


                        <div class="mt-2">
                            @lang("challenges-content.$slug.description")
                        </div>
                    </section>


                    <section class="p-2">
                        <div class="leading-6">
                            <div class="mt-6 text-3xl orange">@lang('challenges-content.careers-as-constellations.start-date')</div>
                           <ul class="mt-2 ml-2 leading-7 checklist">


                                <li>27.2.2025 - 27.2.2026</li>
                            



                            </ul>
                            <div class="mt-6 text-3xl orange">@lang('challenges-content.careers-as-constellations.age-group')</div>
                            <ul class="mt-2 ml-2 leading-7 checklist">


                                <li>@lang("challenges-content.careers-as-constellations.age-groups.12")</li>

                            </ul>
                            <div class="mt-6 text-3xl orange">@lang('challenges-content.careers-as-constellations.time-required')</div>
                            <ul class="mt-2 ml-2 leading-7 checklist">


                                <li>@lang("challenges-content.careers-as-constellations.45–60")</li>

                            </ul>
                             <div class="mt-6 text-3xl orange">@lang('challenges-content.careers-as-constellations.group-size')</div>
                            <ul class="mt-2 ml-2 leading-7 checklist">


                                <li>@lang("challenges-content.careers-as-constellations.group-sizes.small")</li>

                            </ul>

                             <div class="mt-6 text-3xl orange">@lang('challenges-content.careers-as-constellations.required-materials')</div>
                            <ul class="mt-2 ml-2 leading-7 checklist">


                                <li>@lang("challenges-content.careers-as-constellations.materials.one")</li>
                                 <li>@lang("challenges-content.careers-as-constellations.materials.two")</li>
                                <li>@lang("challenges-content.careers-as-constellations.materials.three")</li>
                            </ul>
                        </div>
                    </section>

                    @include('2021.challenges._share')

                    <section class="p-2">
                       <p class="my-4 text-base leading-6 text-left"> This activity helps students map their personal interests and hobbies to potential careers in technology. By visualizing their skills and passions as constellations, students discover how careers are formed by connecting seemingly unrelated dots—just like in the night sky. No prior coding experience is required, and the activity fosters creative thinking about the future of work in technology. Share your class’s constellations! Use #CodeWeek and tag us—we’d love to see how your students connect their dots!</p>
                        <div class="text-3xl orange">@lang('challenges-content.careers-as-constellations.step-by-step-instructions')</div>


                        <div class="my-4 text-base font-bold leading-6 text-left">@lang('challenges-content.careers-as-constellations.title.one')</div>

                         <div class="my-4 text-base leading-6 text-left">@lang('challenges-content.careers-as-constellations.intro')</div>

                         <div class="my-4 text-base font-bold leading-6 text-left">@lang('challenges-content.careers-as-constellations.title.two')</div>
                          <ul class="mt-2 ml-2 leading-7 checklist">
                            @lang("challenges-content.careers-as-constellations.content.one")
                                 <li>@lang("challenges-content.careers-as-constellations.content.two")</li>
                                <li>@lang("challenges-content.careers-as-constellations.content.three")</li>
                                <li>@lang("challenges-content.careers-as-constellations.content.four")</li>
                            </ul>

                              <div class="my-4 text-base font-bold leading-6 text-left">@lang('challenges-content.careers-as-constellations.title.three')</div>
                          <ul class="mt-2 ml-2 leading-7 checklist">
                                 <li>@lang("challenges-content.careers-as-constellations.content.five")</li>
                                <li>@lang("challenges-content.careers-as-constellations.content.six")</li>
                                <li>@lang("challenges-content.careers-as-constellations.content.seven")</li>
                            </ul>

                     <div class="my-4 text-base font-bold leading-6 text-left">@lang('challenges-content.careers-as-constellations.title.four')</div>
                          <ul class="mt-2 ml-2 leading-7 checklist">
                                 <li>@lang("challenges-content.careers-as-constellations.content.eight")</li>
                                <li>@lang("challenges-content.careers-as-constellations.content.nine")</li>

                                @lang("challenges-content.careers-as-constellations.content.ten")

                                  <li>@lang("challenges-content.careers-as-constellations.content.eleven")</li>

                                   <li>@lang("challenges-content.careers-as-constellations.content.twelve")</li>
                                
                                   <li>@lang("challenges-content.careers-as-constellations.content.thirteen")</li>
                            </ul>


                        <div class="my-4 text-base font-bold leading-6 text-left">@lang('challenges-content.careers-as-constellations.title.five')</div>
                          <ul class="mt-2 ml-2 leading-7 checklist">
                                 <li>@lang("challenges-content.careers-as-constellations.content.fourteen")</li>
                                <li>@lang("challenges-content.careers-as-constellations.content.fifteen")</li>
                            </ul>
                    </section>
 @lang("challenges-content.careers-as-constellations.content.16")

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
