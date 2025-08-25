@extends('layout.new_base')

@php
    $slug   = 'careers-as-constellations';
    $locale = app()->getLocale();

    // Always return an ARRAY (for list-like keys)
    $tarr = function (string $key) use ($locale) {
        $val = trans($key, [], $locale);
        return is_array($val) ? $val : (strlen((string) $val) ? [$val] : []);
    };

    // Always return a STRING (for scalar keys that might be arrays in some locales)
    $ts = function (string $key, string $fallback = '') use ($locale) {
        $val = trans($key, [], $locale);
        if (is_array($val)) {
            $flat = array_filter($val, fn ($v) => is_scalar($v));
            return $flat ? implode(', ', array_map('strval', $flat)) : $fallback;
        }
        $val = (string) $val;
        return $val !== '' ? $val : $fallback;
    };

    $title = $ts("challenges-content.$slug.title");
    $desc  = $ts("challenges-content.$slug.description");

    $list = [
        (object) ['label' => 'Educational Resources', 'href' => '/educational-resources'],
        (object) ['label' => 'Challenges', 'href' => '/challenges'],
        (object) ['label' => $title, 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('title', $title)
@section('description', $desc)

<x-tailwind></x-tailwind>

@section('content')
    <section id="challenge-detail-page" class="font-['Blinker'] overflow-hidden">
        <section class="flex overflow-hidden relative">
            <div class="flex relative pt-32 pb-0 w-full transition-all bg-orange-gradient md:py-32">
                <div class="flex overflow-hidden flex-col flex-shrink-0 justify-end pb-10 w-full md:p-0 md:flex-row md:items-center">
                    <div class="flex flex-col gap-28 duration-1000 codeweek-container-lg md:flex-row md:items-center md:gap-4 xl:gap-28">
                        <div class="order-1 flex-1 px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                                @lang("challenges-content.$slug.title")
                            </h2>
                            <p class="text-xl font-normal md:text-2xl leading-8 text-[#333E48] p-0 max-md:max-w-full max-w-[525px]">
                                @lang('challenges-content.careers-as-constellations.authorcontent')
                            </p>
                        </div>
                        <div class="flex z-10 flex-1 justify-center items-center order-0 md:order-2">
                            <button class="flex justify-center items-center w-20 h-20 rounded-full duration-300 bg-yellow hover:bg-primary">
                                <img class="ml-2 duration-300" src="/images/fi_play.svg" />
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
                <div class="grid grid-cols-1 gap-y-6 lg:grid-cols-3 lg:gap-16">
                    <div id="challenge-left-col" class="flex flex-col gap-6">
                        <div class="p-6 bg-white rounded-lg">
                            <p class="p-0 mb-4 text-2xl font-normal">@lang('challenges-content.careers-as-constellations.activity-type')</p>
                            <ol class="ml-4 list-decimal">
                                <li class="p-0 font-normal leading-7 text-slate-500 text-default">@lang('challenges-content.careers-as-constellations.open-online-activity')</li>
                            </ol>
                        </div>
                        <div class="p-6 bg-white rounded-lg">
                            <p class="p-0 mb-4 text-2xl font-normal">@lang('challenges-content.careers-as-constellations.name-of-org')</p>
                            <ol class="ml-4 list-decimal">
                                <li class="p-0 font-normal leading-7 text-slate-500 text-default">Linda Liukas</li>
                            </ol>
                        </div>
                        <div class="p-6 bg-white rounded-lg">
                            <p class="p-0 mb-4 text-2xl font-normal">@lang('challenges-content.careers-as-constellations.language')</p>
                            <ol class="ml-4 list-decimal">
                                <li class="p-0 font-normal leading-7 text-slate-500 text-default">
                                    @lang('challenges-content.careers-as-constellations.english')
                                </li>
                            </ol>
                        </div>
                        <div class="p-6 bg-white rounded-lg">
                            <p class="p-0 mb-4 text-2xl font-normal">@lang('challenges-content.careers-as-constellations.type-of-org')</p>
                            <ol class="ml-4 list-decimal">
                                <li class="p-0 font-normal leading-7 text-slate-500 text-default">
                                    @lang('challenges-content.careers-as-constellations.private-business')
                                </li>
                            </ol>
                        </div>
                        <div class="p-6 bg-white rounded-lg">
                            <p class="p-0 mb-4 text-2xl font-normal">@lang('challenges-content.careers-as-constellations.audience')</p>
                            <ol class="ml-4 list-decimal">
                                <li class="p-0 font-normal leading-7 text-slate-500 text-default">
                                    @lang('challenges-content.careers-as-constellations.secondary-school')
                                </li>
                                <li class="p-0 font-normal leading-7 text-slate-500 text-default">
                                    @lang('challenges-content.careers-as-constellations.higher-education')
                                </li>
                                <li class="p-0 font-normal leading-7 text-slate-500 text-default">
                                    @lang('challenges-content.careers-as-constellations.teachers')
                                </li>
                            </ol>
                        </div>
                        <div class="p-6 bg-white rounded-lg">
                            <p class="p-0 mb-4 text-2xl font-normal">@lang('challenges-content.careers-as-constellations.theme')</p>
                            <ol class="ml-4 list-decimal">
                                <li class="p-0 font-normal leading-7 text-slate-500 text-default">
                                    @lang('challenges-content.careers-as-constellations.themes.motivation-and-awareness-raising')
                                </li>
                                <li class="p-0 font-normal leading-7 text-slate-500 text-default">
                                    @lang('challenges-content.careers-as-constellations.themes.promoting-diversity')
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="px-6 py-8 bg-white rounded-lg lg:p-16">
                            <p class="text-dark-blue font-['Montserrat'] font-medium text-[22px] leading-7 md:text-4xl p-0 mb-6">@lang("challenges-content.$slug.title")</p>
                            <div class="mb-6">
                                <p class="p-0 mb-2 text-2xl font-semibold">@lang('challenges.common.description')</p>
                                <p class="p-0 font-normal text-default md:text-xl text-slate-500">
                                    @lang("challenges-content.$slug.description")
                                </p>
                            </div>
                            <div class="mb-6">
                                <p class="p-0 mb-2 text-2xl font-semibold">@lang('challenges-content.careers-as-constellations.start-date')</p>
                                <ol class="ml-4 list-decimal">
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">
                                        27.2.2025 - 27.2.2026
                                    </li>
                                </ol>

                                <p class="p-0 mb-2 text-2xl font-semibold">@lang('challenges-content.careers-as-constellations.age-group')</p>
                                <ol class="ml-4 list-decimal">
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">
                                        @lang("challenges-content.careers-as-constellations.age-groups.12")
                                    </li>
                                </ol>

                                <p class="p-0 mb-2 text-2xl font-semibold">@lang('challenges-content.careers-as-constellations.time-required')</p>
                                <ol class="ml-4 list-decimal">
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">
                                        @lang("challenges-content.careers-as-constellations.45–60")
                                    </li>
                                </ol>

                                <p class="p-0 mb-2 text-2xl font-semibold">@lang('challenges-content.careers-as-constellations.group-size')</p>
                                <ol class="ml-4 list-decimal">
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">
                                        @lang("challenges-content.careers-as-constellations.group-sizes.small")
                                    </li>
                                </ol>

                                <p class="p-0 mb-2 text-2xl font-semibold">@lang('challenges-content.careers-as-constellations.required-materials')</p>
                                <ol class="ml-4 list-decimal">
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">
                                        @lang("challenges-content.careers-as-constellations.materials.one")
                                    </li>
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">
                                        @lang("challenges-content.careers-as-constellations.materials.two")
                                    </li>
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">
                                        @lang("challenges-content.careers-as-constellations.materials.three")
                                    </li>
                                </ol>
                            </div>

                            @include('2021.challenges._share')

                            <p class="p-0 font-normal text-default md:text-xl text-slate-500">
                                This activity helps students map their personal interests and hobbies to potential careers in technology. By visualizing their skills and passions as constellations, students discover how careers are formed by connecting seemingly unrelated dots—just like in the night sky. No prior coding experience is required, and the activity fosters creative thinking about the future of work in technology. Share your class’s constellations! Use #CodeWeek and tag us—we’d love to see how your students connect their dots!
                            </p>

                            <p class="p-0 mb-2 text-2xl font-semibold">@lang('challenges-content.careers-as-constellations.step-by-step-instructions')</p>
                            <p class="p-0 mb-2 font-semibold text-default md:text-xl text-slate-500">
                                @lang('challenges-content.careers-as-constellations.titles.one')
                            </p>
                            <div class="p-0 font-normal text-default md:text-xl text-slate-500">
                                @lang('challenges-content.careers-as-constellations.intro')
                            </div>

                            <p class="p-0 my-2 font-semibold text-default md:text-xl text-slate-500">
                                @lang('challenges-content.careers-as-constellations.titles.two')
                            </p>
                            <div class="p-0 font-normal text-default md:text-xl text-slate-500">
                                @lang("challenges-content.careers-as-constellations.content.one")
                            </div>

                            <ol class="ml-4 list-decimal">
                                <li class="p-0 font-normal text-default md:text-xl text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.two")
                                </li>
                                <li class="p-0 font-normal text-default md:text-xl text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.three")
                                </li>
                                <li class="p-0 font-normal text-default md:text-xl text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.four")
                                </li>
                            </ol>

                            <p class="p-0 my-2 font-semibold text-default md:text-xl text-slate-500">
                                @lang('challenges-content.careers-as-constellations.titles.three')
                            </p>
                            <ol class="ml-4 list-decimal">
                                <li class="p-0 font-normal text-default md:text-xl text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.five")
                                </li>
                                <li class="p-0 font-normal text-default md:text-xl text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.six")
                                </li>
                                <li class="p-0 font-normal text-default md:text-xl text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.seven")
                                </li>
                            </ol>
                            <p class="p-0 my-2 font-semibold text-default md:text-xl text-slate-500">
                                @lang('challenges-content.careers-as-constellations.titles.four')
                            </p>
                            <ol class="ml-4 list-decimal">
                                <li class="p-0 font-normal text-default md:text-xl text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.eight")
                                </li>
                                <li class="p-0 font-normal text-default md:text-xl text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.nine")
                                </li>
                            </ol>
                            <div class="font-semibold text-default md:text-xl text-slate-500">
                                @lang("challenges-content.careers-as-constellations.content.ten")
                            </div>
                            <ol class="ml-4 list-decimal">
                                <li class="p-0 font-normal text-default md:text-xl text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.eleven")
                                </li>
                                <li class="p-0 font-normal text-default md:text-xl text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.twelve")
                                </li>
                                <li class="p-0 font-normal text-default md:text-xl text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.thirteen")
                                </li>
                            </ol>
                            <p class="p-0 my-2 font-semibold text-default md:text-xl text-slate-500">
                                @lang('challenges-content.careers-as-constellations.titles.five')
                            </p>
                            <ol class="ml-4 list-decimal">
                                <li class="p-0 font-normal text-default md:text-xl text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.fourteen")
                                </li>
                                <li class="p-0 font-normal text-default md:text-xl text-slate-500">
                                    @lang("challenges-content.careers-as-constellations.content.fifteen")
                                </li>
                            </ol>

                            <div class="p-0 font-semibold text-default md:text-xl text-slate-500">@lang("challenges-content.careers-as-constellations.content.16")</div>
                                                         @include('2021.challenges._download', [
                                'url' => "https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2025/$slug-$locale.docx",
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection