@extends('layout.new_base')

@section('title', 'The Tourist – A Coding at Home Puzzle')
@section('description', 'Two teams challenge each other to find, in the shortest time possible, the sequence of instructions that will guide the tourist to the monuments for visit.')

@section('content')
    <section id="codeweek-codingathome-subpage" class="font-['Blinker'] overflow-hidden">

        @include('codingathome.banner', ['title' => __('coding-at-home.the-tourist.title')])

        <section class="relative z-10">
            <div class="relative z-10 py-10 md:pt-20 md:pb-10 codeweek-container-lg">
                <h2 class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    9. @lang('coding-at-home.the-tourist.title')
                </h2>
                <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                    @lang('coding-at-home.the-tourist.text')
                </p>
                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6 flex flex-wrap gap-2">
                    @lang('coding-at-home.material.required'):
                    <a href="http://www.codeweek.it/cody-roby-en/ecw-edition/">@lang('coding-at-home.cody-and-roby.starter-kit')</a>
                    @lang('coding-at-home.cody-and-roby.material'). <a
                            href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/coding%40home/lessons-8-9.zip"><img
                                src="/img/download.png" width="20px" style="margin-left:8px;position:absolute"></a>
                    @lang('coding-at-home.the-tourist.material')
                </p>

                <div class="mb-10">
                    @include('static.youtube', ['video_id' => 'Pu3pEEIsxF4'])
                </div>

                <h2 class="text-dark-blue text-2xl md:text-3xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    @lang('coding-at-home.questions')
                </h2>

                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6">
                    @lang('coding-at-home.the-tourist.questions.content.1')<br/><br/>
                    @lang('coding-at-home.the-tourist.questions.content.2')<br/><br/>
                    @lang('coding-at-home.the-tourist.questions.content.3')
                </p>
                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0">
                    @lang('coding-at-home.texts.3')
                </p>
            </div>
        </section>

        @include("include.licence")
    </section>

@endsection