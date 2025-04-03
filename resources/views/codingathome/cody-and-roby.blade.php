@extends('layout.new_base')

@section('title', 'Cody and Roby – Unplugged Coding for Beginners')
@section('description', 'Learn the basics of coding with Cody and Roby, a fun unplugged activity that teaches programming concepts without a computer.')

@section('content')
    <section id="codeweek-codingathome-subpage" class="font-['Blinker'] overflow-hidden">

        @include('codingathome.banner')

        <section class="relative z-10">
            <div class="relative z-10 py-10 md:pt-20 md:pb-10 codeweek-container-lg">
                <h2 class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    8. @lang('coding-at-home.cody-and-roby.title')
                </h2>
                <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                    @lang('coding-at-home.cody-and-roby.text')
                </p>
                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6 flex gap-2">
                    @lang('coding-at-home.material.required'):
                    <a href="http://www.codeweek.it/cody-roby-en/ecw-edition/">@lang('coding-at-home.cody-and-roby.starter-kit')</a>
                    @lang('coding-at-home.cody-and-roby.material') <a
                            href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/coding%40home/lessons-8-9.zip"><img
                                src="/img/download.png" width="20px" style="margin-left:8px;position:absolute"></a>
                </p>

                <div class="mb-10">
                    @include('static.youtube', ['video_id' => 'do1qBzwxRJg'])
                </div>

                <h2 class="text-dark-blue text-2xl md:text-3xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                    @lang('coding-at-home.questions')
                </h2>

                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0 mb-6">
                    @lang('coding-at-home.cody-and-roby.questions.content.1')<br/><br/>
                    @lang('coding-at-home.cody-and-roby.questions.content.2')<br/><br/>
                    @lang('coding-at-home.cody-and-roby.questions.content.3')
                </p>
                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0">
                    @lang('coding-at-home.texts.3')
                </p>
            </div>
        </section>

        @include("include.licence")
    </section>
@endsection