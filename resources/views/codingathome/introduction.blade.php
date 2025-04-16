@extends('layout.new_base')

@section('title', 'Introduction to Coding at Home – Start Your Journey')
@section('description', 'A beginner-friendly introduction to coding at home. Start exploring the basics of programming with simple, interactive challenges.')

@section('content')

    <section id="codeweek-codingathome-subpage" class="font-['Blinker'] overflow-hidden">

        @include('codingathome.banner', ['title' => __('coding-at-home.title') ])

        <section class="relative z-10">
            <div class="relative z-10 py-10 md:pt-20 md:pb-10 codeweek-container-lg">
                <h2 class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    @lang('coding-at-home.intro.title')
                </h2>
                <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                    @lang('coding-at-home.texts.1')
                </p>

                <div class="mb-10">
                    @include('static.youtube', ['video_id' => 'o2ZGGZagWmM'])
                </div>

                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6">
                    @lang('coding-at-home.texts.2')
                </p>
                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0">
                    @lang('coding-at-home.texts.3')
                </p>
            </div>
        </section>

        @include("include.licence")
    </section>
@endsection