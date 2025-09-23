@extends('layout.new_base')

@php
    $slug = 'code-it-like-margaret-hamilton';
    $title = trans("challenges-content.$slug.title");
    $locale = app()->getLocale();
    $list = [
        (object) ['label' => 'Educational Resources', 'href' => '/educational-resources'],
        (object) ['label' => 'Challenges', 'href' => '/challenges'],
        (object) ['label' => $title, 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('title', 'Code it like Margaret Hamilton – Creative Coding Challenge')
@section('description',
    'Learn block-based coding with Scratch Jr to launch a spacecraft, just like Margaret Hamilton,
    who coded for NASA\'s Apollo mission. This activity highlights the contribution of a female programmer to space
    exploration and encourages girls to take up programming and STEM careers.')

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
                        <div class="flex flex-wrap gap-4 p-6 bg-white rounded-lg lg:flex-col 2xl:flex-row 2xl:gap-8">
                            <div>
                                <p class="p-0 mb-4 text-2xl font-normal">@lang('challenges.common.duration')</p>
                                <div class="flex gap-2 items-center px-4 py-1.5 bg-light-blue-100 rounded-full w-fit">
                                    <img src="{{ asset('img/2021/challenges/icons/fi_clock.svg') }}" />
                                    <p class="p-0 font-semibold text-slate-500 text-default">@lang("challenges-content.$slug.duration")</p>
                                </div>
                            </div>
                            <div>
                                <p class="p-0 mb-4 text-2xl font-normal">@lang('challenges.common.experience')</p>
                                <div class="flex gap-2 items-center px-4 py-1.5 bg-light-blue-100 rounded-full w-fit">
                                    <img src="{{ asset('img/2021/challenges/icons/fi_lightbulb.svg') }}" />
                                    <p class="p-0 font-semibold text-slate-500 text-default">@lang("challenges-content.$slug.experience")</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 bg-white rounded-lg">
                            <p class="p-0 mb-4 text-2xl font-normal">@lang('challenges.common.target-audience')</p>
                            <ol class="ml-4 list-decimal">
                                <li class="p-0 font-normal leading-7 text-slate-500 text-default">@lang("challenges-content.$slug.target-audience.0")</li>
                            </ol>
                        </div>
                        <div class="p-6 bg-white rounded-lg">
                            <p class="p-0 mb-4 text-2xl font-normal">@lang('challenges.common.purpose')</p>
                            <ol class="ml-4 list-decimal">
                                <li class="p-0 font-normal leading-7 text-slate-500 text-default">@lang("challenges-content.$slug.purposes.0")</li>
                                <li class="p-0 font-normal leading-7 text-slate-500 text-default">@lang("challenges-content.$slug.purposes.1")</li>
                            </ol>
                        </div>
                        <div class="p-6 bg-white rounded-lg">
                            <p class="p-0 mb-4 text-2xl font-normal">@lang('challenges.common.materials')</p>
                            <ol class="ml-4 list-decimal">
                                <li class="p-0 font-normal leading-7 text-slate-500 text-default">@lang("challenges-content.$slug.materials.0")</li>
                                <li class="p-0 font-normal leading-7 text-slate-500 text-default">@lang("challenges-content.$slug.materials.1")</li>
                                <li class="p-0 font-normal leading-7 text-slate-500 text-default">@lang("challenges-content.$slug.materials.2")</li>
                                <li class="p-0 font-normal leading-7 text-slate-500 text-default">@lang("challenges-content.$slug.materials.3")</li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="px-6 py-8 bg-white rounded-lg lg:p-16">
                            <p
                                class="text-dark-blue font-['Montserrat'] font-medium text-[22px] leading-7 md:text-4xl p-0 mb-6">
                                @lang("challenges-content.$slug.title")</p>
                            <div class="flex flex-wrap gap-2 mb-6">
                                <div class="flex gap-2 items-center px-4 py-1.5 bg-light-blue-100 rounded-full">
                                    <img src="{{ asset('img/2021/challenges/icons/fi_users.svg') }}" />
                                    <p class="p-0 font-semibold text-slate-500 text-default">@lang("challenges-content.$slug.target-audience.0")</p>
                                </div>
                            </div>
                            <div class="mb-6">
                                <p class="p-0 mb-2 text-2xl font-semibold">@lang('challenges.common.description')</p>
                                <p
                                    class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px]">
                                    @lang("challenges-content.$slug.description")</p>
                            </div>
                            <div class="mb-6">
                                <p class="p-0 mb-2 text-2xl font-semibold">@lang('challenges.common.instructions')</p>
                                <ol class="list-none ml-4 [&_li]:my-2 leading-[22px] md:leading-[30px]">
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">@lang("challenges-content.$slug.instructions.0")
                                    </li>
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">@lang("challenges-content.$slug.instructions.1")
                                    </li>
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">@lang("challenges-content.$slug.instructions.2")
                                    </li>
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">&nbsp;&nbsp;●&nbsp;@lang("challenges-content.$slug.instructions.3")
                                    </li>
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">&nbsp;&nbsp;●&nbsp;@lang("challenges-content.$slug.instructions.4")
                                    </li>
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">&nbsp;&nbsp;●&nbsp;@lang("challenges-content.$slug.instructions.5")
                                    </li>
                                    <img width="100%" src="/images/challenges/code-it-like-margaret-hamilton/0.jpg">
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">&nbsp;&nbsp;●&nbsp;@lang("challenges-content.$slug.instructions.6")
                                    </li>
                                    <img width="100%" src="/images/challenges/code-it-like-margaret-hamilton/1.jpg">
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">&nbsp;&nbsp;●&nbsp;@lang("challenges-content.$slug.instructions.7")
                                    </li>
                                    <img width="100%" src="/images/challenges/code-it-like-margaret-hamilton/2.jpg">
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">&nbsp;&nbsp;●&nbsp;@lang("challenges-content.$slug.instructions.8")
                                    </li>
                                    <img width="100%" src="/images/challenges/code-it-like-margaret-hamilton/3.jpg">
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">&nbsp;&nbsp;●&nbsp;@lang("challenges-content.$slug.instructions.9")
                                    </li>
                                    <img width="100%" src="/images/challenges/code-it-like-margaret-hamilton/4.jpg">
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">&nbsp;&nbsp;●&nbsp;@lang("challenges-content.$slug.instructions.10")
                                    </li>
                                </ol>
                            </div>
                            <div class="mb-6">
                                <p class="p-0 mb-2 text-2xl font-semibold">
                                    @lang("challenges-content.$slug.real-life-applications.0")</p>
                                <ul class="list-none ml-4 [&_li]:my-2 leading-[22px] md:leading-[30px]">
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">@lang("challenges-content.$slug.real-life-applications.1")
                                    </li>
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">&nbsp;&nbsp;●&nbsp;@lang("challenges-content.$slug.real-life-applications.2")
                                    </li>
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">&nbsp;&nbsp;●&nbsp;@lang("challenges-content.$slug.real-life-applications.3")
                                    </li>
                                </ul>
                            </div>
                            <div class="mb-6">
                                <p class="p-0 mb-2 text-2xl font-semibold">
                                    @lang("challenges-content.$slug.variations.0")</p>
                                <ul class="list-none ml-4 [&_li]:my-2 leading-[22px] md:leading-[30px]">
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">&nbsp;&nbsp;●&nbsp;@lang("challenges-content.$slug.variations.1")
                                    </li>
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">&nbsp;&nbsp;●&nbsp;@lang("challenges-content.$slug.variations.2")
                                    </li>
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">&nbsp;&nbsp;●&nbsp;@lang("challenges-content.$slug.variations.3")
                                    </li>
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">&nbsp;&nbsp;●&nbsp;@lang("challenges-content.$slug.variations.4")
                                    </li>
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">&nbsp;&nbsp;●&nbsp;@lang("challenges-content.$slug.variations.5")
                                    </li>
                                    <li class="p-0 font-normal text-default md:text-xl text-slate-500">&nbsp;&nbsp;●&nbsp;@lang("challenges-content.$slug.variations.6")
                                    </li>
                                    <img width="100%" src="/images/challenges/code-it-like-margaret-hamilton/5.jpg">
                                    <img width="100%" src="/images/challenges/code-it-like-margaret-hamilton/6.jpg">
                                    <img width="100%" src="/images/challenges/code-it-like-margaret-hamilton/7.jpg">
                                </ul>
                            </div>
                            @include('2021.challenges._share')
                            <div class="mb-6">
                                <p class="p-0 mb-2 text-2xl font-semibold">@lang('challenges.common.example')</p>
                                <div>
                                    {{-- The document does not provide an example image for the "Examples" section. --}}
                                </div>
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
(function () {
  const SCOPE_SELECTOR = "#challenge-detail-page"; // change to "body" if you want site-wide
  const PUNCT_TO_TRIM = '.,;:!?)]}"\'';
  const URL_RE = /\bhttps?:\/\/[^\s<]+/gi;

  function escapeForCharClass(s){return s.replace(/[[\]{}()*+?.,\\^$|#\s]/g,"\\$&");}

  function linkifyNode(textNode) {
    const text = textNode.nodeValue;
    if (!URL_RE.test(text)) return;
    URL_RE.lastIndex = 0;

    // don’t process if inside a link
    if (textNode.parentElement && textNode.parentElement.closest('a')) return;
    // optional: skip code/pre blocks
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
    // observe future changes
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
