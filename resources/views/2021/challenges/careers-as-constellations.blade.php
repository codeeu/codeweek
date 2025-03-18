@extends('layout.new_base')

@php
    $slug = 'careers-as-constellations';
    $title = trans("challenges-content.$slug.title");

    $list = [
        (object) ['label' => 'Educational Resources', 'href' => '/educational-resources'],
        (object) ['label' => 'Challenges', 'href' => '/challenges'],
        (object) ['label' => $title, 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

<x-tailwind></x-tailwind>

@section('content')
    <section id="challenge-detail-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-orange-gradient pt-32 pb-0 md:py-32">
                <div class="w-full overflow-hidden pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex flex-col md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-28">
                        <div class="order-1 flex-1 px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                                @lang("challenges-content.$slug.title")
                            </h2>
                            <p class="text-xl font-normal md:text-2xl leading-8 text-[#333E48] p-0 max-md:max-w-full max-w-[525px]">
                                @include('2021.challenges._author', ['author' => __("challenges-content.$slug.author")])
                            </p>
                        </div>
                        <div class="order-0 md:order-2 flex flex-1 justify-center items-center z-10">
                            <button class="bg-yellow hover:bg-primary rounded-full w-20 h-20 duration-300 flex justify-center items-center">
                                <img class="duration-300 ml-2" src="/images/fi_play.svg" />
                            </button>
                        </div>
                        <img
                                class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden"
                                loading="lazy"
                                src="{{asset('img/2021/challenges/thumbnails/'.$slug.'.png')}}"
                                style="clip-path: ellipse(71% 73% at 40% 20%);"
                        />
                        <img
                                class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                                loading="lazy"
                                src="{{asset('img/2021/challenges/thumbnails/'.$slug.'.png')}}"
                                style="clip-path: ellipse(70% 140% at 70% 25%);"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section class="relative bg-yellow-50">
            <div class="relative py-10 md:py-20 codeweek-container-lg">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-y-6 lg:gap-16">
                    <div class="flex flex-col gap-6">
                        <div class="bg-white p-6 rounded-lg">
                            <p class="font-normal text-2xl p-0 mb-4">@lang('challenges-content.careers-as-constellations.activity-type')</p>
                            <ol class="list-decimal ml-4">
                                <li class="text-slate-500 p-0 text-default font-normal leading-7">@lang('challenges-content.careers-as-constellations.open-online-activity')</li>
                            </ol>
                        </div>
                        <div class="bg-white p-6 rounded-lg">
                            <p class="font-normal text-2xl p-0 mb-4">@lang('challenges-content.careers-as-constellations.name-of-org')</p>
                            <ol class="list-decimal ml-4">
                                <li class="text-slate-500 p-0 text-default font-normal leading-7">Hello Ruby?</li>
                            </ol>
                        </div>
                        <div class="bg-white p-6 rounded-lg">
                            <p class="font-normal text-2xl p-0 mb-4">@lang('challenges-content.careers-as-constellations.language')</p>
                            <ol class="list-decimal ml-4">
                                <li class="text-slate-500 p-0 text-default font-normal leading-7">
                                    @lang('challenges-content.careers-as-constellations.english')
                                </li>
                            </ol>
                        </div>
                        <div class="bg-white p-6 rounded-lg">
                            <p class="font-normal text-2xl p-0 mb-4">@lang('challenges-content.careers-as-constellations.type-of-org')</p>
                            <ol class="list-decimal ml-4">
                                <li class="text-slate-500 p-0 text-default font-normal leading-7">
                                    @lang('challenges-content.careers-as-constellations.private-business')
                                </li>
                            </ol>
                        </div>
                        <div class="bg-white p-6 rounded-lg">
                            <p class="font-normal text-2xl p-0 mb-4">@lang('challenges-content.careers-as-constellations.audience')</p>
                            <ol class="list-decimal ml-4">
                                <li class="text-slate-500 p-0 text-default font-normal leading-7">
                                    @lang('challenges-content.careers-as-constellations.secondary-school')
                                </li>
                                <li class="text-slate-500 p-0 text-default font-normal leading-7">
                                    @lang('challenges-content.careers-as-constellations.higher-education')
                                </li>
                                <li class="text-slate-500 p-0 text-default font-normal leading-7">
                                    @lang('challenges-content.careers-as-constellations.teachers')
                                </li>
                            </ol>
                        </div>
                        <div class="bg-white p-6 rounded-lg">
                            <p class="font-normal text-2xl p-0 mb-4">@lang('challenges-content.careers-as-constellations.theme')</p>
                            <ol class="list-decimal ml-4">
                                <li class="text-slate-500 p-0 text-default font-normal leading-7">
                                    @lang('challenges-content.careers-as-constellations.themes.motivation-and-awareness-raising')
                                </li>
                                <li class="text-slate-500 p-0 text-default font-normal leading-7">
                                    @lang('challenges-content.careers-as-constellations.themes.promoting-diversity')
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class=" bg-white px-6 py-8 lg:p-16 rounded-lg">
                            <p class="text-dark-blue font-['Montserrat'] font-medium text-[22px] leading-7 md:text-4xl p-0 mb-6">@lang("challenges-content.$slug.title")</p>
                            <div class="mb-6">
                                <p class="font-semibold text-2xl p-0 mb-2">@lang('challenges.common.description')</p>
                                <p class="font-normal text-default md:text-xl p-0 text-slate-500">
                                    @lang("challenges-content.$slug.description")
                                </p>
                            </div>
                            <div class="mb-6">
                                <p class="font-semibold text-2xl p-0 mb-2">@lang('challenges-content.careers-as-constellations.start-date')</p>
                                <ol class="list-decimal ml-4">
                                    <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                        27.2.2025 - 27.2.2026
                                    </li>
                                </ol>

                                <p class="font-semibold text-2xl p-0 mb-2">@lang('challenges-content.careers-as-constellations.age-group')</p>
                                <ol class="list-decimal ml-4">
                                    <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                        @lang("challenges-content.careers-as-constellations.age-groups.12")
                                    </li>
                                </ol>

                                <p class="font-semibold text-2xl p-0 mb-2">@lang('challenges-content.careers-as-constellations.time-required')</p>
                                <ol class="list-decimal ml-4">
                                    <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                        @lang("challenges-content.careers-as-constellations.45–60")
                                    </li>
                                </ol>

                                <p class="font-semibold text-2xl p-0 mb-2">@lang('challenges-content.careers-as-constellations.group-size')</p>
                                <ol class="list-decimal ml-4">
                                    <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                        @lang("challenges-content.careers-as-constellations.group-sizes.small")
                                    </li>
                                </ol>

                                <p class="font-semibold text-2xl p-0 mb-2">@lang('challenges-content.careers-as-constellations.required-materials')</p>
                                <ol class="list-decimal ml-4">
                                    <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                        @lang("challenges-content.careers-as-constellations.materials.one")
                                    </li>
                                    <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                        @lang("challenges-content.careers-as-constellations.materials.two")
                                    </li>
                                    <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                        @lang("challenges-content.careers-as-constellations.materials.three")
                                    </li>
                                </ol>
                            </div>

                            @include('2021.challenges._share')

                            <p class="font-normal text-default md:text-xl p-0 text-slate-500">
                                This activity helps students map their personal interests and hobbies to potential careers in technology. By visualizing their skills and passions as constellations, students discover how careers are formed by connecting seemingly unrelated dots—just like in the night sky. No prior coding experience is required, and the activity fosters creative thinking about the future of work in technology. Share your class’s constellations! Use #CodeWeek and tag us—we’d love to see how your students connect their dots!
                            </p>

                            <p class="font-semibold text-2xl p-0 mb-2">@lang('challenges-content.careers-as-constellations.step-by-step-instructions')</p>
                            <p class="font-semibold text-default md:text-xl p-0 text-slate-500 mb-2">
                                @lang('challenges-content.careers-as-constellations.title.one')
                            </p>
                            <div class="font-normal text-default md:text-xl p-0 text-slate-500">
                                @lang('challenges-content.careers-as-constellations.intro')
                            </div>

                            <p class="font-semibold text-default md:text-xl p-0 text-slate-500 my-2">
                                @lang('challenges-content.careers-as-constellations.title.two')
                            </p>
                            <div class="font-normal text-default md:text-xl p-0 text-slate-500">
                                @lang("challenges-content.careers-as-constellations.content.one")
                            </div>

                            <ol class="list-decimal ml-4">
                                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.two")
                                </li>
                                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.three")
                                </li>
                                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.four")
                                </li>
                            </ol>

                            <p class="font-semibold text-default md:text-xl p-0 text-slate-500 my-2">
                                @lang('challenges-content.careers-as-constellations.title.three')
                            </p>
                            <ol class="list-decimal ml-4">
                                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.five")
                                </li>
                                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.six")
                                </li>
                                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.seven")
                                </li>
                            </ol>
                            <p class="font-semibold text-default md:text-xl p-0 text-slate-500 my-2">
                                @lang('challenges-content.careers-as-constellations.title.four')
                            </p>
                            <ol class="list-decimal ml-4">
                                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.eight")
                                </li>
                                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.nine")
                                </li>
                            </ol>
                            <div class="font-semibold text-default md:text-xl text-slate-500">
                                @lang("challenges-content.careers-as-constellations.content.ten")
                            </div>
                            <ol class="list-decimal ml-4">
                                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.eleven")
                                </li>
                                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.twelve")
                                </li>
                                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.thirteen")
                                </li>
                            </ol>
                            <p class="font-semibold text-default md:text-xl p-0 text-slate-500 my-2">
                                @lang('challenges-content.careers-as-constellations.title.five')
                            </p>
                            <ol class="list-decimal ml-4">
                                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.fourteen")
                                </li>
                                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.fifteen")
                                </li>
                            </ol>

                            <div class="font-semibold text-default md:text-xl p-0 text-slate-500">@lang("challenges-content.careers-as-constellations.content.16")</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection