@extends('layout.new_base')

@section('title', 'Meeting Point – A Coding at Home Challenge')
@section('description', 'Use coding to create a virtual meeting point where different elements interact, enhancing your logical thinking and problem-solving skills.')

@section('content')
    <section id="codeweek-codingathome-subpage" class="font-['Blinker'] overflow-hidden">

        @include('codingathome.banner', ['title' => __('coding-at-home.meeting-point.title')])

        <section class="relative z-10">
            <div class="relative z-10 py-10 md:pt-20 md:pb-10 codeweek-container-lg">
                <h2 class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    15. @lang('coding-at-home.meeting-point.title')
                </h2>
                <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                    @lang('coding-at-home.meeting-point.text')
                </p>
                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6 flex flex-wrap gap-2">
                    @lang('coding-at-home.material.required'): @lang('coding-at-home.meeting-point.material')
                </p>

                <div class="mb-10">
                    @include('static.youtube', ['video_id' => 'uny3nRkqOHk'])
                </div>

                <h2 class="text-dark-blue text-2xl md:text-3xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    @lang('coding-at-home.questions')
                </h2>

                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6">
                    @lang('coding-at-home.meeting-point.questions.content.1')
                </p>
                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0">
                    @lang('coding-at-home.texts.3')
                </p>
            </div>
        </section>

        @include("include.licence")
    </section>
@endsection