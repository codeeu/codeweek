@extends('layout.new_base')

@php
    $slug   = 'coding-for-the-ocean';
    $locale = app()->getLocale();

    // Always return an ARRAY (for list-like keys that can vary by locale)
    $tarr = function (string $key) use ($locale) {
        $val = trans($key, [], $locale);
        return is_array($val) ? $val : (strlen((string)$val) ? [$val] : []);
    };

    // Always return a STRING (guard against array values)
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
                                @include('2021.challenges._author', ['author' => $ts("challenges-content.$slug.author")])
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
                            <p class="p-0 mb-4 text-2xl font-normal">@lang('challenges.common.educational-goals')</p>
                            <ul class="list-decimal ml-4 [&_li]:my-2 leading-[22px] md:leading-[30px]">
                                @foreach ($tarr("challenges-content.$slug.educational_goals") as $goal)
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">{{ is_array($goal) ? json_encode($goal) : $goal }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="flex flex-wrap gap-4 p-6 bg-white rounded-lg lg:flex-col 2xl:flex-row 2xl:gap-8">
                            <div>
                                <p class="p-0 mb-4 text-2xl font-normal">@lang('challenges.common.duration')</p>
                                <div class="flex gap-2 items-center px-4 py-1.5 bg-light-blue-100 rounded-full w-fit">
                                    <img src="{{ asset('img/2021/challenges/icons/fi_clock.svg') }}" />
                                    <p class="p-0 font-semibold text-slate-500 text-default md:text-xl">{{ $ts("challenges-content.$slug.duration") }}</p>
                                </div>
                            </div>
                            <div>
                                <p class="p-0 mb-4 text-2xl font-normal">@lang('challenges.common.experience')</p>
                                <div class="flex gap-2 items-center px-4 py-1.5 bg-light-blue-100 rounded-full w-fit">
                                    <img src="{{ asset('img/2021/challenges/icons/fi_lightbulb.svg') }}" />
                                    <p class="p-0 font-semibold text-slate-500 text-default md:text-xl">{{ $ts("challenges-content.$slug.experience") }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 bg-white rounded-lg">
                            <p class="p-0 mb-4 text-2xl font-normal">@lang('challenges.common.target-audience')</p>
                            <ul class="ml-4 list-decimal">
                                @foreach ($tarr("challenges-content.$slug.target-audience") as $audience)
                                    <li class="p-0 font-normal leading-7 text-slate-500 text-default md:text-xl">{{ $audience }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="p-6 bg-white rounded-lg">
                            <p class="p-0 mb-4 text-2xl font-normal">@lang('challenges.common.purpose')</p>
                            <ul class="ml-4 list-decimal">
                                @foreach ($tarr("challenges-content.$slug.purposes") as $purpose)
                                    <li class="p-0 font-normal leading-7 text-slate-500 text-default md:text-xl">{{ $purpose }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="p-6 bg-white rounded-lg">
                            <p class="p-0 mb-4 text-2xl font-normal">@lang('challenges.common.materials')</p>
                            <ul class="ml-4 list-decimal">
                                @foreach ($tarr("challenges-content.$slug.materials") as $material)
                                    @php $m = is_array($material) ? implode(' ', array_map('strval', $material)) : (string)$material; @endphp
                                    <li class="p-0 font-normal leading-7 text-slate-500 text-default md:text-xl">
                                        @if (preg_match('~^https?://~i', $m))
                                            <a href="{{ $m }}" target="_blank" rel="noopener noreferrer" class="underline hover:no-underline text-[#1c4da1]">{{ $m }}</a>
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
                                @foreach ($tarr("challenges-content.$slug.target-audience") as $aud)
                                    <div class="flex gap-2 items-center px-4 py-1.5 bg-light-blue-100 rounded-full">
                                        <img src="{{ asset('img/2021/challenges/icons/fi_users.svg') }}" />
                                        <p class="p-0 font-semibold text-slate-500 text-default md:text-xl">{{ $aud }}</p>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mb-6">
                                <p class="p-0 mb-2 text-2xl font-semibold">@lang('challenges.common.description')</p>
                                <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px]">
                                    {!! nl2br($desc) !!}
                                </p>
                            </div>

                            <div class="mb-6">
                                <p class="p-0 mb-2 text-2xl font-semibold">@lang('challenges.common.instructions')</p>
                                <ol class="list-none ml-4 [&_li]:my-2 leading-[22px] md:leading-[30px]">
                                    @foreach ($tarr("challenges-content.$slug.instructions") as $instruction)
                                        <li class="p-0 font-normal text-default md:text-xl text-slate-500">
                                            {!! is_array($instruction) ? json_encode($instruction) : nl2br($instruction) !!}
                                        </li>
                                    @endforeach
                                </ol>
                                <img width="100%" src="/images/challenges/coding-for-the-ocean/2.png">
                            </div>

                            @include('2021.challenges._share')

                            <div class="mb-6">
                                <p class="p-0 mb-2 text-2xl font-semibold">{{ $ts("challenges-content.$slug.real-life-applications_title") }}</p>
                                <ul class="list-none ml-4 [&_li]:my-2 leading-[22px] md:leading-[30px]">
                                    @foreach ($tarr("challenges-content.$slug.real-life-applications") as $real_life_application)
                                        <li class="p-0 font-normal text-default md:text-xl text-slate-500">{{ $real_life_application }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="mb-6">
                                <p class="p-0 mb-2 text-2xl font-semibold">{{ $ts("challenges-content.$slug.variations_title") }}</p>
                                <ul class="list-none ml-4 [&_li]:my-2 leading-[22px] md:leading-[30px]">
                                    @foreach ($tarr("challenges-content.$slug.variations") as $variation)
                                        <li class="p-0 font-normal text-default md:text-xl text-slate-500">{{ $variation }}</li>
                                    @endforeach
                                </ul>

                                <img width="100%" src="/images/challenges/coding-for-the-ocean/3.png">
                                <img width="100%" src="/images/challenges/coding-for-the-ocean/4.png">
                                <img width="100%" src="/images/challenges/coding-for-the-ocean/5.png">
                                <img width="100%" src="/images/challenges/coding-for-the-ocean/6.png">
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

    {{-- Optional: auto-link plain URLs with Tailwind classes + no-referrer --}}
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

                if (textNode.parentElement && textNode.parentElement.closest('a,code,pre')) return;

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
                        m.addedNodes && m.addedNodes.forEach(n => {
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
