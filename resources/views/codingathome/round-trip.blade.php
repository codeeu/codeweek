@extends('layout.new_base')

@section('title', 'Round Trip – A Fun Coding at Home Challenge')
@section('description', 'Program a round-trip journey while learning coding logic and sequencing.')

@section('content')
    <section id="codeweek-codingathome-subpage" class="font-['Blinker'] overflow-hidden">

        @include('codingathome.banner')

        <section class="relative z-10">
            <div class="relative z-10 py-10 md:pt-20 md:pb-10 codeweek-container-lg">
                <h2 class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    14. @lang('coding-at-home.round-trip.title')
                </h2>
                <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                    @lang('coding-at-home.round-trip.text')
                </p>
                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6 flex flex-wrap gap-2">
                    @lang('coding-at-home.material.required'): @lang('coding-at-home.round-trip.material')
                </p>

                <div class="mb-10">
                    @include('static.youtube', ['video_id' => '0aJxd7nfKFQ'])
                </div>

                <h2 class="text-dark-blue text-2xl md:text-3xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    @lang('coding-at-home.questions')
                </h2>

                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6">
                    @lang('coding-at-home.round-trip.questions.content.1')
                </p>
                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0">
                    @lang('coding-at-home.texts.3')
                </p>
            </div>
        </section>

        @include("include.licence")
    </section>
@endsection