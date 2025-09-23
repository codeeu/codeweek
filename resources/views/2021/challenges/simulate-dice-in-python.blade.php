@extends('layout.new_base')

@php
    $slug = 'simulate-dice-in-python'; // make sure the filename matches this slug
    $locale = app()->getLocale();

    // Safe array/string translators
    $tarr = function (string $key) use ($locale) {
        $val = trans($key, [], $locale);
        return is_array($val) ? $val : [];
    };
    $tstr = function (string $key) use ($locale) {
        $val = trans($key, [], $locale);
        return is_array($val) ? '' : $val;
    };

    $title = $tstr("challenges-content.$slug.title");

    // Meta description: prefer first item from array description, else string
    $descArr = $tarr("challenges-content.$slug.description");
    $descStr = $tstr("challenges-content.$slug.description");
    $metaDesc = $descArr[0] ?? ($descStr ?? '');

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
@section('description', $metaDesc)

<x-tailwind></x-tailwind>

@section('content')
    <section id="challenge-detail-page" class="font-['Blinker'] overflow-hidden">
        <section class="flex overflow-hidden relative">
            <div class="flex relative pt-32 pb-0 w-full transition-all bg-orange-gradient md:py-32">
                <div
                    class="flex overflow-hidden flex-col flex-shrink-0 justify-end pb-10 w-full md:p-0 md:flex-row md:items-center">
                    <div
                        class="flex flex-col gap-28 duration-1000 codeweek-container-lg md:flex-row md:items-center md:gap-4 xl:gap-28">
                        <div class="order-1 flex-1 px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2
                                class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                                @lang("challenges-content.$slug.title")
                            </h2>
                            <p
                                class="text-xl font-normal md:text-2xl leading-8 text-[#333E48] p-0 max-md:max-w-full max-w-[525px]">
                                @include('2021.challenges._author', [
                                    'author' => __("challenges-content.$slug.author"),
                                ])
                            </p>
                        </div>

                        <div class="flex z-10 flex-1 justify-center items-center order-0 md:order-2">
                            <button
                                class="flex justify-center items-center w-20 h-20 rounded-full duration-300 bg-yellow hover:bg-primary">
                                <img class="ml-2 duration-300" src="/images/fi_play.svg" />
                            </button>
                        </div>

                        <img class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden" loading="lazy"
                            src="{{ asset('img/2021/challenges/thumbnails/' . $slug . '.png') }}"
                            style="clip-path: ellipse(71% 73% at 40% 20%);" />

                        <img class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                            loading="lazy" src="{{ asset('img/2021/challenges/thumbnails/' . $slug . '.png') }}"
                            style="clip-path: ellipse(70% 140% at 70% 25%);" />
                    </div>
                </div>
            </div>
        </section>

        <section class="relative bg-yellow-50">
            <div class="relative py-10 md:py-20 codeweek-container-lg">
                <div class="grid grid-cols-1 gap-y-6 lg:grid-cols-3 lg:gap-16">
                    <div id="challenge-left-col" class="flex flex-col gap-6">
                        <div class="p-6 bg-white rounded-lg">
                            <p class="p-0 mb-4 text-2xl font-normal">@lang("challenges-content.$slug.purposes_title")</p>
                            <ul class="list-decimal ml-4 [&_li]:my-2 leading-[22px] md:leading-[30px]">
                                @foreach ($tarr("challenges-content.$slug.purposes") as $purpose)
                                    <li class="p-0 font-normal leading-7 text-slate-500 text-default">{{ $purpose }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="flex flex-wrap gap-4 p-6 bg-white rounded-lg lg:flex-col 2xl:flex-row 2xl:gap-8">
                            <div>
                                <p class="p-0 mb-4 text-2xl font-normal">@lang("challenges-content.$slug.duration_title")</p>
                                @foreach ($tarr("challenges-content.$slug.durations") as $duration)
                                    <div class="mb-2 flex gap-2 items-center px-4 py-1.5 bg-light-blue-100 rounded-full w-fit">
                                        <img src="{{ asset('img/2021/challenges/icons/fi_clock.svg') }}" />
                                        <p class="p-0 font-semibold text-slate-500 text-default">@lang($duration)</p>
                                    </div>
                                @endforeach
                            </div>
                            <div>
                                <p class="p-0 mb-4 text-2xl font-normal">@lang("challenges-content.$slug.experience_title")</p>
                                <div class="flex gap-2 items-center px-4 py-1.5 bg-light-blue-100 rounded-full w-fit">
                                    <img src="{{ asset('img/2021/challenges/icons/fi_lightbulb.svg') }}" />
                                    <p class="p-0 font-semibold text-slate-500 text-default">@lang("challenges-content.$slug.experience")</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 bg-white rounded-lg">
                            <p class="p-0 mb-4 text-2xl font-normal">@lang("challenges-content.$slug.target_audience_title")</p>
                            <p class="p-0 font-normal leading-7 text-slate-500 text-default">
                                @lang("challenges-content.$slug.target_audience")
                            </p>
                        </div>

                        <div class="p-6 bg-white rounded-lg">
                            <p class="p-0 mb-4 text-2xl font-normal">@lang("challenges-content.$slug.materials_title")</p>
                            <ul class="ml-4 list-decimal">
                                @foreach ($tarr("challenges-content.$slug.materials") as $material)
                                    <li class="p-0 font-normal leading-7 text-slate-500 text-default">{{ $material }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="p-6 bg-white rounded-lg">
                            <p class="p-0 mb-4 text-2xl font-normal">@lang("challenges-content.$slug.additional_resources_title")</p>
                            <ul class="ml-4 list-decimal">
                                @foreach ($tarr("challenges-content.$slug.additional_resources") as $resource)
                                    <li class="p-0 font-normal leading-7 text-slate-500 text-default">{{ $resource }}
                                    </li>
                                @endforeach
                                <a href="https://docs.python.org/3/library/random.html"
                                    target="_blank">https://docs.python.org/3/library/random.html</a>
                            </ul>
                        </div>
                    </div>

                    <div class="col-span-2">
                        <div class="px-6 py-8 bg-white rounded-lg lg:p-16">
                            <p
                                class="text-dark-blue font-['Montserrat'] font-medium text-[22px] leading-7 md:text-4xl p-0 mb-6">
                                @lang("challenges-content.$slug.title")
                            </p>

                            <div class="flex flex-wrap gap-2 mb-6">
                                <div class="flex gap-2 items-center px-4 py-1.5 bg-light-blue-100 rounded-full">
                                    <img src="{{ asset('img/2021/challenges/icons/fi_users.svg') }}" />
                                    <p class="p-0 font-semibold text-slate-500 text-default">
                                        @lang("challenges-content.$slug.target_audience")
                                    </p>
                                </div>
                            </div>

                            <div class="mb-6">
                                <p class="p-0 mb-2 text-2xl font-semibold">@lang("challenges-content.$slug.description_title")</p>
                                @php $descs = $tarr("challenges-content.$slug.description"); @endphp
                                @if (count($descs))
                                    @foreach ($descs as $description)
                                        <p
                                            class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px]">
                                            {{ $description }}
                                        </p>
                                    @endforeach
                                @else
                                    <p
                                        class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px]">
                                        {{ $tstr("challenges-content.$slug.description") }}
                                    </p>
                                @endif
                            </div>
                            @php
                                $items = trans("challenges-content.$slug.instructions");
                                if (!is_array($items)) {
                                    $items = [];
                                }

                                // Safe helper: split a string at the first colon into [heading, rest]
                                $splitAtColon = function ($s) {
                                    $pos = mb_strpos($s, ':');
                                    return $pos === false
                                        ? [trim(strip_tags($s)), null]
                                        : [trim(strip_tags(mb_substr($s, 0, $pos + 1))), trim(mb_substr($s, $pos + 1))];
                                };
                            @endphp
                            <div class="mb-6">
                                <p class="p-0 mb-2 text-2xl font-semibold">
                                    @lang("challenges-content.$slug.instructions_title")
                                </p>

                                {{-- Step 1 --}}
                                <strong class="block mb-2 text-default md:text-xl">{{ $items[0] ?? '' }}</strong>
                                <p class="mb-4 text-default md:text-xl text-slate-700">
                                    {{ $items[1] ?? '' }} {{ $items[2] ?? '' }} {{ $items[3] ?? '' }}
                                </p>

                                {{-- Step 2 --}}
                                <strong class="block mb-2 text-default md:text-xl">{{ $items[4] ?? '' }}</strong>
                                <ul class="mb-4 ml-6 list-decimal text-slate-500 text-default md:text-xl">
                                    @foreach ([5, 6] as $i)
                                        @if (!empty($items[$i]))
                                            <li>{{ $items[$i] }}</li>
                                        @endif
                                    @endforeach
                                </ul>

                                {{-- Code block --}}
                                <pre class="p-4 mb-4 font-mono text-sm rounded bg-slate-100">
{{ $items[7] ?? '' }}
{{ $items[8] ?? '' }}
{{ $items[9] ?? '' }}
{{ $items[10] ?? '' }}
{{ $items[11] ?? '' }}
{{ $items[12] ?? '' }}
{{ $items[13] ?? '' }}
{{ $items[14] ?? '' }}
{{ $items[15] ?? '' }}
{{ $items[16] ?? '' }}
</pre>
                                <img width="100%" src="/images/challenges/simulate-dice-in-python/1.png">
                                <p class="mb-4 text-slate-700 text-default md:text-xl">{{ $items[17] ?? '' }}</p>
                                <p class="mb-6 text-slate-700 text-default md:text-xl">{{ $items[18] ?? '' }}</p>

                                {{-- Step 3 --}}
                                <strong class="block mb-2 text-default md:text-xl">{{ $items[19] ?? '' }}</strong>
                                <ul class="mb-4 ml-6 list-disc text-slate-500 text-default md:text-xl">
                                    @foreach (range(20, 23) as $i)
                                        @if (!empty($items[$i]))
                                            @php
                                                $parts = explode(':', $items[$i], 2);
                                            @endphp
                                            <li class="text-default md:text-xl">
                                                @if (count($parts) === 2)
                                                    <strong>{{ trim($parts[0]) }}:</strong> {{ trim($parts[1]) }}
                                                @else
                                                    {{ $items[$i] }}
                                                @endif
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>

                                {{-- Step 4 --}}
                                <strong class="block mb-2 text-default md:text-xl">{{ $items[24] ?? '' }}</strong>
                                <ol class="mb-6 ml-6 list-disc text-slate-500">
                                    @foreach (range(25, 28) as $i)
                                        @if (!empty($items[$i]))
                                            <li class="text-default md:text-xl">{{ $items[$i] }}</li>
                                        @endif
                                    @endforeach
                                </ol>

                                {{-- Quiz --}}
                                @php
                                    // Load quiz items as array safely
                                    $quiz = trans("challenges-content.$slug.quiz");
                                    if (!is_array($quiz)) {
                                        $quiz = [];
                                    }

                                    // Parse into groups: [ ['q' => ..., 'opts' => [...]], ... ]
                                    $groups = [];
                                    $answers = null;

                                    for ($i = 0; $i < count($quiz); ) {
                                        $entry = trim((string) ($quiz[$i] ?? ''));

                                        if ($entry === '') {
                                            $i++;
                                            continue;
                                        }

                                        // If we hit the "Correct answers..." line, store and stop grouping
                                        if (stripos($entry, 'Correct answers') === 0) {
                                            $answers = $entry;
                                            $i++;
                                            break;
                                        }

                                        // Treat this as a question and collect up to 3 options after it
                                        $q = $entry;
                                        $opts = [];
                                        for ($j = 1; $j <= 3 && $i + $j < count($quiz); $j++) {
                                            $candidate = trim((string) $quiz[$i + $j]);
                                            // Stop early if another "Correct answers" shows up
                                            if (stripos($candidate, 'Correct answers') === 0) {
                                                $answers = $candidate;
                                                break;
                                            }
                                            $opts[] = $candidate;
                                        }

                                        $groups[] = ['q' => $q, 'opts' => $opts];

                                        // Advance by 1 (question) + number of options captured
                                        $i += 1 + count($opts);
                                        // If we captured "Correct answers" during options scan, bail
                                        if ($answers) {
                                            break;
                                        }
                                    }

                                    // Fallback: if "Correct answers" is later in the array, pick it up
                                    if (!$answers) {
                                        foreach ($quiz as $qitem) {
                                            if (is_string($qitem) && stripos($qitem, 'Correct answers') === 0) {
                                                $answers = trim($qitem);
                                                break;
                                            }
                                        }
                                    }
                                @endphp

                                <div class="mb-6">
                                    <strong class="block mb-2 text-default md:text-xl">
                                        @lang("challenges-content.$slug.quiz_title")
                                    </strong>

                                    @php $qIndex = 1; @endphp
                                    @foreach ($groups as $g)
                                        {{-- Question --}}
                                        <p class="mb-1 font-semibold text-slate-700 text-default md:text-xl">
                                            {{ $qIndex++ }}. {{ $g['q'] }}

                                        {{-- Options (numbered, restart each question) --}}
                                        <ol class="mb-4 ml-6 text-slate-500 list-[lower-alpha]">
                                            @foreach ($g['opts'] as $opt)
                                                <li class="text-default md:text-xl">{{ $opt }}</li>
                                            @endforeach
                                        </ol>
                                    @endforeach

                                    {{-- Correct answers --}}
                                    @if (!empty($answers))
                                        <p class="italic text-slate-600 text-default md:text-xl">{{ $answers }}</p>
                                    @endif
                                </div>
                                {{-- Mini simulation --}}
                                <strong class="block mb-2 text-default md:text-xl">@lang("challenges-content.$slug.mini_simulation_title")</strong>
                                <p class="mb-0 text-slate-700 text-default md:text-xl">{{ trans("challenges-content.$slug.mini_simulation")[0] }}</p>
                                <ul class="mb-6 ml-2 list-disc text-slate-500">
                                    @foreach (range(1, 2) as $i)
                                        <li class="text-default md:text-xl">{{ trans("challenges-content.$slug.mini_simulation")[$i] }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            @include('2021.challenges._share')
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
