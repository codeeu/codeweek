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
    $contentClass = "text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6 [&_p]:p-0 [&_p]:mb-6 [&_h2]:text-dark-blue [&_h2]:text-2xl [&_h2]:md:text-3xl [&_h2]:leading-[44px] [&_h2]:font-medium [&_h2]:font-['Montserrat'] [&_h2]:mb-4 [&_ul]:pl-8 [&_ul]:m-0 [&_ul]:mb-6 [&_ul]:list-disc [&_li]:p-0 [&_li]:text-lg [&_li]:font-normal [&_li]:leading-7 [&_li]:text-default [&_a]:text-dark-blue [&_a]:hover:underline";
    $pdfClass = "text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6 [&_p]:p-0 [&_p]:mb-4 [&_h2]:text-dark-blue [&_h2]:text-2xl [&_h2]:md:text-3xl [&_h2]:leading-[44px] [&_h2]:font-medium [&_h2]:font-['Montserrat'] [&_h2]:mb-4 [&_ul]:m-0 [&_ul]:mb-6 [&_ul]:list-none [&_ol]:m-0 [&_ol]:mb-6 [&_ol]:list-none [&_li]:p-0 [&_li]:mb-2 [&_li]:font-normal [&_li]:leading-7 [&_li]:text-default [&_a]:text-lg [&_a]:text-dark-blue [&_a]:hover:underline";
    $contactsClass = "text-[#333E48] font-normal text-lg md:text-xl p-0 mb-8 [&_p]:p-0 [&_p]:mb-4 [&_h2]:text-dark-blue [&_h2]:text-2xl [&_h2]:md:text-3xl [&_h2]:leading-[44px] [&_h2]:font-medium [&_h2]:font-['Montserrat'] [&_h2]:mb-4 [&_a]:text-dark-blue [&_a]:hover:underline";
    $registerClass = "text-[#333E48] font-normal text-base md:text-lg [&_p]:p-0 [&_p]:mb-4 [&_p:last-child]:mb-0 [&_a]:font-medium [&_a]:text-dark-blue [&_a]:hover:underline";
@endphp

@section('title', $pageTitle)
@section('description', $pageDescription)

@section('content')
    <section id="codeweek-training-dynamic-subpage" class="font-['Blinker'] overflow-hidden">
        @include('codingathome.banner', [
            'author' => $trainingResource->hero_author,
            'title' => $displayTitle,
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

                @if(!empty($trainingResource->content))
                    <div class="{{ $contentClass }}">
                        {!! $trainingResource->content !!}
                    </div>
                @endif

                @if(!empty($trainingResource->pdf_links_section))
                    <div class="{{ $pdfClass }}">
                        {!! $trainingResource->pdf_links_section !!}
                    </div>
                @endif

                @if(!empty($trainingResource->button_text) && !empty($trainingResource->button_url))
                    <a
                        class="max-xl:!hidden inline-block bg-[#F95C22] rounded-full py-2.5 px-6 font-['Blinker'] hover:bg-hover-orange duration-300 text-base font-semibold leading-7 text-black normal-case"
                        href="{{ $trainingResource->button_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        {{ $trainingResource->button_text }}
                    </a>
                @endif

                @if(!empty($trainingResource->contacts_section))
                    <div class="{{ $contactsClass }}">
                        {!! $trainingResource->contacts_section !!}
                    </div>
                @endif

                @if(!empty($trainingResource->secondary_button_text) && !empty($trainingResource->secondary_button_url))
                    <a
                        class="max-xl:!hidden bg-[#F95C22] rounded-full py-2.5 px-6 font-['Blinker'] hover:bg-hover-orange duration-300 inline-block"
                        href="{{ $trainingResource->secondary_button_url }}"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <span class="text-base font-semibold leading-7 text-black normal-case">
                            {{ $trainingResource->secondary_button_text }}
                        </span>
                    </a>
                    <div class="pb-8"></div>
                @endif

                @if(!empty($trainingResource->register_box_section))
                    <div class="p-6 mb-8 bg-blue-50 border-l-4 border-dark-blue">
                        <div class="{{ $registerClass }}">
                            {!! $trainingResource->register_box_section !!}
                        </div>
                    </div>
                @endif
            </div>
        </section>

        @include('include.licence')
    </section>
@endsection
