@extends('layout.new_base')

@section('title', 'Tug of War – A Coding at Home Game')
@section('description', 'Program a fun "Tug of War" game, testing your coding and logical thinking skills while having fun with interactive challenges.')

@section('content')

    <section id="codeweek-codingathome-subpage" class="font-['Blinker'] overflow-hidden">

        @include('codingathome.banner', ['title' => __('coding-at-home.tug-of-war.title')])

        <section class="relative z-10">
            <div class="relative z-10 py-10 md:pt-20 md:pb-10 codeweek-container-lg">
                <h2 class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    4. @lang('coding-at-home.tug-of-war.title')
                </h2>
                <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                    @lang('coding-at-home.tug-of-war.text')
                </p>
                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6 flex">
                    @lang('coding-at-home.material.required'): <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/board-and-roby-en.pdf">@lang('coding-at-home.material.chequered')</a>, <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/CodyFeet-sheet.pdf">@lang('coding-at-home.material.footprint')</a>
                    <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/coding%40home/explorer-materials.zip"><img src="/img/download.png" width="20px" style="margin-left:8px;position:absolute"></a>
                </p>

                <div class="mb-10">
                    @include('static.youtube', ['video_id' => 'JzD5_RAhF6g'])
                </div>

                <h2 class="text-dark-blue text-2xl md:text-3xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    @lang('coding-at-home.questions')
                </h2>

                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6">
                    @lang('coding-at-home.tug-of-war.questions.content.1')<br/><br/>
                    @lang('coding-at-home.tug-of-war.questions.content.2')<br/><br/>
                    @lang('coding-at-home.tug-of-war.questions.content.3')
                </p>
                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0">
                    @lang('coding-at-home.texts.3')
                </p>
            </div>
        </section>

        @include("include.licence")
    </section>

@endsection