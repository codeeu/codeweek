@extends('layout.new_base')

@php
    $slug = 'create-your-own-website-with-html-and-css'; // ensure filename matches this slug
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
                                class="hidden justify-center items-center w-20 h-20 rounded-full duration-300 bg-yellow hover:bg-primary">
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
                                <div class="flex gap-2 items-center px-4 py-1.5 bg-light-blue-100 rounded-full w-fit">
                                    <img src="{{ asset('img/2021/challenges/icons/fi_clock.svg') }}" />
                                    <p class="p-0 font-semibold text-slate-500 text-default">
                                        @lang("challenges-content.$slug.duration")
                                    </p>
                                </div>
                            </div>
                            <div>
                                <p class="p-0 mb-4 text-2xl font-normal">@lang("challenges-content.$slug.experience_title")</p>
                                @php
                                    $expArr = $tarr("challenges-content.$slug.experience");
                                    $expText = count($expArr)
                                        ? implode(' • ', $expArr)
                                        : $tstr("challenges-content.$slug.experience");
                                @endphp
                                <div class="flex gap-2 items-center px-4 py-1.5 bg-light-blue-100 rounded-full w-fit">
                                    <img src="{{ asset('img/2021/challenges/icons/fi_lightbulb.svg') }}" />
                                    <p class="p-0 font-semibold text-slate-500 text-default">
                                        {{ $expText }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 bg-white rounded-lg">
                            <p class="p-0 mb-4 text-2xl font-normal">@lang("challenges-content.$slug.target_audience_title")</p>
                            <ul class="ml-4 list-decimal">
                                @foreach ($tarr("challenges-content.$slug.target_audience") as $audience)
                                    <li class="p-0 font-normal leading-7 text-slate-500 text-default">{{ $audience }}
                                    </li>
                                @endforeach
                            </ul>
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
                    </div>

                    <div class="col-span-2">
                        <div class="px-6 py-8 bg-white rounded-lg lg:p-16">
                            <p
                                class="text-dark-blue font-['Montserrat'] font-medium text-[22px] leading-7 md:text-4xl p-0 mb-6">
                                @lang("challenges-content.$slug.title")
                            </p>

                            <div class="flex flex-wrap gap-2 mb-6">
                                @foreach ($tarr("challenges-content.$slug.target_audience") as $audience)
                                    <div class="flex gap-2 items-center px-4 py-1.5 bg-light-blue-100 rounded-full">
                                        <img src="{{ asset('img/2021/challenges/icons/fi_users.svg') }}" />
                                        <p class="p-0 font-semibold text-slate-500 text-default">{{ $audience }}</p>
                                    </div>
                                @endforeach
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
                                // Load arrays safely
                                $ins = trans("challenges-content.$slug.instructions");
                                if (!is_array($ins)) {
                                    $ins = [];
                                }

                                $mini = trans("challenges-content.$slug.mini_simulation");
                                if (!is_array($mini)) {
                                    $mini = [];
                                }

                                $resources = trans("challenges-content.$slug.additional_resources");
                                if (!is_array($resources)) {
                                    $resources = [];
                                }

                                // Helpers
                                $joinLines = function (array $lines) {
                                    return trim(implode("\n", array_filter($lines, fn($l) => !empty($l))));
                                };

                                // Code blocks from instructions (by indices in your translation list)
                                $codeHtml = $joinLines([
                                    $ins[25] ?? null,
                                    $ins[26] ?? null,
                                    $ins[27] ?? null,
                                    $ins[28] ?? null,
                                    $ins[29] ?? null,
                                    $ins[30] ?? null,
                                    $ins[31] ?? null,
                                    $ins[32] ?? null,
                                    $ins[33] ?? null,
                                    $ins[34] ?? null,
                                    $ins[35] ?? null,
                                    $ins[36] ?? null,
                                ]);

                                $codeCss = $joinLines([
                                    $ins[42] ?? null,
                                    $ins[43] ?? null,
                                    $ins[44] ?? null,
                                    $ins[45] ?? null,
                                    $ins[46] ?? null,
                                    $ins[47] ?? null,
                                    $ins[48] ?? null,
                                    $ins[49] ?? null,
                                    $ins[50] ?? null,
                                    $ins[51] ?? null,
                                    $ins[52] ?? null,
                                    $ins[53] ?? null,
                                    $ins[54] ?? null,
                                ]);

                                $codeLink = $joinLines([$ins[58] ?? null]);

                                // Mini simulation parsing (quiz + modify tasks)
                                $quizGroups = [];
                                $correctLine = null;
                                $modifyHeader = null;
                                $modifyTasks = [];

                                if (!empty($mini)) {
                                    $ptr = 0;
                                    $quizIntro = isset($mini[$ptr]) ? trim($mini[$ptr]) : null;
                                    if ($quizIntro && stripos($quizIntro, 'check') === 0) {
                                        $ptr++;
                                    }

                                    for ($q = 0; $q < 3 && $ptr < count($mini); $q++) {
                                        $qText = trim((string) ($mini[$ptr] ?? ''));
                                        if ($qText === '') {
                                            break;
                                        }
                                        if (stripos($qText, 'Correct answers') === 0) {
                                            $correctLine = $qText;
                                            $ptr++;
                                            break;
                                        }

                                        $opts = [];
                                        for ($j = 1; $j <= 3 && $ptr + $j < count($mini); $j++) {
                                            $opt = trim((string) $mini[$ptr + $j]);
                                            if (stripos($opt, 'Correct answers') === 0) {
                                                $correctLine = $opt;
                                                $j--;
                                                break;
                                            }
                                            $opts[] = $opt;
                                        }
                                        $quizGroups[] = ['q' => $qText, 'opts' => $opts];
                                        $ptr += 1 + count($opts);
                                        if ($correctLine) {
                                            break;
                                        }
                                    }

                                    for (; $ptr < count($mini); $ptr++) {
                                        $line = trim((string) $mini[$ptr]);
                                        if ($line === '') {
                                            continue;
                                        }
                                        if (!$correctLine && stripos($line, 'Correct answers') === 0) {
                                            $correctLine = $line;
                                            continue;
                                        }
                                        if (
                                            !$modifyHeader &&
                                            (stripos($line, 'Modify') === 0 || stripos($line, 'Change') === 0)
                                        ) {
                                            $modifyHeader = $line;
                                            continue;
                                        }
                                        if ($modifyHeader) {
                                            $modifyTasks[] = $line;
                                        }
                                    }
                                }
                            @endphp

                            <div class="mb-6 space-y-6 text-default md:text-xl">
                                <p class="p-0 mb-2 font-semibold">
                                    @lang("challenges-content.$slug.instructions_title")
                                </p>

                                {{-- Educator Tips --}}
                                <div>
                                    <strong class="block mb-2">{{ $ins[0] ?? '' }}</strong>
                                    @foreach (range(1, 11) as $i)
                                        @if (!empty($ins[$i]))
                                            <p class="text-slate-700">{{ $ins[$i] }}</p>
                                        @endif
                                    @endforeach

                                    @if (!empty($ins[12]))
                                        <strong class="block mt-4 mb-2">{{ $ins[12] }}</strong>
                                        <ul class="ml-6 list-disc text-slate-500">
                                            @foreach ([13, 14, 15, 16] as $i)
                                                @if (!empty($ins[$i]))
                                                    <li>{{ $ins[$i] }}</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>

                                {{-- Step 1 --}}
                                <div>
                                    <strong class="block mb-2">{{ $ins[17] ?? '' }}</strong>
                                    @foreach ([18, 19, 20] as $i)
                                        @if (!empty($ins[$i]))
                                            <p class="text-slate-700">{{ $ins[$i] }}</p>
                                        @endif
                                    @endforeach

                                    {{-- Placeholder image for example site --}}
                                    <figure class="my-4">
                                        <img width="100%"
                                            src="/images/challenges/create-your-own-website-with-html-and-css/0.jpg">
                                    </figure>
                                </div>

                                {{-- Step 2 --}}
                                <div>
                                    <strong class="block mb-2">{{ $ins[21] ?? '' }}</strong>
                                    @foreach ([22, 23, 24] as $i)
                                        @if (!empty($ins[$i]))
                                            <p class="text-slate-700">{{ $ins[$i] }}</p>
                                        @endif
                                    @endforeach

                                    @if (!empty($codeHtml))
                                        <pre class="overflow-x-auto p-4 mb-4 font-mono rounded bg-slate-100">{{ $codeHtml }}</pre>
                                    @endif

                                    @if (!empty($ins[37]))
                                        <p class="mb-2 text-slate-700">{{ $ins[37] }}</p>
                                        <figure class="my-4">
                                            <img width="100%"
                                                src="/images/challenges/create-your-own-website-with-html-and-css/1.jpg">
                                        </figure>
                                    @endif
                                </div>

                                {{-- Step 3 --}}
                                <div>
                                    <strong class="block mb-2">{{ $ins[38] ?? '' }}</strong>
                                    @foreach ([39, 40, 41] as $i)
                                        @if (!empty($ins[$i]))
                                            <p class="text-slate-700">{{ $ins[$i] }}</p>
                                        @endif
                                    @endforeach

                                    @if (!empty($codeCss))
                                        <pre class="overflow-x-auto p-4 mb-4 font-mono rounded bg-slate-100">{{ $codeCss }}</pre>
                                    @endif
                                </div>

                                {{-- Step 4 --}}
                                <div>
                                    <strong class="block mb-2">{{ $ins[55] ?? '' }}</strong>
                                    @foreach ([56, 57] as $i)
                                        @if (!empty($ins[$i]))
                                            <p class="text-slate-700">{{ $ins[$i] }}</p>
                                        @endif
                                    @endforeach

                                    @if (!empty($codeLink))
                                        <pre class="overflow-x-auto p-4 mb-4 font-mono rounded bg-slate-100">{{ $codeLink }}</pre>
                                    @endif

                                    @if (!empty($ins[59]))
                                        <p class="text-slate-700">{{ $ins[59] }}</p>
                                    @endif
                                </div>

                                {{-- Step 5 --}}
                                <div>
                                    <strong class="block mb-2">{{ $ins[60] ?? '' }}</strong>
                                    @foreach ([61, 62, 63] as $i)
                                        @if (!empty($ins[$i]))
                                            <p class="text-slate-700">{{ $ins[$i] }}</p>
                                        @endif
                                    @endforeach

                                    @if (!empty($ins[64]))
                                        <p class="mb-2 text-slate-700">{{ $ins[64] }}</p>
                                        <figure class="my-4">
                                            <img width="100%"
                                                src="/images/challenges/create-your-own-website-with-html-and-css/2.jpg">
                                    </figure>
                                @endif
                                </div>
                            
                    
                            </div>

                            {{-- Diversity --}}
                            <div>
                                <strong class="block mb-2">{{ $ins[65] ?? '' }}</strong>
                                @foreach ([66, 67, 68, 69, 70] as $i)
                                    @if (!empty($ins[$i]))
                                        <p class="text-slate-700 text-default md:text-xl">{{ $ins[$i] }}</p>
                                    @endif
                                @endforeach
                            </div>

                            {{-- Accessibility --}}
                            <div>
                                <strong class="block mb-2">{{ $ins[71] ?? '' }}</strong>
                                @foreach ([72, 73] as $i)
                                    @if (!empty($ins[$i]))
                                        <p class="text-default md:text-xl text-slate-700">{{ $ins[$i] }}</p>
                                    @endif
                                @endforeach
                                <ul class="ml-6 list-disc text-default md:text-xl text-slate-500">
                                    @php
                                        $pairs = [
                                            [74, 75], // Contrast + example
                                            [76, 77], // Alt text + note
                                            [78, 79], // Semantic HTML + example
                                            [80, 81], // Readability + tip
                                        ];
                                    @endphp
                                    @foreach ($pairs as [$a, $b])
                                        @if (!empty($ins[$a]) || !empty($ins[$b]))
                                            <li class="text-default md:text-xl">
                                                {{ $ins[$a] ?? '' }}@if (!empty($ins[$b]))
                                                    {{ ' ' . $ins[$b] }}
                                                @endif
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>

                            {{-- Mini simulation (Quiz + Modify tasks) --}}
                            <div>
                                <strong class="block mb-2 text-default md:text-xl">@lang("challenges-content.$slug.mini_simulation_title")</strong>

                                {{-- Quiz groups --}}
                                @if (!empty($mini) && count($quizGroups))
                                    <strong class="block mb-2 text-default md:text-xl">
                                        {{ $mini[0] ?? 'Check your knowledge' }}
                                    </strong>
                                    @foreach ($quizGroups as $g)
                                        <p class="mb-1 font-semibold text-default md:text-xl text-slate-700">
                                            {{ $g['q'] }}</p>
                                        <ol class="mb-4 ml-6 list-decimal text-default md:text-xl text-slate-500">
                                            @foreach ($g['opts'] as $opt)
                                                <li class="text-default md:text-xl">{{ $opt }}</li>
                                            @endforeach
                                        </ol>
                                    @endforeach
                                    @if ($correctLine)
                                        <p class="mb-4 italic text-default md:text-xl text-slate-600">{{ $correctLine }}
                                        </p>
                                    @endif
                                @endif

                                {{-- Modify your page --}}
                                @if ($modifyHeader || count($modifyTasks))
                                    <strong
                                        class="block mb-2 text-default md:text-xl">{{ $modifyHeader ?? 'Modify your page:' }}</strong>
                                    @if (count($modifyTasks))
                                        <ul class="ml-6 list-disc text-slate-500 text-default md:text-xl">
                                            @foreach ($modifyTasks as $task)
                                                <li>{{ $task }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                @endif
                            </div>

                            {{-- Additional resources --}}
                            @if (!empty($resources))
                                <div>
                                    <strong class="block mb-2 text-default md:text-xl">@lang("challenges-content.$slug.additional_resources_title")</strong>
                                    <ul class="ml-6 list-disc text-default md:text-xl">
                                        @foreach ($resources as $url)
                                            <li class="text-default md:text-xl">
                                                <a href="{{ $url }}" target="_blank" rel="noopener noreferrer"
                                                    class="underline hover:no-underline text-[#1c4da1]">{{ $url }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
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
        <script>
            (function() {
                const SCOPE_SELECTOR = "#challenge-detail-page"; // change to "body" if you want site-wide
                const PUNCT_TO_TRIM = '.,;:!?)]}"\'';
                const URL_RE = /\bhttps?:\/\/[^\s<]+/gi;

                function escapeForCharClass(s) {
                    return s.replace(/[[\]{}()*+?.,\\^$|#\s]/g, "\\$&");
                }

                function linkifyNode(textNode) {
                    const text = textNode.nodeValue;
                    if (!URL_RE.test(text)) return;
                    URL_RE.lastIndex = 0;

                    // don’t process if inside a link
                    if (textNode.parentElement && textNode.parentElement.closest('a')) return;
                    // optional: skip code/pre blocks
                    if (textNode.parentElement && textNode.parentElement.closest('code,pre')) return;

                    const frag = document.createDocumentFragment();
                    let last = 0,
                        m, punctTrimRe = new RegExp("[" + escapeForCharClass(PUNCT_TO_TRIM) + "]+$");

                    while ((m = URL_RE.exec(text)) !== null) {
                        const raw = m[0],
                            start = m.index,
                            end = start + raw.length;
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
                    // observe future changes
                    const obs = new MutationObserver(muts => {
                        for (const m of muts) {
                            m.addedNodes && m.addedNodes.forEach(n => {
                                if (n.nodeType === Node.TEXT_NODE) linkifyNode(n);
                                else if (n.nodeType === Node.ELEMENT_NODE) linkifyTree(n);
                            });
                        }
                    });
                    obs.observe(scopeRoot, {
                        childList: true,
                        subtree: true
                    });
                }

                if (document.readyState === "loading") {
                    document.addEventListener("DOMContentLoaded", () => init(document.querySelector(SCOPE_SELECTOR)));
                } else {
                    init(document.querySelector(SCOPE_SELECTOR));
                }
            })();
        </script>
    </section>
@endsection