@extends('layout.new_base')

@php
    $slug = 'gender-gap-gender-graph';
    $locale = app()->getLocale();

    // Always return an ARRAY (for list-like keys that may vary by locale)
    $tarr = function (string $key) use ($locale) {
        $val = trans($key, [], $locale);
        return is_array($val) ? $val : (strlen((string)$val) ? [$val] : []);
    };

    // Always return a STRING (for scalar keys that might accidentally be arrays in some locales)
    $ts = function (string $key, string $fallback = '') use ($locale) {
        $val = trans($key, [], $locale);
        if (is_array($val)) {
            $flat = array_filter($val, fn($v) => is_scalar($v));
            return $flat ? implode(', ', array_map('strval', $flat)) : $fallback;
        }
        $val = (string)$val;
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
                                {{ $title }}
                            </h2>
                            <p class="text-xl font-normal md:text-2xl leading-8 text-[#333E48] p-0 max-md:max-w-full max-w-[525px]">
                                @include('2021.challenges._author', [
                                    'author' => $ts("challenges-content.$slug.author")
                                ])
                            </p>
                        </div>
                        <div class="flex z-10 flex-1 justify-center items-center order-0 md:order-2">
                            <button class="hidden justify-center items-center w-20 h-20 rounded-full duration-300 bg-yellow hover:bg-primary">
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
                            <p class="p-0 mb-4 text-2xl font-normal">{{ $ts("challenges-content.$slug.purposes_title") }}</p>
                            <ul class="list-decimal ml-4 [&_li]:my-2 leading-[22px] md:leading-[30px]">
                                @foreach ($tarr("challenges-content.$slug.purposes") as $purpose)
                                    <li class="p-0 font-normal leading-7 text-slate-500 text-default">{{ $purpose }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="flex flex-wrap gap-4 p-6 bg-white rounded-lg lg:flex-col 2xl:flex-row 2xl:gap-8">
                            <div>
                                <p class="p-0 mb-4 text-2xl font-normal">{{ $ts("challenges-content.$slug.duration_title") }}</p>
                                <div class="flex gap-2 items-center px-4 py-1.5 bg-light-blue-100 rounded-full w-fit">
                                    <img src="{{ asset('img/2021/challenges/icons/fi_clock.svg') }}" />
                                    <p class="p-0 font-semibold text-slate-500 text-default">{{ $ts("challenges-content.$slug.duration") }}</p>
                                </div>
                            </div>
                            <div>
                                <p class="p-0 mb-4 text-2xl font-normal">{{ $ts("challenges-content.$slug.experience_title") }}</p>
                                <div class="flex gap-2 items-center px-4 py-1.5 bg-light-blue-100 rounded-full w-fit">
                                    <img src="{{ asset('img/2021/challenges/icons/fi_lightbulb.svg') }}" />
                                    <p class="p-0 font-semibold text-slate-500 text-default">{{ $ts("challenges-content.$slug.experience") }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 bg-white rounded-lg">
                            <p class="p-0 mb-4 text-2xl font-normal">{{ $ts("challenges-content.$slug.target_audience_title") }}</p>
                            <ul class="ml-4 list-decimal">
                                @foreach ($tarr("challenges-content.$slug.target_audience") as $audience)
                                    <li class="p-0 font-normal leading-7 text-slate-500 text-default">{{ $audience }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="p-6 bg-white rounded-lg">
                            <p class="p-0 mb-4 text-2xl font-normal">{{ $ts("challenges-content.$slug.materials_title") }}</p>
                            <ul class="ml-4 list-decimal">
                                @foreach ($tarr("challenges-content.$slug.materials") as $material)
                                    @php $m = is_array($material) ? implode(' ', array_map('strval', $material)) : (string)$material; @endphp
                                    <li class="p-0 font-normal leading-7 text-slate-500 text-default">
                                        @if (preg_match('~^https?://~i', $m))
                                            <a href="{{ $m }}" target="_blank" rel="noopener noreferrer" class="underline hover:no-underline text-[#1c4da1]">
                                                {{ $m }}
                                            </a>
                                        @else
                                            {{ $m }}
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-span-2">
                        <div class="px-6 py-8 bg-white rounded-lg lg:p-16">
                            <p class="text-dark-blue font-['Montserrat'] font-medium text-[22px] leading-7 md:text-4xl p-0 mb-6">
                                {{ $title }}
                            </p>
                            <div class="flex flex-wrap gap-2 mb-6">
                                @foreach ($tarr("challenges-content.$slug.target_audience") as $aud)
                                    <div class="flex gap-2 items-center px-4 py-1.5 bg-light-blue-100 rounded-full">
                                        <img src="{{ asset('img/2021/challenges/icons/fi_users.svg') }}" />
                                        <p class="p-0 font-semibold text-slate-500 text-default">{{ $aud }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mb-6">
                                <p class="p-0 mb-2 text-2xl font-semibold">{{ $ts("challenges-content.$slug.description_title") }}</p>
                                <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px]">
                                    {{ $desc }}
                                </p>
                            </div>

                            @php
                                $items = trans("challenges-content.$slug.instructions");
                                if (!is_array($items)) { $items = []; }

                                // Split a string at the first colon into [heading(with colon), rest]
                                $splitAtColon = function ($s) {
                                    $pos = mb_strpos($s, ':');
                                    return $pos === false
                                        ? [trim(strip_tags($s)), null]
                                        : [trim(strip_tags(mb_substr($s, 0, $pos + 1))), trim(mb_substr($s, $pos + 1))];
                                };
                            @endphp

                            <div class="mb-6">
                                <p class="p-0 mb-2 text-2xl font-semibold">{{ $ts("challenges-content.$slug.instructions_title") }}</p>

                                {{-- paragraph => items[0] + items[1] (concat) --}}
                                <p class="mb-4 text-default md:text-xl text-slate-700">
                                    {{ ($items[0] ?? '') . (isset($items[1]) ? ' ' . $items[1] : '') }}
                                </p>

                                {{-- ul => items[2..5] --}}
                                <ul class="mb-6 ml-6 list-disc text-slate-500 text-default md:text-xl">
                                    @foreach (range(2, 5) as $i)
                                        @if (!empty($items[$i])) <li>{{ is_array($items[$i]) ? json_encode($items[$i]) : $items[$i] }}</li> @endif
                                    @endforeach
                                </ul>

                                {{-- strong => Manually (user level) (item[6]) --}}
                                @if (!empty($items[6])) <strong class="block mb-2 text-default md:text-xl">{{ strip_tags(is_array($items[6]) ? json_encode($items[6]) : $items[6]) }}</strong> @endif

                                {{-- p => items[7] --}}
                                @if (!empty($items[7])) <p class="mb-4 text-default md:text-xl text-slate-700">{{ is_array($items[7]) ? json_encode($items[7]) : $items[7] }}</p> @endif

                                {{-- ul => items[8..9] --}}
                                <ul class="mb-6 ml-6 list-disc text-slate-500 text-default md:text-xl">
                                    @foreach (range(8, 9) as $i)
                                        @if (!empty($items[$i])) <li>{{ is_array($items[$i]) ? json_encode($items[$i]) : $items[$i] }}</li> @endif
                                    @endforeach
                                </ul>

                                {{-- strong => Food for thought/Discussion (item[10]) --}}
                                @if (!empty($items[10])) <strong class="block mb-2 text-default md:text-xl">{{ strip_tags(is_array($items[10]) ? json_encode($items[10]) : $items[10]) }}</strong> @endif

                                {{-- ul => items[11..14] --}}
                                <ul class="mb-6 ml-6 list-disc text-slate-500 text-default md:text-xl">
                                    @foreach (range(11, 14) as $i)
                                        @if (!empty($items[$i])) <li>{{ is_array($items[$i]) ? json_encode($items[$i]) : $items[$i] }}</li> @endif
                                    @endforeach
                                </ul>

                                {{-- p => item[15] --}}
                                @if (!empty($items[15])) <p class="mb-6 text-default md:text-xl text-slate-700">{{ is_array($items[15]) ? json_encode($items[15]) : $items[15] }}</p> @endif

                                <img width="100%" src="/images/challenges/gender-gap-gender-graph/1.png">
                                <img width="100%" src="/images/challenges/gender-gap-gender-graph/2.png">
                                <img width="100%" src="/images/challenges/gender-gap-gender-graph/3.png">

                                {{-- strong + p from item[16] --}}
                                @if (!empty($items[16]))
                                    @php
                                        $v16 = is_array($items[16]) ? implode(' ', array_map('strval', $items[16])) : (string)$items[16];
                                        [$head, $rest] = $splitAtColon($v16);
                                    @endphp
                                    <strong class="block mb-2 text-default md:text-xl">{{ $head }}</strong>
                                    @if ($rest) <p class="mb-4 text-default md:text-xl">{{ $rest }}</p> @endif
                                @endif

                                {{-- Simple challenge (17) + p (18) --}}
                                @if (!empty($items[17])) <strong class="block mb-2 text-default md:text-xl">{{ strip_tags(is_array($items[17]) ? json_encode($items[17]) : $items[17]) }}</strong> @endif
                                @if (!empty($items[18])) <p class="mb-6 text-default md:text-xl">{{ is_array($items[18]) ? json_encode($items[18]) : $items[18] }}</p> @endif

                                {{-- Advanced challenge (19) + combined (20..22) --}}
                                @if (!empty($items[19])) <strong class="block mb-2 text-default md:text-xl">{{ strip_tags(is_array($items[19]) ? json_encode($items[19]) : $items[19]) }}</strong> @endif
                                @php
                                    $adv = collect([$items[20] ?? null, $items[21] ?? null, $items[22] ?? null])
                                        ->map(fn($v) => is_array($v) ? implode(' ', array_map('strval', $v)) : $v)
                                        ->filter()
                                        ->implode(' ');
                                @endphp
                                @if ($adv) <p class="mb-6 text-default md:text-xl">{{ $adv }}</p> @endif

                                {{-- Tip (23) --}}
                                @if (!empty($items[23]))
                                    @php
                                        $v23 = is_array($items[23]) ? implode(' ', array_map('strval', $items[23])) : (string)$items[23];
                                        [$head, $rest] = $splitAtColon($v23);
                                    @endphp
                                    <strong class="block mb-2 text-default md:text-xl">{{ $head }}</strong>
                                    @if ($rest) <p class="mb-4 text-default md:text-xl">{{ $rest }}</p> @endif
                                @endif

                                {{-- p => item[24] --}}
                                @if (!empty($items[24])) <p class="mb-4 text-default md:text-xl">{{ is_array($items[24]) ? json_encode($items[24]) : $items[24] }}</p> @endif

                                {{-- ul nested: 25,26,27 + 28..29 --}}
                                <ul class="mb-6 ml-6 list-disc text-slate-500 text-default md:text-xl">
                                    @if (!empty($items[25])) <li>{{ is_array($items[25]) ? json_encode($items[25]) : $items[25] }}</li> @endif
                                    @if (!empty($items[26])) <li>{{ is_array($items[26]) ? json_encode($items[26]) : $items[26] }}</li> @endif
                                    @if (!empty($items[27]))
                                        <li>
                                            {{ is_array($items[27]) ? json_encode($items[27]) : $items[27] }}
                                            <ul class="ml-6 list-disc">
                                                @foreach ([28, 29] as $i)
                                                    @if (!empty($items[$i])) <li>{{ is_array($items[$i]) ? json_encode($items[$i]) : $items[$i] }}</li> @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                </ul>

                                {{-- p => 30, 31 --}}
                                @foreach ([30, 31] as $i)
                                    @if (!empty($items[$i])) <p class="mb-4 text-default md:text-xl">{{ is_array($items[$i]) ? json_encode($items[$i]) : $items[$i] }}</p> @endif
                                @endforeach

                                {{-- strong => 32, p => 33 --}}
                                @if (!empty($items[32])) <strong class="block mb-2 text-default md:text-xl">{{ is_array($items[32]) ? json_encode($items[32]) : $items[32] }}</strong> @endif
                                @if (!empty($items[33])) <p class="mb-6 text-default md:text-xl">{{ is_array($items[33]) ? json_encode($items[33]) : $items[33] }}</p> @endif

                                <img width="100%" src="/images/challenges/gender-gap-gender-graph/4.png">

                                {{-- Discussion: 34 + ordered 35..39 --}}
                                @if (!empty($items[34])) <strong class="block mb-2 text-default md:text-xl">{{ strip_tags(is_array($items[34]) ? json_encode($items[34]) : $items[34]) }}</strong> @endif
                                <ol class="mb-6 ml-6 list-decimal text-slate-500 text-default md:text-xl">
                                    @foreach (range(35, 39) as $i)
                                        @if (!empty($items[$i])) <li>{{ is_array($items[$i]) ? json_encode($items[$i]) : $items[$i] }}</li> @endif
                                    @endforeach
                                </ol>

                                {{-- More questions: 40 + ul 41..43 --}}
                                @if (!empty($items[40])) <strong class="block mb-2 text-default md:text-xl">{{ strip_tags(is_array($items[40]) ? json_encode($items[40]) : $items[40]) }}</strong> @endif
                                <ul class="mb-6 ml-6 list-disc text-slate-500 text-default md:text-xl">
                                    @foreach (range(41, 43) as $i)
                                        @if (!empty($items[$i])) <li>{{ is_array($items[$i]) ? json_encode($items[$i]) : $items[$i] }}</li> @endif
                                    @endforeach
                                </ul>

                                {{-- final takeaway => 44 --}}
                                @if (!empty($items[44])) <p class="text-default md:text-xl text-slate-700">{{ is_array($items[44]) ? json_encode($items[44]) : $items[44] }}</p> @endif
                            </div>

                            @include('2021.challenges._share')

                            <div class="mb-6">
                                <p class="p-0 mb-2 text-2xl font-semibold">{{ $ts("challenges-content.$slug.real-life-applications_title") }}</p>
                                <ul class="list-disc ml-4 [&_li]:my-2 leading-[22px] md:leading-[30px]">
                                    @foreach ($tarr("challenges-content.$slug.real-life-applications") as $real_life_application)
                                        <li class="p-0 font-normal text-default md:text-xl text-slate-500">{{ $real_life_application }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @include('2021.challenges._download', [
                                'url' => "https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2025/$slug-$locale.docx",
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <script>
        (function() {
            const SCOPE_SELECTOR = "#challenge-detail-page";
            const PUNCT_TO_TRIM = '.,;:!?)]}"\'';
            const URL_RE = /\bhttps?:\/\/[^\s<]+/gi;

            function escapeForCharClass(s) {
                return s.replace(/[[\]{}()*+?.,\\^$|#\s]/g, "\\$&");
            }

            function linkifyNode(textNode) {
                const text = textNode.nodeValue;
                if (!URL_RE.test(text)) return;
                URL_RE.lastIndex = 0;

                if (textNode.parentElement && textNode.parentElement.closest('a')) return;
                if (textNode.parentElement && textNode.parentElement.closest('code,pre')) return;

                const frag = document.createDocumentFragment();
                let last = 0, m, punctTrimRe = new RegExp("[" + escapeForCharClass(PUNCT_TO_TRIM) + "]+$");

                while ((m = URL_RE.exec(text)) !== null) {
                    const raw = m[0], start = m.index, end = start + raw.length;
                    if (start > last) frag.appendChild(document.createTextNode(text.slice(last, start)));

                    const trimmed = raw.replace(punctTrimRe, "");
                    const trail = raw.slice(trimmed.length);

                    const a = document.createElement("a");
                    a.href = trimmed;
                    a.target = "_blank";
                    a.rel = "noopener noreferrer";
                    a.referrerPolicy = "no-referrer";
                    a.className = "underline hover:no-underline text-[#1c4da1]";
                    a.textContent = trimmed;

                    frag.appendChild(a);
                    if (trail) frag.appendChild(document.createTextNode(trail));
                    last = end;
                }
                if (last < text.length) frag.appendChild(document.createTextNode(text.slice(last)));
                textNode.parentNode.replaceChild(frag, textNode);
            }

            function linkifyTree(root) {
                const walker = document.createTreeWalker(root, NodeFilter.SHOW_TEXT, {
                    acceptNode: node => node.parentElement ? NodeFilter.FILTER_ACCEPT : NodeFilter.FILTER_REJECT
                });
                const toProcess = [];
                while (walker.nextNode()) toProcess.push(walker.currentNode);
                toProcess.forEach(linkifyNode);
            }

            function init(scopeRoot) {
                if (!scopeRoot) return;
                linkifyTree(scopeRoot);
                const obs = new MutationObserver(muts => {
                    for (const m of muts) {
                        m.addedNodes && m.addedNodes.forEach(n npm run dev
                        => {
                            if (n.nodeType === Node.TEXT_NODE) linkifyNode(n);
                            else if (n.nodeType === Node.ELEMENT_NODE) linkifyTree(n);
                        });
                    }
                });
                obs.observe(scopeRoot, { childList: true, subtree: true });
            }

            if (document.readyState === "loading") {
                document.addEventListener("DOMContentLoaded", () => init(document.querySelector(SCOPE_SELECTOR)));
            } else {
                init(document.querySelector(SCOPE_SELECTOR));
            }
        })();
    </script>
@endsection

