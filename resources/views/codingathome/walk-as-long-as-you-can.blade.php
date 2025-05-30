@extends('layout.new_base')

@section('title', 'Walk as Long as You Can – A Fun Coding at Home Challenge')
@section('description', 'Develop problem-solving skills with this engaging coding activity that encourages strategic movement and logical thinking.')

@section('content')
    <section id="codeweek-codingathome-subpage" class="font-['Blinker'] overflow-hidden">

        @include('codingathome.banner', ['title' => __('coding-at-home.walk-as-long-as-you-can.title')])

        <section class="relative z-10">
            <div class="relative z-10 py-10 md:pt-20 md:pb-10 codeweek-container-lg">
                <h2 class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    6. @lang('coding-at-home.walk-as-long-as-you-can.title')
                </h2>
                <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                    @lang('coding-at-home.walk-as-long-as-you-can.text')
                </p>
                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6 flex">
                    @lang('coding-at-home.material.required'): <a
                            href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/board-and-roby-en.pdf">@lang('coding-at-home.material.chequered')</a>,
                    <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/coding@home/CodyColor-sheet.pdf">@lang('coding-at-home.walk-as-long-as-you-can.coloured-cards')</a>
                </p>

                <div class="mb-10">
                    @include('static.youtube', ['video_id' => 'sH0sY7PlKfU'])
                </div>

                <h2 class="text-dark-blue text-2xl md:text-3xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    @lang('coding-at-home.questions')
                </h2>

                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6">
                    @lang('coding-at-home.walk-as-long-as-you-can.questions.content.1')<br/><br/>
                    @lang('coding-at-home.walk-as-long-as-you-can.questions.content.2')
                </p>
                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0">
                    @lang('coding-at-home.texts.3')
                </p>
            </div>
        </section>

        @include("include.licence")
    </section>
@endsection