@extends('layout.new_base')

@php
    $slug = 'train-it-like-fei-fei-li';
    $locale = app()->getLocale();

    // Always return an ARRAY (for list-like keys that vary by locale)
    $tarr = function (string $key) use ($locale) {
        $val = trans($key, [], $locale);
        return is_array($val) ? $val : (strlen((string)$val) ? [$val] : []);
    };

    // Always return a STRING (for scalar keys that might accidentally be arrays in some locales)
    $ts = function (string $key, string $fallback = '') use ($locale) {
        $val = trans($key, [], $locale);
        if (is_array($val)) {
            // join only stringy leaves; adjust joiner if you prefer first item etc.
            $flat = array_filter($val, fn($v) => is_scalar($v));
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
                                    <li class="p-0 font-normal leading-7 text-slate-500 text-default">{{ $material }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="p-6 bg-white rounded-lg">
                            <p class="p-0 mb-4 text-2xl font-normal">{{ $ts("challenges-content.$slug.examples_title") }}</p>
                            <ul class="list-decimal ml-4 [&_li]:my-2 leading-[22px] md:leading-[30px]">
                                @foreach ($tarr("challenges-content.$slug.examples") as $example)
                                    @if (is_string($example) && str_contains($example, ':'))
                                        <li class="p-0 font-bold leading-7 text-slate-500 text-default">{{ $example }}</li>
                                    @else
                                        <li class="p-0 font-normal leading-7 text-slate-500 text-default">{{ is_array($example) ? json_encode($example) : $example }}</li>
                                    @endif
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

                            <div class="mb-6">
                                <p class="p-0 mb-2 text-2xl font-semibold">{{ $ts("challenges-content.$slug.instructions_title") }}</p>
                                <ol class="list-decimal ml-4 [&_li]:my-2 leading-[22px] md:leading-[30px]">
                                    @foreach ($tarr("challenges-content.$slug.instructions") as $instruction)
                                        @php $isHeader = is_string($instruction) && str_contains($instruction, ':'); @endphp
                                        <li class="p-0 {{ $isHeader ? 'font-bold' : 'font-normal' }} text-default md:text-xl text-slate-500">
                                            {{ is_array($instruction) ? json_encode($instruction) : $instruction }}
                                        </li>
                                    @endforeach
                                </ol>
                            </div>

                            @include('2021.challenges._share')

                            <div class="mb-6">
                                <p class="p-0 mb-2 text-2xl font-semibold">A model we made above can be found here:</p>
                                <a href="https://teachablemachine.withgoogle.com/models/hRNy1ZPlQ/"
                                   target="_blank" rel="noopener noreferrer"
                                   class="font-normal leading-7 underline hover:no-underline text-[#1c4da1] text-default">
                                    https://teachablemachine.withgoogle.com/models/hRNy1ZPlQ/
                                </a>
                                <img width="100%" src="/images/challenges/train-it-like-fei-fei-li/0.jpg">
                                <img width="100%" src="/images/challenges/train-it-like-fei-fei-li/1.jpg">
                                <img width="100%" src="/images/challenges/train-it-like-fei-fei-li/2.jpg">
                                <img width="100%" src="/images/challenges/train-it-like-fei-fei-li/3.jpg">
                                <img width="100%" src="/images/challenges/train-it-like-fei-fei-li/4.jpg">
                                <img width="100%" src="/images/challenges/train-it-like-fei-fei-li/5.jpg">
                             @include('2021.challenges._download', [
                                'url' => "https://codeweek-s3.s3.eu-west-1.amazonaws.com/cw2025/$slug-$locale.docx",
                            ])
                            </div>
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

