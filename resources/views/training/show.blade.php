@extends('layout.new_base')

@php
    $fallbackDescription = \Illuminate\Support\Str::limit(
        trim(strip_tags(($trainingResource->intro ?? '') . ' ' . ($trainingResource->content ?? ''))),
        160
    );

    $displayTitle = $trainingResource->page_title ?: $trainingResource->card_title ?: 'Training';
    $pageTitle = $trainingResource->meta_title ?: ($displayTitle . ' – EU Code Week');
    $pageDescription = $trainingResource->meta_description ?: $fallbackDescription;
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
            <div class="relative z-10 py-10 md:pt-20 md:pb-10 codeweek-container-lg">
                @if(!empty($trainingResource->intro))
                    <div class="text-[#20262C] font-normal text-lg md:text-xl p-0 mb-6">
                        {!! $trainingResource->intro !!}
                    </div>
                @endif

                @if(!empty($trainingResource->highlight_box))
                    <div class="text-[#6B7280] font-normal text-sm md:text-base p-4 bg-gray-50 rounded mb-6">
                        {!! $trainingResource->highlight_box !!}
                    </div>
                @endif

                @if(!empty($trainingResource->youtube_video_id))
                    <div class="mb-10">
                        @include('static.youtube', ['video_id' => $trainingResource->youtube_video_id])
                    </div>
                @endif

                @if(!empty($trainingResource->resolved_body_image))
                    <img
                        src="{{ $trainingResource->resolved_body_image }}"
                        alt="{{ $trainingResource->body_image_alt ?: $displayTitle }}"
                        class="mb-8 w-full h-auto rounded-lg"
                    />
                @endif

                @if(!empty($trainingResource->content))
                    <div class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6">
                        {!! $trainingResource->content !!}
                    </div>
                @endif

                @if(
                    (!empty($trainingResource->button_text) && !empty($trainingResource->button_url)) ||
                    (!empty($trainingResource->secondary_button_text) && !empty($trainingResource->secondary_button_url))
                )
                    <div class="flex flex-wrap gap-4">
                        @if(!empty($trainingResource->button_text) && !empty($trainingResource->button_url))
                            <a
                                class="inline-block bg-[#F95C22] rounded-full py-2.5 px-6 font-['Blinker'] hover:bg-hover-orange duration-300 text-base font-semibold leading-7 text-black normal-case"
                                href="{{ $trainingResource->button_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                {{ $trainingResource->button_text }}
                            </a>
                        @endif

                        @if(!empty($trainingResource->secondary_button_text) && !empty($trainingResource->secondary_button_url))
                            <a
                                class="inline-block bg-[#FFD56A] rounded-full py-2.5 px-6 font-['Blinker'] hover:brightness-95 duration-300 text-base font-semibold leading-7 text-black normal-case"
                                href="{{ $trainingResource->secondary_button_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                {{ $trainingResource->secondary_button_text }}
                            </a>
                        @endif
                    </div>
                @endif
            </div>
        </section>

        @include('include.licence')
    </section>
@endsection
