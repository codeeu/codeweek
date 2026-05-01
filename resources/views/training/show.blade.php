@extends('layout.new_base')

@php
    $fallbackDescription = \Illuminate\Support\Str::limit(
        trim(strip_tags(($trainingResource->intro ?? '') . ' ' . ($trainingResource->content ?? ''))),
        160
    );

    $displayTitle = $trainingResource->page_title ?: $trainingResource->card_title ?: 'Training';
    $pageTitle = $trainingResource->meta_title ?: ($displayTitle . ' – EU Code Week');
    $pageDescription = $trainingResource->meta_description ?: $fallbackDescription;

    $introClass = "text-[#20262C] font-normal text-lg md:text-xl p-0 mb-6 [&_p]:p-0 [&_p]:mb-6 [&_a]:text-dark-blue [&_a]:hover:underline";
    $contentClass = "text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6 [&_p]:p-0 [&_p]:mb-6 [&_h2]:text-dark-blue [&_h2]:text-2xl [&_h2]:md:text-3xl [&_h2]:leading-[44px] [&_h2]:font-medium [&_h2]:font-['Montserrat'] [&_h2]:mb-4 [&_h3]:text-dark-blue [&_h3]:text-xl [&_h3]:md:text-2xl [&_h3]:font-medium [&_h3]:font-['Montserrat'] [&_h3]:mb-4 [&_ul]:pl-8 [&_ul]:m-0 [&_ul]:mb-6 [&_ul]:list-disc [&_ol]:pl-8 [&_ol]:m-0 [&_ol]:mb-6 [&_ol]:list-decimal [&_li]:p-0 [&_li]:text-lg [&_li]:font-normal [&_li]:leading-7 [&_li]:text-default [&_a]:text-dark-blue [&_a]:hover:underline [&_img]:max-w-full [&_img]:w-auto [&_img]:h-auto [&_img]:my-8 [&_img]:mx-auto [&_img]:block";
    $pdfClass = "text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6 [&_p]:p-0 [&_p]:mb-4 [&_h2]:text-dark-blue [&_h2]:text-2xl [&_h2]:md:text-3xl [&_h2]:leading-[44px] [&_h2]:font-medium [&_h2]:font-['Montserrat'] [&_h2]:mb-4 [&_ul]:m-0 [&_ul]:mb-6 [&_ul]:list-none [&_ol]:m-0 [&_ol]:mb-6 [&_ol]:list-none [&_li]:p-0 [&_li]:mb-2 [&_li]:font-normal [&_li]:leading-7 [&_li]:text-default [&_li]:break-words [&_a]:text-lg [&_a]:text-dark-blue [&_a]:no-underline [&_a:hover]:underline [&_a]:break-words [&_a]:max-w-full";
    $contactsClass = "text-[#333E48] font-normal text-lg md:text-xl p-0 mb-8 [&_p]:p-0 [&_p]:mb-4 [&_h2]:text-dark-blue [&_h2]:text-2xl [&_h2]:md:text-3xl [&_h2]:leading-[44px] [&_h2]:font-medium [&_h2]:font-['Montserrat'] [&_h2]:mb-4 [&_a]:text-dark-blue [&_a]:hover:underline";
    $registerClass = "text-[#333E48] font-normal text-base md:text-lg [&_p]:p-0 [&_p]:mb-4 [&_p:last-child]:mb-0 [&_a]:font-medium [&_a]:text-dark-blue [&_a]:hover:underline";
    $aboutBoxClass = "text-slate-500 text-[16px] leading-[22px] tablet:text-xl tablet:leading-7 [&_h2]:text-dark-blue [&_h2]:text-2xl [&_h2]:md:text-3xl [&_h2]:leading-[44px] [&_h2]:font-medium [&_h2]:font-['Montserrat'] [&_h2]:mb-3 [&_h3]:text-dark-blue [&_h3]:text-xl [&_h3]:md:text-2xl [&_h3]:font-medium [&_h3]:font-['Montserrat'] [&_h3]:mb-3 [&_p]:p-0 [&_p]:mb-3 [&_p:last-child]:mb-0 [&_ul]:pl-8 [&_ul]:m-0 [&_ul]:mb-2 [&_ul]:list-disc [&_li]:mb-2 [&_li:last-child]:mb-0 [&_a]:font-semibold [&_a]:underline [&_a]:text-dark-blue";
    $anchorOffset = max(0, (int) ($trainingResource->anchor_offset ?? 0));

    $isExternalLink = static function (?string $url): bool {
        $url = trim((string) $url);

        return \Illuminate\Support\Str::startsWith($url, ['http://', 'https://', '//']);
    };

    $renderedContent = $trainingResource->content ?? '';
    $roadmapEmbedUrl = trim((string) ($trainingResource->roadmap_pdf_embed_url ?? ''));
    if ($roadmapEmbedUrl !== '' && str_contains($renderedContent, '[[embed_roadmap_pdf]]')) {
        $renderedContent = str_replace(
            '[[embed_roadmap_pdf]]',
            view('training.partials.roadmap-pdf-embed', ['url' => $roadmapEmbedUrl])->render(),
            $renderedContent
        );
    } elseif (str_contains($renderedContent, '[[embed_roadmap_pdf]]')) {
        $renderedContent = str_replace('[[embed_roadmap_pdf]]', '', $renderedContent);
    }
@endphp

@section('title', $pageTitle)
@section('description', $pageDescription)

@section('content')
    <section id="codeweek-training-dynamic-subpage" class="font-['Blinker'] overflow-hidden">
        @if(($previewMode ?? false) === true)
            <div class="bg-yellow-100 border-b border-yellow-300 text-[#20262C]">
                <div class="codeweek-container-lg py-3 text-sm md:text-base font-medium">
                    Preview mode: this page is not published yet.
                </div>
            </div>
        @endif

        @include('codingathome.banner', [
            'author' => $trainingResource->hero_author,
            'title' => $displayTitle,
            'primaryButtonText' => $trainingResource->hero_button_text,
            'primaryButtonUrl' => $trainingResource->hero_button_url,
            'secondaryButtonText' => $trainingResource->hero_secondary_button_text,
            'secondaryButtonUrl' => $trainingResource->hero_secondary_button_url,
        ])

        <section class="relative z-10">
            <div class="relative z-10 py-10 codeweek-container-lg">
                @if(!empty($trainingResource->highlight_box))
                    <div class="text-[#6B7280] font-normal text-sm md:text-base p-4 bg-gray-50 rounded mb-6 [&_p]:p-0 [&_p]:mb-3 [&_p]:text-[#20262C] [&_p]:font-normal [&_p]:text-lg [&_p]:md:text-xl [&_p:last-child]:mb-0 [&_strong]:font-semibold [&_a]:text-dark-blue [&_a]:hover:underline">
                        {!! $trainingResource->highlight_box !!}
                    </div>
                @endif

                @if(!empty($trainingResource->intro))
                    <div class="{{ $introClass }}">
                        {!! $trainingResource->intro !!}
                    </div>
                @endif

                @if(!empty($trainingResource->youtube_video_id))
                    <div class="mb-10">
                        @include('static.youtube', ['video_id' => $trainingResource->youtube_video_id])
                    </div>
                @endif

                @if(!empty($trainingResource->video_script_url))
                    <a
                        class="text-dark-blue text-lg font-medium font-['Montserrat'] underline block mb-6"
                        href="{{ $trainingResource->video_script_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        {{ $trainingResource->video_script_text ?: 'Download the video script' }}
                    </a>
                @endif

                @if(!empty($trainingResource->resolved_body_image))
                    <img
                        src="{{ $trainingResource->resolved_body_image }}"
                        alt="{{ $trainingResource->body_image_alt ?: $displayTitle }}"
                        class="mb-12 w-full h-full max-h-[630px] object-contain"
                        style="max-height: 630px;"
                    />
                @endif

                @if(!empty($renderedContent))
                    <div class="{{ $contentClass }}">
                        {!! $renderedContent !!}
                    </div>
                @endif

                @if(!empty($trainingResource->pdf_links_section))
                    <div class="{{ $pdfClass }}">
                        {!! $trainingResource->pdf_links_section !!}
                    </div>
                @endif

                @if(!empty($trainingResource->contacts_section))
                    <div class="{{ $contactsClass }}">
                        {!! $trainingResource->contacts_section !!}
                    </div>
                @endif

                @if(!empty($trainingResource->register_box_section))
                    <div class="p-6 mb-8 bg-blue-50 border-l-4 border-dark-blue">
                        <div class="{{ $registerClass }}">
                            {!! $trainingResource->register_box_section !!}
                        </div>
                        @if(!empty($trainingResource->third_button_text) && !empty($trainingResource->third_button_url))
                            <div class="mt-5">
                                <a
                                    class="inline-block bg-[#F95C22] rounded-full py-2.5 px-6 font-['Blinker'] hover:bg-hover-orange duration-300 text-base font-semibold leading-7 text-black normal-case"
                                    href="{{ $trainingResource->third_button_url }}"
                                    @if($isExternalLink($trainingResource->third_button_url))
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    @endif
                                >
                                    {{ $trainingResource->third_button_text }}
                                </a>
                            </div>
                        @endif
                    </div>
                @endif

                @if(!empty($trainingResource->about_box_section))
                    <div class="w-full bg-light-blue rounded-lg p-6 flex flex-col md:flex-row text-['Blinker'] gap-2 mb-8">
                        <img class="min-w-8 min-h-8" src="/images/icon_info.svg" alt="Info" />
                        <div class="{{ $aboutBoxClass }}">
                            {!! $trainingResource->about_box_section !!}
                        </div>
                    </div>
                @endif

                @if(
                    (!empty($trainingResource->button_text) && !empty($trainingResource->button_url))
                    || (!empty($trainingResource->secondary_button_text) && !empty($trainingResource->secondary_button_url))
                )
                    <div class="mt-12 mb-4">
                        <h2 class="text-dark-blue text-2xl md:text-3xl leading-[44px] font-medium font-['Montserrat'] mb-5">Toolkit access</h2>
                        <div class="flex flex-wrap gap-4 items-center">
                            @if(!empty($trainingResource->button_text) && !empty($trainingResource->button_url))
                                <a
                                    class="inline-block bg-[#F95C22] rounded-full py-2.5 px-6 font-['Blinker'] hover:bg-hover-orange duration-300 text-base font-semibold leading-7 text-black normal-case"
                                    href="{{ $trainingResource->button_url }}"
                                    @if($isExternalLink($trainingResource->button_url))
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    @endif
                                >
                                    {{ $trainingResource->button_text }}
                                </a>
                            @endif
                            @if(!empty($trainingResource->secondary_button_text) && !empty($trainingResource->secondary_button_url))
                                <a
                                    class="inline-block rounded-full py-2.5 px-6 border border-[#1C4DA1] text-[#1C4DA1] font-['Blinker'] text-base font-semibold leading-7 normal-case hover:bg-[#1C4DA1] hover:text-white duration-300"
                                    href="{{ $trainingResource->secondary_button_url }}"
                                    @if($isExternalLink($trainingResource->secondary_button_url))
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    @endif
                                >
                                    {{ $trainingResource->secondary_button_text }}
                                </a>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </section>

        @include('include.licence')
    </section>
@endsection

@if($anchorOffset > 0)
    @push('scripts')
        <script>
            (function () {
                const offset = {{ $anchorOffset }};

                function scrollToHash(hash, smooth) {
                    if (!hash || hash.length < 2) return;
                    const id = decodeURIComponent(hash.slice(1));
                    const target = document.getElementById(id);
                    if (!target) return;

                    const y = target.getBoundingClientRect().top + window.scrollY - offset;
                    window.scrollTo({
                        top: Math.max(0, y),
                        behavior: smooth ? 'smooth' : 'auto',
                    });
                }

                document.addEventListener('click', function (event) {
                    const link = event.target.closest('a[href^="#"]');
                    if (!link) return;

                    const hash = link.getAttribute('href');
                    if (!hash || hash === '#') return;

                    event.preventDefault();
                    history.pushState(null, '', hash);
                    scrollToHash(hash, true);
                });

                window.addEventListener('hashchange', function () {
                    scrollToHash(window.location.hash, false);
                });

                if (window.location.hash) {
                    window.requestAnimationFrame(function () {
                        scrollToHash(window.location.hash, false);
                    });
                }
            })();
        </script>
    @endpush
@endif
